@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Services')
@section('meta_description', $metaSettings->meta_description ?? 'Services' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Services' )
@section('meta_tag', $metaSettings->meta_tag ?? ' Services' )
@section('content')

<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>Our Best Services</h1>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Services</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== SERVICE AREA STARTS =======-->
<div class="service1-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-all-boxes-area1">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-lg-3 col-md-6">
                                <div class="service-boxarea">
                                    <a href="#">{{$service->category_name}}</a>
                                    <div class="space40"></div>
                                    <img src="{{asset('uploads/category')}}/{{$service->category_image}}" alt="">
                                    <div class="space40"></div>
                                    <p>{{$service->category_desp}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== SERVICE AREA ENDS =======-->

<!--===== WORK AREA STARTS =======-->
<div class="works-inner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="works-header-area heading2">
                    <h5>Why Choose Us</h5>
                    <h2>Experience the Advantage Why We're the Right Choice</h2>
                    <p>Choose us for unmatched expertise, personalized solutions, and a proven track record of success. We’re dedicated to delivering results that drive your business forward.</p>
                    <div class="space32"></div>
                    <div class="works-content-box">
                        <div class="icons">
                            <img src="{{ asset('frontend') }}/img/icons/works-icons7.svg" alt="">
                        </div>
                        <div class="content">
                            <a href="#">Proven Result</a>
                            <p>Achieve measurable success with our tailored strategies and solutions. We deliver consistent, impactful outcomes that drive growth and exceed expectations.</p>
                        </div>
                    </div>
                    <div class="space20"></div>
                    <div class="works-content-box">
                        <div class="icons">
                            <img src="{{ asset('frontend') }}/img/icons/works-icons8.svg" alt="">
                        </div>
                        <div class="content">
                            <a href="#">Customized Solutions</a>
                            <p>We offer personalized strategies designed to meet your unique needs. Our tailored solutions ensure maximum impact, helping you achieve your specific business goals effectively.</p>
                        </div>
                    </div>
                    <div class="space20"></div>
                    <div class="works-content-box">
                        <div class="icons">
                            <img src="{{ asset('frontend') }}/img/icons/works-icons9.svg" alt="">
                        </div>
                        <div class="content">
                            <a href="#">Dedicated Support</a>
                            <p>Our team is committed to providing you with continuous, reliable support. We are here to assist you at every step, ensuring your success with prompt, personalized service whenever you need it.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-all-images-area">
                    <img src="{{ asset('frontend') }}/img/elements/elements14.png" alt="" class="elements12 keyframe5">
                    <img src="{{ asset('frontend') }}/img/elements/elements15.png" alt="" class="elements13 keyframe5">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="img1 image-anime">
                                <div class="space100"></div>
                                <img src="{{ asset('frontend') }}/img/all-images/about-img6.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="img2 image-anime">
                                <img src="{{ asset('frontend') }}/img/all-images/about-img5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== WORK AREA ENDS =======-->

<!--===== SKILLS AREA STARTS =======-->
<div class="skills-section-area sp2">
    <img src="{{ asset('frontend') }}/img/bg/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="{{ asset('frontend') }}/img/bg/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 m-auto">
                <div class="skills-header text-center heading2">
                    <h5>Skills</h5>
                    <h2>Our Skills</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-10 m-auto">
            <div class="circle-progress-area">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="progresbar">
                            <div class="progressbar">
                                <div class="circle" data-percent="100">
                                    <canvas></canvas>
                                    <div>100%</div>
                                </div>
                            </div>
                            <p>Web</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="progresbar">
                            <div class="progressbar">
                                <div class="circle two" data-percent="100">
                                    <canvas></canvas>
                                    <div>100%</div>
                                </div>
                            </div>
                            <p>Graphics Design</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="progresbar">
                            <div class="progressbar">
                                <div class="circle three" data-percent="100">
                                    <canvas></canvas>
                                    <div>100%</div>
                                </div>
                            </div>
                            <p>SEO</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="progresbar">
                            <div class="progressbar">
                                <div class="circle four" data-percent="100">
                                    <canvas></canvas>
                                    <div>100%</div>
                                </div>
                            </div>
                            <p>Digital Marketing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== SKILLS AREA ENDS =======-->
@endsection

