<footer class="ec-footer section-space-mt" style="background: #202020; color: #fff">
    <div class="footer-container">
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo">
                                @if ($setting->first()->white_logo != null)
                                    <a href="{{url('/')}}">
                                        <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="logo">
                                        <img class="dark-footer-logo" src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="Site Logo" style="display: none;" />
                                    </a>
                                @endif
                            </div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        @if ($setting->first()->address != null)
                                            {{ $setting->first()->address }}
                                        @endif
                                    </li>
                                    <li class="ec-footer-link"><span>Call Us:</span>
                                        @if ($setting->first()->phone != null)
                                            <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
                                        @endif
                                    </li>
                                    <li class="ec-footer-link"><span>Email:</span>
                                        @if ($setting->first()->email != null)
                                            <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-3">
                                <ul class="social-icons footer_icon d-flex">
                                    <li><a href="https://www.linkedin.com/company/nugortechitbd/" target="_blank"><i class="fi fi-brands-linkedin text-white"></i></a></li>
                                    <li><a href="https://www.facebook.com/nugortechitcom" target="_blank"><i class="fi fi-brands-facebook text-white"></i></a></li>
                                    <li><a href="https://www.tiktok.com/@nugortechitbd" target="_blank"><i class="fi fi-brands-tik-tok text-white"></i></a></li>
                                    <li><a href="https://www.youtube.com/@NugortechIT" target="_blank"><i class="fi fi-brands-youtube text-white"></i></a></li>
                                    <li><a href="https://www.behance.net/nugortech_it" target="_blank"><i class="fi fi-brands-behance text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Our Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <ul class="user-links style-two">
                                        <li class="ec-footer-link"><a href="#">Digital marketing</a></li>
                                        <li class="ec-footer-link"><a href="#">Branding design</a></li>
                                        <li class="ec-footer-link"><a href="#">Product Design</a></li>
                                        <li class="ec-footer-link"><a href="#">Web development</a></li>
                                        <li class="ec-footer-link"><a href="#">App Development</a></li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Useful Link</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="{{ route('about') }}">About Us</a></li>
                                    <li class="ec-footer-link"><a href="{{ route('our.services') }}">Our Services</a></li>
                                    <li class="ec-footer-link"><a href="{{ route('our.products') }}">Our Products</a></li>
                                    <li class="ec-footer-link"><a href="{{ route('our.blogs') }}">Our Blog</a></li>
                                    <li class="ec-footer-link"><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Newsletter</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">Get instant updates about our new products and
                                        special promos!</li>
                                </ul>
                                <div class="ec-subscribe-form">
                                    <form id="ec-newsletter-form" name="ec-newsletter-form" method="post" action="{{ route('subscribe.store') }}">
                                        @csrf
                                        <div id="ec_news_signup" class="ec-form">
                                            <input class="ec-email" type="email" required="" placeholder="Enter your email here..." name="email" />
                                            <button id="ec-news-btn" class="button btn-primary" type="submit" name="subscribe" value=""><i class="ecicon eci-paper-plane-o" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="mt-2">
                                            @if (session('subscribe'))
                                                <strong class="text-success">{{ session('subscribe') }}</strong>
                                            @endif
                                            @error('email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="background: #282828">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy text-white">
                                @if ($setting->first()->footer != null)
                                    {{ $setting->first()->footer }}| Design and Development By <a class="text-danger" href="https://nugortechit.com/">Nugortech it</a>. All Rights Reserved.
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                </div>
            </div>
        </div>
    </div>
</footer>
