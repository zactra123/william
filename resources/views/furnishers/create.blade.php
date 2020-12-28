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

    .responsive{
        width: 100%;
        height: auto;
    }
</style>
@section('content')
    @include('helpers.breadcrumbs', ['title'=> "CREARE BANK", 'route' => ["Home"=> '/admins/furnishers',"Bank" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-8 pull-left">

                        </div>
                        <div class="col-md-4 pull-right">
                            <form action="/admins/furnishers" method="get">
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
                    {!! Form::open(['route' => ['admins.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-sm-3 form-group files">
                                        <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="name"  class="form-control" placeholder="BANK NAME" id="bank_name">
                                        </div>

                                        <div id="collection_types" class="m-5 hidden">
                                            <div class="row" id="collection_types_append">
                                                <div class="col-md-4 ">
                                                    3RD PARTY CA
                                                    <input name="additional_information[collection_type][]"  type="checkbox" value ="3RD PARTY CA"  {{( !empty( $bank->additional_information["collection_type"]) && in_array("3RD PARTY CA", $bank->additional_information["collection_type"])) ? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-4 ">
                                                    ASSET BUYER CA
                                                    <input name="additional_information[collection_type][]"  type="checkbox" value ="ASSET BUYER CA"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("ASSET BUYER CA", $bank->additional_information["collection_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-4 ">
                                                    LAW FIRM CA
                                                    <input name="additional_information[collection_type][]"  type="checkbox" value ="LAW FIRM CA"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("LAW FIRM CA", $bank->additional_information["collection_type"])) ? "checked":''}} class="customcheck ex_name">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", \App\BankLogo::TYPES,  1, ['class'=>'form-control', 'id' => "bank-type"]); !!}
                                        </div>

                                    </div>
                                </div>



                                <div id="account_types">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="ms-ua-box mt-2" id="account">
{{--                            <div class="ms-ua-title mb-0">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6 text-left"><h4>Addresses</h4> </div>--}}
{{--                                    <div class="col-md-6 text-right">--}}
{{--                                        <button type="button" class="remove-account-type">--}}
{{--                                            <i class="fa fa-close"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="ms-ua-form pl-4 pr-4 ">

                                <div id="addresses_container">
                                @foreach(['executive_address'=>'EXECUTIVE ADDRESS', 'registered_agent'=>'REGISTERED AGENT'] as $type=>$name)

                                    <div class="row expand-address" data-address="#address-{{$type}}">
                                        <div class="col-md-6"><label for="">{{$name}}</label>  </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses " id="address-{{$type}}">
                                        @if($type == 'registered_agent')
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"selectize-name w-100", "placeholder"=>"Agent Name"]) !!}
                                                </div>
                                            </div>
                                        @endif
                                            @if($type == 'executive_address')
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                                    </div>
                                                </div>
                                            @endif
                                        <div class="row">
                                            {!! Form::hidden("bank_address[{$type}][0][type]", $type, ["class"=>"form-control"]) !!}

                                            <div class="form-group col-sm-4">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("bank_address[{$type}][0][state]", $states,  null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <div class="form-group col-sm-2">
                                                    <img  class="responsive" src="/images/phone.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][0][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="form-group col-sm-2">
                                                    <img  class="responsive" src="/images/fax.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                {!! Form::text("bank_address[{$type}][0][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="row"></div>
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
                                {!! Form::text('equal_banks', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                                <div class="row"></div>
                            </div>
                        </div>

                        <div class="col mt-5">
                            <input type="submit" value="Save" class="ms-ua-submit">

                        </div>
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
                        <div class="form-group col-sm-2">
                            <img  class="responsive" src="/images/phone.png">
                        </div>
                        <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[{type}][{account_type_id}][phone_number]",null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="form-group col-sm-2">
                            <img  class="responsive" src="/images/fax.png">
                        </div>
                        <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[{type}][{account_type_id}][fax_number]", null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </script>


    <script>

    </script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>

    <script>
        $(document).ready(function($) {

            $.validator.addMethod("extension", function(value, element, param) {
                param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
            },"Please enter a value with a valid extension.");

            $('#bankInformation').validate({
                rules: {
                    "logo": {
                        extension: "jpg,jpeg, png"
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
        })
    </script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



