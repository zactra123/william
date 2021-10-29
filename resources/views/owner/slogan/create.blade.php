@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Slogans') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Create Slogans') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="container">
  <div class="row row-sm">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card mg-b-20" id="tabs-style2">
        <div class="card-body px-5">
          <h2>{{ zactra::translate_lang('Add Slogan') }}</h2>
          {!! Form::open(['route' => ['owner.slogans.store'], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!}
           @csrf
          <div class="form-group row font">
            {{ Form::text('slogan[author]', old('slogan.author'), ['class' => 'form-control m-input', 'placeholder' => 'Author Name','required']) }}
          </div>
          <div class="form-group row font">
            {{ Form::textarea('slogan[slogan]', old('slogan.slogan'), ['class' => 'form-control m-input', 'placeholder' => 'Slogan','required']) }}
          </div>
          <div class="form-group row mb-0 font">
            <div class="col-md-12 text-right p-0">
              <button type="submit" class="btn btn-primary">
                {{ zactra::translate_lang('Add Slogan') }}
              </button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
