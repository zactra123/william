@extends('layouts.layout1')

@section('content')

    <section class="register">
        <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background">
        <div class="register-form" data-id="1">
            <div class="title">
                <h3 >Rest Login information</h3>
            </div>
            <div class="register_form">
                @if ($message = Session::get('success'))


                    <div class="w-25 alert alert-success alert-block flash">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($errors->any())

                    <div class="alert alert-danger flash">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach($errors->all()  as $message)
                            <strong>{{ $message }}</strong>
                        @endforeach
                    </div>
                @endif
                <div class="title">
                    <h4>Step 1: Enter Personal Information</h4>
                </div>
                {!! Form::open(['route' => 'login.infoFirstSend', 'method' => 'POST', 'id' => 'loginInformation1',  'class' => 'm-form m-form--label-align-right']) !!}
                @csrf
                <div class="form-group mb-0 w-100">
                    <div class="col-md-12 p-0">
                        {{ Form::text('client[ssn]', old('client[ssn]'), ['class' => 'form-control m-input ssn', 'id' => 'ssn','placeholder' => 'SOCIAL SECURITY NUMBER']) }}
                    </div>
                </div>
                <div class="form-group mb-0 w-100">
                    <div class="col-md-12 p-0">
                       {{ Form::text('client[ssn_confirm]', old('client[ssn_confirmweb]'), ['class' => 'form-control m-input ssn', 'id' => 'ssn_confirm','placeholder' => 'CONFIRM SOCIAL SECURITY NUMBER']) }}
                    </div>
                </div>
                <div class="form-group text-center"> OR </div>

                <div class="form-group mb-0 w-100">
                    <div class="col-md-12 p-0">
                        {{ Form::text('client[ein]', old('client[ein]'), ['class' => 'form-control m-input ein', 'id' => 'ein','placeholder' => 'EIN NUMBER']) }}
                    </div>
                </div>
                <div class="form-group mb-0 w-100">
                    <div class="col-md-12 p-0">
                        {{ Form::text('client[ein_confirm]', old('client[ein_confirm]'), ['class' => 'form-control m-input ein', 'id' => 'ein_confirm', 'placeholder' => 'CONFIRM EIN']) }}
                    </div>
                </div>
                <div class="form-group mb-0 w-100">
                    <div class="col-md-12 p-0">
                        {{ Form::text('client[last_name]', old('client[last_name]'), ['class' => 'form-control m-input',  'placeholder' => 'LAST NAME']) }}
                    </div>
                </div>
                <div class="basic-button"><input type="submit" value="Next Step" class="login"></div>
                {!! Form::close() !!}
            </div>
        </div>

        @include('helpers.chat')
    </section>


    <script>
        $(document).ready(function(){

            $(".ssn").mask("999-99-9999");
            $(".ein").mask("99-9999999");

            $.validator.addMethod("one_option", function(value, element) {

                return $("[name='" +element.name+ "']").length < 2;
            }, "Please choose one of the options");


            $("#loginInformation1").validate({
                rules: {
                    "client[last_name]": {
                        required:true,
                        one_option: true
                    },
                    "client[ssn]": {
                        required: '#ein:blank'
                    },
                    "client[ein]": {
                        required: '#ssn:blank'
                    },
                    "client[ssn_confirm]": {
                        required: '#ein_:blank',
                        equalTo: "#ssn"
                    },
                    "client[ein_confirm]": {
                        required: '#ssn_:blank',
                        equalTo: "#ein"
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".form-group"));
                }
            })
        })

    </script>

@endsection
