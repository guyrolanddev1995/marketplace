<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderNotification extends Component
{
    public function render()
    {
        $orders = Order::count();
        $orders_waiting = Order::where('status', "0")->count();
        $orders_delivring = Order::where('status', "1")->count();
        $orders_delivred = Order::where('status', "2")->count();

        return view('livewire.order-notification', compact('orders', 'orders_waiting', 'orders_delivred', 'orders_delivring'));
    }
}
