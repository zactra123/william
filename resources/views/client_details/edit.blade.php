@extends('layouts.client')


@section('content')
    <style>
        .gender{
            font-size: 13px;
            margin-left: 5%;
            margin-right: 5%;
            margin-top: 2%;
            margin-bottom: 2%;
        }

        @media (max-width: 1000px) {

            .gender{
                font-size: 11px;
            }
            .gender-check {
                position: absolute;
                margin-top: 0.2rem;
                margin-left: -1.5rem;
                margin-right: -1.5rem;
            }
        }


    </style>


    <div class="fullwidth-block">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-2">
                <div class="card">
                    <div class="card-header"><h1>Edit Your Details</h1></div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['client.details.update', $user->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right', "id"=>"client-details-form"]) !!}
                        @method('PUT')
                        @csrf
                        <div class="form-group row m-1">
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right"> First Name: </label>--}}
                            <div class="col-md-12">
                                {{ Form::text('client[full_name]', $user->full_name(), ['class' => 'form-control m-input',   'placeholder' => 'Enter Your First Name', ]) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">Phone Number : </label>--}}

                            <div class="col-md-12">
                                {{ Form::text('client[phone_number]', strtoupper($user->clientDetails->phone_number), ['class' => 'form-control m-input', 'id'=>'phone_number', 'placeholder' => 'Enter Your Phone Number', ]) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right"> Street Address:  </label>--}}

                            <div class="col-md-12">
                                {{ Form::text('client[address]', strtoupper($user->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'Enter Your Address', ]) }}
                            </div>
                        </div>


                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">   Zip code:  </label>--}}

                            <div class="col-md-12">
                                {{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'placeholder' => 'Enter your zip', 'id' => 'zip', ]) }}
                            </div>

                        </div>
                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right"> DOB:  </label>--}}

                            <div class="col-md-12">
                                {{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input', ]) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right"> SSN:  </label>--}}

                            <div class="col-md-12">
                                {{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control ssn', 'placeholder' => 'Enter Your SSN', ]) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right"> Referred by:  </label>--}}

                            <div class="col-md-12">
                                {{ Form::text('client[referred_by]', strtoupper($user->clientDetails->referred_by), ['class' => 'form-control m-input', 'placeholder' => 'Enter Referred by (if any)']) }}

                            </div>
                        </div>

                        <div class="gender row text-justify">
                            <div class="col-md-3 pr-0 mr-0 text-md-right ">
                                <label for="gender" class="text-md-right">Gender</label>
                            </div>
                            <div class="col-md-9 text-md-right">
                                <label for="male" class="col-md-3  text-md-center">
                                    Male:
                                    {{Form::radio('client[sex]','M', $user->clientDetails->sex??''=='M', ['class'=>'gender-check float-left '])}}
                                </label>

                                <label for="female" class="col-md-3 text-md-center">
                                    Female:
                                    {{Form::radio('client[sex]','O', $user->clientDetails->sex??''=='F',['class'=>'gender-check '])}}
                                </label>
                                <label for="other" class="col-md-3 text-md-center">
                                    Non-Binary:
                                    {{Form::radio('client[sex]','F', $user->clientDetails->sex??''=='O', ['class'=>'gender-check '])}}
                                </label>
                            </div>

                        </div>



                        <div class="form-group row mb-0 font">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>

    <script type="text/javascript">
        $(document).ready(function(){
            autocomplete = new google.maps.places.Autocomplete($("#address")[0], {types: ['geocode']});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            $("#zip").val(place.address_components[i].long_name);
                        }
                    }
                }
            });
            $(".ssn").mask("999-99-9999");
            $('#phone_number').mask('(000) 000-0000');

            $("#client-details-form").validate({
                rules:{
                    "client[full_name]": {
                        required: true
                    },
                    "client[phone_number]": {
                        required: true
                    },
                    "client[address]": {
                        required: true
                    },
                    "client[zip]": {
                        required: true
                    },
                    "client[ssn]": {
                        required: true
                    },
                    "client[dob]": {
                        required: true
                    },
                    "client[sex]": {
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "client[sex]") {
                        error.insertAfter($(element).closest("div"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            })

        })




    </script>
@endsection











