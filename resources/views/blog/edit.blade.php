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
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Edit Blog') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 col-sm-10">
    <div class="card">
      <div class="card-body">
        {!! Form::open(['route'=>['blog.update', $blog->id],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "send_email"]) !!}
        @csrf
        @method("PUT")
        <div class="row">
          <div class="col-md-6 mmb-5">
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="{{ zactra::translate_lang('Title') }}" />
          </div>
          <div class="col-md-6">
            <input type="text" name="url" value="{{ $blog->url }}" class="form-control" placeholder="{{ zactra::translate_lang('Url') }}" />
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6 mmb-5">
            <input type="file" name="attach" value="{{ $blog->path }}" class="form-control" placeholder="{{ zactra::translate_lang('Title Image') }}" />
          </div>
          <div class="col-md-6">
            <input type="date" name="published_date" value="{{ $blog->published_date }}" class="form-control" placeholder="{{ zactra::translate_lang('Date Published') }}" id="date" />
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <textarea name="article" rows="8" cols="40" class="form-control tinymce-editor">{{ $blog->article }}</textarea>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12 text-right">
            <input type="submit" value="{{ zactra::translate_lang('Update') }}" class="btn btn-primary" />
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
