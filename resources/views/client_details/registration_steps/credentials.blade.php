<div class="card w-75">
    <div class=" text-center    ">
        <p >
            I will provide you the requested login credentials in a timely manner <a href="{{route('client.continue')}}">CLICK TO  CONTINUE.</a>
        </p>
    </div>

    <div class="card-body w-100">
        {!! Form::open(['route' => ['client.credentialsStore'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right', 'id'=>'client-credentials']) !!}
        @csrf
        <div class="col-sm-12">
            <label><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="140"> If You are Not Register <a href="https://www.creditkarma.com/signup/" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_login]', !empty($client->credentials->ck_login) ? $client->credentials->ck_login : old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'LOGIN EMAIL']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_password]', !empty($client->credentials->ck_password) ? $client->credentials->ck_password  : old('client.ck_password'), ['class' => 'form-control m-input', 'placeholder' => 'PASSWORD']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="140"> If You are Not Register  <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">Click here to register</a></label>
            <div class="form-group m-1  font">
                {{ Form::text('client[ex_login]', !empty($client->credentials->ex_login) ? $client->credentials->ex_login : old('client.ex_login'), ['class' => 'form-control m-input', 'placeholder' => 'USERNAME']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ex_password]', !empty($client->credentials->ex_password) ? $client->credentials->ex_password : old('client.ex_password'), ['class' => 'form-control m-input', 'placeholder' => 'PASSWORD']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ex_question]', !empty($client->credentials->ex_question) ? $client->credentials->ex_question : old('client.ex_question'), ['class' => 'form-control m-input', 'placeholder' => 'ANSWER TO SEQURITY QUESTION']) }}
            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[ex_pin]', !empty($client->credentials->ex_pin) ? $client->credentials->ex_pin : old('client.ex_pin'), ['class' => 'form-control m-input', 'placeholder' => '4-DIGIT PIN NUMBER']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access" src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"> If You are Not Register  <a href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[tu_login]', !empty($client->credentials->tu_login) ? $client->credentials->tu_login : old('client.tu_login'), ['class' => 'form-control m-input', 'placeholder' => 'USERNAME']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[tu_password]', !empty($client->credentials->tu_password) ? $client->credentials->tu_password : old('client.tu_password'), ['class' => 'form-control m-input', 'placeholder' => 'PASSWORD']) }}
            </div>

            <div class="form-group m-1  font">
                {{ Form::text('client[tu_question]', !empty($client->credentials->tu_question) ? $client->credentials->tu_question : old('client.tu_question'), ['class' => 'form-control m-input', 'placeholder' => 'SECRET QUESTION']) }}
            </div>

            <div class="form-group m-1  font">
                {{ Form::text('client[tu_answer]', !empty($client->credentials->tu_answer) ? $client->credentials->tu_answer : old('client.tu_answer'), ['class' => 'form-control m-input', 'placeholder' => 'SECRET ANSWER']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access" src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"> (DISPUTE) If You are Not Register  <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[tu_dis_login]', !empty($client->credentials->tu_dis_login) ? $client->credentials->tu_dis_login : old('client.tu_dis_login'), ['class' => 'form-control m-input', 'placeholder' => 'USERNAME']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[tu_dis_password]', !empty($client->credentials->tu_dis_password) ? $client->credentials->tu_dis_password : old('client.tu_dis_password'), ['class' => 'form-control m-input', 'placeholder' => 'PASSWORD']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120">  If You are Not Register  <a href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[eq_login]', !empty($client->credentials->eq_login) ? $client->credentials->eq_login : old('client.eq_login'), ['class' => 'form-control m-input', 'placeholder' => 'USERNAME']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[eq_password]', !empty($client->credentials->eq_password) ? $client->credentials->eq_password : old('client.eq_password'), ['class' => 'form-control m-input', 'placeholder' => 'PASSWORD']) }}
            </div>
        </div>

        <div class="col"><input type="submit" value="Submit" class="ms-ua-submit"></div>
        {!! Form::close() !!}
    </div>
{{--</div>--}}
{{--<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>--}}
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $("#client-credentials").validate({--}}
{{--            rules: {--}}
{{--                "client[tu_login]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[tu_password]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ex_login]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ex_password]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ex_question]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ex_answer]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ck_login]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--                "client[ck_password]": {--}}
{{--                    required: true--}}
{{--                },--}}
{{--            }--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}
