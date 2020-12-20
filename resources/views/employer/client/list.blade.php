@extends('layouts.layout')

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "CLIENTS", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">USER LIST</label>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">FULL NAME</th>
                                            <th scope="col">AFFILIATE NAME</th>
                                            <th scope="col">EMAIL</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key=> $user)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>
                                                    <a href="{{route('adminRec.client.profile', $user->id)}}" role="button">
                                                    {{$user->full_name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$user->affiliate_name??'-'}}
                                                </td>
                                                <td>{{$user->email}}</td>
{{--                                                <td>{{$user->full_name?? "-"}}</td>--}}

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->links() }}

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
