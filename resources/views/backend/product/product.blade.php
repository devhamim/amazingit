@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Service</h6>
            </div>
            <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-lg-6">
                                <div class="position-relative" data-select2-id="142">
                                    <label class="floating-label" for="Category">Service Category *</label>
                                    <select class="select2-demo form-control select2-hidden-accessible" multiple="" required style="width: 100%" data-select2-id="4" tabindex="-1" aria-hidden="true" name="category_id[]">
                                        <optgroup label="" data-select2-id="">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Regular Price *</label>
                                    <input type="number" name="product_price" required class="form-control" placeholder="Regular Price">
                                    @error('product_discount')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Service Name *</label>
                                    <input type="text" name="product_name" required class="form-control" placeholder="Product Name">
                                    @error('product_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Sale Price *</label>
                                    <input type="number" name="product_discount" required class="form-control" placeholder="Sale Price">
                                    @error('product_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">SKU *</label>
                                    <input type="text" name="sku" required class="form-control" placeholder="SKU">
                                    @error('sku')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Stock</label>
                                    <input type="number" name="quantity" required class="form-control" placeholder="Quantity">
                                    @error('quantity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Preview image</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Preview image
                                        <input type="file" name="preview_image" required class="image">
                                    </label>
                                    @error('preview_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Image Alt Tag</label>
                                    <input type="text" name="image_alt_tag" class="form-control" placeholder="Image Alt Tag" value="{{ old('image_alt_tag') }}" required>
                                    @error('image_alt_tag')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Gallery images</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Gallery images
                                        <input type="file" multiple name="gallery_image[]" required class="image">
                                    </label>
                                    @error('gallery_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Gallery Image Alt Tag</label>
                                    <input type="text" name="gallery_image_alt_tag" class="form-control" placeholder="Gallery Image Alt Tag" value="{{ old('gallery_image_alt_tag') }}" required>
                                    @error('gallery_image_alt_tag')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{ old('meta_title') }}" required>
                                    @error('meta_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Meta Tag</label>
                                    <input type="text" name="meta_tag" class="form-control" placeholder="Meta Tag" value="{{ old('meta_tag') }}" required>
                                    @error('meta_tag')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" value="{{ old('meta_description') }}" required>
                                    @error('meta_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label w-100 mb-2">Service description</label>
                                    <textarea id="summernote" name="description" class="form-control" required placeholder="Product description"></textarea>
                                    @error('description')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label w-100 mb-2">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Publish</option>
                                        <option value="2">Unpublished</option>
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
