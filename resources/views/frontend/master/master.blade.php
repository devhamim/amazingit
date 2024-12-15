<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>

    <meta name="title" content="@yield('meta_title')">

    <meta name="keywords" content="@yield('meta_tag')">

    <meta name="description" content="@yield('meta_description')">
    <meta name="robots" content="index">
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" type="image/x-icon">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/mobile.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/owlcarousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/sidebar.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/slick-slider.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/main.css">

        <!-- Meta Pixel Code -->
        @if($setting->first()->fbpixel != null)
            {!! $setting->first()->fbpixel !!}
        @endif

        <!-- googletag Code -->
        @if($setting->first()->googletag != null)
            {!! $setting->first()->googletag !!}
        @endif
        <!-- End googletag Code -->

    <!--=====  JS SCRIPT LINK =======-->
    <script src="{{asset('frontend')}}/js/plugins/jquery-3-6-0.min.js"></script>
</head>
<body class="homepage1-body">

<!--===== PRELOADER STARTS =======-->
<div class="preloader">
  <div class="loading-container">
    <div class="loading"></div>
    <div id="loading-icon"><img src="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" alt=""></div>
  </div>
</div>
<!--===== PRELOADER ENDS =======-->

<!--===== PROGRESS STARTS=======-->
<div class="paginacontainer">
     <div class="progress-wrap">
       <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
       </svg>
     </div>
   </div>
 <!--===== PROGRESS ENDS=======-->

   <!--=====HEADER START=======-->
   <header>
    <div class="header-area homepage1 header header-sticky d-none d-lg-block " id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header-elements">
              <div class="site-logo">
                <a href="{{ url('/') }}">
                    <img width="200px" src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="">
                </a>
              </div>
              <div class="main-menu">
                <ul>
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('our.services') }}">Services</a></li>
                  <li><a href="{{ route('our.protfolio') }}">Protfolio</a></li>
                  <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
              </div>
              <div class="btn-area">

                <a href="https://wa.me/+8801303605163?text=Hello%20how%20can%20i%20help%20you" target="_blank" class="header-btn1">Free Consultation <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>

              <div class="header-search-form-wrapper">
                <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
                <div class="header-search-container">
                    <form role="search" class="search-form">
                    <input type="search"  class="search-field" placeholder="Search …" value="" name="s">
                    <button type="submit" class="search-submit"><img src="{{asset('frontend')}}/img/icons/search-icons1.svg" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="body-overlay"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--=====HEADER END =======-->

  <!--===== MOBILE HEADER STARTS =======-->
 <div class="mobile-header mobile-haeder1 d-block d-lg-none">
  <div class="container-fluid">
    <div class="col-12">
      <div class="mobile-header-elements">
        <div class="mobile-logo">
          <a href="{{ url('/') }}"><img width="200px" src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt=""></a>
        </div>
        <div class="mobile-nav-icon dots-menu">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
  <div class="logosicon-area">
    <div class="logos">
      <img width="200px" src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="">
    </div>
    <div class="menu-close">
      <i class="fa-solid fa-xmark"></i>
    </div>
   </div>
  <div class="mobile-nav mobile-nav1">
    <ul class="mobile-nav-list nav-list1">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('our.services') }}">Services</a></li>
      <li><a href="{{ route('our.protfolio') }}">Protfolio</a></li>
      <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>

    <div class="allmobilesection">
      <a href="{{ route('contact') }}"  class="header-btn1">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
      <div class="single-footer">
        <h3>Contact Info</h3>
        <div class="footer1-contact-info">
          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div class="contact-info-text">
              <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
            </div>
          </div>

          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="contact-info-text">
              <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
            </div>
          </div>

          <div class="single-footer">
            <h3>Our Location</h3>

            <div class="contact-info-single">
              <div class="contact-info-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="contact-info-text">
                <a href="#" >{{ $setting->first()->address }}</a>
              </div>
            </div>

          </div>
          <div class="single-footer">
            <h3>Social Links</h3>

            <div class="social-links-mobile-menu">
              <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>
