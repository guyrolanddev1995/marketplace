<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class SocialLink extends Component
{
    public $social_facebook;
    public $social_twitter;
    public $social_instagram;
    public $social_linkedin;

    public function mount()
    {
        $this->social_facebook = Config::get('settings.social_facebook');
        $this->social_twitter = Config::get('settings.social_twitter');
        $this->social_instagram = Config::get('settings.social_instagram');
        $this->social_linkedin = Config::get('settings.social_linkedin');
    }

    public function render()
    {
        return view('livewire.settings.social-link');
    }

    public function save()
    {
        $settings = [
            'social_facebook' => $this->social_facebook,
            'social_twitter' => $this->social_twitter,
            'social_instagram' => $this->social_instagram,
            'social_linkedin' => $this->social_linkedin,
        ];

        foreach($settings as $key => $value) {
            Setting::set($key, $value);
        }

        session()->flash('success', 'Paramètre mise à jour avec succès');
    }
}
