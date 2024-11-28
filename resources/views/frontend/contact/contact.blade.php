@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Contact Us')
@section('meta_description', $metaSettings->meta_description ?? 'Contact Us' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Contact Us' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Contact Us' )
@section('content')
<!--===== HERO AREA STARTS =======-->
<div class="about-header-area" style="background-image: url({{asset('frontend')}}/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="{{asset('frontend')}}/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="{{asset('frontend')}}/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>Contact Us</h1>
                    <a href="{{ url('/')}}">Home <i class="fa-solid fa-angle-right"></i> <span>Contact Us</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<!--===== CONTACT AREA STARTS =======-->
<div class="contact-main-inner-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="heading2 contact-header">
                   <h5>Contact Us</h5>
                   <h2>Get In Touch With Us Today</h2>
                   <p>{{ $setting->first()->about  }}</p>
                   <div class="space32"></div>
                   <div class="number-address-area">
                    <div class="phone-number">
                        <div class="img1">
                            <img src="{{asset('frontend')}}/img/icons/phone3.svg" alt="">
                        </div>
                        <div class="content">
                            <p>Phone Number</p>
                            <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
                        </div>
                    </div>

                    <div class="phone-number m-0">
                        <div class="img1">
                            <img src="{{asset('frontend')}}/img/icons/email3.svg" alt="">
                        </div>
                        <div class="content">
                            <p>Email Address</p>
                            <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
                        </div>
                    </div>
                   </div>
                   <div class="space50"></div>
                   <div class="number-address-area2">
                    <div class="phone-number">
                        <div class="img1">
                            <img src="{{asset('frontend')}}/img/icons/location3.svg" alt="">
                        </div>
                        <div class="content">
                            <a href="#">{{ $setting->first()->address }}</a>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="contact-form-area">
                    <h4>Get In Touch</h4>
                    <form action="{{route('consultancy.store')}}" id="contact_form" name="contact_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input type="number" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <select name="service" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}"><strong>{{ $category->category_name }}</strong></option>
                                    @endforeach
                                </select>
                                @error('service')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                  <textarea placeholder="Your Message" name="message">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                 <button type="submit" class="header-btn1">Get In Touch <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="location-section-area sp2 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 m-auto">
          <div class="location-header text-center heading2">
            <h5>Location</h5>
            <h2>Our Location</h2>
          </div>
        </div>
      </div>
      <div class="space60 d-lg-block d-none"></div>
      <div class="space30 d-lg-none d-block"></div>
     <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="location-boxes">
          <div class="img1">
            <img src="{{asset('frontend')}}/img/icons/location3.svg" alt="">
          </div>
          <div class="space32"></div>
            <a href="#">San Francisco <br class="d-lg-block d-none">
            1446 Vorwuw Parkway</a>
            <div class="space24"></div>
            <p>Phone Number</p>
            <a href="tel:123-456-7890">123-456-7890</a>
            <div class="space32"></div>
            <a href="https://www.google.com/maps/@24.0098057,88.9892437,15z?entry=ttu" class="map" target="_blank">View Our Map</a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="location-boxes">
          <div class="img1">
            <img src="{{asset('frontend')}}/img/icons/location3.svg" alt="">
          </div>
          <div class="space32"></div>
            <a href="#">Chicago <br class="d-lg-block d-none">
              1849 Usavom View</a>
            <div class="space24"></div>
            <p>Phone Number</p>
            <a href="tel:123-456-7890">123-456-7890</a>
            <div class="space32"></div>
            <a href="https://www.google.com/maps/@24.0098057,88.9892437,15z?entry=ttu" class="map" target="_blank">View Our Map</a>
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="location-boxes">
          <div class="img1">
            <img src="{{asset('frontend')}}/img/icons/location3.svg" alt="">
          </div>
          <div class="space32"></div>
            <a href="#">Boston <br class="d-lg-block d-none">
              1660 Dodgig Place</a>
            <div class="space24"></div>
            <p>Phone Number</p>
            <a href="tel:123-456-7890">123-456-7890</a>
            <div class="space32"></div>
            <a href="https://www.google.com/maps/@24.0098057,88.9892437,15z?entry=ttu" class="map" target="_blank">View Our Map</a>
          </div>
      </div>
     </div>
    </div>
</div> --}}
<div class="mapouter">
  <div class="gmap_canvas">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.310957147424!2d90.36587192976917!3d23.813069669019495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8a7c28d7987a3ff%3A0x8924aaae85338532!2sAmaizing%20IT!5e0!3m2!1sen!2sbd!4v1730587202034!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
<!--===== CONTACT AREA ENDS =======-->

@endsection

@section('footer_script')
<script>
    (function($) {
        $("#contact_form").validate({
            submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before(
                    '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
                    );
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'true') {
                            $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function() {
                            $(form_result_div).fadeOut('slow')
                        }, 6000);
                    }
                });
            }
        });
    })(jQuery);
</script>
@endsection
