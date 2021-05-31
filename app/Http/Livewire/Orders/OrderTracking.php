<?php

namespace App\Http\Livewire\Orders;

use App\Mail\OrderTrackingConfirmMail;
use App\Mail\OrderTrackingMail;
use App\Models\Order;
use App\Models\Tracking;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderTracking extends Component
{
    public $order;
    public $destination;
    public $trackings;
    public $user;

    public function mount($order)
    {
        $this->order = $order;
        $this->user = $order->customer;
    }

    public function save()
    {
        $this->validate([
            'destination' => 'required',
        ]);

       $this->order->trackings()->create([
           'location' => $this->destination,
           'status' => '0'
       ]);

       $this->destination = "";
       session()->flash('success', 'Nouvelle destination enregistrée avec succès');
    }

    public function startTracking($id)
    {
    
        $tracking = Tracking::find($id);
        if($tracking){
            $result = $tracking->update([
                'status' => "1"
            ]);

            if($result){
                $api = "kouassibrouricky@gmail.com";
                $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
                $msg = "Votre commande est en cour de livraison pour ".$tracking->location; // le message à envoyer à l'utilisateur
                $receiver = $this->order->phone1; // le numero de l'utilisateur
                $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
                $cltmsgid = 1;

                $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

                $response = Http::get($url);

                Mail::to($this->user->email)->send(new OrderTrackingMail($tracking));

                session()->flash('success', 'Commande en cour de livraison pour ' .$tracking->location);
            }
        }
    }

    public function completeTracking($id)
    {
        $tracking = Tracking::find($id);
        if($tracking){
            $result = $tracking->update([
                'status' => "2"
            ]);
            
            if($result){
                $api = "kouassibrouricky@gmail.com";
                $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl"; // Tu renseigne le cle secrete de ton api
                $msg = "Votre commande est a present a ".$tracking->location; // le message à envoyer à l'utilisateur
                $receiver = $this->order->phone1; // le numero de l'utilisateur
                $sender = "BINGUE CF"; // le nom à afficher sur la messagerie d'utilisateur
                $cltmsgid = 1;

                $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

                $response = Http::get($url);

                Mail::to($this->user->email)->send(new OrderTrackingConfirmMail($tracking));

                session()->flash('success', 'commande disponible à ' .$tracking->location);
            }

            
        }
    }

    public function delete($id)
    {
        $tracking = Tracking::where('id',$id)->first();

        if ($tracking != null) {
            $tracking->delete();
            session()->flash('error', 'Destination supprimée avec succèss');
            return redirect()->back();
        }
    }

    public function render()
    {
        $order = Order::where('code', $this->order->code)->first();
        $this->trackings = $order->trackings;

        return view('livewire.orders.order-tracking');
    }
}
