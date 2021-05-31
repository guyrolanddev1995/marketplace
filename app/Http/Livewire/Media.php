<?php

namespace App\Http\Livewire;

use App\Models\Media as ModelsMedia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Media extends Component
{
    use WithFileUploads;

    public $image;
    public $images;

    public function save()
    {
        $this->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:1024',
        ]);

        $url = $this->image->store('medias');

        ModelsMedia::create([
            'media' => $url
        ]);
        
        $this->image = '';

        session()->flash('success', 'Image importée avec succès');
    }
    
    public function remove($id)
    {
       $image = ModelsMedia::findOrFail($id);

       $image->delete();

       session()->flash('error', 'Image supprimée avec succès');
    }

    public function render()
    {
        $this->images = ModelsMedia::orderBy('created_at', 'desc')->get();
        return view('livewire.media');
    }
}
