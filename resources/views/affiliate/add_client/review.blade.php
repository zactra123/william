@php($uploadUserDetail = !empty($client) ? $client->uploadClientDetails : null)
<form id="add_client_5" data-client="{{$client!=null?$client->id:""}}" data-id="5" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
    @csrf
    <p>Please verify your information and make changes if necessary</p>
    {{ Form::text('client[full_name]', !empty($uploadUserDetail) ? $uploadUserDetail->full_name() : (!empty($client) ? $client->full_name():''), ['class' => 'form-control m-input',  'placeholder' => 'Full Name']) }}
    {{ Form::date('client[dob]', !empty($uploadUserDetail) && !empty($uploadUserDetail->dob) ? $uploadUserDetail->dob : (!empty($client) ? $client->clientDetails->dob:''), ['class' => 'form-control m-input', 'placeholder'=>'Date of birth']) }}
    {{ Form::text('client[ssn]', !empty($uploadUserDetail) ? $uploadUserDetail->ssn : (!empty($client) ? $client->clientDetails->ssn:''), ['class' => 'form-control m-input ssn', 'placeholder' => 'Social security number']) }}
    {{ Form::text('client[address]',  !empty($uploadUserDetail) ? $uploadUserDetail->full_address() :  (!empty($client) ? $client->clientDetails->full_address() :''), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
    {{ Form::select('client[sex_uploaded]', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($uploadUserDetail) ? $uploadUserDetail->sex : (!empty($client) ? $client->clientDetails->sex :'') , ['class'=>'form-control']) }}

    <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
    </div>
</form>
