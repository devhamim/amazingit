@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Services')
@section('meta_description', $metaSettings->meta_description ?? 'Services' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Services' )
@section('meta_tag', $metaSettings->meta_tag ?? ' Services' )
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Our Services</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</section>

<section class="service-section-two">
    <div class="sec-title text-center">
        <h2 class="text-white">WE SHAPE YOUR IDEAS.</h2>
        <h6 class="text-white">In Nugortech It, we serve more than a digital marketing company. Our marketing mix <br> helps you to separate your voice from hauling competitors.</h6>
    </div>
    <div class="auto-container">
        <div class="row">
            @foreach ($services as $service)
                <div class="service-block-two col-xl-3 col-lg-4 col-md-6">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img style="height: 100%" src="{{asset('uploads/category')}}/{{$service->category_image}}" alt="{{$service->category_image}}">
                        </div>
                        <div class="content-box">
                            <h3 class="title"><a href="{{ route('services.product', $service->slug) }}">{{$service->category_name}}</a></h3>
                            <div class="text">{{$service->category_desp}}</div>
                            <a href="{{ route('services.product', $service->slug) }}" data-animation-in="fadeInUp" data-delay-in="0.4" class="theme-btn ser-btn">Learn more
                                <i class="flaticon-arrow-pointing-to-right btn-icon ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="featured-products">
    <div class="auto-container">

        <div class="mixitup-gallery">
            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter=".TECHNOLOGY">LATEST TECHNOLOGY</li>
                    <li class="filter" data-role="button" data-filter=".SUPPORT">AWESOME SUPPORT</li>
                    <li class="filter" data-role="button" data-filter=".FUNCTIONAL">CROSS-FUNCTIONAL TEAM</li>
                </ul>
            </div>
            <div class="filter-list row">
                <div class="product-block mix TECHNOLOGY col-lg-4 col-md-4 col-sm-12 hidden">
                    <div class="inner-box">
                        <div class="content">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img
                                        src="{{ asset('frontend/images/s-3.webp') }}" alt="s-3">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-block active mix TECHNOLOGY col-lg-8 col-md-8 col-sm-12">
                    <div class="inner-box">
                        <div class="content" style="text-align: left">
                            <div class="text">
                                As an online marketing agency, the latest technology usage plays a big role. So, team Nugortech IT always stays updated with different technology. With proper training and guidance, each member of Nugortech IT stays technologically advanced.
                            </div>
                            <div class="text py-3" style="color: #F94A29">
                                We are digital marketers. Striving for customer-centric service is our target. Hence, from first to last in any project we utilize software that suits the best.
                            </div>
                            <div class="text">
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> WordPress and other advanced digital marketing tools <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Javascript,React,Node.js, PHP, Laravel, Vue.js, etc. for web services <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> SketchUp, Maya, AutoCAD, Cinema 4D, etc for 3D modeling and rendering
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-block mix SUPPORT col-lg-4 col-md-4 col-sm-12 ">
                    <div class="inner-box">
                        <div class="content">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img
                                        src="{{ asset('frontend/images/s-1.webp') }}" alt="s-1">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-block mix SUPPORT col-lg-8 col-md-8 col-sm-12" >
                    <div class="inner-box">
                        <div class="content" style="text-align: left">
                            <div class="text">
                                From assigning tasks to submitting the final project we give all time support for you. Remarkably, you get everything with us that you need for your online business. No matter if you are a well-established brand or just a start-up, we do our best for the perfect support.
                            </div>
                            <div class="text py-3" style="color: #F94A29">
                                Importantly, we have cross-functional mates. This is the fact that makes our team skilled in different sectors. Whatever you need for digital marketing, you can get complete support from us.
                            </div>
                            <div class="text">
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Transparent support system, accessible to all clients <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Accurate and faster response <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Friendly online consultants <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> 24/7 online support
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-block mix FUNCTIONAL col-lg-4 col-md-4 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <div class="image-box">
                                <figure class="image overlay-anim"><img
                                        src="{{ asset('frontend/images/s-2.webp') }}" alt="s-2">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-block mix FUNCTIONAL col-lg-8 col-md-8 col-sm-12">
                    <div class="inner-box">
                        <div class="content" style="text-align: left">
                            <div class="text">
                                We are team Nugortech IT. We are crazy strategy geniuses, inventive writers, deep data-divers, and project management masterminds. And all together we are a whole that’s bigger than the total of its parts.
                            </div>
                            <div class="text py-3" style="color: #F94A29">
                                There are several reasons we gather from different backgrounds. So, working with Nugortech IT is easier than looking for each service separately.
                            </div>
                            <div class="text">
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Intelligent analysts, SEO experts, and creative content writers <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Skilled and experienced mad developers <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Innovative and jolley graphic designers <br>
                                <i class="fa-solid fa-check" style="color: #f94a29;"></i> Talented 3D artists
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

