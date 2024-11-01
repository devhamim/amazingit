<?php

namespace App\Http\Controllers;

use App\Models\testmonial;
use Illuminate\Http\Request;
use Str;

class TestmonialController extends Controller
{
    //testimonial_list
    function testimonial_list(){
        $testmonials = testmonial::all();
        return view('backend.testimonial.testimonial', [
            'testmonials'=>$testmonials,
        ]);
    }

    // testimonial_store
    function testimonial_store(Request $request){
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => '',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/testimonial'), $fileName);
            $validatedData['image'] = $fileName;
        }

        $testmonial = testmonial::create($validatedData);
        return back()->withSuccess('Testmonial added successfully.');
    }

    // edittestmonial
    public function edittestimonial(Request $request, $id) {
        $testimonial = testmonial::find($id);

        if(!$testimonial) {
            return response()->json([
                'status' => 404,
                'message' => 'Testimonial not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'testimonial' => $testimonial,
        ]);
    }

    // testmonial_update
    function testimonial_update(Request $request){
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => '',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $img_del = testmonial::where('id', $request->testmonial_id)->first()->image;
            $delete_from = public_path('uploads/testimonial/'.$img_del);
            if(file_exists($delete_from)){
                unlink($delete_from);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/testimonial'), $fileName);
            $validatedData['image'] = $fileName;
        }

        testmonial::where('id', $request->testmonial_id)->update($validatedData);

        return back()->withSuccess('Update successfully.');
    }

    // testimonial_delete
    function testimonial_delete($id){
        testmonial::find($id)->delete();
        return back()->withError('Delete successfully');
    }
}
