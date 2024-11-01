@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Contact Us')
@section('meta_description', $metaSettings->meta_description ?? 'Contact Us' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Contact Us' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Contact Us' )
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>


<section class="contact-details">
    <div class="container ">
        <div class="row">
            <div class="col-xl-7 col-lg-6">
                <div class="sec-title">
                    <span class="sub-title">Send us email</span>
                    <h2>Feel free to write</h2>
                </div>

                <form id="contact_form" name="contact_form"  action="{{route('consultancy.store')}}" class="contact-form mb-3" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="name" class="form-control" type="text" placeholder="Enter Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="email" class="form-control email" type="email" value="{{ old('email') }}" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="phone" class="form-control" type="text" value="{{ old('phone') }}" placeholder="Enter Phone">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <select  name="service" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}"><strong>{{ $category->category_name }}</strong></option>
                                    @endforeach
                                </select>
                                    @error('service')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="7" value="{{ old('message') }}" placeholder="Enter Message"></textarea>
                    </div>
                    <div class="mb-5">
                        <input name="form_botcheck" class="form-control" type="hidden" value />
                        <button type="submit" class="theme-btn btn-style-one"
                            data-loading-text="Please wait..."><span class="btn-title">Send</span></button>
                        <button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
                                class="btn-title">Reset</span></button>
                    </div>
                </form>

            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="contact-details__right">
                    <div class="sec-title">
                        <span class="sub-title">Need any help?</span>
                        <h2>Get in touch with us</h2>
                        <div class="text">
                            @if($setting->first()->about != null)
                                {{ $setting->first()->about  }}
                            @endif
                        </div>
                    </div>
                    <ul class="list-unstyled contact-details__info">
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-phone-plus"></span>
                            </div>
                            <div class="text">
                                <h6>Have any question?</h6>
                                @if($setting->first()->phone != null)
                                    <a href="tel:{{ $setting->first()->phone }}"><span>Free</span> {{ $setting->first()->phone }}</a>
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-envelope1"></span>
                            </div>
                            <div class="text">
                                <h6>Write email</h6>
                                @if($setting->first()->email != null)
                                    <a href="mailto:{{ $setting->first()->email }}">
                                        <span>{{ $setting->first()->email }}</span>
                                    </a>
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-location"></span>
                            </div>
                            <div class="text">
                                <h6>Visit anytime</h6>
                                @if($setting->first()->address != null)
                                    <span><a target="blanck" href="https://maps.app.goo.gl/Dz3vMuukdc1pZtrz8">{{ $setting->first()->address }}</a></span>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.635033785549!2d90.35413777592777!3d23.760390788391643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf6344127a6d%3A0xe4f4dcfd93174f55!2sNugortech%20IT!5e0!3m2!1sen!2sbd!4v1716112078924!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

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
