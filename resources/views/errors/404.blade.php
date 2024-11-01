<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nugortech it error</title>

        <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="{{asset('frontend')}}/images/favicon.png" type="image/x-icon">
        <link rel="icon" href="{{asset('frontend')}}/images/favicon.png" type="image/x-icon">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        </head>

        <style>
            body{
                overflow: hidden;
            }
        </style>
<body>
    <div class="page-wrapper">

        {{-- <div class="preloader"></div> --}}
        <section class>
            <div class="auto-container pt-120 pb-70">
                <div class="row">
                    <div class="col-xl-8 m-auto" >
                        <div class="error-page__inner">
                            <div class="error-page__title-box">
                                <img width="100%" height="100vh" src="{{asset('frontend')}}/images/resource/404.png" alt="404">
                                <h3 class="error-page__sub-title">Page not found!</h3>
                            </div>
                            <p class="error-page__text">Sorry we can't find that page! The page you are looking <br> for
                                was never existed.</p>
                            <a href="{{ url('/') }}" class="theme-btn btn-style-one shop-now"><span class="btn-title">Back
                                    to Home</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="{{asset('frontend')}}/js/jquery.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/script.js"></script>
</body>

</html>
