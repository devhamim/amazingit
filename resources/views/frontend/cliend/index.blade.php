@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Cliends')
@section('meta_description', $metaSettings->meta_description ?? 'Cliends' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Cliends' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Cliends' )
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Cliends</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Cliends</li>
            </ul>
        </div>
    </div>
</section>

<section class="featured-products">
    <div class="auto-container">

        <div class="mixitup-gallery">

            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    @php
                        $uniqueCliendsTypes = $cliends->unique('type');
                    @endphp
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    @foreach ($uniqueCliendsTypes as $cliend)
                        @if ($cliend->type == 'one')
                            <li class="filter" data-role="button" data-filter=".{{ $cliend->type }}">OUR HAPPY CLIENTS</li>
                        @elseif ($cliend->type == 'two')
                            <li class="filter" data-role="button" data-filter=".{{ $cliend->type }}">WE ARE WORKING WITH</li>
                        @elseif ($cliend->type == 'three')
                            <li class="filter" data-role="button" data-filter=".{{ $cliend->type }}">WE ARE MEMBERS OF</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="filter-list row">
                @foreach ($cliends as $cliend)
                <div class="product-block all mix {{ $cliend->type }} col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a><img src="{{ asset('uploads/cliend') }}/{{ $cliend->image }}" alt="{{ $cliend->image }}" /></a>
                        </div>
                        <div class="content">
                            <h4 class="text-dark">{{ $cliend->name }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="text-center">
                    {!! $cliends->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
