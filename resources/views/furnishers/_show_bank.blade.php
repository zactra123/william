<?php
    $states = [null=>''] + \App\BankAddress::STATES; $types = [null=>''] + \App\BankLogo::TYPES; asort($types) ?>
<section class="ms-user-account">
  <div class="container">
    <div class="col-md-12 col-sm-12">
      {!! Form::open(['route' => ['admins.bank.update', $bank->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'parentBankInformationEdit','enctype'=>'multipart/form-data' ]) !!} @method('PUT') @csrf
      <div class="ms-ua-box">
        <div class="ms-ua-form">
          <div class="ms-ua-title mb-0">
            <div class="row">
              <div class="col-sm-3 form-group files">
                @if($bank->checkUrlAttribute())
                <img src="{{$bank->getUrlAttribute()}}" width="100px" />
                @else
                <img width="100px" src="{{asset('images/default_bank_logos.png')}}" alt="Card image cap" />
                @endif
              </div>
              <div class="col-md-9">
                <div class="col-md-8">
                  <div class="form-group">
                    <input type="text" name="bank[name]" value="{{strtoupper($bank->name)}}" class="form-control bank_name" placeholder="Company Name" />
                    {!! Form::hidden("bank[id]", $bank->id, ["class"=>"form-control bank_id"]) !!}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    {!! Form::select("bank[type]", $types, $bank->type, ['class'=>'selectize-single bank-type']); !!}
                  </div>
                </div>
                <div class="m-5">
                  <div class="row">
                    <div class="bank_sub_type_append">
                      @if(isset($subTypes[$bank->type])) @foreach($subTypes[$bank->type] as $key => $type)
                      <div class="col-md-6">
                        {{$type}}
                        <input name="bank[additional_information][sub_type][]" type="checkbox" value="{{$type}}" {{( !empty( $bank- />additional_information["sub_type"]) && in_array($type, $bank->additional_information["sub_type"])) ? "checked":''}}>
                      </div>
                      @endforeach
                    @endif
                    </div>
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
            @foreach(\App\BankAddress::TYPES as $type=>$name) @php $address = !empty($bank_addresses[$type]) ? $bank_addresses[$type] : null; $hidden = false; if ($type == 'fraud_address') { $hidden = $bank->type != 3; } if ($type ==
            'qwr_address'){ $hidden = !in_array($bank->type, [2, 55]) || (empty($bank->additional_information['sub_type']) || !in_array('MORTGAGE', $bank->additional_information['sub_type'])); } @endphp @if($type == 'additional_address')
            <?php if (!empty($bank_addresses[$type])) { ?>
            @foreach($bank_addresses[$type] as $addresses) @include('furnishers._address', ['type'=>$type,'states' => $states, 'address'=>$addresses ]) @endforeach
            <?php } ?>

            <div class="row additional-addresses">
              <div class="col-sm-6 add-additional p-1 pb-5"><a class="btn btn ms-ua-submit form-control">ADD ADDITIONAL ADDRESS</a></div>
            </div>
            @continue
          @endif
            <formset class="{{$hidden? 'hidden': ''}} {{$type}}" disabled>
              <div class="row expand-address" data-address="#address-{{$type}}">
                <div class="col-md-6"><label for="">{{$name}}</label></div>
                <div class="col-md-6 text-right">
                  <button type="button">
                    <i class="fa fa-minus-circle"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-12 addresses" id="address-{{$type}}">
                @if($type == 'registered_agent')
                <div class="row">
                  <div class="col-sm-6 paste-register p-1"><a class="btn btn ms-ua-submit form-control">COPY EXECUTIVE AS REGISTERED AGENT</a></div>
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
                @if($type == 'dispute_address' || $type == 'qwr_address' || $type == 'fraud_address')
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
                     {!! Form::text("bank_address[{$type}][street]", !empty($address) ? $address['street'] : null, ["class"=>"form-control street","placeholder"=>"Street"]) !!}
                  </div>
                  <div class="form-group col-sm-3">
                    {!! Form::text("bank_address[{$type}][city]", !empty($address) ? $address['city'] : null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
                  </div>
                  <div class="form-group col-sm-2">
                    {!! Form::select("bank_address[{$type}][state]", $states, !empty($address) ? $address['state'] : null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
                  </div>
                  <div class="form-group col-sm-2">
                    {!! Form::text("bank_address[{$type}][zip]", !empty($address) ? $address['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-4">
                    <div class="form-group col-sm-2 p-0">
                      <img class="responsive" src="/images/phone.png" />
                    </div>
                    <div class="form-group col-sm-10">
                      {!! Form::text("bank_address[{$type}][phone_number]",!empty($address) ? $address['phone_number'] : null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <div class="form-group col-sm-2 p-0">
                      <img class="responsive" src="/images/fax.png" />
                    </div>
                    <div class="form-group col-sm-10">
                      {!! Form::text("bank_address[{$type}][fax_number]", !empty($address) ? $address['fax_number'] : null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <div class="form-group col-sm-2 p-0">
                      <img class="responsive" src="/images/email.png" />
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
            <div class="col-md-6 text-left"><h4>Other Names Used</h4></div>
            <div class="col-md-6 text-right">
              <button type="button" class="remove-equal-bank btn btn-danger mb-3">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="ms-ua-form pl-4 pr-4">
          {!! Form::text('equal_banks', implode(',',$bank->equalBanks->pluck('name')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}
          <div class="row"></div>
        </div>
      </div>
      <div class="col mt-5">
        <input type="submit" value="Save" class="ms-ua-submit" />
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
