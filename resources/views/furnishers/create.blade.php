@extends('owner.layouts.app')
@section('title')
  <title>Furnisher</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Furnishers</li>
                <li class="breadcrumb-item active" aria-current="page">Create Furnisher</li>
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
                    <p class="mg-b-20">Create furnisher here ...</p>
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
                  $states = [null=>''] + \App\BankAddress::STATES; $types = \App\BankLogo::TYPES; $subTypes = \App\BankLogo::SUB_TYPES; asort($types)
                @endphp
                 {!! Form::open(['route' => ['admins.bank.store'], 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!} @csrf
                <div class="ms-ua-box">
                    <div class="ms-ua-form">
                        <div class="ms-ua-title mb-0">
                            <div class="row p-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 form-group files">
                                    <div class="col-md-12">
                                        <input class="form-control bank_logo_class file-box" type="file" name="logo" id="bank_logo" tabindex="3" />
                                    </div>

                                    <div class="col-md-12 mt-3"><input type="checkbox" value="true" name="bank[no_logo]" /> <span class="ml-2">NO LOGO</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 pt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" class="form-control bank_name" placeholder="COMPANY NAME" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", $types, null, ['class'=>'form-control selectize-single bank-type']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                          <div class="row bank_sub_type_append">
                                                  @foreach($subTypes[51] as $key => $type)
                                                  <div class="col-md-4 mt-2">
                                                    <div class="col-md-2 float-left">
                                                        <input name="bank[additional_information][sub_type][]" type="checkbox" value="{{$type}}" {{( !empty( $bank->additional_information["sub_type"]) && in_array($type,$bank->additional_information["sub_type"])) ? "checked":''}}>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <span class="">{{$type}}</span>
                                                    </div>
                                                  </div>
                                                  @endforeach
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row parent hidden">
                                <div class="col-md-3 ml-4 pl-5">
                                    <a class="btn btn-primary show-parent-field ml-5 mt-3 hide text-white pull-right">Add Parent</a>
                                    <a class="btn btn-primary hide hide-parent-field hide ml-5 mt-3 text-white pull-right">Hide Parent</a>
                                </div>
                                <div class="col-md-8 mt-3 parent-show">
                                    <div class="col-md-12">
                                        <div class="form-group banks">
                                            {!! Form::text("bank[parent_name]", '', ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!} {!! Form::hidden("bank[parent_id]", '', ["class"=>"form-control
                                            parent_id"]) !!}
                                        </div>
                                    </div>
                                    <div class="row text-right">
                                        <div class="col-md-12">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white mr-3">Add Bank</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ms-ua-box mt-2" id="account">
                    <div class="ms-ua-form pl-4 pr-4">
                        <div id="addresses_container">
                            @foreach(\App\BankAddress::TYPES as $type=>$name)
                              @if($type == 'additional_address')
                            <div class="row additional-addresses">
                                <div class="col-sm-6 add-additional p-1 pb-5" ><a class="btn btn-primary ms-ua-submit text-white">Add Addittonal Address</a></div>
                            </div>
                            @continue

                          @endif

                            <formset class="{{in_array($type, ['fraud_address', 'qwr_address']) ? 'hidden': ''}} {{$type}}">
                                <div class="row expand-address" data-address="#address-{{$type}}">
                                    <div class="col-md-6"><label for="">{{$name}}</label></div>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="btn btn-danger mb-3">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 addresses" id="address-{{$type}}">
                                    @if($type == 'registered_agent')
                                    <div class="row">
                                        <div class="col-sm-6 paste-register p-1"><a class="btn btn ms-ua-submit form-control text-white">Copy Entity Address as Registered Agent fix functionality</a></div>

                                        <div class="form-group col-sm-12">
                                            {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
                                        </div>
                                    </div>
                                    @endif
                                    @if($type == 'executive_address')
                                    <div class="row">
                                        <div class="col-md-12 executive_copied btn btn-primary">Copy Parent Executive Contact <input type="checkbox" value="true" name="bank_address[{{$type}}][copied]" /></div>
                                        <div class="form-group col-sm-12">
                                            {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"form-control", "placeholder"=>"Executive Name"]) !!}
                                        </div>
                                    </div>
                                    @endif @if(in_array($type, ['dispute_address', 'qwr_address', 'fraud_address']))
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::text("bank_address[{$type}][name]", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        {!! Form::hidden("bank_address[{$type}][type]", $type, ["class"=>"form-control"]) !!}

                                        <div class="form-group col-sm-5">
                                            {{-- {!! Form::label("bank_address[{$k}][{$type}][street]", 'Street'); !!}--}} {!! Form::text("bank_address[{$type}][street]", null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                                        </div>
                                        <div class="form-group col-sm-3">
                                            {{-- {!! Form::label("bank_address[{$k}][{$type}][city]", 'City'); !!}--}} {!! Form::text("bank_address[{$type}][city]", null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                                        </div>
                                        <div class="form-group col-sm-2">
                                            {{-- {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}} {!! Form::select("bank_address[{$type}][state]", $states, null, ['class'=>'form-control selectize-single
                                            state','placeholder' => 'State']); !!}
                                        </div>
                                        <div class="form-group col-sm-2">
                                            {{-- {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}} {!! Form::text("bank_address[{$type}][zip]", null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="form-group col-sm-2">
                                                    <img class="responsive" width="50%" src="{{ url('/') }}/images/phone.png" />
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="form-group col-sm-2">
                                                    <img class="responsive" width="50%" src="{{ url('/') }}/images/fax.png" />
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    {!! Form::text("bank_address[{$type}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="form-group col-sm-2">
                                                    <img class="responsive" width="50%" src="{{ url('/') }}/images/email.png" />
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
                            <div class="col-md-6 text-left"><h4>Other Names Used</h4></div>
                            <div class="col-md-6 text-right">
                                <button type="button" class="remove-equal-bank btn btn-danger mb-3">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ms-ua-form pl-4 pr-4">
                        {!! Form::text('equal_banks', '', ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                        <div class="row"></div>
                    </div>
                </div>

                <div class="row pull-right">
                    <div class="col-md-12 mt-3">
                        <input type="submit" value="Save" class="ms-ua-submit btn btn-primary mb-5 text-white" />
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
@section('js')

<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
<script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>
{{-- <script src="{{ asset('owner/includes/js/banks.js') }}" ></script> --}}
<script>
// $( document ).ready(function() {
//   $('.add-additional').on('click', function(){
//       var n = Number(Date.now());
//       additional = $('#addtional_address_template').html()
//           .replaceAll('{i}', n)
//           .replace('{class}', 'selectize-single')
//       $(additional).insertBefore('.additional-addresses')
//       $('.additional-addresses').prev().find('.selectize-single').selectize({
//           selectOnTab: true,
//       })
//       $('.us-phone').mask('(000) 000-0000 | (000) 000-0000');
//   });
// });
//
// $(document).on('click', '.remove-address button', function(){
//     $(this).parents('formset').remove();
// });
//
// $(document).on('change', '.bank-type' ,function(){
//     $form = $(this).parents('form');
//     var bankType = $form.find('.bank-type').val(),
//         token = $("meta[name='csrf-token']").attr("content");
//
//     $form.find(".bank_sub_type_append").html('');
//     $.each( types[bankType], function(index, item) {
//         var sub_types =  $("#sub_types_append").html();
//         sub_types = sub_types.replace(/{value}/g, item);
//
//         $form.find(".bank_sub_type_append").append(sub_types);
//     });
//
//     $form.find( ".fraud_address" ).toggleClass( 'hidden', bankType != 3 );
//
//
//     if(bankType == 3) {
//         $form.find('.dispute_address').find('.expand-address label').text("REGULAR DISPUTE ADDRESS");
//     } else {
//         $form.find('.dispute_address').find('.expand-address label').text("DISPUTE ADDRESS");
//     }
//     console.log(bankType);
//     if([14, 17, 18, 19,20, 21, 23, 24, 26, 27, 28, 29, 31,32, 43, 33, 30, 60, 61].includes(parseInt(bankType)) || bankType == ""){
//
//         if($form.find('.parent_id').val() !== ""){
//             $form.find('.hide-parent-field').removeClass('hide');
//             $form.find('.show-parent-field').addClass('hide');
//             $form.find('.parent').removeClass("hidden" );
//             $form.find('.parent-show').removeClass('hide');
//         }else{
//             $form.find('.show-parent-field').removeClass('hide');
//             $form.find('.hide-parent-field').addClass('hide');
//             $form.find('.parent-show').addClass('hide');
//             $form.find('.parent').removeClass("hidden" );
//         }
//
//
//     }else {
//         $form.find('.parent').addClass("hidden");
//         $(".autocomplete-bank").val("");
//         $(".autocomplete-bank").trigger('keydown');
//     }
// });
//
// $(document).on('click', '.show-parent-field', function(){
//     $('.parent-show').removeClass('hide');
//     $('.show-parent-field').addClass('hide');
//     $('.hide-parent-field').removeClass('hide');
// });
//
// $(document).on('click', '.hide-parent-field', function(){
//     console.log('dasdasd');
//     $('.parent-show').addClass('hide');
//     $('.show-parent-field').removeClass('hide');
//     $('.hide-parent-field').addClass('hide');
//     $('.autocomplete-bank').val('');
//     $('.parent_id').val('');
// });
//
// $(document).on('click','.bank_sub_type_append', function(){
//     $form = $(this).parents('form');
//     var bankType = $form.find('.bank-type').val();
//
//     if(parseInt(bankType) == 40 && $("input[type='checkbox']:checked").val() == "BANK-SBA LENDER"){
//
//         $form.find('.parent').removeClass("hidden");
//     } else if(parseInt(bankType) == 40) {
//         $form.find('.parent').addClass("hidden");
//         $(".autocomplete-bank").val("");
//         $(".autocomplete-bank").trigger('keydown');
//     }
// });
//
// if($('.parent_id').val()==""){
//     $(".executive_copied").hide();
// }
// $(document).on('change click keydown', function(){
//     if($('.parent_id').val()!=""){
//         $(".executive_copied").show();
//     }
// });
//
//
// $(document).on('click','.executive_copied', function(){
//     if($("input[name='bank_address[executive_address][copied]']:checked").val()){
//         $form = $(this).parents('form');
//         var parent_id = $form.find('.parent_id').val();
//
//
//         $.ajax({
//             url: '/admins/furnishers/executive-copied',
//             type: "POST",
//             data: {
//                 "_token": $("meta[name='csrf-token']").attr("content"),
//                 'parent_id': parent_id
//             },
//             success: function( data ) {
//                 $form.find("input[name='bank_address[executive_address][name]']").val(data.name);
//                 $form.find("input[name='bank_address[executive_address][street]']").val(data.street);
//                 $form.find("input[name='bank_address[executive_address][city]']").val(data.city);
//                 if(data.state != null){
//                     var $select = $form.find("select[name='bank_address[executive_address][state]']").selectize();
//                     var selectize = $select[0].selectize;
//                     selectize.setValue(selectize.search(data.state).items[0].id);
//                 }
//                 $form.find("input[name='bank_address[executive_address][zip]']").val(data.zip);
//                 $form.find("input[name='bank_address[executive_address][phone_number]']").val(data.phone);
//                 $form.find("input[name='bank_address[executive_address][fax_number]']").val(data.fax);
//                 $form.find("input[name='bank_address[executive_address][email]']").val(data.email);
//             }
//         });
//
//     }else{
//         $form.find("input[name='bank_address[executive_address][name]']").val('');
//         $form.find("input[name='bank_address[executive_address][street]']").val('');
//         $form.find("input[name='bank_address[executive_address][city]']").val('');
//         $form.find("select[name='bank_address[executive_address][state]']").val('');
//         $form.find("input[name='bank_address[executive_address][zip]']").val('');
//         $form.find("input[name='bank_address[executive_address][phone_number]']").val('');
//         $form.find("input[name='bank_address[executive_address][fax_number]']").val('');
//         $form.find("input[name='bank_address[executive_address][email]']").val('');
//     }
//
//
// });
//
var types = {!!  json_encode($subTypes) !!};

</script>


<script type="text/html" id="sub_types_append">

    <div class="col-md-4 remove_sub_type">

        <input name="bank[additional_information][sub_type][]"  type="checkbox" value ="{value}">
        {value}
    </div>

</script>

<script type="text/html" id="addtional_address_template">
    <formset class="additional_address">
        <div class="row remove-address">
            <div class="col-md-6"><label for="">Additional Address</label>  </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-danger mb-3">
                    <i class="fa fa-times"></i>
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

                <div class="form-group col-sm-6">
                    {!! Form::text("bank_address[additional_address][{i}][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::text("bank_address[additional_address][{i}][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
                    {!! Form::select("bank_address[additional_address][{i}][state]", $states,  null, ['class'=>'{class} state','placeholder' => 'State']); !!}
                </div>
                <div class="form-group col-sm-6">
                    {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                    {!! Form::text("bank_address[additional_address][{i}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="row">
                      <div class="form-group col-sm-2 p-0">
                          <img  class="responsive" src="{{url('/')}}/images/phone.png">
                      </div>
                      <div class="form-group col-sm-10">
                          {!! Form::text("bank_address[additional_address][{i}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                      </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                  <div class="row">
                    <div class="form-group col-sm-2 p-0">
                        <img  class="responsive" src="{{url('/')}}/images/fax.png">
                    </div>
                    <div class="form-group col-sm-10">
                        {!! Form::text("bank_address[additional_address][{i}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                    </div>
                  </div>

                </div>
                <div class="form-group col-sm-6">
                    <div class="row">
                      <div class="form-group col-sm-2 p-0">
                          <img  class="responsive" src="{{url('/')}}/images/email.png">
                      </div>
                      <div class="form-group col-sm-10">
                          {!! Form::email("bank_address[additional_address][{i}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </formset>
</script>

<script>

$( document ).ready(function() {
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
  });
  // $(".selectize-type").selectize({plugins: ['remove_button']})
  var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });

});
</script>
@endsection
