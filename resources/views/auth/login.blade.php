@extends('layouts.login')

@section('content')
    <style>
        .head{
            background-color:  #0c71c3;
            /*border-color:#1a41ad;*/
            color: #FFFFFF;
            font-size: large;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size: large;
            padding: 0.375rem 0.75rem;
        }
        .or-seperator {
            margin: 20px 0 10px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }
    </style>

    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card">
                            {{--<div class="card-header"><div class="head"> {{ __('Login') }} </div></div>--}}
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="text-center social-btn">
                                        <a href="{{route('facebook.login')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
                                        <a href="{{route('google.login')}}" class="btn btn-danger btn-block"><i class="fa fa-google-plus"></i> Sign in with <b>Google</b></a>
                                    </div>
                                    <div class="or-seperator"><i>or</i></div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">
                                        <div class="col-md-11">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">
                                        <div class="col-md-8 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label " for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection
