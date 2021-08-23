<formset class="additional_address">
  <div class="row remove-address">
    <div class="col-md-6"><label for="">{{$name}}</label></div>
    <div class="col-md-6 text-right">
      <button type="button">
        <i class="fa fa-remove"></i>
      </button>
    </div>
  </div>
  <div class="col-md-12 addresses">
    <div class="row">
      <div class="form-group col-sm-12">
        {!! Form::text("bank_address[{$type}][{$address->id}][name]", !empty($address) ? $address['name'] : null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
      </div>
    </div>
    <div class="row">
      {!! Form::hidden("bank_address[$type][{$address->id}][type]", $type, ["class"=>"form-control"]) !!} {!! Form::hidden("bank_address[$type][{$address->id}][id]", !empty($address) ? $address['id'] : null, ["class"=>"form-control"]) !!}
      <div class="form-group col-sm-5">
        {!! Form::text("bank_address[{$type}][{$address->id}][street]", !empty($address) ? $address['street'] : null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
      </div>
      <div class="form-group col-sm-3">
        {!! Form::text("bank_address[{$type}][{$address->id}][city]", !empty($address) ? $address['city'] : null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
      </div>
      <div class="form-group col-sm-2">
        {!! Form::select("bank_address[{$type}][{$address->id}][state]", $states, !empty($address) ? $address['state'] : null, ['class'=>'selectize-single state','placeholder' => 'State']); !!}
      </div>
      <div class="form-group col-sm-2">
        {!! Form::text("bank_address[{$type}][{$address->id}][zip]", !empty($address) ? $address['zip'] : null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <div class="form-group col-sm-2 p-0">
          <img class="responsive" src="/images/phone.png" />
        </div>
        <div class="form-group col-sm-10">
          {!! Form::text("bank_address[{$type}][{$address->id}][phone_number]",!empty($address) ? $address['phone_number'] : null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
        </div>
      </div>
      <div class="form-group col-sm-4">
        <div class="form-group col-sm-2 p-0">
          <img class="responsive" src="/images/fax.png" />
        </div>
        <div class="form-group col-sm-10">
          {!! Form::text("bank_address[{$type}][{$address->id}][fax_number]", !empty($address) ? $address['fax_number'] : null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
        </div>
      </div>
      <div class="form-group col-sm-4">
        <div class="form-group col-sm-2 p-0">
          <img class="responsive" src="/images/email.png" />
        </div>
        <div class="form-group col-sm-10">
          {!! Form::email("bank_address[$type][{$address->id}][email]", !empty($address) ? $address['email'] : null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
        </div>
      </div>
    </div>
  </div>
</formset>
