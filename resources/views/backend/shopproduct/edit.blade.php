@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{ route('shop.product.update') }}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Products</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <input type="hidden" name="shopproducts_id" class="form-control" value="{{$shopproducts->id}}">
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <label class="floating-label" for="Category">Category *</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $shopproducts->category_id ?'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$shopproducts->name}}" required>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Price *</label>
                            <input type="number" name="price" class="form-control" placeholder="Price" value="{{$shopproducts->price != null ? $shopproducts->price : ''}}" required>
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Discount *</label>
                            <input type="number" name="discount" class="form-control" placeholder="Discount" value="{{$shopproducts->discount}}">
                            @error('discount')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">SKU *</label>
                            <input type="text" name="sku" class="form-control" required placeholder="SKU" value="{{$shopproducts->sku != null ? $shopproducts->sku : ''}}">
                            @error('sku')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" required placeholder="tags" value="{{$shopproducts->tags != null ? $shopproducts->tags : ''}}">
                            @error('tags')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Download Link</label>
                            <input type="text" name="download_link" class="form-control" placeholder="Download Link" value="{{$shopproducts->download_link != null ? $shopproducts->download_link : ''}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Preview Product</label>
                            <input type="text" name="preview_product" class="form-control" placeholder="Preview Product" value="{{$shopproducts->preview_product != null ? $shopproducts->preview_product : ''}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Preview image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                Preview image
                                <input type="file" name="preview_image" class="image">
                            </label>
                            <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/shop')}}/{{$shopproducts->preview_image}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Sort description</label>
                            <textarea id="sort_summernote" name="sort_description"  class="form-control" required placeholder="Sort description">{{$shopproducts->sort_description != null ? $shopproducts->sort_description : ''}}</textarea>
                            @error('sort_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Video Link</label>
                            <input type="text" name="video_link" class="form-control" placeholder="Video Link" value="{{$shopproducts->video_link != null ? $shopproducts->video_link : ''}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Gallery images</label>
                            <label class="btn btn-outline-primary  mt-2">
                                Gallery images
                                <input type="file" multiple name="gallery_image[]" class="image">
                            </label>
                            @error('gallery_image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            @foreach ($gallerys as $gallery)
                                <img width="90" class="mt-3 mb-3 mr-2" id="image" height="auto" src="{{asset('uploads/shop/gallery')}}/{{$gallery->gallery_image}}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label w-100 mb-2">Product description</label>
                            <textarea id="summernote" name="description" class="form-control" required placeholder="Product description">{!! $shopproducts->description !!}</textarea>
                            @error('description')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label mb-2">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{$shopproducts->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="2" {{$shopproducts->status == 0 ? 'selected' : ''}}>Deactive</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mb-4 ml-3 m-auto pb-5 text-center">
                <button class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
    </div>
    </form>

    </div>
</div>
@endsection

@section('footer_script')

@endsection
