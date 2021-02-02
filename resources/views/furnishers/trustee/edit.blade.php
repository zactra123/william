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
    @include('helpers.breadcrumbs', ['title'=> "ADD TRUSTEE", 'route' => ["Home"=> '/admins/trustee',"TRUSTEE" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <?php $states = [null=>''] + \App\BankAddress::STATES; ?>
                    {!! Form::open(['route' => ['admins.trustee.update', $trustee->id], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
                    @csrf

                    <div class="ms-ua-box mt-2" id="account">

                        <div class="ms-ua-form pl-4 pr-4 ">
                            <div id="addresses_container">
                                <div class="trustee_address">
                                    <div class="col-md-12 addresses trustee" id="address-trustee">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                {!! Form::text("trustee[name]", !empty($trustee) ? $trustee->name:'', ["class"=>"form-control autocomplete-trust w-100", "placeholder"=>"Trustee Name", "data-type"=> 'trustee']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            {!! Form::hidden("trustee[type]", 'trustee', ["class"=>"form-control"]) !!}

                                            <div class="form-group col-sm-6">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("trustee[street]",  !empty($trustee) ? $trustee->street:'', ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="form-group col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("trustee[city]",   !empty($trustee) ? $trustee->city:'', ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="form-group col-sm-1">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("trustee[state]", $states,  !empty($trustee) ? $trustee->state:'', ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("trustee[zip]",  !empty($trustee) ? $trustee->zip:'', ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/phone.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("trustee[phone_number]",!empty($trustee) ? $trustee->phone_number:'', ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/fax.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("trustee[fax_number]", !empty($trustee) ? $trustee->fax_number:'', ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="form-group col-sm-2 p-0">
                                                    <img  class="responsive" src="/images/email.png">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::email("trustee[email]", !empty($trustee) ? $trustee->email:'', ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                    </div>

                    <div class="col mt-5">
                        <input type="submit" value="Save" class="ms-ua-submit">
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </section>







    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
@endsection



