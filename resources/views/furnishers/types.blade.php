@extends('owner.layouts.app')
@section('title')
<title> Furnisher Type </title>
@endsection
@section('body')

    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bank Equal Names</li>
              </ol>
            </nav>
      </div>
    </div>
    <section class="ms-user-account">
        <div class="container">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-12 col-sm-12">
              <div class="card">
                {!! Form::open(['route' => ['admins.bank.types'], 'method' => 'POST', 'class' => 'm-form m-form label-align-right', 'id'=>'equalBanks']) !!}
                  @csrf
                  <div class="row px-5 pt-5 pb-3">
                          <div class="col-md-4">
                              <div>
                                  {!! Form::text('account_type[name]','' ,['class'=>'form-control form-account-name', 'id' => 'select-account']); !!}
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-check">
                                  <div class="row">
                                    <div class="col-md-8">
                                      {!! Form::hidden('account_type[type]',0) !!}
                                      {!! Form::label("account_type[type]", 'DEFAULT',["class" => 'form-control form-check-label']); !!}

                                    </div>
                                    <div class="col-md-4 text-center pt-2">
                                      {!! Form::checkbox('account_type[type]',1, false, ['class'=> " form-check-input" ]); !!}
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="row">
                                <div class="col-sm-8">
                                  {!! Form::text('account_type_keys[key_word]', '', ['multiple'=>'multiple','class'=>' selectize-multiple form-group']); !!}
                                </div>
                                <div class="col-sm-4">
                                  <input type="submit" value="Save" class="btn btn-primary ms-ua-submit">
                                </div>
                              </div>
                          </div>


                  </div>
                  {!! Form::close() !!}
              </div>
            </div>
            <div class="col-md-12 col-sm-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%" class="table  table-striped">
                            <thead>
                            <tr>
                                <th>FURNISHERs TYPE</th>
                                <th>IS DEFAULT</th>
                                <th>KEYWORDS</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($accountTypes as $type)
                                    <tr data-id="{{$type->id}}">
                                        <td width="20%">{{$type["name"]}}</td>
                                        <td width="10%">
                                            <input type="checkbox" class="is_default_account_type" data-account-tyep="{{$type["id"]}}" {{$type["type"] ? "checked":''}}>
                                        </td>
                                        <td width="50%">
                                            {!! Form::text('equal_banks[name]', implode(',',$type->accountKeys->pluck('key_word')->toArray()), ['multiple'=>'multiple','class'=>'selectize-multiple form-group ']); !!}

                                        </td>
                                        <td width="20%" class="text-center">
                                          <div class="dropdown show">
                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="{{ route('furnisher.delete.type',$type->id) }}" onclick="return confirm('Are You Sure?')">Delete</a>
                                            </div>
                                          </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
  <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('js')

      <script type="text/html" id="confirmation">
          <div>
              <button class="cancel btn btn-secondary ">cancel</button>
              <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
          </div>
      </script>

      <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
      <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
      <script src="{{ asset('js/site/admin/types.js?v=2') }}" ></script>

      <script>
          $(document).ready(function() {
              $('#equalBanks').validate({
                  rules: {

                      "account_type[name]": {
                          required: true
                      },


                  },
                  errorPlacement: function(error, element) {
                          error.insertAfter(element);

                  }
              })

          });


      </script>

@endsection
