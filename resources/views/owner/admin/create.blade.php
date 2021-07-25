@extends('owner.layouts.app')

@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('owner.admin.index') }}">Admins</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-xl-12">
        <div class="text-center">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <a href="{{ route('owner.admin.index') }}"> <h5 class="text-dark"><i class="ti-angle-left"></i> Create New Admin</h5> </a>
            {!! Form::open(['route' => ['owner.admin.store'], 'method' => 'POST', 'class' => 'mt-5 m-form m-form label-align-right admin-form', 'novalidate'=> 'novalidate']) !!}
            <div class="form-group row font">
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                {{ Form::text('admin[first_name]', old('admin.first_name'), ['class' => 'form-control', 'placeholder' =>'First Name','required']) }}
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                {{ Form::text('admin[last_name]', old('admin.last_name'), ['class' => 'form-control', 'placeholder'=>'Last Name', 'required']) }}
              </div>
            </div>
            <div class="form-group row font">
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                {{ Form::email('admin[email]', old('admin.email'), ['class' => 'form-control','placeholder'=>'Email',  'required'=>"email"]) }}
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                {{ Form::select('admin[negative_types][]',$negativeType, old('admin.negative_types'), ['class' => 'form-control select2',  'required autocomplete'=>"negative_types", 'multiple' => 'multiple']) }}
              </div>
            </div>
            <div class="form-group row font">
              <div class="col-md-11 col-sm-12 col-12 col-lg-11">
                {{ Form::text('admin[ip_address][][ip_address]', old('admin.ip_address'), ['class' => 'form-control ip-address', 'placeholder'=>'IP Address']) }}
              </div>
              <div class="col-md-1 col-sm-12 col-12 col-lg-1 pl-0">
                  <input class="btn btn-primary add-ip-address pull-left" type="button" value="Add IP"/>
              </div>
            </div>
            <div id="newIp">
            </div>
            <div class="form-group row font pull-right">
              <div class="col-md-12 tab-selector">
                <input type="submit" value="Create Admin" class="btn btn-primary ms-ua-submit">
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/site/owner/admins.js') }}"></script>
@endsection
