@extends('owner.layouts.app')
@section('title')
<title>Court</title>
@endsection
@section('body')

<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Court</li>
        <li class="breadcrumb-item active" aria-current="page">Create Court</li>
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
            Create Court
          </div>
          <p class="mg-b-20">Create court here ...</p>
          <div class="text-wrap">
            <div class="">
              <div class="panel panel-primary">
                <?php $states = [null=>''] + \App\BankAddress::STATES; $types = \App\Court::TYPES; asort($types) ?> {!! Form::open(['route' => ['admins.court.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data',
                'class' => 'm-form m-form label-align-right', 'id'=>'courtInformation']) !!} @csrf
                <div class="row">
                  <div class="col-sm-4 files">
                    <input class="bank_logo_class file-box form-control" type="file" name="logo" id="bank_logo" />
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="court[name]" class="form-control bank_name" placeholder="COURT NAME" />
                  </div>
                  <div class="col-md-4">
                    {!! Form::select("court[type]", $types, 1, ['class'=>'form-control bank-type']); !!}
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
  <div class="row row-sm">
    <div class="col-md-12">
      <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body">
          <div id="addresses_container">
            <div class="row expand-address" data-address="#address">
              <div class="col-md-6"><label for=""></label></div>
              <div class="col-md-6 text-right mb-3">
                <button type="button" class="btn btn-danger">
                  <i class="fa fa-minus-circle"></i>
                </button>
              </div>
            </div>
            <div class="col-md-12 addresses" id="address">
              {{--
              <div class="row">
                --}} {{--
                <div class="form-group col-sm-12">--}} {{-- {!! Form::text("court[address_name]", null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}--}} {{--</div>
                --}} {{--
              </div>
              --}}
              <div class="row">
                <div class="form-group col-sm-5">
                  {!! Form::text("court[street]", null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                </div>
                <div class="form-group col-sm-3">
                  {!! Form::text("court[city]", null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                </div>
                <div class="form-group col-sm-2">
                  {!! Form::select("court[state]", $states, null, ['class'=>'selectize-single state form-control','placeholder' => 'State']); !!}
                </div>
                <div class="form-group col-sm-2">
                  {!! Form::text("court[zip]", null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-4">
                  <div class="row">
                    <div class="col-sm-2">
                      <img class="responsive" src="{{url('/')}}/images/phone.png" />
                    </div>
                    <div class="col-sm-10">
                      {!! Form::text("court[phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <div class="row">
                    <div class="col-sm-2">
                      <img class="responsive" src="{{url('/')}}/images/fax.png" />
                    </div>
                    <div class="col-sm-10">
                      {!! Form::text("court[fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <div class="row">
                    <div class="col-sm-2">
                      <img class="responsive" src="{{url('/')}}/images/email.png" />
                    </div>
                    <div class="col-sm-10">
                      {!! Form::email("court[email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
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
<div class="container" id="account-judges-court">
  <div class="row row-sm">
    <div class="col-md-12">
      <div class="card mg-b-20" id="tabs-style2">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 text-left"><h4>Judges Info</h4></div>
            <div class="col-md-6 text-right mb-3">
              <button type="button" class="btn btn-danger remove-equal-bank">
                <span class="fa fa-times"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-sm-4">
              {!! Form::text("judge[0][full_name]", null, ["class"=>"form-control street", "placeholder"=>"FULL NAME"]) !!}
            </div>
            <div class="form-group col-sm-3">
              {!! Form::text("judge[0][email]", null, ["class"=>"form-control city","placeholder"=>"E-MAIL"]) !!}
            </div>
            <div class="form-group col-sm-2">
              {!! Form::text("judge[0][phone_number]", null, ["class"=>"form-control phone","placeholder"=>"PHONE #"]) !!}
            </div>
            <div class="form-group col-sm-2">
              {!! Form::text("judge[0][room_number]", null, ["class"=>"us-zip form-control", "placeholder"=>"ROOM #"]) !!}
            </div>
            <div class="form-group col-sm-1">
              <strong class="add_range" class="btn btn-primary" data-id="0" id="add_0"><i class="fa fa-plus text-success"></i></strong>
            </div>
          </div>
          <div id="add_judge_info"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" id="account-equal-bank">
  <div class="row row-sm">
    <div class="col-md-12">
      <div class="card mg-b-20" id="tabs-style2">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 text-left"><h4>Equal Names</h4></div>
            <div class="col-md-6 text-right mb-3">
              <button type="button" class="btn btn-danger remove-equal-bank">
                <sapn class="fa fa-times"></sapn>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          {!! Form::text('equal_courts', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row pull-right">
    <div class="col-md-12 text-right">
      <input type="submit" value="Save" class="ms-ua-submit btn btn-primary mb-5 pull-right" />
    </div>
  </div>
</div>
{!! Form::close() !!} @endsection @section('css')
<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css" />
<style>
  #bankInformation .selectize-input,
  .selectize-select {
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

  .responsive {
    width: 100%;
    height: auto;
  }
  .hidden {
    display: none !important;
  }
  .hide {
    display: none !important;
  }
</style>
@endsection @section('js')
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="{{ asset('js/site/admin/banks.js?v=2') }}"></script>

<script type="text/html" id="judge_info">
  <div class="row" id="judge_info_{id}">

      <div class="form-group col-sm-4">
          {!! Form::text("judge[{id}][full_name]",  null, ["class"=>"form-control street", "placeholder"=>"FULL NAME"]) !!}
      </div>
      <div class="form-group col-sm-3">
          {!! Form::text("judge[{id}][email]",   null, ["class"=>"form-control city","placeholder"=>"E-MAIL"]) !!}
      </div>
      <div class="form-group col-sm-2">
          {!! Form::text("judge[{id}][phone_number]",   null, ["class"=>"form-control phone","placeholder"=>"PHONE #"]) !!}
      </div>
      <div class="form-group col-sm-2">
          {!! Form::text("judge[{id}][room_number]",  null, ["class"=>"us-zip form-control", "placeholder"=>"ROOM #"]) !!}
      </div>

      <div class="col-md-1">
          <strong class="add_range" class="btn btn-primary" data-id="{id}" id="add_{id}" ><i class="fa fa-plus text-success"></i></strong>

          <strong class="remove_range" class="btn btn-primary" data-id="{id}" id="remove_{id}"><i class="fa fa-trash text-danger"></i></strong>
      </div>
  </div>
</script>

<script type="text/javascript">
  $(document).on("click", ".add_range", function () {
    var dataId = $(this).attr("data-id");
    var id = parseInt(dataId) + 1;
    $("#add_" + dataId).addClass("hidden");
    $("#remove_" + dataId).addClass("hidden");
    var judge_info = $("#judge_info").html();
    judge_info = judge_info.replace(/{id}/g, id);
    $("#add_judge_info").append(judge_info);
  });

  $(document).on("click", ".remove_range", function () {
    var dataId = $(this).attr("data-id");
    var id = parseInt(dataId) - 1;
    $("#add_" + id).removeClass("hidden");
    $("#remove_" + id).removeClass("hidden");
    $("#judge_info_" + dataId).remove();
  });
</script>

<script>
  $(document).ready(function () {
    $.validator.addMethod(
      "extension",
      function (value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
        return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
      },
      "Please enter a value with a valid extension."
    );
    $("#courtInformation").validate({
      rules: {
        logo: {
          extension: "jpg,jpeg,png",
        },
      },
      messages: {
        logo: {
          extension: "You're only allowed to upload jpg or png images.",
        },
      },
      errorPlacement: function (error, element) {
        error.insertAfter(element);
      },
    });
    $(".selectize-type").selectize({ plugins: ["remove_button"] });
  });
</script>

@endsection
