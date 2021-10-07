<div class="registration-form" data-type="broker">
	<form id="register_form" method="post" action="{{ route('register') }}" autocomplete="off">
		@csrf
		<input type="hidden" name="role" class="form-control" value="affiliate">
		<div class="col-md-12 col-lg-12 col-sm-12 col-12">
			<label class="fs-18 bold theme-color-dark">{{ zactra::translate_lang('Personal Info') }}</label>
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input type="text" name="full_name" placeholder="{{ zactra::translate_lang('Full name') }}">
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input type="text" id="address" name="address" placeholder="{{ zactra::translate_lang('Full Address') }}" value="{{ old('address') }}" autocomplete="new-full_address">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input type="tel" class="form-control phone" name="phone_number" placeholder="{{ zactra::translate_lang('Phone Number') }}" value="{{ old('phone_number') }}">
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input type="email" name="email" placeholder="{{ zactra::translate_lang('E-Mail Address') }}">
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-12">
			<label class="fs-18 bold theme-color-dark">{{ zactra::translate_lang('Social Security / EIN Number') }}</label>
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-12">
					<input id="social_number" type="text" class="form-control ssn" name="ssn" value="{{ old('ssn') }}" placeholder="{{ zactra::translate_lang('Social Security Number') }}">
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-12 text-center">
					<p>{{ zactra::translate_lang('OR') }}</p>
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-12">
					<input id="ein_number" type="text" class="form-control ein" name="ein" value="{{ old('ein') }}" placeholder="{{ zactra::translate_lang('EIN Number') }}">
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-12">
			<label class="fs-18 bold theme-color-dark">{{ zactra::translate_lang('Password') }}</label>
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<div class="password">
						<input id="register_password" type="password" name="password" placeholder="{{ zactra::translate_lang('Password') }}" readonly onfocus="this.removeAttribute('readonly');">
						<div id="eye_open">
							<i class="fa fa-eye" aria-hidden="true" onclick="showpassword(this)"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input id="register_password_confirm" type="password" name="password_confirmation" placeholder="{{ zactra::translate_lang('Confirm Password') }}" readonly onfocus="this.removeAttribute('readonly');">
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-12">
			<label class="fs-18 bold theme-color-dark">{{ zactra::translate_lang('Security Question') }}</label>
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<select class="form-control" name="secret_questions_id" id="secret_question">
						<option disabled="disabled" selected="selected">{{ zactra::translate_lang('Choose Secret Question') }}</option>
						@foreach($secrets as $value)
						<option value="{{$value->id}}">{{$value->question}}</option>
						@endforeach
						<option value="other">
							{{ zactra::translate_lang('Your Own Question') }}
						</option>
					</select>
					<div class="none w-100" id="custom-secret-question">
						<input name="own_secter_question" type="text" class="form-control" placeholder="{{ zactra::translate_lang('Own question') }}">
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12 col-12">
					<input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="{{ zactra::translate_lang('Please answer in secret question') }}">
					@error('secret_answer')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="col-md-12 text-center">
				<div class="basic-button">
					<input class="login" type="submit" value="{{ zactra::translate_lang('Register') }}" name="">
				</div>
			</div>
		</div>
	</form>
	<div class="login-social mt-3">
		<p class="text-center">
			<a href="{{route('facebook.login', ['users'=>'affiliate'])}}">
				<button type="button" class="login-btn-social btn-login-facebook"><svg id="Bold" fill="#FFFFFF" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
						<path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z" /></svg></button>
			</a>
			<a href="{{route('google.login', ['users'=>'affiliate'])}}">
				<button type="button" class="login-btn-social ml-3">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
						<path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
                    c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
                    C103.821,274.792,107.225,292.797,113.47,309.408z" />
						<path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
                    c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
                    c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z" />
						<path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
                    c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
                    c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z" />
						<path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
                    c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
                    C318.115,0,375.068,22.126,419.404,58.936z" />
					</svg>
				</button>
			</a>
		</p>
	</div>
</div>
<script type="text/javascript">
	function showpassword(ob) {
		if ($(ob).hasClass("fa-eye")) {
			$(ob).removeClass("fa-eye");
			$(ob).addClass("fa-eye-slash");
			$('#register_password').attr('type', 'text');
		} else {
			$(ob).removeClass("fa-eye-slash");
			$(ob).addClass("fa-eye");
			$('#register_password').attr('type', 'password');
		}
	}
</script>
