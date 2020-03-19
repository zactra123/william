<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Admin</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="icon" href="{{ URL::asset('/css/logo.ico') }}" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js?v=2') }}" defer></script>


    <script src="{{asset('js/js/ie-support/html5.js')}}"></script>
    <script src="{{asset('js/js/ie-support/respond.js')}}"></script>



</head>

<body>

<div id="site-content">

    <header class="site-header">


        <div class="bottom-header">
            <div class="container" id="app">
                @if(Auth::user()->role == 'admin')
                    <a href="{{ url('/admin') }}" class="branding pull-left">
                @else
                    <a href="{{ url('/') }}"  class="branding pull-left">
                @endif
                    <img src="{{asset('images/logo-icon.png')}}" alt="Site title" style="width: 100px" class="logo-icon">
                </a>

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
    <div class="modal fad" id="appointmentNotifier" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="appointmentDetailsModalLabel">Appiontments</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>You have <span class="apointments-count"></span> appiontments in the next 10 mintes</div>
                    <div class="appointments-info">

                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="{{route("admin.message.index")}}">More Info</a>
                </div>
            </div>
        </div>
    </div>



</div> <!-- #site-content -->

<script src="{{asset('js/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/js/plugins.js')}}"></script>
<script src="{{asset('js/js/app.js')}}"></script>



<script>
$(document).ready(function(){
    setInterval(getAppiontments(), 10 * 60 * 1000);
});

getAppiontments = function(){
    $.ajax({
        url: "/admin/getNotifications",
        type: "get",
        success: function(result){
            if (result.length > 0) {
                console.log(result.length)
                $("#appointmentNotifier .apointments-count").text(result.length)
                $("#appointmentNotifier .appointments-info").text()
                $.each( result, function(i, e){
                    var appointment = '<div class="text-primary">'+ e.name + '</div>';
                    $("#appointmentNotifier .appointments-info").append(appointment)
                });
                $("#appointmentNotifier").modal("show");
            }
        }
    })
}

</script>
</body>

</html>

