<!DOCTYPE html>
<html lang="en">
  <head>
    @yield('meta')
    @if (!trim($__env->yieldContent('meta')))
    <title>{{ zactra::translate_lang('Prudent Credit Solutions') }}</title>
    @endif
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--  fav  icons-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/icons/apple-icon-57x57.png')}}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/icons/apple-icon-60x60.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/icons/apple-icon-72x72.png')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/icons/apple-icon-76x76.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/icons/apple-icon-114x114.png')}}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/icons/apple-icon-120x120.png')}}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/icons/apple-icon-144x144.png')}}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/icons/apple-icon-152x152.png')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/icons/apple-icon-180x180.png')}}" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{URL::asset('/icons/android-icon-192x192.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/icons/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/icons/favicon-96x96.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/icons/favicon-16x16.png')}}" />
    <link rel="manifest" href="{{URL::asset('/icons/manifest.json')}}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Bootstrap -->
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animated-css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{asset('css/css/animate.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome-css -->
    <link href="{{asset('css/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- owl-carrosel-css -->
    <link href="{{asset('css/owl-carrosel/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/owl-carrosel/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{asset('css/revolution/layers.css')}}" />
    <link rel="stylesheet" href="{{asset('css/revolution/navigation.css')}}" />
    <link rel="stylesheet" href="{{asset('css/revolution/settings.css')}}" />
    <!-- offcanvas-menu-css -->
    <link href="{{asset('css/css/offcanvas-menu.css')}}" rel="stylesheet" type="text/css" />
    <!-- style-css -->
    <link href="{{asset('css/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/app.js?v=4') }}"></script>
    <script type="application/ld+json">
      {
          "@context": "http:\/\/schema.org",
          "@type": "LocalBusiness",
          "name": "Prudent Credit Solutions",
          "email": "info@prudentscores.com",
          "description": "Prudent Credit Solutions helps dispute and correct inaccuracies on credit
                          reports, improve credit history, achieve reasonable credit-fitness goals.
                          Decided to hire our firm? Find out how Prudent Credit Solutions work for credit
                          restoration? Stages and rules. Relax and expect to hear some good news!"
          "openingHours": "Mo,Tu,We,Th 09:00-17:30",
          "url":"https://prudentscores.com/",
          "address": {
              "@type": "PostalAddress",
              "addressLocality": "Commerce",
              "addressRegion": "CA",
              "postalCode": "90040",
              "streetAddress": "800 S. Eastern Ave., Suite 500"
               "telephone": "(1 84) 43 37 83 36"
          },
      }
    </script>

    <style>
      body:after {
        content: "beta";
        position: fixed;
        width: 140px;
        height: 25px;
        background: #ee8e4a;
        top: 15px;
        left: -40px;
        text-align: center;
        font-size: 13px;
        font-family: sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #fff;
        line-height: 27px;
        transform: rotate(-45deg);
        z-index: 1000000;
      }
      .header-section .navbar .navbar-collapse .navbar-nav li {
        text-transform: none !important;
      }
      .scrolled-content {
        max-height: 200px;
        overflow-y: auto;
        white-space: nowrap;
      }
      ::-webkit-scrollbar {
        width: 5px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }
      .copy-right {
        color: #f7f7f7;
      }
      .copy-right a {
        text-decoration: none;
        color: #f7f7f7;
      }
      .copy-right a:visited {
        text-decoration: none;
        color: #f7f7f7;
      }
    </style>
    @yield('styles')
    <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
    {{--
    <script src="assets/js/jquery.inview.min.js"></script>
    --}}

    <script src="{{asset('js/js/portfolio.js')}}"></script>
    <script src="{{asset('js/js/wow.js')}}"></script>
    <script src="{{asset('js/js/lightbox.js')}}"></script>
    <script src="{{asset('owl-carrosel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/js/jquery-ui.js')}}"></script>

    <!-- Revolution Slider -->
    <script src="{{asset('js/revolution/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('js/revolution/jquery.themepunch.tools.min.js')}}"></script>

    <!-- Revolution Extensions -->
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/revolution/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{asset('js/js/script.js')}}"></script>
  </head>
  <body class="homePageFour">
    <!-- start preloader -->
    <div id="preloader">
      <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <!-- end preloader -->

    <header class="header-section">
      <div class="topper">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="navbar-header">
                  <a class="navbar-brand" href="{{url('/')}}"><img src="/images/logo-icon.png" alt="{{ zactra::translate_lang('image') }}" /></a>
                </div>
              </div>
              <div class="col-md-8">
                <div class="header-left-bar pull-right">
                  <ul class="contact-wrapper">
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ zactra::translate_lang('Mon - Fri: 9:00 a.m. - 5:30 p.m.') }}</li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:1-844-337-8336">{{ zactra::translate_lang('1-844-337-8336') }}</a></li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@prudentscores.com">{{ zactra::translate_lang('info@prudentscores.com') }}</a></li>
                  </ul>
                </div>
                <!-- header-left-bar -->
              </div>
            </div>
          </div>
        </div>
        <!-- top-bar -->
      </div>
      <!-- topper -->

      <div class="container" id="app" data-user="{{Auth::user()?Auth::user()->id:''}}">
        <nav class="navbar navbar-inverse hidden-sm hidden-xs">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-1">
              @if(Auth::user())
                @if(Auth::user()->role == 'client')
                  @include('helpers.urls.nav_bar_client')
                @elseif(Auth::user()->role == 'affiliate')
                  @include('helpers.urls.nav_bar_affiliate')
                @elseif(Auth::user()->role == 'super admin')
                  @include('helpers.urls.nav_bar_owner')
                @elseif(Auth::user()->role == 'admin')
                  @include('helpers.urls.nav_bar_admin')
                @elseif(Auth::user()->role == 'receptionist')
                  @include('helpers.urls.nav_bar_receptionist')
                @elseif(Auth::user()->role == 'seo')
                  @include('helpers.urls.nav_bar_seo')
                @endif
              @else
                @include('helpers.urls.nav_bar_guest')
              @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if (Route::has('login')) @auth
              <li class="dropdown menu-item sign-hide">
                <a href="#" onclick="location.href='{{ url('/home') }}'" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/user.png')}}" alt="" />{{ Auth::user()->email }}<span class="caret"></span></a>
                <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">
                  <li class="menu-item sign-hide">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ zactra::translate_lang('LOG OUT') }} <i class="fa fa-power-off"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li>
                <a href="{{ route('login') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('Login') }}</a>
              </li>
              @if (Route::has('register')) {{--
              <li>
                <a href="{{ route('register') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('Registration') }}</a>
              </li>
              --}}
              <li>
                <a href="{{ route('register.Affiliate') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('Registration') }}</a>
              </li>
              @endif @endauth @endif
            </ul>
            @if(!Auth::user())
            <ul class="nav navbar-nav social-icon pull-right">
              <li>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </li>
            </ul>
            @endif
          </div>
        </nav>
      </div>
    </header>
    <!-- header-section -->

    @yield('content')
    <div class="modal fade" id="appointmentNotifier" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="appointmentDetailsModalLabel">{{ zactra::translate_lang('Appointments') }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>{{ zactra::translate_lang('You have ') }}<span class="apointments-count"></span> {{ zactra::translate_lang('appointments in the next 10 minutes') }}</div>
            <div class="appointments-info"></div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" href="{{route("admin.message.index")}}">{{ zactra::translate_lang('More Info') }}</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="partner_with_us" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p style="text-align: justify;">
              {{ zactra::translate_lang('We are always looking to partner with independent sales representatives.') }} {{ zactra::translate_lang('To inquire, please email your CV/resume to') }}
              <a href="mailto:partners@prudentscores.com"> {{ zactra::translate_lang('partners@prudentscores.com') }}</a>{{ zactra::translate_lang(' and one of our representatives will contact you promptly.') }}
            </p>
          </div>
        </div>
      </div>
    </div>
    {{--@include('helpers.chat-box')--}}
    @auth
      @if(Auth::user()->role == 'client' || Auth::user()->role == 'affiliate')
      @include('helpers.chat-box')
    @endif
  @else
    @include('helpers.chat-box')
  @endif
  @if(Auth::user() && Auth::user()->role == 'client')
    <footer class="footer-section">
      <div class="copy-right text-center">
        <div class="container">
          <p>{{ date('Y') }} &copy;{{ zactra::translate_lang(' All Rights Reserved by ') }}<a href="/" class="fs-14">{{ zactra::translate_lang('PRUDENT CREDIT SOLUTION') }}</a></p>
        </div>
      </div>
    </footer>
    @else
    <footer class="footer-section">
      <div class="footer-container">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="footer-wrapper">
                <ul class="wrapper-option clearfix">
                  <h3>{{ zactra::translate_lang('CONNECT WITH US') }}</h3>
                  <li>
                    <div class="content" style="color: #aaa;">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <a href="tel:1-844-337-8336">{{ zactra::translate_lang('1-844-337-8336') }}</a>
                    </div>
                  </li>
                  <li>
                    <div class="content" style="color: #aaa;">
                      <i class="fa fa-envelope-o" aria-hidden="true" style="color: #fefefe;"></i>
                      <a href="mailto:info@prudentscores.com">{{ zactra::translate_lang('info@prudentscores.com') }}</a>
                    </div>
                  </li>
                  <li>
                    <div class="content" style="color: #aaa;">
                      {{ zactra::translate_lang('5800 S. Eastern Ave., Suite 500 ') }}<br />
                      {{ zactra::translate_lang('Commerce, CA 90040') }}
                    </div>

                    <div class="content" style="color: #aaa;">
                      {{ zactra::translate_lang('Working Hours: ') }}<br />
                      {{ zactra::translate_lang(' Mon-Fri (9:00 a.m. - 5:30 p.m.)') }}
                    </div>
                  </li>
                </ul>
                <ul class="wrapper-option" style="padding-left: 30px;">
                  {{--
                  <h3>REACH US DIRECTLY</h3>
                  --}} {{--
                  <li>
                    --}} {{--
                    <div class="content" style="color: #aaa;">--}} {{-- info@prudentscores.com--}} {{--</div>
                    --}} {{--
                    <div class="content" style="color: #aaa;">
                      --}} {{-- 5800 S. Eastern Ave., Suite 500 <br />
                      Commerce, CA 90040--}} {{--
                    </div>
                    --}} {{--
                    <div class="content" style="color: #aaa;">--}} {{-- Tel: 1-844-337-8336--}} {{--</div>
                    --}} {{--
                    <div class="content" style="color: #aaa;">
                      --}} {{-- Working Hours: <br />
                      Mon-Fri (9:00 a.m. - 5:30 p.m.)--}} {{--
                    </div>
                    --}} {{--
                  </li>
                  --}}
                </ul>
              </div>
              <!-- footer-wrapper -->
            </div>

            <div class="col-md-4 col-sm-4">
              <div class="footer-wrapper last-wrapper">
                <ul class="wrapper-option clearfix">
                  <h3>{{ zactra::translate_lang('INFORMATION') }}</h3>
                  <li><a href="{{url('/')}}">{{ zactra::translate_lang('Home') }}</a></li>
                  <li><a href="#partner_with_us" data-toggle="modal">{{ zactra::translate_lang('Partner with Us') }}</a></li>
                  <li><a href="{{route('legalityCreditRepair')}}">{{ zactra::translate_lang('Is Credit Repair Legal?') }} </a></li>
                  <li><a href="{{route('credit.repair')}}">{{ zactra::translate_lang('Resources') }}</a></li>
                  <li><a href="{{route('blog')}}">{{ zactra::translate_lang('Newsroom') }}</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-4 col-sm-4">
              <div class="footer-wrapper last-wrapper">
                <ul class="wrapper-option" style="padding-left: 30px;">
                  <h3>{{ zactra::translate_lang('CUSTOMER SERVICE') }}</h3>
                  <li><a href="{{route('faqs')}}">{{ zactra::translate_lang('FAQs') }}</a></li>
                  {{--
                  <li><a href="{{route('credit.free.repair')}}">Good Credit Tips</a></li>
                  --}}
                  <li>
                    <a href="https://www.myfico.com/fico-credit-score-estimator/estimator" target="_blank">
                      {{ zactra::translate_lang('Score Estimator') }}
                    </a>
                  </li>
                  <li>
                    <a href="https://www.consumer.ftc.gov/features/feature-0014-identity-theft" target="_blank">
                      {{ zactra::translate_lang('Identity Theft') }}
                    </a>
                  </li>
                  <li><a href="{{route('pravicy')}}">{{ zactra::translate_lang('Privacy Policy/Terms of Use') }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copy-right text-center">
        <div class="container">
          <p>{{ date('Y') }} &copy;{{ zactra::translate_lang(' All Rights Reserved by') }} <a href="#">{{ zactra::translate_lang('PRUDENT CREDIT SOLUTION') }}</a></p>
        </div>
      </div>
    </footer>
    @endif

    <span class="menu-toggle navbar visible-xs visible-sm sticky"><i class="fa fa-bars" aria-hidden="true"></i></span>

    <div id="offcanvas-menu" class="visible-xs visible-sm">
      <span class="close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>

      <ul class="menu-wrapper">
        @if(Auth::user())
        @if(Auth::user()->role == 'client')
          @include('helpers.urls.logged_in_client')
        @elseif((Auth::user()->role == 'affiliate'))
          @include('helpers.urls.logged_in_affiliate')
          <li>
            <a href="{{ url('/affiliate') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('NOME') }}</a>
          </li>
        @include('helpers.urls.logged_in_affiliate')
        @elseif((Auth::user()->role == 'admin'))
          <li>
            <a href="{{ url('/affiliate') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('HOME') }}</a>
          </li>
          @include('helpers.urls.logged_in_admin')
        @elseif((Auth::user()->role == 'receptionist'))
          <li class="menu-item"><a href="{{ url('receptionist/message') }}"> {{ zactra::translate_lang('HOME') }}</a></li>
          @include('helpers.urls.logged_in_receptionist')
        @elseif((Auth::user()->role == 'seo'))
          <li class="menu-item"><a href="{{ url('admins/blogs') }}"> {{ zactra::translate_lang('HOME') }}</a></li>
          @include('helpers.urls.logged_in_seo')
        @else
          <li>
            <a href="{{ url('/owner') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('HOME') }}</a>
          </li>
          @include('helpers.urls.logged_in_owner')
        @endif

        <li class="menu-item sign-hide">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ zactra::translate_lang('LOG OUT') }}<i class="fa fa-power-off"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @else
          @include('helpers.urls.nav_bar_guest')
        <li>
          <a href="{{ route('login') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('Login') }}</a> {{--
        </li>
        <li>
          <a href="{{ route('register') }}"><img src="{{asset('images/user.png')}}" alt="" />Registration</a>
        </li>
        --}}
        <li>
          <a href="{{ route('register.Affiliate') }}"><img src="{{asset('images/user.png')}}" alt="" />{{ zactra::translate_lang('Registration') }}</a>
        </li>

        @endif
        <script>
          $(document).ready(function () {
            setInterval(getAppiontments(), 10 * 60 * 1000);
          });

          getAppiontments = function () {
            $.ajax({
              url: "/admins/getNotifications",
              type: "get",
              success: function (result) {
                if (result.length > 0) {
                  console.log(result.length);
                  $("#appointmentNotifier .apointments-count").text(result.length);
                  $("#appointmentNotifier .appointments-info").text();
                  $.each(result, function (i, e) {
                    var appointment = '<div class="text-primary">' + e.name + "</div>";
                    $("#appointmentNotifier .appointments-info").append(appointment);
                  });
                  $("#appointmentNotifier").modal("show");
                }
              },
            });
          };
        </script>
      </ul>
      <!-- menu-wrapper -->
    </div>
    <!-- Off-Canvas View Only -->

    <div id="toTop" class="hidden-xs pt-2">
      <i class="fa fa-chevron-up"></i>
    </div>
    <!-- totop -->
  </body>
</html>
