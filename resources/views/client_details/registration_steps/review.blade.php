<form id="add_client_5" action="{{route('client.details.update', $client)}}" data-id="5" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
    @csrf
    <p>Please verify your information and make changes if necessary</p>
    {{ Form::text('client[full_name]', !empty($uploadUserDetail) && $uploadUserDetail->full_name() != null ? $uploadUserDetail->full_name() : $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'Full Name']) }}
    {{ Form::date('client[dob]', !empty($uploadUserDetail) && !empty($uploadUserDetail->dob) ? $uploadUserDetail->dob : $client->clientDetails->dob, ['class' => 'form-control m-input', 'placeholder'=>'Date of birth']) }}
    {{ Form::text('client[ssn]', !empty($uploadUserDetail) ? $uploadUserDetail->ssn :  $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'placeholder' => 'Social security number']) }}
    {{ Form::text('client[address]',  !empty($uploadUserDetail) ? $uploadUserDetail->full_address() :  $client->clientDetails->full_address(), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
    {{ Form::select('client[sex_uploaded]', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($uploadUserDetail) ? $uploadUserDetail->sex : $client->clientDetails->sex , ['class'=>'form-control']) }}

    <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
    </div>
</form>
