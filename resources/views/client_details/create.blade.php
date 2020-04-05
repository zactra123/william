@extends('layouts.client')


@section('content')
    <div class="page-content">
        <div class="fullwidth-block">
            @include("helpers.steps")
            <div class="row justify-content-center">

               @include("client_details.registration_steps.{$client->clientDetails->registration_steps}")
            </div>
        </div>
    </div>

@endsection










