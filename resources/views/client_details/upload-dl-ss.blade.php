@extends('layouts.layout1')

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "Upload Documents", 'route' => ["Home"=> '#', "Upload Documents" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include("client_details.registration_steps.documents")
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
