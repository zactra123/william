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

    <script src="{{ asset('js/app.js?v='.env('ASSET_VERSION') ) }}"></script>
    <link rel="stylesheet" href="{{ asset('css/new_style.min.css?v='.env('ASSET_VERSION') ) }}">
    @yield('scripts')
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R9BDPYSVBK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-R9BDPYSVBK');
    </script>
</head>
<body>

<header>
    <div class="container nav-bar">
        <div class="header-info">
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
                    <p>&nbsp;info&nbsp;@prudentscores&nbsp;.com</p>
                </a>
            </div>
        </div>
        <div class="site-navi contact-info row">
            <div class="logo-block col-6 col-lg-3">
                <a href="/" title="Home">
                    <img src="{{asset('images/new/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="navigation-block col-6 col-lg-9 row">
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
                                    <li><a href="mailto:info@prudentscores.com"  class="company-email">&nbsp;info&nbsp;@prudentscores&nbsp;.com</a></li>
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
                                    <li><a href="{{route('blog')}}">Newsroom</a></li>
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
                <div class="social-media">
                    <div class="twitter-icon">
                        <a href="#twitter" rel="nofollow">
                            <svg viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.6183 1.90681C23.713 2.22025 22.7278 2.44584 21.713 2.5337C22.7666 2.03132 23.5556 1.23765 23.9319 0.301583C22.9433 0.773626 21.8602 1.10463 20.7308 1.27991C20.2587 0.874872 19.6878 0.552197 19.0535 0.331995C18.4193 0.111794 17.7354 -0.00121528 17.0444 9.85551e-06C14.2485 9.85551e-06 12 1.81895 12 4.05106C12 4.36451 12.0473 4.67795 12.1243 4.97953C7.93787 4.80381 4.20414 3.19858 1.72189 0.740882C1.2696 1.36092 1.03258 2.06692 1.0355 2.7854C1.0355 4.19116 1.92603 5.4307 3.28402 6.1597C2.48374 6.1344 1.7022 5.95785 1.00296 5.64441V5.69428C1.00296 7.66282 2.73669 9.29416 5.04734 9.66935C4.61349 9.75979 4.16718 9.80607 3.71893 9.80707C3.39053 9.80707 3.07988 9.78095 2.76627 9.74533C3.40532 11.3506 5.26627 12.5165 7.48224 12.5545C5.74852 13.6444 3.57692 14.2856 1.21893 14.2856C0.795858 14.2856 0.405325 14.2737 0 14.2357C2.23669 15.3874 4.89053 16.0522 7.74852 16.0522C17.0266 16.0522 22.1035 9.88306 22.1035 4.52836C22.1035 4.35264 22.1035 4.17692 22.0887 4.0012C23.071 3.42417 23.9319 2.70942 24.6183 1.90681Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="facebook-icon">
                        <a href="#facebook" rel="nofollow">
                            <svg viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.6172 0C5.09516 0 0.618164 3.59336 0.618164 8.02545C0.618164 12.0306 4.27416 15.3502 9.05516 15.9546V10.3458H6.51516V8.02545H9.05516V6.25727C9.05516 4.24428 10.5482 3.13425 12.8312 3.13425C13.9252 3.13425 15.0712 3.29077 15.0712 3.29077V5.26442H13.8072C12.5672 5.26442 12.1792 5.88405 12.1792 6.51892V8.02385H14.9502L14.5072 10.3442H12.1792V15.953C16.9602 15.3518 20.6161 12.0314 20.6161 8.02545C20.6161 3.59336 16.1392 0 10.6172 0Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="instagram-icon">
                        <a href="#instagram" rel="nofollow">
                            <svg viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7319 5.34961C8.89563 5.34961 7.39712 6.55233 7.39712 8.02612C7.39712 9.49991 8.89563 10.7026 10.7319 10.7026C12.5681 10.7026 14.0666 9.49991 14.0666 8.02612C14.0666 6.55233 12.5681 5.34961 10.7319 5.34961ZM20.7336 8.02612C20.7336 6.91777 20.7461 5.81945 20.6686 4.71311C20.591 3.42806 20.2258 2.28758 19.055 1.34789C17.8817 0.40619 16.4632 0.115047 14.8622 0.0528023C13.4812 -0.00944223 12.1128 0.000597234 10.7344 0.000597234C9.35344 0.000597234 7.98502 -0.00944223 6.60658 0.0528023C5.0055 0.115047 3.58454 0.408198 2.41375 1.34789C1.24046 2.28959 0.877715 3.42806 0.800163 4.71311C0.722611 5.82146 0.735119 6.91978 0.735119 8.02612C0.735119 9.13247 0.722611 10.2328 0.800163 11.3391C0.877715 12.6242 1.24296 13.7647 2.41375 14.7044C3.58705 15.6461 5.0055 15.9372 6.60658 15.9994C7.98752 16.0617 9.35594 16.0516 10.7344 16.0516C12.1153 16.0516 13.4837 16.0617 14.8622 15.9994C16.4632 15.9372 17.8842 15.644 19.055 14.7044C20.2283 13.7627 20.591 12.6242 20.6686 11.3391C20.7486 10.2328 20.7336 9.13448 20.7336 8.02612ZM10.7319 12.1443C7.89245 12.1443 5.6009 10.3051 5.6009 8.02612C5.6009 5.74717 7.89245 3.90795 10.7319 3.90795C13.5713 3.90795 15.8628 5.74717 15.8628 8.02612C15.8628 10.3051 13.5713 12.1443 10.7319 12.1443ZM16.073 4.70106C15.41 4.70106 14.8747 4.27137 14.8747 3.73928C14.8747 3.20719 15.41 2.77751 16.073 2.77751C16.7359 2.77751 17.2713 3.20719 17.2713 3.73928C17.2715 3.86563 17.2406 3.99077 17.1805 4.10753C17.1203 4.22429 17.0321 4.33038 16.9207 4.41972C16.8094 4.50906 16.6773 4.5799 16.5318 4.62817C16.3863 4.67645 16.2304 4.70122 16.073 4.70106Z" fill="white"/>
                            </svg>
                        </a>
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
</body>
</html>
