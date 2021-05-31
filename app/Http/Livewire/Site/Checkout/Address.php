<?php

namespace App\Http\Livewire\Site\Checkout;

use App\Mail\OrderMail;
use App\Mail\OrderNotification;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Transporteur;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Address extends Component
{
    public $countries;
    public $countryId;
    public $phoneCode;
    public $nom;
    public $prenom;
    public $phone;
    public $code_postal;
    public $adresse;
    public $ville;
    public $transporteur;
    public $transporteur_id;

    protected $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'countryId' => 'required',
        'phone' => 'required',
        'ville' => 'required',
        'adresse' => 'required',
        'transporteur' => 'required'
    ];

    public function mount()
    {
        $this->nom = \Auth::user()->nom;
        $this->prenom = \Auth::user()->prenom;
    }

    public function selectOption($transporteur)
    {
        $this->transporteur = $transporteur;
        $this->emit('priceSelected', $transporteur);
    }

    private function findCountry($id)
    {
        return Country::where('id', $id)->first();
    }

    public function save()
    {
        $this->validate($this->rules, [
            'transporteur.required' => 'Vous devez choisir un transporteur',
            'required' => 'Ce champs est requit'
        ]);

        $code = session('currency');

        $exchange = Currency::where('code', $code)->first()->value('exchange_rate');

        $order = Order::create([
            'code' => "FAC-".\Str::random(6),
            'user_id' => \Auth::user()->id,
            'amount' =>  intval(\Cart::getSubTotal()),
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'phone1' => str_replace('+', '', $this->phoneCode).''.$this->phone,
            'pays_id' => $this->countryId,
            'ville' => $this->ville,
            'adresse' => $this->adresse,
            'currency' => $code,
            'code_postal' => $this->code_postal,
            'transporteur_id' => $this->transporteur ? $this->transporteur['id'] : null,
            'frais_livraison' => $this->transporteur ? $this->transporteur['frais'] * \Cart::getTotalQuantity() : 0
        ]);

        foreach(\Cart::getContent() as $item){
            $order->products()->attach($item->id, ['quantity' => $item->quantity, 'product_price' => $item->price, 'exchange_rate' => $exchange, 'total_price' => ($item->price * $item->quantity)]);
        }

        Mail::to(\Auth::user()->email)->send(new OrderNotification($order->load('country','transporteur','products')));

        \Cart::clear();

        return redirect()->route('check-out.success');
    }

    public function handleCountry()
    {
        $country = $this->findCountry($this->countryId);
        $this->phoneCode = '+'.$country->phonecode;
    }

    public function render()
    {
        $transporteurs  = Transporteur::orderBy('created_at', 'desc')->get();
        $this->countries = Country::orderBy('name', 'asc')->get();

        return view('livewire.site.checkout.address', compact('transporteurs'));
    }
}
