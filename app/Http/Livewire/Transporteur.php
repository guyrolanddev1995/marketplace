<?php

namespace App\Http\Livewire;

use App\Models\Transporteur as ModelsTransporteur;
use Livewire\Component;

class Transporteur extends Component
{
    public $transporteurId;
    public $nom;
    public $description;
    public $frais;
    public $delais;
    
    public $isUpdated = false;

    public $transporteurs;

    protected $rules = [
        'nom' => 'required',
        'description' => 'required',
        'delais' => 'required',
        'frais' => 'required'
    ];

    public function save()
    {
        $this->validate();

        $transporteur = ModelsTransporteur::create([
            'nom' => $this->nom,
            'description' => $this->description,
            'frais' => $this->frais,
            'delais' => $this->delais
        ]);

        if($transporteur){
            $this->cleanUp();
            session()->flash('success', 'Transporteur ajouté avec succèss');
        }
    }

    public function edit($id)
    {
        $transporteur = $this->findTransprteur($id);

        $this->isUpdated = true;
        $this->transporteurId = $transporteur->id;

        $this->nom = $transporteur->nom;
        $this->description = $transporteur->description;
        $this->frais = $transporteur->frais;
        $this->delais = $transporteur->delais;
    }

    public function cancel()
    {
        $this->cleanUp();
        $this->isUpdated = false;
    }

    public function update()
    {
        $this->validate();

        $transporteur = $this->findTransprteur($this->transporteurId);
        $transporteur->update([
            'nom' => $this->nom,
            'description' => $this->description,
            'frais' => $this->frais,
            'delais' => $this->delais
        ]);

        if($transporteur){
            $this->cleanUp();
            $this->isUpdated = false;
            session()->flash('success', 'Transporteur mise à jour avec succèss');
        }
    }


    public function delete($id)
    {
        $transporteur = $this->findTransprteur($id);

        if ($transporteur != null) {
            $transporteur->delete();
            session()->flash('error', 'Transporteur supprimée avec succèss');
            return redirect()->back();
        }
    }

    private function findTransprteur($id)
    {
        return ModelsTransporteur::where('id',$id)->first();
    }

    private function cleanUp()
    {
        $this->nom = '';
        $this->delais = '';
        $this->frais = '';
        $this->description = '';
        $this->id = '';
    }

    public function render()
    {
        $this->transporteurs = ModelsTransporteur::orderBy('created_at', 'desc')->get();
        return view('livewire.transporteur');
    }
}
