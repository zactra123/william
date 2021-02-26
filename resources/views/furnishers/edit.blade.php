@extends('layouts.layout')

@section('content')
    <style>

        #bankInformation .selectize-input, .selectize-select {
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
            color: #fff;
            padding: 5px;
            -webkit-transition: .2s;
            transition: .2s;
        }

        .responsive {
            width: 100%;
            height: auto;
        }

    </style>
    @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/admins',"{$bank->name}" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="row m-2  pt-4">
                    <div class="col-md-2 pull-left">
                        <form method="POST" action="{{route('admins.bank.delete', $bank->id)}}">
                            @csrf
                            @method("DELETE")

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-furnisher" value="Delete">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">ADD
                            FURNISHER</a>
                    </div>
                    @include('furnishers.search')

                </div>
                @php
                    $states = [null=>''] + \App\BankAddress::STATES;
                    $types =  \App\BankLogo::TYPES;
                    $subTypes =  \App\BankLogo::SUB_TYPES;
                    asort($types)
                @endphp
                {!! Form::open(['route' => ['admins.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation','enctype'=>'multipart/form-data' ]) !!}
                @method('PUT')
                @csrf
                <div class="ms-ua-box">
                    <div class="ms-ua-form">

                        <div class="ms-ua-title mb-0">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-sm-12 form-group changeLogo files">
                                        @if($bank->checkUrlAttribute())
                                            <img src="{{$bank->getUrlAttribute()}}" width="100px">
                                        @else
                                            @if($bank->no_logo)
                                                <img width="100px" src="{{asset('images/no_bank_logos.png')}}"
                                                     alt="Card image cap">
                                            @else
                                                <img width="100px" src="{{asset('images/default_bank_logos.png')}}"
                                                     alt="Card image cap">

                                            @endif
                                        @endif

                                    </div>
                                    <div class="col-sm-12 hide form-group updateLogo files">
                                        <input class="bank_logo_class bank_logo file-box" type="file" name="logo">
                                    </div>
                                    @if(!$bank->checkUrlAttribute())
                                        <div class="col-md-12">
                                            NO LOGO <input type="checkbox" value="true"
                                                           name="bank[no_logo]" {{$bank->no_logo == true ? "checked":''}} >
                                        </div>
                                    @endif


                                </div>
                                <div class="col-md-9">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}"
                                                   class="form-control bank_name">
                                            {!! Form::hidden("bank[id]", $bank->id, ["class"=>"form-control bank_id"]) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", $types,  $bank->type, ['class'=>'selectize-single bank-type']); !!}
                                        </div>
                                    </div>
                                    <div class="m-5">
                                        <div class="row">
                                            <div class="bank_sub_type_append">
                                                @if(isset($subTypes[$bank->type]))
                                                    @foreach($subTypes[$bank->type] as $key => $type)
                                                        <div class="col-md-6">
                                                            {{$type}}
                                                            <input name="bank[additional_information][sub_type][]"
                                                                   type="checkbox"
                                                                   value="{{$type}}" {{( !empty( $bank->additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="row parent {{in_array($bank->type, [14,17, 18, 19,20, 21, 23, 24, 26, 27, 28, 29, 31,32, 43, 33, 30]) ||(!empty( $bank->additional_information["sub_type"]) && in_array("BANK-SBA LENDER", $bank->additional_information["sub_type"]))? "": 'hidden'}}">
                                <div class="col-md-3">
                                    <a class="btn show-parent-field form-control {{$bank->type == 29?"":"hide"}}">ADD
                                        PARENT</a>
                                    <a class="btn hide hide-parent-field form-control {{$bank->type == 29?"":"hide"}}">HIDE
                                        PARENT</a>
                                </div>
                                <div class="col-md-9 parent-show {{$bank->type == 29?"hide":""}}">
                                    <div class="col-md-9">
                                        <div class="form-group banks ">
                                            {!! Form::text("bank[parent_name]", $bank->parent ? $bank->parent->name : null, ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                            {!! Form::hidden("bank[parent_id]", $bank->parent_id, ["class"=>"form-control parent_id"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn show-parent-bank form-control">SHOW BANK INFO</a>
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
                                @php
                                    $address = !empty($bank_addresses[$type]) ? $bank_addresses[$type] : null;
                                    $hidden = false;
                                    if ($type == 'fraud_address') {
                                        $hidden = $bank->type != 3;
                                    }
                                    if ($type == 'qwr_address'){
                                        $hidden = !in_array($bank->type, [2, 55]) || (empty($bank->additional_information['sub_type']) || !in_array('MORTGAGE', $bank->additional_information['sub_type']));
                                    }
                                @endphp
                                @if($type == 'additional_address')
                                   <?php if (!empty($bank_addresses[$type])) { ?>
                                        @foreach($bank_addresses[$type] as $addresses)
                                            @include('furnishers._address', ['type'=>$type,'states' => $states, 'address'=>$addresses ])
                                        @endforeach
                                    <?php } ?>

                                   <div class="row additional-addresses">
                                       <div class="col-sm-6 add-additional p-1 pb-5"><a class="btn btn ms-ua-submit  form-control">ADD ADDITIONAL ADDRESS</a></div>
                                   </div>
                                    @continue
                                @endif
                                <formset class="{{$hidden? 'hidden': ''}} {{$type}}">
                                    <div class="row expand-address" data-address="#address-{{$type}}">
                                        <div class="col-md-6"><label for="">{{$name}}</label></div>
                                        <div class="col-md-6 text-right">
                                            <button type="button">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses " id="address-{{$type}}">
                                        @if($type == 'registered_agent')
                                            <div class="row">
                                                <div class="col-sm-6 paste-register p-1"><a
                                                        class="btn btn ms-ua-submit  form-control">COPY EXECUTIVE AS
                                                        REGISTERED AGENT</a></div>

                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
                                                </div>
                                            </div>
                                        @endif
                                        @if($type == 'executive_address')
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                                </div>
                                            </div>
                                        @endif
                                        @if($type == 'dispute_address' || $type == 'qwr_address' ||  $type == 'fraud_address')
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    {!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            {!! Form::hidden("bank_address[$type][type]", $type, ["class"=>"form-control"]) !!}
                                            {!! Form::hidden("bank_address[$type][id]", !empty($address) ? $address['id'] : null, ["class"=>"form-control"]) !!}

                                            <div class="form-group col-sm-5">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][street]",  !empty($address) ? $address['street'] : null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][city]",   !empty($address) ? $address['city'] : null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("bank_address[{$type}][state]", $states,  !empty($address) ? $address['state'] : null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][zip]",  !empty($address) ? $address['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img class="responsive" src="/images/phone.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][phone_number]",!empty($address) ? $address['phone_number'] : null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img class="responsive" src="/images/fax.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][fax_number]", !empty($address) ? $address['fax_number'] : null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img class="responsive" src="/images/email.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::email("bank_address[$type][email]", !empty($address) ? $address['email'] : null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </formset>
                            @endforeach

                        </div>
                        <div class="row"></div>
                    </div>
                </div>

                <div class="ms-ua-box mt-2" id="account-equal-bank">
                    <div class="ms-ua-title mb-0">
                        <div class="row">
                            <div class="col-md-6 text-left"><h4>NAMES ON CRAs</h4></div>
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
                {!! Form::hidden('referrer', request()->headers->get('referer')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>

    <div class="modal fade in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog w-100" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">CREATE FURINSHER</h3>
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

        <div class="modal fade" id="parentModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog w-100" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h3 class="modal-title" id="parentModalLabel">PARENT BANK INFORMATION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ms-user-account">

                    </div>
                </div>
            </div>
        </div>


        <script>
            var types = {!!  json_encode(\App\BankLogo::SUB_TYPES) !!};

        </script>


        <script type="text/html" id="sub_types_append">

            <div class="col-md-6 remove_sub_type">
                {value}
                <input name="bank[additional_information][sub_type][]" type="checkbox" value="{value}">
            </div>

        </script>


        <script type="text/html" id="addtional_address_template">
            <formset class="additional_address">
                <div class="row remove-address">
                    <div class="col-md-6"><label for="">ADDITIONAL ADDRESS</label></div>
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
                            {!! Form::select("bank_address[additional_address][{i}][state]", $states,  null, ['class'=>'{class} state','placeholder' => 'State']); !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                            {!! Form::text("bank_address[additional_address][{i}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="form-group col-sm-2 p-0">
                                <img class="responsive" src="/images/phone.png">
                            </div>
                            <div class="form-group col-sm-10">
                                {!! Form::text("bank_address[additional_address][{i}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="form-group col-sm-2 p-0">
                                <img class="responsive" src="/images/fax.png">
                            </div>
                            <div class="form-group col-sm-10">
                                {!! Form::text("bank_address[additional_address][{i}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="form-group col-sm-2 p-0">
                                <img class="responsive" src="/images/email.png">
                            </div>
                            <div class="form-group col-sm-10">
                                {!! Form::email("bank_address[additional_address][{i}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </formset>
        </script>

        <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
        <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
        <script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="{{ asset('js/site/admin/banks.js?v=2') }}"></script>
        <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
        <script>
            $(document).ready(function ($) {

                $.validator.addMethod("extension", function (value, element, param) {
                    param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
                    return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
                }, "Please enter a value with a valid extension.");

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
                    errorPlacement: function (error, element) {
                        error.insertAfter(element);
                    }
                })
                $(".selectize-type").selectize({plugins: ['remove_button']})

            })
        </script>

        <script>
            $('.delete-furnisher').click(function (e) {
                e.preventDefault() // Don't post the form, unless confirmed

                bootbox.confirm({
                    title: "Destroy  this FURNISHER/CRAs?",
                    message: "Do you really want to delete this record?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel',
                            className: 'btn-success'

                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Confirm',
                            className: 'btn-danger'

                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $(e.target).closest('form').submit() // Post the surrounding form
                        }
                    }
                });
            });
        </script>


@endsection



