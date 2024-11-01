@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Consultancy</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Consultancy</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table table-bordered text-center table-striped">
                        <table id="report-table" class=" mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultancys as $sl=>$consultancy)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$consultancy->name}}</td>
                                        <td>{{$consultancy->email}}</td>
                                        <td>{{$consultancy->phone}}</td>
                                        <td>{{$consultancy->service }}</td>
                                        <td>{{$consultancy->message}}</td>

                                        <td><a href="{{route('consultancy.delete', $consultancy->id)}}" class=""><i class="fa fa-trash"></i> </a></td>
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

