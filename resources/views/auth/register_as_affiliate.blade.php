@extends('layouts.layout')

@section('content')

    <style>
        .pass_show{position: relative}
        .pass_show .ptxt {
            position: absolute;
            /*top: 50%;*/
            right: 10px;
            z-index: 1;
            color: black;
            font-weight: bold;
            margin-top: -25px;
            cursor: pointer;
            transition: .3s ease all;
        }
        .pass_show .ptxt:hover{color: #333333;}

        .form-control[readonly]{
            background-color: #fff !important;
        }
    </style>


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Register</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Register Affilate</span>
        </div>
    </section>
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
                            <form method="POST" id="registration-form" action="{{ route('register') }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}"  placeholder="FULL NAME">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('referred_by') }}"  placeholder="COMPANY NAME (IF ANY)">
                                </div>
                                <div class="form-group ">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5" style="margin: 0">
                                            <input id="ssn" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}"  placeholder="SOCIAL SECURITY NUMBER">
                                            @error('ssn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2" style="margin: 0; padding: 0; text-align: center;">
                                            OR
                                        </div>
                                        <div class="col-md-5">
                                            <input id="ssn" type="text" class="form-control ein" name="ein" value="{{ old('ein') }}"  placeholder="EIN NUMBER">
                                            @error('ssn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="FULL ADDRESS"  autocomplete="new-full_address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}"  placeholder="PHONE NUMBER">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="role" class="form-control" value="affiliate">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="E-MAIL ADDRESS">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group pass_show">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="PASSWORD" readonly
                                               onfocus="this.removeAttribute('readonly');">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="CONFIRM PASSWORD" readonly
                                            onfocus="this.removeAttribute('readonly');">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="secret_questions_id" id="secret_question">
                                        <option disabled="disabled" selected="selected">CHOOSE SECRET QUESTION</option>

                                        @foreach($secrets as $value)

                                            <option value="{{$value->id}}">{{$value->question}}</option>
                                        @endforeach
                                        <option value="other">
                                            YOUR OWN QUESTION

                                        </option>
                                    </select>
                                    @error('secret_question')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="form-group hidden" id="custom-secret-question">
                                    <input name="own_secter_question" type="text" class="form-control" placeholder="OWN QUESTION">
                                </div>
                                <div class="form-group">
                                    <input id="secret_answer" type="text" class="form-control" name="secret_answer" value="{{ old('secret_answer') }}"  placeholder="PLEASE ANSWER IN SECRET QUESTION">
                                    @error('secret_answer')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Register" class="ms-ua-submit">
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 text-center">
                                    <div class="ms-ua-social">
                                        <a href="{{route('google.login', ['users'=>'affiliate'])}}"style="color: white" > Register with <i class="fa fa-google"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 text-center">
                                    <div class="ms-ua-social msuas-last">
                                        <a href="{{route('facebook.login', ['users'=>'affiliate'])}}" style="color: white">Register with <i class="fa fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <style>
        .popover {
            width: fit-content;
        }
    </style>


    <script type="text/javascript">

        $(document).ready(function(){
            $('.pass_show').append('<span class="ptxt"><i class="fa fa-eye"></span>');
        });

        $(document).on('click','.pass_show .ptxt', function(){
            if($("#password").attr('type') == 'password'){

                $("#password").attr('type', 'text')
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
            }else{

                $("#password").attr('type', 'password')
                $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye')
            }
        });

    </script>

    <script id="password-requirements" type="text/html">
        <div>
            <ul>
                <li><i class="fa {length-class}"></i> Must be between 8 and 20</li>
                <li><i class="fa {letters-class}"></i> Must contain both upper and lower case letters</li>
                <li><i class="fa {digit-class}"></i> Must contain at least one number digit</li>
                <li><i class="fa {special-class}"></i> Must contain at least one special character</li>
            </ul>
        </div>
    </script>
{{--    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places"></script>--}}
{{--    <script>--}}
{{--        autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});--}}
{{--        google.maps.event.addListener(autocomplete, 'place_changed', function() {--}}
{{--            var place = autocomplete.getPlace();--}}
{{--            $("#address").val(place.formatted_address)--}}
{{--            for (var i = 0; i < place.address_components.length; i++) {--}}
{{--                for (var j = 0; j < place.address_components[i].types.length; j++) {--}}
{{--                    if (place.address_components[i].types[j] == "postal_code") {--}}
{{--                        $("#zip").val(place.address_components[i].long_name);--}}

{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}

{{--    </script>--}}


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>

    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" defer></script>



@endsection
