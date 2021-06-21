@extends('layouts.admin')

@section('content')
    {{-- @include('helpers.breadcrumbs', ['title'=> "ADMINS", 'route' => ["Home"=> '/owner',"ADMIN LIST" => "#"]]) --}}
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5 mb-5"></div>
                <div class="col-md-12 col-sm-12 mt-5 mb-5">

                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <h4>Admins</h4>
                                      </div>
                                      <div class="col-md-6">
                                        <a class="btn btn-primary pull-right" href="{{ route('owner.admin.create')}}" role="button">
                                            Create Admin
                                        </a>
                                      </div>
                                    </div>
                                </div>

                                <div class="card-body mt-5">
                                    <table class="table table-hover">
                                        <thead class="thead">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">FIRST NAME</th>
                                            <th scope="col">LAST NAME</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">NEGATIVE TYPE</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $key=> $admin)

                                            <tr>
                                                <th scope="row">{{ (($admins->currentPage() - 1 ) * $admins->perPage() ) + $loop->iteration }}</th>
                                                <td>{{$admin->first_name}}</td>
                                                <td>{{$admin->last_name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td width="300">{{join(", ",  $admin->adminSpecifications->pluck('name')->all())}}</td>
                                                <td>
                                                    {{-- <a href="{{route('owner.admin.edit', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{route('owner.admin.changePassword', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-key"></i></a>
                                                    <a href="{{ route('owner.delete.admin',$admin['id']) }}"><button class="btn btn-danger" onclick="return confirm('Are You Sure?')" data-id="{{ $admin['id'] }}" ><i class="fa fa-trash-o"></i></button></a> --}}
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="dropdown show">
                                                      <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                      </a>

                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('owner.admin.edit', $admin['id'])}}"  data-id="{{ $admin['id'] }}" >Edit</a>
                                                        <a class="dropdown-item" href="{{route('owner.admin.changePassword', $admin['id'])}}"  data-id="{{ $admin['id'] }}">Change Password</a>
                                                        <a class="dropdown-item" href="{{ route('owner.delete.admin',$admin['id']) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $admin['id'] }}">Delete</a>
                                                      </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                      </tbody>
                                    </table>

                                </div>

                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="row pull-right">
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
