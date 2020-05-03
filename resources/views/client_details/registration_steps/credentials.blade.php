<div class="card w-75">
    <div class=" text-center    ">
        <p >
            Please provide the following credit bureau/monitoring services login credentials. If you do not have one or
            any of them, please register and provide us with login credentials.
        </p>
    </div>

    <div class="card-body w-100">
        {!! Form::open(['route' => ['client.credentialsStore'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right', 'id'=>'client-credentials']) !!}
        @csrf
        <div class="col-sm-12">
            <label><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="140"> <a href="https://www.creditkarma.com/signup/" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_login]', !empty($credential->ck_login) ? $credential->ck_login : old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_password]', !empty($credential->ck_password) ? $credential->ck_password  : old('client.ck_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="140"> <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">Click here to register</a></label>
            <div class="form-group m-1  font">
                {{ Form::text('client[ex_login]', !empty($credential->ex_login) ? $credential->ex_login : old('client.ex_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ex_password]', !empty($credential->ex_password) ? $credential->ex_password : old('client.ex_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ex_question]', !empty($credential->ex_question) ? $credential->ex_question : old('client.ex_question'), ['class' => 'form-control m-input', 'placeholder' => 'Question']) }}
            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[ex_answer]', !empty($credential->ex_answer) ? $credential->ex_answer : old('client.ex_answer'), ['class' => 'form-control m-input', 'placeholder' => 'Answer']) }}
            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[ex_pin]', !empty($credential->ex_pin) ? $credential->ex_pin : old('client.ex_pin'), ['class' => 'form-control m-input', 'placeholder' => 'Pin Number']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access" src="{{asset('images/report_access/tu_logo_1.png')}}"  width="140"> <a href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[tu_login]', !empty($credential->tu_login) ? $credential->tu_login : old('client.tu_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[tu_password]', !empty($credential->tu_password) ? $credential->tu_password : old('client.tu_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
        </div>
        <div class="col-sm-12">
            <label> <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"><a href="https://www.equifax.com/personal/" target="_blank">Click here to register</a></label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[eq_login]', !empty($credential->eq_login) ? $credential->eq_login : old('client.eq_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[eq_password]', !empty($credential->eq_password) ? $credential->eq_password : old('client.eq_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
        </div>
        <div class="col"><input type="submit" value="Upload" class="ms-ua-submit"></div>
        {!! Form::close() !!}
    </div>
</div>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
<script>
    $(document).ready(function(){
        $("#client-credentials").validate({
            rules: {
                "client[tu_login]": {
                    required: true
                },
                "client[tu_password]": {
                    required: true
                },
                "client[ex_login]": {
                    required: true
                },
                "client[ex_password]": {
                    required: true
                },
                "client[ex_question]": {
                    required: true
                },
                "client[ex_answer]": {
                    required: true
                },
                "client[ck_login]": {
                    required: true
                },
                "client[ck_password]": {
                    required: true
                },
            }
        })
    });
</script>