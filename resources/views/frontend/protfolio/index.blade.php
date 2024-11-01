@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Protfolios')
@section('meta_description', $metaSettings->meta_description ?? 'Protfolios' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Protfolios' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Protfolios' )
@section('content')

<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Protfolios</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Protfolios</li>
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
                    @php
                        $uniqueProjectTypes = $portfolios->unique('project_type');
                    @endphp
                    @foreach ($uniqueProjectTypes as $portfolio)
                        <li class="filter" data-role="button" data-filter=".{{ str_replace(' ', '', $portfolio->project_type) }}">{{ $portfolio->project_type }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="filter-list row">
                @foreach ($portfolios as $portfolio)
                <div class="product-block all mix {{ str_replace(' ', '',$portfolio->project_type) }} col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image"><a href="#">
                            <img src="{{ asset('uploads/protfolio') }}/{{ $portfolio->preview_image }}" alt="{{ $portfolio->preview_image }}" /></a>
                        </div>
                        <div class="content">
                            <h4><a class="text-dark" href="#">{{ $portfolio->title }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="text-center">
                    {!! $portfolios->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
