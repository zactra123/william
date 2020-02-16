<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Credit Report</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>


    <script src="{{asset('js/js/ie-support/html5.js')}}"></script>
    <script src="{{asset('js/js/ie-support/respond.js')}}"></script>

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
        .registration{
            text-align: center;
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
            <div class="container" id="app">

            @if(Auth::user()->role == 'client')
                 @if(empty(Auth::user()->clientDetails))
                     <a href="{{ url('/client/details/create') }}" class="branding pull-left">
                 @else
                    <a href="{{ url('/client/details') }}"  class="branding pull-left">
                 @endif
            @else
                <a href="{{ url('/') }}"  class="branding pull-left">
            @endif
                    <img src="{{asset('images/logo-icon.png')}}" alt="Site title" class="logo-icon">
                    <h1 class="site-title">Company <span>Name</span></h1>
                    <h2 class="site-description">Tagline goes here</h2>
                </a> <!-- #branding -->

                <nav class="main-navigation pull-right ">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        {{--<li class="menu-item"><a href="{{route('client.uploadCreditReports')}}">Upload Credit Reports</a></li>--}}

                        @if(!empty(Auth::user()->clientDetails))
                            <li class="menu-item"><a href="{{route('client.details.edit', Auth::user()->id)}}">Edit your details</a></li>
                        @else
                            <li class="menu-item"><a href="{{route('client.details.create')}}">Add your Details</a></li>
                       @endif
                        <li class="menu-item"><a href="{{route('client.addDriverSocial')}}">Upload Driver Licnse & Social Security</a></li>


                        <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->email }}<span class="caret"></span></a>
                            <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">
                                <li><a href="{{route('client.details.edit',Auth::user()->id)}}">Edit your detail</a></li>
                                <li><a href="{{route('client.credentials')}}">Credentials</a></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>

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

    <footer class="wow fadeInUp">
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