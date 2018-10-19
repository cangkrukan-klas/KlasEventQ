<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Evento -Event Html Template">
    <meta name="keywords" content="Evento , Event , Html, Template">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Eventq - Email Verified</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/et-line.css')}}" rel="stylesheet">
    <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--header start here -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="#">
            <img src="{{asset('img/logo.png')}}" alt="Evento"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/login')}}">Login</a>
                </li>
                <li class="search_btn">
                    <a  href="#">
                        <i class="ion-ios-search"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--header end here-->

<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{asset('img/bg/bg-img.png')}}">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        Confirmation Success.
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->

<!--contact section -->
<section class="pb100">
    <div class="container">
        <div class="row justify-content-left mt100">
            <p>Congratulations! Your email is verified. <a href="{{ url('/login') }}" style="font-weight: bold; text-decoration: underline;">Login here.</a></p>
        </div>

    </div>
</section>
<!--contact section end -->

<!--get tickets section -->
<section class="bg-img pt100 pb100 overlay" style="background-image: url({{URL::asset('img/bg/cangkrukan.jpeg')}});">
    <div class="container">
        <div class="section_title mb30">
            <h3 class="title color-light">
                Event
            </h3>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 text-md-left text-center color-light">
                KLAS mengadakan event per bulannya. Apakah Anda tertarik mengikuti event yang akan dilaksanakan? Untuk informasi lengkapnya, Anda bisa lihat selengkapnya di halaman di bawah ini.
            </div>
            <div class="col-md-3 text-md-right text-center">
                <a href="{{ url('/events') }}" class="btn btn-primary btn-rounded mt30">Lihat Event</a>
            </div>
        </div>
    </div>
</section>
<!--get tickets section end-->

<!--footer start -->
<footer>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 col-12">
                <div class="footer_box">
                    <div class="footer_header">
                        <div class="footer_logo">
                            <img src="{{asset('img/logo.png')}}" alt="evento">
                        </div>
                    </div>
                    <div class="footer_box_body">
                        <p>
                            Kelompok Linux Arek Suroboyo atau biasa di sebut KLAS adalah sebuah perkumpulan pengguna linux dari berbagai macam distro yang bermukim di kawasan kota Surabaya. Terdiri dari pegawai IT, mahasiswa.
                        </p>
                        <ul class="footer_social">
                            <li>
                                <a href="mailto:aris@klas.or.id"><i class="ion-email"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/groups/KLAS.Activity/"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/KLAS_Activity"><i class="ion-social-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!--| This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ url('/events') }}">Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--footer end -->

<!-- jquery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<!--slick carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!--parallax -->
<script src="{{asset('js/parallax.min.js')}}"></script>
<!--Counter up -->
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<!--Counter down -->
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<!-- WOW JS -->
<script src="{{asset('js/wow.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>