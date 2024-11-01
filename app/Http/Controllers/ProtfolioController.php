<?php

namespace App\Http\Controllers;

use App\Models\protfolio;
use App\Models\protfoliogallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class ProtfolioController extends Controller
{
    //portfolio_list
    function portfolio_list(){
        $portfolios = protfolio::all();
        return view('backend.protfolio.list', [
            'portfolios'=>$portfolios,
        ]);
    }

    //portfolio_add
    function portfolio_add(){
        return view('backend.protfolio.add');
    }

    // portfolio_store
    public function portfolio_store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'project_type' => 'required',
            'delivery_date' => 'nullable',
            'client' => 'nullable',
            'website_link' => 'nullable',
            'tage' => 'nullable',
            'description' => 'nullable',
            'preview_image' => 'required',
            'gallery_image' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::random(5) . rand(100000, 999999);

        if ($request->hasFile('preview_image')) {
            $image = $request->file('preview_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/protfolio'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }

        $portfolio = protfolio::create($validatedData);

        if ($request->hasFile('gallery_image')) {
            $galleryImages = $request->file('gallery_image');
            foreach ($galleryImages as $galleryImage) {
                $extension = $galleryImage->getClientOriginalExtension();
                $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
                $galleryImage->move(public_path('uploads/protfolio/gallery'), $fileName);

                protfoliogallery::create([
                    'protfolio_id' => $portfolio->id,
                    'gallery_image' => $fileName,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('portfolio.list')->withSuccess('Portfolio added successfully.');
    }

    // portfolio_delete
    function portfolio_delete($id){
        $image = protfolio::where('id', $id)->get();
        $delete_preview = public_path('uploads/protfolio/'. $image->first()->preview_image);
        unlink($delete_preview);

        $thumb_image = protfoliogallery::where('protfolio_id', $id)->get();
        foreach($thumb_image as $thumb) {
            $delete_thumbnails = public_path('uploads/protfolio/gallery/'. $thumb->gallery_image);
            unlink($delete_thumbnails);
            protfoliogallery::find($thumb->id)->delete();
        }

        protfolio::find($id)->delete();
        return back()->withSuccess('Portfolio deleted successfully');
    }

    // portfolio_edit
    function portfolio_edit($id){
        $protfolios = protfolio::find($id);
        $protfolio_gallerys = protfoliogallery::where('protfolio_id', $id)->get();
        return view('backend.protfolio.edit',[
            'protfolios'=>$protfolios,
            'protfolio_gallerys'=>$protfolio_gallerys,
        ]);
    }

    // portfolio_update
    function portfolio_update(Request $request){
        $rules = [
            'title' => 'required',
            'project_type' => 'required',
            'delivery_date' => 'nullable',
            'client' => 'nullable',
            'website_link' => 'nullable',
            'tage' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
        ];
    
        $validatedData = $request->validate($rules);
        if ($request->hasFile('preview_image')) {
            $img_del = protfolio::where('id', $request->protfolio_id)->first()->preview_image;
            $delete_from = public_path('uploads/protfolio/'.$img_del);
            if(file_exists($delete_from)){
                unlink($delete_from);
            }

            $image = $request->file('preview_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/protfolio'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }

        $portfolio = protfolio::where('id', $request->protfolio_id)->update($validatedData);

        if ($request->hasFile('gallery_image')) {
            $thumb_image = protfoliogallery::where('protfolio_id', $request->protfolio_id)->get();
            foreach($thumb_image as $thumb) {
                $delete_from_thumb = public_path('uploads/protfolio/gallery/'.$thumb->gallery_image);
                if(file_exists($delete_from_thumb)){
                    unlink($delete_from_thumb);
                }
                // protfoliogallery::find($thumb)->delete();
            }
            $galleryImages = $request->file('gallery_image');
            foreach ($galleryImages as $galleryImage) {
                $extension = $galleryImage->getClientOriginalExtension();
                $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
                $galleryImage->move(public_path('uploads/protfolio/gallery'), $fileName);

                protfoliogallery::create([
                    'protfolio_id' => $request->protfolio_id,
                    'gallery_image' => $fileName,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('portfolio.list')->withSuccess('Portfolio Update successfully.');
    }
}
