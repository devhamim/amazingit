@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Blogs</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Category *</label>
                                <input type="text" name="category" class="form-control" placeholder="Project Type" value="{{ old('category') }}" required>
                                @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Tage</label>
                                <input type="text" name="tage" class="form-control" placeholder="Tage" value="{{ old('tage') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group upload_file">
                                <label class="form-label w-100">Preview image *</label>
                                <label class="btn btn-outline-primary  mt-2">
                                    Preview image
                                    <input type="file" name="preview_image" class="image" value="{{ old('preview_image') }}" required>
                                </label>
                                @error('preview_image')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Preview Image Alt Tag</label>
                                <input type="text" name="preview_image_alt_tag" class="form-control" placeholder="Preview Image Alt Tag" value="{{ old('preview_image_alt_tag') }}" required>
                                @error('preview_image_alt_tag')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group upload_file">
                                <label class="form-label w-100">Images</label>
                                <label class="btn btn-outline-primary  mt-2">
                                    Images
                                    <input type="file" multiple name="image" class="image" value="{{ old('image') }}" required>
                                </label>
                                @error('image')
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
                        <div class="col-lg-6 col-lg-6">
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
                                <label class="form-label w-100 mb-2">Description</label>
                                <textarea id="summernote" name="description" value="{{ old('description') }}" class="form-control" placeholder="Description"></textarea>
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
