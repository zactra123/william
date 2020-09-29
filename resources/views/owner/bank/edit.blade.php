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
    @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/owner',"{$bank->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-12 col-sm-12">
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
                                        <img src="{{asset($bank->path)}}" width="100px">
                                    </div>
                                    <div class="col-sm-3 hide form-group updateLogo files">
                                        <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::select("bank[type]", $types,  $bank->type, ['class'=>'selectize-single']); !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::select('account_types[]', $account_types, array_keys($bank_accounts), ['multiple'=>'multiple','class'=>'selectize', 'id' => 'select-account']); !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                @foreach($account_types as $k=>$account_type)
                    @if(!empty($bank_accounts[$k]))
                        {!! Form::hidden("bank_accounts[{$k}]", $bank_accounts[$k], ["class"=>"form-control"]) !!}
                    @endif

                    <div class="ms-ua-box mt-2 {{empty($bank_accounts[$k])?"hidden" : ""}}" id="account-{{$k}}">
                        <div class="ms-ua-title mb-0">
                            <div class="row">
                                <div class="col-md-6 text-left"><h4> {{$account_type}} </h4> </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="remove-account-type" data-account="#account-{{$k}}" data-value="{{$k}}">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="ms-ua-form pl-4 pr-4 ">
                        <?php $address_ids = !empty($bank_addresses[$k]) ? array_reduce($bank_addresses[$k], function ($result, $item) {$result[$item['type']] = $item; return  $result;}, []) : [] ?>
                        @foreach(\App\BankAddress::TYPES as $type=>$name)
                                <div class="row expand-address" data-address="#address-{{$type}}-{{$k}}">
                                    <div class="col-md-6"><label for="">{{$name}}</label>  </div>
                                    <div class="col-md-6 text-right">
                                        <button type="button">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 addresses hidden" id="address-{{$type}}-{{$k}}">
                                    @if($type == 'registered_agent')
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                {!! Form::text("bank_address[{$k}][{$type}][name]", !empty($address_ids[$type]) ? $address_ids[$type]['name'] : null, ["class"=>"form-control", "placeholder"=>"Agent Name"]) !!}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        {!! Form::hidden("bank_address[{$k}][{$type}][type]", $type, ["class"=>"form-control"]) !!}
                                        @if(!empty($address_ids[$type]))
                                         {!! Form::hidden("bank_address[{$k}][{$type}][id]", $address_ids[$type]['id'], ["class"=>"form-control"]) !!}
                                        @endif
                                        <div class="form-group col-sm-4">
{{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                            {!! Form::text("bank_address[{$k}][{$type}][street]", !empty($address_ids[$type]) ? $address_ids[$type]['street'] : null, ["class"=>"form-control", "placeholder"=>"Street"]) !!}
                                        </div>
                                        <div class="form-group col-sm-3">
{{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                            {!! Form::text("bank_address[{$k}][{$type}][city]",  !empty($address_ids[$type]) ? $address_ids[$type]['city'] : null, ["class"=>"form-control","placeholder"=>"City"]) !!}
                                        </div>
                                        <div class="form-group col-sm-2">
{{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                            {!! Form::select("bank_address[{$k}][{$type}][state]", $states,  !empty($address_ids[$type]) ? $address_ids[$type]['state'] : null, ['class'=>'selectize-single','placeholder' => 'State']); !!}
                                        </div>
                                        <div class="form-group col-sm-3">
{{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                            {!! Form::text("bank_address[{$k}][{$type}][zip]", !empty($address_ids[$type]) ?  $address_ids[$type]['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6">
    {{--                                        {!! Form::label("bank_address[{$k}][{$type}][phone_number]", 'Phone Number'); !!}--}}
                                            {!! Form::text("bank_address[{$k}][{$type}][phone_number]", !empty($address_ids[$type]) ? $address_ids[$type]['phone_number'] : null, ["class"=>"us-phone form-control", "placeholder"=>"Phone number"]) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
    {{--                                        {!! Form::label("bank_address[{$k}][{$type}][fax_number]", 'Fax Number'); !!}--}}
                                            {!! Form::text("bank_address[{$k}][{$type}][fax_number]", !empty($address_ids[$type]) ? $address_ids[$type]['fax_number'] : null, ["class"=>"us-phone form-control", "placeholder"=>"Fax number"]) !!}
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            <div class="row"></div>
                        </div>
                    </div>
                @endforeach
                <div class="col">
                    <input type="submit" value="Save" class="ms-ua-submit">

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>


        <script>
            $(document).ready(function(){

                $("#bank_logo").val(null)
                $(".changeLogo").click(function (e) {
                    e.preventDefault();
                    $(".changeLogo").addClass("hide")
                    $(".updateLogo").removeClass("hide")

                });

            })



        </script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



