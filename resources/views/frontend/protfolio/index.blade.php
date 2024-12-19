@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Protfolios')
@section('meta_description', $metaSettings->meta_description ?? 'Protfolios' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Protfolios' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Protfolios' )
@section('content')


<div class="about-header-area" style="background-image: url({{asset('frontend')}}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{asset('frontend')}}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>Our Case Study</h1>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> Case Study <i class="fa-solid fa-angle-right"></i> <span>Our Case Study</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===== CASE AREA STARTS =======-->
<div class="case-inner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="case-header text-center heading2">
                    <h5>Case Study</h5>
                    <h2>Our Case Studies</h2>
                </div>
                <div class="space50 d-lg-block d-none"></div>
                <div class="space30 d-lg-none d-block"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 m-auto">
                <div class="tabs-area text-center">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist" >
                      <li class="nav-item" role="presentation" >
                        <button class="nav-link active" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">All</button>
                      </li>
                        @php
                            $uniqueProjectTypes = $portfolios->unique('project_type');
                        @endphp
                        @foreach ($uniqueProjectTypes as $portfolio)
                            <li class="nav-item" role="presentation" >
                                <button class="nav-link" id="pills-hyper-tab" data-bs-toggle="pill" data-bs-target="#{{ str_replace(' ', '', $portfolio->project_type) }}" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ $portfolio->project_type }}</button>
                            </li>

                        @endforeach
                    </ul>
                  </div>
            </div>
            <div class="col-lg-12">
                <div class="tabs-content-area">
                    <div class="tab-content row" id="pills-tabContent">
                        @foreach ($portfolios as $portfolio)
                            <div class="tab-pane col-lg-4 fade active show" id="{{ str_replace(' ', '',$portfolio->project_type) }}" role="tabpanel">
                                <div class="tabs-contents">
                                    <div class=" align-items-center">
                                        <div class="">
                                            <div class="case-inner-box">
                                                <div class="img1 image-anime">
                                                    <img src="{{ asset('uploads/protfolio') }}/{{ $portfolio->preview_image }}" alt="">
                                                </div>
                                                <div class="content-area">
                                                    <div class="link-area">
                                                        {{-- <a href="#" class="tags">{{ $portfolio->project_type }}</a> --}}
                                                        <a href="#" class="head">{{ $portfolio->title }}</a>
                                                    </div>
                                                    {{-- <div class="arrow">
                                                        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                                    </div> --}}
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
<!--===== CASE AREA ENDS =======-->

@endsection
