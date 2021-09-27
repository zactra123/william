@extends('owner.layouts.app')
@section('title')
<title>Upload Documents</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/client/details') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Upload Documents</li>
              </ol>
          </nav>
      </div>
  </div>
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      {{--
      <h3 class="page-title">
        @include('helpers.breadcrumbs', ['title'=> "Upload Documents", 'route' => ["Home"=> '#', "Upload Documents" => "#"]])
      </h3>
      --}}
    </div>
  </div>
  @include("client_details.registration_steps.documents")
</div>
@endsection
