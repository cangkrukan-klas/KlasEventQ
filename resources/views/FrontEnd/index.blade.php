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
    <title> Eventq - Kelompok Linux Arek Suroboyo</title>
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
        <a class="navbar-brand logo" href="{{url('/login')}}">
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
                    <a class="nav-link " href="{{url('/events')}}">Events</a>
                </li>
                @if ($loginstatus['status'])
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/logout')}}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/login')}}">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!--header end here-->

<!--cover section slider -->
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        @foreach($triEvent as $u)
        <div class="cover_item" style="background: url({{URL::asset('img/bg/slider.png')}});">
            <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                                {{$u->name}}
                            </h2>
                            <strong class="cover-xl-text">Suroboyo</strong>
                            <p class="cover-date">
                                {{ $u->start_date }} - {{ $u->end_date }}
                            </p>
                            <a href="{{ url('/events') }}/{{ $u->id }}" class=" btn btn-primary btn-rounded" >
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--<div class="cover_item" style="background: url({{URL::asset('img/bg/slider.png')}});">
            <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-left">
                            <h2 class="cover-title">
                                Info - Info Acara KLAS
                            </h2>
                            <strong class="cover-xl-text">Terbaru</strong>
                            <p class="cover-date">
                                12-14 February 2018  - Los Angeles, CA.
                            </p>
                            <a href="#" class=" btn btn-primary btn-rounded" >
                                Buy Tickets Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_item" style="background: url({{URL::asset('img/bg/slider.png')}});">
            <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                                Prepare yourself for the
                            </h2>
                            <strong class="cover-xl-text">conference</strong>
                            <p class="cover-date">
                                12-14 February 2018  - Los Angeles, CA.
                            </p>
                            <a href="#" class=" btn btn-primary btn-rounded" >
                                Buy Tickets Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="cover_nav">
        <ul class="cover_dots">
            <li class="active" data="0"><span>1</span></li>
            <li  data="1"><span>2</span></li>
            <li  data="2"><span>3</span></li>
        </ul>
    </div>
</section>
<!--cover section slider end -->

<!--event info
<section class="pt100 pb100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-calendar-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            DATE
                        </h5>
                        <p>
                            12-14 february 2018
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-location-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            location
                        </h5>
                        <p>
                            Los Angeles, CA.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-person-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            speakers
                        </h5>
                        <p>
                            Natalie James
                            + guests
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-pricetag-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            tikets
                        </h5>
                        <p>
                            $65 early bird
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--event info end -->


<!--event countdown
<section class="bg-img pt70 pb70" style="background-image: url{{asset('img/bg/bg-img.png')}};">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h4 class="mb30 text-center color-light">Counter until the big event</h4>
                <div class="countdown"></div>
            </div>
        </div>
    </div>
</section>
<!--event count down end-->


<!--about the event
<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                About the event
            </h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p>
                    In rhoncus massa nec  sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod quis. Maecenas ornare, ex in malesuada tempus.
                </p>
            </div>
        </div>

        <!--event features
        <div class="row justify-content-center mt30">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="icon_box_one">
                    <i class="lnr lnr-mic"></i>
                    <div class="content">
                        <h4>9 Speakers</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        </p>
                        <a href="#">read more</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="icon_box_one">
                    <i class="lnr lnr-rocket"></i>
                    <div class="content">
                        <h4>8 hrs Marathon</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        </p>
                        <a href="#">read more</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="icon_box_one">
                    <i class="lnr lnr-bullhorn"></i>
                    <div class="content">
                        <h4>Live Broadcast</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        </p>
                        <a href="#">read more</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="icon_box_one">
                    <i class="lnr lnr-clock"></i>
                    <div class="content">
                        <h4>Early Bird</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        </p>
                        <a href="#">read more</a>
                    </div>
                </div>
            </div>
        </div>
        <!--event features end
    </div>
</section>
<!--about the event end -->

<!--event calender-->
<section class="pt100 pb100">
    <div class="container">
        <div class="table-responsive">
            <table class="event_calender table">
                <thead class="event_title">
                <tr>
                    <th>
                        <i class="ion-ios-calendar-outline"></i>
                        <span>next events calendar</span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
@foreach ($event as $ev)
                <tr>
                    <td>
                        <img src="{{asset('img/cleander/c1.png')}}" alt="event">
                    </td>
                    <td class="event_date">
                        {{ $ev->quota }}
                        <span>kuota tersisa</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>{{ $ev->name }}</h5>
                            <h6>{{ $ev->start_date }} - {{ $ev->end_date }}</h6>
                        </div>
                    </td>
                    <td>
                        <a href="{{ url('/events') }}/{{ $ev->id }}" class="btn btn-primary btn-rounded">Read More</a>
                    </td>
                </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--event calender end -->


<!--speaker section-->
<section class="pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                Member Cangkrukan
            </h3>
        </div>
    </div>
    <div class="row justify-content-center no-gutters">
        @foreach($user as $u)
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="{{url('Images/Account')}}/<?php if ($u->photo == ''){ echo 'imanuel-nathanael-1459809.png';} else { echo $u->photo; }?>" alt="speaker name">
                    <div class="info_box">
                        <h5 class="name">{{$u->name}}</h5>
                        <p class="position">{{$u->regency_id}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--speaker section end -->

<!--Price section
<section class="pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                Pricing table
            </h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <div class="price_box active">
                    <div class="price_highlight">
                        recommended
                    </div>
                    <div class="price_header">
                        <h4>
                            Early Bird
                        </h4>
                        <h6>
                            For the fast ones
                        </h6>
                    </div>
                    <div class="price_tag">
                        65 <sup>$</sup>
                    </div>
                    <div class="price_features">
                        <ul>
                            <li>
                                Early Entrance
                            </li>
                            <li>
                                Front seat
                            </li>
                            <li>
                                Complementary Drinks
                            </li>
                            <li>
                                Promo Gift
                            </li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="price_box">
                    <div class="price_header">
                        <h4>
                            Start up
                        </h4>
                        <h6>
                            For the begginers
                        </h6>
                    </div>
                    <div class="price_tag">
                        85 <sup>$</sup>
                    </div>
                    <div class="price_features">
                        <ul>
                            <li>
                                Early Entrance
                            </li>
                            <li>
                                Front seat
                            </li>
                            <li>
                                Complementary Drinks
                            </li>
                            <li>
                                Promo Gift
                            </li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="price_box">
                    <div class="price_header">
                        <h4>
                            Corporate
                        </h4>
                        <h6>
                            For the business
                        </h6>
                    </div>
                    <div class="price_tag">
                        95 <sup>$</sup>
                    </div>
                    <div class="price_features">
                        <ul>
                            <li>
                                Early Entrance
                            </li>
                            <li>
                                Front seat
                            </li>
                            <li>
                                Complementary Drinks
                            </li>
                            <li>
                                Promo Gift
                            </li>
                        </ul>
                    </div>
                    <div class="price_footer">
                        <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--price section end -->



<!--brands section
<section class="bg-gray pt100 pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                our partners
            </h3>
        </div>
        <div class="brand_carousel owl-carousel">
            <div class="brand_item text-center">
                <img src="{{asset('img/brands/b1.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('img/brands/b2.png')}}" alt="brand">
            </div>

            <div class="brand_item text-center">
                <img src="{{asset('img/brands/b3.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('img/brands/b4.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('img/brands/b5.png')}}" alt="brand">
            </div>
        </div>
    </div>
</section>
<!--brands section end-->

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