<?php
$states = [null=>''] + \App\BankAddress::STATES;
$types = [null=>''] + \App\BankLogo::TYPES;
asort($types)
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


                    <div class=" mortgage_lender_type ">
                        <div class="row" id="mortgage_lender_type_append">
                            <div class="col-md-6 hidden mortgage-lender-19">
                                CONVENTIONAL
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="CONVENTIONAL"  {{( !empty( $bank->additional_information["mortgage_lander_type"]) && in_array("CONVENTIONAL", $bank->additional_information["mortgage_lander_type"])) ? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                GOVERNMENT INSURED
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="GOVERNMENT INSURED"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("GOVERNMENT INSURED", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                JUMBO
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="JUMBO"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("JUMBO", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                ADJSUTABLE-RATE
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="ADJSUTABLE-RATE"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("ADJSUTABLE-RATE", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                FIXED-RATE
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="FIXED-RATE"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("FIXED-RATE", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                HELOC
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="HELOC"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("HELOC", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>
                            <div class="col-md-6 hidden mortgage-lender-29">
                                PRIVATE MONEY
                                <input name="additional_information[mortgage_lender_type][]"  type="checkbox" value ="PRIVATE MONEY"  {{(!empty( $bank->additional_information["mortgage_lander_type"]) && in_array("PRIVATE MONEY", $bank->additional_information["mortgage_lander_type"]))? "checked":''}} class="customcheck ex_name">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::select("bank[type]", $types,  1, ['class'=>'form-control bank-type']); !!}
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
    <div class="ms-ua-form pl-4 pr-4 ">
        <div id="addresses_container">
            @foreach(\App\BankAddress::TYPES as $type=>$name)
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
                                    {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
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
                        @if($type == 'dispute_address')
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::text("bank_address[{$type}][0][name]", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            {!! Form::hidden("bank_address[{$type}][0][type]", $type, ["class"=>"form-control"]) !!}

                            <div class="form-group col-sm-5">
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
