@extends('layouts.owner')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <label class="dasd">Users List</label>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=> $user)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$user['first_name']}}</td>
                            <td>{{$user['last_name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>

                                <a class="btn btn-secondary" href="{{ route('owner.client.show',$user['id'])}}"
                                   role="button">View</a>

                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <button class="btn btn-primary delete" data-id="{{ $user['id'] }}" >Delete </button>



                                {{--<a class="btn btn-primary" href="{{route('owner.destroy',$admin['id'])}}" data-method="delete" rel="nofollow" role="button">Delete</a>--}}

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".delete").on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                console.log("test");
                bootbox.confirm("Do you really want to delete record?", function (result) {
                   console.log(result);
                    if (result) {

                        $.ajax(
                            {
                                url: "/owner/client/" + id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function () {
                                    console.log("it Works");
                                }
                            });
                    }
                })

            })
        })


    </script>
