<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - PRUDENT CREDIT SOLUTION</title>

    <!-- fav icon -->
    <link rel="icon" href="{{ URL::asset('/css/logo.ico') }}" type="image/x-icon"/>

<!-- Bootstrap -->
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- animated-css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

    <script src="{{ asset('js/app.js?v=4') }}"></script>

    <style>

        .header-section .navbar .navbar-collapse .navbar-nav li {

            text-transform: none !important;
        }
        .scrolled-content {
            max-height: 200px;
            overflow-y: auto;
            white-space: nowrap;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .copy-right {
            color: #f7f7f7;
        }
        .copy-right a{
            text-decoration: none;
            color: #f7f7f7;
        }
        .copy-right a:visited{
            text-decoration: none;
            color: #f7f7f7;
        }
    </style>
    @yield('styles')
    <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
    {{--<script src="assets/js/jquery.inview.min.js"></script>--}}


    <script src="{{asset('js/js/portfolio.js')}}"></script>
    <script src="{{asset('js/js/wow.js')}}"></script>
    <script src="{{asset('js/js/lightbox.js')}}"></script>
    <script src="{{asset('owl-carrosel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/js/jquery-ui.js')}}"></script>



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
    <script src="{{ asset('js/lib/jquery.mCustomScrollbar.min.js') }}" ></script>
    <script src="{{asset('js/js/script.js')}}"></script>
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
                            <a class="navbar-brand" href="{{url('/')}}"><img src="/images/logo-icon.png" alt="image"></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="header-left-bar pull-right">
                            <ul class="contact-wrapper">
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> Mon - Fri: 9:00 a.m. - 5:30 p.m.</li>
                                <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:1-844-337-8336">1-844-337-8336</a></li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@prudentscores.com">info@prudentscores.com</a></li>
                            </ul>
                        </div> <!-- header-left-bar -->
                    </div>
                </div>
            </div>
        </div> <!-- top-bar -->
    </div> <!-- topper -->

    <div class="container" id="app" data-user="{{Auth::user()?Auth::user()->id:''}}">
        <nav class="navbar navbar-inverse hidden-sm hidden-xs" >
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-1">
                    @if(Auth::user())
                        @if(Auth::user()->role == 'client')
                            @include('helpers.urls.nav_bar_client')
                        @elseif(Auth::user()->role == 'affiliate')
                            @include('helpers.urls.nav_bar_affiliate')
                        @elseif(Auth::user()->role == 'super admin')
                            @include('helpers.urls.nav_bar_owner')
                        @elseif(Auth::user()->role == 'admin')
                            @include('helpers.urls.nav_bar_admin')
                        @elseif(Auth::user()->role == 'receptionist')
                            @include('helpers.urls.nav_bar_receptionist')
                        @endif
                    @else
                        @include('helpers.urls.nav_bar_guest')
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->role == 'client')
                                @include('helpers.urls.logged_in_client')
                            @elseif((Auth::user()->role == 'affiliate'))
                                @include('helpers.urls.logged_in_affiliate')
                            @elseif((Auth::user()->role == 'admin'))
                                @include('helpers.urls.logged_in_admin')
                            @elseif((Auth::user()->role == 'affiliate'))
                                <li><a href="{{ url('/affiliate') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>
                            @elseif((Auth::user()->role == 'receptionist'))
                                @include('helpers.urls.logged_in_receptionist')
                            @else
                                @include('helpers.urls.logged_in_owner')
{{--                                <li><a href="{{ url('/owner') }}"><img src="{{asset('images/user.png')}}" alt="">Home</a></li>--}}
                            @endif
                        @else
                            <li><a href="{{ route('login') }}"><img src="{{asset('images/user.png')}}" alt="">Login</a></li>


                            @if (Route::has('register'))
{{--                                <li><a href="{{ route('register') }}"><img src="{{asset('images/user.png')}}" alt="">Registration</a></li>--}}
                                <li><a href="{{ route('register.Affiliate') }}"><img src="{{asset('images/user.png')}}" alt="">Registration</a></li>

                            @endif
                        @endauth
                    @endif

                </ul>
                @if(!Auth::user())

                <ul class="nav navbar-nav social-icon pull-right">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
                @endif
            </div>
        </nav>
    </div>
</header> <!-- header-section -->

@yield('content')



<div class="modal fade" id="appointmentNotifier" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="appointmentDetailsModalLabel">Appiontments</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>You have <span class="apointments-count"></span> appiontments in the next 10 mintes</div>
                <div class="appointments-info">

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{{route("admin.message.index")}}">More Info</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="partner_with_us" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p style="text-align: justify">
                    We are always looking to partner with independent sales representatives.
                    To inquire, please email your CV/resume to<a href="mailto:partners@prudentscores.com">
                        partners@prudentscores.com</a> and one of our representatives will contact you promptly.


                </p>
            </div>
        </div>
    </div>
</div>
{{--@include('helpers.chat-box')--}}
@auth
    @if(Auth::user()->role == 'client')
        @include('helpers.chat-box')
    @endif
@else
    @include('helpers.chat-box')
@endif


