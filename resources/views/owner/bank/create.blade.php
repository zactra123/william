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
                                            <input type="text" name="name"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::select("bank[type]", $types,  null, ['class'=>'selectize-single']); !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::select('account_types[]', $account_types, [], ['multiple'=>'multiple','class'=>'selectize ms-ua-form', 'id' => 'select-account']); !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @foreach($account_types as $k=>$account_type)
                        <div class="ms-ua-box mt-2 hidden" id="account-{{$k}}">
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
                                        <div class="row">
                                            {!! Form::hidden("bank_address[{$k}][{$type}][type]", $type, ["class"=>"form-control"]) !!}
                                            @if(!empty($address_ids[$type]))
                                                {!! Form::hidden("bank_address[{$k}][{$type}][id]", $address_ids[$type]['id'], ["class"=>"form-control"]) !!}
                                            @endif
                                            <div class="form-group col-sm-4">
                                                {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][street]", null, ["class"=>"form-control"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][city]", null, ["class"=>"form-control"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}
                                                {!! Form::select("bank_address[{$k}][{$type}][state]", $states,  null, ['class'=>'selectize-single']); !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][zip]", null, ["class"=>"us-zip form-control"]) !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {!! Form::label("bank_address[{$k}][{$type}][fax_number]", 'Fax Number'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][fax_number]", null, ["class"=>"us-phone form-control"]) !!}
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {!! Form::label("bank_address[{$k}][{$type}][phone_number]", 'Phone Number'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][phone_number]", null, ["class"=>"us-phone form-control"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="col">
                        <input type="submit" value="Save" class="ms-ua-submit">

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



