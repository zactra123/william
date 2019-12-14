@extends('layouts.owner')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <a href="{{ route('owner.admin.create')}}">Create Admin</a>

            </div>
        </div>

    </div>
@endsection
