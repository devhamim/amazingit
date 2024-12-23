@extends('frontend.master.master')
@section('title',  $services->category_name ?? ' Service' )
@section('meta_description',  $services->category_name ?? ' Service' )
@section('meta_title',  $services->category_name ?? 'Service' )
@section('meta_tag',  $services->category_name ?? ' Service' )
@section('content')

<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>{{ $services->category_name }}</h1>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Services</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== SERVICE AREA STARTS =======-->
<div class="case-inner-section-area sp1">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="tabs-content-area">
                    <div class="tab-content row" id="pills-tabContent">
                        <div class="tab-pane col-lg-12 fade active show" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div class="row">
                                @foreach ($products as $service)
                                    <div class="col-lg-4">
                                        <div class="tabs-contents">
                                            <div class="align-items-center">
                                                <div class="case-inner-box">
                                                    {{-- <div class="img1 image-anime"> --}}
                                                        <a href="{{ route('services.product.details',$service->slug) }}">
                                                            <img src="{{asset('uploads/products/preview')}}/{{$service->preview_image}}" alt="">
                                                        </a>
                                                    {{-- </div> --}}
                                                    <div class="content-area">
                                                        <div class="link-area">
                                                            <a href="{{ route('services.product.details',$service->slug) }}" class="head">{{ $service->product_name }}</a>
                                                            <p>{{ $service->rel_to_category->category_name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== SERVICE AREA ENDS =======-->
@endsection

