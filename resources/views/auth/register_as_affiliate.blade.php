@extends('layouts.layout')

@section('content')

    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Register</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Register Affilate</span>
        </div>
    </section>
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <h3>Registration</h3>
                        </div>
                        <div class="ms-ua-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder="FULL NAME">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('referred_by') }}" required autocomplete="ssn" placeholder="COMPANY NAME (IF ANY)">
                                </div>
                                <div class="form-group">
                                    <input id="ssn" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}" required autocomplete="ssn" placeholder="SOCIAL SECURITY NUMBER or EIN">
                                    @error('ssn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                                    <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="PHONE NUMBER">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="role" class="form-control" value="affiliate">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-MAIL ADDRESS">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="PASSWORD">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRM PASSWORD">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="secret_questions_id" id="secret_question">
                                        <option disabled="disabled" selected="selected">Choose Secret Question</option>

                                        @foreach($secrets as $value)

                                            <option value="{{$value->id}}">{{$value->question}}</option>
                                        @endforeach
                                    </select>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input id="secret_answer" type="text" class="form-control phone" name="secret_answer" value="{{ old('secret_answer') }}" required autocomplete="secret_answer" placeholder="PLEASE ANSWER IN SECRET QUESTION">
                                    @error('secret_answer')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Register" class="ms-ua-submit">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <style>
        .popover {
            width: fit-content;
        }
    </style>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" defer></script>

    <script type="text/javascript">



        $(document).ready(function(){
            $('#date').focus(function () {
                this.type='date';
            });
            $('#date').click(function () {
                this.type='date';
            })  ;
            $('#date').blur(function () {
                if(this.value==''){this.type='text'};
            });
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
