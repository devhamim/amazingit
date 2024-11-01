@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Product</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">System</a></li>
            <li class="breadcrumb-item active"><a href="#!">Product</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>Product</h3>
                        <a href="{{route('shop.product.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Sku</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopproducts as $sl=>$shopproduct)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/shop')}}/{{$shopproduct->preview_image}}" alt class="img-fluid wid-40"></td>
                                        <td>{{$shopproduct->name}}</td>
                                        <td>{{$shopproduct->rel_to_category->name}}</td>
                                        <td>{{$shopproduct->price}}</td>
                                        <td>{{$shopproduct->discount}}</td>
                                        <td>{{$shopproduct->after_discount}}</td>
                                        <td>{{$shopproduct->sku}}</td>
                                        <td>{{$shopproduct->tags}}</td>
                                        <td><span class="badge badge-{{$shopproduct->status == 1 ? 'success' : 'danger'}}">{{$shopproduct->status == 1 ? 'Active' : 'Deactive'}}</span></td>
                                        <td>
                                            <a href="{{route('shop.product.edit', $shopproduct->id)}}" class=""><i class="fa fa-edit"></i> </a>
                                            {{-- <a href="{{route('shop.product.delete', $shopproduct->id)}}" class=""><i class="fa fa-trash"></i> </a> --}}
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
