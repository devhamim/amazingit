@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - About')
@section('meta_description', $metaSettings->meta_description ?? 'About' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - About' )
@section('meta_tag', $metaSettings->meta_tag ?? 'About' )
@section('content')
    <section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title">About Us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="about-section innerpage" style="padding-bottom: 0">
        <div class="auto-container">
            <div class="row">

                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>FULL-SERVICE DIGITAL MARKETING AGENCY</h2>
                            <div class="my-3">
                                <h4>OUR MISSION</h4>
                                <div class="text">We provide innovative brand marketing that helps our clients reach their business goals.</div>
                            </div>
                            <div class="my-3">
                                <h4>OUR VISION</h4>
                                <div class="text">Our vision is to be a trustworthy digital marketing agency by improving your sales and fostering your growth.</div>
                            </div>
                            <div class="my-3">
                                <h4>OUR VALUES</h4>
                                <div class="text">
                                    In Nugortech IT, we maintain certain values.
                                    <ul>
                                        <li>- Professionalism</li>
                                        <li>- Diversity</li>
                                        <li>- Friendly ambiance</li>
                                        <li>- Promising work</li>
                                        <li>- Equality in the workforce</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="sec-title">
                            <div class="text">
                                Nugortech IT is the leading digital marketing agency. Here, we serve several services including SEO, SMM, content marketing, social media kit, graphic design, logo design, 3D floor plan, 3D modeling, and rendering. Our company has more than 20 employees working in different sectors. Gladly, we serve you 24/7. So, no matter what time zone you are in, you can reach us anytime. We are just a knock away from you!
                                </div>
                        </div>
                        <div class="inner-box row">
                            <div class="content-box pt-3 col-lg-5 col-6">
                                <h6 class="title mb-4"><i class="fa-solid fa-check" style="color: #f94a29;"></i> We love to explore</h6>
                                <h6 class="title mb-4"><i class="fa-solid fa-check" style="color: #f94a29;"></i> We stop at nothing</h6>
                                <h6 class="title mb-4"><i class="fa-solid fa-check" style="color: #f94a29;"></i> We solve real problems</h6>
                                <h6 class="title mb-4"><i class="fa-solid fa-check" style="color: #f94a29;"></i> We keep everything simple</h6>
                                <h6 class="title mb-4"><i class="fa-solid fa-check" style="color: #f94a29;"></i> We think differently</h6>
                            </div>
                            <div class="content-box col-lg-5 col-6">
                                <img  src="{{ asset('frontend/images/shan.webp') }}" alt="shan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section innerpage">
        <div class="auto-container">
            <div class="row">

                <div class="image-column col-lg-6">
                    <div class="inner-column" style="margin-left:0">
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img width="100%" src="{{ asset('frontend') }}/images/resource/about1-1.webp" alt="about1">
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>WE ARE TEAM Nugortech IT</h2>
                            <div class="text">Nugortech IT is an innovative digital marketing agency. Here, we believe integrating experience with technology brings the perfect outcome. Accordingly, we empower more than thousands of businesses across the world. So, we are the global marketing platform to boost any business to reach the apex.</div>
                        </div>
                        <div class="inner-box">
                            <div class="content-box">
                                <span>FREE AUDIT REPORT</span>
                                <h6 class="title">Get 100% authentic audit reports
                                    your online business absolutely free. </h6>
                            </div>
                            <div class="content-box">
                                <span>BEST TEAM MEMBERS</span>
                                <h6 class="title">from  Expert teammates for
                                    ensuring top-quality service.</h6>
                            </div>
                        </div>
                        <div class="btn-box mt-5">
                            <a href="{{ route('our.services') }}" class="theme-btn-v2">Get started <i
                                    class="btn-icon fa-sharp far fa-arrow-right ml-10 font-size-18"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section position-relative pt-120 pb-100 bg-light">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2 class="text-white">OUR TEAM</h2>
            </div>
            <div class="row">
                @foreach ($teams->take(12) as $team)
                <div class="team-block col-lg-3 col-md-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('uploads/team') }}/{{ $team->image }}" alt="{{ $team->name }}"></figure>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a>{{ $team->name }}</a></h4>
                            <span>{{ $team->education }}</span><br>
                            <span>{{ $team->designation }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="contact-banner pt-0">
        <div class="auto-container">
            <div class="outer-box">
                <h3 class="title text-center">GREAT THINGS IN BUSINESS ARE NEVER DONE BY ONE PERSON. THEY’RE DONE BY A TEAM OF PEOPLE.</h3>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="inner-container">
            <div class="sec-title text-center">
                <h2>WHAT OUR CUSTOMERS ARE <br> TALKING ABOUT</h2>
                <h6>Across the world, we have more than thousands of satisfied clients. So, <br> count our milestones with our client’s success stories.</h6>
            </div>
            <div class="row testi-slider">
                @foreach ($testmonials as $testmonial)
                    <div class="testimonial-block col-md-6">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="flaticon-quote-1"></i>
                            </div>
                            <div class="content-box">
                                <div class="text">{{ $testmonial->description }}</div>
                                <div class="auther-info">
                                    <img width="70px" height="70px" src="{{asset('uploads/testimonial')}}/{{ $testmonial->image }}" alt="{{ $testmonial->image }}">
                                    <div class="info-box">
                                        <h6 class="title">{{ $testmonial->name }}</h6>
                                        <span>{{ $testmonial->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


