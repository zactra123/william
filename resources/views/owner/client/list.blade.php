@extends('layouts.owner')

@section('content')
    <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-11">
                <div class="card">

                    <div class="card-header">
                        <label class="header m-2">CLIENT LIST</label>
                    </div>
                    <div class="card-body">
                      <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">AFFILIATE FULL NAME </th>

                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=> $user)

                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->full_name?? "-"}}</td>
                                        <td>

                                            <a class="btn btn-secondary" href="{{ route('owner.client.show',$user->id)}}"
                                               role="button"><span class="fa fa-file"></span></a>

                                            <meta name="csrf-token" content="{{ csrf_token() }}">

                                            <button class="btn btn-danger delete" data-id="{{ $user->id}}" ><span class="fa fa-trash-o"></span> </button>



                                            {{--<a class="btn btn-primary" href="{{route('owner.destroy',$admin['id'])}}" data-method="delete" rel="nofollow" role="button">Delete</a>--}}

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                    </div>

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
