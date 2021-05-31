<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Famille;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FamilleController extends Controller
{
    use UploadAble;

    public function index()
    {
        $familles = Famille::orderBy('created_at','desc')
                             ->get();
     
        return view('backend.pages.familles.index', compact('familles'));
    }

    public function create()
    {
        return view('backend.pages.familles.create');
    }

    public function store(Request $request)
    {
        $image = '';
        $this->validate($request, [
            'name'  => 'required|max:191|unique:familles,name',
            'image' =>  'mimes:png,jpg,jpeg,gif|max:2000',
        ]);

        if($request->has('image') && ($request->image instanceof UploadedFile)){
            $image = $this->uploadOne($request->image, 'familles/images');
        }

        Famille::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name, '-'),
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->back()->with('success', 'Famille créée avec succès');
    }

    public function edit($slug)
    {
        $famille = Famille::where('slug', $slug)->first();
        return view('backend.pages.familles.edit', compact('famille'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
        ]);

        $famille = Famille::where('slug', $slug)->first();
        $image = $famille->image;

        if($request->has('image') && ($request->image instanceof UploadedFile)){
            if($image != null){
                $this->deleteOne($image);
            }

            $image = $this->uploadOne($request->image, 'familles/images');
        }

        $famille->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name, '-'),
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.famille.index')->with('success', 'Famille mise à jour avec succès');
    }

    public function delete($slug)
    {
        $famille = Famille::where('slug', $slug)->first();
        $famille->delete();
        
        return redirect()->route('admin.famille.index')->with('error', 'Famille supprimée');
    }
}
