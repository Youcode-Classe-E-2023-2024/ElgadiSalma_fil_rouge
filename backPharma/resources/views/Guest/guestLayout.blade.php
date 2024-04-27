<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="title" content="Meditex">
    <meta property="fb:app_id" content="312" />
    <meta property="og:type" content="Medical" />
    <meta property="og:url" content="http://steelthemes.com/demo/Elango/meditex-final" />
    <meta property="og:title" content="Meditex">
    <meta property="og:image" content="http://steelthemes.com/demo/Elango/meditex-final/assets/image/fbimg-210x210.jpg">
    <meta property="og:description" content="Meditex is html 5 Template">
    <meta name="full-screen" content="yes">
    <meta name="theme-color" content="#568701">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>PharmaStock</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font/flaticon.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/image/fav/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/fav/favicon-16x16.png') }}" sizes="16x16">

</head>

<body class="sbar_color_one">

    <!--Start Preloader -->
    <div class="preloader"></div>
    <!--End Preloader -->

    <div class="page-wapper home-page-one">
        <header class="site-header" id="header-one">
            <div class="top-bar">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="float-left">
                                <p><i class="fa fa-map-marker"></i> 7088 Micaela Cliffs, Thielshire, OK 95062</p>
                            </div>
                            <div class="float-right ">
                                <div class="inner-sec">
                                    <ul class="social-media">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                    <div class="dropdown language-drp">
                                        <button type="button" class=" btn-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <img src="{{ asset('assets/image/language-1.jpg') }}" alt="lan"> Eng
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="#"><img
                                                    src="{{ asset('assets/image/language-2.jpg') }}" alt="lan">
                                                FRA</a>
                                            <a class="dropdown-item" href="#"><img
                                                    src="{{ asset('assets/image/language-1.jpg') }}"
                                                    alt="lan">GRE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-expand-lg bsnav bsnav-sticky bsnav-sticky-slide">
                <div class="container">
                    <a class="navbar-brand d-flex" href="/">
                        <img src="{{ asset('assets/image/pharma_logo.png') }}" style="width: 50px" class="img-fluid"
                            alt="img">
                        <p style="padding: 11px 5px; color:darkslategrey">Pharma<span>Stock</span></p>
                    </a>
                    <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav navbar-mobile ml-auto mr-auto">
                            <li class="nav-item dropdown @if (Request::url() === 'http://127.0.0.1:8000') activee @endif">
                                <a class="nav-link link_hd" href="/"> Home </a>
                            </li>

                            <li class="nav-item dropdown @if (Request::url() === 'http://127.0.0.1:8000/medicament') activee @endif">
                                <a class="nav-link link_hd" href="/medicament"> Médicament </a>
                            </li>
                            <li class="nav-item dropdown @if (Request::url() === 'http://127.0.0.1:8000/about-us') activee @endif">
                                <a class="nav-link  link_hd" href="/about-us">à Propos de nous</a>
                            </li>


                        </ul>
                        <ul class="navbar-nav navbar-mobile right-nav ml-auto ">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#"> <span class="flaticon-search head-icon"></span>
                                </a>
                                <ul class="navbar-nav submenu">
                                    <li>
                                        <form action="{{ route('searchMedicine') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input name="query" type="text" placeholder="Enter a Keywords">
                                                <button type="submit" class="theme-btn">GO</button>
                                            </div>
                                        </form>
                                    <li>
                                </ul>
                            </li>
                        </ul>

                        <div class="">
                            <div class="nav-item  dropdown cart_dropdown">
                                <a class="nav-link" href="/login">
                                    <button class="theme-btn ">
                                        Log In
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Header -->
        </header>
        <!------main-content------>


        @yield('guestContent')


        <!--------footer-------->
        <div class="footer home-one">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget first">
                            <h2>ABOUT US</h2>
                            <div class="footer-text">
                                <p>As the only hospital in our growing county, things are buzzing as we expand our
                                    facilities and services. We are an intimate, 200 licensed bed hospital and the
                                    caregivers of neighbors we love.</p>

                                <ul class="social-media">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a> </li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                    <li><a href="#" target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                                    <li><a href="#" target="_blank"><i class="fa fa-wifi"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="footer-widget two">
                            <h2>DEPARTMENTS</h2>
                            <div class="footer-text">
                                <ul>
                                    <li><a href="#"> Psychiatry</a></li>
                                    <li><a href="#">Ophthalmology</a></li>
                                    <li><a href="#">Cardiology </a></li>
                                    <li><a href="#">Immunology </a></li>
                                    <li><a href="#">Hematology </a></li>
                                    <li><a href="#">Gastroenterology </a></li>
                                    <li><a href="#">Orthopedics </a></li>
                                    <li><a href="#">Pulmonary</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="footer-widget two">
                            <h2>LINKS</h2>
                            <div class="footer-text">
                                <ul>
                                    <li><a href="#"> About Us</a></li>
                                    <li><a href="#">Appointment</a></li>
                                    <li><a href="#">Contact Us </a></li>
                                    <li><a href="#">Blog </a></li>
                                    <li><a href="#">Doctors</a></li>
                                    <li><a href="#">Gallery </a></li>
                                    <li><a href="#">Timetable </a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget third">
                            <h2>NEWSLETTER</h2>
                            <div class="footer-text">
                                <p>Subscribe to our newsletter. We are not spammers.!</p>
                                <form>
                                    <div class="form-group">
                                        <input type="email" id="email" placeholder="Enter Your Email*"><br />
                                        <button class="theme-btn" type="submit">SUBSCRIBE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer-last home-one">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="left">
                            <p>© 2023 <span>PharmaStock.</span> All rights reserved.</p>
                        </div>
                        <div class="right">
                            <ul>
                                <li><a href="#">Privacy Policy </a></li>
                                <li><a href="#"> Terms & Conditions </a></li>
                                <li><a href="#"> Help Center</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--------footer-------->

        <!-------backtotop-------->
        <a href="#" id="scroll" class="default-bg" style="display: none;"><span></span></a>
        <!-------backtotop-------->
        <!------main-content------>
        </main>
        <!------main-slider------>
    </div>



    <!---------mbile-navbar----->
    <div class="bsnav-mobile">
        <div class="bsnav-mobile-overlay"></div>
        <div class="navbar">
            <button class="navbar-toggler toggler-spring mobile-toggler"><span class="fa fa-close"></span></button>
        </div>
    </div>
    <!---------mbile-navbar----->


    <!-----------------------------------script-------------------------------------->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/bsnav.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <!---smooth-scrool-->
    <script src="{{ asset('assets/js/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!--Google Map APi Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
    <script src="{{ asset('assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('assets/js/map-script.js') }}"></script>
    <!--End Google Map APi-->
</body>

</html>
