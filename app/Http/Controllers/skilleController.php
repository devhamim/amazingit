<?php

namespace App\Http\Controllers;

use App\Models\skille;
use Illuminate\Http\Request;

class skilleController extends Controller
{
    //list
   function skille_list(){
    $skilles = skille::all();
    return view('backend.skille.index', [
        'skilles'=>$skilles,
    ]);

}

// store
function skille_store(Request $request){
    $rules = [
        'name' => 'required',
        'number' => 'required',
    ];

    $validatedData = $request->validate($rules);


    skille::create($validatedData);
    return back()->withSuccess('added successfully.');
}


// editskille
public function editskille(Request $request, $id) {
    $skilles = skille::find($id);

    if(!$skilles) {
        return response()->json([
            'status' => 404,
            'message' => 'not found'
        ], 404);
    }

    return response()->json([
        'status' => 200,
        'skilles' => $skilles,
    ]);
}


// update
function skille_update(Request $request){
    $rules = [
        'name' => 'required',
        'number' => 'required',
        'status' => 'required',
    ];

    $validatedData = $request->validate($rules);

    skille::where('id', $request->id)->update($validatedData);

    return back()->withSuccess('Update successfully.');
}


// delete
function skille_delete($id){

    skille::find($id)->delete();
    return back()->withError('Delete successfully');
}
}
