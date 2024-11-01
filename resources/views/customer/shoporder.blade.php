@extends('customer.layout.app')
@section('title', 'Nugortech IT - Customer Order')
@section('meta_title', 'Nugortech IT - Customer Order')
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
                            <a class="btn btn-lg btn-primary" href="{{ route('our.products') }}">Products</a>
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
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (Auth::guard('customerauth')->check())
                                            @if ($shopproducts)
                                                @foreach ($shopproducts as $key => $shopproduct)
                                                    <tr>
                                                        <th scope="row"><span>{{ $shopproduct->order_id }}</span></th>
                                                        <td>
                                                            <img class="prod-img" src="{{ asset('uploads/shop') }}/{{ $shopproduct->rel_to_product->preview_image }}"alt="product image">
                                                        </td>
                                                        <td><span>{{ $shopproduct->rel_to_product->name }}</span></td>
                                                        <td><span>{{ $shopproduct->created_at->format('d M Y') }}</span></td>
                                                        <td><span>{{ $shopproduct->total }}</span></td>
                                                        <td>
                                                            <span>
                                                                @if ($shopproduct->status == 1)
                                                                    <a href="{{ $shopproduct->rel_to_product->download_link }}" class="bg-success text-white px-2 py-1 rounded">Download</a>
                                                                @else
                                                                    <form action="{{ route('auth.pay.due') }}" method="POST">
                                                                        @csrf
                                                                            <input type="hidden" name="id" value="{{ $shopproduct->id }}">
                                                                            @if (Auth::guard('customerauth')->user()->name != null)
                                                                            <input type="hidden" name="name" value="{{ Auth::guard('customerauth')->user()->name }}">
                                                                            @else
                                                                            <input type="hidden" name="name" value="Customer">
                                                                            @endif
                                                                            <input type="hidden" name="total" value="{{ $shopproduct->total }}">
                                                                        <button type="submit" class="bg-danger text-white px-2 py-1 rounded">Unpaid</button>
                                                                    </form>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
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

