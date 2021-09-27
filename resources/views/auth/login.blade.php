@extends('layouts.auth')

@section('meta')
    <title>Login to achieve all your reasonable credit-fitness goals</title>
    <meta name="description" content="Login - we help our clients escape stressful situations: bankruptcies,
        foreclosures, and other financial hardship. Improve your credit history!">
    <meta name="keywords" content="login credit repair, lexington law credit repair login, alex miller credit repair login, login prudent scores">

@endsection

@section('content')
    <section class="py-5 container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <form class="px-4 py-4 login-form-border" method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger flash">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    @foreach($errors->all()  as $message)
                        <strong>{{ $message }}</strong>
                    @endforeach
                </div>
            @endif

            <h1 class="fs-25 bold theme-color-dark">Sign In</h1>
            <p>Welcome back, Please enter following information to get login!</p>
            <br>
            <div class="form-group">
              <input type="email" name="email"  class="@error('email')  is-invalid @enderror form-control fs-12" autofocus value="{{ old('email') }}" id="email" placeholder="E-Mail-adress">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" name="password" class="@error('password') is-invalid @enderror form-control fs-12" id="password" placeholder="Password" autocomplete="current-password" data-toggle="password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="remember" class="fs-12"><input type="checkbox" id="remember" name="remember"> Remember me!</label>
            </div>
            {{-- <div class="login-information">
            </div> --}}
            <div class="row text-center justify-content-center">
              <div class="basic-button login-box">
                  <input class="login" type="submit" value="Login">
              </div>

            </div>
            <div class="form-group mt-3">
              <p>
                @if (Route::has('password.request'))
                    <a class="forgot text-left fs-12" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <a class="forgot fs-12 float-right pull-right" id="forgot_login" href="{{route('login.infoFirst')}}">Forget Login Information?</a>
              </p>
            </div>

            <div class="mt-3">
              <p class="text-center">
                <a href="{{route('facebook.login')}}">
                  <button type="button" class="login-btn-social btn-login-facebook"><svg id="Bold" fill="#FFFFFF" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg></button>
                </a>
                <a href="{{route('google.login')}}">
                  <button type="button" class="login-btn-social ml-3">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                  </button>
               </a>
              </p>
            </div>
          </form>

          <p class="pt-4 fs-12 text-center">
              <span class="fs-18">Don't have an account? <a class="fs-20 theme-color-dark" href="{{route('register')}}">Sign Up</a></span>
          </p>
        </div>
      </div>
    </section>
@endsection
