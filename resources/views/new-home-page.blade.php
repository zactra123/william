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

        .registration{
            text-align: center;
        }
        .bottom-header{
            background-image: url("/images/header-notScroll.png"), url("/images/bg2.png");
            background-size: auto, 3000px;
            background-repeat: round;
            background-color: #e0efff;
            height:  250px;
            width: 100%;
        }

        body{
            background-image: url("/images/bg2.png");
            /*background-size: 1000px;*/
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
        h3{
            color: white;
        }
        .slogan{
            color: #538cde;
            font-size: 16px;
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

        .title-image{
            background-image: url("/images/bg-401.png");
            background-repeat: no-repeat;
            background-size: 100% 30%;
        }
        .footer-title{
            color:black;
            font-size: 14px;
            font-weight: bold;
        }
        .chat-search{
            background-color: #000080;
            height: 50px;
        }

        .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            font-size: 14px;
            color: #fff;
            line-height: 200px;
            text-align: center;
            background: darkgrey;

        }
        .circle-v {
            background-image: url("/images/arrow.png");
            width: 150px;
            height: 150px;
            border-radius: 50%;
            font-size: 14px;
            color: #fff;
            line-height: 200px;
            text-align: center;
            background: transparent;

        }


    </style>

</head>

<body>
<div id="site-content">

    <header class="site-header">
        <div class="bottom-header">
          <div class="container pl-0" id="app">
                <img src="images/logo-footer.png" alt="Site title" class="logo-icon branding pull-left" style="height: 200px">
                  <div class="row pt-2 ">
                      <div class="col-12 pull-right">
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
                                          <a href="#" class="dropdown-toggle ml-5 btn btn-primary-outline" data-toggle="dropdown">SIGN UP</a>
                                          <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
                                              <li><a href="{{ route('register') }}">SIGN UP AS CLIENT</a></li>
                                              <li><a href="{{route('register.Affiliate')}}">SIGN UP AS AFFILIATE</a></li>

                                          </ul>

                                      @endif
                                  @endauth
                              @endif
                          </div>
                      </div>
                      <div class="col-12 pull-left">
                          <h3>PRUDENT CREDIT SOLUTION</h3>
                      </div>
                      <div class="col-12 pull-left">
                          <span class="slogan">we rectify your credit history</span>
                      </div>
                      <div class="col-12">
                          <nav class="main-navigation mr-0 pull-left">
                              <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                              <ul class="menu">
                                  <li class="menu-item"><a href="{{ url('/') }}">Home</a></li>
                                  <li class="menu-item"><a href="{{route('whoWeAre')}}">Who we are</a></li>
                                  <li class="menu-item"><a href="{{route('howItWorks')}}">How it works</a></li>
                                  <li class="menu-item"><a href="{{route('credit.education')}}">Education center</a></li>

                              </ul>
                          </nav>
                      </div>
                  </div>
          </div> <!-- .container -->
        </div> <!-- .bottom-header -->
    </header> <!-- .site-header -->
    @include('helpers/flash')
    <main class="content">
        @yield('content')
        <div class="page-content">
            <div class="fullwidth-block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="card pb-4">
                            <div class="breadcrumbs">
                                <div class="container">
                                    <a href="{{url('/')}}">Home</a> &rarr;
                                    <a href="#">HOW IT WORKS</a>
                                </div>
                            </div>


                            <div class="container">
                                <div class="row">
                                    <div class="col-2 circle">dadasda</div>
                                    <div class="col-2 circle-v"><img src="images/arrow.png" alt="Site title" style="height: 50px"></div>
                                    <div class="col-2 circle">dadasda</div>
                                    <div class="col-2 circle-v">dadasda</div>
                                    <div class="col-2 circle">dadasda</div>
                                    <div class="col-2 circle-v">dadasda</div>

                                </div>
                                <div class="row">
                                    <div class="col-2 circle-v">dadasda</div>
                                    <div class="col-2 circle">dadasda</div>
                                    <div class="col-2 circle-v">dadasda</div>
                                    <div class="col-2 circle">dadasda</div>
                                    <div class="col-2 circle-v">dadasda</div>
                                    <div class="col-2 circle">dadasda</div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- .content -->
    <footer class="site-footer  pt-4">
        <div class="title-image">
            <div class="container  pt-5 m-0">

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
                        <div class="row"><a href="">Contact us</a></div>
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
                            <div class="row  pt-2"><a  href=""><i class="fa fa-facebook"></i></a></div>
                            <div class="row pt-2"><a href=""><i class="fa fa-twitter"></i></a></div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 align-right">
                </div>
            </div>

            </div>

            <div class="row m-0 chat-search wow fadeInUp"></div>
        </div>



    </footer> <!-- .site-footer -->

</div> <!-- #site-content -->

<script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/js/plugins.js')}}"></script>
<script src="{{asset('js/js/app.js')}}"></script>

</body>

</html>

