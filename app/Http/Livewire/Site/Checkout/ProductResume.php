<?php

namespace App\Http\Livewire\Site\Checkout;

use Livewire\Component;
use Cart;

class ProductResume extends Component
{
    public $subTitle;
    public $frais_livraison;
    public $total;
    public $transporteur;

    protected $listeners = ['priceSelected' => 'updatePrice'];

    public function mount()
    {
        $this->subTitle = Cart::getSubTotal();
    }

    public function updatePrice($transporteur)
    {
        $this->transporteur = $transporteur;
        $this->frais_livraison = $transporteur['frais'] * Cart::getTotalQuantity();
        $this->total = $this->frais_livraison + $this->subTitle;
        
    }

    public function render()
    {
        
        return view('livewire.site.checkout.product-resume');
    }
}
