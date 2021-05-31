<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $productCounts = Product::where('status', 1)
                                ->count();

        $stock_epuise = Product::where("quantity", '<=', 'stock')->count();

        $users = User::count();
        
        return view('livewire.notifications', [
            'users' => $users,
            'stock_epuise' => $stock_epuise,
            'productCounts' => $productCounts
        ]);
    }
}
