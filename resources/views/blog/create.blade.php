@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Blog') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Blog') }}</li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Create Blog') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 col-md-10">
    <div class="card">
      <div class="card-body">
        {!! Form::open(['route'=>['blog.store'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "send_email"]) !!}
        @csrf
        <div class="row">
          <div class="col-md-6 mmb-5">
            <input type="text" name="title" class="form-control" placeholder="{{ zactra::translate_lang('Title') }}" />
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="col-md-6">
            <input type="text" name="url" class="form-control" placeholder="{{ zactra::translate_lang('Url') }}" />
            {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6 mmb-5">
            <input type="file" name="attach" class="form-control" placeholder="{{ zactra::translate_lang('Title Image') }}" />
            {!! $errors->first('attach', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="col-md-6">
            <input type="text" name="published_date" class="form-control" placeholder="{{ zactra::translate_lang('Date Published') }}" id="date" />
            {!! $errors->first('published_date', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <textarea name="article" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
            {!! $errors->first('article', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12 text-right">
            <input type="submit" value="{{ zactra::translate_lang('Add') }}" class="btn btn-primary" />
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<style>
  .ms-ua-box {
    background-color: #ffffff !important;
    border-radius: 4px !important;
    padding: 15px;
    box-shadow: 0 0 5px 1px #0000005c;
    opacity: 1;
  }
</style>
@endsection
@section('js')
<script src="/js/lib/tinymce/tinymce.min.js"></script>
<script src="{{ asset('js/site/admin/blogs.js?v=2') }}"></script>
@endsection
