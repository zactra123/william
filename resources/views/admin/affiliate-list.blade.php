@extends('layouts.admin')

@section('content')

    <div class= "row justify-content-center mt-5 pt-5">
            <div class="col-md-11 pt-2">
                <div class="card">

                    <div class="card-header">
                        <label class="header m-2">Affiliates List</label>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Client Number</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=> $user)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->client}}</td>
                                    <td>

                                        <a class="btn btn-secondary" href="#"
                                           role="button"><span class="fa fa-file"></span></a>

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

@endsection
