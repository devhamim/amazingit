<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class BlogController extends Controller
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

    //blog list
    function blogs_list(){
        $blogs = Blogs::where('status', 1)->get();
        return view('backend.blogs.list',[
            'blogs'=>$blogs,
        ]);
    }

    //blogs_add
    function blogs_add(){
        return view('backend.blogs.add');
    }

    //blogs_store
    function blogs_store(Request $request){
        $rules = [
            'title'=>'required',
            'description'=>'required',
            'tage'=>'nullable',
            'category'=>'required',
            'preview_image'=>'nullable',
            'image'=>'nullable',
            'meta_description'=>'required',
            'meta_tag'=>'required',
            'meta_title'=>'required',
            'image_alt_tag'=>'required',
            'preview_image_alt_tag'=>'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['author']= Auth::user()->name;
        $validatedData['slug'] = Str::slug($request->title);

        if ($request->hasFile('preview_image')) {
            $image = $request->file('preview_image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $fileName);
            $validatedData['image']=$fileName;
        }

        Blogs::create($validatedData);

        return redirect()->route('blogs.list')->withSuccess('Blogs added successfully.');
    }

    // blogs_edit
    function blogs_edit($id){
        $blogs = Blogs::find($id);
        return view('backend.blogs.edit',[
            'blogs'=>$blogs,
        ]);
    }

    // blogs_update
    function blogs_update(Request $request){
        $rules = [
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
            'tage'=>'nullable',
            'preview_image'=>'nullable',
            'image'=>'nullable',
            'meta_description'=>'required',
            'meta_tag'=>'required',
            'meta_title'=>'required',
            'image_alt_tag'=>'required',
            'preview_image_alt_tag'=>'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('preview_image')) {
            $image_del = Blogs::where('id', $request->id)->first()->preview_image;
            $file_del = public_path('uploads/blogs'. $image_del);
            if(file_exists($file_del)){
                unlink($file_del);
            }

            $image = $request->file('preview_image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }
        if($request->hasFile('image')){
            $image_del = Blogs::where('id', $request->id)->first()->image;
            $file_del = public_path('uploads/blogs'. $image_del);
            if(file_exists($file_del)){
                unlink($file_del);
            }

            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $fileName);
            $validatedData['image']=$fileName;
        }

        Blogs::where('id', $request->id)->update($validatedData);

        return redirect()->route('blogs.list')->withSuccess('Update successfully.');
    }

    // blogs_delete
    function blogs_delete($id){
        $blogs = Blogs::find($id);

        $preview_del = public_path('uploads/blogs'. $blogs->preview_image);
        if(file_exists($preview_del)){
            unlink($preview_del);
        }

        $image_del = public_path('uploads/blogs'. $blogs->image);
        if(file_exists($image_del)){
            unlink($image_del);
        }

        $blogs->delete();
        return back()->withSuccess('Deleted successfully');
    }
}
