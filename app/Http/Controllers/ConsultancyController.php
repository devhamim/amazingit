<?php

namespace App\Http\Controllers;

use App\Models\consultancy;
use Illuminate\Http\Request;

class ConsultancyController extends Controller
{
    //consultancy_list
    function consultancy_list(){
        $consultancys = consultancy::all();
        return view('backend.consultancy.consultancy',[
            'consultancys'=>$consultancys,
        ]);
    }

    // consultancy_delete
    function consultancy_delete($id){
        consultancy::find($id)->delete();
        return back()->withError('Category Delete successfully');
    }
}
