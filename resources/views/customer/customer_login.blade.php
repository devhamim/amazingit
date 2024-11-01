@extends('customer.layout.app')
@section('title', 'Nugortech IT - Customer Login')
@section('meta_description', 'Nugortech IT - Customer Login')
@section('meta_title', 'Nugortech IT - Customer Login')
@section('content')
<div class="ec-side-cart-overlay"></div>
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Login</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Login</li>
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
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Log In</h2>
                    <h2 class="ec-title">Log In</h2>
                    <p class="sub-title mb-3">Please enter your phone number to login</p>
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form action="{{ route('customer.number.login') }}" method="POST">
                            @csrf

                            <span class="ec-login-wrap">
                                <label>Phone Number*</label>
                                <input type="number" name="number" placeholder="Enter your number" required />
                            </span>
                            <span class="ec-login-wrap ec-login-btn ">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <a href="{{ route('customer.registers') }}" class="btn btn-secondary">Register</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

