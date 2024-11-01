@extends('frontend.master.master')
@section('title', 'Nugortech IT - '.  $products->first()->product_name ?? 'Nugortech IT - Product Details')
@section('meta_description',   $products->first()->meta_description ??  $products->first()->product_name)
@section('meta_title', 'Nugortech IT - '.  $products->first()->meta_title ?? 'Nugortech IT - '.  $products->first()->product_name)
@section('meta_tag',  $products->first()->meta_tag ??   $products->first()->product_name)
@section('content')
<section class="page-title" style="background-image: url({{ asset('frontend') }}/images/background/page-title-bg.webp);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">{{ $products->first()->product_name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
</section>

<section class="services-details">
    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="services-details__content">
                    <img src="{{ asset('uploads/products/gallery') }}/{{ $productgallery->first()->gallery_image }}" alt="{{ $products->first()->gallery_image_alt_tag }}" />
                    <p>{!! $products->first()->description !!}</p>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="service-sidebar">

                    <div class="sidebar-widget service-sidebar-single">

                        <div class="service-details-help" style="text-align: left">
                            <div class="help-shape-1"></div>
                            <div class="help-shape-2"></div>
                            <h2 class="help-title">Order For Online</h2>
                            <h4 class="help-title-price text-white">Offer Price: {{ $products->first()->product_discount}}Tk - <del>{{ $products->first()->product_price }}Tk</del></h4>
                            <div class="help-contact">
                                <form action="{{ route('services.product.checkout') }}" method="POST">
                                @csrf
                                    <input type="hidden" name="product_id" value="{{ $products->first()->id }}">
                                    <button type="submit" class="btn btn-light" style="color: #F94A29;"><a>Order Now</a></button>
                                </form>
                                <p class="mb-0 text-white">Order Confirm with live chat:</p>
                            </div>
                            <div class="help-social-icon">
                                <a href="https://m.me/218057834721211?ref=Hello%20there,%20I%20found%20you%20on%20website!%20I%20would%20like%20to%20talk%20about%20your%20service%20in%20details.%20Product:%20{{ urlencode($products->first()->product_name) }}" target="_blank">
                                    <i class="fa-brands fa-facebook-messenger"></i>
                                </a>

                                <a href="https://api.whatsapp.com/send?phone=8801303523442&text=Hello%20there,%20I%20found%20you%20on%20website!%20i%20would%20like%20to%20talk%20about%20your%20service%20in%20details.%20product:%20{{ urlencode($products->first()->product_name) }}%20-%20{{ urlencode(route('product.details',$products->first()->slug)) }}" target="_blank">
                                    <i class="fa-brands fa-whatsapp" style="padding-left: 20px"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="service-sidebar">

                    <div class="sidebar-widget service-sidebar-single">

                        <div class="service-details-help">
                            <div class="help-shape-1"></div>
                            <div class="help-shape-2"></div>
                            <h2 class="help-title">Contact with <br> us for any <br> advice</h2>
                            <div class="help-icon">
                                <a href="tel:{{ $setting->first()->phone }}">
                                    <span class=" lnr-icon-phone-handset"></span>
                                </a>
                            </div>
                            <div class="help-contact">
                                <p>Need help? Talk to an expert</p>
                                @if ($setting->first()->phone != null)
                                    <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="sidebar-widget service-sidebar-single mt-4">
                            <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s"
                                data-wow-duration="1200m">
                                <a href="#" class="theme-btn btn-style-one d-grid"><span
                                        class="btn-title"><span class="fa-solid fa-headset fa-beat"></span>Free Consultancy</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                <div class="innerpage mt-25">
                    <h3>Frequently Asked Question</h3>
                    <ul class="accordion-box wow fadeInRight">

                        <li class="accordion block active-block">
                            <div class="acc-btn active">WHAT'S THE EXPECTED TIMELINE TO OBSERVE SEO IMPROVEMENTS ON MY WEBSITE?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">
                                        <p>After optimizing a website that’s been around for one or two years, you can anticipate initial signs of improvement in search rankings within 2, or 3 weeks. This timeframe accounts for search engines requiring time to crawl, analyze,  re-index new content, and respond to enhanced website performance. However, it typically takes 8-10 weeks to observe substantial and noticeable progress on your website.</p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block ">
                            <div class="acc-btn">HOW MUCH DOES AN SEO SERVICE COST?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content ">
                                <div class="content">
                                    <div class="text">
                                        <p>div class="text">The amount of SEO service pricing depends on different facts. It consists of the current performance search, web page amount, competitors and many other things.</p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">WHO WILL PROVIDE THE CONTENT FOR MY NEW WEBSITE?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">You have the option to supply content for your website, or if preferred, we can furnish content for an extra fee.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">IS IT NECESSARY FOR ME TO BE IN CLOSE PROXIMITY TO COLLABORATE WITH YOU?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Certainly not. Our services can be utilized from any corner of the globe.</div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">WHAT KINDS OF CONTENT ARE AVAILABLE FROM YOUR OFFERINGS?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Our writers excel in crafting a wide range of content, including articles, blogs, social media posts, Q&A content, and more. Additionally, we are proficient in producing content in both Bengali and English to serve various purposes.</div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">WHICH SECTORS DOES CONTENT MARKETING ENCOMPASS?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">The content serves as a valuable resource for all aspects of your business, including areas such as search, social media, email marketing, PR, PPC, and numerous others.

                                        Certainly, we conduct comprehensive keyword research for your content to ensure that our service delivers SEO-friendly content to you.
                                        </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
