@extends('owner.layouts.app')
@section('title')
<title>Faqs</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owner.faqs.index') }}">Faqs</a></li>
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

    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body mx-3">
          <div class="row">
            <a href="{{ route('owner.faqs.index') }}" style="color: black;">
              <h5><i class="ti-angle-left"></i></h5>
            </a>
            <h5 class="text-dark">Create New Faq</h5>
          </div>

          {!! Form::open(['route' => ['owner.faqs.store'], 'method' => 'POST', 'class' => 'mt-4 m-form m-form--label-align-right']) !!} @csrf
          <div class="form-group font">
            {{ Form::text('faqs[title]', old('faqs.title'), ['class' => 'form-control m-input', 'placeholder' => 'Answer']) }}
          </div>

          <div class="form-group font">
            {{ Form::textarea('faqs[description]', old('content.sub_content'), ['class' => 'form-control m-input', 'placeholder' => 'Question']) }}
          </div>
          <div class="form-group row mb-0 font">
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary">
                Add FAQs
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
