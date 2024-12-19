@extends('frontend.master.master')
@section('title',  $blogs->title ?? ' Blog Details')
@section('meta_description', $blogs->meta_description ?? $blogs->title)
@section('meta_title', $blogs->meta_title ?? $blogs->title)
@section('meta_tag', $blogs->meta_tag ?? $blogs->title)
@section('content')
    <!--===== HERO AREA STARTS =======-->
    <div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
        <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="about-inner-header heading9 text-center">
                        <h1>Blog Details</h1>
                        <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Our Blog</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== BLOG AREA STARTS =======-->
    <div class="blog-auhtor-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="blog-auhtor-sidebar-area heading2">
                        <div class="tags-area">
                            <ul>
                                <li><a href="#"><img src="{{ asset('frontend') }}/img/icons/contact1.svg" alt="">{{ $blogs->author }}</a></li>
                                <li><a href="#"><img src="{{ asset('frontend') }}/img/icons/calender1.svg" alt="">{{ $blogs->created_at->format('d M Y') }}</a></li>
                            </ul>
                        </div>
                        <h2>{{ $blogs->title }}</h2>
                        <div class="space34"></div>
                        <div class="img1">
                            <img src="{{ asset('uploads/blogs') }}/{{ $blogs->image }}/img/all-images/blog-img23.png" alt="{{ $blogs->image_alt_tag }}">
                        </div>
                        <div class="space24"></div>
                        <p>{!! $blogs->description !!}</p>

                        <div class="social-tags">
                            <div class="tags">
                                <h4>Tags:</h4>
                                <ul>
                                    @foreach(collect($tagsArray)->take(4) as $tag)
                                        <li><a href="#">{{ trim($tag) }}</a></li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                        <div class="space50"></div>
                        <h3>Blog Comments ({{ $comments_count }})</h3>
                        @foreach ($comments as $comment)
                        <div class="space32"></div>
                        <div class="comments-boxarea">
                            <div class="comments-boxes">
                                <div class="comments-auhtor-box">
                                    <div class="img3">
                                        <img src="assets/img/all-images/comments-img1.png" alt="">
                                    </div>
                                    <div class="content">
                                        <a href="#" class="name">{{ $comment->name }}</a>
                                        <a href="#" class="date">{{ $comment->created_at->format('d M Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="space16"></div>
                            <p>"{{ $comment->message }}"</p>
                        </div>
                        @endforeach

                        <div class="space50"></div>

                        <div class="contact-form-area">
                            <h4>Leave a Reply</h4>
                            <div class="space16"></div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <p>Provide clear contact information, including phone number, email, and address.</p>
                            <div class="space12"></div>
                            <form id="contact_form" action="{{ route('blog.comment.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input name="name" class="form-control" type="text"
                                                placeholder="Enter Name" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input name="email" class="form-control email"
                                                type="email" placeholder="Enter Email">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="input-area">
                                            <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                                        <div class="space24"></div>
                                        <div class="input-area">
                                            <button type="submit" class="header-btn1">Submit <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== BLOG AREA ENDS =======-->

    <!--===== BLOG AREA STARTS =======-->
    <div class="blog1-scetion-area sp2 bg2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="blog-hedaer-area heading2 text-center">
                        <h2>More Blogs & News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($resent_blog->take(3) as $resent)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-author-boxarea">
                            <div class="img1">
                                <img src="{{ asset('uploads/blogs') }}/{{ $resent->preview_image }}" alt="{{ $resent->preview_image_alt_tag }}">
                            </div>
                            <div class="content-area">
                                <div class="tags-area">
                                    <ul>
                                        <li><a href="#"><img src="assets/img/icons/contact1.svg" alt="">{{ $resent->author }}</a></li>
                                        <li><a href="#"><img src="assets/img/icons/calender1.svg" alt="">{{ $resent->created_at->format('d M Y') }}</a></li>
                                    </ul>
                                </div>
                                <a href="{{ route('blog.details', $resent->slug) }}">{{ $resent->title }}</a>

                                <a href="{{ route('blog.details', $resent->slug) }}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
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

