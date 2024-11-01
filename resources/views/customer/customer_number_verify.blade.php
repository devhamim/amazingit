@extends('customer.layout.app')
@section('content')
<div class="ec-side-cart-overlay"></div>
<!-- ekka Cart End -->

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
                    <p class="sub-title mb-3">Please enter your 6 digit verify code</p>
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form action="{{ route('customer.verify') }}" method="POST">
                            @csrf
                            <span class="ec-login-wrap">
                                <label>Verify*</label>
                                <input type="number" name="verify" placeholder="Enter your verify code" required />
                                @if (session('error'))
                                    <strong class="text-danger">{{ session('error') }}</strong>
                                @endif
                            </span>
                            <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">Verify</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

