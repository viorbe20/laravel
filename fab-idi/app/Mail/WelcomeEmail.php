<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;       
    public function build()
    {
        return $this->view('mail.welcome')
        ->from('vobernier@.com', 'Q Software')
        ->subject('Hello & Welcome!')
        ->replyTo('viorbe20@gmail.com', 'Q Software');
    }
}
