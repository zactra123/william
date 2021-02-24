{!! Form::open(['route' => ['client.important'], 'method' => 'POST', 'id' => 'register_form', 'data-id'=>"2", 'class' => "add-client additional-reg $current_page"]) !!}

    @csrf
    {{ Form::text('full_name',  $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'Full name']) }}
    <input id="phone_number" type="text" name="phone_number" value="{{ !empty(old('phone_number')) ? old('phone_number') : (!empty($client->clientDetails) ? $client->clientDetails->phone_number: "") }}" required autocomplete="phone_number" placeholder="Phone Number">
    <div class="select">
        {{ Form::select('sex', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($client->clientDetails()) ? $client->clientDetails['sex'] : '' , ['class'=>'form-control', 'id'=>'gender']) }}
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
            xml:space="preserve">
            <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
        </svg>
    </div>
    <div class="select">
        <select class="form-control" name="secret_questions_id" id="secret_question">
            <option disabled="disabled" selected="selected">Choose Secret Question</option>
            @foreach($secrets as $value)
                <option value="{{$value->id}}" {{$client->secret_questions_id == $value-> id ? "selected" : ""}}>{{$value->question}}</option>
            @endforeach
            <option value="other">
                Your Own question
            </option>
        </select>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
            xml:space="preserve">
            <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
        </svg>
    </div>
    <div class="none w-100" id="custom-secret-question">
        <input name="own_secter_question" type="text" class="form-control" placeholder="Own question">
    </div>
    <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="Please answer in secret question">

<div class="basic-button">
    <input class="login" type="submit" value="Continue" name="">
</div>
{!! Form::close() !!}
