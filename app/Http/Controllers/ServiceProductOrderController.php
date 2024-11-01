<?php

namespace App\Http\Controllers;

use App\Models\Billingdetails;
use App\Models\customers;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\serviceOrderCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Http;

class ServiceProductOrderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //service_product_order
    function service_product_order(){
        $serviceproductorders = serviceOrderCart::where('mobile_verify', null)->get();
        return view('backend.serviceproduct.serviceproductorder',[
            'serviceproductorders'=>$serviceproductorders,
        ]);
    }

    //service_product_order
    function service_product_order_led(){
        $serviceproductorders = serviceOrderCart::where('mobile_verify', '!=', null)->get();
        return view('backend.serviceproduct.serviceproductorderled',[
            'serviceproductorders'=>$serviceproductorders,
        ]);
    }


// service_product_order_edit
function service_product_order_update(Request $request){

serviceOrderCart::where('id', $request->id)->update([
    'permission' => $request->permission,
]);
$serviceOrderCart = serviceOrderCart::find($request->id);
if (serviceOrderCart::where('id', $request->id)->exists()) {
    $order_id = 'INV'.'-'.rand(10000000,99999999);
    // Create an order

    if($serviceOrderCart->status == 1){
        $order = Order::create([
            'order_id' => $order_id,
            'added_by' => 43,
            'delivery_date' => Carbon::now(),
            'invoice_id' => $order_id,
            'sub_total' => $serviceOrderCart->sub_total,
            'discount' => 0,
            'paid' => $serviceOrderCart->total,
            'due' => 0,
            'company_name' => 'Nugortechit',
            'lead_customer' => 1,
            'order_note' => $serviceOrderCart->note,
            'created_at' => Carbon::now(),
        ]);
    }
    else{
        $order = Order::create([
            'order_id' => $order_id,
            'added_by' => 43,
            'delivery_date' => Carbon::now(),
            'invoice_id' => $order_id,
            'sub_total' => $serviceOrderCart->sub_total,
            'discount' => 0,
            'paid' => 0,
            'due' => $serviceOrderCart->total,
            'company_name' => 'Nugortechit',
            'lead_customer' => 1,
            'order_note' => $serviceOrderCart->note,
            'created_at' => Carbon::now(),
        ]);
    }


    // Create billing details
    Billingdetails::create([
        'order_id' => $order_id,
        'customer_name' => $serviceOrderCart->name,
        'customer_phone' => $serviceOrderCart->phone,
        'customer_address' => null,
        'busines_name' => $serviceOrderCart->business_name,
        'customer_email' => null,
        'created_at' => Carbon::now(),
    ]);

    // Create billing details
    if(customers::where('customer_phone', $serviceOrderCart->phone)->exists()){
        customers::where('customer_phone', $serviceOrderCart->phone)->update([
            'customer_name' => $serviceOrderCart->name,
            'customer_phone' => $serviceOrderCart->phone,
            'customer_address' => null,
            'busines_name' => $serviceOrderCart->business_name,
            'customer_email' => null,
            'created_at' => Carbon::now(),
        ]);
    }
    else{
        customers::create([
            'added_by' => 43,
            'customer_name' => $serviceOrderCart->name,
            'customer_phone' => $serviceOrderCart->phone,
            'customer_address' => null,
            'busines_name' => $serviceOrderCart->business_name,
            'customer_email' => null,
            'created_at' => Carbon::now(),
        ]);
    }

    OrderProduct::create([
        'order_id' => $order_id,
        'product_id' => $serviceOrderCart->product_id,
        'quantity' => $serviceOrderCart->quantity,
        'price' => $serviceOrderCart->price,
    ]);

    $smsqApiKey = "RUJ5s4yijCz2HAQKzpMk";
    // $smsqClientId = "e9d52cb4-e058-406c-a8ac-30edee778177";
    $smsqSenderId = "8809617618342";
    $smsqMessage = 'Dear ' .$serviceOrderCart->name.',
Thank you for placing your order with Nugortech IT!
Order Number: #'.$order_id.'
Our team will begin working on your order shortly. Expect updates soon!

Best Regards,
Nugortech IT
www.nugortechit.com';

    $smsqMessage = urlencode($smsqMessage);
    $smsqMobileNumbers = '+88' .$serviceOrderCart->phone;

    $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

    $response = Http::get($smsqUrl);
    Log::info('SMSQ API Response: ' . $response->status());
    if ($response->successful()) {
        $serviceOrderCart->delete();
        return back()->withSuccess('Order added successfully.');
    } else {
        Log::error("SMSQ API Request failed. Response: " . $response->status());
        return back()->withErrors(['sms_error' => 'Failed to send SMS to customer.']);
    }
        } else {
            echo null;
        }
        return back()->withSuccess('Updated successfully');
    }

    // service_product_order_delete
    function service_product_order_delete($id){
        serviceOrderCart::find($id)->delete();
        return back()->withSuccess('Order deleted successfully');
    }
}
