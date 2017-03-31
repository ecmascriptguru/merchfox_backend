<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth;
use App\User;

class APIController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return Response::json([
            	'status' => true
            ]);
        }
    }
}
