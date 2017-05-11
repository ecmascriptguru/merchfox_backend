<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwilioController extends Controller
{
    //
    public function index(){
        return view('Twilio.index');
    }
}
