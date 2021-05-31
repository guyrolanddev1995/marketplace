<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductWidget extends Component
{
    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')
                            ->limit(6)
                            ->get();
        return view('livewire.product-widget', compact('products'));
    }
}
