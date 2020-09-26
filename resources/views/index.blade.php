<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth

                @if(Auth::user()->role == 'client')
                    @if(empty(Auth::user()->clientDetails))
                        <a href="{{ url('/client/details/create') }}">Home</a>
                    @else
                        <a href="{{ url('/client/details') }}">Home</a>
                    @endif
                @elseif((Auth::user()->role == 'admin'))

                    <a href="{{ url('/admin') }}">Home</a>
                @else

                    <a href="{{ url('/owner') }}">Home</a>
                @endif
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">

        </div>
    </div>
</div>
</body>
</html>



<h1>PRIVACY POLICY</h1>
<h3>Last updated<h2>

        <h2> INTRODUCTION </h2>
        <p>
            Thank you for choosing to be part of our community at {{env("PROJECT")}} (“company”,
            “we”, “us”, or “our”). We are committed to protecting your personal information
            and your right to privacy. If you have any questions or concerns about our
            policy, or our practices with regards to your personal information, please
            contact us at info@prudentscores.com.
        </p>
        <p>
            When you visit our website http://www.prudentscores.com, mobile application,
            Facebook application, and use our services,
            you trust us with your personal information. We take your privacy very seriously.
            In this privacy notice, we describe our privacy policy.We seek to explain to you
            in the clearest way possible what information we collect, how we use it and what
            rights you have in relation to it. We hope you take some time to read through it
            carefully, as it is important. If there are any terms in this privacy policy that
            you do not agree with, please discontinue use of our site and our services.
        </p>
        <p>
            This privacy policy applies to all information collected through our websites
            (http://www.prudentscores.com), mobile application, Facebook application ("Apps"),
            and/or any related services, sales, marketing or events (we refer to them
            collectively in this privacy policy as the "Services").
        </p>

        <p>
            Please read this privacy policy carefully as it will help you make informed
            decisions about sharing your personal information with us.
            Thisprivacy policy was createdusing Termly’s Privacy Policy Generator.
        </p>

        <h3> TABLE OF CONTENTS</h3>
        <p><a href=""> 1.	WHAT INFORMATION DO WE COLLECT? </a></p>
        <p><a href=""> 2.	HOW DO WE USE YOUR INFORMATION? </a></p>
        <p><a href=""> 3.	WILL YOUR INFORMATION BE SHARED WITH ANYONE?</a></p>
        <p><a href=""> 4.	DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</a></p>
        <p><a href=""> 5.	DO WE USE GOOGLE MAPS?</a></p>
        <p> <a href=""> 6.	HOW DO WE HANDLE YOUR SOCIAL LOGINS?</a></p>
        <p><a href=""> 7.	IS YOUR INFORMATION TRANSFERRED INTERNATIONALLY?</a></p>
        <p> <a href=""> 8.	WHAT IS OUR STANCE ON THIRD-PARTY WEBSITES?</a></p>
        <p><a href=""> 9.	HOW LONG DO WE KEEP YOUR INFORMATION? </a></p>
        <p><a href=""> 10.	HOW DO WE KEEP YOUR INFORMATION SAFE? </a></p>
        <p> <a href=""> 11.	DO WE COLLECT INFORMATION FROM MINORS?</a></p>
        <p> <a href=""> 12.	WHAT ARE YOUR PRIVACY RIGHTS?</a></p>
        <p> <a href=""> 13.	DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS? </a></p>
        <p> <a href=""> 14.	DO WE MAKE UPDATES TO THIS POLICY?</a></p>
        <p> <a href=""> 15.	HOW CAN YOU CONTACT US ABOUT THIS POLICY?</a></p>


        <h2> WHAT INFORMATION DO WE COLLECT? </h2>

        <p class="font-weight-bold font-italic">Personal information you disclose to us  </p>
        <p>
            <span class="font-weight-bold font-italic">In Short:</span>
            <span class="font-italic">
                                           We collect personal information that you voluntarily provide  to us such as name,
                                        address, contact information, passwords and security data, payment information,
                                        and social media login data.

            </span>
        </p>

