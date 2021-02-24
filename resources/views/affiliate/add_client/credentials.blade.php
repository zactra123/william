<form id="add_client_4" data-client="{{$client!=null?$client->id:""}}" data-id="4" data-type="only_broker" class="add-client additional-reg {{$current_page}}" novalidate>

    @csrf
    <p>I will provide you the requested login credentials in a timely manner <a onclick="($('#add_client_4').submit())">CLICK TO CONTINUE.</a></p>
    <div class="login-type-title">
        <div class="logo-block">
            <img src="{{asset('images/report_access/ck_logo_1.png')}}" alt="transunion_logo">
        </div>
        <p>If You are Not Register <a href="https://www.creditkarma.com/signup/" target="_blank">Click here to register</a></p>
    </div>
    <input type="email" name="client[ck_login]" placeholder="Login E-mail">
    <input type="password" name="client[ck_password]" placeholder="Password">

    <div class="login-type-title">
        <div class="logo-block">
            <img src="{{asset('images/report_access/ex_logo_1.png')}}" alt="experian_logo">
        </div>
        <p>If You are Not Register <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">Click here to register</a></p>
    </div>
    <input type="text" name="client[ex_login]" placeholder="Username">
    <input type="password" name="client[ex_password]" placeholder="Password">
    <input type="text" name="client[ex_question]" placeholder="Answer to security question">
    <input type="number" name="client[ex_pin]" placeholder="4-Digit pin number">

    <div class="login-type-title">
        <div class="logo-block">
            <img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_logo">
        </div>
        <p>If You are Not Register <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">Click here to register</a></p>
    </div>
    <input type="text" name="client[tu_login]" placeholder="Username">
    <input type="password" name="client[tu_password]" placeholder="Password">
    <input type="text" name="client[tu_question]" placeholder="Security Question">
    <input type="text" name="client[tu_answer]" placeholder="Security Answer">

    <div class="login-type-title">
        <div class="logo-block">
            <img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_2_logo">
        </div>
        <p>If You are Not Register <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">Click here to register</a></p>
    </div>
    <input type="text" name="client[tu_dis_login]" placeholder="Username">
    <input type="password" name="client[tu_dis_password]" placeholder="Password">

    <div class="login-type-title">
        <div class="logo-block">
            <img src="{{asset('images/report_access/eq_logo_1.png')}}" alt="equifax_logo">
        </div>
        <p>If You are Not Register <a href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">Click here to register</a></p>
    </div>
    <input type="text" name="client[eq_login]" placeholder="Username">
    <input type="password" name="client[eq_password]" placeholder="Password">

    <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
    </div>
</form>
