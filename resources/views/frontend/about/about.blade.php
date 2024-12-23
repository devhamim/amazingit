@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - About')
@section('meta_description', $metaSettings->meta_description ?? 'About' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - About' )
@section('meta_tag', $metaSettings->meta_tag ?? 'About' )
@section('content')

<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{ asset('frontend') }}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{ asset('frontend') }}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{ asset('frontend') }}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>About Us</h1>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>About Us</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== ABOUT AREA STARTS =======-->
<div class="about1-section-area sp6 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4">
        <div class="about-images">
         <figure class="image-anime">
          <img src="{{ asset('frontend') }}/img/all-images/about-img1.png" alt="">
         </figure>
          <img src="{{ asset('frontend') }}/img/elements/star1.png" alt="" class="star1 keyframe5">
        </div>
      </div>
      <div class="col-lg-5">
        <div class="about-content-area heading2">
          <div class="arrow-circle">
          <a href="about.html">
            <img src="{{ asset('frontend') }}/img/elements/elements4.png" alt="" class="elements4 keyframe5">
            <img src="{{ asset('frontend') }}/img/icons/arrow.svg" alt="" class="arrow">
          </a>
          </div>
          <h2>Comprehensive programmer and software engineer.</h2>
          <p>Welcome to Amaizing IT your trusted partner for comprehensive Graphics Design, SEO, digital marketing Website and Software. With our proven expertise and innovative strategies the digital landscape.</p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="about-auhtor-images">
          <img src="{{ asset('frontend') }}/img/elements/elements5.png" alt="" class="elements5 keyframe5">
          <figure class="image-anime">
            <img src="{{ asset('frontend') }}/img/all-images/about-img2.png" alt="">
           </figure>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== ABOUT AREA ENDS =======-->
<div class="space60"></div>
<!--===== TESTIMONIAL AREA STARTS =======-->
<div class="slider-section-area slider-inner sp5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2">
          <div class="sldier-head">
            <p>Trusted by  <br class="d-lg-block d-none"> Top Companies</p>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="slider-images-area owl-carousel">
            @foreach($cliends as $cliend)
                <div class="img1">
                    <img src="{{ asset('uploads/cliend') }}/{{ $cliend->image }}" alt="">
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
<!--===== TESTIMONIAL AREA ENDS =======-->

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

<!--===== SERVICE AREA STARTS =======-->
<div class="service2-section-area sp1 bg2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="service2-header heading2 text-center">
          <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star2 keyframe5">
          <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star3 keyframe5">
          <h5>Our Value</h5>
          <h2 class="text-anime-style-3"> Proven Results And Exceptional Service</h2>
          <p data-aos="fade-up" data-aos-duration="1000">We pride ourselves on delivering a value proposition that goes beyond expectations. Our <br class="d-md-block d-none"> approach is centered on understanding your business inside</p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
          <div class="images-content-area" data-aos="zoom-in" data-aos-duration="1000">
            <div class="img1">
              <img src="{{asset('frontend')}}/img/all-images/service-img1.png" alt="">
            </div>
            <div class="content-area">
              <h5>Our Value</h5>
              <a href="{{ route('our.services') }}" class="text text-anime-style-3">Explore Our Unique Value Proposition & How We Drive Business Growth</a>
              <p data-aos="fade-up" data-aos-duration="1000">we're committed to delivering exceptional value to our clients. We understand that every business is unique, personalized approach to every project we undertake.</p>
              <div class="btn-area" data-aos="fade-up" data-aos-duration="1200">
                <a href="{{ route('our.services') }}" class="header-btn1">Service <span><i class="fa-solid fa-arrow-right"></i></span>
                </a>
              </div>
            </div>
            <div class="arrow-area">
              <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="service-all-boxes">
            <div class="row">
              <div class="col-lg-12 col-md-6">
                <div class="service2-auhtor-boxarea" data-aos="zoom-out" data-aos-duration="1000">
                  <div class="arrow">
                    <a href="{{ route('about') }}"><i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                  <div class="content-area">
                    <h5>Our Mission</h5>
                    <a href="{{ route('about') }}">We strive to be more than just a service provider; we aim to be trusted Amaizing IT </a>
                    <p>By staying true to our mission and values, we are committed to helping businesses of all sizes achieve their goals, realize their potential shape.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-6">
                <div class="service2-auhtor2-boxarea" data-aos="zoom-out" data-aos-duration="1200">
                  <div class="arrow">
                    <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                  <div class="content-area">
                    <h5>Our Vision</h5>
                    <a href="#">We aspire to create a world where every business owner feels empowered</a>
                    <p>By staying true to our vision and values, we are committed to driving positive change and shaping a brighter future for businesses and communities.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<!--===== SERVICE AREA ENDS =======-->

