<div class="card w-75">
    <div class=" text-center    ">
        <p >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            In ac ex quis tortor venenatis hendrerit quis eget odio.
            Nam ante neque, sodales sed ullamcorper ac, laoreet in ipsum.
            Suspendisse sapien nibh, blandit nec venenatis et, volutpat eget velit.
        </p>
    </div>

    <div class="card-body w-100">
        {!! Form::open(['route' => ['client.credentialsStore'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right', 'id'=>'client-credentials']) !!}
        @csrf
        <div class="col-12">
            <label class="text-primary">Credit Karma</label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_login]', !empty($credential->ck_login) ? $credential->ck_login : old('client.ck_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}
            </div>
            <div class="form-group  m-1 font">
                {{ Form::text('client[ck_password]', !empty($credential->ck_password) ? $credential->ck_password  : old('client.ck_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
        </div>
        <div class="col-12">
            <label class="text-primary">Experian</label>
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
        </div>
        <div class="col-12">
            <label class="text-primary">Trans Union </label>
            <div class="form-group  m-1 font">
                {{ Form::text('client[tu_login]', !empty($credential->tu_login) ? $credential->tu_login : old('client.tu_login'), ['class' => 'form-control m-input', 'placeholder' => 'Login']) }}

            </div>
            <div class="form-group m-1  font">
                {{ Form::text('client[tu_password]', !empty($credential->tu_password) ? $credential->tu_password : old('client.tu_password'), ['class' => 'form-control m-input', 'placeholder' => 'Password']) }}
            </div>
        </div>
        <div class="form-group row mb-0 font">
            <div class="col-md-9 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
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