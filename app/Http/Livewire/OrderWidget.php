<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderWidget extends Component
{
    public function render()
    {
        $orders = Order::where('status', "0")
                    ->withCount('products')
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();

        return view('livewire.order-widget', [
            'orders' => $orders
        ]);
    }
}
