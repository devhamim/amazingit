@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{route('portfolio.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Protfolio</h6>
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
                                    <label class="form-label">Project Type *</label>
                                    <input type="text" name="project_type" class="form-control" placeholder="Project Type" value="{{ old('project_type') }}" required>
                                    @error('project_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Delivery Date </label>
                                    <input type="date" name="delivery_date" class="form-control" placeholder="Delivery Date" value="{{ old('delivery_date') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Client</label>
                                    <input type="text" name="client" class="form-control" placeholder="Client" value="{{ old('client') }}" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Website Link</label>
                                    <input type="text" name="website_link" class="form-control" placeholder="Website Link" value="{{ old('website_link') }}">
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
                                    <label class="form-label w-100">Preview image</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Preview image
                                        <input type="file" name="preview_image" class="image" value="{{ old('preview_image') }}" required>
                                    </label>
                                    @error('preview_image')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group upload_file">
                                    <label class="form-label w-100">Gallery images</label>
                                    <label class="btn btn-outline-primary  mt-2">
                                        Gallery images
                                        <input type="file" multiple name="gallery_image[]" class="image" value="{{ old('gallery_image') }}" required>
                                    </label>
                                    @error('gallery_image')
                                        <strong class="text-danger">{{$message}}</strong>
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
