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

</style>
@section('content')
    @include('helpers.breadcrumbs', ['title'=> "CREARE BANK", 'route' => ["Home"=> '/owner',"Bank" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <?php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types = [null=>''] + \App\BankLogo::TYPES;
                    ?>
                    {!! Form::open(['route' => ['owner.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf
                    <div class="ms-ua-box">
                        <div class="ms-ua-form">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-sm-3 form-group files">
                                        <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="name"  class="form-control" placeholder="BANK NAME" id="bank_name">
                                        </div>
                                    </div>
                                </div>

                                <div id="account_types">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ms-ua-box mt-2" id="account">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-md-6 text-left"><h4>Addresses</h4> </div>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="remove-account-type">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-ua-form pl-4 pr-4 ">

                                <div id="addresses_container">
                                @foreach(['executive_address'=>'EXECUTIVE ADDRESS', 'registered_agent'=>'REGISTERED AGENT'] as $type=>$name)

                                    <div class="row expand-address" data-address="#address-{{$type}}">
                                        <div class="col-md-6"><label for="">{{$name}}</label>  </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses " id="address-{{$type}}">
                                        @if($type == 'registered_agent')
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"form-control", "placeholder"=>"Agent Name"]) !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            {!! Form::hidden("bank_address[{$type}][0][type]", $type, ["class"=>"form-control"]) !!}

                                            <div class="form-group col-sm-4">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][street]",  null, ["class"=>"form-control", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][city]",   null, ["class"=>"form-control","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("bank_address[{$type}][0][state]", $states,  null, ['class'=>'selectize-single','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][0][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {!! Form::text("bank_address[{$type}][0][phone_number]",null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {!! Form::text("bank_address[{$type}][0][fax_number]", null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="row"></div>
                        </div>
                        <div class="ms-ua-box mt-2" id="account">
                            <div class="ms-ua-title mb-0">
                                <div class="row">
                                    <div class="col-md-6 text-left"><h4>Equal Names</h4> </div>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="remove-account-type">
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
                        <i class="fa fa-plus-circle"></i>
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


    <script>

    </script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



