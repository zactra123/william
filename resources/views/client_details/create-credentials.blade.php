@extends('layouts.layout2')
@section('body')
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      {{-- @if(!empty($source)) @include('helpers.breadcrumbs', ['title'=> "CREDENTIALS", 'route' => ["Home"=> '#', "Credentials" => "#"]]) @else @include('helpers.breadcrumbs', ['title'=> "Registration Steps", 'route' => ["Home"=> '#',
      $client->clientDetails->registration_steps =="credentials" ?"Credit Bureau Login Credentials":"Registration Steps" => "#"]]) @endif --}}
    </div>
  </div>
  @include("client_details.registration_steps.credentials")
</div>

@endsection
