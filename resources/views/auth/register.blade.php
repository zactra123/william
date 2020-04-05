@extends('layouts.login-registration')

@section('content')

    <style>
        @media (max-width: 768px) {
            label {
                display:unset;
            }
        }
        @media (max-width: 768px) {
            .col-form-label {
                margin-right: 5px;
            }
            .gender{
                font-size: 11px;
            }
            .form-check-input {
                position: absolute;
                margin-top: 0.2rem;
                margin-left: -1.5rem;
            }
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

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body ">
                                <form method="POST" id="client-registration-form" action="{{ route('register') }}">
                                    @csrf
                                    <div class="text-center social-btn">
                                        <a href="{{route('facebook.login')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
                                        <a href="{{route('google.login')}}" class="btn btn-danger btn-block"><i class="fa fa-google-plus"></i> Sign in with <b>Google</b></a>
                                    </div>
                                    <div class="or-seperator"><i>or</i></div>
                                    <div class="form-group row m-1">
                                        <div class="col-md-12">
                                            <input id="first_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder="Full Name">
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone Number">
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"     placeholder="Address">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="Zip Code">
                                            @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="ssn" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}" required autocomplete="ssn" placeholder="Social Security Number">
                                            @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-12">

                                            <input placeholder="Date of Birth" name = 'dob' class="form-control" type="text" id="date">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    {{--Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']);--}}

                                    <div class="form-group row m-1">

                                        <div class="col-md-12 ">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="pdf-upload client-tab">
                                        <input type="hidden" name="role" class="form-control" value="client">

                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-12">
                                            <input id="referred_by" type="text" class="form-control" name="referred_by" value="{{ old('referred_by') }}" autocomplete="referred_by" placeholder="Referred By (if any)">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1 gender">
                                        <div class="col-md-2">
                                            <label for="gender" class="col-form-label text-md-center">  Gender  </label>
                                        </div>
                                        <div class="col-md-10 m-0 p-0">
                                            <label for="male" class="col-md-3 col-form-label">Male:
                                                {{Form::radio('sex','M', $user->clientDetails->sex??''=='M', ['class'=>'form-check-input'])}}
                                            </label>

                                            <label for="female" class="col-md-3  col-form-label ">Female:
                                                {{Form::radio('sex','O', $user->clientDetails->sex??''=='F',['class'=>'form-check-input '])}}
                                            </label>
                                            <label for="other" class="col-md-3  col-form-label  ml-1">  Non-Binary:
                                                {{Form::radio('sex','F', $user->clientDetails->sex??''=='O', ['class'=>'form-check-input '])}}
                                            </label>
                                        </div>
                                        @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
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



    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" defer></script>

@endsection


