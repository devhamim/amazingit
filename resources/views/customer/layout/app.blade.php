
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>@yield('title')</title>
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    {{-- @if($setting->first()->title != null)
        <title>{{$setting->first()->title}}</title>
    @endif
    @if ($setting->first()->meta_title != null)
        <meta name="title" content="{{$setting->first()->meta_title}}">
    @endif
    @if ($setting->first()->meta_tag != null)

    @endif
    @if ($setting->first()->meta_description != null)
        <meta name="description" content="{{$setting->first()->meta_description}}">
    @endif --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Nugortechit">

    <!-- site Favicon -->
    @if ($setting->first()->favicon !== null)
        <link rel="icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" sizes="32x32" />
        <link rel="apple-touch-icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" />
        <meta name="msapplication-TileImage" content="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" />
    @endif


    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ asset('customer') }}/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/animate.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('customer') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('customer') }}/css/responsive.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('customer') }}/css/backgrounds/bg-4.css">

    <!-- Meta Pixel Code -->
    @if($setting->first()->fbpixel != null)
        {!! $setting->first()->fbpixel !!}
    @endif
    {{-- <!-- End Meta Pixel Code --> --}}

    <!-- googletag Code -->
    @if($setting->first()->googletag != null)
        {!! $setting->first()->googletag !!}
    @endif
    <!-- End googletag Code -->

    <style>
                        /* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: thin;
    scrollbar-color: #F94A29 #ffffff;
  }

  /* Chrome, Edge, and Safari */
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
    </style>
</head>
<body class="shop_page">

   @include('customer.layout.header')

   <!-- main Cart Start -->
    @yield('content')
   <!-- End User profile section -->

   <!-- Footer Start -->
   @include('customer.layout.footer')
   <!-- Footer Area End -->



   <!-- Footer navigation panel for responsive display -->
   <div class="ec-nav-toolbar">
       <div class="container">
           <div class="ec-nav-panel">
               <div class="ec-nav-panel-icons">
                   <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i
                           class="fi-rr-menu-burger"></i></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i
                           class="fi-rr-shopping-bag"></i><span
                           class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="{{ url('/') }}" class="ec-header-btn"><i class="fi-rr-home"></i></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="#" class="ec-header-btn"><i class="fi-rr-user"></i></a>
               </div>

           </div>
       </div>
   </div>
   <!-- Footer navigation panel for responsive display end -->

   <!-- Cart Floating Button -->
   <div class="ec-cart-float">
       <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
           <div class="header-icon"><i class="fi-rr-shopping-basket"></i>
           </div>
           <span class="ec-cart-count cart-count-lable">3</span>
       </a>
   </div>
   <!-- Cart Floating Button end -->

   <!-- Whatsapp -->
   {{-- <div class="ec-style ec-right-bottom">
       <!-- Start Floating Panel Container -->
       <div class="ec-panel">
           <!-- Panel Header -->
           <div class="ec-header">
               <strong>Need Help?</strong>
               <p>Chat with us on WhatsApp</p>
           </div>
           <!-- Panel Content -->
           <div class="ec-body">
               <ul>
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{ asset('customer') }}/images/whatsapp/profile_01.jpg" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Sahar Darya</span>
                                   <p>Sahar left 7 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{ asset('customer') }}/images/whatsapp/profile_02.jpg" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-online"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Yolduz Rafi</span>
                                   <p>Yolduz is online</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{ asset('customer') }}/images/whatsapp/profile_03.jpg" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-offline"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Nargis Hawa</span>
                                   <p>Nargis left 30 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{ asset('customer') }}/images/whatsapp/profile_04.jpg" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-offline"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Khadija Mehr</span>
                                   <p>Khadija left 50 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
               </ul>
           </div>
       </div>
       <!--/ End Floating Panel Container -->
       <!-- Start Right Floating Button-->
       <div class="ec-right-bottom">
           <div class="ec-box">
               <div class="ec-button rotateBackward">
                   <img class="whatsapp" src="{{ asset('customer') }}/images/common/whatsapp.png" alt="whatsapp icon" />
               </div>
           </div>
       </div>
       <!--/ End Right Floating Button-->
   </div> --}}
   <!-- Whatsapp end -->


   <!-- Vendor JS -->
   <script src="{{ asset('customer') }}/js/vendor/jquery-3.5.1.min.js"></script>
   <script src="{{ asset('customer') }}/js/vendor/popper.min.js"></script>
   <script src="{{ asset('customer') }}/js/vendor/bootstrap.min.js"></script>
   <script src="{{ asset('customer') }}/js/vendor/jquery-migrate-3.3.0.min.js"></script>
   <script src="{{ asset('customer') }}/js/vendor/modernizr-3.11.2.min.js"></script>

   <!--Plugins JS-->
   <script src="{{ asset('customer') }}/js/plugins/swiper-bundle.min.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/countdownTimer.min.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/scrollup.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/jquery.zoom.min.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/slick.min.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/infiniteslidev2.js"></script>
   <script src="{{ asset('customer') }}/js/vendor/jquery.magnific-popup.min.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/jquery.sticky-sidebar.js"></script>
   <script src="{{ asset('customer') }}/js/plugins/nouislider.js"></script>

   <!-- Main Js -->
   <script src="{{ asset('customer') }}/js/vendor/index.js"></script>
   <script src="{{ asset('customer') }}/js/main.js"></script>

</body>

</html>
