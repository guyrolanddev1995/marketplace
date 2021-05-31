<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderDelivredMail;
use App\Mail\OrderValidatedEmail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')
                     ->with('country')
                     ->get();

        $collection = collect($orders);

        $en_attentes =  $collection->filter(function($value, $key){
            return $value->status == 0;
        })->all();
 
         $en_cours = $collection->filter(function($value, $key){
             return $value->status == 1;
         })->all();
 
         $livres = $collection->filter(function($value, $key){
             return $value->status == 2;
         })->all();

        return view('backend.pages.order.index', compact('orders', 'en_attentes', 'en_cours', 'livres'));
    }

    public function show($code)
    {
        $order = order::where('code', $code)->first()
                    ->load('country','transporteur');
                    
        $products = $order->products()->get();

        return view('backend.pages.order.show', compact('order', 'products'));
    }

    public function update($code)
    {
        $order = order::where('code', $code)->first();
        $user = $order->customer;

        $order->update(['status' => '1']);

        $products = $order->products;

        foreach($products as $item)
        {
           $product = Product::find($item->id);
           $quantity = $item->pivot->quantity;
           
           $product->update([
               'quantity' => $product->quantity - $quantity
           ]);
        }

        $api = "kouassibrouricky@gmail.com";
        $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
        $msg = "Votre commande a ete validee et en attente de livraison pour ".$order->ville; // le message à envoyer à l'utilisateur
        $receiver = $order->phone1; // le numero de l'utilisateur
        $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
        $cltmsgid = 1;

        $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

        $response = Http::get($url);

        Mail::to($user->email)->send(new OrderValidatedEmail($order));

        return redirect()->back()->with('success', 'Commande validée avec succès');
    }

    public function delete($code)
    {
        $order = Order::where('code', $code)->first();
        $order->delete();

        return redirect()->back()->with('error', 'Commande supprimée avec succès');
    }

    public function trackingOrder($code)
    {
        $order = order::where('code', $code)->first();
        return view('backend.pages.order.tracking', compact('order'));
    }

    public function confirmDelivery($code){
        $order = order::where('code', $code)->first();
        $user = $order->customer;

        $order->update(['status' => '2']);

        if($order){
            $api = "kouassibrouricky@gmail.com";
            $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
            $msg = "Votre marchandise est a present disponible. Rendez-vous en agence pour le retrait de votre marchandise"; // le message à envoyer à l'utilisateur
            $receiver = $order->phone1; // le numero de l'utilisateur
            $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
            $cltmsgid = 1;
    
            $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";
    
            $response = Http::get($url);

            Mail::to($user->email)->send(new OrderDelivredMail($order));
    
            return redirect()->back()->with('success', 'Commande livrée avec succès');
        }        
    }
}
