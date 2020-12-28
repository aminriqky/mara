<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SiagaFlame extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $flame, $flame2;
    
    public function __construct($name, $flame, $flame2)
    {
        $this->name = $name;
        $this->flame = $flame;
        $this->flame2 = $flame2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.siaga_flame');
    }
}
