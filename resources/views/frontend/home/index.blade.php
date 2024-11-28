@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Home')
@section('meta_description', $metaSettings->meta_description ?? 'Home' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Home' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Home' )
@section('content')
<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area" style="background-image: url({{asset('frontend')}}/img/bg/header-bg1.png);">
    <img src="{{asset('frontend')}}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="header-main-content heading1">
            <h5><img width="18px" src="{{asset('frontend')}}/img/icons/logo-icons.png" alt="">Top #1 Software Company</h5>
            <h1 class="text-anime-style-3">Elevate Your Brand With Expert programmer and software engineer</h1>
            <p data-aos="fade-left" data-aos-duration="1000">Welcome to Amaizing IT where we specialize in revolutionizing your online <br class="d-lg-block d-none"> presence through expert programmer and software engineer. </p>
            <div class="btn-area" data-aos="fade-left" data-aos-duration="1200">
              <a href="{{ route('our.services') }}" class="header-btn1">Our Service<span><i class="fa-solid fa-arrow-right"></i></span></a>
              <a href="{{ route('contact') }}" class="header-btn2">Contact Now <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="header-images-area">
            <div class="main-images-area">
              <div class="img1">
                <img src="{{asset('frontend')}}/img/all-images/header-img1.png" alt="" data-aos="zoom-in" data-aos-duration="1000">
              </div>
              <div class="img2">
                <img src="{{asset('frontend')}}/img/bg/header-imgbg.png" alt="">
              </div>
              <div class="icons-area">
                <img src="{{asset('frontend')}}/img/icons/sound-icons1.svg" alt="" class="sound-icons1 aniamtion-key-1">
                <img src="{{asset('frontend')}}/img/icons/lite-icons1.svg" alt="" class="lite-icons1 aniamtion-key-1">
              </div>
              <div class="auhtor-icons">
                <img src="{{asset('frontend')}}/img/elements/elements2.png" alt="" class="elements2">
                <img src="{{asset('frontend')}}/img/elements/elements3.png" alt="" class="elements3">
              </div>
              <div class="auhtor-images">
                <img src="{{asset('frontend')}}/img/all-images/header-author-img1.png" alt="" class="header-author-img1 aniamtion-key-2">
                <img src="{{asset('frontend')}}/img/all-images/header-author-img2.png" alt="" class="header-author-img2 aniamtion-key-2">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="slider-section-area sp5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2">
          <div class="sldier-head">
            <p>Trusted by  <br class="d-lg-block d-none"> Top Companies</p>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="slider-images-area owl-carousel">
            <div class="img1">
              <img src="{{asset('frontend')}}/img/elements/brand-img1.png" alt="">
            </div>
            <div class="img1">
              <img src="{{asset('frontend')}}/img/elements/brand-img2.png" alt="">
            </div>
            <div class="img1">
              <img src="{{asset('frontend')}}/img/elements/brand-img3.png" alt="">
            </div>
            <div class="img1">
              <img src="{{asset('frontend')}}/img/elements/brand-img4.png" alt="">
            </div>
            <div class="img1">
              <img src="{{asset('frontend')}}/img/elements/brand-img5.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== TESTIMONIAL AREA ENDS =======-->
  <div class="all-section-bg" style="background-image: url({{asset('frontend')}}/img/bg/pages-bg1.png); background-repeat: no-repeat; background-size: cover;">
  <!--===== ABOUT AREA STARTS =======-->
  <div class="about1-section-area sp6">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4">
          <div class="about-images">
           <figure class="image-anime reveal">
            <img src="{{asset('frontend')}}/img/all-images/about-img1.png" alt="">
           </figure>
            <img src="{{asset('frontend')}}/img/elements/star1.png" alt="" class="star1 keyframe5">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="about-content-area heading2">
            <div class="arrow-circle">
            <a href="{{ route('about') }}">
              <img src="{{asset('frontend')}}/img/elements/elements4.png" alt="" class="elements4 keyframe5">
              <img src="{{asset('frontend')}}/img/icons/arrow.svg" alt="" class="arrow">
            </a>
            </div>
            <h2 class="text-anime-style-3">Comprehensive programmer and software engineer.</h2>
            <p data-aos="fade-left" data-aos-duration="1000">Welcome to Amaizing IT your trusted partner for comprehensive Graphics Design, SEO, digital marketing Website and Software. With our proven expertise and innovative strategies the digital landscape.</p>
            <div class="btn-area" data-aos="fade-left" data-aos-duration="1200">
              <a href="{{ route('about') }}" class="header-btn1">Learn More<span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="about-auhtor-images">
            <img src="{{asset('frontend')}}/img/elements/elements5.png" alt="" class="elements5 keyframe5">
            <figure class="image-anime reveal">
              <img src="{{asset('frontend')}}/img/all-images/about-img2.png" alt="">
             </figure>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== ABOUT AREA ENDS =======-->

  <!--===== SERVICE AREA STARTS =======-->
  <div class="service1-section-area sp9">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="service-header-area heading2 text-center">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star3 keyframe5">
            <h2 class="text-anime-style-3">Popular Services <br class="d-md-block d-none"> We Provide To Build Your Business</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Our expert team specializes in delivering tailored solutions designed to elevate <br class="d-md-block d-none"> your brand and drive measurable results. </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="service-all-boxes-area row">
            @foreach ($categoryy->take(4) as $category)
                <div class="service-boxarea col-lg-3" data-aos="zoom-in" data-aos-duration="800">
                    <a href="#">{{ $category->category_name }}</a>
                    <div class="space40"></div>
                    <img src="{{ asset('uploads/category') }}/{{ $category->category_image }}" alt="{{ $category->category_image }}" alt="">
                    <div class="space40"></div>
                    <p>{{ $category->category_desp }}</p>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== SERVICE AREA ENDS =======-->

  <!--===== SERVICE AREA STARTS =======-->
  <div class="service2-section-area sp6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="service2-header heading2 text-center">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star3 keyframe5">
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
              <a href="service1.html"><i class="fa-solid fa-arrow-right"></i></a>
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
                    <a href="service1.html"><i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                  <div class="content-area">
                    <h5>Our Vision</h5>
                    <a href="service1.html">We aspire to create a world where every business owner feels empowered</a>
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

  <!--===== CASE AREA STARTS =======-->
  <div class="case1-section-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="case-header-area heading2 text-center">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star3 keyframe5">
            <h2 class="text-anime-style-3">Benefits of Our Service</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Customized solutions, reliable delivery, and exceptional results <br class="d-md-block d-none"> to elevate your success.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-out" data-aos-duration="1200">
            <div class="cs_case_study_1_list">
              <div class="cs_case_study cs_style_1 cs_hover_active active" data-aos="fade-up" data-aos-duration="800">
                <a href="#" class="cs_case_study_thumb cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img1.png"></a>
                <div class="content-area1">
                  <a href="#">Website  Design & Development</a>
                </div>
                <div class="content-area">
                  <a href="#">Website  Design & Development </a>
                  <p>We create visually appealing, user-friendly, and fully responsive websites tailored to your needs. Our solutions focus on enhancing user experience, boosting engagement, and driving measurable results for your business.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="900">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb2 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img2.png"></a>
                <div class="content-area1">
                  <a href="#">SEO</a>
                </div>
                <div class="content-area">
                  <a href="#">SEO</a>
                  <p>Enhance your online visibility and attract more organic traffic with our proven SEO strategies. We optimize your website to rank higher on search engines, ensuring better reach and increased engagement.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="1000">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb3 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img3.png"></a>
                <div class="content-area1">
                  <a href="#">Graphics Design</a>
                </div>
                <div class="content-area">
                  <a href="#">Graphics Design</a>
                  <p>Unleash the power of creativity with our professional graphic design services. From logos and branding to marketing materials and digital visuals, we craft designs that not only captivate but also effectively communicate your message. Let us bring your ideas to life with stunning, impactful designs tailored to your brand.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="1100">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb4 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img4.png"></a>
                <div class="content-area1">
                  <a href="#">Social Media Marketing</a>
                </div>
                <div class="content-area">
                  <a href="#">Social Media Marketing</a>
                  <p>Elevate your brand’s presence across social platforms with targeted strategies that drive engagement, build loyalty, and increase conversions. We create compelling content and campaigns to connect you with your audience and achieve measurable results.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="1200">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb5 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img5.png"></a>
                <div class="content-area1">
                  <a href="#">Content Marketing</a>
                </div>
                <div class="content-area">
                  <a href="#">Content Marketing</a>
                  <p>Boost your brand’s impact with strategic, high-quality content. We craft engaging articles, blogs, and media tailored to your audience, driving traffic, building trust, and enhancing conversions.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="1300">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb6 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img6.png"></a>
                <div class="content-area1">
                  <a href="#">Content Writing</a>
                </div>
                <div class="content-area">
                  <a href="#">Content Writing</a>
                  <p>Delivering compelling and original content that resonates with your audience. From blogs to web copy, we create tailored content that informs, engages, and drives action.</p>
                </div>
              </div>
              <div class="cs_case_study cs_style_1 cs_hover_active " style="margin: 0 !important;" data-aos="fade-up" data-aos-duration="1400">
                <a href="#" class="cs_case_study_thumb cs_case_study_thumb7 cs_bg_filed" data-src="{{asset('frontend')}}/img/all-images/case-img7.png"></a>
                <div class="content-area1">
                  <a href="#">Analytics & Reporting</a>
                </div>
                <div class="content-area">
                  <a href="#">Analytics & Reporting</a>
                  <p>Gain valuable insights with detailed analytics and comprehensive reports. We track key metrics to measure performance, optimize strategies, and help you make data-driven decisions for sustained growth.</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CASE AREA ENDS =======-->


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

  <!--===== BLOG AREA STARTS =======-->
  {{-- <div class="blog1-scetion-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="blog-hedaer-area heading2 text-center">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star3 keyframe5">
            <h2 class="text-anime-style-3">Insights & Innovations: <br class="d-md-block d-none"> Our Latest Blog Posts</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Explore our blog to discover actionable insights, success stories, and <br class="d-md-block d-none"> expert advice that can help drive growth for your business.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="blog-author-boxarea" data-aos="fade-right" data-aos-duration="800">
            <div class="img1">
              <img src="{{asset('frontend')}}/img/all-images/blog-img1.png" alt="">
            </div>
            <div class="content-area">
              <div class="tags-area">
                <ul>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/contact1.svg" alt="">Ben Stokes</a></li>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/calender1.svg" alt="">16 August 2023</a></li>
                </ul>
              </div>
              <a href="blog-single.html">10 Essential SEO Tips to Boost Your Website's Ranking</a>
              <p>Are you looking to improve your website's visibility and attract more organic traffic? </p>
              <a href="blog-single.html" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="space30 d-lg-none d-block"></div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="blog-author-boxarea" data-aos="fade-up" data-aos-duration="1000">
            <div class="img1">
              <img src="{{asset('frontend')}}/img/all-images/blog-img2.png" alt="">
            </div>
            <div class="content-area">
              <div class="tags-area">
                <ul>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/contact1.svg" alt="">Ben Stokes</a></li>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/calender1.svg" alt="">16 August 2023</a></li>
                </ul>
              </div>
              <a href="blog-single.html">The Power of PPC Advertising: How to Maximize Your ROI</a>
              <p>Unlock the full potential of your digital marketing strategy with the power of PPC.</p>
              <a href="blog-single.html" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="space30 d-lg-none d-block"></div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="blog-author-boxarea" data-aos="fade-left" data-aos-duration="1200">
            <div class="img1">
              <img src="{{asset('frontend')}}/img/all-images/blog-img3.png" alt="">
            </div>
            <div class="content-area">
              <div class="tags-area">
                <ul>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/contact1.svg" alt="">Ben Stokes</a></li>
                  <li><a href="#"><img src="{{asset('frontend')}}/img/icons/calender1.svg" alt="">16 August 2023</a></li>
                </ul>
              </div>
              <a href="blog-single.html">The Importance of Responsive Web Design in the Mobile Age</a>
              <p>Where mobile devices dominate internet usage, responsive web design more crucial.</p>
              <a href="blog-single.html" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!--===== BLOG AREA ENDS =======-->

  <!--===== CONTACT AREA STARTS =======-->
  <div class="contact1-section-area sp6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="contact-header-area text-center heading2">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
            <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star3 keyframe5">
            <h2 class="text-anime-style-3">Get In Touch With Us Today</h2>
            <p>Contact us now to discuss how we can help elevate your business with our expert services. Let's create something great together!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5" data-aos="zoom-out" data-aos-duration="1000">
          <div class="contact-info-area">
            <h3>Contact Info</h3>
            <p>We're here to help! If you have any questions or would like to discuss how our SEO and digital marketing services can benefit your business,</p>
            <div class="space32"></div>
            <div class="contact-auhtor-box">
              <div class="icons">
                <img src="{{asset('frontend')}}/img/icons/location2.svg" alt="">
              </div>
              <div class="content">
                <h4>Our Location</h4>
                <a href="#">{{ $setting->first()->address }}</a>
              </div>
            </div>
            <div class="space40"></div>
            <div class="contact-auhtor-box">
              <div class="icons">
                <img src="{{asset('frontend')}}/img/icons/phone2.svg" alt="">
              </div>
              <div class="content">
                <h4>Phone Number</h4>
                <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
              </div>
            </div>
            <div class="space40"></div>
            <div class="contact-auhtor-box">
              <div class="icons">
                <img src="{{asset('frontend')}}/img/icons/email2.svg" alt="">
              </div>
              <div class="content">
                <h4>Email Address</h4>
                <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7" data-aos="zoom-out" data-aos-duration="1200">
          <div class="contact-boxarea">
             <h3>Get In Touch</h3>
             <p>We're here to help! If you have any questions or would like to discuss <br class="d-lg-block d-none"> how our SEO and digital marketing services can benefit your business,</p>
             <form action="{{route('consultancy.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="text" name="name" placeholder="Name" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="email" name="email" placeholder="Email Address" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="number" name="phone" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-area">
                    <select name="service" id="service" class="country-area nice-select6">
                      @foreach ($categories as $category)
                          <option value="{{ $category->category_name }}"><strong>{{ $category->category_name }}</strong></option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="input-area">
                    <textarea placeholder="Your Message" name="message" required></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="input-area">
                    <button class="header-btn1" type="submit">Free Consultation <span><i class="fa-solid fa-arrow-right"></i></span></button>
                  </div>
                </div>
               </div>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CONTACT AREA ENDS =======-->

@endsection
