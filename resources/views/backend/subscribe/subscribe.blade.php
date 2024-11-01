@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Subscribe</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Subscribe</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        {{-- <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{route('contact.delete.all')}}" class="btn btn-warning btn-sm mb-3 btn-round"><i class="feather icon-plus">Delete all</i></a>
                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribes as $sl=>$subscribe)
                                    <tr style="{{$subscribe->status == 0 ? 'background: rgba(24, 28, 33, 0.025)': ''}}">
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{$subscribe->email}}</td>
                                        <td>
                                            <a href="{{route('subscribe.delete', $subscribe->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
