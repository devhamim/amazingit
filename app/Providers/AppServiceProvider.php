<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Meta;
use App\Models\Product;
use App\Models\setting;
use Illuminate\Support\ServiceProvider;
use View;
use Cookie;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{

    Paginator::useBootstrap();
    // footer category
    View::composer('frontend.master.master', function ($view){
        $view->with('categorys', Category::where('status', 1)->get());

        if (Cookie::has('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = [];
        }

        // Pass $cart_data to the view
        $view->with('totalItemsInCart', count($cart_data));
    });

    // service
    View::composer('frontend.master.master', function ($view){
        $view->with('services', Product::where('status', 1)->get());
    });

     // master setting
     View::composer('frontend.master.master', function ($view){
        $view->with('setting', setting::all());
    });
     // customer header setting
     View::composer('customer.layout.header', function ($view){
        $view->with('setting', setting::all());
    });
     // checkout metaSettings
    //  View::composer('frontend.master.master', function ($view){
    //     $view->with('metaSettings', Meta::where('pages', 'services/product/checkout')->where('status', 1)->get());
    // });
     // customer footer setting
     View::composer('customer.layout.footer', function ($view){
        $view->with('setting', setting::all());
    });
     // customer app setting
     View::composer('customer.layout.app', function ($view){
        $view->with('setting', setting::all());
    });
     // home setting
     View::composer('frontend.home.index', function ($view){
        $view->with('setting', setting::all());
    });
     // product setting
     View::composer('frontend.service.product_details', function ($view){
        $view->with('setting', setting::all());
    });
     // dashboard setting
     View::composer('layouts.dashboard', function ($view){
        $view->with('setting', setting::all());
    });
    // login setting
     View::composer('auth.login', function ($view){
        $view->with('setting', setting::all());
    });
    // invoice setting
     View::composer('invoice.invoice', function ($view){
        $view->with('setting', setting::all());
    });
    // view invoice print setting
     View::composer('backend.orders.view_invoice_print', function ($view){
        $view->with('setting', setting::all());
    });
    // multi view invoice print setting
     View::composer('backend.orders.multi_view_invoice_print', function ($view){
        $view->with('setting', setting::all());
    });
    // user dashboard setting
     View::composer('backend.user.userdashboardview.app', function ($view){
        $view->with('setting', setting::all());
    });
    // landing setting
     View::composer('frontend.landing.index', function ($view){
        $view->with('setting', setting::all());
    });
    // landing
    View::composer('frontend.landing.master', function ($view){
        $view->with('categorys', Category::where('status', 1)->get());
    });
    // landing
    View::composer('frontend.landing.master', function ($view){
        $view->with('services', Product::where('status', 1)->get());
    });
}
}
