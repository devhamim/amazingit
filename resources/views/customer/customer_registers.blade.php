@extends('customer.layout.app')
@section('title', 'Nugortech IT - Customer Register')
@section('meta_description', 'Nugortech IT - Customer Register')
@section('meta_title', 'Nugortech IT - Customer Register')
@section('content')
<div class="ec-side-cart-overlay"></div>

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Register</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Register</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec login page -->
<!-- Start Register -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Register</h2>
                    <h2 class="ec-title">Register</h2>
                    <p class="sub-title mb-3">Please Register</p>
                    @if (session('error'))
                        <strong class="text-danger">{{ session('error') }}</strong>
                    @endif
                </div>
            </div>
            <div class="ec-register-wrapper">
                <div class="ec-register-container">
                    <div class="ec-register-form">
                        <form action="{{ route('customer.web.store') }}" method="post">
                            @csrf
                            <span class="ec-register-wrap ec-register-half">
                                <label>Name*</label>
                                <input type="text" name="name" placeholder="Enter your name" required />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>Phone Number*</label>
                                <input type="text" name="phone" placeholder="Enter your phone number"
                                    required />
                            </span>
                            <span class="ec-register-wrap">
                                <label>Business Name</label>
                                <input type="text" name="business_name" placeholder="Business Name" />
                            </span>

                            <span class="ec-register-wrap ec-register-btn">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Register -->
@endsection

