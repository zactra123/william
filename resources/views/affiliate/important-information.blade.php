@extends('layouts.layout')

@section('content')
    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Important Information</h2>
            <span class="sub-title"><a href="#">Home</a> &gt; Impotant Information</span>
        </div>
    </section>
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>


                    <div class="col-md-6 col-sm-12">
                        <div class="ms-ua-box">
                            {!! Form::open(['route' => ['affiliate.important'], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}

                            @csrf
                            <div class="form-group row font justify-content-center">

                                <div class="form-group">
                                    <div class="col-md-12" class="col-md-12 ">
                                        {{ Form::text('full_name',  $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'FULL NAME']) }}
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                {{ Form::text('business_name',  $client->clientDetails->business_name, ['class' => 'form-control m-input', 'id'=>"business_name", 'placeholder' => 'COMPANY NAME (IF ANY)']) }}

                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-6" style="margin: 0">
                                        {{ Form::text('ssn',  $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'id'=>"ssn", 'placeholder' => 'SOCIAL SECURITY NUMBER']) }}

                                        @error('ssn')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1" style="margin: 0; padding: 0">
                                        OR
                                    </div>
                                    <div class="col-md-5">
                                        {{ Form::text('ein',  $client->clientDetails->ein, ['class' => 'form-control m-input ein', 'id'=>"ein", 'placeholder' => 'EIN NUMBER']) }}

                                        @error('ssn')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="ADDRESS">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::text('phone_number',  $client->clientDetails->phone_number, ['class' => 'form-control m-input phone', 'id'=>"phone_number", 'placeholder' => 'PHONE NUMBER']) }}

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="secret_questions_id" id="secret_question">
                                    <option disabled="disabled" selected="selected">Choose Secret Question</option>

                                    @foreach($secrets as $value)

                                        <option value="{{$value->id}}" {{$client->secret_questions_id == $value-> id ? "selected" : ""}}>{{$value->question}}</option>
                                    @endforeach
                                </select>
                                @error('sex')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input id="secret_answer" type="text" class="form-control phone" name="secret_answer" value="{{ !empty(old('secret_answer')) ? old('secret_answer') : $client->secret_answer  }}" required autocomplete="secret_answer" placeholder="PLEASE ANSWER IN SECRET QUESTION">
                                @error('secret_answer')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="col"><input type="submit" value="Save" class="ms-ua-submit"></div>
                            {!! Form::close() !!}

                        </div>

                    </div>



            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>

    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>
    <script src="{{ asset('js/site/clients/autocomplete.js?v=2') }}" defer></script>
    <script>
        $(document).ready(function($){
            $('.ein').mask('00-0000000')
            $('.ssn').mask('000-00-0000')


            $('#phone_number').mask('(000) 000-0000');

            $.validator.addMethod("valid_full_name", function(value, element) {
                return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
            }, "Please write your full name in this pattern first name middle name last name!!");


            $('#clientDetailsForm').validate({
                rules: {
                    "full_name": {
                        required: true,
                        valid_full_name:true,
                    },
                    "phone_number": {
                        required: true
                    },

                    "address": {
                        required: true
                    },


                    "secret_question": {
                        required: true
                    },
                    "secret_answer": {
                        required: true
                    },

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
