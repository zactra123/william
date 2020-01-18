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


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>


    <script src="{{asset('js/js/ie-support/html5.js')}}"></script>
    <script src="{{asset('js/js/ie-support/respond.js')}}"></script>

    <style>
        .up-color{
            background-color: #0c71c3;

            /*#33cccc;*/
            /*#3366ff*/
            /*#0c71c3;*/
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            font-size: 9px;
            font-family: "Roboto Slab", serif;
        }

        .registration{
            text-align: center;
        }
        body{
            font-family:"Roboto Slab", serif; ;
        }

    </style>

</head>

<body>
<div id="site-content">

    <header class="site-header">
        <div class="bottom-header">
            <div class="container pl-0">

                <a href="{{ url('/') }}" class="branding pull-left">
                    <img src="images/logo-icon.png" alt="Site title" class="logo-icon">
                    <h1 class="site-title">Better <span>Credit</span></h1>
                    <h2 class="site-description">Tagline goes here</h2>
                </a> <!-- #branding -->
                <nav class="main-navigation pull-right">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="">WHAT WE DO</a></li>
                        <li class="menu-item"><a href="">HOW IT WORKS</a></li>
                        <li class="menu-item"><a href="{{route('credit.education')}}">CREDIT EDUCTION</a></li>
                        <li class="menu-item"><a href="">FREE CREDIT REPAIR</a></li>
                        <li class="menu-item"><a href="{{route('faqs')}}">FAQs</a></li>
                        <li class="menu-item"><a href="{{route('whoWeAre')}}">WHO WE ARE</a></li>
                        <li class="menu-item"><a href="">CREDIT RESOURCES</a></li>
                        <li class="menu-item"><a href="">CONTACT US</a></li>

                        @if (Route::has('login'))
                            @auth

                                @if(Auth::user()->role == 'client')
                                    @if(empty(Auth::user()->clientDetails))
                                        <li class="menu-item"><a href="{{ url('/client/details/create') }}"><i class="fa fa-user"></i>HOME</a></li>
                                    @else
                                        <li class="menu-item"><a href="{{ url('/client/details') }}"><i class="fa fa-user"></i>HOME</a></li>
                                    @endif
                                @elseif((Auth::user()->role == 'admin'))
                                    <li class="menu-item"><a href="{{ url('/admin') }}"><i class="fa fa-user"></i>HOME</a></li>
                                @elseif((Auth::user()->role == 'affiliate'))
                                    <li class="menu-item"><a href="{{ url('/affiliate') }}"><i class="fa fa-user"></i>HOME</a></li>
                                @else
                                    <li class="menu-item"> <a href="{{ url('/owner') }}"><i class="fa fa-user"></i>HOME</a></li>
                                @endif
                            @else
                                <li class="menu-item"><a href="{{ route('login') }}"><i class="fa fa-lock"></i> LOGIN</a></li>

                                @if (Route::has('register'))
                                    {{--<li class="menu-item"> <a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a></li>--}}

                                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> REGISTRATIONS</a>
                                        <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">
                                            <li><a href="{{ route('register') }}">REGISTER AS CLIENT</a></li>
                                            <li><a href="{{route('register.Affiliate')}}">REGISTER AS AFFILIATE</a></li>

                                        </ul>
                                    </li>


                                @endif
                            @endauth
                        @endif


                    </ul>

                </nav> <!-- .main-navigation -->
            </div> <!-- .container -->
        </div> <!-- .bottom-header -->
    </header> <!-- .site-header -->
    @include('helpers/flash')
    <main class="content">


            @yield('content')



    </main>

     <!-- .content -->

    <footer class="site-footer wow fadeInUp">
        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <div class=" branding">
                        <img src="{{asset('images/logo-footer.png')}}" alt="Site title" class="logo-icon">
                        <h1 class="site-title"><a href="#">Company <span>Name</span></a></h1>
                        <h2 class="site-description">Tagline goes here</h2>
                    </div> <!-- .branding -->

                    <p class="copy">Copyright 2014 Company name. designed by Themezy. All rights reserved</p>
                </div>

                <div class="col-md-6 align-right">

                    <nav class="footer-navigation">
                        <a href="#">News</a>
                        <a href="#">About us</a>
                        <a href="#">Services</a>
                        <a href="#">Contact</a>
                    </nav> <!-- .footer-navigation -->

                    <div class="social-links">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                    </div> <!-- .social-links -->

                </div>
            </div>

        </div>
    </footer> <!-- .site-footer -->

</div> <!-- #site-content -->

<script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/js/plugins.js')}}"></script>
<script src="{{asset('js/js/app.js')}}"></script>

</body>

</html>