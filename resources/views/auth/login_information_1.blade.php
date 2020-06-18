@extends('layouts.layout')

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> RESET LOGIN INFORMATION</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; RESET LOGIN INFORMATION</span>
        </div>
    </section>



    <!-- Login Area Start -->
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="ms-ua-box">
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


                        <div class="ms-ua-title">
                            <h4>Step 1: Enter Personal Information</h4>
                        </div>
                        <div class="card-body ">
                            {!! Form::open(['route' => 'login.infoFirstSend', 'method' => 'POST', 'id' => 'loginInformation1',  'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf


                            <div class="form-group row font justify-content-center">
                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12">
                                        {{ Form::text('client[ssn]', old('client[ssn]'), ['class' => 'form-control m-input ssn', 'id' => 'ssn','placeholder' => 'SOCIAL SECURITY NUMBER']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row font justify-content-center">
                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12">
                                        {{ Form::text('client[ssn_confirm]', old('client[ssn_confirmweb]'), ['class' => 'form-control m-input ssn', 'placeholder' => 'CONFIRM SOCIAL SECURITY NUMBER']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row font justify-content-center">

                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12" class="col-md-12 ">
                                        {{ Form::text('client[last_name]', old('client[last_name]'), ['class' => 'form-control m-input',  'placeholder' => 'LAST NAME']) }}
                                    </div>
                                </div>

                            </div>

                            <div class="col"><input type="submit" value="Next Step" class="ms-ua-submit"></div>
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
        $(document).ready(function(){

            $(".ssn").mask("999-99-9999");

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
                        required:true,
                        one_option: true
                    },
                    "client[ssn_confirm]": {
                        required:true,
                        equalTo: "#ssn"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".form-group"));
                }
            })
        })

    </script>

@endsection
