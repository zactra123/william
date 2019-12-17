@extends('layouts.client')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Credentials</h1>
                        {!! Form::open(['route' => ['client.credentialsStore'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                        @csrf
                        <div class="form-group row font">

                                {{ Form::text('client[ck_login]', old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your Credit Karma login']) }}

                        </div>
                        <div class="form-group row font">

                                {{ Form::text('client[ck_password]', old('client.ck_pass'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your Credit Karma password']) }}
                        </div>
                        <div class="form-group row font">

                            {{ Form::text('client[ex_login]', old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your Experian login']) }}

                        </div>
                        <div class="form-group row font">

                            {{ Form::text('client[ex_password]', old('client.ck_pass'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your Experian password']) }}
                        </div>
                        <div class="form-group row font">

                            {{ Form::text('client[tu_login]', old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your TransUnion login']) }}

                        </div>
                        <div class="form-group row font">

                            {{ Form::text('client[tu_password]', old('client.ck_pass'), ['class' => 'form-control m-input', 'placeholder' => 'Enter your TransUnion password']) }}
                        </div>





                        <div class="form-group row mb-0 font">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>


                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection











