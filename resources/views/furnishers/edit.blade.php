@extends('owner.layouts.app')
@section('body')


    {{-- @include('helpers.breadcrumbs', ['title'=> "BANK DETAILS", 'route' => ["Home"=> '/admins',"{$bank->name}" => "#"]]) --}}
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Furnisher</li>
              </ol>
            </nav>
      </div>
    </div>
    <br><br>
    <section class="ms-user-account mt-5">
        <div class="container mt-5">
            <div class="col-md-12 col-sm-12">
              {{-- <div class="row pl-5">
                <form method="POST" action="{{route('admins.bank.delete', $bank->id)}}">
                    @csrf
                    @method("DELETE")
                        <div class="col-md-4">
                          <input type="submit" class="btn btn-danger delete-furnisher" value="Delete">
                        </div>
                  </form>

                   <div class="col-md-6">
                      <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">ADD FURNISHER</a>
                  </div>
              </div> --}}
                <div class="row m-2  pt-4">
                    @include('furnishers.search2')
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
                                <div class="col-sm-4 p-5">
                                    <div class="col-sm-12 form-group changeLogo files">
                                      @php
                                        $bankimg = str_replace("bank_logos","banks_logo",$bank->path);
                                        $findfile = public_path('/images/'.$bankimg);

                                      @endphp

                                      @if (isset($bank->path))

                                        {{-- @if(isset($bankimg)) --}}
                                           {{-- <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{$logos->getUrlAttribute()}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a> --}}
                                           @if (file_exists($findfile))
                                             @if (!empty($bank->path))
                                               <img class="card-img-top banks-card" src="{{ url('/') }}/images/{{ $bankimg }}" alt="Card image cap">
                                             @else
                                               <img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  alt="Card image cap">
                                             @endif
                                           @else
                                                <img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                             @endif

                                           @else
                                              <img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap">
                                        @endif



                                    </div>
                                    <div class="col-sm-12 hide form-group updateLogo files">
                                        <input class="bank_logo_class bank_logo form-control file-box" type="file" name="logo">
                                    </div>



                                </div>
                                <div class="col-md-8 pt-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control bank_name" placeholder="COMPANY NAME">
                                            {!! Form::hidden("bank[id]", $bank->id, ["class"=>"form-control bank_id"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::select("bank[type]", $types,  $bank->type, ['class'=>'form-control selectize-single bank-type']); !!}
                                        </div>
                                    </div>
                                    <div class="mx-5">
                                        <div class="row">
                                            <div class="">
                                                <div class="row bank_sub_type_append mb-3">
                                                  @if(isset($subTypes[$bank->type]))
                                                      @foreach($subTypes[$bank->type] as $key => $type)
                                                          <div class="col-md-4 mb-3">
                                                            <div class="row">
                                                              <div class="col-md-2">
                                                                <input name="bank[additional_information][sub_type][]" type="checkbox" value="{{$type}}" {{( !empty( $bank->additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
                                                              </div>
                                                              <div class="col-md-10">
                                                                {{$type}}
                                                              </div>
                                                            </div>
                                                          </div>
                                                      @endforeach
                                                  @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row parent {{in_array($bank->type, [14,17, 18, 19,20, 21, 23, 24, 26, 27, 28, 29, 31,32, 43, 33, 30, 60, 61]) ||(!empty( $bank->additional_information["sub_type"]) && in_array("BANK-SBA LENDER", $bank->additional_information["sub_type"]))? "": 'hidden'}}">
                                        <div class="col-md-3 pl-3">
                                            <a class="btn btn-primary show-parent-field form-control text-white">Add Parent</a>
                                            <a class="btn btn-primary hide hide-parent-field form-control mt-3 text-white">Hide Parent</a>
                                        </div>
                                        <div class="col-md-9 parent-show">
                                            <div class="col-md-12">
                                                <div class="form-group banks ">
                                                    {!! Form::text("bank[parent_name]", $bank->parent ? $bank->parent->name : null, ['class'=>'autocomplete-bank w-100 form-control', 'placeholder' => 'PARENT BANK NAME']); !!}
                                                    {!! Form::hidden("bank[parent_id]", $bank->parent_id, ["class"=>"form-control parent_id"]) !!}
                                                </div>
                                            </div>
                                            <div class="row pull-right pr-3">
                                              <div class="col-md-12">
                                                  <a href="javascript:void(0)" class="btn btn-primary show-parent-bank text-white">Show Bank Info</a>
                                              </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="ms-ua-box mt-2 pt-5" id="account">
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
                                       <div class="col-sm-12 add-additional p-1 pb-5 pointer"><a class="btn btn-primary ms-ua-submit text-white">Add Additional Address</a></div>
                                   </div>
                                    @continue
                                @endif
                                <formset class="{{$hidden? 'hidden': ''}} {{$type}}">
                                    <div class="row expand-address" data-address="#address-{{$type}}">
                                        <div class="col-md-6"><label for="">{{$name}}</label></div>
                                        <div class="col-md-6 text-right mb-3">
                                            <button type="button" class="btn btn-danger">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 addresses " id="address-{{$type}}">
                                        @if($type == 'registered_agent')
                                            <div class="row">
                                                <div class="col-sm-5 paste-register pointer"><a class="btn btn-primary ms-ua-submit text-white">Copy Executive as Registered Agent</a></div>

                                                <div class="form-group col-sm-7 p-0 pr-3">
                                                    {!! Form::text("bank_address[{$type}][name]", !empty($address) ? $address['name'] : null, ["class"=>"autocomplete-name form-control w-100", "placeholder"=>"Agent Name", "data-type"=> 'registered_agent']) !!}
                                                </div>
                                            </div>
                                        @endif
                                        @if($type == 'executive_address')
                                            <div class="row">
                                                <div class="col-md-12 executive_copied">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        Copy ParenT Executive Contact
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input type="checkbox" value="true" name="bank_address[{{$type}}][copied]" {{$bank->copied == true ? "checked":''}} >
                                                      </div>
                                                    </div>
                                                </div>
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
                                                {!! Form::select("bank_address[{$type}][state]", $states,  !empty($address) ? $address['state'] : null, ['class'=>'form-control selectize-single state','placeholder' => 'State']); !!}
                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
                                                {!! Form::text("bank_address[{$type}][zip]",  !empty($address) ? $address['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="row">
                                                  <div class="form-group col-sm-2 px-2">
                                                      <img class="responsive" src="{{ url('/') }}/images/phone.png">
                                                  </div>
                                                  <div class="form-group col-sm-10">
                                                      {!! Form::text("bank_address[{$type}][phone_number]",!empty($address) ? $address['phone_number'] : null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="row">
                                                  <div class="form-group col-sm-2 px-2">
                                                      <img class="responsive" src="{{ url('/') }}/images/fax.png">
                                                  </div>
                                                  <div class="form-group col-sm-10">
                                                      {!! Form::text("bank_address[{$type}][fax_number]", !empty($address) ? $address['fax_number'] : null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="row">
                                                  <div class="form-group col-sm-2 px-2">
                                                      <img class="responsive" src="{{ url('/') }}/images/email.png">
                                                  </div>
                                                  <div class="form-group col-sm-10">
                                                      {!! Form::email("bank_address[$type][email]", !empty($address) ? $address['email'] : null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
                                                  </div>
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
                            <div class="col-md-6 text-left"><h4>Other Names Used</h4></div>
                            <div class="col-md-6 text-right mb-3">
                                <button type="button" class="btn btn-danger remove-equal-bank">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ms-ua-form pl-4 pr-4 ">
                        {!! Form::text('equal_banks', implode(',',$bank->equalBanks->pluck('name')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
                        <div class="row"></div>
                    </div>
                </div>

                <div class="row mt-5 mb-5 pull-right">
                    <div class="col-md-12">
                      <input type="submit" value="Save" class="btn btn-primary ms-ua-submit">
                    </div>
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
                    <h3 class="modal-title" id="exampleModalLabel">Create Furinsher</h3>
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
                        <h3 class="modal-title" id="parentModalLabel">Parent Bank Information</h3>
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

            <div class="col-md-4 mb-3 remove_sub_type">
                <div class="row">
                  <div class="col-md-2">
                    <input name="bank[additional_information][sub_type][]" type="checkbox" value="{value}">
                  </div>
                  <div class="col-md-10">
                    {value}
                  </div>
                </div>
            </div>

        </script>


        <script type="text/html" id="addtional_address_template">
            <formset class="additional_address">
                <div class="row remove-address">
                    <div class="col-md-6"><label for="">Additional Address</label></div>
                    <div class="col-md-6 text-right mb-3">
                        <button type="button" class="btn btn-danger">
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




@endsection
