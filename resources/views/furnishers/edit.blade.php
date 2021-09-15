@extends('owner.layouts.app')
@section('title')
<title> Furnisher </title>
@endsection
@section('body')

<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Furnishers</li>
                <li class="breadcrumb-item active" aria-current="page">Edit Furnisher</li>
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
                        Edit Furnisher
                    </div>
                    <p class="mg-b-20">Edit furnisher here ...</p>
                    <div class="text-wrap mb-5">
                        <div class="example">
                            <div class="panel panel-primary">
                                @include('furnishers.search2')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ms-user-account">
	<div class="container mmap-0">
		<div class="col-md-12 col-sm-12 col-12 mmap-0">
			@php
			$states = [null=>''] + \App\BankAddress::STATES;
			$types = \App\BankLogo::TYPES;
			$subTypes = \App\BankLogo::SUB_TYPES;
			asort($types)
			@endphp
			{!! Form::open(['route' => ['admins.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data' ]) !!}
			@method('PUT')
			@csrf
			<div class="ms-ua-box">
				<div class="ms-ua-form">
					<div class="ms-ua-title mb-0">
						<div class="row">
							<div class="col-sm-4 p-5">
								<div class="col-sm-12 form-group changeLogo files">
									<?php
                    /** Checking logo in Aws S3 storage */
                  ?>
									@if($bank->checkUrlAttribute())
									<?php
                    /** Get AWS S3 file link with  getUrlAttribute function */
                  ?>
									<img class="card-img-top banks-card" src="{{$bank->getUrlAttribute()}}" alt="Card image cap">
									@else
									<?php
                    /** if Furnisher doesn't have logo in AWS S3 storage use default or in case of Furnisher should not has a logo use default no logo icon*/
                    ?>
									@if($bank->no_logo)
									<img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
									@else
									<img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
									@endif
									@endif
								</div>
								<div class="col-sm-12 hide form-group updateLogo files">
									<input class="bank_logo_class bank_logo form-control file-box" type="file" name="logo">
								</div>
								<div class="col-md-12 mt-3"><input type="checkbox" value="true" name="bank[no_logo]" /> <span class="ml-2">NO LOGO</span></div>
							</div>
							<div class="col-md-8 pt-5">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control bank_name" placeholder="Company Name">
										{!! Form::hidden("bank[id]", $bank->id, ["class"=>"form-control bank_id"]) !!}
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::select("bank[type]", $types, $bank->type, ['class'=>'form-control selectize-single bank-type']); !!}
									</div>
								</div>
								<div class="mx-5">
									<div class="row">
										<div class="">
											<div class="row bank_sub_type_append mb-3">
												@if(isset($subTypes[$bank->type]))
												@foreach($subTypes[$bank->type] as $key => $type)
												<div class="col-md-4 mb-3">
													<div class="row">
														<div class="col-md-2">
															<input name="bank[additional_information][sub_type][]" type="checkbox" value="{{$type}}" {{( !empty( $bank->additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
														</div>
														<div class="col-md-10">
															{{$type}}
														</div>
													</div>
												</div>
												@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="row parent {{in_array($bank->type, [14,17, 18, 19,20, 21, 23, 24, 26, 27, 28, 29, 31,32, 43, 33, 30, 60, 61]) ||(!empty( $bank->additional_information["sub_type"]) && in_array("BANK-SBA LENDER", $bank->additional_information["sub_type"]))? "": 'hidden'}}">
									<div class="col-md-3 pl-3">
										<a class="btn btn-primary show-parent-field form-control text-white">Add Parent</a>
										<a class="btn btn-primary hide hide-parent-field form-control mt-3 text-white">Hide Parent</a>
									</div>
									<div class="col-md-9 parent-show">
										<div class="col-md-12">
											<div class="form-group banks ">
												{!! Form::text("bank[parent_name]", $bank->parent ? $bank->parent->name : null, ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'Parent Bank Name']); !!}
												{!! Form::hidden("bank[parent_id]", $bank->parent_id, ["class"=>"form-control parent_id"]) !!}
											</div>
										</div>
										<div class="row pull-right pr-3">
											<div class="col-md-12">
												<a href="javascript:void(0)" class="btn btn-primary show-parent-bank text-white">Show Bank Info</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ms-ua-box mt-2 pt-5" id="account">
				<div class="ms-ua-form pl-4 pr-4 ">
					<div id="addresses_container">
						@foreach(\App\BankAddress::TYPES as $type=>$name)
						@php
						$address = !empty($bank_addresses[$type]) ? $bank_addresses[$type] : null;
						$hidden = false;

						if ($type == 'fraud_address') {
						$hidden = $bank->type != 3;
						}
						if ($type == 'qwr_address'){
						$hidden = !in_array($bank->type, [2, 55]) || (empty($bank->additional_information['sub_type']) || !in_array('MORTGAGE', $bank->additional_information['sub_type']));
						}
						@endphp
						@if($type == 'additional_address')
						<?php if (!empty($bank_addresses[$type])) { ?>
						@foreach($bank_addresses[$type] as $addresses)
						    @include('furnishers._address', ['type'=>$type,'states' => $states, 'address'=>$addresses ])
						@endforeach
						<?php } ?>
						<div class="row additional-addresses pl-1">
							<div class="col-sm-12 add-additional mt-3 p-1 pb-5 ml-3"><a class="btn btn-primary ms-ua-submit text-white">Add Additional Address</a></div>
						</div>
						@continue
						@endif
						<formset class="{{$hidden? 'hidden': ''}} {{$type}}">
							<div class="row expand-address" data-address="#address-{{$type}}">
								<div class="col-md-6"><label for="">{{$name}}</label></div>
								<div class="col-md-6 text-right mb-3">
									<span class="text-danger mb-3 fs-18">
										<i class="fa fa-minus-circle"></i>
									</span>
								</div>
							</div>
							<div class="col-md-12 addresses " id="address-{{$type}}">
								@if($type == 'registered_agent')
								<div class="row mb-3">
									<div class="col-sm-5 paste-register"><a class="btn btn-primary ms-ua-submit text-white">Copy Entity Address as Registered Agent fix functionality</a></div>
								</div>
								@endif
								<div class="row">
									@if($type == 'registered_agent')
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
									</div>
									@endif
									@if($type == 'executive_address')
									<div class="col-md-12 executive_copied">
										<div class="row">
											<div class="col-md-6">
												Copy ParenT Executive Contact
											</div>
											<div class="col-md-6">
												<input type="checkbox" value="true" name="bank_address[{{$type}}][copied]" {{$bank->copied == true ? "checked":''}}>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
									</div>
									@endif
									@if($type == 'dispute_address' || $type == 'qwr_address' || $type == 'fraud_address')
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
									</div>
									@endif
									{!! Form::hidden("bank_address[$type][type]", $type, ["class"=>"form-control"]) !!}
									{!! Form::hidden("bank_address[$type][id]", !empty($address) ? $address['id'] : null, ["class"=>"form-control"]) !!}
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][street]", !empty($address) ? $address['street'] : null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
									</div>
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][city]", !empty($address) ? $address['city'] : null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
									</div>
									<div class="form-group col-sm-3">
										{!! Form::select("bank_address[{$type}][state]", $states, !empty($address) ? $address['state'] : null, ['class'=>'form-control selectize-single state','placeholder' => 'State']); !!}
									</div>
									<div class="form-group col-sm-3">
										{!! Form::text("bank_address[{$type}][zip]", !empty($address) ? $address['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
									</div>
									<div class="form-group col-sm-3">
										<div class="row">
											<div class="form-group col-sm-12">
												{!! Form::text("bank_address[{$type}][phone_number]",!empty($address) ? $address['phone_number'] : null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
											</div>
										</div>
									</div>
									<div class="form-group col-sm-3">
										<div class="row">
											<div class="form-group col-sm-12">
												{!! Form::text("bank_address[{$type}][fax_number]", !empty($address) ? $address['fax_number'] : null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
											</div>
										</div>
									</div>
									<div class="form-group col-sm-3">
										<div class="row">
											<div class="form-group col-sm-12">
												{!! Form::email("bank_address[$type][email]", !empty($address) ? $address['email'] : null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
						</formset>
						@endforeach
					</div>
					<div class="row"></div>
				</div>
			</div>
			<div class="ms-ua-box mt-2" id="account-equal-bank">
				<div class="ms-ua-title mb-0">
					<div class="row">
						<div class="col-md-6 text-left">
							<h4>Other Names Used</h4>
						</div>
						<div class="col-md-6 text-right mb-3">
							<span type="button" class="text-danger fs-18 remove-equal-bank pointer">
								<i class="fa fa-times"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="ms-ua-form pl-4 pr-4 ">
					{!! Form::text('equal_banks', implode(',',$bank->equalBanks->pluck('name')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
					<div class="row"></div>
				</div>
			</div>
			<div class="row mt-5 mb-5 text-right">
				<div class="col-md-12">
					<input type="submit" value="Save" class="btn btn-primary ms-ua-submit pull-right">
				</div>
			</div>
			{!! Form::hidden('referrer', request()->headers->get('referer')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</section>
<div class="modal fade in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Create Furinsher</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ms-user-account">
                @include('furnishers._add_bank')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="parentModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h3 class="modal-title" id="parentModalLabel">Parent Bank Information</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ms-user-account">
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="{{ asset('js/site/admin/banks.js') }}"></script>
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
        })
        $(".selectize-type").selectize({
            plugins: ['remove_button']
        })

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
<script>
    var types = {
        !!json_encode(\App\ BankLogo::SUB_TYPES) !!
    };
</script>
<script type="text/html" id="sub_types_append">
    <div class="col-md-4 mb-3 remove_sub_type">
        <div class="row">
            <div class="col-md-2">
                <input name="bank[additional_information][sub_type][]" type="checkbox" value="{value}">
            </div>
            <div class="col-md-10">
                {value}
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="addtional_address_template">
    <formset class="additional_address">
        <div class="row remove-address">
            <div class="col-md-6 mt-3"><label for="">Additional Address</label></div>
            <div class="col-md-6 text-right mb-3 mt-3">
                <button class="text-danger fs-18 mb-3" style="border:none !important;background:none !important;">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="col-md-12 addresses " id="address-additional_address-{i}">
            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::text("bank_address[additional_address][{i}][name]", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
                </div>
            </div>
            <div class="row">
                {!! Form::hidden("bank_address[additional_address][{i}][type]", 'additional_address', ["class"=>"form-control"]) !!}
                <div class="form-group col-sm-5">
                    {!! Form::text("bank_address[additional_address][{i}][street]", null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::text("bank_address[additional_address][{i}][city]", null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::select("bank_address[additional_address][{i}][state]", $states, null, ['class'=>'{class} state','placeholder' => 'State']); !!}
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::text("bank_address[additional_address][{i}][zip]", null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::text("bank_address[additional_address][{i}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::text("bank_address[additional_address][{i}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::email("bank_address[additional_address][{i}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </formset>
</script>
@endsection
