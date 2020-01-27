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

    <link rel="stylesheet" href="{{asset('css/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>


    <script src="{{asset('js/js/ie-support/html5.js')}}"></script>
    <script src="{{asset('js/js/ie-support/respond.js')}}"></script>



</head>

<body>

<div id="site-content">

    <header class="site-header">


        <div class="bottom-header">
            <div class="container">
                @if(Auth::user()->role == 'admin')
                    <a href="{{ url('/admin') }}" class="branding pull-left">
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

                                    <li class="menu-item"><a href="{{ route('admin.message.index')}}" >Messages</a></li>
                                    <li class="menu-item"><a href="{{ route('admin.client.list')}}" >User List</a></li>
                                    <li class="menu-item"><a href="{{ route('admin.affiliate.list')}}" >Affiliate List</a></li>
                                    <li class="menu-item">
                                        <ul class="navbar-nav ml-auto">
                                            <!-- Authentication Links -->
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->email }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
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



</div> <!-- #site-content -->

<script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/js/plugins.js')}}"></script>
<script src="{{asset('js/js/app.js')}}"></script>

</body>

</html>

