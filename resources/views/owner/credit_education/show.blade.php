@extends('owner.layouts.app')
@section('title')
<title>Eductions</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Education</li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-12 col-sm-12">
        <div class="ms-ua-box">
          <div class="col-md-12">
            <div class="card p-5">
              <div class="row">
                @foreach($content as $value)
                <div class="col-md-12">
                  <div class="row my-2">
                    <div class="col-md-12">
                      <strong class="mb-2">Title:</strong>
                    </div>
                    <div class="col-md-12">
                      {{$value->title}}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row my-2">
                    <div class="col-md-12">
                      <strong class="mb-2">Url:</strong>
                    </div>
                    <div class="col-md-12">
                      {{$value->url}}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row my-2">
                    <div class="col-md-12">
                      <strong class="mb-2">Category number: </strong>
                    </div>
                    <div class="col-md-12">
                      {{$value->category}}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row my-4">
                    <div class="col-md-12">
                      <strong class="mb-2">Sub Content:</strong>
                    </div>
                    <div class="col-md-12">
                      {!! $value->sub_content !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row my-4">
                    <div class="col-md-12">
                      <strong class="mb-2">Content:</strong>
                    </div>
                    <div class="col-md-12">
                      {!! $value->content !!}
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
