@extends('layouts.owner')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <a href="{{ route('owner.create')}}"> Create Admin </a>

            </div>
        </div>
        <div class="row">
            <label class="dasd">Admins</label>
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
                @foreach($admins as $key=> $admin)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$admin['first_name']}}</td>
                        <td>{{$admin['last_name']}}</td>
                        <td>{{$admin['email']}}</td>
                        <td>
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <button class="btn btn-primary delete" data-id="{{ $admin['id'] }}" >Delete Admin</button>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
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
                            }
                        });
                }
            })

        })
    })


</script>
