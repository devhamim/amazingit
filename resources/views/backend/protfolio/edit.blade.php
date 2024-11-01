@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <form method="POST" action="{{ route('portfolio.update') }}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Protfolios</h6>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$protfolios->title}}" required>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Project Type *</label>
                                <input type="text" name="project_type" class="form-control" placeholder="Project Type" value="{{$protfolios->project_type}}" required>
                                @error('project_type')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Delivery Date *</label>
                                <input type="date" name="delivery_date" class="form-control" placeholder="Delivery Date" value="{{$protfolios->delivery_date != null ? $protfolios->delivery_date : ''}}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Client *</label>
                                <input type="text" name="client" class="form-control" placeholder="Client" value="{{$protfolios->client != null ? $protfolios->client : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Website Link</label>
                                <input type="text" name="website_link" class="form-control" placeholder="Website Link" value="{{$protfolios->website_link != null ? $protfolios->website_link : ''}}">

                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Tage</label>
                                <input type="text" name="tage" class="form-control" placeholder="Tage" value="{{$protfolios->tage != null ? $protfolios->tage : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label mb-2">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$protfolios->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$protfolios->status == 0 ? 'selected' : ''}}>Deactive</option>
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
                                <img width="90" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/protfolio')}}/{{$protfolios->preview_image}}" alt="">
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
                                {{-- {{$gallery}} --}}
                                @foreach ($protfolio_gallerys as $gallery)
                                <img width="90" class="mt-3 mb-3 mr-2" id="image" height="auto" src="{{asset('uploads/protfolio/gallery')}}/{{$gallery->gallery_image}}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label w-100 mb-2">description</label>
                                <textarea id="summernote" name="description" class="form-control" placeholder="description">{!! $protfolios->description !!}</textarea>
                            </div>
                        </div>

                    </div>
                    </div>
                    <input type="hidden" name="protfolio_id" class="form-control" value="{{$protfolios->id}}">
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
