@extends('layouts.login')

@section('content')


    {{--<style>--}}
    {{--.tab-selector {--}}
    {{--background-color:  #0c71c3;--}}
    {{--/*border-color:#1a41ad;*/--}}
    {{--color: #FFFFFF;--}}
    {{--font-size: large;--}}
    {{--display: -webkit-box;--}}
    {{--display: -webkit-flex;--}}
    {{--display: -ms-flexbox;--}}
    {{--display: flex;--}}
    {{---webkit-box-pack: center;--}}
    {{---webkit-justify-content: center;--}}
    {{---ms-flex-pack: center;--}}
    {{--justify-content: center;--}}
    {{--font-size: large;--}}
    {{--}--}}
    {{--.tab-selector:hover{--}}
    {{--background-color: #FFFFFF;--}}
    {{--color:#0c71c3;--}}
    {{--}--}}

    {{--.tab-selector.active {--}}
    {{--background-color:  #FFFFFF;--}}
    {{--color:#0c71c3;--}}
    {{--}--}}
    {{--.card-header{--}}

    {{--border-bottom: none;--}}
    {{--}--}}
    {{--.pdf-upload{--}}
    {{--display: none--}}
    {{--}--}}
    {{--.pdf-upload.active{--}}
    {{--display: block;--}}
    {{--}--}}



    {{--</style>--}}


    <div class="page-content">
        <div class="fullwidth-block">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">

                                <div class="head"> <p>REGISTER AS AFFILIATE</p></div>
                            </div>

                            <div class="card-body ">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row m-1">
                                        <div class="col-md-11">
                                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11 mt-0">
                                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autocomplete="first_name" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone number">

                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Street address">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="City">
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required autocomplete="state" placeholder="State">
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="Zip code">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="ssn" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}" required autocomplete="ssn" placeholder="Social Security Number">
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11">

                                            <input placeholder="Date of birth" name='dob' class="form-control" type="text" onfocus="(this.type='date')"  id="date">

                                        </div>
                                    </div>
                                    {{--Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']);--}}
                                    <div class="form-group row m-0">
                                        <label for="gender" class="col-md-2 col-form-label text-md-center">  Gender:  </label>

                                        <div class="col-md-10">
                                            <label for="male" class="col-md-2 col-form-label">  Male:  </label>
                                            <label for="Sex" class="col-md-1 m-1 col-form-label ">
                                                {{Form::radio('sex','M', $user->clientDetails->sex??''=='M')}}
                                            </label>

                                            <label for="female" class="col-md-3 col-form-label text-md-right">  Female:  </label>
                                            <label for="Sex" class="col-md-1 col-form-label m-1 ">
                                                {{Form::radio('sex','O', $user->clientDetails->sex??''=='F')}}
                                            </label>
                                            <label for="other" class="col-md-2 col-form-label text-md-center">  Other:  </label>
                                            <label for="Sex" class="col-md-1 col-form-label m-1 ">
                                                {{Form::radio('sex','F', $user->clientDetails->sex??''=='O')}}
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11 ">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="pdf-upload client-tab">
                                        <input type="hidden" name="role" class="form-control" value="affiliate">

                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row m-1">

                                        <div class="col-md-11">
                                            <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('referred_by') }}" required autocomplete="ssn" placeholder="Business name (if any)">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB64O3yXsW-fjpr2xcRm0udIDiy4v-2WPA&libraries=places">

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            new google.maps.places.Autocomplete($("#address")[0], {types: ['geocode']})
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

@endsection





