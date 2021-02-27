<?php
$states = [null=>''] + \App\BankAddress::STATES;
$types = [null=>''] + \App\BankLogo::TYPES;
asort($types)
?>

<section class="ms-user-account">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            {!! Form::open(['route' => ['admins.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'parentBankInformation']) !!}
            @csrf
            <div class="ms-ua-box">
                <div class="ms-ua-form">
                    <div class="ms-ua-title mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-sm-12 form-group files">
                                    <input class="bank_logo_class file-box" type="file" name="logo"  id="bank_logo" >

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
                                    @if($type == 'dispute_address' || $type == 'qwr_address' || $type == 'fraud_address')
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
                        <div class="col-md-6 text-left"><h4>OTHER NAMES USED</h4> </div>
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

