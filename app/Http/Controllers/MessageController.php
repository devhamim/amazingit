<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    //message_view
    function message_view(){
        return view('backend.message.profile');
    }

    //message_sent
    function message_sent(Request $request){
        $smsqApiKey = "R2yrTVtSRQyHlXbWFYOO";
        $smsqSenderId = "8809617622754";
        $smsqMessage = $request->message;

        $smsqMessage = urlencode($smsqMessage);
        $smsqMobileNumbers = '+88' .$request->number;

        $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

        $response = Http::get($smsqUrl);
        if ($response->successful()) {
            return back()->withSuccess('Message send successfully.');
        } else {
            Log::error("SMSQ API Request failed. Response: " . $response->status());
            return back()->withErrors(['sms_error' => 'Failed to send SMS to customer.']);
        }
    }
}
