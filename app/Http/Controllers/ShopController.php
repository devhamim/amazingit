<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\customers;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ShopOrderProduct;
use App\Models\ShopProduct;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Http;
use UddoktaPay\LaravelSDK\UddoktaPay;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    // product_checkout_view
    function product_checkout_view(Request $request){
        $shopproduct = ShopProduct::where('id', $request->product_id)->first();
        return view('frontend.product.checkout',[
            'shopproduct'=>$shopproduct,
        ]);
    }

    // shop_product_checkout
    function shop_product_checkout(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required|min:11|max:11',
            'email'=>'required',
        ]);

        $lastOrder = ShopOrderProduct::orderBy('id', 'desc')->first();
        if ($lastOrder) {
            $lastOrderId = $lastOrder->order_id;
            $lastOrderNumber = intval(substr($lastOrderId, 4));
        } else {
            $lastOrderNumber = 0;
        }
        $newOrderNumber = $lastOrderNumber + 1;

        $order_id = 'NIT-' . str_pad($newOrderNumber, 8, '0', STR_PAD_LEFT);

        if($request->coupon){
            $request->validate([
                'coupon_name'=>'required',
            ]);
            $coupon_name = Coupon::where('coupon_name', $request->coupon)->first();
            $coupons = $coupon_name->coupon_amount;
        }
        else{
          $coupons = 0;
        }


        $price = ShopProduct::where('id', $request->shopproduct_id)->first()->price;
        $aftercoupon = $price*$coupons/100;
        $mobile_verify = rand(100000,999999);

        $shoporder_id =  ShopOrderProduct::insertGetId([
            'order_id'=>$order_id,
            'shopproduct_id'=> $request->shopproduct_id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'note'=> $request->note,
            'mobile_verify'=> $mobile_verify,
            'price'=> $price,
            'coupon'=> $coupons,
            'total'=> $price-$aftercoupon,
            'created_at'=>Carbon::now(),
        ]);

        $smsqApiKey = "RUJ5s4yijCz2HAQKzpMk";
        // $smsqClientId = "e9d52cb4-e058-406c-a8ac-30edee778177";
        $smsqSenderId = "8809617618342";
        $smsqMessage = 'Your Nugortech IT 6 digit verify code is '.$mobile_verify;

        $smsqMessage = urlencode($smsqMessage);
        $smsqMobileNumbers = '+88' .$request->phone;

        $smsqUrl = "http://139.99.39.237/api/smsapi?api_key=$smsqApiKey&type=text&number=$smsqMobileNumbers&senderid=$smsqSenderId&message=$smsqMessage";

        $response = Http::get($smsqUrl);

        $request->session()->put('mobile_verify', $mobile_verify);
        $request->session()->put('phone', $request->phone);
        $request->session()->put('shoporder_id', $shoporder_id);

        return redirect()->route('product.mobile.varify');

    }

    // product_mobile_varify
    function product_mobile_varify(){
        return view('frontend.product.mobile_varify');
    }

    // shop_number_otp
    function shop_number_otp(Request $request){
        $number_verify = $request->session()->get('mobile_verify');
        $phone_number = $request->session()->get('phone');
        $shoporder_id = $request->session()->get('shoporder_id');

            $mobile_otp =  $request->mobile_varify_code;
            $shoporders = ShopOrderProduct::where('id', $shoporder_id)->first();

            if($mobile_otp == $number_verify){

                if(customers::where('customer_phone', $phone_number)->exists()){
                    $customer_num = customers::where('customer_phone', $phone_number)->first();
                    if($customer_num){
                        Auth::guard('customerauth')->loginUsingId($customer_num->id);
                    }
                } else {
                    customers::insert([
                        'added_by'=>0,
                        'customer_name'=>$shoporders->name,
                        'customer_phone'=>$phone_number,
                        'busines_name'=>'N/A',
                        'customer_email'=>$shoporders->email,
                        'mobile_verify'=>null,
                        'created_at'=>Carbon::now(),
                    ]);

                    $customer_num = customers::where('customer_phone', $phone_number)->first();
                    if($customer_num){
                        Auth::guard('customerauth')->loginUsingId($customer_num->id);
                    }
                }

                $shoporders->update([
                    'mobile_verify'=> null,
                ]);
                $request->session()->forget('mobile_verify');
                $request->session()->forget('phone');

                $apiKey = "c3684b1473dc5b5ab83ec6c9786a4367881b2cae";
                $apiBaseURL = "https://pay.nugortechit.com/api/checkout-v2";
                $uddoktaPay = new UddoktaPay($apiKey, $apiBaseURL);

                $requestData = [
                    'full_name'     => $shoporders->name,
                    'email'         => "test@test.com",
                    'amount'        => $shoporders->total,
                    'metadata'      => [
                        'example_metadata_key' => "example_metadata_value",
                    ],
                    'redirect_url'  => route('shop.order.success'),
                    'return_type'   => 'GET',
                    'cancel_url'    => route('shop.order.cancel'),
                    'webhook_url'   => route('shop.order.ipn'),
                ];

                try {
                    // Initiate payment
                    $paymentUrl = $uddoktaPay->initPayment($requestData);
                    return redirect($paymentUrl);
                } catch (\Exception $e) {
                    return back()->with('error', "Initialization Error: " . $e->getMessage());
                }
                // demo redirect
                // return redirect()->route('shop.order.success')->with('success', 'order success');
            }
            else {
                return back()->with('error', 'OTP not match');
            }
    }


    // shop_order_success
    function shop_order_success(Request $request){
        $shoporder_id = $request->session()->get('shoporder_id');
        $shopproduct = ShopOrderProduct::findOrFail($shoporder_id);
        $shopproduct->update(['status' => 1]);
        return redirect()->route('customer.shop.history');
    }

    // shop_order_cancel\
    function shop_order_cancel(Request $request){
        $shoporder_id = $request->session()->get('shoporder_id');
        $shopproduct = ShopOrderProduct::findOrFail($shoporder_id);
        $shopproduct->update(['status' => 0]);
        return redirect('/');
    }
    // shop_order_ipn\
    function shop_order_ipn(){
        return redirect('/');
    }


    // shop
    // function shop(Request $request) {
    //     $categories = Category::all();
    //     $sizes = Size::all();
    //     $colors = Color::all();
    //     $brands = Brand::all();

    //     $data = $request->all();

    //     $sorting = 'created_at';
    //     $type = 'DESC';

    //     if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined') {
    //         if($data['sort'] == 1) {
    //             $sorting = 'after_discount';
    //             $type = 'ASC';
    //         }
    //         else if($data['sort'] == 2) {
    //             $sorting = 'after_discount';
    //             $type = 'DESC';
    //         }
    //         else if($data['sort'] == 3) {
    //             $sorting = 'product_name';
    //             $type = 'ASC';
    //         }
    //         else if($data['sort'] == 4) {
    //             $sorting = 'product_name';
    //             $type = 'DESC';
    //         }
    //         else if($data['sort'] == 5) {
    //             $sorting = 'product_discount';
    //             $type = 'ASC';
    //         }
    //         else if($data['sort'] == 4) {
    //             $sorting = 'product_discount';
    //             $type = 'DESC';
    //         }
    //     }

    //     $search_product = Product::where(function($q) use ($data) {
    //         if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined') {
    //             $q->where(function ($q) use ($data) {
    //                 $q->where('product_name', 'like', '%' . $data['q'] . '%');
    //                 $q->OrWhere('description', 'like', '%' . $data['q'] . '%');
    //             });
    //         }
    //         if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined') {
    //             $q->where('category_id', $data['category_id']);
    //         }
    //         if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined' || !empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined') {
    //             $q->whereHas('rel_to_inventories', function($q) use ($data) {
    //                 if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined') {
    //                     $q->whereHas('rel_to_color', function($q) use ($data) {
    //                         $q->where("colors.id", $data['color_id']);
    //                     });
    //                 }
    //                 if(!empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined') {
    //                     $q->whereHas('rel_to_size', function($q) use ($data) {
    //                         $q->where("sizes.id", $data['size_id']);
    //                     });
    //                 }
    //             });
    //         }
    //         if(!empty($data['brand_id']) && $data['brand_id'] != '' && $data['brand_id'] != 'undefined') {
    //             $q->where('brand', $data['brand_id']);
    //         }
    //     })->orderBy($sorting, $type)->get();

    //     return view('frontend.shop.shop', [
    //         'categories' => $categories,
    //         'search_product' => $search_product,
    //         'colors' => $colors,
    //         'sizes' => $sizes,
    //         'brands' => $brands,
    //     ]);
    //     // return $data;

    //     // echo '<pre>';
    //     // echo($products);
    //     // die();
    //     // $products = Product::where('status', '1')->get();
    //     // $colors = Color::all();
    //     // $sizes = Size::all();





    //     // if(!empty($_GET['category'])) {
    //     //     $id = explode(',', $_GET['category']);
    //     //     $category_ids = Category::select('id')->whereIn('id', $id)->pluck('id')->toArray();
    //     //     $products = $products->whereIn('category_id', $category_ids);
    //     // }


    //     // sortby
    //     // if(!empty($_GET['sortBy'])) {
    //     //     if($_GET['sortBy'] == 'priceAsc') {
    //     //         $products = $products->sortBy('after_discount');
    //     //     }
    //     //     if($_GET['sortBy'] == 'priceDesc') {
    //     //         $products = $products->sortByDesc('after_discount');
    //     //     }
    //     //     if($_GET['sortBy'] == 'titleAsc') {
    //     //         $products = $products->sortBy('product_name');
    //     //     }
    //     //     if($_GET['sortBy'] == 'titleDesc') {
    //     //         $products = $products->sortByDesc('product_name');
    //     //     }
    //     //     if($_GET['sortBy'] == 'disAsc') {
    //     //         $products = $products->sortBy('product_discount');
    //     //     }
    //     //     if($_GET['sortBy'] == 'disDesc') {
    //     //         $products = $products->sortByDesc('product_discount');
    //     //     }
    //     // }

    //     // if(!empty($_GET['brand'])) {
    //     //     $id = explode(',', $_GET['brand']);
    //     //     $brand_ids = Brand::select('id')->whereIn('id', $id)->pluck('id')->toArray();
    //     //     $products = $products->whereIn('brand', $brand_ids);
    //     // }
    //     // if(!empty($_GET['size'])) {
    //     //     $id = explode(',', $_GET['size']);
    //     //     $brand_ids = Inventory::select('size_id')->whereIn('size_id', $id)->pluck('id')->toArray();
    //     //     return $brand_ids;
    //     // }
    //     // $brands = Brand::with('products')->orderBy('brand_name', 'ASC')->get();
    //     // $category = Category::with('products')->orderBy('category_name', 'ASC')->get();
    //     // return view('frontend.shop.shop', [
    //     //     'categories' => $category,
    //     //     'products' => $products,
    //     //     'colors' => $colors,
    //     //     'brands' => $brands,
    //     //     'sizes' => $sizes,
    //     // ]);
    // }

    // function shop_filter(Request $request) {
    //     $data = $request->all();
    //     // Category filter
    //     $searchUrl = '';
    //     if(!empty($data['category'])) {
    //         foreach($data['category'] as $category) {
    //             if(empty($searchUrl)) {
    //                 $searchUrl .= '&category='.$category;
    //             } else {
    //                 $searchUrl .= ','.$category;
    //             }
    //         }
    //     }

    //     // Sort filter
    //     $sortByUrl = "";
    //     if(!empty($data['sortBy'])) {
    //         $sortByUrl .='&sortBy='.$data['sortBy'];
    //     }

    //     // Brand filter
    //     $brandUrl = "";
    //     if(!empty($data['brand'])) {
    //         foreach($data['brand'] as $brand) {
    //             if(empty($brandUrl)) {
    //                 $brandUrl .= '&brand='.$brand;
    //             } else {
    //                 $brandUrl .= ','.$brand;
    //             }
    //         }
    //         // dd($data);
    //         // $sortByBrand .='&brand='.$data['brand'];
    //     }

    //     // Size filter
    //     $sizeUrl = "";
    //     if(!empty($data['size'])) {
    //         foreach($data['size'] as $size) {
    //             if(empty($sizeUrl)) {
    //                 $sizeUrl .= '&size='.$size;
    //             } else {
    //                 $sizeUrl .= ','.$size;
    //             }
    //         }
    //     }

    //     return \redirect()->route('shop', $searchUrl.$sortByUrl.$brandUrl.$sizeUrl);
    //     // return \redirect()->route('shop', $searchUrl.$sortByUrl);
    // }
}
