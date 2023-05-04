<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bytesed.com/tf/oxo/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2023 04:44:25 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OXO - App Landing Page</title>

    <link rel=icon href=favicon.ico sizes="20x20" type="image/png">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/animate.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/flaticon.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/hover-min.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/style.css">

    <link rel="stylesheet" href="{{ asset('') }}front/assets/css/responsive.css">
</head>

<body>

    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div></div>
            <hr />
        </div>
    </div>

    <div class="header-style-01">

        <nav class="navbar navbar-area navbar-expand-lg nav-style-02">
            <div class="container nav-container political-02">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="index-2.html" class="logo">
                            <img src="{{ asset('') }}front/assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                        
                        <li><a href="#packages">Beranda</a></li>
                        {{-- <li><a href="#why">Why Us ?</a></li> --}}
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="nav-right-content">
                    <div class="btn-wrapper">
                        <a href="{{ url('login') }}" class="boxed-btn reverse-color">Login</a>
                    </div>
                </div>
            </div>
        </nav>

    </div>
    <div class="header-area header-bg" style="background-image:url(front/assets/img/header-slider/01.png);">
        <div class="bg-img" style="background-image:url(front/assets/img/balloon/bike.png);"></div>
        <div class="bg-img-02" style="background-image:url(front/assets/img/balloon/balloon.png);"></div>
        <div class="bg-img-03" style="background-image:url(front/assets/img/balloon/balloon-03.png);"></div>
        <div class="bg-img-04" style="background-image:url(front/assets/img/balloon/balloon-02.png);"></div>
        <div class="bg-img-05" style="background-image:url(front/assets/img/leaf/leaf-01.png);"></div>
        <div class="bg-img-06" style="background-image:url(front/assets/img/leaf/leaf-02.png);"></div>
        {{-- <div class="bg-img-07" style="background-image:url(front/assets/img/leaf/leaf-04.png);"></div> --}}
        <div class="bg-img-07" style="background-image:url(front/assets/img/donasi.png);"></div>
        {{-- <div class="bg-img-08" style="background-image:url(front/assets/img/leaf/leaf-03.png);"></div>
        <div class="bg-img-09" style="background-image:url(front/assets/img/leaf/leaf-05.png);"></div>
        <div class="bg-img-10" style="background-image:url(front/assets/img/leaf/leaf-06.png);"></div> --}}
        <div class="bg-img-11" style="background-image:url(front/assets/img/bantuan.png); position: absolute; top: 550px"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner">

                        <h1 class="title">Mari Ajukan <div style="color: #fb3c7f">HIBAH </div> Dan <div style="color: #fb3c7f"> BANTUAN SOSIAL</div></h1>
                        <div class="btn-wrapper  desktop-left padding-top-30">
                            <a href="#" class="boxed-btn">Ajukan Sekarang</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="packages" class="header-bottom-area padding-top-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title desktop-center margin-bottom-60">
                        <span class="sub-title">Jenis Pengajuan</span>
                        <h3 class="title">Berikut beberapa jenis pengajuan yang dapat anda ajukan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-package-item water-effect bg-image"
                        style="background-image: url(front/assets/img/package/01.jpg);">
                        <div class="content">
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Ajukan</a>
                            </div>
                            <h3 class="title"><a href="#">Bantuan Sosial</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-package-item water-effect bg-image"
                        style="background-image: url(front/assets/img/package/02.jpg);">
                        <div class="content">
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Ajukan</a>
                            </div>
                            <h3 class="title"><a href="#">HIBAH</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="why" class="choose-us-area bg-image padding-top-90"
        style="background-image: url(front/assets/img/choose/bg.png);">
        <div class="bg-img" style="background-image: url(front/assets/img/choose/01.png);"></div>
        <div class="bg-img-02" style="background-image: url(front/assets/img/leaf/leaf-01.png);"></div>
        <div class="bg-img-03" style="background-image: url(front/assets/img/leaf/leaf-02.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title padding-bottom-25">
                        <span class="sub-title">Bagaimana Caranya ? </span>
                        <h4 class="title">Cukup beberapa langkah untuk pengajuan, serta dapat dilacak secara mudah</h4>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="choose-single-item margin-bottom-30">
                                <div class="icon">
                                    <i class="flaticon-accounting"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Daftar</a>
                                    </h4>
                                    <p>Inspiration comes in many ways and you like to save everything from. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="choose-single-item margin-bottom-30">
                                <div class="icon style-01">
                                    <i class="flaticon-accounting"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Ajukan</a>
                                    </h4>
                                    <p>Inspiration comes in many ways and you like to save everything from. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="choose-single-item margin-bottom-30">
                                <div class="icon style-02">
                                    <i class="flaticon-accounting"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Verifikasi</a>
                                    </h4>
                                    <p>Inspiration comes in many ways and you like to save everything from. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="choose-single-item margin-bottom-30">
                                <div class="icon style-03">
                                    <i class="flaticon-accounting"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Cairkan</a>
                                    </h4>
                                    <p>Inspiration comes in many ways and you like to save everything from. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="call-to-action-area padding-top-80 bg-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="call-to-action-inner">
                            <div class="line-area">
                                <span class="line-one"></span>
                                <span class="line-two"></span>
                                <span class="line-three"></span>
                            </div>
                            <span class="bubble"></span>
                            <div class="action-bg-img"
                                style="background-image: url(front/assets/img/call-to-action/animation/dot.png);"></div>
                            <div class="action-bg-img-02"
                                style="background-image: url(front/assets/img/call-to-action/animation/cricle.png);"></div>
                            <h2 class="title">Daftar untuk Pengajuan</h2>
                            <p class="subtitle">Ajukan Dana Hibah dan Bantuan Sosial yang anda perlukan</p>
                            <div class="btn-wrapper desktop-center">
                                <a href="#" class="boxed-btn">Login / Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="destination-area padding-bottom-90 padding-top-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="destination-img wow animate__animated animate__backInUp bg-image"
                        data-parallax='{"x": 100, "y": 0}' style="background-image: url(front/assets/img/bg/01.png);"></div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="section-title padding-bottom-25">
                        <span class="sub-title">Select Destination</span>
                        <h4 class="title">Choose a <span>destination</span> where you want to <span>travel</span></h4>
                        <p>Inspiration comes in many ways and you like to save everything from. sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="destination-single-item margin-bottom-30">
                                <div class="icon">
                                    <i class="flaticon-hotel"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Great Deal</a>
                                    </h4>
                                    <p>Inspiration comes in many ways</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="destination-single-item margin-bottom-30">
                                <div class="icon style-01">
                                    <i class="flaticon-notification"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        <a href="#">Find Transport</a>
                                    </h4>
                                    <p>Inspiration comes in many ways</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="trip-area padding-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title padding-bottom-25">
                        <span class="sub-title">Book A Trip</span>
                        <h4 class="title">Then <span>book your trip</span> from our exclusive <span>offers.</span></h4>
                        <p>Inspiration comes in many ways and you like to save everything from. sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation.</p>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Take your flight </h3>
                        <p>in many ways and you like to save Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore.</p>
                        <h3 class="sub-title">Room Service</h3>
                        <p>in many ways and you like to save Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore.</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="trip-img wow animate__animated animate__backInDown bg-image"
                        data-parallax='{"x": -100, "y": 0}' style="background-image: url(front/assets/img/bg/02.png);"></div>
                </div>
            </div>
        </div>
    </div>

    <section class="testimonial-area bg-image padding-top-110 padding-bottom-120"
        style="background-image: url(front/assets/img/testimonial/01.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title desktop-center white margin-bottom-55">
                        <h3 class="title">More then 30k+ tarvellers satisfied with our journey</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel-area">
                        <div class="testimonial-carousel">
                            <div class="single-testimonial-item">
                                <div class="thumb bg-image">
                                    <img src="{{ asset('') }}front/assets/img/testimonial/03.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="description">Inspiration comes in many ways and you like to save
                                        everything from. sed do exercitation.</p>
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">Jonathon Doe</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-item">
                                <div class="thumb bg-image">
                                    <img src="{{ asset('') }}front/assets/img/testimonial/04.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="description">Inspiration comes in many ways and you like to save
                                        everything from. sed do exercitation.</p>
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">Jonathon Doe</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-item">
                                <div class="thumb bg-image">
                                    <img src="{{ asset('') }}front/assets/img/testimonial/05.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="description">Inspiration comes in many ways and you like to save
                                        everything from. sed do exercitation.</p>
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">Jonathon Doe</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-item">
                                <div class="thumb bg-image">
                                    <img src="{{ asset('') }}front/assets/img/testimonial/04.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="description">Inspiration comes in many ways and you like to save
                                        everything from. sed do exercitation.</p>
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">Jonathon Doe</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <div id="contact" class="contact-area padding-bottom-120 padding-top-110">
        <div class="bg-image" data-parallax='{"x": -50, "y": 0}'
            style="background-image: url(front/assets/img/contact/01.png);"></div>
        <div class="bg-image-02" data-parallax='{"x": 50, "y": 0}'
            style="background-image: url(front/assets/img/contact/02.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-3">
                    <div class="section-title padding-bottom-25">
                        <span class="sub-title">Contact Us</span>
                        <h4 class="title">Then <span>book your trip</span> from our exclusive <span>offers</span>. </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 offset-lg-3 col-md-4">
                    <div class="content-area">
                        <div class="single-contact-item">
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="content">
                                <p class="details">+458 123 657 <br> +415 103 557</p>
                            </div>
                        </div>
                        <div class="single-contact-item">
                            <div class="icon">
                                <i class="flaticon-open"></i>
                            </div>
                            <div class="content">
                                <p class="details"><a href="https://bytesed.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="e980878f86a98c91888499858cc78a8684">[email&#160;protected]</a>
                                    <br> <a href="https://bytesed.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="c3aaada5ac83a6bba2aeb3afa6eda0acae">[email&#160;protected]</a></p>
                            </div>
                        </div>
                        <div class="single-contact-item">
                            <div class="icon">
                                <i class="flaticon-placeholder"></i>
                            </div>
                            <div class="content">
                                <p class="details">66 broklyn street, <br> new york</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="contact-form">
                        <form action="https://bytesed.com/tf/oxo/contact.php" id="contact_page_form"
                            class="contact-page-form style-01" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your Name *" class="form-control"
                                            required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Your E-Mail *" class="form-control"
                                            required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Telephone *" class="form-control"
                                            required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="msg" cols="1" rows="4"
                                            placeholder="Send Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-wrapper">
                                        <input type="submit" value="Send Message" class="boxed-btn">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-area">
        <div class="footer-top bg-black bg-image padding-top-85 padding-bottom-50">
            <div class="container">
                <div class="footer-top-border padding-bottom-30">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-widget widget">
                                <div class="about_us_widget">
                                    <a href="index-2.html" class="footer-logo"> <img src="{{ asset('') }}front/assets/img/logo-02.png"
                                            alt="footer logo"></a>
                                    <p>Inspiration comes in many ways and you like to save everything from. sed do
                                        eiusmod tempor incididunt .</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 offset-lg-1 col-md-8">
                            <div class="footer-widget widget widget_subscribe">
                                <div class="header-content">
                                    <h4 class="title">Newsletter</h4>
                                    <p>Get a bi-weekly digest of great articles</p>
                                </div>
                                <form class="subscribe-form" action="https://bytesed.com/tf/oxo/index.html">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your email address">
                                    </div>
                                    <button type="submit" class="submit-btn"><i class="flaticon-send"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">Home Page</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Causes</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">inner Page</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Causes</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">Lates Blog</h4>
                            <ul class="recent_post_item">
                                <li class="single-recent-post-item">
                                    <div class="thumb">
                                        <img src="{{ asset('') }}front/assets/img/popular-post/01.jpg" alt="recent post">
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="#">Cupidatat non proident sunt culpa officia</a></h4>
                                        <span class="time"><i class="far fa-calendar-alt"></i>05 Oct 2020</span>
                                    </div>
                                </li>
                                <li class="single-recent-post-item">
                                    <div class="thumb">
                                        <img src="{{ asset('') }}front/assets/img/popular-post/02.jpg" alt="recent post">
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="#">Cupidatat non proident sunt culpa officia</a></h4>
                                        <span class="time"><i class="far fa-calendar-alt"></i>05 Oct 2020</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">Follow us on</h4>
                            <ul class="social_share margin-top-20">
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                            <div class="copyright-area-inner">
                                © Copyrights 2020 Oxo All rights reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('') }}front/assets/js/jquery-2.2.4.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/bootstrap.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/jquery.magnific-popup.js"></script>

    <script src="{{ asset('') }}front/assets/js/wow.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/owl.carousel.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/waypoints.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/jquery.counterup.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/jquery.ripples-min.js"></script>

    <script src="{{ asset('') }}front/assets/js/imagesloaded.pkgd.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/isotope.pkgd.min.js"></script>

    <script src="{{ asset('') }}front/assets/js/parallax.js"></script>

    <script src="{{ asset('') }}front/assets/js/mail-validation.js"></script>

    <script src="{{ asset('') }}front/assets/js/contact.js"></script>

    <script src="{{ asset('') }}front/assets/js/main.js"></script>
</body>

<!-- Mirrored from bytesed.com/tf/oxo/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2023 04:45:24 GMT -->

</html>