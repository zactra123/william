<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- Meta data --}}
    @yield('meta')
    @if (!trim($__env->yieldContent('meta')))
    <title>{{ zactra::translate_lang('Prudent Credit Solutions') }}</title>
    @endif
    {{-- Meta data END --}}
    <script type="application/ld+json">
      {
          "@context": "http:\/\/schema.org",
          "@type": "LocalBusiness",
          "name": "Prudent Credit Solutions",
          "email": "info@prudentscores.com",
          "description": "Prudent Credit Solutions helps dispute and correct inaccuracies on credit
                          reports, improve credit history, achieve reasonable credit-fitness goals.
                          Decided to hire our firm? Find out how Prudent Credit Solutions work for credit
                          restoration? Stages and rules. Relax and expect to hear some good news!",
          "openingHours": "Mo,Tu,We,Th 09:00-17:30",
          "url":"https://prudentscores.com/",
          "address": {
              "@type": "PostalAddress",
              "addressLocality": "Commerce",
              "addressRegion": "CA",
              "postalCode": "90040",
              "streetAddress": "800 S. Eastern Ave., Suite 500",
               "telephone": "(1 84) 43 37 83 36"
          },
      }
    </script>

    {{-- Canonical url --}}
    <link rel="canonical" href="{{ url()->current() }}" />
    {{-- Fav Icon --}}
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
    {{-- Fav Icon END --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    {{-- <link href="{{asset('css/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}
    <script src="{{ asset('js/app.js?v='.env('ASSET_VERSION') ) }}"></script>
    <link rel="stylesheet" href="{{ asset('css/new_style.min.css?v='.env('ASSET_VERSION') ) }}" />
    <link rel="stylesheet" href="{{ asset('css/zactra.css?v='.env('ASSET_VERSION') ) }}" />
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
    @yield('scripts')
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "G-R9BDPYSVBK");
    </script>
  </head>
  <body>
    <header class="theme-background py-2 fixed-top">
      <div class="container">
        <div class="phone-block contact-info">
          <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <a href="tel:1-844-337-8336" class="text-white">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                      <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z"
                        stroke="#F63664"/>
                    </g>
                    <defs>
                      <clipPath id="clip0">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                  <span class="fs-12">{{ zactra::translate_lang('1-844-337-8336') }}</span>
                </a>
                <a href="mailto:info@prudentscores.com" class="ml-4 text-white">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.9779 2.13989H2.02209C0.90713 2.13989 0 3.04702 0 4.16198V11.8377C0 12.9527 0.90713 13.8598 2.02209 13.8598H13.9779C15.0929 13.8598 16 12.9527 16 11.8377V4.16198C16 3.04702 15.0929 2.13989 13.9779 2.13989ZM13.662 3.44424L8 7.81807L2.338 3.44424H13.662ZM13.9779 12.5555H2.02209C1.62635 12.5555 1.30435 12.2335 1.30435 11.8378V4.29398L7.6013 9.15833C7.7187 9.24902 7.85939 9.29433 8 9.29433C8.14061 9.29433 8.2813 9.24902 8.3987 9.15833L14.6957 4.29398V11.8377C14.6957 12.2335 14.3737 12.5555 13.9779 12.5555Z"
                      fill="#F63664"/>
                  </svg>
                  <span class="fs-12">{{ zactra::translate_lang('info@prudentscores.com') }}</span>
                </a>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-12 text-right sm-hidden">
                @if (Auth::check())
                <a href="{{ route('logout') }}" class="ml-4 text-white">
                  <span class="fs-12">{{ zactra::translate_lang('Logout') }}</span>
                </a>
                @else
                <a href="{{ route('login') }}" class="ml-4 text-white">
                  <span class="fs-12">{{ zactra::translate_lang('Login') }}</span>
                </a>
                <a href="{{ route('register') }}" class="text-white">
                  <span class="fs-12"> {{ zactra::translate_lang('/ Sign up') }}</span>
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section class="py-2 mb-5">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <header id="header" class="fixed-top" style="top: 20px !important;">
          <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
              <a href="{{ url('/') }}"> <img src="{{ asset('images/new/logo.png') }}" width="200px" alt="logo" /> </a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav id="navbar" class="navbar">
              <ul>
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
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
          </div>
        </header>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container my-5">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="col-md-2 col-lg-2 col-sm-12 col-12"></div>
        <div class="col-md-8 col-lg-8 col-sm-12 col-12">
          <div class="card p-5">
            <div class="row justify-content-center">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <h3 class="ml-5">{{ zactra::translate_lang('Rate your experience') }}</h3>
                <div id="stars" style="" class="starrr"></div>
                <div class="row hidden">
                  <strong>{{ zactra::translate_lang('You gave a rating of') }} <input type="text" name="" class="getrating count" value="0" onchange="alert()" /> {{ zactra::translate_lang('star(s)') }}</strong>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-5">
                <form class="" action="{{ route('reviews.store') }}" method="post">
                  @csrf
                  <div class="row">
                    <h3>{{ zactra::translate_lang('Tell us about your experience') }}</h3>
                  </div>
                  <input type="hidden" class="ratingvalue count" name="rating" value="0" />
                  <div class="row">
                    <input type="text" class="form-control" placeholder="{{ zactra::translate_lang('Full Name') }}" name="name" value="" required />
                  </div>
                  <div class="row mt-3">
                    <input type="email" class="form-control" placeholder="{{ zactra::translate_lang('Email') }}" name="email" value="" required />
                  </div>
                  <div class="row mt-3">
                    <textarea name="review" rows="8" class="form-control" placeholder="{{ zactra::translate_lang('Write Your Review') }}" required></textarea>
                  </div>
                  <div class="row mt-3 pull-right">
                    <button type="submit" class="btn btn-primary" onclick="checkratevalue()" name="button">{{ zactra::translate_lang('Submit') }}</button>
                  </div>
                </form>
              </div>
            </div>
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
              {{ zactra::translate_lang('We are always looking to partner with independent sales representatives. To inquire, please email your CV/resume to<a href="mailto:partners@prudentscores.com"> partners@prudentscores.com</a> and one of our representatives will
              contact you promptly.') }}
            </p>
          </div>
        </div>
      </div>
    </div>

    @if(Auth::user() && Auth::user()->role == 'client')
    <footer class="footer-section">
      <div class="copy-right text-center">
        <div class="container">
          <p>2020 &copy; {{ zactra::translate_lang('All Rights Reserved by') }} <a href="/" class="fs-14">{{ zactra::translate_lang('PRUDENT CREDIT SOLUTION') }}</a></p>
        </div>
      </div>
    </footer>
    @else
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>{{ zactra::translate_lang('Credit Repair') }}</h3>
                {{ zactra::site('address') }}<br>
                <br>
                <strong>{{ zactra::translate_lang('Phone:') }}</strong> {{ zactra::site('phone') }}<br>
                <strong>{{ zactra::translate_lang('Email:') }}</strong> {{ zactra::site('email') }}<br>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="fa fa-skype"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>{{ zactra::translate_lang('Useful Links') }}</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ url('/') }}">{{ zactra::translate_lang('Home') }}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('whoWeAre') }}">{{ zactra::translate_lang('About us') }}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('credit.education') }}">{{ zactra::translate_lang('Services') }}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('faqs') }}">{{ zactra::translate_lang('Faqs') }}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('pravicy') }}">{{ zactra::translate_lang('Privacy policy') }}</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>{{ zactra::translate_lang('Other Links') }}</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('credit.repair') }}">{{ zactra::translate_lang('Credit Repair Resources') }} </a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('legalityCreditRepair') }}">{{ zactra::translate_lang('Legality Credit Repair') }}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('howItWorks') }}">{{ zactra::translate_lang('How It Work') }}</a></li>
                {{-- <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('credit.free.repair') }}">{{ zactra::translate_lang('Free Credit Repair') }}</a></li> --}}
                <li><i class="bx bx-chevron-right"></i> <a class="fs-16" href="{{ route('review.list') }}">{{ zactra::translate_lang('Reviews') }}</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>{{ zactra::translate_lang('Subscribe Us') }}</h4>
              <p>{{ zactra::translate_lang('You can any time unsubcribe your email address from your mail if this become annoying.') }}</p>
              <form action="#" method="post"><input type="email" name="email" /><input type="submit" value="{{ zactra::translate_lang('Subscribe') }}" /></form>
              <div class="feature-box15 mt-5 bmargin px-3 py-2" style="border: 3px solid #37c6f5;">
                <h4 style="color: white; font-family: corbel;">{{ zactra::translate_lang('how can we help you?') }}</h4>
                <p class="text-light">{{ zactra::translate_lang('Feel free to contact us at any time. We feel happy to serve for our customers.') }}</p>
                <a href="" class="text-white">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                      <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z"
                        stroke="#F63664" ></path>
                    </g>
                    <defs>
                      <clipPath id="clip0">
                        <rect width="16" height="16" fill="white"></rect>
                      </clipPath>
                    </defs>
                  </svg>
                  {{ zactra::translate_lang('Contact Us') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
          <p>{{ date('Y') }} &copy; {{ zactra::translate_lang('All Rights Reserved by') }} <a href="/" class="fs-14">{{ zactra::translate_lang('PRUDENT CREDIT SOLUTION') }}</a></p>
        </div>
      </div>
    </footer>
    @endif
    <!--Alerts Script-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.1/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
           @if (session('success'))
           Swal.fire({
             title: 'Success',
             text: '{!! session("success") !!}',
             icon: 'success',
             confirmButtonText: 'Close'
           })
           @elseif (session('error'))
           Swal.fire({
             title: 'Error',
             text: '{!! session("error") !!}',
             icon: 'error',
             confirmButtonText: 'Close'
           })
           @elseif (session('info'))
           Swal.fire({
             title: 'Info',
             text: '{!! session("info") !!}',
             icon: 'info',
             confirmButtonText: 'Close'
           })
           @endif
         });
    </script>
    <input type="hidden" id="contact_form_error_text" value="{{ zactra::translate_lang('???????? ?????? ?????????????????? ?????????? ?????????????????? ????????????, ???????????????????? ?????????????????? ?? ???????????????????? ??????????.') }}" />
    <input type="hidden" id="contact_error_mail_text" value="{{ zactra::translate_lang('The email field is not filled or contains an error') }}" />
    <input type="hidden" id="contact_error_phone_text" value="{{ zactra::translate_lang('???????? ?????????? ???????????????? ???????????????? ????????????') }}" />
    <input type="hidden" id="contact_error_basic_text" value="{{ zactra::translate_lang('Name field is empty or contains an error') }}" />
    <input type="hidden" id="contact_success_send_text" value="{{ zactra::translate_lang('?????????? ?????????????? ????????????????????') }}" />
    <p class="description" id="contact_description">
      {{ zactra::translate_lang('Click on input to change the contact method') }}
    </p>
  </body>
</html>
