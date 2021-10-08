@extends('layouts.layout')

@section('content')
<style>
	.pass_show {
		position: relative
	}

	.pass_show .ptxt {

		position: absolute;
		top: 50%;
		right: 10px;
		z-index: 1;
		color: black;
		font-weight: bold;
		margin-top: -10px;
		cursor: pointer;
		transition: .3s ease all;
	}

	.pass_show .ptxt:hover {
		color: #333333;
	}
</style>
<section class="header-title section-padding">
	<div class="container text-center">
		<h2 class="title">{{ zactra::translate_lang('Reset Password') }}</h2>
		<span class="sub-title"><a href="{{ url('/') }}">{{ zactra::translate_lang('Home') }}</a> &gt; {{ zactra::translate_lang('Setup Password') }}</span>
	</div>
</section>
<section class="ms-user-account">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="ms-ua-box">
					<div class="fullwidth-block">
						<div class="row justify-content-center">
							<div class="card">
								<div class="card-body">
									<form method="POST">
										@csrf
										<div class="form-group row pass_show">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ zactra::translate_lang('PASSWORD') }}">
											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group row">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ zactra::translate_lang('CONFIRM PASSWORD') }}">
										</div>
										<div class="form-group row mb-0">
											<input type="submit" value="{{ zactra::translate_lang('Set Password') }}" class="ms-ua-submit">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
		$('.pass_show').append('<span class="ptxt"><i class="fa fa-eye"></span>');
	});

	$(document).on('click', '.pass_show .ptxt', function() {

		$(this).prev().attr('type', function(index, attr) {
			return attr == 'password' ? 'text' : 'password';
		});

	});
</script>
<script id="password-requirements" type="text/html">
	<div>
		<ul>
			<li><i class="fa {length-class}"></i> Must be between 8 and 20</li>
			<li><i class="fa {letters-class}"></i> Must contain both upper and lower case letters</li>
			<li><i class="fa {digit-class}"></i> Must contain at least one number digit</li>
			<li><i class="fa {special-class}"></i> Must contain at least one special characters</li>
		</ul>
	</div>
</script>
<style>
	.popover {
		width: fit-content;
	}
</style>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/site/clients/changePassword.js?v=2') }}" defer></script>
@endsection
