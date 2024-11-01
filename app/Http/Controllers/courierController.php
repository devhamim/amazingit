<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courier;
use Carbon\Carbon;

class courierController extends Controller
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
    //courier_list
    function courier_list(){
        $couriers = courier::all();
        return view('backend.courier.courier', [
            'couriers'=>$couriers,
        ]);
    }

    function courire_store(Request $request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        courier::insert([
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Courire successfully');
    }

    public function editCourier(Request $request, $id) {
        $courier = courier::find($id);

        return response()->json([
            'status' => 200,
            'courier' => $courier,
        ]);
    }

    function courire_update(Request $request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        courier::where('id', $request->courier_id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Shipping Methods updated successfully');
    }

    function courire_delete($id){
        courier::find($id)->delete();
        return back()->withError('courier Delete successfully');
    }
}
