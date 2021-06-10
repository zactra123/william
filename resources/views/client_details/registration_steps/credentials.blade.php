<div class="card mt-5 pt-5 pb-5 pl-5 pr-5">
  <form id="add_client_4" data-id="4" data-type="only_broker" class="add-client additional-reg {{$current_page}}" novalidate>

      @csrf
      <p >I will provide you the requested login credentials in a timely manner <a onclick="($('#add_client_4').submit())">CLICK TO CONTINUE.</a></p>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="login-type-title">
            <div class="logo-block">
                <img src="{{asset('images/report_access/ck_logo_1.png')}}" alt="transunion_logo">
            </div>
            <p class="mt-5">If You are Not Register <a href="https://www.creditkarma.com/signup/" target="_blank">Click here to register</a></p>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="email" class="form-control" name="client[ck_login]" placeholder="Login E-mail">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="password" class="form-control" name="client[ck_password]" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="login-type-title">
          <div class="logo-block">
              <img src="{{asset('images/report_access/ex_logo_1.png')}}" alt="experian_logo">
          </div>
          <p class="mt-5">If You are Not Register <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">Click here to register</a></p>
      </div>

      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="text" class="form-control" name="client[ex_login]" placeholder="Username">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="password"  class="form-control"name="client[ex_password]" placeholder="Password">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
            <input type="text" class="form-control" name="client[ex_question]" placeholder="Answer to sequrity question">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
            <input type="number" class="form-control" name="client[ex_pin]" placeholder="4-Digit pin number">
          </div>
        </div>
      </div>
      <div class="login-type-title">
          <div class="logo-block">
              <img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_logo">
          </div>
          <p class="mt-5">If You are Not Register <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">Click here to register</a></p>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="text" class="form-control" name="client[tu_login]" placeholder="Username">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="password" class="form-control" name="client[tu_password]" placeholder="Password">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
            <input type="text" class="form-control" name="client[tu_question]" placeholder="Sequrity Question">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
            <input type="text" class="form-control" name="client[tu_answer]" placeholder="Sequrity Answer">
          </div>
        </div>
      </div>




      <div class="login-type-title">
          <div class="logo-block">
              <img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_2_logo">
          </div>
          <p class="mt-5">If You are Not Register <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">Click here to register</a></p>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="text" class="form-control" name="client[tu_dis_login]" placeholder="Username">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="password" class="form-control" name="client[tu_dis_password]" placeholder="Password">
          </div>
        </div>
      </div>

      <div class="login-type-title">
          <div class="logo-block">
              <img src="{{asset('images/report_access/eq_logo_1.png')}}" alt="equifax_logo">
          </div>
          <p class="mt-5">If You are Not Register <a href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">Click here to register</a></p>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="text" class="form-control" name="client[eq_login]" placeholder="Username">
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            <input type="password" class="form-control" name="client[eq_password]" placeholder="Password">
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="basic-button">
              <input class="login" type="submit" value="Submit" name="">
          </div>
        </div>
      </div>
  </form>

</div>
