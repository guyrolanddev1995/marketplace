<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Devise extends Component
{

    public $code;
    public $devises;

    protected $rules = [
        'code' => 'required',
    ];

    public function save()
    {
       $record = DB::table('currencies')->where('code', $this->code)->first();

       if($record){
            session()->flash('error', 'Cette dévise existe déjà');
       } else {
           Artisan::call('currency:manage', ['action' => 'add', 'currency' => $this->code]);
           $this->code = '';
       }
    }

    public function enable($id)
    {
       $result = DB::table('currencies')
                    ->where('id', $id)
                    ->update(['active' => 1]);
        
        if($result){
            session()->flash('success', 'Dévise activée avec succès');
        }

    }

    public function disable($id)
    {
       $result = DB::table('currencies')
                    ->where('id', $id)
                    ->update(['active' => 0]);
        
        if($result){
            session()->flash('success', 'Dévise désactivée avec succès');
        }

    }

    public function reload()
    {
        Artisan::call('currency:update -o');
    }

    public function delete($id)
    {
        $query = $this->getCurrency($id);
        $devise = $query->first();
        if(!$devise){
            session()->flash('error', 'Cette dévise n\'existse pas');
        }

        $query->delete();

        session()->flash('error', 'dévise supprimée avec succès');
    }

    private function getCurrency($id)
    {
        return DB::table('currencies')->where('id', $id);
    }

    public function render()
    {
        $this->devises = DB::table('currencies')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('livewire.devise');
    }
}
