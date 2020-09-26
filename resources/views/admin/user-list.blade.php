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
                                            <th scope="col">FIRST NAME</th>
                                            <th scope="col">LAST NAME</th>
                                            <th scope="col">EMAIL</th>
{{--                                            <th scope="col">AFFILIATE FULL NAME </th>--}}

                                            <th scope="col">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key=> $user)

                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
{{--                                                <td>{{$user->full_name?? "-"}}</td>--}}
                                                <td>
                                                    <a href="{{route('admin.client.profile', $user->id)}}"
                                                       role="button"><span class="fa fa-file-text"></span></a>
                                                </td>
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
