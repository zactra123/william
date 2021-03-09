<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  Meta data   --}}
    @yield('meta')
    @if (!trim($__env->yieldContent('meta')))
        <title>Prudent Credit Solutions </title>
    @endif
    {{--  Meta data END   --}}

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

    {{-- Canonical url   --}}
    <link rel="canonical" href="{{ url()->current() }}" />

    {{--  Fav Icon   --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{URL::asset('/icons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{--  Fav Icon  END  --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{asset('css/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/app.js?v=4') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/new_style.min.css') }}">

{{--    <link rel="stylesheet" href="{{asset('css/new/style.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/new/owl/owl.carousel.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/new/owl/owl.theme.default.css')}}">--}}
    @yield('scripts')
</head>
<body>

<header>
    <div class="container nav-bar">
        <div class="header-info">
            <div class="time-block contact-info">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path d="M14.3164 4.20996C13.985 4.37028 13.8464 4.76904 14.0067 5.10026C14.4447 6.00505 14.6667 6.98031 14.6667 8C14.6667 11.6759 11.6759 14.6667 8 14.6667C4.32406 14.6667 1.33333 11.6759 1.33333 8C1.33333 4.32406 4.32406 1.33333 8 1.33333C9.52328 1.33333 10.9543 1.83073 12.1387 2.77165C12.4259 3.00098 12.846 2.95296 13.0754 2.66471C13.3047 2.37663 13.2567 1.95703 12.9683 1.72803C11.5661 0.613607 9.8016 0 8 0C3.58903 0 0 3.58903 0 8C0 12.411 3.58903 16 8 16C12.411 16 16 12.411 16 8C16 6.77767 15.7331 5.60628 15.2067 4.51969C15.0467 4.18766 14.6466 4.04932 14.3164 4.20996Z" fill="#F63664"/>
                        <path d="M7.99999 2.66675C7.63199 2.66675 7.33333 2.96541 7.33333 3.33341V8.00008C7.33333 8.36808 7.63199 8.66675 7.99999 8.66675H11.3333C11.7013 8.66675 12 8.36808 12 8.00008C12 7.63208 11.7013 7.33342 11.3333 7.33342H8.66666V3.33341C8.66666 2.96541 8.368 2.66675 7.99999 2.66675Z" fill="#F63664"/>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="16" height="16" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <p>Mon - Fri: 9:00 a.m. - 5:30 p.m.</p>
            </div>
            <div class="phone-block contact-info">
                <a href="tel:1-844-337-8336">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M15.211 12.0959L15.211 12.0959C15.5591 12.444 15.593 13.0923 15.1982 13.5547L13.6958 15.0571L14.0494 15.4106L13.6958 15.0571C13.4164 15.3365 12.9957 15.4989 12.4075 15.5C11.815 15.5011 11.087 15.3365 10.262 14.9979C8.61368 14.3215 6.67373 12.9897 4.83361 11.1496C2.99511 9.31111 1.68312 7.37195 1.01613 5.72352C0.682302 4.8985 0.51903 4.16846 0.516845 3.57296C0.514679 2.9826 0.669224 2.56066 0.931037 2.28244L2.44127 0.772212C2.78934 0.424138 3.4376 0.390257 3.90003 0.784977L6.12011 3.00506C6.66783 3.55277 6.42264 4.4444 5.76841 4.6457L5.76837 4.64557L5.75736 4.64924C4.82893 4.95867 4.15311 5.99896 4.47707 7.0143C4.71217 7.97414 5.41799 8.98186 6.23202 9.78559C7.05219 10.5954 8.06536 11.2801 8.98397 11.5098L8.98393 11.5099L8.99675 11.5128C9.94071 11.7226 11.0062 11.2092 11.334 10.2259L11.3341 10.2259L11.3375 10.2148C11.5388 9.56058 12.4304 9.31539 12.9781 9.86309L15.211 12.0959Z" stroke="#F63664"/>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p>1-844-337-8336</p>
                </a>
            </div>
            <div class="mail-block contact-info">
                <a href="mailto:info@prudentscores.com">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9779 2.13989H2.02209C0.90713 2.13989 0 3.04702 0 4.16198V11.8377C0 12.9527 0.90713 13.8598 2.02209 13.8598H13.9779C15.0929 13.8598 16 12.9527 16 11.8377V4.16198C16 3.04702 15.0929 2.13989 13.9779 2.13989ZM13.662 3.44424L8 7.81807L2.338 3.44424H13.662ZM13.9779 12.5555H2.02209C1.62635 12.5555 1.30435 12.2335 1.30435 11.8378V4.29398L7.6013 9.15833C7.7187 9.24902 7.85939 9.29433 8 9.29433C8.14061 9.29433 8.2813 9.24902 8.3987 9.15833L14.6957 4.29398V11.8377C14.6957 12.2335 14.3737 12.5555 13.9779 12.5555Z" fill="#F63664"/>
                    </svg>
                    <p class="company-email">&nbsp;info&nbsp;@prudentscores&nbsp;.com</p>
                </a>
            </div>
        </div>
        <div class="site-navi contact-info row">
            <div class="logo-block col-6 col-lg-2">
                <a href="/home" title="Home">
                    <img src="{{asset('images/new/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="navigation-block col-6 col-lg-10 row">
                <div class="mobile-menu">
                    <button id="toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="navigation col-12">
                    <nav class="col-md-8">
                        <ul class="nav-block">
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
                    </nav>
                    <div class="account-block col-md-4">
                        <ul class="nav-block">
                            @if (Route::has('login'))
                                @auth
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->email }}<span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item"
                                               href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                LOG OUT
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
{{--                                    <li class="dropdown nav-item sign-hide" ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->email }}<span class="caret"></span></a>--}}
{{--                                        <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">--}}
{{--                                            <li class="menu-item sign-hide"><a href="{{ route('logout') }}"--}}
{{--                                                                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                                    LOG OUT  <i class="fa fa-power-off"></i></a>--}}
{{--                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                                    @csrf--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}

                                @else
                                    <ul class="nav-block">
                                        <li class="nav-item"><a href="{{ route('login') }}">Log In</a></li>
                                        <li class="nav-item"><a href="{{ route('register') }}">Registration</a></li>
                                    </ul>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


@yield('content')


<div class="modal fade" id="partner_with_us" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p style="text-align: justify">
                    We are always looking to partner with independent sales representatives.
                    To inquire, please email your CV/resume to<a href="mailto:partners@prudentscores.com">
                        partners@prudentscores.com</a> and one of our representatives will contact you promptly.


                </p>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()  && Auth::user()->role == 'client')
    <footer class="footer-section">
        <div class="copy-right text-center">
            <div class="container">
                <p>2020 &copy; All Rights Reserved by <a href="/">PRUDENT CREDIT SOLUTION</a></p>
            </div>
        </div>
    </footer>
@else
    <footer>
        <div class="footer-bck">
            <div class="container">
                <div class="footer row">
                    <div class="information-block col-12 col-lg-6">
                        <div class="row">
                            <div class="first-block col-12 col-md-4">
                                <h6 class="title">Connect with us</h6>
                                <ul class="contact-information">
                                    <li><a href="tel:1-844-337-8336">1-844-337-8336</a></li>
                                    <li><a href="mailto:info@prudentscores.com" class="company-email">info@prudentscores.com</a></li>
                                    <li><p>5800 S. Eastern Ave., Suite 500</p></li>
                                    <li><p>Commerce, CA 90040</p></li>
                                    <li><p>Working Hours:</p></li>
                                    <li><p>Mon-Fri (9:00 a.m. - 5:30 p.m.)</p></li>
                                </ul>
                            </div>
                            <div class="second-block col-12 col-md-4">
                                <h6 class="title">Information</h6>
                                <ul class="contact-information">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#partner_with_us" data-toggle="modal">Partner with Us</a></li>
                                    <li><a href="{{route('legalityCreditRepair')}}">Is Credit Repair Legal?</a></li>
                                    <li><a href="{{route('credit.repair')}}">Resources</a></li>
                                    <li><a href="#">Newsroom</a></li>
                                </ul>
                            </div>
                            <div class="thirth-block col-12 col-md-4">
                                <h6 class="title">Customer Service</h6>
                                <ul class="contact-information">
                                    <li><a href="{{route('faqs')}}">FAQs</a></li>
                                    <li><a href="{{route('credit.free.repair')}}">Good Credit Tips</a></li>
                                    <li><a href="https://www.myfico.com/fico-credit-score-estimator/estimator" target="_blank">Score Estimator</a></li>
                                    <li><a href="https://www.consumer.ftc.gov/features/feature-0014-identity-theft" target="_blank">Identity Theft</a></li>
                                    <li><a href="{{route('pravicy')}}">Privacy Policy/Terms of Use</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="map col-12 col-md-8 col-lg-5" id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3308.251910018481!2d-118.16062677777458!3d33.986062727008566!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2ce8ad1141a4b%3A0x21e5480545b2ce21!2s5800%20S%20Eastern%20Ave%20Suit%20500%2C%20Los%20Angeles%2C%20CA%2090040!5e0!3m2!1sru!2sus!4v1611490037688!5m2!1sru!2sus" width="593" height="253" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <h6>by appointment only</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>COPYRIGHT WOOCOMMERCE 2020 - <a href="{{route('pravicy')}}">PRIVACY POLICY</a></p>
        </div>
    </footer>
@endif





<input type="hidden" id="contact_form_error_text" value="Одно или несколько полей содержать ошибку, пожалуйста проверьте и попробуйте снова.">
<input type="hidden" id="contact_error_mail_text" value="The email field is not filled or contains an error">
<input type="hidden" id="contact_error_phone_text" value="Поле номер телефона содержит ошибку">
<input type="hidden" id="contact_error_basic_text" value="Name field is empty or contains an error">
<input type="hidden" id="contact_success_send_text" value="Форма успешна отправлена">
<p class="description" id="contact_description">
    Click on input to change the contact method
</p>


<!-- <div id="viewport">
                         <ul id="slidewrapper">
                             <li>
                                 <img src="img/header_banner_img.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_2.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_3.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_4.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_5.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_6.png" alt="banner-img">
                             </li>
                             <li>
                                 <img src="img/header_banner_img_7.png" alt="banner-img">
                             </li>
                         </ul>
                     </div> -->
</body>
</html>
