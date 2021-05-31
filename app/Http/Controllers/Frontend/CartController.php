<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function getCart()
    {
        return view('frontend.pages.shopping_cart');
    }

    public function updateCart(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

        if($validator->failed()){
            session()->flash('error', collect(['Entrer une quantité valide']));
            return response()->json(['success' => true], 400);
        }

        $product = Product::findOrFail($id);

        $quantity = intval($request->quantity);

        if($quantity < $product->min_quantity){
            session()->flash('error', 'La quantité minimale requise pour passer une commande de ce produit est de '. $product->min_quantity);
        } else {
            Cart::update($id, array(
                'quantity' => [
                    'relative' => false ,
                    'value' => $request->quantity
                ]
            ));
    
            session()->flash('success', 'Quantité mise à jour avec succès');
        }

        return response()->json(['success' => true]);
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect()->back()->with('error', 'le panier a été vidé.');
        }
        return redirect()->back()->with('error', 'le produit a été supprimé du panier.');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect()->back()->with('error', 'le panier a été vidé.');
    }
}
