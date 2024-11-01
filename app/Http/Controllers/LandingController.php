<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\team;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //landing
    function landing(){
        $products = Product::find(25);
        $productgallery = ProductGallery::where('product_id', 25)->get();
        $teams = team::where('status', 1)->get();
        return view('frontend.landing.index',[
            'products'=>$products,
            'productgallery'=>$productgallery,
            'teams'=>$teams,
        ]);
    }
}
