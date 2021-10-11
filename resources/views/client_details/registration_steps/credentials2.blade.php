<form id="add_client_4" data-id="4" data-type="only_broker" class="add-client additional-reg {{$current_page}}" novalidate>
	{{-- <form id="add_client_4" data-id="4" data-type="only_broker" class="add-client additional-reg" novalidate> --}}
	@csrf
	<p class="mt-5">{{ zactra::translate_lang('I will provide you the requested login credentials in a timely manner') }} <a onclick="($('#add_client_4').submit())">{{ zactra::translate_lang('CLICK TO CONTINUE.') }}</a></p>
	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="login-type-title">
			<div class="logo-block">
				<img src="{{asset('images/report_access/ck_logo_1.png')}}" alt="transunion_logo">
			</div>
			<p class="">{{ zactra::translate_lang('If You are Not Register') }} <a href="https://www.creditkarma.com/signup/" target="_blank">{{ zactra::translate_lang('Click here to register') }}</a></p>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="email" name="client[ck_login]" placeholder="{{ zactra::translate_lang('Login E-mail') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="password" name="client[ck_password]" placeholder="{{ zactra::translate_lang('Password') }}">
			</div>
		</div>
	</div>

	<div class="login-type-title">
		<div class="logo-block">
			<img src="{{asset('images/report_access/ex_logo_1.png')}}" alt="experian_logo">
		</div>
		<p class="">{{ zactra::translate_lang('If You are Not Register') }} <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">{{ zactra::translate_lang('Click here to register') }}</a></p>
	</div>

	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="text" name="client[ex_login]" placeholder="{{ zactra::translate_lang('Username') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="password" name="client[ex_password]" placeholder="{{ zactra::translate_lang('Password') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
				<input type="text" name="client[ex_question]" placeholder="{{ zactra::translate_lang('Answer to sequrity question') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
				<input type="number" name="client[ex_pin]" placeholder="{{ zactra::translate_lang('4-Digit pin number') }}">
			</div>
		</div>
	</div>
	<div class="login-type-title">
		<div class="logo-block">
			<img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_logo">
		</div>
		<p class="">{{ zactra::translate_lang('If You are Not Register') }} <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">{{ zactra::translate_lang('Click here to register') }}</a></p>
	</div>
	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="text" name="client[tu_login]" placeholder="{{ zactra::translate_lang('Username') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="password" name="client[tu_password]" placeholder="{{ zactra::translate_lang('Password') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
				<input type="text" name="client[tu_question]" placeholder="{{ zactra::translate_lang('Sequrity Question') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12 mt-4">
				<input type="text" name="client[tu_answer]" placeholder="{{ zactra::translate_lang('Sequrity Answer') }}">
			</div>
		</div>
	</div>

	<div class="login-type-title">
		<div class="logo-block">
			<img src="{{asset('images/report_access/tu_logo_1.png')}}" alt="transunion_2_logo">
		</div>
		<p class="">{{ zactra::translate_lang('If You are Not Register') }} <a href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">{{ zactra::translate_lang('Click here to register') }}</a></p>
	</div>
	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="text" name="client[tu_dis_login]" placeholder="{{ zactra::translate_lang('Username') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="password" name="client[tu_dis_password]" placeholder="{{ zactra::translate_lang('Password') }}">
			</div>
		</div>
	</div>

	<div class="login-type-title">
		<div class="logo-block">
			<img src="{{asset('images/report_access/eq_logo_1.png')}}" alt="equifax_logo">
		</div>
		<p class="">{{ zactra::translate_lang('If You are Not Register') }} <a href="https://my.equifax.com/consumer-registration/UCSC/#/personal-info" target="_blank">{{ zactra::translate_lang('Click here to register') }}</a></p>
	</div>
	<div class="col-md-12 col-lg-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="text" name="client[eq_login]" placeholder="{{ zactra::translate_lang('Username') }}">
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12 col-12">
				<input type="password" name="client[eq_password]" placeholder="{{ zactra::translate_lang('Password') }}">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<div class="basic-button">
				<input class="login" type="submit" value="{{ zactra::translate_lang('Submit') }}" name="">
			</div>
		</div>
	</div>
</form>
