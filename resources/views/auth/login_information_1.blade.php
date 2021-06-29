@extends('layouts.layout1')

@section('content')
  <br>
    <section class="py-5 container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="px-4 py-4 login-form-border register_form">
            {{-- @if ($message = Session::get('success'))
                <div class="w-25 alert alert-success alert-block flash">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="w-25 alert alert-danger alert-block flash">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif --}}

            <h1 class="fs-25 bold theme-color-dark">Rest Login information</h1>
            <p>Please enter complete information which is asked below to reset your login information!</p>

          
            {!! Form::open(['route' => 'login.infoFirstSend', 'method' => 'POST', 'id' => 'loginInformation1']) !!}
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                  <div class="p-0">
                      {{ Form::text('client[ssn]', old('client[ssn]'), ['class' => 'form-control m-input ssn fs-12', 'id' => 'ssn','placeholder' => 'SOCIAL SECURITY NUMBER']) }}
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <div class="p-0">
                     {{ Form::text('client[ssn_confirm]', old('client[ssn_confirmweb]'), ['class' => 'form-control m-input ssn fs-12', 'id' => 'ssn_confirm','placeholder' => 'CONFIRM SOCIAL SECURITY NUMBER']) }}
                  </div>
              </div>
            </div>


            <div class="form-group col-md-12 text-center"> OR </div>

            <div class="row">
              <div class="form-group col-md-6">
                  <div class="p-0">
                      {{ Form::text('client[ein]', old('client[ein]'), ['class' => 'form-control m-input ein fs-12', 'id' => 'ein','placeholder' => 'EIN NUMBER']) }}
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <div class="p-0">
                      {{ Form::text('client[ein_confirm]', old('client[ein_confirm]'), ['class' => 'form-control m-input ein fs-12', 'id' => 'ein_confirm', 'placeholder' => 'CONFIRM EIN']) }}
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <div class="p-0">
                      {{ Form::text('client[last_name]', old('client[last_name]'), ['class' => 'form-control m-input fs-12' ,  'placeholder' => 'LAST NAME']) }}
                  </div>
              </div>
            </div>

            <div class="row text-center">
              <div class="col-md-12">
                <div class="basic-button">
                  <input type="submit" value="NEXT STEP" class="login">
                </div>
              </div>
            </div>
            {!! Form::close() !!}

          </div>

          <p class="pt-4 fs-12 text-center">
              <span class="fs-18">Want to login to your account? <a class="fs-18 theme-color-dark" href="{{route('login')}}">Sign In</a></span>
          </p>
        </div>
      </div>
      @include('helpers.chat')
    </section>

    <script>
        $(document).ready(function(){

            $(".ssn").mask("999-99-9999");
            $(".ein").mask("99-9999999");

            $.validator.addMethod("one_option", function(value, element) {

                return $("[name='" +element.name+ "']").length < 2;
            }, "Please choose one of the options");

            $("#loginInformation1").validate({
                rules: {
                    "client[last_name]": {
                        required:true,
                        one_option: true
                    },
                    "client[ssn]": {
                        required: '#ein:blank'
                    },
                    "client[ein]": {
                        required: '#ssn:blank'
                    },
                    "client[ssn_confirm]": {
                        required: '#ein_:blank',
                        equalTo: "#ssn"
                    },
                    "client[ein_confirm]": {
                        required: '#ssn_:blank',
                        equalTo: "#ein"
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".p-0"));
                }
            })
        })

    </script>

@endsection
