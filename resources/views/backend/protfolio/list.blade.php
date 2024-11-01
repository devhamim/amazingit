@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Protfolio</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Protfolio</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Protfolio</h3>
                        <a href="{{route('portfolio.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Protfolio</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Project Type</th>
                                    <th>Delivery Date</th>
                                    <th>client</th>
                                    <th>client</th>
                                    <th>Website</th>
                                    <th>description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $sl=>$portfolio)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/protfolio')}}/{{$portfolio->preview_image}}" alt class="img-fluid wid-40"></td>
                                        <td style="width: 50%">{{$portfolio->title}}</td>
                                        <td>{{$portfolio->project_type}}</td>
                                        <td>{{$portfolio->delivery_date}}</td>
                                        <td>{{$portfolio->client}}</td>
                                        <td>{{$portfolio->website_link}}</td>
                                        <td>{{$portfolio->tage}}</td>
                                        <td>{{Str::limit($portfolio->description, 20)}}</td>
                                        <td>
                                            <span class="badge badge-{{$portfolio->status == 1 ? 'success' : 'danger'}}">{{$portfolio->status == 1 ? 'Active' : 'Deactive'}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('portfolio.edit', $portfolio->id)}}" class=""><i class="fa fa-edit"></i> </a>
                                            <a href="{{route('portfolio.delete', $portfolio->id)}}" class=""><i class="fa fa-trash"></i> </a>
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
