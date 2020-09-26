@extends('layouts.layout')

@section('content')



    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Login</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Login</span>
        </div>
    </section>



    <!-- Login Area Start -->
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <h3>Login</h3>
                        </div>
                        @if ($errors->any())

                            <div class="alert alert-danger flash">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                @foreach($errors->all()  as $message)
                                    <strong>{{ $message }}</strong>
                                @endforeach
                            </div>
                        @endif
                        <div class="ms-ua-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="E-Mail Address"  autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 ms-us-sp">
                                        <div class="form-group form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="checkbox">Remember Me!</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-xs-12 ms-us-sp">

                                        <a class="btn btn-link" style="text-decoration: underline" href="{{route('login.infoFirst')}}">
                                            Forget Login Information?
                                        </a>

{{--                                        @if (Route::has('password.request'))--}}
{{--                                            <a class="btn btn-link" style="text-decoration: underline" href="{{ route('password.request') }}">--}}
{{--                                                {{ __('Forgot Your Password?') }}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}

                                    </div>
                                </div>
                                <div class="col">
                                    <input type="submit" value="Login" class="ms-ua-submit">

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <div class="ms-ua-social">
                                            <a href="{{route('google.login')}}"style="color: white" > Login with <i class="fa fa-google"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <div class="ms-ua-social msuas-last">
                                            <a href="{{route('facebook.login')}}" style="color: white">Login with <i class="fa fa-facebook-f"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>











@endsection
