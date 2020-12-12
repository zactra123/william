@extends('layouts.layout')



<style>

    .selectize-input,.selectize-select{
        border: 1px solid #000 !important;
        border-radius: 8px !important;
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

</style>

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/owner',"{$bank->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="row m-2  pt-4">
                    <div class="col-md-8 pull-left">

                    </div>
                    <div class="col-md-4 pull-right">
                        <form action="/owner/furnishers" method="get">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <input type="text" name="term"  class="form-control" >
                                </div>
                                <div class="col-md-4  form-group">
                                    <input type="submit" value="Search" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <?php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types = [null=>''] + \App\BankLogo::TYPES;
                ?>
                    {!! Form::open(['route' => ['owner.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data' ]) !!}
                    @method('PUT')
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">

                            <div class="ms-ua-title mb-0">
                                <div class="row">


                                    <div class="col-sm-3 form-group changeLogo">
                                        @if($bank->checkUrlAttribute())
                                            <img src="{{$bank->getUrlAttribute()}}" width="100px">
                                        @else
                                            <img width="100px" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                        @endif
                                    </div>
                                    <div class="col-sm-3 hide form-group updateLogo files">
                                        <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control" id="bank_name">
                                        </div>
                                    </div>

                                </div>
                                <div id="collection_types" class="m-5">
                                    <div class="row" id="collection_types_append">
                                        <div class="col-md-4 ">
                                            3RD PARTY CA
                                            <input name="bank[additional_information][collection_type][]"  type="checkbox" value ="3RD PARTY CA"  {{( !empty( $bank->additional_information["collection_type"]) && in_array("3RD PARTY CA", $bank->additional_information["collection_type"])) ? "checked":''}} class="customcheck ex_name">
                                        </div>
                                        <div class="col-md-4 ">
                                            ASSET BUYER CA
                                            <input name="bank[additional_information][collection_type][]"  type="checkbox" value ="ASSET BUYER CA"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("ASSET BUYER CA", $bank->additional_information["collection_type"]))? "checked":''}} class="customcheck ex_name">
                                        </div>
                                        <div class="col-md-4 ">
                                            LAW FIRM CA
                                            <input name="bank[additional_information][collection_type][]"  type="checkbox" value ="LAW FIRM CA"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("LAW FIRM CA", $bank->additional_information["collection_type"])) ? "checked":''}} class="customcheck ex_name">
                                        </div>
                                    </div>
                                </div>
                                <div id="account_types">
                                    <div class="row" id="account_types_append">
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
{{--                        @if($bank->additional_information != null)--}}
{{--                        <div class="ms-ua-box mt-2" id="account_additional_information">--}}
{{--                        <div class="ms-ua-title mb-0">--}}
{{--                            <div class="row">--}}
{{--                                @foreach($bank->additional_information as $additionalInformation)--}}
{{--                                <div class="col-md-12 text-left">--}}
{{--                                        {{$additionalInformation!=null && $additionalInformation != 'null' ?$additionalInformation: ""}}--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                        @endif--}}




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

                                @foreach($bank_addresses as $address)
                                    <?php $atid = intval($address->account_type_id); ?>
                                    <div id="dispute-address-{{$atid}}">
                                        <div class="row expand-address" data-address="#address-{{$address->type}}-{{$address->account_type_id}}">
                                            <div class="col-md-6"><label for="">{{(!empty($address->accountType))?$address->accountType->name : '' }} {{str_replace("ADDRESS","",\App\BankAddress::TYPES[$address->type])}}</label>  </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 addresses " id="address-{{$address->type}}-{{$address->account_type_id}}">
                                            @if($address->type == 'registered_agent')
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$address->type}][$atid][name]", $address->name, ["class"=>"form-control", "placeholder"=>"Agent Name"]) !!}
                                                    </div>
                                                </div>
                                            @endif
                                                @if($address->type == 'executive_address')
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            {!! Form::text("bank_address[{$address->type}][$atid][name]", $address->name, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            <div class="row">
                                                {!! Form::hidden("bank_address[$address->type][$atid][account_type_id]", $address->account_type_id, ["class"=>"form-control"]) !!}
                                                {!! Form::hidden("bank_address[$address->type][$atid][type]", $address->type, ["class"=>"form-control"]) !!}
                                                {!! Form::hidden("bank_address[$address->type][$atid][id]", $address->id, ["class"=>"form-control"]) !!}

                                                <div class="form-group col-sm-4">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][street]",  $address->street, ["class"=>"form-control", "placeholder"=>"Street"]) !!}
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][city]", $address->city, ["class"=>"form-control","placeholder"=>"City"]) !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                    {!! Form::select("bank_address[$address->type][$atid][state]", $states,  $address->state, ['class'=>'selectize-single','placeholder' => 'State']); !!}
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                    {!! Form::text("bank_address[$address->type][$atid][zip]",  $address->zip, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    {!! Form::text("bank_address[$address->type][$atid][phone_number]",$address->phone_number, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::text("bank_address[$address->type][$atid][fax_number]", $address->fax_number, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach
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

                    <div class="form-group col-sm-4">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][street]",  null, ["class"=>"form-control", "placeholder"=>"Street"]) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][city]",   null, ["class"=>"form-control","placeholder"=>"City"]) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                        {!! Form::select("bank_address[{type}][{account_type_id}][state]", $states,  null, ['class'=>'selectize-single','placeholder' => 'State']); !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                        {!! Form::text("bank_address[{type}][{account_type_id}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::text("bank_address[{type}][{account_type_id}][phone_number]",null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::text("bank_address[{type}][{account_type_id}][fax_number]", null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                    </div>

                </div>
            </div>
        </div>


    </script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



