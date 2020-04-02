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
            position: fixed;
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
            padding-top: 110px;
        }

        .dark-section {
            background-color: #13317f;
            position: relative;
        }

        .content-container   {
            padding: 50px 0px;
        }

        .bg-content {
            background-image: url("/images/bg2.png");
        }
        .third-content {
            background-image: url("/images/bg-40.png");
            background-repeat: no-repeat;
            background-position: center;
            /*position: fixed;*/
            width: 100%;
            height: 250px;
        }


        .carousel-inner svg {
            position: absolute;
            top: 0;
            left: 0;
        }

        .square {
            position: relative;
            text-align: center;
            width: 80vw;
            height: 17.5vw;
            margin: auto;
            margin-bottom: 2.5vw;
        }



        .hide {
            background-color: transparent;
            height: 50%;
            width:12.5%;
            max-height: 100vw;
            max-width: 100vw;
            float: left;
            padding: 0;
            margin: auto;
        }

        .circle {
            position: relative;
            background-color: #e2ebf4;
            height: 50%;
            width: 12.5%;
            border-radius: 50%;
            border-style: solid;
            border-color: #8bc3fe;
            max-height: 100vw;
            max-width: 100vw;
            font-size: 12px;
            color: black;
            line-height: 100%;
            text-align: center;
            float: left;
            padding: 2.5%;
            margin: auto;
        }
        .circle-arrow{
            position: absolute;
            top: 88%;
            left: 83%;
            width: 35%;
        }
        .circle-arrow-1{
            position: absolute;
            bottom: 80%;
            left: 89%;
            width: 35%;
        }

        .arrow-up {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 1.5vw 12vw 1.5vw;
            border-color: transparent transparent white transparent;
            position: absolute;
            top: 105%;
            left: 28%;
        }
        .arrow-small {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0px 1vw 3vw 1vw;
            border-color: transparent transparent #ffffff transparent;
            position: absolute;
            top: 102%;
            left: 38%;
        }

        .step{
            display:none
        }

        .excall{
            margin-top: 3%;
            margin-left: 26%;
        }


        .card{
            margin-left: 12.5%;
            margin-right: 12.5%;
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
        .signup-chat{
            width: 95%;
            margin:2.5%;
        }
        .btn-dark-blue{
            color: #fff;
            background-color: #15178b;
            border-color: #15178b;
        }
        .including{
            font-size: 3.5rem;
            font-weight: bold;
            color: #15178b;
        }
        .work-more{
            content:"";
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 1rem;

        }
        .category {
            width: 75%;
            height: 80%;
            color: #fff;
            font-size: 1rem;
            position: absolute;
            top: 0;
        }

        .numberOk{
            font-size: 4rem;
        }

        .search-box{
            background-color: #13317f;
            border:3px solid #3490dc;
            width: 100%;
            height: 75px;
            position: relative;

        }
        .search-box-text{
            font-size: 0.9rem;
            color: #ffffff;
            margin-top:20px;
        }

        .btn-search-box{
            background-color: transparent;
            color: #ffffff;
        }
        @media(max-width: 768px){
            .signup{
                display:none
            }
            .sign-hide{
                display: block;
            }
            .circle-text{
                display: none;
            }
            .step-number{
                font-size: 6px;
                font-weight: bold;
            }
            .search-box {

                height: 200px;
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
            .square{
                width: 100vw;
                height: 26vw;
            }
            .arrow-up{
                border-width: 0px 1.5vw 17vw 1.5vw;

            }
            .feature{
                margin-left: 25%;
                margin-right: 25%;
            }
            .mediaChat{
                display: none;
            }
            .work-more{
                font-size: 3vw;

            }
            .including{

                font-size: 4vw;
                font-weight: bold;
                color: #15178b;
            }
            .content-container {
                padding: 20px 0px;
            }

            .category {
                background: #15178b;
                margin-left: 30px;
                text-align: center;
                font-size: 2vw;
                position: relative;
            }

        }

        @media (min-width: 992px) {
            .square {
                max-width: 960px;
                max-height: 250px;
            }
        }

        .text-block {
            position: absolute;
            bottom: 35%;
            right: 35%;
            background-color: transparent;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
        }

    </style>

</head>

<body>
<div id="site-content">

    <header class="site-header">
        <div class="base-header {{--h-shadow--}}">
          <div class="container pl-0" id="app">
              <div class="col-12 justify-content-center">
                <img src="images/logo-footer.png" alt="Site title" class="logo-icon branding ">
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
                                  <li class="menu-item"><a href="{{ url('/') }}">Home</a></li>
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
        @yield('content')
        <div class="page-content">
            <div class="dark-section">
                <div class="container slider-container">
                    <div id="base-carousel-indicator" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item img-overlay-wrap active ">
                                <img class="d-block w-100" src="/images/slider-1.jpg" alt="First slide">
                                <div class="text-block">
                                    <h4>Nature</h4>
                                    <p>What a beautiful sunrise</p>
                                </div>
                            </div>
                            <div class="carousel-item img-overlay-wrap">

                                <img class="d-block w-100" src="/images/slider-2.jpg" alt="Second slide">
                                <div class="text-block">
                                    <h4>Nature</h4>
                                    <p>What a beautiful sunrise</p>
                                </div>
                            </div>
                            <div class="carousel-item img-overlay-wrap">

                                <img class="d-block w-100" src="/images/slider-3.jpg" alt="Third slide">
                                <div class="text-block justify-content-end">
                                    <h4>Nature</h4>
                                    <p>What a beautiful sunrise</p>
                                </div>

                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 width="100%" height="100%"
                                 preserveAspectRatio="xMidYMid meet">
                                <defs>
                                    <linearGradient spreadMethod="pad" id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:rgb(19, 49, 127);stop-opacity:1;" />
                                        <stop offset="15%" style="stop-color:rgb(19, 49, 127);stop-opacity:0.7;" />
                                        <stop offset="30%" style="stop-color:rgb(19, 49, 127);stop-opacity:0.5;" />
                                        <stop offset="100" style="stop-color:rgb(19, 49, 127);stop-opacity:0;" />
                                    </linearGradient>
                                </defs>
                                <rect  width="100%" height="100%" y="0" x="0" fill="url(#gradient)"/>
                            </svg>
                        </div>
                        <a class="carousel-control-prev" href="#base-carousel-indicator" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#base-carousel-indicator" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="light-section">
                <div class="container content-container">
                    <div class="row">

                        <div class="col-md-12">
                                <h3> We work with all three major credit reporting agencies: Experian, Equifax, and
                                    TransUnion
                                </h3>
                                <p class="m-2">
                                    We work with credit bureaus and your creditors to challenge the inaccurate credit
                                    reporting that affects your credit score and financial fitness. We'll ensure your
                                    credit history reflects accurate information.
                                </p>
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-4">
                            <div class="feature excall">
                                <img src="images/p-3.png">

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-4">
                            <div class="feature excall">
                                <img src="images/p-2.png" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->

                        <div class="col-md-4">
                            <div class="feature excall">
                                <img src="images/p-4.png" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->


                        <div class="col-md-3 offset-md-3">
                            <div class="feature excall">
                                <a href="tel:1-855-855-9797" class="btn btn-primary">Call 1-855-855-9797</a>

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-6">
                            <div class="feature align-items-center mt-2">
                                <a href="" class="btn  btn-outline-dark align-content-center">SIGN UP ONLINE </a>

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->

                    </div> <!-- .row -->
                </div>
            </div>
            <div class="light-section ">
                <div class="search-box">
                    <div class="container ">
                        <div class="row">
                            <span class="search-box-text p-2" >
                                What to know more about credit repair
                            </span>

                            <form action="#" method="GET" role="search" class="search-box-text">
                                @csrf
                                <div class="input-group m-0 ">
                                    <input type="text" class="form-control rounded-0" name="search"
                                           placeholder="Type your key word">
                                    <span class="input-group-btn">

                                        <button type="submit" class="btn btn-search-box">
                                            SEARCH EDUCATION CENTER <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </button>
                                    </span>

                                </div>
                            </form>
                            <span class="search-box-text " >
                                <button type="submit" class="btn btn-search-box">
                                       CHAT WITH EXPERT <i class="fa  fa-comment-o" aria-hidden="true"></i>
                                </button>
                            </span>

                        </div>
                    </div>

                </div>

            </div>



            <div class="light-section">
                <div class="third-content">
                    {{--                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"--}}
                    {{--                         width="100%" height="100%"--}}
                    {{--                         preserveAspectRatio="xMidYMid meet">--}}
                    {{--                        <defs>--}}
                    {{--                            <linearGradient spreadMethod="pad" id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">--}}
                    {{--                                <stop offset="0%" style="stop-color:rgb(19, 49, 127);stop-opacity:1;" />--}}
                    {{--                                <stop offset="15%" style="stop-color:rgb(19, 49, 127);stop-opacity:0.7;" />--}}
                    {{--                                <stop offset="30%" style="stop-color:rgb(19, 49, 127);stop-opacity:0.5;" />--}}
                    {{--                                <stop offset="100" style="stop-color:rgb(19, 49, 127);stop-opacity:0;" />--}}
                    {{--                            </linearGradient>--}}
                    {{--                        </defs>--}}
                    {{--                        <rect  width="100%" height="100%" y="0" x="0" fill="url(#gradient)"/>--}}
                    {{--                    </svg>--}}

                    <div class="container content-container bg-content work-more">

                        <div class="row">
                            <div class="col-md-3 work-more">


                                <p class="">
                                    number of items corrected
                                    <span class="numberOk">40</span>
                                </p>
                            </div> <!-- .col-md-3 -->

                            <div class="col-md-3 ">
                                    <span class="including">
                                        Including
                                    </span>
                            </div> <!-- .col-md-3 -->
                            <div class="col-md-3">
                                <img class="w-100 mediaChat" src="/images/content.svg">
                                <div class="category">
                                    <ul class="pt-3">
                                        <li >Bankruptcies</li>
                                        <li >Foreclosure</li>
                                        <li >Repossession</li>
                                        <li >Judgments</li>
                                    </ul>

                                </div> <!-- .feature -->
                            </div> <!-- .col-md-3 -->
                            <div class="col-md-3 mediaChat">
                                <div class="align-items-center">
                                    <a href="" class="btn  btn-dark-blue signup-chat">SIGN UP TODAY </a>

                                </div> <!-- .feature -->
                                <div class="feature align-items-center">
                                    <a href="" class="btn  btn-primary signup-chat">CHAT WHITE EXPERT </a>

                                </div> <!-- .feature -->
                            </div> <!-- .col-md-3 -->

                        </div>
                    </div>

                </div>
            </div>

            <div class="light-section">
                <div class="container content-container bg-content">
                    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                        <!--Controls-->
{{--                        <div class="controls-top">--}}
{{--                            <a class="btn-floating" href="#multi-item-example" data-slide="prev">--}}
{{--                                <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>--}}
{{--                                <i class=" fa-chevron-circle-left"></i>--}}
{{--                            </a>--}}
{{--                            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i--}}
{{--                                    class="fas fa-chevron-right"></i></a>--}}
{{--                        </div>--}}
                        <!--/.Controls-->
                        <!--Indicators-->
{{--                        <ol class="carousel-indicators">--}}
{{--                            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>--}}
{{--                            <li data-target="#multi-item-example" data-slide-to="1"></li>--}}
{{--                            <li data-target="#multi-item-example" data-slide-to="2"></li>--}}
{{--                        </ol>--}}
                        <!--/.Indicators-->

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                </div>

            </div>

            <div class="light-section">
                <div class="container content-container">
                    <div class="square">
                        <div class="hide"></div>
                        <div class="circle 1">
                            <span class="step-number"> 1</span>
                            <p class="pt-2 circle-text">Registration</p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-1"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 3">
                            <span class="step-number">3</span>
                            <p class="pt-2 circle-text">Review &  Approval-</p>
                            <p class="pt-2 circle-text"> Contract </p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-3"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 5">
                            <span class="step-number">3</span>
                            <p class="pt-2 circle-text"> We Get To Work</p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-5"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="hide"></div>
                        <!--2nd -->

                        <div class="hide"></div>
                        <div class="hide"></div>
                        <div class="circle 2">
                            <span class="step-number">2</span>
                            <p class="pt-2 circle-text"> Auditing</p>
                            <img src="images/arrow1.png"  class="circle-arrow-1" >
                            <div class="arrow-small step step-2"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 4">
                            <span class="step-number">4</span>
                            <p class="pt-2 circle-text">Payment</p>
                            <img src="images/arrow1.png"  class="circle-arrow-1" >
                            <div class="arrow-small step step-4"></div>

                        </div>
                        <div class="hide"></div>
                        <div class="circle 6">
                            <span class="step-number">6</span>
                            <p class="pt-2 circle-text">Payment</p>
                            <p class="circle-text"> Disbursement</p>
                            <div class="arrow-small step step-6"></div>
                        </div>
                        <div class="red"></div>
                    </div>
                    <div class="card p-4  step step-1">
                        <p style="text-align: justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div class="card p-4 step step-2">
                        <p style="text-align: justify">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="card p-4  step step-3">
                        <p style="text-align: justify">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece
                            of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,
                            a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                            Latin words,
                        </p>
                    </div>
                    <div class="card p-4  step step-4">
                        <p style="text-align: justify">
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
                            also reproduced in their exact original form, accompanied by English versions from the 1914
                            translation by H. Rackham.
                        </p>
                    </div>
                    <div class="card p-4 step step-5">
                        <p style="text-align: justify">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable.
                        </p>
                    </div>
                    <div class="card p-4 step step-6">
                        <p style="text-align: justify">
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                            model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
                            purpose (injected humour and the like).
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- .content -->
    <footer class="site-footer">
        <svg height="auto" width="100%">
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
                        <div class="row"><a href="" target="_blank">Facebook</a></div>
                        <div class="row"><a href="" target="_blank">Twitter</a></div>
                        <div class="row"><a href="" >Affiliates</a></div>
                        <div class="row"><a href="" >Careers</a></div>
                        <div class="row"><a href="" >Newsroom</a></div>
                        <div class="row"><a href="{{route('contact')}}">Contact us</a></div>
                    </div>
                    <div class="col-md-4 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title">HOW IT WORKS</span></div>
                        <div class="row"><a href="" target="_blank">Credit Repair Process</a></div>
                        <div class="row"><a href="{{route('credit.free.repair')}}">Free Credit Repair</a></div>
                        <div class="row"><a href="{{route('credit.repair')}}">Credit Resources</a></div>
                        <div class="row"><a href="" target="_blank">What You Get</a></div>
                        <div class="row"><a href="{{route('faqs')}}">Frequently Asked Questions</a></div>
                        <div class="row"><a href="{{route('pravicy')}}">Privacy Policy</a></div>
                        <div class="row"><a href="">Text Message Terms</a></div>
                        <div class="row"><a href="">Terms Of Use</a></div>
                    </div>
                    <div class="col-md-3 m-0 pl-3">
                        <div class="row pb-5"><span class="footer-title">EDUCATION</span></div>
                        <div class="row"><a href="" target="_blank">CreditRepair.com Blog </a></div>
                        <div class="row"><a href="">Credit Improvement</a></div>
                        <div class="row"><a href="">Debt Solution</a></div>
                        <div class="row"><a href="https://www.consumer.ftc.gov/features/feature-0014-identity-theft" target="_blank">Identity Theft</a></div>
                        <div class="row"><a href="">Loon Center</a></div>
                        <div class="row"><a href="">Saving Center</a></div>
                        <div class="row"><a href="https://www.myfico.com/fico-credit-score-estimator/estimator" target="_blank">Score Estimator </a></div>
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

