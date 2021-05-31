<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;

    public $logoFile;
    public $iconFile;
    public $favicon;
    public $siteImage;

    public function mount()
    {
        $this->siteImage = Config::get('settings.site_logo');
        $this->favicon = Config::get('settings.site_favicon');
    }

    public function uploadFavicon()
    {
        $favicon = $this->upload($this->iconFile, $this->favicon, 'iconFile');
        if($favicon){
            Setting::set('site_favicon', $favicon);
            session()->flash('success', 'Favicon mise à jour avec succès');
            $this->iconFile = "";
            $this->favicon = $favicon;
        } else {
            session()->flash('error', 'Une erreur est survenue lors du téléchargement de l\'image');
        }
    }

    private function upload($filename, $name,  $validateName)
    {
        $this->validate([
            $validateName => 'required|image|max:1024'
        ]);

        if($name != null){
            Storage::delete('logo/'.$name);
        }

        $url = $filename->store('logo');

        return $url;
    }

    public function uploadLogo()
    {
        $logo = $this->upload($this->logoFile, $this->siteImage, 'logoFile');
        if($logo){
            Setting::set('site_logo', $logo);
            session()->flash('success', 'Logo mise à jour avec succès');
            $this->logoFile = "";
            $this->siteImage = $logo;
        } else {
            session()->flash('error', 'Une erreur est survenue lors du téléchargement de l\'image');
        }
    }

    public function render()
    {
        return view('livewire.settings.images');
    }
}
