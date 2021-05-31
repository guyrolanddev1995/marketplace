<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.pages.home');
    }

    public function getLatestOrders()
    {
        $orders = Order::where('status', '0')
                        ->with('')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return response()->json($orders);
    }
}
