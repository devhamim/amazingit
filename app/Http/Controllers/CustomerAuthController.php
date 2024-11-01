<?php

namespace App\Http\Controllers;

use App\Models\customer_registers;
use App\Models\CustomerAuth;
use App\Models\customers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Http;

class CustomerAuthController extends Controller
{

    // customer_login
    function customer_login(){
        return view('customer.customer_login');
    }

    // customer_number_login
    function customer_number_login(Request $request){
        if(customers::where('customer_phone', $request->number)->exists()){
            $verify_code = rand(100000, 999999);
            customers::where('customer_phone', $request->number)->update([
                'mobile_verify'=>$verify_code,
            ]);

            $smsqApiKey = "RUJ5s4yijCz2HAQKzpMk";
            // $smsqClientId = "e9d52cb4-e058-406c-a8ac-30edee778177";
            $smsqSenderId = "8809617618342";
            $smsqMessage = 'Your nugortechit 6 digit verify code is '.$verify_code;

            $smsqMessage = urlencode($smsqMessage);
            $smsqMobileNumbers = '+88' .$request->number;

            $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

            $response = Http::get($smsqUrl);

            $request->session()->put('mobile_verify', $verify_code);
            $request->session()->put('phone_number', $request->number);

            return redirect()->route('customer.verify.view');
        }
        // elseif(customer_registers::where('phone', $request->number)->exists()){
        //     $verify_code = rand(100000, 999999);
        //     customer_registers::where('phone', $request->number)->update([
        //         'mobile_verify'=>$verify_code,
        //     ]);

        //     $smsqApiKey = "OwvBJvQgd/a6OmOiw7lKD73ZUgZ9StYVMNmpmrn1vV0=";
        //     $smsqClientId = "e9d52cb4-e058-406c-a8ac-30edee778177";
        //     $smsqSenderId = "8809617620771";
        //     $smsqMessage = 'Your nugortechit 6 digit verify code is '.$verify_code;

        //     $smsqMessage = urlencode($smsqMessage);
        //     $smsqMobileNumbers = '+88' .$request->number;

        //     $smsqUrl = "https://api.smsq.global/api/v2/SendSMS?ApiKey=$smsqApiKey&ClientId=$smsqClientId&SenderId=$smsqSenderId&Message=$smsqMessage&MobileNumbers=$smsqMobileNumbers";

        //     $response = Http::get($smsqUrl);

        //     $request->session()->put('mobile_verify', $verify_code);
        //     $request->session()->put('phone_number', $request->number);

        //     return redirect()->route('customer.verify.view');
        // }
        else{
            return redirect()->route('customer.registers')->with('error', 'You are not register please register your account');
        }
    }

    // customer_verify_view
    function customer_verify_view(){
        return view('customer.customer_number_verify');
    }

    // customer_verify
    function customer_verify(Request $request){
        $number_verify = $request->session()->get('mobile_verify');
        $phone_number = $request->session()->get('phone_number');
        if($request->verify == $number_verify){
            if(customers::where('customer_phone', $phone_number)->exists()){
                $customer = customers::where('customer_phone', $phone_number)->first();
                if($customer){
                    Auth::guard('customerauth')->loginUsingId($customer->id);

                    $customer->update([
                        'mobile_verify'=>null,
                    ]);
                    $request->session()->forget('mobile_verify');
                    $request->session()->forget('phone_number');
                    return redirect()->route('customer.dashboard');
                }
            }
            // elseif(customer_registers::where('phone', $phone_number)->exists()){
            //     $reg_customer = customer_registers::where('phone', $phone_number)->first();
            //     if($reg_customer){

            //         Auth::guard('customerreg')->loginUsingId($reg_customer->id);

            //         $reg_customer->update([
            //             'mobile_verify'=>null,
            //         ]);
            //         $request->session()->forget('mobile_verify');
            //         $request->session()->forget('phone_number');
            //         return redirect()->route('panding.customer.dashboard');
            //     }
            // }
            else{
                return back()->with('error', 'Something is wrong, please try again or contact our customer care');
            }


        }
        else{
            return back()->with('error','OTP not match');
        }
    }

    // customer_registers
    function customer_registers(){
        
        return view('customer.customer_registers');
    }

    // customer_web_store
    function customer_web_store(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'business_name'=>'required',
        ]);

        if(customers::where('customer_phone', $request->phone)->exists()){
            return back()->with('error', 'Already registered this number please login!');
        }
        else{
            $mobile_verify = rand(100000, 999999);
            customers::insert([
                'added_by'=>0,
                'customer_name'=>$request->name,
                'customer_phone'=>$request->phone,
                'busines_name'=>$request->business_name,
                'mobile_verify'=>$mobile_verify,
                'created_at'=>Carbon::now(),
            ]);
            $smsqApiKey = "RUJ5s4yijCz2HAQKzpMk";
            // $smsqClientId = "e9d52cb4-e058-406c-a8ac-30edee778177";
            $smsqSenderId = "8809617618342";
            $smsqMessage = 'Your nugortechit 6 digit verify code is '.$mobile_verify;

            $smsqMessage = urlencode($smsqMessage);
            $smsqMobileNumbers = '+88' .$request->phone;

            $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

            $response = Http::get($smsqUrl);

            $request->session()->put('mobile_verify', $mobile_verify);
            $request->session()->put('phone_number', $request->phone);

            return redirect()->route('customer.verify.view');
        }

    }



    // customer_auth_logout
    function customer_auth_logout() {
        Auth::guard('customerauth')->logout();
        // Auth::guard('customerreg')->logout();

        return redirect('/')->withSuccess('Customer successfully logout');
    }




    //social google
    function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();

        if(CustomerAuth::where('email', $user->getEmail())->exists()){
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(), 'password'=>'abc@123'])){
                return redirect('/');
            }
        }
        else{
            CustomerAuth::insert([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'password'=>bcrypt('abc@123'),
                'created_at'=>Carbon::now(),
            ]);
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(), 'password'=>'abc@123'])){
                return redirect('/');
            }
        }
    }


}
