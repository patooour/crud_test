<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\MailgunEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){
        Mail::to('patooour@gmail.com')->send(new MailgunEmail('hi there from mail G welcome'));

        return 'Mail sent';
    }
}
