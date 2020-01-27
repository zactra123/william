@extends('layouts.owner')

@section('content')
    <style>
        .form-control{
            border: 2px solid #0c71c3;
            border-radius: 10px;
        }

    </style>


    <div class="container">
        <div class="row m-2">
          <a class="btn btn-success"  href="{{route('owner.admin.list')}}">Back</a>
        </div>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>

        @endforeach
        <div class="card">
            <div class="card-header">
                <div class="head m-2">Edit Admin</div>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['owner.admin.update', $admin->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right']) !!}
                @method('PUT')
                @csrf

                <div class="form-group row m-1">
                    <label for="first name" class="col-md-4 col-form-label text-md-right"> First name</label>
                    <div class="col-md-6">
                        {{ Form::text('admin[first_name]', $admin->first_name, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row m-1">
                    <label for="last name" class="col-md-4 col-form-label text-md-right"> Last name</label>
                    <div class="col-md-6">
                        {{ Form::text('admin[last_name]', $admin->last_name, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row m-1">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        {{ Form::email('admin[email]', $admin->email, ['class' => 'form-control',  'required autocomplete'=>"email"]) }}

                    </div>
                </div>

                <div class="form-group row m-1">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Negative Types</label>

                    <div class="col-md-6">
                        {{ Form::select('admin[negative_types][]',$negativeType, $admin->adminSpecifications->pluck('id')->all(), ['class' => 'form-control',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}

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
        </div>




@endsection


