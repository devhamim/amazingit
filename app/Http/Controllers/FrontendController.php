<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\cliend;
use App\Models\Comment;
use App\Models\consultancy;
use App\Models\Coupon;
use App\Models\customer_registers;
use App\Models\customers;
use App\Models\Inventory;
use App\Models\Meta;
use App\Models\Order;
use App\Models\privacy_policy;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductGallery;
use App\Models\protfolio;
use App\Models\protfoliogallery;
use App\Models\serviceOrderCart;
use App\Models\shopcategory;
use App\Models\ShopProduct;
use App\Models\shopproductgallery;
use App\Models\subscribe;
use App\Models\team;
use App\Models\terms_condition;
use App\Models\testmonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use UddoktaPay\LaravelSDK\UddoktaPay;
use Http;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{

    //home
    function home() {
        $categories = Category::all();
        $category= Category::where('status', 1)->take(8)->get();
        $products = Product::where('status', '1')->get();
        // $top_selling_products = Order::groupBy('product_id')
        // ->selectRaw('sum(total) as sum, product_id')
        // ->havingRaw('sum >= 1')
        // ->take(3)
        // ->orderBy('sum', 'DESC')
        // ->get();
        $latest_products = Product::where('status', '1')->latest()->get();
        $discount_products = Product::where('status', '1')->where('product_discount', '!=', null)->get();
        // $discount_products_count = Product::where('status', '1')->where('product_discount', '!=', null)->where('validity', '>', Carbon::now())->get();
        $banners = banner::all();
        $portfolios = protfolio::where('status', 1)->get();
        $testmonials = testmonial::where('status', 1)->get();
        $teams = team::where('status', 1)->get();
        $cliends = cliend::where('status', 1)->get();
        $blogs = Blogs::where('status', 1)->take(3)->get();


        $metaSettings = Meta::where('pages', 'home')->where('status', 1)->first();

        return view('frontend.home.index', [
            'categories' => $categories,
            'categoryy' => $category,
            'products' => $products,
            'latest_products' => $latest_products,
            // 'top_selling_products' => $top_selling_products,
            'discount_products' => $discount_products,
            'banners' => $banners,
            'portfolios' => $portfolios,
            'testmonials' => $testmonials,
            'teams' => $teams,
            'cliends' => $cliends,
            'blogs' => $blogs,
            'metaSettings' => $metaSettings,
            // 'discount_products_count' => $discount_products_count,
        ]);
    }

    // about
    function about(){
        $teams = team::where('status', 1)->get();
        $category= Category::where('status', 1)->take(8)->get();
        $testmonials= testmonial::where('status', 1)->get();
        $metaSettings = Meta::where('pages', 'about')->where('status', 1)->first();
        return view('frontend.about.about', [
            'teams'=>$teams,
            'categoryy' => $category,
            'testmonials' => $testmonials,
            'metaSettings' => $metaSettings,
        ]);
    }


    // our_services
    function our_services() {
        $services = Category::where('status', '1')->get();
        $metaSettings = Meta::where('pages', 'services')->where('status', 1)->first();
        return view('frontend.service.index', compact(['services', 'metaSettings']));
    }

    // services_product
    function services_product($slug) {
        $services = Category::where('status', '1')->where('slug', $slug)->first();
        $products = Product::where('status', '1')->where('category_id', $services->id)->get();
        $metaSettings = Meta::where('pages', 'services_product')->where('status', 1)->first();
        return view('frontend.service.details', compact(['products','services', 'metaSettings']));
    }

    // services_product_details
    function services_product_details($slug) {
        $products = Product::where('status', '1')->where('slug', $slug)->get();
        $productgallery = ProductGallery::where('product_id', $products->first()->id)->get();
        $metaSettings = Meta::where('pages', 'services_product_details')->where('status', 1)->first();
        return view('frontend.service.product_details', compact(['products','productgallery', 'metaSettings']));
    }


    // services_product_details
    function services_product_checkout(Request $request){
        $product_id = Product::where('id', $request->product_id)->first() ;
        $metaSettings = Meta::where('pages', 'services/product/checkout')->where('status', 1)->first();
        return view('frontend.checkout.checkout',[
            'product_id'=>$product_id,
            'metaSettings'=> $metaSettings,
        ]);
    }

    // services_order_checkout
    function services_order_checkout(Request $request){
        $request->validate([
            'name'=> 'required',
            'phone'=>'required',
            'business_name'=>'required',
            'quantity'=>'required | min:1',
        ]);

            if($request->coupon){
                $coupon_name = Coupon::where('coupon_name', $request->coupon)->first();
                $coupons = $coupon_name->coupon_amount;
            }
            else{
              $coupons = 0;
            }
            $price = Product::where('id', $request->product_id)->first()->product_discount;
            $order_id = 'INV'.'-'.rand(10000000,99999999);
            $sub_total = $request->quantity*$price;
            $aftercoupon = $sub_total*$coupons/100;
            $mobile_verify = rand(100000,999999);
            $service_cart_id = serviceOrderCart::insertGetId([
                'order_id'=> $order_id,
                'product_id'=> $request->product_id,
                'name'=> $request->name,
                'phone'=> $request->phone,
                'business_name'=> $request->business_name,
                'note'=> $request->note,
                'mobile_verify'=> $mobile_verify,
                'quantity'=> $request->quantity,
                'price'=> $price,
                'sub_total'=> $sub_total,
                'coupon'=> $coupons,
                'total'=> $sub_total-$aftercoupon,
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
    $request->session()->put('service_cart_id', $service_cart_id);

    return redirect()->route('service.order.otp');
    }

    // service_order_otp
    function service_order_otp(){
        return view('frontend.service.mobile_varify');
    }

    // number_otp
        function number_otp(Request $request){

        $number_verify = $request->session()->get('mobile_verify');
        $phone_number = $request->session()->get('phone_number');
        $service_cart_id = $request->session()->get('service_cart_id');

            $mobile_otp =  $request->mobile_varify_code;
            $service_cart = serviceOrderCart::where('id', $service_cart_id)->first();

            if($mobile_otp == $number_verify){


                if(customers::where('customer_phone', $phone_number)->exists()){
                    $customer_num = customers::where('customer_phone', $phone_number)->first();
                    if($customer_num){
                        Auth::guard('customerauth')->loginUsingId($customer_num->id);
                    }
                } else {
                    customers::insert([
                        'added_by'=>0,
                        'customer_name'=>$service_cart->name,
                        'customer_phone'=>$phone_number,
                        'busines_name'=>$service_cart->business_name,
                        'mobile_verify'=>null,
                        'created_at'=>Carbon::now(),
                    ]);

                    $customer_num = customers::where('customer_phone', $phone_number)->first();
                    if($customer_num){
                        Auth::guard('customerauth')->loginUsingId($customer_num->id);
                    }
                }




                // if(customers::where('customer_phone', $phone_number)->exists()){
                //     $customer_num = customers::where('customer_phone', $phone_number)->first();
                //     if($customer_num){
                //         Auth::guard('customerauth')->loginUsingId($customer_num->id);
                //     }
                // }
                // elseif(customer_registers::where('phone', $phone_number)->exists()){
                //     $customer_num =  customer_registers::where('phone', $phone_number)->first();
                //     if($customer_num){
                //         Auth::guard('customerreg')->loginUsingId($customer_num->id);
                //     }
                // }


                $service_cart->update([
                    'mobile_verify'=> null,
                ]);
                $request->session()->forget('mobile_verify');
                $request->session()->forget('phone_number');

                $apiKey = "c3684b1473dc5b5ab83ec6c9786a4367881b2cae";
                $apiBaseURL = "https://pay.nugortechit.com/api/checkout-v2";
                $uddoktaPay = new UddoktaPay($apiKey, $apiBaseURL);

                $requestData = [
                    'full_name'     => $service_cart->name,
                    'email'         => "test@test.com",
                    'amount'        => $service_cart->total,
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
                // // demo redirect
                // return redirect()->route('service.order.success')->with('success', 'order success');

            }
            else{
                return back()->with('error','OTP not match');
            }
        }

    // service_order_success
    function service_order_success(Request $request){
        $service_cart_id = $request->session()->get('service_cart_id');
        $service_cart = serviceOrderCart::findOrFail($service_cart_id);
        $service_cart->update(['status' => 1]);
        // return view('frontend.checkout.order_success');
        return redirect()->route('customer.order.history');
    }

    // service_order_cancel\
    function service_order_cancel(Request $request){
        $service_cart_id = $request->session()->get('service_cart_id');
        $service_cart = serviceOrderCart::findOrFail($service_cart_id);
        $service_cart->update(['status' => 0]);
        return redirect('/');
    }
    // service_order_ipn\
    function service_order_ipn(){
        return redirect('/');
    }

    // our_products
    function our_products(){
        $shopproducts = ShopProduct::where('status', 1)->get();
        $shopcategorys = shopcategory::where('status', 1)->get();
        $metaSettings = Meta::where('pages', 'our_products')->where('status', 1)->first();
        return view('frontend.product.index',[
            'shopproducts'=>$shopproducts,
            'shopcategorys'=>$shopcategorys,
            'metaSettings'=>$metaSettings,
        ]);
    }

    // product_details
    function product_details($slug){
        $shopproducts = ShopProduct::where('slug', $slug)->first();
        $productgallerys = shopproductgallery::where('shopproduct_id', $shopproducts->id)->get();
        $similarproducts = ShopProduct::where('category_id', $shopproducts->category_id)->where('id', '!=', $shopproducts->id)->get();
        $product_comment = ProductComment::where('product_id', $shopproducts->id)->get();
        $metaSettings = Meta::where('pages', 'product_details')->where('status', 1)->first();
        return view('frontend.product.details',[
            'shopproducts'=>$shopproducts,
            'productgallerys'=>$productgallerys,
            'similarproducts'=>$similarproducts,
            'product_comment'=>$product_comment,
            'metaSettings'=>$metaSettings,
        ]);
    }

    // our_blogs
    function our_blogs(){
        $metaSettings = Meta::where('pages', 'our_blogs')->where('status', 1)->first();
        $blogs = Blogs::where('status', 1)->paginate(30);
        return view('frontend.blogs.index',[
            'metaSettings'=>$metaSettings,
            'blogs'=>$blogs,
        ]);
    }

    // blog_details
    function blog_details($slug){
        $metaSettings = Meta::where('pages', 'blog_details')->where('status', 1)->first();
        $blogs = Blogs::where('slug', $slug)->where('status', 1)->first();
        $resent_blog = Blogs::where('status', 1)->take(8)->get();
        $comments = Comment::where('blog_id', $blogs->id)->get();
        $comments_count = Comment::where('blog_id', $blogs->id)->count();

        $tagsString = $blogs->tage;
        $tagsArray = explode(',', $tagsString);
        return view('frontend.blogs.details',[
            'metaSettings'=>$metaSettings,
            'blogs'=>$blogs,
            'resent_blog'=>$resent_blog,
            'comments'=>$comments,
            'comments_count'=>$comments_count,
            'tagsArray'=>$tagsArray,
        ]);
    }

    // blog_comment_store
    function blog_comment_store(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'nullable',
            'message'=>'required',
            'blog_id'=>'required',
        ];

        $validatedData = $request->validate($rules);

        Comment::create($validatedData);

        return back()->withSuccess('successfully added.');
    }


    // privacy_policy
    function privacy_policy(){
        $categories = Category::all();
        $privacy_policy = privacy_policy::all();
        $metaSettings = Meta::where('pages', 'privacy_policy')->where('status', 1)->first();
        return view('frontend.privacy_policy.privacy_policy', [
            'categories'=>$categories,
            'privacy_policy'=>$privacy_policy,
            'metaSettings'=>$metaSettings,
        ]);
    }

    // terms
    function terms(){
        $categories = Category::all();
        $terms = terms_condition::all();
        $metaSettings = Meta::where('pages', 'terms')->where('status', 1)->first();
        return view('frontend.terms.terms_and_condition', [
            'categories'=>$categories,
            'terms'=>$terms,
            'metaSettings'=>$metaSettings,
        ]);
    }


    // auth_pay_due
function auth_pay_due(Request $request){
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

// subscribe_store
function subscribe_store(Request $request){
    $request->validate([
        'email'=>'required',
    ]);

    subscribe::insert([
        'email'=>$request->email,
    ]);
    return back()->with('subscribe', 'You Subscribe Successfully');
}

// portfolio_details
function portfolio_details($slug){
    $protfolio_details = protfolio::where('slug', $slug)->get();
    $protfolio_gallery = protfoliogallery::where('protfolio_id', $protfolio_details->first()->id)->get();
    $protfolio_next = protfolio::where('id', '>', $protfolio_details->first()->id)->orderBy('id')->first();
    $protfolio_preview = protfolio::where('id', '<', $protfolio_details->first()->id)->orderBy('id', 'desc')->first();
    $protfolio_similar = protfolio::where('project_type' ,$protfolio_details->first()->project_type)->where('id', '!=', $protfolio_details->first()->id)->get();
    $metaSettings = Meta::where('pages', 'portfolio_details')->where('status', 1)->first();
    return view('frontend.portfolio_details.portfolio_details', [
        'protfolio_details'=>$protfolio_details,
        'protfolio_gallery'=>$protfolio_gallery,
        'protfolio_next'=>$protfolio_next,
        'protfolio_preview'=>$protfolio_preview,
        'protfolio_similar'=>$protfolio_similar,
        'metaSettings'=>$metaSettings,
    ]);
}

// product_comment_store
function product_comment_store(Request $request){
    $rules = [
        'name'=>'required',
        'message'=>'required',
        'email'=>'required',
        'product_id'=>'required',
    ];
    $validatedData =$request->validate($rules);

    ProductComment::create($validatedData);
    return back()->withSuccess('Your Comment add successfully');
}

// our_cliends
function our_cliends(){
    $cliends = cliend::where('status', 1)->paginate(40);
    $metaSettings = Meta::where('pages', 'our_cliends')->where('status', 1)->first();
    return view('frontend.cliend.index',[
        'cliends'=>$cliends,
        'metaSettings'=>$metaSettings,
    ]);
}
// our_protfolio
function our_protfolio(){
    $portfolios = protfolio::where('status', 1)->paginate(24);
    $metaSettings = Meta::where('pages', 'our_protfolio')->where('status', 1)->first();
    return view('frontend.protfolio.index',[
        'portfolios'=>$portfolios,
        'metaSettings'=>$metaSettings,
    ]);
}

// consultancy store
function consultancy_store(Request $request){
    $rules = [
        'name'=>'required',
        'email'  => 'nullable|required_without:phone',
        'phone'  => 'nullable|required_without:email',
        'service'=>'required',
        'message'=>'nullable',
    ];

    $validatedData = $request->validate($rules);

    consultancy::create($validatedData);


    return back()->withSuccess('successfully Sent.');
}

}
