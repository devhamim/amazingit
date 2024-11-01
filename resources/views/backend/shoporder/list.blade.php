@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Product Order</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">System</a></li>
            <li class="breadcrumb-item active"><a href="#!">Product Order</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                {{-- <div class="card-header d-flex justify-content-between">
                        <h3>Product Order</h3>
                        <a href="{{route('shop.product.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Product Order</a>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Order Id</th>
                                    <th>Product Name</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Price</th>
                                    <th>Coupon</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shoporders as $sl=>$shoporder)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/shop')}}/{{$shoporder->rel_to_product->preview_image}}" alt class="img-fluid wid-40"></td>
                                        <td>{{$shoporder->order_id}}</td>
                                        <td>{{$shoporder->rel_to_product->name}}</td>
                                        <td>{{$shoporder->name}}</td>
                                        <td>{{$shoporder->phone}}</td>
                                        <td>{{$shoporder->email}}</td>
                                        <td>{{$shoporder->price}}</td>
                                        <td>{{$shoporder->coupon}}</td>
                                        <td>{{$shoporder->total}}</td>
                                        <td><span class="badge badge-{{$shoporder->status == 1 ? 'success' : 'danger'}}">{{$shoporder->status == 1 ? 'Pay' : 'Unpay'}}</span></td>
                                        <td>
                                            {{-- <a href="{{route('shop.product.edit', $shoporder->id)}}" class=""><i class="fa fa-edit"></i> </a> --}}
                                            <a href="{{route('shop.order.delete', $shoporder->id)}}" class=""><i class="fa fa-trash"></i> </a>
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
