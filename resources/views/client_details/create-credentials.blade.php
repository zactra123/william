@extends('layouts.client')


@section('content')
    <style>
        h4{
            color: #0c71c3;
        }
        label{
            color: #0c71c3;
        }
    </style>

    <div class="fullwidth-block">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Credentials</h1>
                    </div>
                    <div class="card-body w-100">
                        {!! Form::open(['route' => ['client.credentialsStore'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                        @csrf
                        <div>
                            <div class="form-group  m-1 font">
                                {{ Form::text('client[ck_login]', !empty($credential->ck_login) ? $credential->ck_login : old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Credit Karma Login']) }}
                            </div>
                            <div class="form-group  m-1 font">
                                {{ Form::text('client[ck_password]', !empty($credential->ck_password) ? $credential->ck_password  : old('client.ck_password'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Credit Karma Password']) }}
                            </div>
                        </div>
                        <div>
                            <div class="form-group m-1  font">
                                {{ Form::text('client[ex_login]', !empty($credential->ex_login) ? $credential->ex_login : old('client.ex_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Experian Login']) }}
                            </div>
                            <div class="form-group  m-1 font">
                                {{ Form::text('client[ex_password]', !empty($credential->ex_password) ? $credential->ex_password : old('client.ex_password'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Experian Password']) }}
                            </div>
                            <div class="form-group  m-1 font">
                                {{ Form::text('client[ex_question]', !empty($credential->ex_question) ? $credential->ex_question : old('client.ex_question'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Experian Question']) }}
                            </div>
                            <div class="form-group m-1  font">
                                {{ Form::text('client[ex_answer]', !empty($credential->ex_answer) ? $credential->ex_answer : old('client.ex_answer'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your Experian Answer']) }}
                            </div>
                        </div>
                        <div>
                            <div class="form-group  m-1 font">
                                {{ Form::text('client[tu_login]', !empty($credential->tu_login) ? $credential->tu_login : old('client.tu_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your TransUnion Login']) }}

                            </div>
                            <div class="form-group m-1  font">
                                {{ Form::text('client[tu_password]', !empty($credential->tu_password) ? $credential->tu_password : old('client.tu_password'), ['class' => 'form-control m-input', 'placeholder' => 'Enter Your TransUnion Password']) }}
                            </div>
                        </div>
                        <div class="form-group row mb-0 font">
                            <div class="col-md-9 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>





{{--    <div class="container fon">--}}
{{--        <div class="row pt-4 justify-content-center">--}}
{{--           --}}
{{--        </div>--}}
{{--    </div>--}}


@endsection











