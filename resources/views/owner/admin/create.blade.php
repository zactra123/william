@extends('layouts.owner')

@section('content')
    <div class="container">
        <div class="row">
          <a class="btn btn-success"  href="{{route('owner.admin.list')}}">Back</a>
        </div>

        @foreach ($errors->all() as $error)

            <div class="alert alert-danger">{{ $error }}</div>

        @endforeach

        <div class="card-body">
            {!! Form::open(['route' => ['owner.admin.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}
            <div class="form-group row">
                <label for="first name" class="col-md-4 col-form-label text-md-right"> First name</label>
                <div class="col-md-6">
                    {{ Form::text('admin[first_name]', old('admin.first_name'), ['class' => 'form-control m-input']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="last name" class="col-md-4 col-form-label text-md-right"> Last name</label>
                <div class="col-md-6">
                    {{ Form::text('admin[last_name]', old('admin.last_name'), ['class' => 'form-control m-input']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    {{ Form::email('admin[email]', old('admin.email'), ['class' => 'form-control',  'required autocomplete'=>"email"]) }}

                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    {{ Form::password('admin[password]', old('admin.password'), ['class' => 'form-control',  'required autocomplete'=>"password"]) }}

                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Create admin
                    </button>
                </div>
            </div>


            {!! Form::close() !!}

        </div>

@endsection


