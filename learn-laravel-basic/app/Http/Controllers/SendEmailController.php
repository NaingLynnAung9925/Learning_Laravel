<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Mail\NotifyMail;
use Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from nainglynnaung25799@gmail.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to('scm.nainglynnaung@gmail.com')->send(new NotifyMail($mailData));
        dd("Email is successfully send");
    }
}
