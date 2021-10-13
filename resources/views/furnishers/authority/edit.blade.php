@extends('owner.layouts.app')
@section('title')
<title> {{ zactra::translate_lang('Authority') }} </title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item"><a href="#">{{ zactra::translate_lang('Authority') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Update Authority') }} > {{ $authority->name }}</li>
			</ol>
		</nav>
	</div>
</div>
<div class="container mmap-0">
	<div class="row row-sm">
		<div class="col-md-12 col-sm-12 col-12 mmap-0">
			<div class="card mg-b-20" id="tabs-style2">
				<div class="card-body">
					<div class="main-content-label mg-b-5">
						{{ zactra::translate_lang('Bank Details') }}
					</div>
					<p class="mg-b-20">{{ zactra::translate_lang('See list of bank detail here ...') }}</p>
					<section class="ms-user-account">
						<div class="container">
							<div class="row">
								<div class="col-md-3 col-sm-12"></div>
								<div class="col-md-12 col-sm-12">
									<div class="album">
										<div class="container">
											{!! Form::open(['route' => ['admins.authority.update', $authority->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data']) !!}
											<div class="row">
												<?php $states = [null => ""] + \App\BankAddress::STATES; ?>
                        @method('PUT')
                        @csrf
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-5">
														</div>
														<div class="col-md-6 mb-4 changeLogo files">
															@php
  															$authorityimg = $authority->path;
  															$findfile = public_path('/images/'.$authorityimg);
															@endphp
															@if (isset($authority->path))
  															@if (file_exists($findfile))
    															@if (!empty($authority->path))
    							                 <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{ url('/') }}/images/{{ $authorityimg }}" style="width:150px;" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
    															@else
    							                 <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" style="width:150px;" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
    															@endif
  															@else
  							                 <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" style="width:150px;" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
  															@endif
															@else
							                 <a href="{{route("admins.authority.edit", $authority->id)}}"><img class="card-img-top banks-card" src="{{url('images/default_bank_logos.png')}}" style="width:150px;" alt="{{ zactra::translate_lang('Card image cap') }}"></a>
															@endif
														</div>
													</div>
												</div>
												<div class="col-md-12 mb-4 hide updateLogo files">
													<input class="bank_logo_class bank_logo file-box form-control" type="file" name="logo" />
												</div>
												<div class="col-md-12 mb-4">
													<input type="text" name="authority[name]" value="{{strtoupper($authority->name)}}" class="form-control" id="bank_name" />
												</div>
												<div class="col-md-12 mb-4">
													@if (isset($authority->furnisher_types['types']))
													  {!! Form::select("authority[furnisher_types][types][]", [""=>"Assign Furnisher Type"] + \App\BankLogo::TYPES, $authority->furnisher_types['types'], ['multiple'=>'multiple', 'class'=>'selectize-type', 'id' => "bank-type"]); !!}
													@else
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mmap-0">
	<div class="row row-sm">
		<div class="col-md-12 col-sm-12 col-12 mmap-0">
			<div class="card mg-b-20" id="tabs-style2">
				<div class="card-body">
					<div class=" mt-2" id="account">
						<div id="addresses_container">
							<div id="dispute-address-">
								<div class="row expand-address" data-address="#address">
									<div class="col-md-6"><label for="">{{ zactra::translate_lang('Executive Address') }}</label> </div>
									<div class="col-md-6 text-right">
										<span class="text-danger mb-3 fs-18">
											<i class="fa fa-minus-circle"></i>
										</span>
									</div>
								</div>
								<div class="col-md-12 addresses" id="address">
									<div class="row">
										<div class="form-group col-sm-3">
											{!! Form::text("authority[ex_name]", $authority->ex_name, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
										</div>
										<div class="form-group col-sm-3">
											{!! Form::text("authority[street]", $authority->street, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
										</div>
										<div class="form-group col-sm-3">
											{!! Form::text("authority[city]", $authority->city, ["class"=>"form-control city","placeholder"=>"City"]) !!}
										</div>
										<div class="form-group col-sm-3">
											{!! Form::select("authority[state]", $states, $authority->state, ['class'=>'selectize-single form-control state','placeholder' => 'State']); !!}
										</div>
										<div class="form-group col-sm-3">
											{!! Form::text("authority[zip]", $authority->zip, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
										</div>
										<div class="form-group col-sm-3">
											<div class="row">
												<div class="col-sm-12">
													{!! Form::text("authority[phone_number]",$authority->phone_number, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
												</div>
											</div>
										</div>
										<div class="form-group col-sm-3">
											<div class="row">
												<div class="col-sm-12">
													{!! Form::text("authority[fax_number]", $authority->fax_number, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
												</div>
											</div>
										</div>

										<div class="form-group col-sm-3">
											<div class="row">
												<div class="col-sm-12">
													{!! Form::email("authority[email]", $authority->email, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mmap-0">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-12 text-right mb-5 mmap-0">
			<input type="submit" value="Save" class="ms-ua-submit btn btn-primary mb-5 pull-right">
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection
@section('css')
<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
{{-- <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css"> --}}
<style>
	#bankInformation .selectize-input,
	.selectize-select {
		border: 1px solid #000 !important;
		border-radius: 0px !important;
	}

	.ui-autocomplete {
		position: absolute;
		top: 100%;
		left: 0;
		z-index: 1000;
		display: none;
		float: left;
		min-width: 160px;
		padding: 5px 0;
		margin: 2px 0 0;
		list-style: none;
		font-size: 14px;
		text-align: left;
		background-color: #ffffff;
		border: 1px solid #cccccc;
		border: 1px solid rgba(0, 0, 0, 0.15);
		border-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
		box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
		background-clip: padding-box;
	}

	.ui-autocomplete > li > div {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: normal;
		line-height: 1.42857143;
		color: #333333;
		white-space: nowrap;
	}

	.ui-menu-item:hover {
		text-decoration: none;
		color: #262626;
		background-color: #f5f5f5;
		cursor: pointer;
	}

	.ui-helper-hidden-accessible {
		border: 0;
		clip: rect(0 0 0 0);
		height: 1px;
		margin: -1px;
		overflow: hidden;
		padding: 0;
		position: absolute;
		width: 1px;
	}

	.ms-ua-box {
		background-color: #ffffff !important;
		border-radius: 4px !important;
		padding: 15px;
		box-shadow: 0 0 5px 1px #0000005c;
		opacity: 1;
	}

	.expand-address {
		cursor: pointer;
	}

	.selected {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		margin: -7px;
	}

	.selected li {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: justify;
		-ms-flex-pack: justify;
		justify-content: space-between;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		background: rgb(6, 29, 49, 0.8);
		border-radius: 3px;
		margin: 7px;
		padding-left: 0.9375rem;
		padding-right: 0.3125rem;
		max-width: calc(100% - 14px);
		box-shadow: 2px 2px 1px #061d3166;
	}

	.selected span {
		font-size: 1.25rem;
		color: #fff;
		display: inline-block;
		max-width: 100%;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.selected i {
		cursor: pointer;
		font-size: 1.25rem;
		color: #fff;
		padding: 5px;
		-webkit-transition: .2s;
		transition: .2s;
	}

	.responsive {
		width: 100%;
		height: auto;
	}

	.hide {
		display: none !important;
	}

	.hidden {
		display: none !important;
	}

	@media (max-width: 576px) {
		.mficons {
			width: 25% !important;
		}

		.mmb-5 {
			margin-bottom: 5px !important;
		}

		.mmt-5 {
			margin-top: 5px !important;
		}
	}
</style>
@endsection

@section('js')
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="{{ asset('js/site/admin/banks.js?v=2') }}"></script>

<script>
	$(document).ready(function() {

		$.validator.addMethod("extension", function(value, element, param) {
			param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
			return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
		}, "Please enter a value with a valid extension.");

		$('#bankInformation').validate({
			rules: {
				"logo": {
					extension: "jpg,jpeg,png"
				},
			},
			messages: {
				"logo": {
					extension: "You're only allowed to upload jpg or png images."
				},

			},
			errorPlacement: function(error, element) {
				error.insertAfter(element);
			}
		});
		$(".selectize-type").selectize({
			plugins: ['remove_button']
		});

	});
</script>

<script>
	$('.delete-furnisher').click(function(e) {
		e.preventDefault() // Don't post the form, unless confirmed

		bootbox.confirm({
			title: "Destroy  this FURNISHER/CRAs?",
			message: "Do you really want to delete this record?",
			buttons: {
				cancel: {
					label: '<i class="fa fa-times"></i> Cancel',
					className: 'btn-success'
				},
				confirm: {
					label: '<i class="fa fa-check"></i> Confirm',
					className: 'btn-danger'
				}
			},
			callback: function(result) {
				if (result) {
					$(e.target).closest('form').submit() // Post the surrounding form
				}
			}
		});
	});
</script>

@endsection
