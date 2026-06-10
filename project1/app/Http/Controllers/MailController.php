<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function register()
    {
        // Registration logic

        Mail::to('user@example.com')->send(new WelcomeMail());

        return "Registration Successful and Email Sent";
    }
}