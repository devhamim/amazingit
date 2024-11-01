<?php

namespace App\Http\Controllers;

use App\Models\cliend;
use Illuminate\Http\Request;
use Str;

class CliendController extends Controller
{
   //list
   function cliend_list(){
        $cliends = cliend::all();
        return view('backend.cliend.cliend', [
            'cliends'=>$cliends,
        ]);

    }

    // store
    function cliend_store(Request $request){
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'image' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/cliend'), $fileName);
            $validatedData['image'] = $fileName;
        }

        cliend::create($validatedData);
        return back()->withSuccess('added successfully.');
    }


    // editcliend
    public function editcliend(Request $request, $id) {
        $cliends = cliend::find($id);

        if(!$cliends) {
            return response()->json([
                'status' => 404,
                'message' => 'not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'cliends' => $cliends,
        ]);
    }


    // update
    function cliend_update(Request $request){
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'image' => '',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $img_del = cliend::where('id', $request->id)->first()->image;
            $delete_from = public_path('uploads/cliend/'.$img_del);
            if(file_exists($delete_from)){
                unlink($delete_from);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/cliend'), $fileName);
            $validatedData['image'] = $fileName;
        }

        cliend::where('id', $request->id)->update($validatedData);

        return back()->withSuccess('Update successfully.');
    }


    // delete
    function cliend_delete($id){
        $cliends = cliend::find($id);
        $filePath = public_path('uploads/cliend/'. $cliends->image);
        if(file_exists($filePath) && is_file($filePath)){
            unlink($filePath);
        }

        cliend::find($id)->delete();
        return back()->withError('Delete successfully');
    }
}
