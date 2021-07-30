@extends('owner.layouts.app')
@section('title')
<title> Eductions </title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Education</li>
            </ol>
          </nav>
    </div>
  </div>
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12"></div>
                <div class="col-md-8 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>Add New Education</h4>
                                <p>Please enter followiing information to add new education</p>
                              </div>
                                <div class="card-body pl-4 pr-4">
                                    {!! Form::open(['route' => ['owner.credit.education.store'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                                    @csrf
                                    <div class="form-group row font">
                                        {{ Form::text('content[title]', old('content.title'), ['class' => 'form-control m-input', 'placeholder' => 'Title', 'required']) }}
                                    </div>
                                    <div class="form-group row font">
                                        {{ Form::text('content[url]', old('content.url'), ['class' => 'form-control m-input', 'placeholder' => 'url example: some-url-example', 'required']) }}
                                    </div>
                                    <div class="form-group row font">
                                        {{ Form::number('content[category]', old('content.category'), ['class' => 'form-control m-input', 'placeholder' => 'Please enter 1 or 2', 'required']) }}
                                    </div>
                                    <div class="form-group row font">
                                        {{ Form::textarea('content[sub_content]', old('content.sub_content'), ['class' => 'form-control m-input', 'placeholder' => 'Sub Content', 'rows' => '5', 'required']) }}
                                    </div>
                                    <div class="form-group row font">
                                        {{ Form::textarea('content[content]', old('content.content'), ['class' => 'form-control m-input', 'placeholder' => 'Full Content', 'rows' => '5', 'required']) }}
                                    </div>
                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-12 text-right px-0">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                Add Content
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
