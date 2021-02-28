@extends('layouts.layout1')

@section('content')

    <section class="register">
        <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background">
        <div class="register-form" data-id="1">
            <div class="title">
                <h3 >Rest Login information</h3>
            </div>
            <div class="register_form">
                <div class="title">
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
                {!! Form::open(['route' => 'login.infoSecondSend', 'method' => 'POST', 'id' => 'loginInformation2',  'class' => 'm-form m-form--label-align-right']) !!}
                @csrf
                <div class="form-group w-100 mb-0">
                    <div class="col-md-12 p-0">
                        {{$client->question}}
                    </div>
                </div>
                <input name="id" type="hidden" value="{{$client->id}}">
                <div class="form-group w-100 mb-0">
                    <div class="col-md-12 p-0">
                        {{ Form::text('answer', old('answer'), ['class' => 'form-control m-input',  'placeholder' => 'ANSWER SECRET QUESTION']) }}
                    </div>
                </div>
                <div class="basic-button"><input type="submit" value="Next Step" class="login"></div>
                {!! Form::close() !!}

            </div>
        </div>

        @include('helpers.chat')
    </section>

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
