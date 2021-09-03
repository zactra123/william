@extends('owner.layouts.app')
@section('title')
<title>Credentials</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/client/details') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Credentials</li>
            </ol>
        </nav>
    </div>
</div>
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      {{-- @if(!empty($source)) @include('helpers.breadcrumbs', ['title'=> "CREDENTIALS", 'route' => ["Home"=> '#', "Credentials" => "#"]]) @else @include('helpers.breadcrumbs', ['title'=> "Registration Steps", 'route' => ["Home"=> '#',
      $client->clientDetails->registration_steps =="credentials" ?"Credit Bureau Login Credentials":"Registration Steps" => "#"]]) @endif --}}
    </div>
  </div>
  @include("client_details.registration_steps.credentials")
</div>
@endsection
