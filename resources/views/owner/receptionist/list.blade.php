@extends('layouts.owner')

@section('content')
    <div class="container">
        <div class="row justify-content-end m-2">
            <a class="btn btn-success" href="{{ route('owner.receptionist.create')}}" role="button">
                Create Receptionist
            </a>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <label class="header m-2">Receptionist List</label>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receptionists as $key=> $receptionist)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$receptionist['first_name']}}</td>
                                    <td>{{$receptionist['last_name']}}</td>
                                    <td>{{$receptionist['email']}}</td>
                                    <td>

                                        <a href="{{route('owner.receptionist.edit', $receptionist['id'])}}" class="btn btn-primary" data-id="{{ $receptionist['id'] }}" ><span class="fa fa-pencil"></span></a>

                                        <button class="btn btn-danger delete" data-id="{{ $receptionist['id'] }}" ><span class="fa fa-trash-o"></span></button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            url: "/owner/admin/" + id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function () {
                                console.log("it Works");
                                location.reload()
                            }
                        });
                }
            })

        })
    })


</script>