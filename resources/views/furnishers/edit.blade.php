@extends('layouts.layout')

@section('content')
    <style>

        #bankInformation .selectize-input,.selectize-select{
            border: 1px solid #000 !important;
            border-radius: 8px !important;
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
            color:#fff;
            padding: 5px;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .responsive{
            width: 100%;
            height: auto;
        }

    </style>
    @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/admins',"{$bank->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="row m-2  pt-4">
                    <div class="col-md-2 pull-left">
                        <form method="POST" action="{{route('admins.bank.delete', $bank->id)}}">
                            @csrf
                            @method("DELETE")

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-furnisher" value="Delete">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 pull-left">
                    </div>
                    @include('furnishers.search')

                </div>
                <?php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types = [null=>''] + \App\BankLogo::TYPES;
                ?>
                    {!! Form::open(['route' => ['admins.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data' ]) !!}
                    @method('PUT')
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">

                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-sm-3 form-group changeLogo files">
                                        @if($bank->checkUrlAttribute())
                                            <img src="{{$bank->getUrlAttribute()}}" width="100px">
                                        @else
                                            <img width="100px" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                        @endif
                                    </div>
                                    <div class="col-sm-3 hide form-group updateLogo files">
                                        <input class="bank_logo_class bank_logo file-box" type="file" name="logo" >
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control" id="bank_name">
                                        </div>
                                        <div class="m-5 collection_types">
                                            <div class="row" id="collection_types_append collection-4 collection-44">
                                                <div class="col-md-6 collection-4 collection-44 {{$bank->type == 4 || $bank->type == 44 ? "" : "hidden"}}">
                                                    3RD PARTY CA
                                                    <input name="bank[additional_information][collection_type][]"  type="checkbox" value ="3RD PARTY CA"  {{( !empty( $bank->additional_information["collection_type"]) && in_array("3RD PARTY CA", $bank->additional_information["collection_type"])) ? "checked":''}}>
                                                </div>
                                                <div class="col-md-6 collection-4 collection-44 {{ $bank->type != 4 ? "hidden" : ""}}">
                                                    ASSET/DEBT BUYER
                                                    <input name="bank[additional_information][collection_type][]"  type="checkbox" value="ASSET/DEBT BUYER"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("ASSET/DEBT BUYER", $bank->additional_information["collection_type"]))? "checked":''}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-5 mortgage_lender_type ">
                                            <div class="row" id="mortgage_lender_type_append">
                                                <div class="col-md-6  mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    CONVENTIONAL
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="CONVENTIONAL"  {{( !empty( $bank->additional_information["mortgage_lander_type"]) && in_array("CONVENTIONAL", $bank->additional_information["mortgage_lander_type"])) ? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6  mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    GOVERNMENT INSURED
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="GOVERNMENT INSURED"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("GOVERNMENT INSURED", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6 mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    JUMBO
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="JUMBO"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("JUMBO", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6  mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    ADJSUTABLE-RATE
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="ADJSUTABLE-RATE"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("ADJSUTABLE-RATE", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6  mortgage-lender-29">
                                                    FIXED-RATE
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="FIXED-RATE"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("FIXED-RATE", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6  mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    HELOC
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="HELOC"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("HELOC", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6  mortgage-lender-29 {{$bank->type == 29 ? "" : "hidden"}}">
                                                    PRIVATE MONEY
                                                    <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="PRIVATE MONEY"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("PRIVATE MONEY", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", \App\BankLogo::TYPES,  $bank->type, ['class'=>'form-control bank-type']); !!}
                                        </div>

                                    </div>


                                </div>
                                <div class="row parent {{$bank->type != 18 ? "hidden": ''}}">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group banks ">
                                            {!! Form::text("bank[parent_name]", $bank->parent ? $bank->parent->name : null, ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                            {!! Form::hidden("bank[parent_id]", $bank->parent_id, ["class"=>"form-control parent_id"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn form-control">ADD BANK</a>
                                </div>


                                </div>


                                <div class="account_types">
                                    <div class="row" class="account_types_append">
                                        @foreach($account_types as $typeId =>$typeName)
                                            <div class="col-md-3 ">
                                                {{$typeName}}
                                                <input name="account_type[]" data-type="{{$typeName}}" type="checkbox" id="name-{{$typeId}}" value ="{{$typeId}}"  {{in_array($typeName, $bank_types)? "checked":''}} class="customcheck ex_name">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="ms-ua-box mt-2" id="account">
{{--                        <div class="ms-ua-title mb-0">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6 text-left"><h4>Addresses</h4> </div>--}}
{{--                                <div class="col-md-6 text-right">--}}
{{--                                    <button type="button" class="remove-equal-bank">--}}
{{--                                        <i class="fa fa-close"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="ms-ua-form pl-4 pr-4 ">
                            <div id="addresses_container">
                                <?php $trustee = null; ?>
                                @foreach($bank_addresses as $address)
                                    <?php $atid = intval($address->account_type_id); ?>
                                        @if($address->type == 'trustee')
                                            @continue($trustee = $address)
                                        @endif

                                    <div id="dispute-address-{{$atid}}">
                                        <div class="row expand-address" data-address="#address-{{$address->type}}-{{$address->account_type_id}}">
                                            <div class="col-md-6"><label for="">{{(!empty($address->accountType))?$address->accountType->name : '' }} {{str_replace("ADDRESS","",\App\BankAddress::TYPES[$address->type])}}</label>  </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 addresses" id="address-{{$address->type}}-{{$address->account_type_id}}">
                                            @if($address->type == 'executive_address')
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$address->type}][$atid][name]", $address->name, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($address->type == 'registered_agent')
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$address->type}][$atid][name]", $address->name, ['class'=>'autocomplete-name w-100 form-control', 'placeholder' => 'Agent Name', "data-type"=> 'registered_agent']); !!}

                                                    </div>
                                                </div>
                                            @endif


                                            <div class="row">
                                                {!! Form::hidden("bank_address[$address->type][$atid][account_type_id]", $address->account_type_id, ["class"=>"form-control="]) !!}
                                                {!! Form::hidden("bank_address[$address->type][$atid][type]", $address->type, ["class"=>"form-control"]) !!}
                                                {!! Form::hidden("bank_address[$address->type][$atid][id]", $address->id, ["class"=>"form-control"]) !!}

                                                <div class="form-group col-sm-6">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][street]",  $address->street, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][city]", $address->city, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                                </div>
                                                <div class="form-group col-sm-1">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                    {!! Form::select("bank_address[$address->type][$atid][state]", $states,  $address->state, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][zip]",  $address->zip, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-1">
                                                       <img  class="responsive" src="/images/phone.png">
                                                    </div>
                                                    <div class="form-group col-sm-10 p-1">
                                                    {!! Form::text("bank_address[$address->type][$atid][phone_number]",$address->phone_number, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-1">
                                                        <img  class="responsive" src="/images/fax.png">
                                                    </div>
                                                    <div class="form-group col-sm-10 p-1">
                                                        {!! Form::text("bank_address[$address->type][$atid][fax_number]", $address->fax_number, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-1">
                                                        <img  class="responsive" src="/images/email.png">
                                                    </div>
                                                    <div class="form-group col-sm-10 p-1">
                                                        {!! Form::email("bank_address[$address->type][$atid][email]", $address->email, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="trustee_address">
                                        <formset {{$bank->type != 29 ? "disabled": ''}} class="trustee">
                                            <div class="row expand-address trustee {{$bank->type != 29 ? "hidden": ''}} " data-address="#address-trustee">
                                                <div class="col-md-6"><label for="">TRUSTEE</label>  </div>
                                                <div class="col-md-6 text-right">
                                                    <button type="button">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 addresses trustee {{$bank->type != 29 ? "hidden": ''}}" id="address-trustee">
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[trustee][0][name]", !empty($trustee) ? $trustee["name"]:'', ["class"=>"autocomplete-trust form-control", "placeholder"=>"trustee Name", "data-type"=> 'trustee']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {!! Form::hidden("bank_address[trustee][0][type]", 'trustee', ["class"=>"form-control"]) !!}
                                                    {!! Form::hidden("bank_address[trustee][0][account_type_id]", null, ["class"=>"form-control="]) !!}

                                                    <div class="form-group col-sm-6">
                                                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                        {!! Form::text("bank_address[trustee][0][street]",  !empty($trustee) ? $trustee["street"]:'', ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                        {!! Form::text("bank_address[trustee][0][city]",   !empty($trustee) ? $trustee["city"]:'', ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                                    </div>
                                                    <div class="form-group col-sm-1">
                                                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                        {!! Form::select("bank_address[trustee][0][state]", $states,  !empty($trustee) ? $trustee["state"]:'', ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                                    </div>
                                                    <div class="form-group col-sm-2">
                                                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                        {!! Form::text("bank_address[trustee][0][zip]",  !empty($trustee) ? $trustee["zip"]:'', ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <div class="form-group col-sm-2 p-0">
                                                            <img  class="responsive" src="/images/phone.png">
                                                        </div>
                                                        <div class="form-group col-sm-10">
                                                            {!! Form::text("bank_address[trustee][0][phone_number]",!empty($trustee) ? $trustee["phone_number"]:'', ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <div class="form-group col-sm-2 p-0">
                                                            <img  class="responsive" src="/images/fax.png">
                                                        </div>
                                                        <div class="form-group col-sm-10">
                                                            {!! Form::text("bank_address[trustee][0][fax_number]", !empty($trustee) ? $trustee["fax_number"]:'', ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <div class="form-group col-sm-2 p-0">
                                                            <img  class="responsive" src="/images/email.png">
                                                        </div>
                                                        <div class="form-group col-sm-10">
                                                            {!! Form::email("bank_address[trustee][0][email]", !empty($trustee) ? $trustee["email"]:'', ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </formset>
                                    </div>

                            </div>
                            <div class="row"></div>
                        </div>
                    </div>

                    <div class="ms-ua-box mt-2" id="account-equal-bank">
                        <div class="ms-ua-title mb-0">
                            <div class="row">
                                <div class="col-md-6 text-left"><h4>Equal Names</h4> </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="remove-equal-bank">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="ms-ua-form pl-4 pr-4 ">
                            {!! Form::text('equal_banks', implode(',',$bank->equalBanks->pluck('name')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                            <div class="row"></div>
                        </div>
                    </div>

                <div class="col mt-5">
                    <input type="submit" value="Save" class="ms-ua-submit">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Create Parent Bank</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ms-user-account">
                    @include('furnishers._add_bank')
            </div>
        </div>
    </div>



    <script type="text/html" id="address-template">
        <div id="dispute-address-{id}">
            <div class="row expand-address" data-address="#address-{type}">
                <div class="col-md-6"><label for="">{name}</label>  </div>
                <div class="col-md-6 text-right">
                    <button type="button">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-12 addresses " id="address-{type}">
                <div class="row">
                    {!! Form::hidden("bank_address[{type}][{account_type_id}][account_type_id]", "{account_type_id}", ["class"=>"form-control"]) !!}
                    {!! Form::hidden("bank_address[{type}][{account_type_id}][type]", "dispute_address", ["class"=>"form-control"]) !!}

                    <div class="form-group col-sm-6">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][street]",  null, ["class"=>"form-control", "placeholder"=>"Street"]) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][city]",   null, ["class"=>"form-control","placeholder"=>"City"]) !!}
                    </div>
                    <div class="form-group col-sm-1">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                        {!! Form::select("bank_address[{type}][{account_type_id}][state]", $states,  null, ['class'=>'selectize-single','placeholder' => 'State']); !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2  p-1">
                            <img  class="responsive" src="/images/phone.png">
                        </div>
                        <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[{type}][{account_type_id}][phone_number]",null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2  p-1">
                            <img  class="responsive" src="/images/fax.png">
                        </div>
                        <div class="form-group col-sm-10">
                            {!! Form::text("bank_address[{type}][{account_type_id}][fax_number]", null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-1">
                            <img  class="responsive" src="/images/email.png">
                        </div>
                        <div class="form-group col-sm-10 p-1">
                            {!! Form::email("bank_address[{type}][{account_type_id}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>
    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
    <script>
        $(document).ready(function($) {

            $.validator.addMethod("extension", function(value, element, param) {
                param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
            },"Please enter a value with a valid extension.");

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
            $(".selectize-type").selectize({plugins: ['remove_button']})

        })
    </script>

    <script>
        $('.delete-furnisher').click(function(e){
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
                callback: function (result) {
                    if (result) {
                        $(e.target).closest('form').submit() // Post the surrounding form
                    }
                }
            });


        });
    </script>


@endsection



