@extends('layouts.layout')


@section('content')
    @include('helpers.breadcrumbs', ['title'=> "Registration Steps", 'route' => ["Home"=> '#', "Credit Bureau Login Credentials"=>'#']])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include('helpers.steps')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


