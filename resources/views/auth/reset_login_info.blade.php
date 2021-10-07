@extends('layouts.auth')
@section('content')
<section class="register">
	{{-- <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background"> --}}
	<div class="register-form" data-id="1">
		<div class="title">
			<h3>{{ zactra::translate_lang('Rest Login information') }}</h3>
		</div>
		<div class="register_form">
			<div class="title">
				<h4>{{ zactra::translate_lang('Step 3: Reset password') }}</h4>
			</div>
		{!! Form::open(['route' => 'login.infoFinishSend', 'method' => 'POST', 'id' => 'loginInformation3', 'class' => 'm-form m-form--label-align-right']) !!}
		@csrf
		<div class="form-group w-100 mb-0">
			<div class="col-md-12 p-0">
				<h4>{{ zactra::translate_lang('YOUR EMAIL IS :') }}  {{$client->email}}</h4>
			</div>
		</div>
		<input name="id" type="hidden" value="{{$client->id}}">
		<div class="form-group w-100 mb-0">
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ zactra::translate_lang('Password') }}">
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group w-100 mb-0">
			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ zactra::translate_lang('Confirm Password') }}">
		</div>
		<div class="basic-button"><input type="submit" value="{{ zactra::translate_lang('Finish') }}" class="login"></div>
		{!! Form::close() !!}
	</div>
	</div>
</section>
<script>
	$(document).ready(function($) {

		$('#loginInformation3').validate({
			rules: {
				"password": {
					required: true,
					minlength: 8
				},
				"password_confirmation": {
					required: true,
					equalTo: "#password"
				}
			},
			messages: {
				"password_confirmation": {
					equalTo: "Password confirmation doesn't match Password"
				}
			},
			errorPlacement: function(error, element) {
				if (element.attr("name") == "sex") {
					error.insertAfter($(element).closest("div"));
				} else {
					error.insertAfter(element);
				}
			}
		})
	});
</script>
@endsection
