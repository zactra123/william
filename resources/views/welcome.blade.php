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

    <link rel="icon" href="{{ URL::asset('/css/logo.ico') }}" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

            <a href="{{ url('/') }}" class="branding pull-left m-0 pl-4">
                <img src="images/logo-icon.png" alt="Site title" class="logo-icon">

            </a>
            <nav class="main-navigation pull-right">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item"><a href="{{route('howItWorks')}}">HOW IT WORKS</a></li>
                    <li class="menu-item"><a href="{{route('credit.education')}}">CREDIT EDUCTION</a></li>
                    <li class="menu-item"><a href="{{route('howItWorks')}}">FREE CREDIT REPAIR</a></li>
                    <li class="menu-item"><a href="{{route('faqs')}}">FAQs</a></li>
                    <li class="menu-item"><a href="{{route('whoWeAre')}}">WHO WE ARE</a></li>
                    <li class="menu-item"><a href="{{route('credit.repair')}}">CREDIT RESOURCES</a></li>
                    <li class="menu-item"><a href="{{route('contact')}}">CONTACT US</a></li>

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

            </nav>
{{--            <div class="container m-0">--}}

{{-- <!-- .main-navigation -->--}}
{{--            </div> <!-- .container -->--}}
        </div> <!-- .bottom-header -->
    </header> <!-- .site-header -->

    <main class="content">


        <div class="slider">
            <ul class="slides">
                @foreach($pageContentUp as $contentUp)
                <li>
                    <div class="container">
                        {{--<img src="dummy/server.jpg" alt="">--}}
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

        <div class="fullwidth-block pricing-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-6 col-us">
                        <div class="pricing-table wow fadeInLeft" data-wow-delay=".2s">
                            <div class="pricing-title">
                                <h2 class="pricing-type">Welcome to BetterCreditFix.com! </h2>
                                <p class="Bold">We help you get your credit score back into shape and guide you on the path to
                                    keeping it healthy. We’ll help you:</p>
                            </div>

                            <ul class="list-fa">
                                <li><i class="fa fa-check"></i> •	Analyze your finances and credit score to identify
                                    areas for improvement</li>
                                <li><i class="fa fa-check"></i> •	Highlight errors on your credit report and make a
                                    plan to dispute them</li>
                                <li><i class="fa fa-check"></i> •	Identify bad debts that have opportunities to
                                    negotiate for lower payments</li>
                                <li><i class="fa fa-check"></i> •	Help you build good habits to keep your credit score
                                    in tip top shape!</li>

                            </ul>
                        </div> <!-- .pricing-table -->
                    </div>

                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .pricing-section -->


    </main> <!-- .content -->

    <footer class="site-footer wow fadeInUp">
        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <div class=" branding">
                        <img src="images/logo-footer.png" alt="Site title" class="logo-icon" width="200px">

                    </div> <!-- .branding -->

                    <p class="copy">Copyright 2020</p>
                </div>

                <div class="col-md-6 align-right">





                    <nav class="footer-navigation">
                        <a href="{{route('contact')}}">CONTACT US</a>
                        <a href="{{route('whoWeAre')}}">WHO WE ARE</a>
                        <a href="{{route('faqs')}}">FAQs</a>
                        <a href="{{route('pravicy')}}">PRIVACY</a>

                    </nav> <!-- .footer-navigation -->



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
