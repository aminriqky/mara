<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BahayaFlood extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $flood, $flood2;
    
    public function __construct($name, $flood, $flood2)
    {
        $this->name = $name;
        $this->flood = $flood;
        $this->flood2 = $flood2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.bahaya_flood');
    }
}
