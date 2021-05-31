<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use InvalidArgumentException;

class ProductController extends Controller
{
    use UploadAble;

    public function index()
    {
        $products = Product::with('category')
                            ->orderBy('created_at', 'desc')
                            ->get();

        $collection = collect($products);

        $stock_epuises = $collection->filter(function($value, $key){
            return $value->quantity <= 	$value->stock;
        })->all();

        return view('backend.pages.products.index', compact('products', 'stock_epuises'));
    }

    public function create()
    {
        $categories = $this->getCategories();
        
        return view('backend.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:255',
            'sku'       =>  'required|unique:products,sku',
            'price'     =>  'required',
            'image'     =>  'required|mimes:png,jpg,jpeg,gif|max:1024',
            'quantity'  =>  'required|numeric',
            'poids'     =>  'required|numeric',
            'video'     =>  'mimes:mp4|max:10000'
        ]);

        $video= null;

        try {
            $collection = collect($request);
            
            $product_image = null;

            if($collection->has('image') && ($request->image instanceof UploadedFile)){
                $product_image = $this->uploadOne($request->image, 'products/images');
            }

            if($collection->has('video') && ($request->video instanceof UploadedFile)){
                $video = $this->uploadOne($request->video, 'products/videos');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;
            $is_new = $collection->has('is_new') ? 1 : 0;

            $product = Product::create([
                'slug' => \Str::slug($request->name,'-'),
                'name' => $request->name,
                'category_id' => $request->categorie,
                'sku' => $request->sku,
                'description' => $request->description,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
                'min_quantity' => $request->min_quantity,
                'poids' => $request->poids,
                'stock' => $request->stock,
                'caracteristique' => $request->caracteristique,
                'product_image' => $product_image,
                'product_video' => $video,
                'status' => $status,
                'is_new' => $is_new,
                'featured' => $featured,
            ]);

            if($request->exists('galerie')){
                foreach($request->galerie as $galerie){
                    \Storage::disk('public')->move('tmp/'.$galerie, 'galeries/'.$galerie);
                    $product->images()->create([
                        'full' => $galerie
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Produit ajouté avec succès');

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function edit($slug)
    {
        $product = $this->findProduct($slug);
        $product->load('images');

        $categories = $this->getCategories();

        return view('backend.pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name'      =>  'required|max:255',
            'sku'       =>  'required',
            'price'     =>  'required',
            'quantity'  =>  'required|numeric',
            'poids'     =>  'required|numeric'
        ]);

        $product = $this->findProduct($slug);

        $collection = collect($request)->except('_token');
        
        $product_image = $product->product_image;

        if($collection->has('image') && ($request->image instanceof UploadedFile))
        {
            if($product_image != null)
            {
                $this->deleteOne($product_image);
            }

            $product_image = $this->uploadOne($request->image, 'products/images');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;
        $is_new = $collection->has('is_new') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured', 'is_new', 'product_image'));

        $product->update($merge->all());
       
        return redirect()->route("admin.product.index")->with('success', 'Produit mise à jour avec succès');
    }
    
    public function delete($slug)
    {
        $product = $this->findProduct($slug);
        $product->delete();

        return redirect()->route("admin.product.index")->with('error', 'Produit supprimé avec succès');
    }


    private function findProduct($slug)
    {
        return Product::where('slug', $slug)
                     ->first();
    }

    private function getCategories()
    {
        return Category::orderBy('name', 'asc')
                        ->get();
    }

    public function uploadEditorFile(Request $request)
    {
        $file = $request->file('image');
        $name = basename($file->storePublicly('/editor', ['disk' => 'public']));
 
        return response()->json([
            'success' => true,
            'url' => \Storage::url('storage/editor/'.$name),
            'name' => $name
        ]);
    }

    public function updateGalerieFiles(Request $request, Product $product)
    {
      $product = Product::findOrFail($request->product_id);
      
      if($request->has('image'))
      {
          $name = $this->saveFile($request->file('image'), '/galeries');
          $result = $product->images()->create([
            'full' => $name
         ]);

         if($result){
             return response()->json(['code', 'success']);
         } else {
            return response()->json(['code', 'error']);
         }
      }
    }

    public function updateVideo(Request $request, $slug)
    {
        $this->validate($request, [
            'video'  =>  'required|mimes:mp4|max:10000'
        ]);

        $product = $this->findProduct($slug);
        $video = $product->product_video;

        if($request->has('video') && ($request->video instanceof UploadedFile)){
            if($video != null){
                $this->deleteOne($video);
            }

            $video = $this->uploadOne($request->video, 'products/videos');

            $product->update([
                'product_video' => $video
            ]);

            return redirect()->back()->with('success', 'Vidéo mise à jour avec succès');
        }

    }

    public function deleteImage($image)
    {
        $image = ProductImage::findOrFail($image);

        if($image->url != '') {
            $this->deleteOne('galeries/'.$image->full);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image suprimée avec succès');
    }
}
