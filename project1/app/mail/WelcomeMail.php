<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class WelcomeMail extends Mailable
{
    public function build()
    {
        return $this->subject('Welcome')
                    ->view('emails.welcome');
    }
}