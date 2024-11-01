<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @if($setting->first()->title != null)
        <title>{{$setting->first()->title}}</title>
    @endif
    @if ($setting->first()->meta_title != null)
        <meta name="title" content="{{$setting->first()->meta_title}}">
    @endif
    @if ($setting->first()->meta_tag != null)
        <meta name="keywords" content="{{$setting->first()->meta_tag}}">
    @endif
    @if ($setting->first()->meta_description != null)
        <meta name="description" content="{{$setting->first()->meta_description}}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if ($setting->first()->favicon !== null)
        <link rel="shortcut icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" type="image/x-icon">
    @endif

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1R7CXK501W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1R7CXK501W');
</script>

    <!-- Meta Pixel Code -->
    @if($setting->first()->fbpixel != null)
        {!! $setting->first()->fbpixel !!}
    @endif

    <!-- googletag Code -->
    @if($setting->first()->googletag != null)
        {!! $setting->first()->googletag !!}
    @endif
    <!-- End googletag Code -->
    <style>

        .hind-siliguri-regular {
            font-family: "Hind Siliguri", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        #popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }
        #popup-container h3{
            position: fixed;
            top: 50%;
            left: 35%;
        }
        .header_icon{
            font-size: 27px;
            padding: 0 10px;
            color: #fff;
        }
        .header_icon button{
            background: transparent;
            color: #fff;
        }
        .ec-header-user .dropdown-toggle::after{
            display: none;
        }


    /* ===== Scrollbar CSS ===== */
  * {
    scrollbar-width: thin;
    scrollbar-color: #F94A29 #ffffff;
    border-radius: 10px;
    font-family: "Hind Siliguri", sans-serif;
    font-weight: 700;
  }
  section{
    border-radius: 0;
  }
  footer{
    border-radius: 0;
  }
  header{
    border-radius: 0;
  }
  .page-wrapper{
    border-radius: 0;
  }
  .sticky-header{
    border-radius: 0;
  }

  *::-webkit-scrollbar {
    width: 10px;
  }

  *::-webkit-scrollbar-track {
    background: #ffffff;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #F94A29;
    border-radius: 55px;
    border: 30px outset #ffffff;
  }
  .text {
    text-align: justify;
  }

  .about-section .content-column .inner-column .inner-box .content-box span {
    font-size: 25px;
}
.landing_font{
    font-family: "Hind Siliguri", sans-serif;
    font-weight: 700;
}
.innerpage .accordion-box .block .acc-btn {
    font-family: "Hind Siliguri", sans-serif;
    font-weight: 700;
}

.landing_ul ul li {
  list-style-type: circle;
  font-size: 18px;
  padding: 5px 0;
}
.about-section .image-column .inner-column{
    margin-left: 0;
}

.about-section {
    padding: 60px 0;
}
section>.container, section>.container-fluid{
    padding-top: 60px;
    padding-bottom: 60px;
}
.testimonial-section{
    padding-top: 0px;
    padding-bottom: 80px
}
body{
    color: #000;
}
.order_price {
    font-size: 24px;
    color: #F94A29;
}
@media(max-width:575.98px) {
    .landing_box{
        font-size: 14px;
    }
    .theme-btn {
        background-color: var(--theme-color1);
        padding: 0 30px;
        height: 40px;
        line-height: 40px;
        font-size: 14px;
    }
    .order_price {
        font-size: 16px;
        color: #F94A29;
    }
}
/* megamanu navbar */

.navbar {
  overflow: hidden;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #F94A29;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #202020e8;
  width: 100%;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 99999;
  /* padding: 0 15px */
}

.dropdown-content .header {
  background: red;
  padding: 16px;
  color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 20%;
  padding: 10px;
  background-color: #202020e8;
}

.column a {
  float: none;
  color: rgb(255, 255, 255);
  padding: 8px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.column h5 {
  color: #F94A29 ;
}

.column a:hover {
  background-color: #F94A29 ;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    height: auto;
  }
}
.page-title {
    margin-top: 40px;
}

    </style>
</head>

