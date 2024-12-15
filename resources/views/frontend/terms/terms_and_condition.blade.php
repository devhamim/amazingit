@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Terms Conditions')
@section('meta_description', $metaSettings->meta_description ?? 'Terms Conditions' )
@section('meta_title', $metaSettings->meta_title ?? 'Terms Conditions' )
@section('meta_tag', $metaSettings->meta_tag ?? ' Terms Conditions' )
@section('content')

<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{asset('frontend')}}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{asset('frontend')}}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>Terms & Conditions</h1>
                    <a href="{{ url('/')}}">Home <i class="fa-solid fa-angle-right"></i> <span>Terms & Conditions</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<div class="container page-content">
    <div class="row mt-5 mb-7">
        <div class="col-12 py-5">
            {!! $terms->first()->terms_conditions !!}
        </div>
    </div>
</div>
@endsection
