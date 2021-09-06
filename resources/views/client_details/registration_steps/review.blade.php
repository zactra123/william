<form id="add_client_5" action="{{route('client.details.update', $client)}}" data-id="5" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
{{-- <form id="add_client_5" action="{{route('client.details.update', $client)}}" data-id="5" data-type="only_broker" class="add-client additional-reg"> --}}
    @csrf
    <p class="mt-5">Please verify your information and make changes if necessary</p>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            {{ Form::text('client[full_name]', !empty($uploadUserDetail) && $uploadUserDetail->full_name() != null ? $uploadUserDetail->full_name() : $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'Full Name']) }}
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            {{ Form::date('client[dob]', !empty($uploadUserDetail) && !empty($uploadUserDetail->dob) ? $uploadUserDetail->dob : $client->clientDetails->dob, ['class' => 'form-control m-input', 'placeholder'=>'Date of birth']) }}
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            {{ Form::text('client[ssn]', !empty($uploadUserDetail) ? $uploadUserDetail->ssn :  $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'placeholder' => 'Social security number']) }}
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
            {{ Form::text('client[address]',  !empty($uploadUserDetail) ? $uploadUserDetail->full_address() :  $client->clientDetails->full_address(), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="select">
            {{ Form::select('client[sex_uploaded]', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($uploadUserDetail) ? $uploadUserDetail->sex : $client->clientDetails->sex , ['class'=>'form-control']) }}
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                xml:space="preserve">
                <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                    c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                    c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
            </svg>
        </div>
      </div>
    <div class="col-md-12 text-center">
      <div class="basic-button">
        <input class="login" type="submit" value="Submit" name="">
      </div>
    </div>
</form>
