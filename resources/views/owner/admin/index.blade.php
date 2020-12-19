@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-11 pull-right">
                            <a class="btn btn-primary pull-right" href="{{ route('owner.admin.create')}}" role="button">
                                Create Admin
                            </a>
                        </div>
                    </div>
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">ADMINS</label>
                                </div>

                                <div class="card-body mt-5">
                                    <table class="table table-hover">
                                        <thead class="thead thead-dark">
                                        <tr>
                                            <th class="col-md-1">#</th>
                                            <th class="col-md-2">FIRST NAME</th>
                                            <th class="col-md-2">LAST NAME</th>
                                            <th class="col-md-2">EMAIL</th>
                                            <th class="col-md-3">NEGATIVE TYPE</th>
                                            <th class="col-md-2">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $key=> $admin)

                                            <tr>
                                                <th scope="row">{{ (($admins->currentPage() - 1 ) * $admins->perPage() ) + $loop->iteration }}</th>
                                                <td>{{$admin->first_name}}</td>
                                                <td>{{$admin->last_name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{join(", ",  $admin->adminSpecifications->pluck('name')->all())}}</td>
                                                <td>
                                                    <a href="{{route('owner.admin.edit', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{route('owner.admin.changePassword', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-key"></i></a>
                                                    <button class="btn delete" data-id="{{ $admin['id'] }}" ><i class="fa fa-trash-o"></i></button>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $admins->links() }}
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $(".delete").on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                console.log("test");
                bootbox.confirm({
                    title: "Destroy  this admin?",
                    message: "Do you really want to delete record?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel',
                            className: 'btn-success'

                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Confirm',
                            className: 'btn-danger'

                        }
                    },
                    callback: function (result) {
                        console.log('This was logged in the callback: ' + result);
                        if (result) {

                            $.ajax({
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
                    }
                });


            })
        })


    </script>
@endsection




