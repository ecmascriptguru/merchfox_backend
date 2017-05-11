<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Twilio\Jwt\ClientToken;
use File;

class TokenController extends Controller
{
    //
    /**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request)
    {
        $forPage = $request->input('forPage');
        
        $applicationSid = config('services.twilio')['applicationSid'];
        $accountSid = config('services.twilio')['accountSid'];
        $authToken = config('services.twilio')['authToken'];
        // // $appSid = env('TWILIO_APPLICATION_SID');
        $clientToken = new ClientToken($accountSid,$authToken);
        
        $clientToken->allowClientOutgoing($applicationSid);

        // if ($forPage == '/cats') {
        $clientToken->allowClientIncoming('support_agent');
        // } else {
            // $clientToken->allowClientIncoming('customer');
        // }

        $token = $clientToken->generateToken();
        return response()->json($token);
    }
}
