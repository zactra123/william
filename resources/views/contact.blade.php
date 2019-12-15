<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Contact</title>
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

        <div class="bottom-header">
            <div class="container">
                <a href="{{ url('/') }}" class="branding pull-left">
                    <img src="images/logo-icon.png" alt="Site title" class="logo-icon">
                    <h1 class="site-title">Better <span>Credit</span></h1>
                    <h2 class="site-description">Tagline goes here</h2>
                </a> <!-- #branding -->

                <nav class="main-navigation pull-right">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="">News</a></li>
                        <li class="menu-item"><a href="{{route('about-us')}}">About Us</a></li>
                        <li class="menu-item"><a href="">Services</a></li>
                        <li class="menu-item"><a href="{{route('contacts')}}">Contact</a></li>

                        @if (Route::has('login'))
                            @auth

                                @if(Auth::user()->role == 'client')
                                    @if(empty(Auth::user()->clientDetails))
                                        <li class="menu-item"><a href="{{ url('/client/details/create') }}"><i class="fa fa-user"></i>Home</a></li>
                                    @else
                                        <li class="menu-item"><a href="{{ url('/client/details') }}"><i class="fa fa-user"></i>Home</a></li>
                                    @endif
                                @elseif((Auth::user()->role == 'admin'))

                                    <li class="menu-item"><a href="{{ url('/admin') }}"><i class="fa fa-user"></i>Home</a></li>
                                @else

                                    <li class="menu-item"> <a href="{{ url('/owner') }}"><i class="fa fa-user"></i>Home</a></li>
                                @endif
                            @else
                                <li class="menu-item"><a href="{{ route('login') }}"><i class="fa fa-lock"></i>Login</a></li>

                                @if (Route::has('register'))
                                    <li class="menu-item"> <a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a></li>
                                    @endif
                                    @endauth
                                    @endif
                        </li>
                    </ul>
                </nav> <!-- .main-navigation -->
            </div> <!-- .container -->
        </div> <!-- .bottom-header -->
    </header> <!-- .site-header -->

    <main class="content">
        <div class="breadcrumbs">
            <div class="container">
                <a href="index.html">Home</a> &rarr;
                <a href="#">Contact</a>
            </div>
        </div>

        <div class="page-content">


            <div class="fullwidth-block">
                <div class="container">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3023.1093732611434!2d-73.99664419999999!3d40.7376188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bd6429cbad%3A0xabf8edfb01e21691!2s534+Avenue+of+the+Americas%2C+New+York%2C+NY+10011%2C+Amerika+Serikat!5e0!3m2!1sid!2sid!4v1410801748284" width="600" height="450" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
            </div>

            <div class="fullwidth-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="wow fadeInLeft">Addresss</h1>
                            <address class="wow fadeInLeft">
                                <p>Company Name</p>
                                <p>4235 Poplar Street,  Compton, CA 90220</p>
                                <p>Phone: +1 932 349 313 <br>info@companyname.com</p>
                            </address>
                        </div>
                        <div class="col-md-9">
                            <h1 class="wow fadeInRight">Contact Form</h1>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="wow fadeInRight"><input type="text" placeholder="Your name..."></p>
                                        <p class="wow fadeInRight"><input type="text" placeholder="Company Name..."></p>
                                        <p class="wow fadeInRight"><input type="email" placeholder="Email..."></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="wow fadeInRight"><textarea name="" id=""></textarea></p>
                                        <input type="submit" class="button pull-right wow fadeInRight" value="Send Messages">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- .inner-content -->
    </main> <!-- .content -->

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