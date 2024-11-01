@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Blogs</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Blogs</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Blogs</h3>
                        <a href="{{route('blogs.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Blogs</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Preview Image</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tage</th>
                                    <th>description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $sl=>$blog)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/blogs')}}/{{$blog->preview_image}}" alt="{{$blog->preview_image}}" class="img-fluid wid-40"></td>
                                        <td><img src="{{asset('uploads/blogs')}}/{{$blog->image}}" alt="{{$blog->image}}" class="img-fluid wid-40"></td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->author}}</td>
                                        <td>{{$blog->category}}</td>
                                        <td>{{$blog->tage}}</td>
                                        <td>{{Str::limit($blog->description, 20)}}</td>
                                        <td>
                                            <span class="badge badge-{{$blog->status == 1 ? 'success' : 'danger'}}">{{$blog->status == 1 ? 'Active' : 'Deactive'}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('blogs.edit', $blog->id)}}" class=""><i class="fa fa-edit"></i> </a>
                                            <a href="{{route('blogs.delete', $blog->id)}}" class=""><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>
</div>
@endsection
