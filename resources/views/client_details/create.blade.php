@extends('layouts.layout')


@section('content')
    @include('helpers.breadcrumbs', ['title'=> "Registration Steps", 'route' => ["Home"=> '#', "Registration Steps"=> "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include('helpers.steps')

                        @include("client_details.registration_steps.{$client->clientDetails->registration_steps}")
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection










