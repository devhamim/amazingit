@extends('frontend.master.master')
@section('title', $products->first()->product_name ?? ' Service Details')
@section('meta_description', $products->first()->meta_description ??  $products->first()->product_name)
@section('meta_title',  $products->first()->meta_title ??  $products->first()->product_name)
@section('meta_tag',  $products->first()->meta_tag ??   $products->first()->product_name)
@section('content')

    <!--===== HERO AREA STARTS =======-->
    <div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
        <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="about-inner-header heading9 text-center">
                        <h1>{{ $products->first()->product_name }}</h1>
                        <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> Service Details <i class="fa-solid fa-angle-right"></i> <span>{{ $products->first()->product_name }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== CASE AREA STARTS =======-->
    <div class="case-single-section-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-auhtor-area sp1">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="case-single-hedaer heading2">
                                    <h2>Information</h2>

                                    <div class="case-others-area">
                                        <ul>
                                            <li><span>Service:</span>{{ $products->first()->product_name }}</li>
                                            <li><span>Offer Price:</span>{{ $products->first()->product_discount}}Tk - <del>{{ $products->first()->product_price }}Tk</del></li>
                                            <li><span>live chat:</span>
                                                <a href="https://api.whatsapp.com/send?phone=8801303523442&text=Hello%20there,%20I%20found%20you%20on%20website!%20i%20would%20like%20to%20talk%20about%20your%20service%20in%20details.%20product:%20{{ urlencode($products->first()->product_name) }}%20-%20{{ urlencode(route('product.details',$products->first()->slug)) }}" target="_blank">
                                                    Whatsapp
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-7">
                                <div class="case-images image-anime">
                                    <img src="{{ asset('uploads/products/gallery') }}/{{ $productgallery->first()->gallery_image }}" alt="{{ $products->first()->gallery_image_alt_tag }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="case-lista-area sp1 bg2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    {!! $products->first()->description !!}
                </div>

            </div>
        </div>
    </div>
    <!--===== CASE AREA ENDS =======-->


@endsection
