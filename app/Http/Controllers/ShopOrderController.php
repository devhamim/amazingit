<?php

namespace App\Http\Controllers;

use App\Models\ShopOrderProduct;
use Illuminate\Http\Request;

class ShopOrderController extends Controller
{
    //shop_order_list
    function shop_order_list(){
        $shoporders = ShopOrderProduct::all();
        return view('backend.shoporder.list',[
            'shoporders'=>$shoporders,
        ]);
    }

    // shop_order_delete
    function shop_order_delete($id){
        ShopOrderProduct::find($id)->delete();
        return back()->withSuccess('Order Delete Successfully');
    }
}
