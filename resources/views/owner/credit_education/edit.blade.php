@extends('owner.layouts.app')
@section('title')
<title>Eductions</title>
@endsection
@section('body')
{{-- @include('helpers.breadcrumbs', ['title'=> "CREDIT EDUCATION", 'route' => ["Home"=> '/owner',"UPDATE EDUCATION" => "#"]]) --}}
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Education</li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container">
    <div class="row">
      <div class="col-md-1 col-sm-12"></div>
      <div class="col-md-10 col-sm-10">
        <div class="ms-ua-box">
          <div class="col-md-11">
            <div class="card">
              <div class="card-header">
                <h4>Edit Education</h4>
                <p>Please enter followiing information to edit education</p>
              </div>
              <div class="card-body">
                {!! Form::open(['route' => ['owner.credit.education.update', $content->url], 'method' => 'POST', 'class' => 'm-form m-form--label-align-right']) !!} @method('PUT') @csrf
                <div class="form-group row font">
                  {{ Form::text('content[title]', $content->title, ['class' => 'form-control m-input', 'placeholder' => 'Title', 'required']) }}
                </div>
                <div class="form-group row font">
                  {{ Form::text('content[url]', $content->url, ['class' => 'form-control m-input', 'placeholder' => 'url example: some-url-example', 'required']) }}
                </div>
                <div class="form-group row font">
                  {{ Form::number('content[category]', $content->category, ['class' => 'form-control m-input', 'placeholder' => 'Please enter 1 or 2', 'required']) }}
                </div>
                <div class="form-group row font">
                  {!! Form::textarea('content[sub_content]', $content->sub_content, ['class' => 'form-control m-input', 'placeholder' => 'Sub Content', 'required']) !!}
                </div>
                <div class="form-group row font">
                  {{-- <textarea name="content[content]" class="form-control m-input" placeholder="Full Content" rows="10">{!! $content->content !!}</textarea> --}} {!! Form::textarea('content[content]', $content->content, ['class' =>
                  'form-control m-input', 'placeholder' => 'Full Content', 'required']) !!}
                </div>
                <div class="form-group row mb-0 font">
                  <div class="col-md-12 text-right px-0">
                    <button type="submit" class="btn btn-primary pull-right">
                      Update Content
                    </button>
                  </div>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
