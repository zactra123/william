@extends('owner.layouts.app')

@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Furnishers > Create Furnisher </li>
            </ol>
          </nav>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-md-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Create Furnisher
            </div>
            <p class="mg-b-20">create furnisher here ...</p>
            <div class="text-wrap mb-5">
              <div class="example">
                <div class="panel panel-primary">
                  @include('furnishers.search2')
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
    <section class="ms-user-account">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-12 col-sm-12">
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
                              <div class="row p-3">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10 form-group files">
                                    <div class="col-md-12">
                                      <input class="form-control bank_logo_class file-box" type="file" name="logo"  id="bank_logo" tabindex="3" >
                                    </div>

                                    <div class="col-md-12 mt-3">
                                      <input type="checkbox" value="true" name="bank[no_logo]"> NO LOGO
                                    </div>
                                </div>
                              </div>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-10 pt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="bank[name]"  class="form-control bank_name" placeholder="COMPANY NAME" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::select("bank[type]", $types,  null, ['class'=>'form-control selectize-single bank-type']); !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                                <div  class="bank_sub_type_append">
                                                    <div class="row">
                                                      @foreach($subTypes[51] as $key => $type)
                                                          <div class="col-md-4 mt-2">
                                                            <div class="row">
                                                              <div class="col-md-1">
                                                                <input name="bank[additional_information][sub_type][]"  type="checkbox" value ="{{$type}}"  {{( !empty( $bank->additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
                                                              </div>
                                                              <div class="col-md-11">
                                                                <span class="">{{$type}}</span>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      @endforeach
                                                    </div>
                                                </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row parent hidden">
                                    <div class="col-md-3">
                                        <a  class="btn btn-primary show-parent-field form-control hide text-white">Add Parent</a>
                                        <a  class="btn btn-primary hide hide-parent-field form-control hide mt-3 text-white">Hide Parent</a>
                                    </div>
                                    <div class="col-md-9 parent-show">
                                        <div class="col-md-12 ">
                                            <div class="form-group banks ">
                                                {!! Form::text("bank[parent_name]", '', ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                                {!! Form::hidden("bank[parent_id]", '', ["class"=>"form-control parent_id"]) !!}
                                            </div>

                                        </div>
                                        <div class="row pull-right pr-3">
                                          <div class="col-md-12">
                                              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary form-control text-white">Add Bank</a>
                                          </div>
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
                                            <div class="col-sm-6 add-additional p-1 pb-5"><a class="btn btn ms-ua-submit text-white form-control">Add Addittonal Address</a></div>
                                        </div>
                                        @continue
                                    @endif
                                    <formset class="{{in_array($type, ['fraud_address', 'qwr_address']) ? 'hidden': ''}} {{$type}}">
                                        <div class="row expand-address" data-address="#address-{{$type}}">
                                            <div class="col-md-6"><label for="">{{$name}}</label>  </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-danger mb-3">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 addresses " id="address-{{$type}}">
                                            @if($type == 'registered_agent')
                                                <div class="row">
                                                    <div class="col-sm-6 paste-register p-1"><a class="btn btn ms-ua-submit form-control text-white">Copy Executive as Registered Agent</a></div>

                                                    <div class="form-group col-sm-12">
                                                        {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($type == 'executive_address')
                                                <div class="row">
                                                    <div class="col-md-12 executive_copied">
                                                        Copy Parent Executive Contact <input type="checkbox" value="true" name="bank_address[{{$type}}][copied]" >
                                                    </div>
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
                                                    {!! Form::select("bank_address[{$type}][state]", $states,  null, ['class'=>'form-control selectize-single state','placeholder' => 'State']); !!}
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                    {!! Form::text("bank_address[{$type}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <div class="row">
                                                      <div class="form-group col-sm-2">
                                                          <img  class="responsive" width="50%" src="{{ asset('/') }}/images/phone.png">
                                                      </div>
                                                      <div class="form-group col-sm-10">
                                                          {!! Form::text("bank_address[{$type}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="row">
                                                      <div class="form-group col-sm-2">
                                                          <img  class="responsive" width="50%" src="{{ asset('/') }}/images/fax.png">
                                                      </div>
                                                      <div class="form-group col-sm-10">
                                                      {!! Form::text("bank_address[{$type}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="row">
                                                      <div class="form-group col-sm-2">
                                                          <img  class="responsive" width="50%" src="{{ asset('/') }}/images/email.png">
                                                      </div>
                                                      <div class="form-group col-sm-10">
                                                          {!! Form::email("bank_address[$type][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                      </div>
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
                                    <div class="col-md-6 text-left"><h4>Other Names Used</h4> </div>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="remove-equal-bank btn btn-danger mb-3">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-ua-form pl-4 pr-4 ">
                                {!! Form::text('equal_banks', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                                <div class="row"></div>
                            </div>
                        </div>

                        <div class="row pull-right">
                          <div class="col-md-12 mt-3">
                              <input type="submit" value="Save" class="ms-ua-submit btn btn-primary text-white">
                          </div>
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


@endsection
