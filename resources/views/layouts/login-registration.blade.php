<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Homepage</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{asset('css/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="icon" href="{{ URL::asset('/css/logo.ico') }}" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>


    <script src="{{asset('js/js/ie-support/html5.js')}}"></script>
    <script src="{{asset('js/js/ie-support/respond.js')}}"></script>

    <style>

        .dropdown:hover .dropdown-menu {
            display: block;
            font-size: 9px;
            font-family: "Roboto Slab", serif;
        }

        .base-header{
            background-image: url("/images/header-notScroll.png");
            background-repeat: no-repeat;
            background-position: center;
            background-color: rgba(0, 0, 0, 0);
            /*position: fixed;*/
            width: 100%;
            height: 250px;
        }
        .base-header.h-shadow{
            box-shadow: rgba(52, 144, 220, 0.51) 0px 10px 25px 10px;
            background-color: rgba(52, 140, 220, 0.45);
        }

        body{
            background-color: #e2ebf4;
            font-family:"Roboto Slab", serif;
        }

        .btn-primary-outline,.btn-primary-outline:hover {
            background-color: transparent;
            border: 2px solid;
            border-color: #538cde;
            padding: 0.2rem 0.5rem;
            color: white;
            box-shadow: none;
            border-radius: 0rem;
        }

        .brand{
            padding-left: 25px;
        }

        .company{
            color: white;
            font-size: 1rem;
        }

        .slogan{
            color: #538cde;
            font-size: 0.95rem;
            text-align: justify;

        }

        .slogan:after {
            content: "";
            display: inline-flex;
            width: 100%;
        }

        .main-navigation .menu .menu-item a {
            padding: 5px 0;
            display: block;
            text-decoration: none;
            color: white;
            font-size: 14px;
            position: relative;
            border-left: 1px solid transparent;
            -webkit-transition: .2s ease;
            transition: .2s ease;
            content: "styl";
        }

        .sign-hide{
            display: none;
        }

        .footer-title{
            color:black;
            font-size: 14px;
            font-weight: bold;
        }

        .logo-icon {
            height: 160px;
            padding-bottom: 30px !important;
            margin-left: 15px;
            float: left;
        }

        .content{
            /*padding-top: 110px;*/
            margin-top: -100px;
        }



        .content-container   {
            padding: 50px 0px;
        }

        .bg-content {
            background-image: url("/images/bg2.png");
        }



        .carousel-inner svg {
            position: absolute;
            top: 0;
            left: 0;
        }



        .site-footer {
            position: relative;
            padding: 0px;
        }
        .site-footer svg{
            position: absolute;
            top: 0;
            left: 0;
        }


        @media(max-width: 768px){
            .signup{
                display:none
            }
            .sign-hide{
                display: block;
            }

        }

        @media (max-width: 400px) {
            .company{
                margin-top: 10px;
                font-size: 10px;
            }
            .slogan{
                font-size: 10px;
            }

            .main-navigation .menu .menu-item a{
                color: blue;
            }

            .content-container {
                padding: 20px 0px;
            }


        }







    </style>

</head>

<body>
<div id="site-content">

    <header class="site-header">
        <div class="base-header {{--h-shadow--}}">
            <div class="container pl-0" id="app">
                <div class="col-12 justify-content-center">
                    <a href="{{ url('/') }}">
                    <img src="images/logo-footer.png" alt="Site title" class="logo-icon branding ">
                    </a>
                    <div class="row pt-2 ">
                        <div class="col-12 pull-right signup">
                            <div class="pull-right">
                                @if (Route::has('login'))
                                    @auth
                                        @if(Auth::user()->role == 'client')
                                            @if(empty(Auth::user()->clientDetails))
                                                <a class="btn btn-primary-outline "  href="{{ url('/client/details/create') }}"> Home </a>
                                            @else
                                                <a class="btn btn-primary-outline " href="{{ url('/client/details') }}"> Home </a>
                                            @endif
                                        @elseif((Auth::user()->role == 'admin'))
                                            <a class="btn btn-primary-outline "href="{{ url('/admin') }}"> Home </a>
                                        @elseif((Auth::user()->role == 'affiliate'))
                                            <a class="btn btn-primary-outline " href="{{ url('/affiliate') }}"> Home </a>
                                        @elseif((Auth::user()->role == 'receptionist'))
                                            <a class="btn btn-primary-outline " href="{{ url('/receptionist/message') }}"> Home </a>
                                        @else
                                            <a class="btn btn-primary-outline " href="{{ url('/owner') }}"> Home </a>
                                        @endif
                                    @else
                                        <a class="btn btn-primary-outline " class="btn btn-primary-outline " href="{{ route('login') }}"> SIGN IN </a>

                                        @if (Route::has('register'))
                                            <a class="btn btn-primary-outline registration" class="btn btn-primary-outline " href="{{ route('register') }}"> REGISTRATION </a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="brand pull-left">
                            <div class="company">PRUDENT CREDIT SOLUTION</div>
                            <div class="slogan">we rectify your credit history</div>
                        </div>
                        <div class="col-12">
                            <nav class="main-navigation mr-0 pull-left">
                                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                                <ul class="menu">

                                    <li class="menu-item"><a href="{{route('whoWeAre')}}">Who We Are</a></li>
                                    <li class="menu-item"><a href="{{route('howItWorks')}}">How it works</a></li>
                                    <li class="menu-item"><a href="{{route('credit.education')}}">Education center</a></li>

                                    @if (Route::has('login'))
                                        @auth
                                            @if(Auth::user()->role == 'client')
                                                @if(empty(Auth::user()->clientDetails))
                                                    <li class="menu-item sign-hide"> <a href="{{ url('/client/details/create') }}"> Home </a></li>
                                                @else
                                                    <li class="menu-item sign-hide"><a class="sign-hide" href="{{ url('/client/details') }}"> Home </a></li>
                                                @endif
                                            @elseif((Auth::user()->role == 'admin'))
                                                <li class="menu-item sign-hide"><a class="sign-hide"href="{{ url('/admin') }}"> Home </a></li>
                                            @elseif((Auth::user()->role == 'affiliate'))
                                                <li class="menu-item sign-hide"> <a class="sign-hide" href="{{ url('/affiliate') }}"> Home </a></li>
                                            @elseif((Auth::user()->role == 'receptionist'))
                                                <li class="menu-item sign-hide"><a class="sign-hide" href="{{ url('/receptionist/message') }}"> Home </a></li>
                                            @else
                                                <li class="menu-item sign-hide"><a class="sign-hide" href="{{ url('/owner') }}"> Home </a></li>
                                            @endif
                                        @else
                                            <li class="menu-item sign-hide"><a class="sign-hide" class="btn btn-primary-outline " href="{{ route('login') }}"> SIGN IN </a></li>

                                            @if (Route::has('register'))
                                                <li class="menu-item sign-hide"> <a class="sign-hide" class="btn btn-primary-outline " href="{{ route('register') }}"> REGISTRATION </a></li>

                                                {{--                                          <a href="{{ route('register') }}" class="dropdown-toggle ml-5 btn btn-primary-outline" data-toggle="dropdown">Registration</a>--}}
                                                {{--                                          <ul id="products-menu" class="dropdown-menu clearfix" role="menu">--}}
                                                {{--                                              <li><a href="{{ route('register') }}">SIGN UP AS CLIENT</a></li>--}}
                                                {{--                                              <li><a href="{{route('register.Affiliate')}}">SIGN UP AS AFFILIATE</a></li>--}}

                                                {{--                                          </ul>--}}
                                            @endif
                                        @endauth
                                    @endif


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .bottom-header -->
    </header> <!-- .site-header -->
    @include('helpers/flash')
    <main class="content">

        <div class="page-content">

            <div class="light-section">
                <div class="container content-container bg-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <!-- .content -->
    <footer class="site-footer">
        <svg height="100%" width="100%">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" style="stop-color:rgb(100, 164, 249);stop-opacity:1" />
                    <stop offset="5%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.9" />
                    <stop offset="10%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.8" />
                    <stop offset="15%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.7" />
                    <stop offset="20%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.6" />
                    <stop offset="25%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.50" />
                    <stop offset="35%" style="stop-color:rgb(100, 164, 249);stop-opacity:0.25" />
                    <stop offset="45%" style="stop-color:rgb(100, 164, 249);stop-opacity:0" />
                    <stop offset="100%" style="stop-color:rgb(100, 164, 249);stop-opacity:0" />
                </linearGradient>
            </defs>
            <rect  width="100%" height="100%" y="0" x="0" fill="url(#grad1)" />
        </svg>
        <div class="container content-container">

            <div class="row m-1">
                <div class="col-md-8 m-0 pl-3">
                    <div class="col-md-3 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title"> HOW WE ARE</span></div>
                        <div class="row"><a href="{{route('whoWeAre')}}">About us</a></div>
                        <div class="row"><a href="">Facebook</a></div>
                        <div class="row"><a href="">Twitter</a></div>
                        <div class="row"><a href="">Affiliates</a></div>
                        <div class="row"><a href="">Careers</a></div>
                        <div class="row"><a href="">Newsroom</a></div>
                        <div class="row"><a href="{{route('contact')}}">Contact us</a></div>
                    </div>
                    <div class="col-md-4 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title">HOW IT WORKS</span></div>
                        <div class="row"><a href="">Credit Repair Process</a></div>
                        <div class="row"><a href="">What You Get</a></div>
                        <div class="row"><a href="{{route('faqs')}}">Frequently Asked Questions</a></div>
                        <div class="row"><a href="{{route('pravicy')}}">Privacy Policy</a></div>
                        <div class="row"><a href="">Text Message Terms</a></div>
                        <div class="row"><a href="">Terms Of Use</a></div>
                    </div>
                    <div class="col-md-3 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title">EDUCATION</span></div>
                        <div class="row"><a href="">CreditRepair.com Blog </a></div>
                        <div class="row"><a href="">Credit Improvement</a></div>
                        <div class="row"><a href="">Debt Solution</a></div>
                        <div class="row"><a href="">Identity Theft</a></div>
                        <div class="row"><a href="">Loon Center</a></div>
                        <div class="row"><a href="">Saving Center</a></div>
                        <div class="row"><a href="">Score Estimator </a></div>
                    </div>
                    <div class="col-md-2 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title">FIND US</span></div>
                        <div class="social-links">
                            <div class="row  pt-2"><a href=""><i class="fa fa-facebook"></i></a></div>
                            <div class="row pt-2"><a href=""><i class="fa fa-twitter"></i></a></div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 align-right">
                </div>
            </div>

        </div>
    </footer> <!-- .site-footer -->

</div> <!-- #site-content -->

<script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/js/plugins.js')}}"></script>
<script src="{{asset('js/js/app.js')}}"></script>

<script>


    $(document).ready(function(){
        //    Slider Start
        $('.carousel').carousel()
        // // Slider End


        $('.circle').on('click mouseover', function(){
            var className = (this).className;
            var show = className.replace('circle ', '');
            console.log(show);

            $('.step').css('display','none');
            $('.step-'+show).css('display','block');
        })
    })
</script>

</body>

</html>

