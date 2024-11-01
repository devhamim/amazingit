@extends('frontend.master.master')
@section('title', 'Nugortech IT - '.  $shopproducts->name ?? 'Nugortech IT - Product Deatils')
@section('meta_description',  $shopproducts->name ?? ' Product Deatils')
@section('meta_title', 'Nugortech IT - '.  $shopproducts->name ?? 'Nugortech IT - Product Deatils')
@section('meta_tag',  $shopproducts->name ?? 'Product Deatils')
@section('content')

<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Product Deatils</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Product Deatils</li>
            </ul>
        </div>
    </div>
</section>

<section class="product-details">
    <div class="container pb-70">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="">
                    <div class="slider-content">
                        <figure class="image-box">
                            <a href="#" class="lightbox-image" data-fancybox="gallery">
                                <img src="{{ asset('uploads/shop/gallery') }}/{{ $productgallerys->first()->gallery_image }}" alt="{{ $productgallerys->first()->gallery_image }}">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 product-info">
                <div class="product-details__top">
                    <h3 class="product-details__title">{{ $shopproducts->name }}</h3>
                    <h3>
                        @if ($shopproducts->discount !=0)
                        <span>{{ $shopproducts->after_discount }}Tk</span>
                        <del style="font-size: 12px">{{ $shopproducts->price }}Tk</del>
                        @else
                            <span>{{ $shopproducts->after_discount }}Tk</span>
                        @endif
                    </h3>
                </div>
                <div class="product-details__content">
                    <p class="product-details__content-text1">{!! $shopproducts->sort_description !!}</p>
                </div>
                <div class="product-details__buttons">
                    @auth('customerauth')
                        <div class="product-details__buttons-1">
                            <a href="#" class="theme-btn btn-style-one">Add to Cart</a>
                        </div>
                    @endauth
                    <div class="product-details__buttons-2">
                        <form action="{{ route('product.checkout.view') }}" method="GET">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $shopproducts->id }}">
                            <button type="submit"class="theme-btn btn-style-one">Order Now</button>
                        </form>
                    </div>
                </div>
                <div class="product-details__social">
                    <div class="title mt-10">
                        <h3>Share with friends</h3>
                    </div>
                    <ul class="social-icon-one product-share">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-description">
    <div class="container pt-0 pb-90">
        <div class="product-discription">
            <div class="tabs-box">
                <div class="tab-btn-box text-center">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                        <li class="tab-btn" data-tab="#tab-2">Reviews</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="text">
                            <h3 class="product-description__title">Description</h3>
                            <p class="product-description__text1">
                                {!! $shopproducts->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="tab" id="tab-2">
                        <div class="customer-comment">
                            <div class="row clearfix">
                                @foreach ($product_comment as $comment)
                                <div class="col-lg-6 col-md-6 col-sm-12 comment-column">
                                    <div class="single-comment-box">
                                        <div class="inner-box">
                                            <figure class="comment-thumb">
                                                <img src="{{ Avatar::create($comment->name)->toBase64() }}" alt="{{ $comment->name }}">
                                            </figure>
                                            <div class="inner">
                                                <ul class="rating clearfix">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <h5>{{ $comment->name }}, <span>{{ $comment->created_at->format('d M Y') }}</span></h5>
                                                <p>{{ $comment->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="comment-box">
                            <h3>Add Your Comments</h3>
                            <form id="contact_form" action="{{ route('product.comment.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="message" class="form-control required" rows="7" required placeholder="Enter Message"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input name="name" class="form-control" type="text" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input name="email" class="form-control required email" type="email" required placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input name="product_id" class="form-control" type="hidden" value="{{ $shopproducts->id }}" />
                                    <button type="submit" class="theme-btn btn-style-one"
                                        data-loading-text="Please wait...">Submit Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-product">
    <div class="container pt-0 pb-90">
        <h3>Related Products</h3>
        <div class="row clearfix">
            <div class="col">

                <div class="mixitup-gallery">
                    <div class="filter-list row">
                        @foreach ($similarproducts as $similarproduct)
                            <div class="product-block all mix pantry fruit col-lg-3 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><a href="{{ route('product.details', $similarproduct->slug) }}"><img
                                                src="{{ asset('uploads/shop') }}/{{ $similarproduct->preview_image }}" alt="{{ $similarproduct->preview_image }}" /></a></div>
                                    <div class="content">
                                        <h4><a href="{{ route('product.details', $similarproduct->slug) }}">{{ $similarproduct->name }}</a></h4>
                                        <span class="price">{{ $similarproduct->after_discount }}Tk</span>
                                    </div>
                                    <div class="icon-box">
                                        <a href="{{ route('product.details', $similarproduct->slug) }}" class="ui-btn like-btn"><i
                                                class="fa fa-heart"></i></a>
                                        <a href="{{ route('product.details', $similarproduct->slug) }}" class="ui-btn add-to-cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
