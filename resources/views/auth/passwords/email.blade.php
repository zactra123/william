@extends('layouts.layout1')

@section('content')
    <section class="register">
        <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background">
        <div class="register-form" data-id="1">
            <h3 class="title">Reset Password</h3>
            <form method="POST" action="{{ route('password.email') }}" >
                @csrf
                <input type="email" name="email" placeholder="Client E-Mail">
                <div class="basic-button">
                    <input class="login" type="submit" value="Reset" name="">
                </div>
            </form>
        </div>

        @include('helpers.chat')
    </section>
@endsection

