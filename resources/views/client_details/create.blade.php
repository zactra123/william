@extends('layouts.client')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Add Your Details</h1>
                        {!! Form::open(['route' => ['client.details.store'], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}

                        @csrf
                        <div class="form-group row font">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> First Name: </label>

                            <div class="col-md-6">
                                {{ Form::text('client[first_name]', $user->first_name??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Last Name : </label>

                            <div class="col-md-6">
                                {{ Form::text('client[last_name]', $user->last_name??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> DOB:  </label>

                            <div class="col-md-6">
                                {{ Form::date('client[dob]', $user->clientDetails->dob??'', ['class' => 'form-control m-input']) }}

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  SEX:  </label>

                            <div class="col-md-8">
                                <label for="password" class="col-md-3 col-form-label text-md-center">  Male:  </label>

                                <label for="password" class="col-md-3 col-form-label text-md-center">  Female:  </label>

                                <label for="password" class="col-md-3 col-form-label text-md-center">  Other:  </label>

                            </div>
                            <label for="password" class="col-md-4 col-form-label text-md-right">  </label>
                            <div class="col-md-8">

                                <label for="Sex" class="col-md-3 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','M', $user->clientDetails->sex??''=='M')}}
                                </label>

                                <label for="Sex" class="col-md-3 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','F', $user->clientDetails->sex??''=='F')}}
                                </label>

                                <label for="Sex" class="col-md-3 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','O', $user->clientDetails->sex??''=='O')}}
                                </label>

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> SSN:  </label>

                            <div class="col-md-6">
                                {{ Form::text('client[ssn]', $user->clientDetails->ssn??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  State:  </label>

                            <div class="col-md-6">
                                {{ Form::text('client[state]', $user->clientDetails->state??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your state']) }}

                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  City:  </label>

                            <div class="col-md-6">
                                {{ Form::text('client[city]', $user->clientDetails->city??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your city']) }}
                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">   Address:  </label>

                            <div class="col-md-6">
                                {{ Form::text('client[address]', $user->clientDetails->address??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">   Zip code:  </label>

                            <div class="col-md-6">
                                {{ Form::text('client[zip]', $user->clientDetails->zip??'', ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                            </div>
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


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            // $('#clientDetailsForm').validate({
            //     rules:{
            //         first_name:{
            //             required:true,
            //             minLength:3
            //         },
            //         last_name:{
            //             required:true,
            //             minLength:3
            //         },
            //         dob:{
            //             required:true,
            //             date:true
            //         },
            //         ssn:{
            //             required:true,
            //             length:10
            //         },
            //         state:{
            //             required:true,
            //             minLength:2
            //         },
            //         city:{
            //             required:true,
            //         },
            //         address:{
            //             required:true,
            //         },
            //         zip:{
            //             required:true,
            //         }
            //     },
            //     message:{
            //         first_name:{
            //             required:'First name is required fill',
            //             minLength:3
            //         },
            //         last_name:{
            //             required:'Last name is required fill',
            //             minLength:3
            //         },
            //         dob:{
            //             required:'Date of birth is required fill',
            //             date:true
            //         },
            //         ssn:{
            //             required:'Social security number is required fill',
            //             length:10
            //         },
            //         state:{
            //             required:'State is required fill',
            //             minLength:2
            //         },
            //         city:{
            //             required:'City is required fill',
            //         },
            //         address:{
            //             required:'Address is required fill',
            //         },
            //         zip:{
            //             required:'Zip code is required fill',
            //         }
            //     }
            // });
        })


    </script>
@endsection












