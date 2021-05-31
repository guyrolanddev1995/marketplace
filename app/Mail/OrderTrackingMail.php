<?php

namespace App\Mail;

use App\Models\Tracking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderTrackingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tracking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tracking $tracking)
    {
        $this->tracking = $tracking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.suivieDeCommande.blade');
    }
}