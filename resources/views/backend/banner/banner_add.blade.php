@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Sliders</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Sliders Title</label>
                            <input type="text" name="banner_title" class="form-control" placeholder="Sliders Title">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sliders Description</label>
                            <textarea name="banner_desp" class="form-control" id="" cols="30" rows="5" placeholder="Sliders Description"></textarea>
                        </div>
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Sliders image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                Sliders image
                                <input type="file" name="banner_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" class="image">
                            </label> &nbsp;
                            <img width="100" class="mt-3 mb-3" id="image" height="auto" src="" alt="">
                            @error('banner_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
