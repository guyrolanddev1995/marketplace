<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Famille;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')
                             ->orderBy('created_at','desc')
                             ->get();
     
        return view('backend.pages.categorie.index', compact('categories'));
    }

    public function create()
    {
        
        $familles = Famille::orderBy('name','asc')->get();
        return view('backend.pages.categorie.create', compact('familles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'parent_id' => 'required|not_in:0',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name, '-'),
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->back()->with('success', 'Catégorie créée avec succès');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $familles = Famille::orderBy('name','asc')->get();
        return view('backend.pages.categorie.edit', compact('category', 'familles'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'parent_id' => 'required|not_in:0',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name, '-'),
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        
        return redirect()->route('admin.category.index')->with('error', 'Catégorie supprimée');
    }
}
