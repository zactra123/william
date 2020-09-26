@extends('layouts.layout')

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> RESET LOGIN INFORMATION</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; RESET LOGIN INFORMATION</span>
        </div>
    </section>



    <!-- Login Area Start -->
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">
                            <h4>Step 2: Answer Your Secret Question</h4>
                        </div>
                        @if ($errors->any())

                            <div class="alert alert-danger flash">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                @foreach($errors->all()  as $message)
                                    <strong>{{ $message }}</strong>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body ">
                            {!! Form::open(['route' => 'login.infoSecondSend', 'method' => 'POST', 'id' => 'loginInformation2',  'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf


                            <div class="form-group row font justify-content-center">
                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12">
                                        {{$client->question}}
                                    </div>
                                </div>
                            </div>
                            <input name="id" type="hidden" value="{{$client->id}}">
                            <div class="form-group row font justify-content-center">

                                <div class="col-md-12 tab-selector">
                                    <div class="col-md-12" class="col-md-12 ">
                                        {{ Form::text('answer', old('answer'), ['class' => 'form-control m-input',  'placeholder' => 'ANSWER SECRET QUESTION']) }}
                                    </div>
                                </div>

                            </div>


                            <div class="col"><input type="submit" value="Next Step" class="ms-ua-submit"></div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>

    <script>
        $(document).ready(function(){




            $("#loginInformation2").validate({
                rules: {
                    "answer": {
                        required:true,
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".form-group"));
                }
            })
        })

    </script>

@endsection
