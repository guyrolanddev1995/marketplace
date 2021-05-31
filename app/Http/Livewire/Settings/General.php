<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class General extends Component
{
    public $site_name;
    public $site_title;
    public $email1;
    public $email2;
    public $phone1;
    public $phone2;
    public $phone3;
    public $address;

    public function mount()
    {
        $this->site_name = Config::get('settings.site_name');
        $this->site_title = Config::get('settings.site_title');
        $this->email1 = Config::get('settings.email1');
        $this->email2 = Config::get('settings.email2');
        $this->phone1 = Config::get('settings.phone1');
        $this->phone2 = Config::get('settings.phone2');
        $this->phone3 = Config::get('settings.phone3');
        $this->address = Config::get('settings.address');
    }

    public function save()
    {
        $settings = [
            'site_name' => $this->site_name,
            'site_title' => $this->site_title,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'phone3' => $this->phone3,
            'address' => $this->address
        ];

        foreach($settings as $key => $value) {
            Setting::set($key, $value);
        }

        session()->flash('success', 'Paramètre mise à jour avec succès');
    }

    public function render()
    {
        return view('livewire.settings.general');
    }
}
