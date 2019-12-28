@extends('layouts.client')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Your Details</h1>
                        {!! Form::open(['route' => ['client.details.update', $user->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                        @method('PUT')
                        @csrf

                        <div class="form-group row m-1">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> First Name: </label>

                            <div class="col-md-8">
                                {{ Form::text('client[first_name]', $user->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}

                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Last Name : </label>

                            <div class="col-md-8">
                                {{ Form::text('client[last_name]', $user->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Phone Number : </label>

                            <div class="col-md-8">
                                {{ Form::text('client[phone_number]', $user->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'Enter your phone_number']) }}

                            </div>
                        </div>




                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Street   Address:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[address]', $user->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                            </div>
                        </div>


                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  City:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[city]', $user->clientDetails->city, ['class' => 'form-control m-input', 'placeholder' => 'Enter your city']) }}
                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  State:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[state]', $user->clientDetails->state, ['class' => 'form-control m-input', 'placeholder' => 'Enter your state']) }}

                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">   Zip code:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                            </div>
                            
                        </div>
                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> DOB:  </label>

                            <div class="col-md-8">
                                {{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input']) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  Gender:  </label>

                            <div class="col-md-8">
                                <label for="password" class="col-md-4 col-form-label text-md-center">  Male:  </label>

                                <label for="password" class="col-md-4 col-form-label text-md-center">  Female:  </label>

                                <label for="password" class="col-md-4 col-form-label text-md-center">  Other:  </label>

                            </div>
                            <label for="password" class="col-md-4 col-form-label text-md-right">  </label>
                            <div class="col-md-8">

                                <label for="Sex" class="col-md-4 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','M', $user->clientDetails->sex=='M')}}
                                </label>

                                <label for="Sex" class="col-md-4 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','F', $user->clientDetails->sex=='F')}}
                                </label>

                                <label for="Sex" class="col-md-4 col-form-label text-md-center">
                                    {{Form::radio('client[sex]','O', $user->clientDetails->sex=='O')}}
                                </label>

                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> SSN:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Referred by:  </label>

                            <div class="col-md-8">
                                {{ Form::text('client[referred_by]', $user->clientDetails->referred_by, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}

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

@endsection












