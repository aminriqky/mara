<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailGround extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $horizontal, $vertikal, $nama_lokasi, $deskripsi;

    public function __construct($name, $horizontal, $vertikal, $nama_lokasi, $deskripsi)
    {
        $this->name = $name;
        $this->horizontal = $horizontal;
        $this->vertikal = $vertikal;
        $this->nama_lokasi = $nama_lokasi;
        $this->deskripsi = $deskripsi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.ground');
    }
}
