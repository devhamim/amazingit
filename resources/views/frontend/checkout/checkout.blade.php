@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Checkout')
@section('meta_description', $metaSettings->meta_description ?? 'Checkout' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Checkout' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Checkout' )
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Checkout</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</section>


<section>
    <div class="container pt-70">
        <div class="section-content">
            <form id="checkout-form" action="{{ route('services.order.checkout') }}" method="POST">
                @csrf
                <div class="row mt-30">
                    <div class="col-md-6">
                        <div class="billing-details">
                            <h3 class="mb-30">Billing Details</h3>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="checkuot-form-fname">Name <span class="text-danger">*</span></label>
                                    <input id="checkuot-form-fname" name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="checkuot-form-cname">Phone Number <span class="text-danger">*</span></label>
                                        <input id="checkuot-form-cname" name="phone" type="number" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="checkuot-form-fname">Business Name <span class="text-danger">*</span></label>
                                        <input id="checkuot-form-fname" name="business_name" type="text" class="form-control" placeholder="Business Name" value="{{ old('business_name') }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="order_comments">Additional information</label>
                                    <textarea id="order_comments" class="form-control" name="note" placeholder="Notes about your order, e.g. special notes for delivery." rows="3"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-15">
                        <h3>Coupon Code</h3>
                        <div class="mb-3 col-md-12 mb-5">
                            <label for="checkuot-form-fname">Coupon</label>
                            <input id="checkuot-form-fname" name="coupon" type="text" class="form-control" placeholder="Coupon">
                            @error('coupon')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <h3>Your order</h3>
                        <table class="table table-striped table-bordered tbl-shopping-cart">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail"><a>
                                        <img src="{{ asset('uploads/products/preview') }}/{{ $product_id->preview_image }}" alt="{{ $product_id->preview_image }}"></a>
                                    </td>
                                    <td class="product-name">
                                        <a>{{ $product_id->product_name }}</a>
                                    </td>
                                    <td>
                                        @if ($product_id->id == 2)
                                            <input style="width: 50%; text-align: center" type="number" name="quantity" value="5" min="5">
                                        @else
                                            <input style="width: 50%; text-align: center" type="number" name="quantity" value="1" min="1">
                                        @endif
                                    </td>
                                    <td>
                                        <span class="amount">{{ $product_id->product_discount }}Tk</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-end">
                            <div class="field-input message-btn">
                                <input type="hidden" value="{{ $product_id->id }}" name="product_id">
                                <button type="submit" class="theme-btn btn-style-one w-100" data-loading-text="Please wait...">Order Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
