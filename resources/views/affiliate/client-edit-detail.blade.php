@extends('layouts.layout1')
@section('content')
<div class="container fon">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h1>{{ zactra::translate_lang('Edit Client Details') }}</h1>
					{!! Form::open(['route' => ['affiliate.updateClientDetails', $user->id], 'method' => 'POST', 'id' => 'clientDetailsForm', 'class' => 'm-form m-form--label-align-right']) !!}
					 @method('PUT')
					 @csrf
					<div class="form-group row m-1">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('First Name:') }} </label>

						<div class="col-md-6">
							{{ Form::text('client[first_name]', $user->first_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your first name']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('Last Name :') }} </label>
						<div class="col-md-6">
							{{ Form::text('client[last_name]', $user->last_name, ['class' => 'form-control m-input', 'placeholder' => 'Enter your last name']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('Phone number :') }} </label>
						<div class="col-md-6">
							{{ Form::text('client[phone_number]', $user->clientDetails->phone_number, ['class' => 'form-control m-input','id'=>'phone_number', 'placeholder' => 'Enter your last name']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('DOB:') }} </label>
						<div class="col-md-6">
							{{ Form::date('client[dob]', $user->clientDetails->dob, ['class' => 'form-control m-input']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('SEX:') }} </label>
						<div class="col-md-8">
							<label for="password" class="col-md-3 col-form-label text-md-center">{{ zactra::translate_lang('Male:') }} </label>
							<label for="password" class="col-md-3 col-form-label text-md-center">{{ zactra::translate_lang('Female:') }} </label>
							<label for="password" class="col-md-3 col-form-label text-md-center">{{ zactra::translate_lang('Other:') }} </label>
						</div>
						<label for="password" class="col-md-4 col-form-label text-md-right"></label>
						<div class="col-md-8">
							<label for="Sex" class="col-md-3 col-form-label text-md-center">
								{{Form::radio('client[sex]','M', $user->clientDetails->sex=='M')}}
							</label>
							<label for="Sex" class="col-md-3 col-form-label text-md-center">
								{{Form::radio('client[sex]','F', $user->clientDetails->sex=='F')}}
							</label>
							<label for="Sex" class="col-md-3 col-form-label text-md-center">
								{{Form::radio('client[sex]','O', $user->clientDetails->sex=='O')}}
							</label>
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('SSN:') }} </label>
						<div class="col-md-6">
							{{ Form::text('client[ssn]', $user->clientDetails->ssn, ['class' => 'form-control ssn', 'placeholder' => 'Enter your SSN']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('Street Address:') }} </label>
						<div class="col-md-6">
							{{ Form::text('client[address]', $user->clientDetails->address, ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'Enter your address']) }}
						</div>
					</div>
					<div class="form-group row m-1">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ zactra::translate_lang('Zip code:') }} </label>
						<div class="col-md-6">
							{{ Form::text('client[zip]', $user->clientDetails->zip, ['class' => 'form-control m-input', 'id'=>'zip', 'placeholder' => 'Enter your zip']) }}
						</div>
					</div>
					<div class="form-group row mb-0 font">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ zactra::translate_lang('Submit') }}
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places"></script>
<script type="text/javascript">
	$(document).ready(function() {
		autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
			types: ["address"],
			componentRestrictions: {
				country: "us"
			}
		});
		google.maps.event.addListener(autocomplete, "place_changed", function() {
			var place = autocomplete.getPlace();
			for (var i = 0; i < place.address_components.length; i++) {
				for (var j = 0; j < place.address_components[i].types.length; j++) {
					if (place.address_components[i].types[j] == "postal_code") {
						$("#zip").val(place.address_components[i].long_name);
					}
				}
			}
		});

		$("#date").focus(function() {
			this.type = "date";
		});
		$("#date").click(function() {
			this.type = "date";
		});
		$("#date").blur(function() {
			if (this.value == "") {
				this.type = "text";
			}
		});

		$(".ssn").keyup(function() {
			var val = this.value.replace(/\D/g, "");
			var newVal = "";
			if (val.length > 4) {
				this.value = val;
			}
			if (val.length > 3 && val.length < 6) {
				newVal += val.substr(0, 3) + "-";
				val = val.substr(3);
			}
			if (val.length > 5) {
				newVal += val.substr(0, 3) + "-";
				newVal += val.substr(3, 2) + "-";
				val = val.substr(5);
			}
			newVal += val;
			this.value = newVal.substring(0, 11);
		});

		$("#phone_number").keyup(function() {
			var val = this.value.replace(/\D/g, "");
			var newVal = "";
			if (val.length > 4) {
				this.value = val;
			}

			if (val.length > 3 && val.length < 7) {
				newVal += val.substr(0, 3) + "-";
				val = val.substr(3);
			}
			if (val.length > 6) {
				newVal += val.substr(0, 3) + "-";
				newVal += val.substr(3, 3) + "-";
				val = val.substr(6);
			}
			newVal += val;
			this.value = newVal.substring(0, 12);
		});
	});
</script>
@endsection
