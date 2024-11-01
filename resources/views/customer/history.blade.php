@extends('customer.layout.app')
@section('title', 'Nugortech IT - Customer History')
@section('meta_title', 'Nugortech IT - Customer History')
@section('content')
<!-- User history section -->
<section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                <div class="ec-sidebar-wrap ec-border-box">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-vendor-block">
                            <div class="ec-vendor-block-items">
                                <ul>

                                    @if (Auth::guard('customerauth')->check())
                                        <li><a href="{{ route('customer.dashboard') }}">User Profile</a></li>
                                        <li><a href="{{ route('customer.order.history') }}">Service Order</a></li>
                                        <li><a href="{{ route('customer.shop.history') }}">Product Order</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ec-shop-rightside col-lg-9 col-md-12">
                <div class="ec-vendor-dashboard-card">
                    <div class="ec-vendor-card-header">
                        <h5>Product History</h5>
                        <div class="ec-header-btn">
                            <a class="btn btn-lg btn-primary" href="{{ route('our.services') }}">Services</a>
                        </div>
                    </div>
                    <div class="ec-vendor-card-body">
                        <div class="ec-vendor-card-table">
                            <table class="table ec-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pay</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (Auth::guard('customerauth')->check())
                                            @if ($serviceorders)
                                                @foreach ($serviceorders as $key => $serviceproductorder)
                                                    <tr>
                                                        <th scope="row"><span>{{ $serviceproductorder->order_id }}</span></th>
                                                        <td>
                                                            <img class="prod-img" src="{{ asset('uploads/products/preview') }}/{{ $serviceproductorder->rel_to_product->preview_image }}"alt="product image">
                                                        </td>
                                                        <td><span>{{ $serviceproductorder->rel_to_product->product_name }}</span></td>
                                                        <td><span>{{ $serviceproductorder->created_at->format('d M Y') }}</span></td>
                                                        <td><span>{{ $serviceproductorder->total }}</span></td>
                                                        <td><span>N/A</span></td>
                                                        <td>
                                                            <span>
                                                                @if ($serviceproductorder->status == 1)
                                                                    <strong class="bg-success text-white px-2 py-1 rounded">Paid</strong>
                                                                @else
                                                                    <form action="{{ route('auth.pay.due') }}" method="POST">
                                                                        @csrf
                                                                            <input type="hidden" name="id" value="{{ $serviceproductorder->id }}">
                                                                            <input type="hidden" name="name" value="{{ Auth::guard('customerauth')->user()->name }}">
                                                                            <input type="hidden" name="total" value="{{ $serviceproductorder->total }}">
                                                                        <button type="submit" class="bg-danger text-white px-2 py-1 rounded">Unpaid</button>
                                                                    </form>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if ($billingdetails)
                                                @foreach ($billingdetails as $key => $serviceproductorder)
                                                @if ($serviceproductorder->rel_to_order)
                                                    <tr>
                                                        <th scope="row"><span>{{ $serviceproductorder->order_id }}</span></th>
                                                        <td>
                                                            @foreach ($serviceproductorder->rel_to_orderpro as $product)
                                                                <img class="prod-img" src="{{ asset('uploads/products/preview') }}/{{ $product->rel_to_product->preview_image }}"alt="product image"> <br>
                                                            @endforeach
                                                        </td>
                                                        <td><span>
                                                            @foreach ($serviceproductorder->rel_to_orderpro as $product)
                                                                {{ $product->rel_to_product->product_name }} <br>
                                                            @endforeach
                                                        </span></td>
                                                        <td><span>{{ $serviceproductorder->created_at->format('d M Y') }}</span></td>
                                                        <td><span>{{ $serviceproductorder->rel_to_order->paid+$serviceproductorder->rel_to_order->due }}</span></td>
                                                        <td>
                                                            <span>
                                                                @if ($serviceproductorder->rel_to_order->status == 0)
                                                                    <strong class="bg-default text-white px-2 py-1 rounded">Pending</strong>
                                                                @elseif ($serviceproductorder->rel_to_order->status == 2)
                                                                    <strong class="bg-info text-white px-2 py-1 rounded">On Going</strong>
                                                                @elseif ($serviceproductorder->rel_to_order->status == 3)
                                                                    <strong class="bg-warning text-white px-2 py-1 rounded">Due Payment</strong>
                                                                @elseif ($serviceproductorder->rel_to_order->status == 4)
                                                                    <strong class="bg-secondary text-white px-2 py-1 rounded">Refund payment</strong>
                                                                @elseif ($serviceproductorder->rel_to_order->status == 5)
                                                                    <strong class="bg-success text-white px-2 py-1 rounded">Completed</strong>
                                                                @else
                                                                    <strong class="bg-danger text-white px-2 py-1 rounded">Canceled</strong>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>
                                                                @if ($serviceproductorder->rel_to_order->due != 0)
                                                                    <strong class="bg-danger text-white px-2 py-1 rounded">Unpaid</strong>
                                                                @else
                                                                    <strong class="bg-success text-white px-2 py-1 rounded">Paid</strong>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @endforeach
                                            @endif

                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End User history section -->
@endsection

