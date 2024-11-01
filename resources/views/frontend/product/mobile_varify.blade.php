@extends('frontend.master.master')

@section('content')

<section class=" position-relative pt-120 pb-100 bg-light pt-5 mt-5" style="height: 50vh">
    <div class="auto-container">
        <div class="row">
            <form action="{{ route('shop.number.otp') }}" method="POST">
            @csrf
                <div class="col-lg-6 m-auto rounded" style="background: #ffc5b9; padding: 20px 40px">
                    <h3>Please enter your 6 digit verify code</h3>
                    <input type="number" name="mobile_varify_code" class="form-control" placeholder="OTP" required>
                    <div class=" pt-5">
                        @if (session('error'))
                            <strong class="text-danger">{{ session('error') }}</strong>
                        @endif
                        <button type="submit" class="theme-btn w-100">Varify</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

