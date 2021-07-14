@extends('owner.layouts.app')
@section('title')
<title> Authority </title>
@endsection
@section('body')

    {{-- @include('helpers.breadcrumbs', ['title'=> "ADD AUTHORITY", 'route' => ["Home"=> '/admins/furnishers',"AUTHORITIES" => "#"]]) --}}
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Authority</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Authority</li>
              </ol>
            </nav>
      </div>
    </div>
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">

                    <?php
                    $states =  \App\Authority::STATES;
                    ?>
                    {!! Form::open(['route' => ['admins.authority.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'authorityInformation']) !!}
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-ua-title">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 files">
                                        <input class="bank_logo_class form-control file-box" type="file" name="logo"  id="bank_logo" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="authority[name]" class="form-control bank_name" placeholder="Authority Name" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="">
                                            {!! Form::select("authority[furnisher_types][types][]", [""=>"Assign Furnisher Type"] + \App\BankLogo::TYPES, null, ['multiple'=>'multiple', 'class'=>'selectize-type', 'id' => "bank-type"]); !!}
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card mt-2" id="account">

                            <div class="card-body">

                                <div id="addresses_container">

                                    <div class="row expand-address" data-address="#address-">
                                        <div class="col-md-6"><label for="">Executive Address</label>  </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button" class="btn btn-danger mb-5">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses " id="address">

                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                {!! Form::text("authority[ex_name]", null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-sm-5">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}}
                                                {!! Form::text("authority[street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}}
                                                {!! Form::text("authority[city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                            </div>
                                            <div class="col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                                                {!! Form::select("authority[state]", $states,  null, ['class'=>'selectize-single state form-control','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("authority[zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                  <div class="col-sm-2">
                                                      <img  class="responsive" src="{{asset('/')}}/images/phone.png">
                                                  </div>
                                                  <div class="col-sm-10">
                                                      {!! Form::text("authority[phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                  <div class="col-sm-2">
                                                      <img  class="responsive" src="{{asset('/')}}/images/fax.png">
                                                  </div>
                                                  <div class="col-sm-10">
                                                  {!! Form::text("authority[fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                  <div class="col-sm-2">
                                                      <img  class="responsive" src="{{asset('/')}}/images/email.png">
                                                  </div>
                                                  <div class="col-sm-10">
                                                      {!! Form::email("authority[email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                  </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div>

            </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-right" >
              <input type="submit" value="Save" class="ms-ua-submit btn btn-primary pull-right">
            </div>
          </div>
        </div>


        {!! Form::close() !!}
    </section>


@endsection
@section('css')
  <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
  {{-- <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css"> --}}
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


      .expand-address {
          cursor: pointer;
      }

      .responsive{
          width: 100%;
          height: auto;
      }
  </style>
@endsection
@section('js')

  <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
  <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
  <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
  <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
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

@endsection
