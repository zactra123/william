<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Home - PRUDENT CREDIT SOLUTION</title>

    <!-- fav icon -->
    <link rel="icon" href="{{ URL::asset('/css/logo.ico') }}" type="image/x-icon"/>

<!-- Bootstrap -->
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- animated-css -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{asset('css/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <!-- font-awesome-css -->
    <link href="{{asset('css/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- owl-carrosel-css -->
    <link href="{{asset('css/owl-carrosel/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl-carrosel/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{asset('css/revolution/layers.css')}}">
    <link rel="stylesheet" href="{{asset('css/revolution/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/revolution/settings.css')}}">
    <!-- offcanvas-menu-css -->
    <link href="{{asset('css/css/offcanvas-menu.css')}}" rel="stylesheet" type="text/css">
    <!-- style-css -->
    <link href="{{asset('css/css/style.css')}}" rel="stylesheet" type="text/css">

</head>
<body class="homePageFour">
<!-- start preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- end preloader -->


<header class="header-section">
    <div class="topper">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{url('/e')}}"><img src="/images/logo-icon.png" alt="image"></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="header-left-bar pull-right">
                            <ul class="contact-wrapper">
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> Mon - Fri: 9 am - 7 pm</li>
                                <li><i class="fa fa-mobile" aria-hidden="true"></i> +1-844-337-8336</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> info@bettercreditfix.com</li>
                            </ul>
                        </div> <!-- header-left-bar -->
                    </div>
                </div>
            </div>
        </div> <!-- top-bar -->
    </div> <!-- topper -->

    <div class="container">
        <nav class="navbar navbar-inverse hidden-sm hidden-xs">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{route('whoWeAre')}}">Who We Are</a></li>
                    <li><a href="{{route('howItWorks')}}">How It Works</a></li>
                    <li><a href="{{route('credit.education')}}">Credit Education</a></li>
                </ul>





                <ul class="nav navbar-nav navbar-right">

                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->role == 'client')
                                @include('helpers.urls.logged_in_client')
                            @elseif((Auth::user()->role == 'admin'))
                                <li><a href="{{ url('/admin') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>
                            @elseif((Auth::user()->role == 'affiliate'))
                                <li><a href="{{ url('/affiliate') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>
                            @elseif((Auth::user()->role == 'receptionist'))
                                <li><a href="{{ url('/receptionist/message') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>
                            @else
                                <li><a href="{{ url('/owner') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('login') }}"><img src="{{asset('images/user.png')}}" alt="">Login</a></li>


                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"><img src="{{asset('images/user.png')}}" alt="">Registration</a></li>

                            @endif
                        @endauth
                    @endif

                </ul>

                <ul class="nav navbar-nav social-icon pull-right">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header> <!-- header-section -->

@yield('content')


<footer class="footer-section">
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="footer-wrapper">
                        <img src="{{asset('images/logo-icon.png')}}" alt="">

                        <ul class="location">
                            <li><i class="fa fa-home" aria-hidden="true"></i>
                                <div class="content">
                                    5800 S. Eastern Ave., Commerce, CA 90040 <br> CA 90040
                                </div>
                            </li>

                            <li><i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="content">
                                    +1-844-337-8336
                                </div>
                            </li>

                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <div class="content">
                                    Working Hours: <br> Mon-Fri (9 am - 8 pm)
                                </div>
                            </li>
                        </ul>
                    </div> <!-- footer-wrapper -->
                </div>

                <div class="col-md-3 col-sm-4">
                    <div class="footer-wrapper">
                        <h3>About</h3>

                        <p>We have over 18 years of experience in the credit repair industry.As a superior credit restoration firm, Prudent Credit Solutions sets the industry standards.</p>

                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> <!-- footer-wrapper -->
                </div>

                <div class="col-md-4 col-md-offset-1 col-sm-4">
                    <div class="footer-wrapper last-wrapper">
                        <h3>Navigation</h3>

                        <ul class="wrapper-option clearfix">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('whoWeAre')}}">About</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Newsroom</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="{{route('howItWorks')}}">How It Works</a></li>
                            <li><a href="{{route('credit.education')}}">Credit Education</a></li>
                        </ul> <!-- wrapper-option -->

                        <ul class="wrapper-option">
                            <li><a href="{{route('contact')}}">Contact Us</a></li>

                            <li><a href="{{route('credit.repair')}}">Credit Resources</a></li>
                            <li><a href="{{route('legalityCreditRepair')}}">Legality of the Credit Repair</a></li>
                            <li><a href="{{route('credit.free.repair')}}">Free Credit Repair</a></li>
                            <li><a href="{{route('faqs')}}">Frequently Asked Questions</a></li>
                            <li><a href="{{route('pravicy')}}">Privacy Policy/Terms of Use</a></li>
                        </ul> <!-- wrapper-option -->
                    </div> <!-- footer-wrapper -->
                </div>
            </div>
        </div>
    </div> <!-- footer-container -->


    <div class="copy-right text-center">
        <div class="container">
            <p>2020 &copy; All Rights Reserved by <a href="#">PRUDENT CREDIT SOLUTION</a></p>
        </div>
    </div> <!-- copy-right -->
</footer> <!-- footer-section -->




<!-- Off-Canvas View Only -->
<span class="menu-toggle navbar visible-xs visible-sm "><i class="fa fa-bars" aria-hidden="true"></i></span>

<div id="offcanvas-menu" class="visible-xs visible-sm">

    <span class="close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>

    <ul class="menu-wrapper">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('whoWeAre')}}">Who We Are</a></li>
        <li><a href="{{route('howItWorks')}}">How It Works</a></li>
        <li><a href="{{route('credit.education')}}">Credit Education</a></li>
    </ul> <!-- menu-wrapper -->
</div>
<!-- Off-Canvas View Only -->

<div id="toTop" class="hidden-xs">
    <i class="fa fa-chevron-up"></i>
</div> <!-- totop -->

<script src="{{ asset('js/app.js?v=2') }}"></script>
{{--<script src="assets/js/jquery.js"></script>--}}
{{--<script src="{{ asset('js/js/bootstrap/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="assets/js/jquery.inview.min.js"></script>--}}


<script src="{{asset('js/js/portfolio.js')}}"></script>
<script src="{{asset('js/js/wow.js')}}"></script>
<script src="{{asset('js/js/lightbox.js')}}"></script>
<script src="{{asset('owl-carrosel/owl.carousel.min.js')}}"></script>
{{--<script src="{{asset('js/js/jquery-ui.js')}}"></script>--}}



<!-- Revolution Slider -->
<script src="{{asset('js/revolution/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('js/revolution/jquery.themepunch.tools.min.js')}}"></script>

<!-- Revolution Extensions -->
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.video.min.js')}}"></script>

<script src="{{asset('js/js/script.js')}}"></script>
</body>

</html>
