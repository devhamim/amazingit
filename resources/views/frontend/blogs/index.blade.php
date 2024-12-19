@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Blogs')
@section('meta_description', $metaSettings->meta_description ?? 'Blogs' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Blogs' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Blogs' )
@section('content')

    <!--===== HERO AREA STARTS =======-->
    <div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
        <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="about-inner-header heading9 text-center">
                        <h1>Our Blog</h1>
                        <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Our Blog</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== BLOG AREA STARTS =======-->

    <div class="blog1-scetion-area sp1 bg2">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-author-boxarea">
                            <div class="img1">
                                <img src="{{ asset('uploads/blogs') }}/{{ $blog->preview_image }}" alt="{{ $blog->preview_image_alt_tag }}">
                            </div>
                            <div class="content-area">
                                <div class="tags-area">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/img/icons/contact1.svg" alt="">{{ $blog->category }}</a></li>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/img/icons/calender1.svg" alt="">{{ $blog->created_at->format('d M Y') }}</a></li>
                                    </ul>
                                </div>
                                <a href="{{ route('blog.details', $blog->slug) }}">{{ Str::limit($blog->title, 70, '...') }}</a>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="space30"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--===== BLOG AREA ENDS =======-->

@endsection

