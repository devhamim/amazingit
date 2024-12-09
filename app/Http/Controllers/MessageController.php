<?php

namespace App\Http\Controllers;

use App\Models\MessageStatus;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    //message_view
    function message_view(){
        $messagestatus = MessageStatus::first();
        return view('backend.message.profile',[
            'messagestatus'=>$messagestatus,
        ]);
    }

    //message_sent
    public function message_sent(Request $request)
{
    $smsqApiKey = "R2yrTVtSRQyHlXbWFYOO";
    $smsqSenderId = "8809617622754";
    $smsqMessage = $request->message;

    $smsqMessage = urlencode($smsqMessage);

    $numbers = explode(',', $request->number);

    $smsqMobileNumbers = implode(',', array_map(fn($number) => '+88' . trim($number), $numbers));

    $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

    $response = Http::get($smsqUrl);

    if ($response->successful()) {
        return back()->withSuccess('Message sent successfully to all numbers.');
    } else {
        Log::error("SMSQ API Request failed. Response: " . $response->status());
        return back()->withErrors(['sms_error' => 'Failed to send SMS to one or more numbers.']);
    }
}

    // function message_sent(Request $request){
    //     $smsqApiKey = "R2yrTVtSRQyHlXbWFYOO";
    //     $smsqSenderId = "8809617622754";
    //     $smsqMessage = $request->message;

    //     $smsqMessage = urlencode($smsqMessage);
    //     $smsqMobileNumbers = '+88' .$request->number;

    //     $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

    //     $response = Http::get($smsqUrl);
    //     if ($response->successful()) {
    //         return back()->withSuccess('Message send successfully.');
    //     } else {
    //         Log::error("SMSQ API Request failed. Response: " . $response->status());
    //         return back()->withErrors(['sms_error' => 'Failed to send SMS to customer.']);
    //     }
    // }

    // message_update
    function message_update(Request $request){
        $validatedData = $request->validate([
            'status' => 'required',
            'ongoing' => 'required',
            'duepayment' => 'required',
            'refund' => 'required',
            'completed' => 'required',
            'canceled' => 'required',
            'orderstore' => 'required',
            'frontorder' => 'required',
        ]);

        $messagestatus = MessageStatus::first();
        $messagestatus->update($validatedData);
        return redirect()->back()->with('success', 'Message status updated successfully.');
    }
}
