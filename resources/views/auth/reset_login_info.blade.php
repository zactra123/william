@extends('layouts.layout1')

@section('content')

    <section class="register">
        {{-- <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background"> --}}
        <div class="register-form" data-id="1">
            <div class="title">
                <h3 >Rest Login information</h3>
            </div>
            <div class="register_form">
                <div class="title">
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

                {!! Form::open(['route' => 'login.infoFinishSend', 'method' => 'POST', 'id' => 'loginInformation3',  'class' => 'm-form m-form--label-align-right']) !!}
                @csrf
                <div class="form-group w-100 mb-0">
                    <div class="col-md-12 p-0">
                        <h4>  YOUR EMAIL IS : {{$client->email}}</h4>
                    </div>
                </div>
                <input name="id" type="hidden" value="{{$client->id}}">
                <div class="form-group w-100 mb-0">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group w-100 mb-0">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="basic-button"><input type="submit" value="Finish" class="login"></div>
                {!! Form::close() !!}


            </div>
        </div>

        @include('helpers.chat')
    </section>


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
