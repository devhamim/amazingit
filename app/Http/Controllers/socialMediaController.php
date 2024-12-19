<?php

namespace App\Http\Controllers;

use App\Models\socialMedia;
use Illuminate\Http\Request;

class socialMediaController extends Controller
{
    //list
   function socialmedia_list(){
        $socialmedias = socialMedia::all();
        return view('backend.socialmedia.index', [
            'socialmedias'=>$socialmedias,
        ]);

    }

    // store
    function socialmedia_store(Request $request){
        $rules = [
            'fb' => 'nullable',
            'ig' => 'nullable',
            'in' => 'nullable',
            'yt' => 'nullable',
        ];

        $validatedData = $request->validate($rules);


        socialMedia::create($validatedData);
        return back()->withSuccess('added successfully.');
    }


    // editsocialmedia
    public function editsocialmedia(Request $request, $id) {
        $socialmedias = socialMedia::find($id);

        if(!$socialmedias) {
            return response()->json([
                'status' => 404,
                'message' => 'not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'socialmedias' => $socialmedias,
        ]);
    }


    // update
    function socialmedia_update(Request $request){
        $rules = [
            'fb' => 'nullable',
            'ig' => 'nullable',
            'in' => 'nullable',
            'yt' => 'nullable',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        socialMedia::where('id', $request->id)->update($validatedData);

        return back()->withSuccess('Update successfully.');
    }


    // delete
    function socialmedia_delete($id){

        socialMedia::find($id)->delete();
        return back()->withError('Delete successfully');
    }
}
