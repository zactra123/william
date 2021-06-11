@php($uploadUserDetail = !empty($client) ? $client->uploadClientDetails : null)
<form id="add_client_5" data-client="{{$client!=null?$client->id:""}}" data-id="5" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
    @csrf
    <p class="mt-5">Please verify your information and make changes if necessary</p>
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          {{ Form::text('client[full_name]', !empty($uploadUserDetail) ? $uploadUserDetail->full_name() : (!empty($client) ? $client->full_name():''), ['class' => 'form-control m-input',  'placeholder' => 'Full Name']) }}
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          {{ Form::date('client[dob]', !empty($uploadUserDetail) && !empty($uploadUserDetail->dob) ? $uploadUserDetail->dob : (!empty($client) ? $client->clientDetails->dob:''), ['class' => 'form-control m-input', 'placeholder'=>'Date of birth']) }}
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          {{ Form::text('client[ssn]', !empty($uploadUserDetail) ? $uploadUserDetail->ssn : (!empty($client) ? $client->clientDetails->ssn:''), ['class' => 'form-control m-input ssn', 'placeholder' => 'Social security number']) }}
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          {{ Form::text('client[address]',  !empty($uploadUserDetail) ? $uploadUserDetail->full_address() :  (!empty($client) ? $client->clientDetails->full_address() :''), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          {{ Form::select('client[sex_uploaded]', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($uploadUserDetail) ? $uploadUserDetail->sex : (!empty($client) ? $client->clientDetails->sex :'') , ['class'=>'form-control']) }}
        </div>

      </div>
    </div>

    <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
    </div>
</form>
