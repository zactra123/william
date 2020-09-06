@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/owner',"{$bank->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <?php $states = [null=>''] + \App\BankAddress::STATES;?>
                        {!! Form::open(['route' => ['owner.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                        @method('PUT')
                        @csrf
                        <div class="ms-ua-box">
                            <div class="col-md-12">
                                <div class="row m-2">
                                    <div class="col-md-4">
                                        <img src="{{asset($bank->path)}}" width="100px">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::select('account_types[]', $account_types, array_keys($bank_accounts), ['multiple'=>'multiple','class'=>'selectize', 'id' => 'select-account']); !!}
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
                                        <div class="row">
                                            {!! Form::hidden("bank_address[{$k}][{$type}][type]", $type, ["class"=>"form-control"]) !!}
                                            @if(!empty($address_ids[$type]))
                                             {!! Form::hidden("bank_address[{$k}][{$type}][id]", $address_ids[$type]['id'], ["class"=>"form-control"]) !!}
                                            @endif
                                            <div class="form-group col-sm-4">
                                                {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][street]", !empty($address_ids[$type]) ? $address_ids[$type]['street'] : null, ["class"=>"form-control"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][city]",  !empty($address_ids[$type]) ? $address_ids[$type]['city'] : null, ["class"=>"form-control"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}
                                                {!! Form::select("bank_address[{$k}][{$type}][state]", $states,  !empty($address_ids[$type]) ? $address_ids[$type]['state'] : null, ['class'=>'selectize-single']); !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}
                                                {!! Form::text("bank_address[{$k}][{$type}][zip]", !empty($address_ids[$type]) ?  $address_ids[$type]['zip'] : null, ["class"=>"us-zip form-control"]) !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label("bank_address[{$k}][{$type}][fax_number]", 'Fax Number'); !!}
                                            {!! Form::text("bank_address[{$k}][{$type}][fax_number]", !empty($address_ids[$type]) ? $address_ids[$type]['fax_number'] : null, ["class"=>"us-phone form-control"]) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            {!! Form::label("bank_address[{$k}][{$type}][phone_number]", 'Phone Number'); !!}
                                            {!! Form::text("bank_address[{$k}][{$type}][phone_number]", !empty($address_ids[$type]) ? $address_ids[$type]['phone_number'] : null, ["class"=>"us-phone form-control"]) !!}
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
    <script src="{{ asset('js/site/admins/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



