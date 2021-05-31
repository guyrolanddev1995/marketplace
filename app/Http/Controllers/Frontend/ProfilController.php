<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $orders = \Auth::user()->orders()->with('products')->orderBy('updated_at', 'desc')->get();
        
        return view('frontend.pages.profils.index', compact('orders'));
    }

    public function update(Request $request)
    {
        $user = User::find(\Auth::id());
        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->back()->with('success', 'Profil mise à jour avec succès');
    }

    public function deleteOrder($code)
    {
        $order = \Auth::user()->orders()->where('code', $code)->first();
        $order->delete();

        return redirect()->back()->with('error', 'Commande annulée');
    }

    public function orderTracking($order)
    {
        $order = Order::where('user_id', \Auth::id())
                    ->where('code', $order)
                    ->first();

        $trackings = $order->trackings;

        dd($trackings);
    }
}
