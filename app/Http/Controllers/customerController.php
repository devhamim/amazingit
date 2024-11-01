<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class customerController extends Controller
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
    //customer_list
    function customer_list(){
        if(Auth::user()->role == 1){
            $customer_list = customers::orderBy('created_at', 'desc')->get();
        }
        else{
            $customer_list = customers::where('added_by', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('backend.customer.customer',[
            'customer_list'=>$customer_list,
        ]);
    }

    // customer_add
    function customer_add(Request $request){
        $request->validate([
            'customer_name'=>'required',
            'busines_name'=>'required',
            'customer_phone'=>'required|min:11|max:11',
        ]);

        if(customers::where('customer_phone',$request->customer_phone)->exists()){
            return back()->withError('Customer Number Already Exists');
        }
        else{
            customers::insert([
                'added_by' => Auth::user()->id,
                'customer_name'=> $request->customer_name,
                'busines_name'=> $request->busines_name,
                'customer_phone'=> $request->customer_phone,
                'customer_email'=> $request->customer_email,
                'customer_address'=> $request->customer_address,
                'created_at'=> Carbon::now(),
            ]);
            return back()->withSuccess('Customer add successfully');
        }

    }

    function customer_delete($id){
        customers::find($id)->delete();
        return back()->withError('Customer Delete successfully');
    }
}
