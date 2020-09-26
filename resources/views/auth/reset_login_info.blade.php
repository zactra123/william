@extends('layouts.layout')

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> RESET LOGIN INFORMATION</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Change Password</span>
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
                            <h4>Step 3: Reset password</h4>
                        </div>
                        @if ($errors->any())

                            <div class="alert alert-danger flash">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                @foreach($errors->all()  as $message)
                                    <strong>{{ $message }}</strong>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body ">
                            {!! Form::open(['route' => 'login.infoFinishSend', 'method' => 'POST', 'id' => 'loginInformation3',  'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf


                            <div class="form-group row font justify-content-center">
                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12">
                                        <h4>  YOUR EMAIL IS : {{$client->email}}</h4>

                                    </div>
                                </div>
                            </div>
                            <input name="id" type="hidden" value="{{$client->id}}">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>


                            <div class="col"><input type="submit" value="Finish" class="ms-ua-submit"></div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>

    <script>
        $(document).ready(function($){




            $('#loginInformation3').validate({
                rules: {

                    "password": {
                        required: true,
                        minlength: 8
                    },
                    "password_confirmation": {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    "password_confirmation": {
                        equalTo: "Password confirmation doesn't match Password"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "sex") {
                        error.insertAfter($(element).closest("div"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            })
        });

    </script>

@endsection
