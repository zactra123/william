@extends('layouts.layout')




@section('content')

    @include('helpers.breadcrumbs', ['title'=> "Verify Email", 'route' => ["Home"=> '#', "Verify Email"=> "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        @include('helpers.steps')
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif


                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            Before you proceed, check your email for verification. If no verification email received,
                            please click <button type="submit" value="here" class="btn btn-link p-0 m-0 align-baseline">here</button>to re-request the link.
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
