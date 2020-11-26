@extends('layouts.layout')



@section('content')




    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Credit Resources </h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Affiliate</span>
        </div>
    </section>

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include('helpers.steps_affiliate')
{{--                        @include("client_details.registration_steps.{$client->clientDetails->registration_steps}")--}}

                        <div class="ms-ua-box">
                            <div class="ms-ua-title">

                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach


                                <div class="ms-ua-form">
                                    <form method="POST" id="registration-form" action="{{ route('affiliate.store.client') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="CLIENT EMAIL" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="phone_number" type="text" class="form-control phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone Number">
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="sex" id="gender">
                                                <option disabled="disabled" selected="selected">Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Non-Binary</option>
                                            </select>
                                            @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

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
                                            <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" required autocomplete="secret_answer" placeholder="PLEASE ANSWER IN SECRET QUESTION">
                                            @error('secret_answer')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="col"><input type="submit" value="Add" class="ms-ua-submit"></div>


                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/clients/registration.js?v=2') }}" defer></script>

    <script type="text/javascript">



        $(document).ready(function(){
            $('.ssn').mask('000-00-0000')
            $('.ein').mask('00-0000000')
            $('.phone').mask('(000) 000-0000')
        })

    </script>


@endsection



