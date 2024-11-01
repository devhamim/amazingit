<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\shopcategory;
use App\Models\ShopProduct;
use App\Models\shopproductgallery;
use Illuminate\Http\Request;
use Str;

class ShopProductController extends Controller
{
    //shop_product_list
    function shop_product_list(){
        $shopproducts = ShopProduct::where('status', 1)->get();
        return view('backend.shopproduct.list',[
            'shopproducts'=>$shopproducts,
        ]);
    }

    // shop_product_add
    function shop_product_add(){
        $categories = shopcategory::where('status', 1)->get();
        return view('backend.shopproduct.add',[
            'categories'=>$categories,
        ]);
    }

    // shop_product_store
    function shop_product_store(Request $request){
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => '',
            'sku' => '',
            'preview_product' => '',
            'video_link' => '',
            'download_link' => 'required',
            'tags' => 'required',
            'sort_description' => 'required',
            'description' => 'required',
            'preview_image' => 'required',
        ];

        $validatedData = $request->validate($rules);

        // Generate slug
        $validatedData['slug'] = Str::random(5) . rand(100000, 999999);

        // Calculate after_discount
        $total_discount = $request->price * ($request->discount / 100);
        $validatedData['after_discount'] = $request->price - $total_discount;

        if ($request->hasFile('preview_image')) {
            $image = $request->file('preview_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/shop'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }
        // if ($request->hasFile('preview_banner')) {
        //     $image = $request->file('preview_banner');
        //     $extension = $image->getClientOriginalExtension();
        //     $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
        //     $image->move(public_path('uploads/shop/gallery'), $fileName);
        //     $validatedData['preview_banner'] = $fileName;
        // }

        $ShopProduct = ShopProduct::create($validatedData);

        if ($request->hasFile('gallery_image')) {
            $galleryImages = $request->file('gallery_image');
            foreach ($galleryImages as $galleryImage) {
                $extension = $galleryImage->getClientOriginalExtension();
                $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
                $galleryImage->move(public_path('uploads/shop/gallery'), $fileName);

                shopproductgallery::create([
                    'shopproduct_id' => $ShopProduct->id,
                    'gallery_image' => $fileName,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('shop.product.list')->withSuccess('added successfully.');
    }

    // shop_product_delete
    function shop_product_delete($id){
        $preview_image = ShopProduct::where('id', $id)->get();
        $delete_preview = public_path('uploads/shop/'. $preview_image->first()->preview_image);
        if(file_exists($delete_preview)){
            unlink($delete_preview);
        }


        // $preview_banner = ShopProduct::where('id', $id)->get();
        // if($preview_banner->first()->preview_banner != null){
        //     $delete_preview_one = public_path('uploads/shop/gallery/'. $preview_banner->first()->preview_banner);
        //     if(file_exists($delete_preview_one)){
        //         unlink($delete_preview_one);
        //     }
        // }


        $thumb_image = shopproductgallery::where('shopproduct_id', $id)->get();
        foreach($thumb_image as $thumb) {
            if($thumb->gallery_image != null){
                $delete_thumbnails = public_path('uploads/shop/gallery/'. $thumb->gallery_image);
                if(file_exists($delete_thumbnails)){
                    unlink($delete_thumbnails);
                }
            }

            shopproductgallery::find($thumb->id)->delete();
        }

        ShopProduct::find($id)->delete();
        return back()->withSuccess('Deleted successfully');
    }

    // shop_product_edit
    function shop_product_edit($id){
        $shopproducts = ShopProduct::find($id);
        $gallerys = shopproductgallery::where('shopproduct_id', $id)->get();
        $categories = shopcategory::where('status', 1)->get();
        return view('backend.shopproduct.edit',[
            'shopproducts'=>$shopproducts,
            'categories'=>$categories,
            'gallerys'=>$gallerys,
        ]);
    }

    // shop_product_update
    function shop_product_update(Request $request){
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => '',
            'sku' => '',
            'preview_product' => '',
            'video_link' => '',
            'download_link' => '',
            'tags' => 'required',
            'sort_description' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $total_discount = $request->price * ($request->discount / 100);
        $validatedData['after_discount'] = $request->price - $total_discount;

        if ($request->hasFile('preview_image')) {
            $img_del = ShopProduct::where('id', $request->shopproducts_id)->first()->preview_image;
            $delete_from = public_path('uploads/shop/'.$img_del);
            if(file_exists($delete_from)){
                unlink($delete_from);
            }

            $image = $request->file('preview_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/shop'), $fileName);
            $validatedData['preview_image'] = $fileName;
        }

        $portfolio = ShopProduct::where('id', $request->shopproducts_id)->update($validatedData);

        if ($request->hasFile('gallery_image')) {
            $thumb_image = shopproductgallery::where('shopproduct_id', $request->shopproducts_id)->get();
            foreach($thumb_image as $thumb) {
                $delete_from_thumb = public_path('uploads/shop/gallery/'.$thumb->gallery_image);
                if(file_exists($delete_from_thumb)){
                    unlink($delete_from_thumb);
                }
                shopproductgallery::find($thumb->id)->delete();
            }
            $galleryImages = $request->file('gallery_image');
            foreach ($galleryImages as $galleryImage) {
                $extension = $galleryImage->getClientOriginalExtension();
                $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
                $galleryImage->move(public_path('uploads/shop/gallery'), $fileName);

                shopproductgallery::create([
                    'shopproduct_id' => $request->shopproducts_id,
                    'gallery_image' => $fileName,
                ]);
            }
        }

        return redirect()->route('shop.product.list')->withSuccess('Update successfully.');
    }
}
