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
        .base-header{
            background-image: url("/images/header-notScroll.png");
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
        .carousel-inner svg {
            position: absolute;
            top: 0;
            left: 0;
        }

        .square {
            /*border: 1px solid gray;*/
            text-align: center;
            width: 80vw;
            height: 20vw;
            margin: auto;
            margin-bottom: 10vw;
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

            font-size: 1vw;
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
            border-width: 0 2vw 20vw 2vw;
            border-color: transparent transparent white transparent;
            position: absolute;
            top: 105%;
            left: 30%;
        }
        .arrow-small {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0px 1vw 11vw 1vw;
            border-color: transparent transparent #ffffff transparent;
            position: absolute;
            top: 103%;
            left: 38%;
        }

        .step{
            display:none
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
                                          <a href="#" class="dropdown-toggle ml-5 btn btn-primary-outline" data-toggle="dropdown">Registration</a>
                                          <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
                                              <li><a href="{{ route('register') }}">SIGN UP AS CLIENT</a></li>
                                              <li><a href="{{route('register.Affiliate')}}">SIGN UP AS AFFILIATE</a></li>

                                          </ul>
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
                                  <li class="menu-item"><a href="{{route('whoWeAre')}}">Who we are</a></li>
                                  <li class="menu-item"><a href="{{route('howItWorks')}}">How it works</a></li>
                                  <li class="menu-item"><a href="{{route('credit.education')}}">Education center</a></li>

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
                            </div>
                            <div class="carousel-item img-overlay-wrap">
                                <img class="d-block w-100" src="/images/slider-2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item img-overlay-wrap">
                                <img class="d-block w-100" src="/images/slider-3.jpg" alt="Third slide">
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
                            <div class="feature">
                                <h3> We partner with all three credit bureaus: TansUnion, Equfax and Expirian</h3>
                                <p>
                                    We work with credit bureaus and your creditors to challenge the negative report
                                    items that affect your credit score, We'll ensure your credit history up to-date
                                    accurate and reflects you honestly.
                                </p>
                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="images/p-3.png"  class="float-left" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="images/p-2.png"  class="float-left" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="images/p-1.png"  class="float-left" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="images/p-4.png"  class="float-left" >

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-6">
                            <div class="feature mt-2">
                                <button class=" btn btn-primary float-right"> Call ‎1855855977 </button>

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->
                        <div class="col-md-6">
                            <div class="feature mt-2">
                                <a href="" class="btn  btn-outline-dark float-left">SIGN UP ONLINE </a>

                            </div> <!-- .feature -->
                        </div> <!-- .col-md-3 -->

                    </div> <!-- .row -->
                </div>
            </div>
            <div class="light-section">
                <div class="container content-container bg-content">

                    <div class="square">
                        <div class="hide"></div>
                        <div class="circle 1">
                            1
                            <p class="pt-2">Registration</p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-1"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 3">
                            3
                            <p class="pt-2">Review &  Approval-</p>
                            <p class="pt-2"> Contract </p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-3"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 5">
                            5
                            <p class="pt-2"> We Get To Work</p>
                            <img src="images/arrow.png"  class="circle-arrow" >
                            <div class="arrow-up step step-5"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="hide"></div>
                        <!--2nd -->

                        <div class="hide"></div>
                        <div class="hide"></div>
                        <div class="circle 2">
                            2
                            <p class="pt-2"> Auditing</p>
                            <img src="images/arrow1.png"  class="circle-arrow-1" >
                            <div class="arrow-small step step-2"></div>
                        </div>
                        <div class="hide"></div>
                        <div class="circle 4">
                            4
                            <p class="pt-2">Payment</p>
                            <img src="images/arrow1.png"  class="circle-arrow-1" >
                            <div class="arrow-small step step-4"></div>

                        </div>
                        <div class="hide"></div>
                        <div class="circle 6">
                            6
                            <p class="pt-2">Payment</p>
                            <p>Disbursement</p>
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


        $('.circle').click(function(){
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

