<?php

namespace App\Http\Controllers;

use App\Models\serviceOrderCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UddoktaPay\LaravelSDK\UddoktaPay;

class pandingcustomerdashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pandingcustomer');
    }

    // panding_customer_dashboard
    function panding_customer_dashboard(){
        return view('customer.panding_customer_dashboard');
    }

    // customer_order_history
    function customer_history(){

        $serviceproductorders = serviceOrderCart::where('phone', Auth::guard('customerreg')->user()->phone)->get();
        return view('customer.history', [
            'serviceproductorders'=>$serviceproductorders,
        ]);
    }

    // pay_due
    function pay_due(Request $request){

        $service_cart_id = $request->id;
        $request->session()->put('service_cart_id', $service_cart_id);

        $apiKey = "c3684b1473dc5b5ab83ec6c9786a4367881b2cae";
        $apiBaseURL = "https://pay.nugortechit.com/api/checkout-v2";
        $uddoktaPay = new UddoktaPay($apiKey, $apiBaseURL);

        $requestData = [
            'full_name'     => $request->name,
            'email'         => "test@test.com",
            'amount'        => $request->total,
            'metadata'      => [
                'example_metadata_key' => "example_metadata_value",
            ],
            'redirect_url'  => route('service.order.success'),
            'return_type'   => 'GET',
            'cancel_url'    => route('service.order.cancel'),
            'webhook_url'   => route('service.order.ipn'),
        ];

        try {
            // Initiate payment
            $paymentUrl = $uddoktaPay->initPayment($requestData);
            return redirect($paymentUrl);
        } catch (\Exception $e) {
            return back()->with('error', "Initialization Error: " . $e->getMessage());
        }
    }
}
