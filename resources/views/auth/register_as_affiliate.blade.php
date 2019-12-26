@extends('layouts.login')

@section('content')


    <style>
        .tab-selector {
            background-color:  #0c71c3;
            /*border-color:#1a41ad;*/
            color: #FFFFFF;
            font-size: large;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size: large;
        }
        .tab-selector:hover{
            background-color: #FFFFFF;
            color:#0c71c3;
        }

        .tab-selector.active {
            background-color:  #FFFFFF;
            color:#0c71c3;
        }
        .card-header{

            border-bottom: none;
        }
        .pdf-upload{
            display: none
        }
        .pdf-upload.active{
            display: block;
        }



    </style>


    <div class="page-content">
        <div class="fullwidth-block">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">

                                {{--<div class="w-100 btn-group btn-group-toggle" data-toggle="buttons">--}}

                                {{--<button type="button" class="btn tab-selector active" data-target="client-tab" id="client">REGISTER AS CLIENT</button>--}}


                                {{--<button type="button" class="btn tab-selector" data-target="affiliate-tab" id="affiliate">REGISTER AS AFFILIATE</button>--}}

                                {{--</div>--}}
                                <div class="head"> <p>REGISTER AS AFFILIATE</p></div>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf


                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="pdf-upload affiliate-tab">



                                        <input type="hidden" name="role" class="form-control" value="affiliate">

                                    </div>
                                    <div class="pdf-upload client-tab">

                                        <input type="hidden" name="role" class="form-control" value="affiliate">

                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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


@endsection


{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$('.tab-selector').click(function(){--}}
{{--var tab = $(this).attr("data-target");--}}

{{--$('.tab-selector').removeClass("active");--}}
{{--$('.pdf-upload').removeClass("active");--}}
{{--$('.pdf-upload input').prop("disabled", true);--}}
{{--$("." + tab).addClass("active");--}}
{{--$("." + tab+ " input").prop("disabled", false);--}}


{{--})--}}



{{--})--}}

{{--</script>--}}