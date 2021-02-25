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
    @include('helpers.breadcrumbs', ['title'=> "ADD BANK", 'route' => ["Home"=> '/admins/furnishers',"Bank" => "#"]])
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
                    @php
                        $states = [null=>''] + \App\BankAddress::STATES;
                        $types =  \App\BankLogo::TYPES;
                        $subTypes =  \App\BankLogo::SUB_TYPES;
                        asort($types)
                    @endphp
                    {!! Form::open(['route' => ['admins.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="col-sm-12 form-group files">
                                            <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" tabindex="3" >


                                        </div>

                                        <div class="col-md-12">
                                            NO LOGO <input type="checkbox" value="true" name="bank[no_logo]"   >
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="bank[name]"  class="form-control bank_name" placeholder="BANK NAME" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::select("bank[type]", $types,  51, ['class'=>'selectize-single bank-type']); !!}
                                            </div>
                                        </div>
                                        <div class="m-5">
                                            <div class="row">
                                                <div  class="bank_sub_type_append">
                                                    @foreach($subTypes[51] as $key => $type)
                                                        <div class="col-md-6">
                                                            {{$type}}
                                                            <input name="bank[additional_information][sub_type][]"  type="checkbox" value ="{{$type}}"  {{( !empty( $bank->additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row parent hidden">
                                    <div class="col-md-3">
                                        <a  class="btn show-parent-field form-control hide">ADD PARENT</a>
                                        <a  class="btn hide hide-parent-field form-control hide">HIDE PARENT</a>
                                    </div>
                                    <div class="col-md-9 parent-show">
                                        <div class="col-md-9 ">
                                            <div class="form-group banks ">
                                                {!! Form::text("bank[parent_name]", '', ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                                {!! Form::hidden("bank[parent_id]", '', ["class"=>"form-control parent_id"]) !!}
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn form-control">ADD BANK</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ms-ua-box mt-2" id="account">
                            <div class="ms-ua-form pl-4 pr-4 ">
                                <div id="addresses_container">
                                @foreach(\App\BankAddress::TYPES as $type=>$name)
                                    @if($type == 'additional_address')
                                        <div class="row additional-addresses">
                                            <div class="col-sm-6 add-additional p-1 pb-5"><a class="btn btn ms-ua-submit  form-control">ADD ADDITIONAL ADDRESS</a></div>
                                        </div>
                                        @continue
                                    @endif
                                    <formset class="{{in_array($type, ['fraud_address', 'qwr_address']) ? 'hidden': ''}} {{$type}}">
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
                                                    <div class="col-sm-6 paste-register p-1"><a class="btn btn ms-ua-submit  form-control">COPY EXECUTIVE AS REGISTERED AGENT</a></div>

                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($type == 'executive_address')
                                                <div class="row">

                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if(in_array($type, ['dispute_address', 'qwr_address', 'fraud_address']))
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                {!! Form::hidden("bank_address[{$type}][type]", $type, ["class"=>"form-control"]) !!}

                                                <div class="form-group col-sm-5">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                    {!! Form::text("bank_address[{$type}][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                    {!! Form::text("bank_address[{$type}][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                    {!! Form::select("bank_address[{$type}][state]", $states,  null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                    {!! Form::text("bank_address[{$type}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/phone.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                        {!! Form::text("bank_address[{$type}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/fax.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group col-sm-2 p-0">
                                                        <img  class="responsive" src="/images/email.png">
                                                    </div>
                                                    <div class="form-group col-sm-10">
                                                        {!! Form::email("bank_address[$type][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </formset>
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


    <script>
        var types = {!!  json_encode($subTypes) !!};

    </script>


    <script type="text/html" id="sub_types_append">

        <div class="col-md-6 remove_sub_type">
            {value}
            <input name="bank[additional_information][sub_type][]"  type="checkbox" value ="{value}">
        </div>

    </script>

    <script type="text/html" id="addtional_address_template">
        <formset class="additional_address">
            <div class="row remove-address">
                <div class="col-md-6"><label for="">ADDITIONAL ADDRESS</label>  </div>
                <div class="col-md-6 text-right">
                    <button type="button">
                        <i class="fa fa-remove"></i>
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
                        {!! Form::text("bank_address[additional_address][{i}][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::text("bank_address[additional_address][{i}][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                        {!! Form::select("bank_address[additional_address][{i}][state]", $states,  null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                        {!! Form::text("bank_address[additional_address][{i}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/phone.png">
                        </div>
                        <div class="form-group col-sm-10">
                            {!! Form::text("bank_address[additional_address][{i}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/fax.png">
                        </div>
                        <div class="form-group col-sm-10">
                            {!! Form::text("bank_address[additional_address][{i}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group col-sm-2 p-0">
                            <img  class="responsive" src="/images/email.png">
                        </div>
                        <div class="form-group col-sm-10">
                            {!! Form::email("bank_address[additional_address][{i}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                        </div>
                    </div>

                </div>
            </div>
        </formset>
    </script>

    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
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



