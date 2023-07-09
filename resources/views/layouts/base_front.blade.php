<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techincent.com/demo/spirit/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jul 2023 13:52:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ProTheme Lab">
    <meta name="description" content="Corporate Business Landing template">
    <meta name="keywords" content="web template, business themes, landing page template, responsive, bootstrap, mobile, themeforest template, corporate marketing template, corporate business, business showcase, business porfolio">

    <title>Spirit - Corporate Business Marketing Templates</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('') }}base_front/images/favicon.ico">

    <!--  Css Files  -->
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/slick.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/venobox.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/style.css">
    <link rel="stylesheet" href="{{ asset('') }}base_front/css/responsive.css">

</head>

<body>

    <!--  Pre-Loader Start -->
    <div id="preloader">
        <div class="pre_img">
            <img src="{{ asset('') }}base_front/images/pre-loader.gif" alt="">
        </div>
    </div>
    <!--  Pre-Loader End -->

    <!--  Header Part Start  -->
    <header id="header_part">
        <nav class="navbar navbar-default my_nav">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_list" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="main_logo" href="{{ url('/') }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://setda.pontianak.go.id/storage/settings/May2021/PyErfz6T5IwOwylq43iM.png" width="80" alt="LOGO">
                                </div>
                                <div class="col-md-8 m-5 ">
                                    <p class="p-5" style="color: white; font-size: 20px; padding-top: 15px; font-weight: bold; letter-spacing: 2px">
                                        SEKRETARIAT <br>
                                        DAERAH
                                    </p>
                                </div>
                            </div>
                            
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="nav_list">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#header_part">Beranda</a></li>
                            <li><a href="#service_part">Profil</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pelayanan Publik
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    {{-- <a class="" href="#">Action</a> --}}
                                    <a class="" href="#">PENGAJUAN HIBAH</a>
                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <a class="" href="#">PENGAJUAN BANTUAN SOSIAL</a>
                                </div>
                            </li>
                            
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('auth/register') }}">Registrasi</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- /.container -->
        </nav>
    </header>
    <!--  Header Part End  -->

    <!--  Banner Part Start  -->
    <section id="banner_part">
        <div class="slide_active">
            <div class="banner_item" data-bg-image="https://setda.pontianak.go.id/frontend/assets/images/page-header/bg.jpg">
                <div class="container text-center">
                    <div class="row">
                        <div class="banner_text">
                            <h3>Selamat Datang di <span>HIBSOS</span></h3>
                            <h4><span>HIBAH</span> DAN <span>BANTUAN SOSIAL</span>.</h4>
                            <p>SETDA adalah unsur pelaksana pemerintah daerah yang berada di bawah dan bertanggung jawab kepada Kepala Daerah.</p>
                            <a href="#" class="multi_button">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_item" data-bg-image="https://upload.wikimedia.org/wikipedia/commons/a/a1/Kantor_Walikota_Pontianak.jpg">
                <div class="container text-center">
                    <div class="row">
                        <div class="banner_text">
                            <h3>Selamat Datang di <span>HIBSOS</span></h3>
                            <h4><span>HIBAH</span> DAN <span>BANTUAN SOSIAL</span>.</h4>
                            <p>SETDA adalah unsur pelaksana pemerintah daerah yang berada di bawah dan bertanggung jawab kepada Kepala Daerah.</p>
                            <a href="#" class="multi_button">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_item" data-bg-image="https://setda.pontianak.go.id/storage/sliders/March2023/8Rc1bPT1QkyKFPPQqx2L.jpg">
                <div class="container text-center">
                    <div class="row">
                        {{-- <div class="banner_text">
                            <h3>WELCOME on <span>spirit</span></h3>
                            <h4><span>SPIRIT</span> UNIQUE DESIGN WE LOVE IT.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet porro eaque assumenda consequatur asperiores laboriosam debitis, explicabo.</p>
                            <a href="#" class="multi_button">Know More</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_arrows">
            <i class="fa fa-angle-left banner_arrow_left"></i>
            <i class="fa fa-angle-right banner_arrow_right"></i>
        </div>
    </section>
    <!--  Banner Part End  -->

    <!--  About Part Start  -->
    {{-- <section id="about_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 visible-xs">
                    <div class="about_right section_head">
                        <h2><span>Some words</span> about us</h2>
                        <p>We love building and rebuilding brands through our specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.We love building and rebuilding brands through our specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget...</p>
                        <a href="#" class="multi_button">Read More</a>
                        <ul>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <span>Mission -</span> We deliver uniqueness and quality</li>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><span> Skills -</span> Delivering fast and excellent results</li>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><span> Clients -</span> Satisfied clients thanks to our experience</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="about_left text-center">
                        <div class="about_left_inner">
                            <a class="venoboxvideo" data-vbtype="video" href="https://youtu.be/S7wCAquf9Us"><i class="fa fa-youtube-play"></i></a>
                            <h3>Spirit Video Presentation</h3>
                            <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius, qui sequitur mutationem consuetudium.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="about_right section_head">
                        <h2><span>Some words</span> about us</h2>
                        <p>We love building and rebuilding brands through our specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.We love building and rebuilding brands through our specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget...</p>
                        <a href="#" class="multi_button">Read More</a>
                        <ul>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <span>Mission -</span> We deliver uniqueness and quality</li>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><span> Skills -</span> Delivering fast and excellent results</li>
                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><span> Clients -</span> Satisfied clients thanks to our experience</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--  About Part End  -->

    <!--  Service Part Start  -->
    <section id="service_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="section_head service_head">
                        <h2><span>Apa Saja</span> Pelayanan Yang Kami Berikan</h2>
                        <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="service_bottom text-center">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-code"></i>
                            <a href="#"><h3>HIBAH</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-laptop"></i>
                            <a href="#"><h3>BANTUAN</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-deviantart"></i>
                            <a href="#"><h3>PHP</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-apple"></i>
                            <a href="#"><h3>APPS</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-leaf"></i>
                            <a href="#"><h3>Branding</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="service_item">
                            <i class="fa fa-support"></i>
                            <a href="#"><h3>24/7 Support</h3></a>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
                            <a href="#" class="ser_btn">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!--  Service Part End  -->






    <!--  footer Part Start  -->
    <footer id="footer_part">
        <!--Footer Widgets start-->
        <div class="footer_widgets">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-sm-8">
                        <div class="widgets widg_1">
                            <a href="index-2.html">
                                <img src="{{ asset('') }}base_front/images/logo.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro hic saepe ipsum id, sed tempore expedita earum aperiam suscipit quis blanditiis iure et quae.</p>
                            <div class="office_des">
                                <ul>
                                    <li><i class="fa fa-map-marker"></i> 2101 Church Ave, Brooklyn, NY 11226</li>
                                    <li><i class="fa fa-clock-o"></i> Monday - Friday : 9 AM - 7 PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="widgets widg_2">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>About Us</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>Delivery Information</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>Privacy Policy</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>Terms & Conditions</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>FAQ</a></li>
                            </ul>
                        </div>
                        <div class="clearfix visible-sm"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="widgets widg_3">
                            <h3>Our Twitter</h3>

                            <div class="tweets">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank">@Spirit</a> Cum soluta nobis eleifend option congue nihil imperdiet doming
                                        <span>3 mins ago</span>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">#envato</a> Mirum est notare quam littera gothica, quam nunc putamus parum
                                        <span>5 hours ago</span>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">@pirit</a> Soluta nobis option
                                        <span>7 days ago</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="widgets widg_4">
                            <h3>Subcribe Newsletter</h3>
                            <p>Join awesome subscribers and update yourself with our exclusive news.</p>
                            <form>
                                <input type="email" placeholder="Enter Your Email" required>
                                <button>Subcribe Now</button>
                            </form>
                            <div class="bottom_social">
                                <ul class="text-center">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Bottom start-->
        <div id="footet_bottom">
            <div class="container">
                <div class="row">
                    <div class="footer_main">
                        <div class="col-sm-5">
                            <div class="footer_left">
                                <ul>
                                    <li>Copyright © 2019 | <a href="#">SPIRIT</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="footer_right text-right">
                                <ul>
                                    <li>Design by <a href="https://themeforest.net/user/pollexe" target="_blank">Pollexe</a></li>
                                    <li>Only On <a href="#">Envato Market</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--  Footer Part End  -->

    <!--  Bact to Top button start -->
    <div id="backtotop">
        <i class="fa fa-arrow-up backtotop_btn"></i>
    </div>
    <!--  Bact to Top button End -->

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('') }}base_front/js/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('') }}base_front/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}base_front/js/imagesloaded.min.js"></script>
    <script src="{{ asset('') }}base_front/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('') }}base_front/js/jquery.filterizr.min.js"></script>
    <script src="{{ asset('') }}base_front/js/slick.min.js"></script>
    <script src="{{ asset('') }}base_front/js/venobox.min.js"></script>
    <script src="{{ asset('') }}base_front/js/waypoints.min.js"></script>
    <script src="{{ asset('') }}base_front/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm8veVh4ipYx0T0217Njyu1zPiwm60f3U&amp;callback=initMap"></script>
</body>


<!-- Mirrored from techincent.com/demo/spirit/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jul 2023 13:53:44 GMT -->
</html>