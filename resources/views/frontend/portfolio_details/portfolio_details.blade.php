@extends('frontend.master.master')
@section('title', $protfolio_details->first()->title ?? 'Nugortech IT - Protfolio Details')
@section('meta_description', $protfolio_details->first()->title ?? 'Protfolio Details')
@section('meta_title', $protfolio_details->first()->title ?? 'Nugortech IT - Protfolio Details')
@section('meta_tag', $protfolio_details->first()->title ?? 'Protfolio Details')
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Protfolio Details</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Protfolio</li>
            </ul>
        </div>
    </div>
</section>

<section class="project-details">
    <div class="container">
        <div class="row project-slider">
            @foreach ($protfolio_gallery as $gallery)
            <div class="project-block col-lg-3 col-md-6">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image overlay-anim"><a>
                            <img src="{{ asset('uploads/protfolio/gallery') }}/{{ $gallery->gallery_image }}" alt="{{ $gallery->gallery_image }}"></a>
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="project-details__content-right">
                    <div class="project-details__details-box pb-25">
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <p class="project-details__client">Date</p>
                                <h4 class="project-details__name">{{ $protfolio_details->first()->delivery_date }}</h4>
                            </div>
                            <div class="col-6 col-md-3">
                                <p class="project-details__client">Client</p>
                                <h4 class="project-details__name">{{ $protfolio_details->first()->client }}</h4>
                            </div>
                            <div class="col-6 col-md-3">
                                <p class="project-details__client">Website</p>
                                <h4 class="project-details__name"><a target="_blank" href="{{$protfolio_details->first()->website_link != null ? $protfolio_details->first()->website_link : 'N/A'}}">{{$protfolio_details->first()->website_link != null ? $protfolio_details->first()->website_link : 'N/A'}}</a></h4>
                            </div>
                            <div class="col-6 col-md-3">
                                <p class="project-details__client">Project Type</p>
                                <h4 class="project-details__name">{{ $protfolio_details->first()->project_type }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-details__content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__content-left">
                        <h3 class="mb-4 mt-5">{{ $protfolio_details->first()->title }}</h3>
                        <p class>{!! $protfolio_details->first()->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="project-details__pagination-box">
                    <ul class="project-details__pagination list-unstyled clearfix">
                        <li class="next">
                            @if ($protfolio_preview)
                                <div class="icon">
                                    <a href="{{ route('portfolio.details', $protfolio_preview->slug) }}" aria-label="Previous">
                                        <i class="lnr lnr-icon-arrow-left"></i>
                                    </a>
                                </div>
                                <div class="content">Previous</div>
                            @endif
                        </li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="previous">
                            @if ($protfolio_next)
                                <div class="content">Next</div>
                                <div class="icon">
                                        <a href="{{ route('portfolio.details', $protfolio_next->slug) }}" aria-label="Previous">
                                            <i class="lnr lnr-icon-arrow-right"></i>
                                        </a>
                                </div>
                             @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-section">
    <div class="auto-container">
        <div class="sec-title">
            <h2>Recently <br>Completed Projects</h2>
            <div class="text">We Help You Build An Online Brand. Porta nibh venenatis cras sed felis eget
                aliquet sagittis. Urna nec tincidunt praesent.</div>
        </div>
        <div class="slider-btn">
            <button class="prev-btn"><span><i class="flaticon-arrow-pointing-to-right"></i></span></button>
            <button class="next-btn"><span><i class="flaticon-arrow-pointing-to-right"></i></span></button>
        </div>
    </div>
    <div class="row project-slider">
        @foreach ($protfolio_similar as $similar)
            <div class="project-block col-lg-3 col-md-6">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image overlay-anim"><a href="{{ route('portfolio.details', $similar->slug) }}">
                            <img src="{{asset('uploads/protfolio')}}/{{ $similar->preview_image }}" alt="{{ $similar->preview_image }}"></a>
                        </figure>
                        <figure class="image-2"><a href="{{ route('portfolio.details', $similar->slug) }}"><img
                                    src="images/resource/projec1-2.png" alt="projec1-2"></a></figure>
                    </div>
                    <div class="content-box">
                        <span>{{ $similar->project_type }}</span>
                        <h6 class="title"><a href="{{ route('portfolio.details', $similar->slug) }}">{{ $similar->title }}</a></h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection

