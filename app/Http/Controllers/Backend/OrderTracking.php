<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderTracking extends Controller
{
    public function index($code)
    {
        $order = $this->findOrder($code);
        $trackings = $order->trackings;

        return view('backend.pages.order.tracking', compact('order'));
    }

    public function getTrackings($code)
    {
        $order = $this->findOrder($code);
        return $order->trackings;
    }

    public function saveTracking(Request $request, $code)
    {
        $order = $this->findOrder($code);
        $tracking = $order->trackings()->create([
           'location' => $request->location,
           'status' => '0'
        ]);

        if($tracking){
            return response()->json([
                'code' => 'success',
                'data' => $tracking
            ]);
        }
    }

    public function startTracking(Request $request, $code)
    {
       $order = $this->findOrder($code);

       $tracking = $this->findLocation($request->id);

       $tracking->update([
           'status' => "1"
       ]);

        if($tracking){
            $api = "kouassibrouricky@gmail.com";
            $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
            $msg = "Votre commande est en cour de livraison pour ".$tracking->location; // le message à envoyer à l'utilisateur
            $receiver = "225".$order->phone1; // le numero de l'utilisateur
            $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
            $cltmsgid = 1;

            $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

            $response = Http::get($url);

            return response()->json([
                'code' => 'success',
            ]);
        }

    }

    public function completedTracking(Request $request, $code)
    {
       $order = $this->findOrder($code);

       $tracking = $this->findLocation($request->id);
       
       $tracking->update([
           'status' => "2"
       ]);

        if($tracking){
            $api = "kouassibrouricky@gmail.com";
            $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
            $msg = "Votre commande est a present a ".$tracking->location; // le message à envoyer à l'utilisateur
            $receiver = "225".$order->phone1; // le numero de l'utilisateur
            $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
            $cltmsgid = 1;

            $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

            $response = Http::get($url);

            return response()->json([
                'code' => 'success',
            ]);
        }

    }

    private function findOrder($code)
    {
        return Order::where('code', $code)->first();
    }

    private function findLocation($id)
    {
        return Tracking::find($id);
    }
}
