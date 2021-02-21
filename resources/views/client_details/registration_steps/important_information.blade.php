{!! Form::open(['route' => ['client.important'], 'method' => 'POST', 'id' => 'register_form', 'data-id'=>"2", 'class' => "add-client additional-reg $current_page"]) !!}

    @csrf
    {{ Form::text('full_name',  $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'Full name']) }}
    <input id="phone_number" type="text" name="phone_number" value="{{ !empty(old('phone_number')) ? old('phone_number') : (!empty($client->clientDetails) ? $client->clientDetails->phone_number: "") }}" required autocomplete="phone_number" placeholder="Phone Number">

    {{ Form::select('sex', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], !empty($client->clientDetails()) ? $client->clientDetails['sex'] : '' , ['class'=>'form-control', 'id'=>'gender']) }}
    <select class="form-control" name="secret_questions_id" id="secret_question">
        <option disabled="disabled" selected="selected">Choose Secret Question</option>
        @foreach($secrets as $value)
            <option value="{{$value->id}}" {{$client->secret_questions_id == $value-> id ? "selected" : ""}}>{{$value->question}}</option>
        @endforeach
        <option value="other">
            Your Own question
        </option>
    </select>
    <div class="none w-100" id="custom-secret-question">
        <input name="own_secter_question" type="text" class="form-control" placeholder="Own question">
    </div>
    <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="Please answer in secret question">

<div class="basic-button">
    <input class="login" type="submit" value="Continue" name="">
</div>
{!! Form::close() !!}
