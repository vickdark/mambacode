<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('[Contacto MambaCode] ' . ($this->data['subject'] ?? 'Nuevo mensaje'))
                    ->view('emails.contact')
                    ->with(['data' => $this->data]);
    }
}
