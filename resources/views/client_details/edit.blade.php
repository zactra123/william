@extends('layouts.client')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">


            @if(empty($uploadUserDetail))
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>Your Details</h1>
                            {!! Form::open(['route' => ['client.details.update', $user->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                            @method('PUT')
                            @csrf

                            <div class="form-group row font">
                                <label for="email" class="col-md-4 col-form-label text-md-right"> First Name: </label>

                                <div class="col-md-8">
                                    {{ Form::text('client[first_name]', $user->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Last Name : </label>

                                <div class="col-md-8">
                                    {{ Form::text('client[last_name]', $user->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> DOB:  </label>

                                <div class="col-md-8">
                                    {{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input']) }}

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  SEX:  </label>

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

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> SSN:  </label>

                                <div class="col-md-8">
                                    {{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  State:  </label>

                                <div class="col-md-8">
                                    {{ Form::text('client[state]', $user->clientDetails->state, ['class' => 'form-control m-input', 'placeholder' => 'Enter your state']) }}

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  City:  </label>

                                <div class="col-md-8">
                                    {{ Form::text('client[city]', $user->clientDetails->city, ['class' => 'form-control m-input', 'placeholder' => 'Enter your city']) }}
                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">   Address:  </label>

                                <div class="col-md-6">
                                    {{ Form::text('client[address]', $user->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">   Zip code:  </label>

                                <div class="col-md-7">
                                    {{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                                </div>
                                <span><i class="fa fa-minus"></i></span>
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
            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="row justify-content-center">
                            <h1>Your  Details and Upload detail</h1><br/>

                        </div>
                        <div class="row justify-content-center">
                            <span><h2> Please check and leave one of the options.</h2></span>

                        </div>

                        <div class="card-body">
                            {!! Form::open(['route' => ['client.details.update', $user->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                            @method('PUT')
                            @csrf
                            <div class="form-group row font">
                                <label for="email" class="col-md-4 col-form-label text-md-right"> First Name: </label>

                                <div class="col-md-4 client-first_name tab-selector" data-target="client-first_name">
                                    <div class="col-md-10">
                                        {{ Form::text('client[first_name]', $user->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}
                                    </div>
                                    <label for="password" class="col-md-1" >   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                                <div class="col-md-4 upload-first_name tab-selector" data-target="upload-first_name">
                                    <div class="col-md-10">
                                        {{ Form::text('client[first_name]', $user->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}
                                    </div>
                                    <label for="password" class="col-md-1" >   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>

                            <div class="form-group row font tab-selector">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Last Name : </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[last_name]', $user->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                                    </div>
                                    <label for="password" class="col-md-1" data-target="client-last_name">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>


                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[last_name]', $user->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
                                    </div>
                                    <label for="password" class="col-md-1" data-target="upload-last_name">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>


                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> DOB:  </label>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input']) }}
                                    </div>
                                    <label for="password" class="col-md-1" data-target="client-dob">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input']) }}
                                    </div>
                                    <label for="password" class="col-md-1" data-target="upload-dob">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  SEX:  </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Male:  </label>

                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Female:  </label>

                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Other:  </label>
                                    </div>

                                </div>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Male:  </label>

                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Female:  </label>

                                        <label for="password" class="col-md-4 col-form-label text-md-center">  Other:  </label>
                                    </div>
                                </div>
                                <label for="password" class="col-md-4 col-form-label text-md-right">  </label>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
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
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>


                                </div>

                                <div class="col-md-4 tab-selector">

                                    <div class="col-md-10">
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
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>

                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> SSN:  </label>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control m-input', 'placeholder' => 'Enter your SSN']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  State:  </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[state]', $user->clientDetails->state, ['class' => 'form-control m-input', 'placeholder' => 'Enter your state']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[state]', $user->clientDetails->state, ['class' => 'form-control m-input', 'placeholder' => 'Enter your state']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">  City:  </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[city]', $user->clientDetails->city, ['class' => 'form-control m-input', 'placeholder' => 'Enter your city']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[city]', $user->clientDetails->city, ['class' => 'form-control m-input', 'placeholder' => 'Enter your city']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">   Address:  </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[address]', $user->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[address]', $user->clientDetails->address, ['class' => 'form-control m-input', 'placeholder' => 'Enter your address']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>
                            </div>

                            <div class="form-group row font">
                                <label for="password" class="col-md-4 col-form-label text-md-right">   Zip code:  </label>

                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                        {{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                                    </div>
                                    <label for="password" class="col-md-1 " >   <i class="fa fa-minus-circle"></i>  </label>
                                </div>
                                <div class="col-md-4 tab-selector">
                                    <div class="col-md-10">
                                    {{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip']) }}
                                    </div>
                                    <label for="password" class="col-md-1 ">   <i class="fa fa-minus-circle"></i>  </label>
                                </div>

                            </div>


                            <div class="form-group row mb-0 font">
                                <div class="col-md-12 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>


                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>


@endsection
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('.tab-selector').click(function(){

            console.log('fdsfs');
            var tab = $(this).attr("data-target");


            $("." + tab).css("display", "none");
            $("." + tab+ " input").prop("disabled", false);
            console.log(tab);


        })

    })


</script>

@section('scripts')

@endsection












