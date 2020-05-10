we@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <a href="{{ route('createInfo')}}"> Add Info </a>

            </div>
        </div>
    </div>
@endsection