<body>
    <div class="page-wrapper">
        <header class="main-header header-style-one" style="background: #101828">
            <div class="header-lower">
                <div class="auto-container">
                    <div class="main-box">
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{url('/')}}">
                                    @if ($setting->first()->white_logo != null)
                                        <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="{{ $setting->first()->white_logo }}" >
                                    @endif
                                </a>
                            </div>
                        </div>

                         <!-- mega manu -->
                         <div class="nav-outer" style="position: static">
                            <div class="navbar nav main-menutwo">
                                <a href="{{url('/')}}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                                <a href="{{ route('about') }}">About</a>
                                <div class="dropdown">
                                    <button class="dropbtn">Services
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        <div class="row">
                                            @foreach ($categorys as $category)
                                                <div class="column">
                                                    <h5>{{ $category->category_name }}</h5>
                                                    @foreach ($services as $service)
                                                        @if ($category->id == $service->category_id)
                                                            <a href="{{ route('services.product.details',$service->slug) }}">{{ $service->product_name }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('our.products') }}">Product</a>
                                <a href="{{ route('our.protfolio') }}">protfolio</a>
                                <a href="{{ route('our.blogs') }}">Blogs</a>
                                <a href="{{ route('contact') }}">Contact</a>
                            </div>
                        </div>
                        <!-- mega manu -->

                        <div class="mob_btn">
                            @auth('customerauth')
                                <div class="header_icon">
                                    <div class="ec-header-user dropdown">
                                        <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="fa-regular fa-user"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                                <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                @auth('customerreg')
                                    <div class="header_icon">
                                        <div class="ec-header-user dropdown">
                                            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa-regular fa-user"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a class="dropdown-item" href="{{ route('panding.customer.dashboard') }}">Dashboard</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="btn">
                                        <a href="{{ route('customer.login') }}" class="theme-btn">login</a>
                                    </div>
                                @endauth

                            @endauth
                            <div class="mobile-nav-toggler">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>

                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo">
                            <a href="{{url('/')}}">
                                @if ($setting->first()->white_logo != null)
                                    <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="{{ $setting->first()->white_logo }}">
                                @endif
                            </a>
                        </div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
                    <style>
                        .navigation .submenu, .navigation .subsubmenu {
                            display: none;
                            position: absolute;
                            background-color: #3f3f3f;
                            list-style: none;
                            padding: 0;
                            z-index: 999999999;
                        }
                        .navigation li:hover > .submenu {
                            display: block;
                        }
                        .navigation .submenu li {
                            position: relative;
                        }

                        .navigation .submenu li:hover > .subsubmenu {
                            display: block;
                            left: 10%;
                            top: 0;
                            position: relative;
                        }
                        .navigation .submenu li p, .navigation .subsubmenu li a {
                            padding: 6px 6px 0 6px;
                            display: block;
                            color: #ffffff;
                            margin-bottom: 3px
                        }
                        .mobile-menu .navigation li>ul>li {
                            padding-left: 10px;
                        }

                    </style>
                    <ul class="navigation clearfix">
                        <li><a href="{{url('/')}}" class="active">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li>
                            <a>Services</a>
                            <!-- Submenu -->
                            <ul class="submenu">
                                @foreach ($categorys as $category)
                                <li>
                                    <p>{{ $category->category_name }}</p>
                                    <!-- Sub-submenu -->
                                    <ul class="subsubmenu">
                                        @foreach ($services as $service)
                                            @if ($category->id == $service->category_id)
                                                <li><a href="{{ route('services.product.details',$service->slug) }}">{{ $service->product_name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('our.products') }}">Product</a></li>
                        <li><a href="{{ route('our.protfolio') }}">Protfolio</a></li>
                        <li><a href="{{ route('our.blogs') }}">Blogs</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="contact-list-one">
                        <li>

                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                @if ($setting->first()->phone != null)
                                    <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
                                @endif
                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                @if ($setting->first()->email != null)
                                    <a href="mailto:{{ $setting->first()->email }}">
                                        <span>{{ $setting->first()->email }}</span>
                                    </a>
                                @endif

                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Send Email</span>
                                Sat - Thu 10:00 - 6:00, Friday - CLOSED
                            </div>
                        </li>
                    </ul>
                    <ul class="social-links">
                        <li><a href="https://www.linkedin.com/company/nugortechitbd/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://www.facebook.com/nugortechitcom" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.tiktok.com/@nugortechitbd" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="https://www.youtube.com/@NugortechIT" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="https://www.behance.net/nugortech_it" target="_blank"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </nav>
            </div>

            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>
                <div class="search-inner" style="top: 10%;">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6 text-center m-auto">
                            <div class="sec-title ">
                                <h2 class="text-white">Feel free to write</h2>
                            </div>

                            <form id="contact_form" name="contact_form" class action="{{route('contact.message')}}" class="contact-form mb-3" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input name="name" class="form-control" type="text" placeholder="Enter Name" required>
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <input name="phone" class="form-control" type="number" placeholder="Enter Phone" required>
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea name="message" class="form-control required" rows="7" required placeholder="Enter Message"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <input name="form_botcheck" class="form-control" type="hidden" value />
                                    <button style="padding: 0 30%;" type="submit" class="theme-btn btn-style-one"
                                        data-loading-text="Please wait..."><span class="btn-title">Submit</span></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">

                        <div class="logo">
                            <a href="{{url('/')}}" title>
                                @if ($setting->first()->white_logo != null)
                                    <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="logo" >
                                @endif
                            </a>
                        </div>
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">

                                </ul>
                            </div>
                        </nav>
                        <div class="mob_btn" style="display: flex; align-items: center;">
                                @auth('customerauth')
                                    <div class="header_icon">
                                        <div class="ec-header-user dropdown">
                                            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa-regular fa-user"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="btn">
                                        <a href="{{ route('customer.login') }}" class="theme-btn">login</a>
                                    </div>
                                @endauth
                            <div class="mobile-nav-toggler" style="margin-top: -6%;">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        {{-- main start --}}
        @yield('landingcontent')
        {{-- main end --}}

        <section class="contact-banner-two">
            <div class="auto-container">
                <div class="outer-box">
                    <h2 class="title wow fadeInLeft" data-wow-delay="400ms">Have a project? <br>Let's discuss</h2>
                    <div class="btn-box wow fadeInRight" data-wow-delay="400ms">
                        <a href="#" class="theme-btn-v2">Free Consultations<i
                                class="btn-icon fa-sharp far fa-arrow-right ml-10 font-size-18"></i></a>
                        @if ($setting->first()->phone != null)
                            <a href="tel:{{ $setting->first()->phone }}" class="theme-btn-v2 two">
                                {{ $setting->first()->phone }}
                                <i class="fa-sharp far fa-phone ml-10 font-size-18"></i>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </section>

        <footer class="main-footer footer-style-one">

            <div class="widgets-section">
                <div class="auto-container">
                    <div class="row">

                        <div class="footer-column col-lg-3 col-sm-6">
                            <div class="footer-widget contact-widget">
                                <div class="logo-box">
                                    <div class="logo">
                                        <a href="{{url('/')}}">
                                            @if ($setting->first()->white_logo != null)
                                                <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="logo">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    @if ($setting->first()->about != null)
                                        <p class="text-white">{{ $setting->first()->about }} <a class="text-danger" href="{{ route('about') }}">Read More</a> </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-sm-6">
                            <div class="footer-widget links-widget pl-lg-30 pl-md--0">
                                <h4 class="widget-title">Our Services</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="#">Digital marketing</a></li>
                                        <li><a href="#">Branding design</a></li>
                                        <li><a href="#">Product Design</a></li>
                                        <li><a href="#">Web development</a></li>
                                        <li><a href="#">App Development</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-sm-6">
                            <div class="footer-widget links-widget two pl-lg-30 pl-md--0">
                                <h4 class="widget-title">Useful Link</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('our.services') }}">Our Services</a></li>
                                        <li><a href="{{ route('our.products') }}">Our Product</a></li>
                                        <li><a href="{{ route('our.blogs') }}">Our Blog</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-sm-6">
                            <div class="footer-widget contact-widget">
                                <h4 class="widget-title">Found Us</h4>
                                <div class="widget-content">
                                    <div class="content-box">
                                        <div class="icon-box">
                                            <i class="flaticon-envelope"></i>
                                        </div>
                                        <span>Mail us</span>
                                        <h6 class="title">
                                            @if ($setting->first()->email != null)
                                                <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="content-box">
                                        <div class="icon-box">
                                            <i class="flaticon-call-3"></i>
                                        </div>
                                        <span>Contect</span>
                                        @if ($setting->first()->phone != null)
                                            <a href="tel:{{ $setting->first()->phone }}" class="title">{{ $setting->first()->phone }}</a>
                                        @endif
                                    </div>
                                    <div class="content-box">
                                        <div class="icon-box">
                                            <i style="padding-top: 25%" class="lnr-icon-location"></i>
                                        </div>
                                        <span>Address</span>
                                        @if ($setting->first()->address != null)
                                            <h6 class="title">{{ $setting->first()->address }}</h6>
                                        @endif
                                    </div>
                                    <ul class="social-icons">
                                        <li><a href="https://www.linkedin.com/company/nugortechitbd/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="https://www.facebook.com/nugortechitcom" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.tiktok.com/@nugortechitbd" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                                        <li><a href="https://www.youtube.com/@NugortechIT" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="https://www.behance.net/nugortech_it" target="_blank"><i class="fa-brands fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="copyright-text">
                            @if ($setting->first()->footer != null)
                                {{ $setting->first()->footer }} | Design and Development By <a class="text-danger" href="https://nugortechit.com/">Nugortech it</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-to-top scroll-to-target arrow-btn" data-target="html" style><i
                    class="fa-sharp fa-solid fa-arrow-up"></i></div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('frontend')}}/js/jquery.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/script.js"></script>

    @yield('landingfooter_script')

    @if (session('success'))
            {
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Success...",
                    text: "Message Sent Successfully",
                });
            </script>
            }
        @endif
        @if (session('error'))
            {
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            </script>
            }
        @endif

</body>

</html>
