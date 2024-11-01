<?php

namespace App\Http\Controllers;

use App\Models\shopcategory;
use Illuminate\Http\Request;

class ShopcategoryController extends Controller
{
    //shop_category_list
    function shop_category_list(){
        $shopcategorys = shopcategory::all();
        return view('backend.shopcategory.index',[
            'shopcategorys'=>$shopcategorys,
        ]);
    }

    function shop_category_store(Request $request){
        $rules = [
            'name' => 'required',
        ];

        $validatedData = $request->validate($rules);

        shopcategory::create($validatedData);
        return back()->withSuccess('Added successfully.');
    }

    // editshopcategory
    function editshopcategory(Request $request, $id){
        $shopcategory = shopcategory::find($id);

        return response()->json([
            'status' => 200,
            'shopcategory'=>$shopcategory,
        ]);
    }

    // shop_category_update
    function shop_category_update(Request $request){
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        shopcategory::where('id', $request->shopcategory_id)->update($validatedData);
        return back()->withSuccess('Added successfully.');
    }

    // shop_category_delete
    function shop_category_delete($id){
        shopcategory::where('id', $id)->delete();
        return back()->withSuccess('Delete Successfully');
    }
}
