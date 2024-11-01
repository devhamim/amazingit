@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Product')
@section('meta_description', $metaSettings->meta_description ?? ' Product' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Product' )
@section('meta_tag', $metaSettings->meta_tag ?? ' Product' )
@section('content')

<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Product</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </div>
</section>

<section class="featured-products">
    <div class="auto-container">

        <div class="mixitup-gallery">

            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    @foreach ($shopcategorys as $shopcategory)
                        <li class="filter" data-role="button" data-filter=".{{ $shopcategory->id }}">{{ $shopcategory->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="filter-list row">
                @foreach ($shopproducts as $product)
                <div class="product-block all mix {{ $product->category_id }} col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image"><a href="{{ route('product.details', $product->slug) }}"><img
                                    src="{{ asset('uploads/shop') }}/{{ $product->preview_image }}" alt="{{ $product->preview_image }}" /></a></div>
                        <div class="content">
                            <h4><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h4>
                            @if ($product->discount != 0)
                                <del class="price" style="display: inline">{{ $product->price }}TK</del>
                                <span class="price" style="display: inline">{{ $product->after_discount }}TK</span>
                            @else
                                <span class="price">{{ $product->after_discount }}TK</span>
                            @endif
                        </div>
                        <div class="icon-box">
                            <a href="{{ route('product.details', $product->slug) }}" class="ui-btn like-btn">
                                <i class="fa fa-heart"></i>
                                </a>
                            <a href="{{ route('product.details', $product->slug) }}" class="ui-btn add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection
