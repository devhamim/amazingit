<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    //meta_setting_add
    function meta_setting_add(){
        $metasettings = Meta::all();
        return view('backend.setting.metasetting',[
            'metasettings'=>$metasettings,
        ]);
    }

    // meta_setting_store
    function meta_setting_store(Request $request){
        $rules = [
            'title'=>'nullable',
            'meta_title'=>'nullable',
            'meta_tag'=>'nullable',
            'meta_description'=>'nullable',
            'pages'=>'nullable',
        ];

        $validatesData = $request->validate($rules);

        Meta::create($validatesData);
        return back()->withSuccess('Added successfully');
    }


    // editmeta
    public function editmeta(Request $request, $id) {
        $meta = Meta::find($id);

        if(!$meta) {
            return response()->json([
                'status' => 404,
                'message' => 'meta not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'meta' => $meta,
        ]);
    }

    // meta_setting_update
    function meta_setting_update(Request $request){
        $rules = [
            'title'=>'nullable',
            'meta_title'=>'nullable',
            'meta_tag'=>'nullable',
            'meta_description'=>'nullable',
            'pages'=>'nullable',
            'status'=>'nullable',
        ];

        $validatesData = $request->validate($rules);

        Meta::where('id', $request->meta_id)->update($validatesData);
        return back()->withSuccess('Update successfully.');
    }

    // meta_setting_delete
    function meta_setting_delete($id){
        Meta::find($id)->delete();
        return back()->withSuccess('Delete successfully.');
    }
}