</div>
<!--===== MOBILE HEADER STARTS =======-->

{{-- main start --}}
@yield('content')
{{-- main end --}}


<!--===== CTA AREA STARTS =======-->
<div class="cta-section-area">
    <img src="{{ asset('frontend') }}/img/bg/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="{{ asset('frontend') }}/img/bg/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2>Ready To Take Your Business To <br class="d-md-block d-none"> The Next Level</h2>
            <p>Let us help you grow with our expert solutions in web design, development, <br class="d-md-block d-none"> SEO, and digital marketing.</p>
            <div class="btn-area text-center">
              <a href="https://wa.me/+8801303605163?text=Hello%20how%20can%20i%20help%20you" target="_blank" class="header-btn1">Free Consultation <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->


<!--===== FOOTER AREA STARTS =======-->
<div class="footer1-section-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area">
          <img width="200px" src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="">
          <p>{{ $setting->first()->about }}</p>
          <ul>
            <li><a href="#"><img src="{{asset('frontend')}}/img/icons/facebook.svg" alt=""></a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/img/icons/instagram.svg" alt=""></a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/img/icons/linkedin.svg" alt=""></a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/img/icons/youtube.svg" alt=""></a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-2 col-md-6">
        <div class="footer-logo-area1">
          <h3>About Link</h3>
          <ul>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('our.services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area2">
          <h3>Get in touch</h3>
          <ul>
            <li><a href="mailto:{{ $setting->first()->email }}"><img src="{{asset('frontend')}}/img/icons/email.svg" alt=""><span>{{ $setting->first()->email }}</span></a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/img/icons/location.svg" alt=""><span>{{ $setting->first()->address }}</span></a></li>
            <li><a href="tel:{{ $setting->first()->phone }}"><img src="{{asset('frontend')}}/img/icons/phone.svg" alt=""><span>{{ $setting->first()->phone }}</span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="footer-logo-area3">
          <h3>Subscribe Our Newsletter</h3>
          <form action="#">
            <input type="text" placeholder="Enter Your email">
            <button class="header-btn1"> Subscribe <span><i class="fa-solid fa-arrow-right"></i></span></button>
          </form>
        </div>
      </div>
    </div>
    <div class="space80 d-lg-block d-none"></div>
    <div class="space40 d-lg-none d-block"></div>
    <div class="row">
      <div class="col-lg-12">
        <div class="copyright-area">
          <div class="pera">
            <p>{{ $setting->first()->footer }}</p>
          </div>
          <ul>
            <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
            <li><a href="{{ route('privacy.policy') }}" class="m-0"> Privacy Policy </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== FOOTER AREA ENDS =======-->
</div>

<!--===== JS SCRIPT LINK =======-->
<script src="{{asset('frontend')}}/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/plugins/fontawesome.js"></script>
<script src="{{asset('frontend')}}/js/plugins/aos.js"></script>
<script src="{{asset('frontend')}}/js/plugins/counter.js"></script>
<script src="{{asset('frontend')}}/js/plugins/gsap.min.js"></script>
<script src="{{asset('frontend')}}/js/plugins/ScrollTrigger.min.js"></script>
<script src="{{asset('frontend')}}/js/plugins/Splitetext.js"></script>
<script src="{{asset('frontend')}}/js/plugins/sidebar.js"></script>
<script src="{{asset('frontend')}}/js/plugins/magnific-popup.js"></script>
<script src="{{asset('frontend')}}/js/plugins/mobilemenu.js"></script>
<script src="{{asset('frontend')}}/js/plugins/owlcarousel.min.js"></script>
<script src="{{asset('frontend')}}/js/plugins/gsap-animation.js"></script>
<script src="{{asset('frontend')}}/js/plugins/nice-select.js"></script>
<script src="{{asset('frontend')}}/js/plugins/waypoints.js"></script>
<script src="{{asset('frontend')}}/js/plugins/slick-slider.js"></script>
<script src="{{asset('frontend')}}/js/plugins/circle-progress.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>

</body>
</html>
