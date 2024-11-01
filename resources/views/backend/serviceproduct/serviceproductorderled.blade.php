@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Service Product Order</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Service Product Order</a></li>
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
                                    <th>Order Id</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Busines Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th>Coupon</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Permition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serviceproductorders as $sl=>$serviceproductorder)
                                    <tr>
                                        <td>{{$serviceproductorder->order_id}}</td>
                                        <td>{{$serviceproductorder->rel_to_product->product_name}}</td>
                                        <td>{{$serviceproductorder->name}}</td>
                                        <td>{{$serviceproductorder->phone}}</td>
                                        <td>{{$serviceproductorder->business_name}}</td>
                                        <td>{{$serviceproductorder->quantity}}</td>
                                        <td>{{$serviceproductorder->price}}</td>
                                        <td>{{$serviceproductorder->sub_total}}</td>
                                        <td>{{$serviceproductorder->coupon == null ? 'null': $serviceproductorder->coupon}}</td>
                                        <td>{{$serviceproductorder->total}}</td>
                                        <td>
                                            @if ($serviceproductorder->status == 1)
                                                <strong class="badge badge-success">Paid</strong>
                                            @else
                                                <strong class="badge badge-danger">Unpaid</strong>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('service.product.order.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $serviceproductorder->id }}" name="id">
                                                <input type="hidden" value="1" name="permission">
                                                <button style="border: none;" type="submit" class="badge badge-warning" onclick="return confirm('Are you sure to Approve this?')">
                                                    Approve
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('service.product.order.delete', $serviceproductorder->id)}}" class=""><i class="fa fa-trash"></i> </a>
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

