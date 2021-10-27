@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Receptionist') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owner.receptionist.index') }}">{{ zactra::translate_lang('Receptionist') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Create') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="container">
  <div class="row row-sm">
    <div class="col-md-12 col-sm-12">
      <div class="text-center">
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-dark"><i class="ti-angle-left"></i> {{ zactra::translate_lang('Edit Receptionist') }}</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => ['owner.receptionist.update', $receptionist->id], 'method' => 'POST', 'class' => 'm-form m-form label-align-right admin-form', 'novalidate'=> 'novalidate']) !!}
           @method('PUT')
           @csrf
          <div class="form-group row font justify-content-center">
            <div class="col-md-4">
              {{ Form::text('receptionist[first_name]', $receptionist->first_name, ['class' => 'form-control mmb-5', 'placeholder' =>'First Name', 'required'])}}
            </div>
            <div class="col-md-4">
              {{ Form::text('receptionist[last_name]', $receptionist->last_name, ['class' => 'form-control mmb-5', 'placeholder'=>'Last Name', 'required'])}}
            </div>
            <div class="col-md-4">
              {{ Form::email('receptionist[email]', $receptionist->email, ['class' => 'form-control','placeholder'=>'Email', 'required']) }}
            </div>
          </div>
          @foreach($receptionist->ipAddress as $value)
          <div class="form-group row font justify-content-center" id="delete-{{$value->id}}">
            <div class="col-sm-12 col-md-11 form-group">
              {{Form::hidden('receptionist[ip_address]['.$value->id.'][id]', $value->id)}} {{ Form::text('receptionist[ip_address]['.$value->id.'][ip_address]', $value->ip_address, ['class' => 'form-control', 'placeholder'=>'IP Address',
              'required']) }}
            </div>
            <div class="col-sm-12 col-md-1 form-group pl-0 mml-12"><input class="remove-ip-address btn btn-danger" type="button" data-target="{{$value->id}}" value="{{ zactra::translate_lang('Delete') }}" /></div>
          </div>
          @endforeach
          <div id="newIp"></div>
          <div class="form-group row">
            <div class="col-md-2">
              <input class="btn btn-primary add-ip-address" type="button" value="{{ zactra::translate_lang('Add IP') }}" />
            </div>
          </div>
          <div class="form-group row mb-0 font">
            <div class="col-md-12">
              <input type="submit" value="{{ zactra::translate_lang('Update') }}" class="ms-ua-submit btn btn-primary pull-right" />
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
<script src="{{ asset('js/site/owner/receptionists.js') }}"></script>
@endsection
