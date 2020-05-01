@extends('layouts.layout')

@section('content')

    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Register</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Register</span>
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
                            <h3>Registration</h3>
                        </div>
                        <div class="ms-ua-form">
                            <form method="POST" id="client-registration-form" action="{{ route('register') }}">
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder="Full Name">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone Number">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"     placeholder="Current Address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="Zip Code">
                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input id="ssn" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}" required autocomplete="ssn" placeholder="Social Security Number">
                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="dob" class="form-control" id="dob" placeholder="Date Of birth">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <input type="hidden" name="role" class="form-control" value="client">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input id="referred_by" type="text" class="form-control" name="referred_by" value="{{ old('referred_by') }}" autocomplete="referred_by" placeholder="Referred By (if any)">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="sex" id="gender">
                                        <option disabled="disabled" selected="selected">Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Non-Binary</option>
                                    </select>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="col"><input type="submit" value="Register" class="ms-ua-submit"></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <div class="ms-ua-social">
                                            <a href="{{route('facebook.login')}}"style="color: white" > Register with <i class="fa fa-google"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <div class="ms-ua-social msuas-last">
                                            <a href="{{route('google.login')}}" style="color: white">Register with <i class="fa fa-facebook-f"></i></a>
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


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" defer></script>

@endsection


