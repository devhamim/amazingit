@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{ route('blogs.update') }}" enctype="multipart/form-data">
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
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$blogs->title}}" required>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Category *</label>
                                <input type="text" name="category" class="form-control" placeholder="Project Type" value="{{$blogs->category}}" required>
                                @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Tage</label>
                                <input type="text" name="tage" class="form-control" placeholder="Tage" value="{{$blogs->tage != null ? $blogs->tage : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{$blogs->meta_title != null ? $blogs->meta_title : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Meta Tage</label>
                                <input type="text" name="meta_tag" class="form-control" placeholder="Meta Tage" value="{{$blogs->meta_tag != null ? $blogs->meta_tag : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" value="{{$blogs->meta_description != null ? $blogs->meta_description : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label mb-2">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$blogs->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$blogs->status == 0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group upload_file">
                                <label class="form-label w-100">Preview image</label>
                                <label class="btn btn-outline-primary  mt-2">
                                    Preview image
                                    <input type="file" name="preview_image" class="image">
                                </label>
                                @error('preview_image')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                                <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/blogs')}}/{{$blogs->preview_image}}" alt="{{$blogs->preview_image}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Preview Image Alt Tag</label>
                                <input type="text" name="preview_image_alt_tag" class="form-control" placeholder="Preview Image Alt Tag" value="{{$blogs->preview_image_alt_tag != null ? $blogs->preview_image_alt_tag : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group upload_file">
                                <label class="form-label w-100">Image</label>
                                <label class="btn btn-outline-primary  mt-2">
                                    Image
                                    <input type="file" name="image" class="image">
                                </label>
                                @error('image')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                                <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/blogs')}}/{{$blogs->image}}" alt="{{$blogs->image}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Image Alt Tag</label>
                                <input type="text" name="image_alt_tag" class="form-control" placeholder="Image Alt Tag" value="{{$blogs->image_alt_tag != null ? $blogs->image_alt_tag : ''}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label w-100 mb-2">description</label>
                                <textarea id="summernote" name="description" class="form-control" placeholder="description">{!! $blogs->description !!}</textarea>
                            </div>
                        </div>

                    </div>
                    </div>
                    <input type="hidden" name="id" class="form-control" value="{{$blogs->id}}">
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
