<?php

namespace App\Http\Controllers\Email;

use App\Mail\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function kirim()
    {
        Mail::to('febiwahyu469@gmail.com')->send(new Email());

    }

    public function attach()
    {
        // 
    }
}
