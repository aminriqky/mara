<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFlame extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $suhu, $nama_lokasi, $deskripsi;

    public function __construct($name, $suhu, $nama_lokasi, $deskripsi)
    {
        $this->name = $name;
        $this->suhu = $suhu;
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
        return $this->view('email.flame');
    }
}
