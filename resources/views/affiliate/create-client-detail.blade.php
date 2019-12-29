@extends('layouts.affiliate')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Add Your Details</h1>
                        {!! Form::open(['route' => ['affiliate.storeClientDetails', $client], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}

                        @csrf
                        <div class="form-group row m-1">

                            <div class="col-md-11">
                                {{ Form::text('client[first_name]', $user->first_name??'', ['class' => 'form-control m-input', 'placeholder' => 'First name']) }}

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                {{ Form::text('client[last_name]', $user->last_name??'', ['class' => 'form-control m-input', 'placeholder' => 'Last name']) }}
                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                <input id="phone_number" type="text" class="form-control phone" name="client[phone_number]" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone number">

                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                {{ Form::text('client[address]', $user->clientDetails->address??'', ['class' => 'form-control m-input','id'=>'address', 'placeholder' => 'Street Address']) }}
                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                {{ Form::text('client[city]', $user->clientDetails->city??'', ['class' => 'form-control m-input', 'placeholder' => 'City']) }}
                            </div>
                        </div>
                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                {{ Form::text('client[state]', $user->clientDetails->city??'', ['class' => 'form-control m-input', 'placeholder' => 'State']) }}
                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                {{ Form::text('client[zip]', $user->clientDetails->zip??'', ['class' => 'form-control m-input', 'placeholder' => 'Zip code']) }}
                            </div>
                        </div>

                        <div class="form-group row m-1">
                            <div class="col-md-11">
                                <input placeholder="Date of birth" name = 'client[dob]' class="form-control" type="text" onfocus="(this.type='date')"  id="date">
                            </div>
                        </div>


                        <div class="form-group row m-1">
                            <label for="gender" class="col-md-2 col-form-label text-md-center">  Gender:  </label>
                            <div class="col-md-10">
                                <label for="male" class="col-md-2 col-form-label">  Male:  </label>
                                <label for="Sex" class="col-md-1 m-1 col-form-label ">
                                    {{Form::radio('client[sex]','M', $user->clientDetails->sex??''=='M')}}
                                </label>

                                <label for="female" class="col-md-3 col-form-label text-md-right">  Female:  </label>
                                <label for="Sex" class="col-md-1 col-form-label m-1 ">
                                    {{Form::radio('client[sex]','O', $user->clientDetails->sex??''=='F')}}
                                </label>
                                <label for="other" class="col-md-2 col-form-label text-md-center">  Other:  </label>
                                <label for="Sex" class="col-md-1 col-form-label m-1 ">
                                    {{Form::radio('client[sex]','F', $user->clientDetails->sex??''=='O')}}
                                </label>
                            </div>
                        </div>
                        <div class="form-group row m-1">
                           <div class="col-md-11">
                                {{ Form::text('client[ssn]', $user->clientDetails->ssn??'', ['class' => 'form-control ssn', 'id'=>'ssn', 'placeholder' => 'Social Security']) }}
                            </div>
                        </div>
                        <div class="form-group row m-1">

                            <div class="col-md-11">
                                <input id="referred_by" type="text" class="form-control" name="client[referred_by]" value="{{ old('referred_by') }}" required autocomplete="ssn" placeholder="Referred By (if any)">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB64O3yXsW-fjpr2xcRm0udIDiy4v-2WPA&libraries=places">

</script>
<script type="text/javascript">
    $(document).ready(function(){
        new google.maps.places.Autocomplete($("#address")[0], {types: ['geocode']});
        $('.ssn').keyup(function() {

            var val = this.value.replace(/\D/g, '');
            var newVal = '';
            if(val.length > 4) {
                this.value = val;
            }
            if((val.length > 3) && (val.length < 6)) {
                newVal += val.substr(0, 3) + '-';
                val = val.substr(3);
            }
            if (val.length > 5) {
                newVal += val.substr(0, 3) + '-';
                newVal += val.substr(3, 2) + '-';
                val = val.substr(5);
            }
            newVal += val;
            this.value = newVal.substring(0, 11);
        });

        $('#phone_number').keyup(function() {

            var val = this.value.replace(/\D/g, '');
            var newVal = '';
            if(val.length > 4) {
                this.value = val;
            }

            if((val.length > 3) && (val.length <7)) {
                newVal += val.substr(0, 3) + '-';
                val = val.substr(3);
            }
            if (val.length > 6) {
                newVal += val.substr(0, 3) + '-';
                newVal += val.substr(3, 3) + '-';
                val = val.substr(6);
            }
            newVal += val;
            this.value = newVal.substring(0, 12);
        });
    })

</script>











