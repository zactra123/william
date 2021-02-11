@extends('layouts.layout1')

@section('meta')
    <title>Login to achieve all your reasonable credit-fitness goals</title>
    <meta name="description" content="Login - we help our clients escape stressful situations: bankruptcies,
        foreclosures, and other financial hardship. Improve your credit history!">
@endsection

@section('content')


    <section class="login">
        <img class="background-image" src="{{asset('images/new/login_bck.jpg')}}" alt="background">
        @if ($errors->any())

            <div class="alert alert-danger flash">
                <button type="button" class="close" data-dismiss="alert">×</button>
                @foreach($errors->all()  as $message)
                    <strong>{{ $message }}</strong>
                @endforeach
            </div>
        @endif
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="title">Login</h3>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="E-Mail Address"  autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password" data-toggle="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="login-information">
                    <label for="remember"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me!</label>

                    <a class="btn btn-link" style="text-decoration: underline" href="{{route('login.infoFirst')}}">
                        Forget Login Information?
                    </a>
                </div>
                <div class="login-information">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" style="text-decoration: underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <input class="basic-button login" type="submit" value="Login" name="">
            </form>

            <div class="login-social">
                <a class="login-facebook" href="{{route('facebook.login')}}" target="_blank" title="facebook">
                    <svg id="Bold" fill="#FFFFFF" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                    Log in with Facebook
                </a>
                <a class="login-google" href="{{route('google.login')}}" target="_blank" title="google">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
					<path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
						c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
						C103.821,274.792,107.225,292.797,113.47,309.408z"/>
                        <path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
						c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
						c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"/>
                        <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
						c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
						c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"/>
                        <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
						c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
						C318.115,0,375.068,22.126,419.404,58.936z"/>
					</svg>
                    Log in with Google
                </a>
            </div>
            <p class="login_sign-up">
                Don't have an account? <a href="{{route('register.Affiliate')}}">Sign up</a>
            </p>
            <!-- <img class="login-background" src="img/header_banner_img_bck.png" alt="background"> -->

        </div>


        <div class="chat" id="chat">
            <div class="header" id="chat_header">
                <svg width="368" viewBox="0 0 368 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26 22.5049C19.6 42.9049 6 50.0049 0 51.0049H368C352 49.5049 342 21.0049 341.5 21.5049C333.1 3.90485 315 -0.161814 307 0.00485253C223 0.171519 55 0.404853 55 0.00485253C37.4 0.404853 28.3333 15.1715 26 22.5049Z" fill="url(#paint0_linear)"/>
                    <defs>
                        <linearGradient id="paint0_linear" x1="16.5" y1="26" x2="353" y2="26" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F63565"/>
                            <stop offset="1" stop-color="#FA6642"/>
                        </linearGradient>
                    </defs>
                </svg>
                <p>
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.625 5.25H6.125C5.642 5.25 5.25 5.642 5.25 6.125C5.25 6.608 5.642 7 6.125 7H16.625C17.108 7 17.5 6.608 17.5 6.125C17.5 5.642 17.108 5.25 16.625 5.25Z" fill="white"/>
                        <path d="M13.125 8.75H6.125C5.642 8.75 5.25 9.142 5.25 9.625C5.25 10.108 5.642 10.5 6.125 10.5H13.125C13.608 10.5 14 10.108 14 9.625C14 9.142 13.608 8.75 13.125 8.75Z" fill="white"/>
                        <path d="M19.25 0H3.5C1.56975 0 0 1.56975 0 3.5V21C0 21.3395 0.196 21.6493 0.504 21.7927C0.62125 21.847 0.749 21.875 0.875 21.875C1.07625 21.875 1.27575 21.805 1.435 21.672L6.44175 17.5H19.25C21.1803 17.5 22.75 15.9303 22.75 14V3.5C22.75 1.56975 21.1803 0 19.25 0ZM21 14C21 14.9642 20.216 15.75 19.25 15.75H6.125C5.92025 15.75 5.7225 15.8218 5.565 15.953L1.75 19.1327V3.5C1.75 2.53575 2.534 1.75 3.5 1.75H19.25C20.216 1.75 21 2.53575 21 3.5V14Z" fill="white"/>
                        <path d="M24.5 7C24.017 7 23.625 7.392 23.625 7.875C23.625 8.358 24.017 8.75 24.5 8.75C25.466 8.75 26.25 9.53575 26.25 10.5V25.3032L23.296 22.9408C23.142 22.8183 22.9478 22.75 22.75 22.75H10.5C9.534 22.75 8.75 21.9642 8.75 21V20.125C8.75 19.642 8.358 19.25 7.875 19.25C7.392 19.25 7 19.642 7 20.125V21C7 22.9303 8.56975 24.5 10.5 24.5H22.442L26.5773 27.8092C26.7365 27.9352 26.9307 28 27.125 28C27.2528 28 27.3822 27.972 27.5047 27.9142C27.8075 27.7673 28 27.461 28 27.125V10.5C28 8.56975 26.4303 7 24.5 7Z" fill="white"/>
                    </svg>
                    <span id="chat_header_hide_text" >
						Talk to us, we are online!
					</span>
                </p>
            </div>
            <div class="body" id="chat_body">
                <div class="chat-title">
                    <h3>Chat</h3>
                    <div id="chat_close">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1988 12.0197L23.5439 2.6743C24.1521 2.06642 24.1521 1.08357 23.5439 0.475685C22.936 -0.132195 21.9532 -0.132195 21.3453 0.475685L11.9999 9.82109L2.65474 0.475685C2.04658 -0.132195 1.064 -0.132195 0.456124 0.475685C-0.152041 1.08357 -0.152041 2.06642 0.456124 2.6743L9.80125 12.0197L0.456124 21.3651C-0.152041 21.973 -0.152041 22.9559 0.456124 23.5637C0.759068 23.867 1.15739 24.0193 1.55543 24.0193C1.95347 24.0193 2.35152 23.867 2.65474 23.5637L11.9999 14.2183L21.3453 23.5637C21.6485 23.867 22.0466 24.0193 22.4446 24.0193C22.8426 24.0193 23.2407 23.867 23.5439 23.5637C24.1521 22.9559 24.1521 21.973 23.5439 21.3651L14.1988 12.0197Z" fill="#94A2B3"/>
                        </svg>
                    </div>

                </div>
                <form action="" id="chat_form">
                    <p>You can write your questions on our online portal. Our experts will help you find answers to your questions.</p>
                    <input type="text" placeholder="Your full name">
                    <div class="contact">
                        <label for="email" class="email-label">
                            <input type="email" id="email" placeholder="E-mail Address">
                        </label>
                        <p>or</p>
                        <label for="phone" class="phone-label">
                            <input type="tel" id="phone" disabled placeholder="Phone Number">
                        </label>
                    </div>
                    <textarea placeholder="write your message" cols="30" rows="10"></textarea>
                    <div class="form-submit">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection

