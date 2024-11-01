<?php

namespace App\Http\Controllers;

use App\Models\subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
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

    //subscribe_list
    function subscribe_list(){
        $subscribes = subscribe::all();
        return view('backend.subscribe.subscribe', [
            'subscribes'=>$subscribes,
        ]);
    }

    // subscribe_delete
    function subscribe_delete($id){
        subscribe::find($id)->delete();
        return back()->withSuccess('deleted successfully');
    }
}
