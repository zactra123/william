<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Homepage</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="css/css/animate.css">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="js/js/ie-support/html5.js"></script>
    <script src="js/js/ie-support/respond.js"></script>
    <![endif]-->

</head>

<body>

<div id="site-content">

    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <a href="tel:80049123441">Call Us: (800) 49123441</a>

                <nav class="member-navigation pull-right">

                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth

                                @if(Auth::user()->role == 'client')
                                    @if(empty(Auth::user()->clientDetails))
                                        <a href="{{ url('/client/details/create') }}"><i class="fa fa-user"></i>Home</a>
                                    @else
                                        <a href="{{ url('/client/details') }}"><i class="fa fa-user"></i>Home</a>
                                    @endif
                                @elseif((Auth::user()->role == 'admin'))

                                    <a href="{{ url('/admin') }}"><i class="fa fa-user"></i>Home</a>
                                @else

                                    <a href="{{ url('/owner') }}"><i class="fa fa-user"></i>Home</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}"><i class="fa fa-lock"></i>Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    {{--<a href="#"><i class="fa fa-user"></i> Register</a>--}}
                    {{--<a href="#"><i class="fa fa-lock"></i> Login</a>--}}
                </nav> <!-- .member-navigation -->
            </div> <!-- .container -->
        </div> <!-- .top-header -->

        <div class="bottom-header">
            <div class="container">
                <a href="{{ url('/') }}" class="branding pull-left">
                    <img src="images/logo-icon.png" alt="Site title" class="logo-icon">
                    <h1 class="site-title">Company <span>Name</span></h1>
                    <h2 class="site-description">Tagline goes here</h2>
                </a> <!-- #branding -->

                <nav class="main-navigation pull-right">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="">News</a></li>
                        <li class="menu-item"><a href="{{route('about-us')}}">About Us</a></li>
                        <li class="menu-item"><a href="">Services</a></li>
                        <li class="menu-item"><a href="{{route('contacts')}}">Contact</a></li>
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
                        <img src="images/logo-footer.png" alt="Site title" class="logo-icon">
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

<script src="js/js/jquery-1.11.1.min.js"></script>
<script src="js/js/plugins.js"></script>
<script src="js/js/app.js"></script>

</body>

</html>