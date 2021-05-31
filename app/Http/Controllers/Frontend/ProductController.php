<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Famille;
use App\Models\Product;
use Illuminate\Http\Request;

use Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)
                         ->orderBy('name','asc')
                         ->paginate(25);

        return view('frontend.pages.products',compact('products'));
            
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)
                          ->with('category.parent')
                          ->where('status', 1)
                          ->first();
        
        $related_products = Product::where('slug', '<>', $slug)
                                    ->where('status', 1)
                                    ->get();

        $images = $product->images;
        
        return view('frontend.pages.product-details',compact('product', 'images', 'related_products'));
    }

    public function addToCart(Request $request)
    {
       $product = Product::findOrFail($request->input('productId'));
       $options = $request->except('_token', 'productId', 'price', 'qty');

       if($product->min_quantity <= $request->qty){
            $item =  Cart::get($product->id);
        
            if($item != null){
                Cart::update($product->id, [
                'quantity' => $request->input('qty')
                ]);
            }
            else{
                Cart::add($product->id, $product->name, $request->input('price'), $request->input('qty'), $options, [], Product::class);
            }
        
            return redirect()->back()->with('success', 'Produit ajouté au panier avec succèss.');

       } else {
            return redirect()->back()->with('error', 'La quantité minimale requise pour passer une commande de ce produit est de '. $product->min_quantity);
       }

       
    }

    public function listByCategory($category)
    {
        $category = Category::where('slug', $category)->first();
        $category->load('parent');

        $categories = Category::where('id', '<>', $category->id)
                            ->where('status', 1)
                            ->withCount('products')
                            ->orderBy('name', 'asc')
                            ->get();

        $products = $category->products()->paginate(25);

        return view('frontend.pages.category', compact('products', 'category', 'categories'));
    }

    public function listByFamille($famille)
    {
        
        $famille = Famille::where('slug', $famille)->first();
        
        $categories = $famille->categories()
                            ->where('status', 1)
                            ->withCount('products')
                            ->orderBy('name', 'asc')
                            ->get();

        $products = $famille->products()->paginate(25);
    
        return view('frontend.pages.famille', compact('famille', 'products', 'categories'));
    }
}
