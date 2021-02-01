@extends('layouts.layout')

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
                        <div class="col-md-3 pull-left">

                        </div>
                        @include('furnishers.search')
                    </div>
                    <?php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types = [null=>''] + \App\BankLogo::TYPES;
                    ?>
                    {!! Form::open(['route' => ['admins.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf
                    <div class="ms-ua-box">an
                        <div class="ms-ua-form">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-sm-3 form-group files">
                                        <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]"  class="form-control bank_name" placeholder="BANK NAME" >
                                        </div>

                                        <div class="m-5 collection_types ">
                                            <div class="row" id="collection_types_append">
                                                <div class="col-md-6 hidden collection-4 collection-44">
                                                    3RD PARTY CA
                                                    <input name="additional_information[collection_type][]"  type="checkbox" value ="3RD PARTY CA"  {{( !empty( $bank->additional_information["collection_type"]) && in_array("3RD PARTY CA", $bank->additional_information["collection_type"])) ? "checked":''}} class="customcheck ex_name">
                                                </div>
                                                <div class="col-md-6 hidden collection-4 collection-44">
                                                    ASSET/DEBT BUYER
                                                    <input name="additional_information[collection_type][]"  type="checkbox" value ="ASSET/DEBT BUYER"  {{(!empty( $bank->additional_information["collection_type"]) && in_array("ASSET/DEBT BUYER", $bank->additional_information["collection_type"]))? "checked":''}} class="customcheck ex_name">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", \App\BankLogo::TYPES,  1, ['class'=>'form-control bank-type']); !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row parent hidden">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group banks ">
                                            {!! Form::text("bank[parent_name]", '', ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                            {!! Form::hidden("bank[parent_id]", '', ["class"=>"form-control parent_id"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn form-control">ADD BANK</a>
                                    </div>
                                </div>



                                <div class="account_types">

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
                                                    {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name"]) !!}
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

                                            <div class="form-group col-sm-6">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-1">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("bank_address[{$type}][0][state]", $states,  null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/phone.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][0][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/fax.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                {!! Form::text("bank_address[{$type}][0][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/email.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::email("bank_address[$type][0][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                    <div class="trusty_address">
                                        <div class="row expand-address trusty hidden" data-address="#address-trusty">
                                            <div class="col-md-6"><label for="">TRUSTY</label>  </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 addresses trusty hidden" id="address-trusty">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[trusty][0][name]", null, ["class"=>"form-control", "placeholder"=>"Trusty Name"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                {!! Form::hidden("bank_address[trusty][0][type]", 'trusty', ["class"=>"form-control trusty"]) !!}

                                                <div class="form-group col-sm-6">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                    {!! Form::text("bank_address[trusty][0][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                    {!! Form::text("bank_address[trusty][0][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                                </div>
                                                <div class="form-group col-sm-1">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                    {!! Form::select("bank_address[trusty][0][state]", $states,  null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                    {!! Form::text("bank_address[trusty][0][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/phone.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                        {!! Form::text("bank_address[trusty][0][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/fax.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                        {!! Form::text("bank_address[trusty][0][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/email.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                        {!! Form::email("bank_address[trusty][0][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content">
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
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/phone.png">
                        </div>
                        <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[{type}][{account_type_id}][phone_number]",null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/fax.png">
                        </div>
                        <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[{type}][{account_type_id}][fax_number]", null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/email.png">
                        </div>
                        <div class="form-group col-sm-10">
                            {!! Form::email("bank_address[$type][0][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>


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

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



