@extends('layouts.layout2')
@section('body')
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
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
