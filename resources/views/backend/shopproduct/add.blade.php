@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{route('shop.product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Product</h6>
                </div>
                <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Category">Category *</label>
                                        <select class="form-control" name="category_id" required>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Price *</label>
                                        <input type="number" name="price" class="form-control" placeholder="Price" required>
                                        @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Discount</label>
                                        <input type="number" name="discount" class="form-control" placeholder="Discount%" value="0" min="0" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">SKU *</label>
                                        <input type="text" name="sku" class="form-control" placeholder="SKU" required>
                                        @error('sku')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Tags *</label>
                                        <input type="text" name="tags" class="form-control" placeholder="Tags" required>
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Download Link</label>
                                        <input type="text" name="download_link" class="form-control" placeholder="Download Link">
                                        @error('download_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Preview Product</label>
                                        <input type="text" name="preview_product" class="form-control" placeholder="Preview Product">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group upload_file">
                                        <label class="form-label w-100">Preview image</label>
                                        <label class="btn btn-outline-primary  mt-2">
                                            Preview image
                                            <input type="file" name="preview_image" class="image" required>
                                        </label>
                                        @error('preview_image')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Sort Description*</label>
                                        <textarea id="sort_summernote" name="sort_description" class="form-control" placeholder="Sort Description" required></textarea>
                                        @error('sort_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Video Link</label>
                                        <input type="text" name="video_link" class="form-control" placeholder="Video Link">
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
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label w-100 mb-2">Description *</label>
                                        <textarea id="summernote" name="description" class="form-control" placeholder="Description" required></textarea>
                                        @error('description')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
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
