@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Privacy Policy')
@section('meta_description', $metaSettings->meta_description ?? 'Privacy Policy' )
@section('meta_title', $metaSettings->meta_title ?? 'Privacy Policy' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Privacy Policy' )
@section('content')


<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{asset('frontend')}}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{asset('frontend')}}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1> Privacy Policy</h1>
                    <a href="{{ url('/')}}">Home <i class="fa-solid fa-angle-right"></i> <span> Privacy Policy</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<div class="container page-content">
    <div class="row mt-5 mb-7">
        <div class="col-12 py-5">
            {!! $privacy_policy->first()->privacy_policy !!}
        </div>
    </div>
</div>

@endsection