@if(Auth::user()  && Auth::user()->role == 'client')
    <footer class="footer-section">
        <div class="copy-right text-center">
            <div class="container">
                <p>2020 &copy; All Rights Reserved by <a href="/">PRUDENT CREDIT SOLUTION</a></p>
            </div>
        </div>
    </footer>
@else
            <footer class="footer-section">
                <div class="footer-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-wrapper">
                                    <ul class="wrapper-option clearfix">
                                        <h3> CONNECT WITH US</h3>
                                        <li>
                                            <div class="content" style="color: #aaa ">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="tel:1-844-337-8336">1-844-337-8336</a>
{{--                                                1-844-337-8336--}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content" style="color: #aaa ">
                                                <i class="fa fa-envelope-o" aria-hidden="true" style="color: #fefefe "></i>
                                                <a href="mailto:info@prudentscores.com">info@prudentscores.com</a>
{{--                                                info@prudentscores.com--}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content" style="color: #aaa ">
                                                5800 S. Eastern Ave., Suite 500 <br>Commerce, CA 90040
                                            </div>

                                            <div class="content" style="color: #aaa ">
                                                Working Hours: <br> Mon-Fri (9:00 a.m. - 5:30 p.m.)
                                            </div>
                                        </li>

                                    </ul>
                                    <ul class="wrapper-option" style="padding-left: 30px">
                                        {{--                            <h3> REACH US DIRECTLY</h3>--}}
                                        {{--                            <li>--}}
                                        {{--                                <div class="content" style="color: #aaa ">--}}
                                        {{--                                    info@prudentscores.com--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="content" style="color: #aaa ">--}}
                                        {{--                                    5800 S. Eastern Ave., Suite 500 <br>Commerce, CA 90040--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="content" style="color: #aaa ">--}}
                                        {{--                                    Tel: 1-844-337-8336--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="content" style="color: #aaa ">--}}
                                        {{--                                    Working Hours: <br> Mon-Fri (9:00 a.m. - 5:30 p.m.)--}}
                                        {{--                                </div>--}}
                                        {{--                            </li>--}}
                                    </ul>
                                </div> <!-- footer-wrapper -->
                            </div>

                            <div class="col-md-4  col-sm-4">
                                <div class="footer-wrapper last-wrapper">
                                    <ul class="wrapper-option clearfix">
                                        <h3>INFORMATION</h3>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="#partner_with_us" data-toggle="modal">Partner with Us</a></li>
                                        <li><a href="{{route('legalityCreditRepair')}}">Is Credit Repair Legal?   </a></li>
                                        <li><a href="{{route('credit.repair')}}">Resources</a></li>
                                        <li><a href="#">Newsroom</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4  col-sm-4">
                                <div class="footer-wrapper last-wrapper">
                                    <ul class="wrapper-option " style="padding-left: 30px">
                                        <h3>CUSTOMER SERVICE</h3>
                                        <li><a href="{{route('faqs')}}">FAQs</a></li>
                                        <li><a href="{{route('credit.free.repair')}}">Good Credit Tips</a></li>
                                        <li>
                                            <a href="https://www.myfico.com/fico-credit-score-estimator/estimator" target="_blank">
                                                Score Estimator
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.consumer.ftc.gov/features/feature-0014-identity-theft" target="_blank">
                                                Identity Theft
                                            </a>
                                        </li>
                                        <li><a href="{{route('pravicy')}}">Privacy Policy/Terms of Use</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right text-center">
                    <div class="container">
                        <p>2020 &copy; All Rights Reserved by <a href="#">PRUDENT CREDIT SOLUTION</a></p>
                    </div>
                </div>
            </footer>
@endif

<span class="menu-toggle navbar visible-xs visible-sm sticky"><i class="fa fa-bars" aria-hidden="true"></i></span>

<div id="offcanvas-menu" class="visible-xs visible-sm">

    <span class="close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>

    <ul class="menu-wrapper">

        @if(Auth::user())
            @if(Auth::user()->role == 'client')
                @include('helpers.urls.nav_bar_client')
                @if(!empty(Auth::user()->clientDetails))
                    @if(Auth::user()->clientDetails->registration_steps != 'registered')
                        <li ><a href="{{route('client.details.edit', Auth::user()->id)}}">EDIT DETAILS</a></li>
                        <li ><a href="{{route('client.addDriverSocial')}}">UPLOAD DL & SS </a></li>
                        <li><a href="{{route('client.credentials')}}">CREDENTIALS</a></li>
                    @endif
                @endif
                <li class="menu-item sign-hide"><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                       LOG OUT <i class="fa fa-power-off"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            @else

            @endif
        @else
            @include('helpers.urls.nav_bar_guest')
            <li><a href="{{ route('login') }}"><img src="{{asset('images/user.png')}}" alt="">Login</a>
            <li><a href="{{ route('register') }}"><img src="{{asset('images/user.png')}}" alt="">Registration</a></li>

        @endif


    </ul> <!-- menu-wrapper -->
</div>
<!-- Off-Canvas View Only -->

<div id="toTop" class="hidden-xs">
    <i class="fa fa-chevron-up"></i>
</div> <!-- totop -->

</body>

</html>
