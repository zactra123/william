<form id="register_form" data-id="2" data-type="only_broker" class="add-client additional-reg {{$current_page}}">
@csrf
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Client Email" required autocomplete="email">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          <input id="phone_number" class="phone form-control" type="text" name="phone_number" value="{{ !empty(old('phone_number')) ? old('phone_number') : null}}"  required autocomplete="phone_number" placeholder="Phone Number">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          {{ Form::select('sex', [''=>'Gender','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], null , ['class'=>'form-control', 'id'=>'gender']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          <select class="form-control" name="secret_questions_id" id="secret_question">
              <option disabled="disabled" selected="selected">Choose Secret Question</option>
              @foreach($secrets as $value)
                  <option value="{{$value->id}}" >{{$value->question}}</option>
              @endforeach
              <option value="other">
                  Your Own question
              </option>
          </select>
          <div class="none w-100" id="custom-secret-question">
              <input name="own_secter_question" type="text" class="form-control" placeholder="Own question">
          </div>
        </div>

        <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          <input id="secret_answer" type="text" class="form-control " name="secret_answer" value="{{ old('secret_answer') }}" placeholder="Please answer in secret question">

        </div>

      </div>

    </div>




<div class="basic-button">
    <input class="login" type="submit" value="Continue" name="">
</div>
</form>
