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
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>
    <!--[if lt IE 9]>
    <script src="js/js/ie-support/html5.js"></script>
    <script src="js/js/ie-support/respond.js"></script>

    <![endif]-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        body{
            font-family:"Roboto Slab", serif; ;
        }

    </style>

</head>

<body>
<div id="site-content">

    <header class="site-header">
        <div class="bottom-header">
            <div class="container">

                <a href="{{ url('/') }}" class="branding pull-left">
                    <img src="images/logo-icon.png" alt="Site title" style="width: 100px" class="logo-icon">

                </a> <!-- #branding -->
                <nav class="main-navigation pull-right">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="{{route('howItWorks')}}">HOW IT WORKS</a></li>
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
                                @elseif((Auth::user()->role == 'receptionist'))
                                        <li class="menu-item"><a href="{{ url('/receptionist/message') }}"><i class="fa fa-user"></i>HOME</a></li>
                                 @else
                                         <li class="menu-item"> <a href="{{ url('/owner') }}"><i class="fa fa-user"></i>HOME</a></li>
                                 @endif
                        @else
                                        <li class="menu-item"><a href="{{ route('login') }}"><i class="fa fa-lock"></i> LOGIN</a></li>

                                        @if (Route::has('register'))
                                            {{--<li class="menu-item"> <a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a></li>--}}

                                    <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> REGISTRATIONS</a>
                                        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
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

    <main class="content">
        <div class="slider">
            <ul class="slides">
                @foreach($pageContentUp as $contentUp)
                <li>
                    <div class="container">
                        <img src="dummy/server.jpg" alt="">
                        <div class="slide-caption">
                            <h2 class="slide-title">{{$contentUp->title}}</h2>
                            {{--<small class="slide-subtitle">Nemo enom ipsam voluptatem voluptas</small>--}}
                            <div class="slide-summary">
                                <?php echo htmlspecialchars_decode(htmlspecialchars($contentUp->sub_content, ENT_QUOTES));  ?>

                            </div>
                            <a href="{{route('more.information', $contentUp->url )}}" class="button up-color">Read More</a>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul> <!-- .slides -->
        </div> <!-- .slider -->

        <div class="fullwidth-block feature-section">
            <div class="container">

                <div class="row">
                    @foreach($pageContentDown as $contentDown)
                    <div class="col-md-3">
                        <div class="feature wow fadeInUp" style="height: 550px">
                            <div class="feature-title">
                                {{--<i class="icon-customer-service"></i>--}}
                                <h2 class="title">{{$contentDown->title}}</h2>
                                {{--<small class="subtitle">Nulla eros odio dolor</small>--}}
                            </div>
                            <div class="feature-summary">
                              <?php echo htmlspecialchars_decode(htmlspecialchars($contentDown->sub_content, ENT_QUOTES));  ?>

                            </div>
                            <a href="{{route('more.information', $contentDown->url )}}" class="button">More info</a>
                        </div> <!-- .feature -->
                    </div> <!-- .col-md-4 -->
                    @endforeach
                </div> <!-- .row -->

            </div> <!-- .container -->
        </div> <!-- .feature-section -->

        {{--<div class="fullwidth-block pricing-section">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3 col-xs-6 col-us">--}}
                        {{--<div class="pricing-table wow fadeInLeft" data-wow-delay=".2s">--}}
                            {{--<div class="pricing-title">--}}
                                {{--<h2 class="pricing-type">Basic</h2>--}}
                                {{--<small>For small bussiness</small>--}}
                            {{--</div>--}}
                            {{--<div class="price-tag">--}}
                                {{--<strong>$9.99</strong>--}}
                                {{--<small>/Per month</small>--}}
                            {{--</div>--}}
                            {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
                            {{--<ul class="list-fa">--}}
                                {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 GB disc space</li>--}}
                                {{--<li><i class="fa fa-check"></i> 10 email accounts</li>--}}
                                {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
                                {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
                            {{--</ul>--}}
                        {{--</div> <!-- .pricing-table -->--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-xs-6 col-us">--}}
                        {{--<div class="pricing-table wow fadeInLeft">--}}
                            {{--<div class="pricing-title">--}}
                                {{--<h2 class="pricing-type">Standard</h2>--}}
                                {{--<small>For medium bussiness</small>--}}
                            {{--</div>--}}
                            {{--<div class="price-tag">--}}
                                {{--<strong>$59.99</strong>--}}
                                {{--<small>/Per month</small>--}}
                            {{--</div>--}}
                            {{--<p class="pricing-desc">Etiam interdum nulla eros odio scelerisque magna</p>--}}
                            {{--<ul class="list-fa">--}}
                                {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
                                {{--<li><i class="fa fa-check"></i> 100 GB disc space</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 email accounts</li>--}}
                                {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
                                {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
                            {{--</ul>--}}
                        {{--</div> <!-- .pricing-table -->--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-xs-6 col-us">--}}
                        {{--<div class="pricing-table wow fadeInRight">--}}
                            {{--<div class="pricing-title">--}}
                                {{--<h2 class="pricing-type">Advanced</h2>--}}
                                {{--<small>For large bussiness</small>--}}
                            {{--</div>--}}
                            {{--<div class="price-tag">--}}
                                {{--<strong>$99.99</strong>--}}
                                {{--<small>/Per month</small>--}}
                            {{--</div>--}}
                            {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
                            {{--<ul class="list-fa">--}}
                                {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
                                {{--<li><i class="fa fa-check"></i> 250 GB disc space</li>--}}
                                {{--<li><i class="fa fa-check"></i> 100 email accounts</li>--}}
                                {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
                                {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
                            {{--</ul>--}}
                        {{--</div> <!-- .pricing-table -->--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-xs-6 col-us">--}}
                        {{--<div class="pricing-table wow fadeInRight" data-wow-delay=".2s">--}}
                            {{--<div class="pricing-title">--}}
                                {{--<h2 class="pricing-type">Professional</h2>--}}
                                {{--<small>For corporate bussiness</small>--}}
                            {{--</div>--}}
                            {{--<div class="price-tag">--}}
                                {{--<strong>$299.99</strong>--}}
                                {{--<small>/Per month</small>--}}
                            {{--</div>--}}
                            {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
                            {{--<ul class="list-fa">--}}
                                {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
                                {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
                                {{--<li><i class="fa fa-check"></i> 500 GB disc space</li>--}}
                                {{--<li><i class="fa fa-check"></i> 100 email accounts</li>--}}
                                {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
                                {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
                            {{--</ul>--}}
                        {{--</div> <!-- .pricing-table -->--}}
                    {{--</div>--}}
                {{--</div> <!-- .row -->--}}
            {{--</div> <!-- .container -->--}}
        {{--</div> <!-- .pricing-section -->--}}

        {{--<div class="fullwidth-block about-section">--}}

            {{--<div class="container">--}}

                {{--<div class="row">--}}

                    {{--<div class="col-md-6 wow fadeInUp">--}}
                        {{--<h2>Safe &amp; high-speed hosting</h2>--}}
                        {{--<p class="leading">Pallentesque nibh pharetra urna elementum viverra elit duis faucibus augue tempor eleifend</p>--}}
                        {{--<p>Tiramisu cotton candy caramels cake biscuit jelly-o chupa chups chocolate. Tootsie roll lollipop topping. Macaroon ice cream cookie powder dessert gingerbread oat cake. Pudding cake powder icing tart sugar plum sesame snaps.</p>--}}
                        {{--<p>Fruitcake tootsie roll candy. Sweet roll toffee donut. Chocolate cake gummi bears fruitcake cookie biscuit cotton candy marshmallow.</p>--}}
                        {{--<p>Liquorice macaroon marshmallow macaroon cheesecake sweet soufflé. Cheesecake cookie dessert jelly-o. Fruitcake tart topping.</p>--}}

                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<h2 class="wow fadeInRight">What can you expect?</h2>--}}
                        {{--<hr class="separator">--}}
                        {{--<ul class="feature-list">--}}
                            {{--<li class="wow fadeInRight">--}}
                                {{--<i class="icon-money-globe"></i>--}}
                                {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
                                {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
                            {{--</li>--}}
                            {{--<li class="wow fadeInRight">--}}
                                {{--<i class="icon-server-lock"></i>--}}
                                {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
                                {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
                            {{--</li>--}}
                            {{--<li class="wow fadeInRight">--}}
                                {{--<i class="icon-person-time"></i>--}}
                                {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
                                {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                {{--</div> <!-- .row -->--}}

            {{--</div> <!-- .container -->--}}
        {{--</div> <!-- .fullwidth-block -->--}}
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