<!--===== HISTORY AREA STARTS =======-->
<div class="history-inner-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="history-header-area text-center heading2">
                    <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star2 keyframe5">
                    <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star3 keyframe5">
                    <h5>Our History</h5>
                    <h2>Our Journey: Charting the <br class="d-lg-block d-none"> Evolution of Amaizing IT</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-all-images-area">
                    <img src="{{ asset('frontend') }}/img/elements/elements14.png" alt="" class="elements12 keyframe5">
                    <img src="{{ asset('frontend') }}/img/elements/elements15.png" alt="" class="elements13 keyframe5">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="img1 image-anime">
                            <div class="space100"></div>
                          <img src="{{ asset('frontend') }}/img/all-images/history-img1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="img2 image-anime">
                          <img src="{{ asset('frontend') }}/img/all-images/history-img2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-lg-6">
                <div class="history-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Inception and Founding</a>
                                <p>Founded to deliver innovative solutions in web design, software development, SEO, and digital marketing.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Expansion and Growth</a>
                                <p>The team expanded to include additional members with diverse skill sets and expertise allowing us.</p>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Recognition and Awards</a>
                                <p>Honored with industry accolades for excellence in web design, development, SEO, and digital marketing.</p>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Launch of New Services</a>
                                <p>Building on our success, Amaizing IT expanded our service offerings to better meet the evolving needs. </p>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Strategic Partnerships </a>
                                <p>Amaizing IT formed strategic partnerships and collaborations with industry leaders and technology providers. </p>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="history-box-content">
                                <a href="#">Continued Growth  Success</a>
                                <p>Driven by innovation, we consistently deliver results that fuel our clients' growth and success.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HISTORY AREA ENDS =======-->

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
                @foreach($skilles as $skille)
                    <div class="col-lg-3 col-md-6">
                        <div class="progresbar">
                        <div class="progressbar">
                            <div class="circle" data-percent="{{ $skille->number }}">
                            <canvas></canvas>
                                <div>{{ $skille->number }}%</div>
                            </div>
                        </div>
                        <p>{{ $skille->name }}</p>
                        </div>
                    </div>
                @endforeach
          </div>
          </div>
        </div>
    </div>
</div>
<!--===== SKILLS AREA ENDS =======-->

<!--===== TEAM AREA STARTS =======-->
<div class="team-inner-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="team2-header-area text-center heading2">
                    <h5>Our Team</h5>
                    <h2>Meet With Our Expert Team</h2>
                </div>
            </div>
        </div>
        <div class="row" style="justify-content: center;">
            @foreach ($teams->take(12) as $team)
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="team-boxarea">
                        <div class="img1">
                            <img src="{{ asset('uploads/team') }}/{{ $team->image }}" alt="{{ $team->name }}">
                        </div>

                        <div class="content">
                            <a>{{ $team->name }}</a>
                            <p>{{ $team->designation }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

  <!--===== TEAM AREA ENDS =======-->

<!--===== TESTIMONIAL AREA STARTS =======-->
<div class="testimonial1-section-area sp1 bg2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="testimonial-header heading2 text-center">
          <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star2 keyframe5">
          <img src="{{ asset('frontend') }}/img/elements/star7.png" alt="" class="star3 keyframe5">
          <h5>Testimonials</h5>
          <h2 class="text-anime-style-3">What Our Client Say <br class="d-md-block d-none"> On Google Reviews</h2>
          <p data-aos="fade-up" data-aos-duration="1000">Don't just take our word for it. Hear what our satisfied clients <br class="d-md-block d-none"> have to say about their experience partnering with Amaizing IT</p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto" data-aos="fade-up" data-aos-duration="1000">
          <div class="testimonials-slider-area owl-carousel">
            @foreach ($testmonials as $testmonial)
                <div class="testimonial-boxarea">
                <div class="row">
                    <div class="col-lg-5">
                    <div class="pera">
                        <p>{{ $testmonial->description }}</p>
                        <div class="space100"></div>
                        <div class="space30"></div>
                        <div class="list-area">
                        <div class="list">
                            <ul>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <a href="#">{{ $testmonial->name }}</a>
                        </div>
                        <img src="{{asset('frontend')}}/img/icons/google.svg" alt="">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-7">
                    <div class="images">
                        <img src="{{asset('uploads/testimonial')}}/{{ $testmonial->image }}" alt="">
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
<!--===== TESTIMONIAL AREA ENDS =======-->

@endsection


