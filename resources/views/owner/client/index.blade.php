@extends('layouts.admin')

@section('content')

    {{-- @include('helpers.breadcrumbs', ['title'=> "CLIENTS", 'route' => ["Home"=> '/owner',"CLIENTS LIST" => "#"]]) --}}
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <h4>Client List</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table mt-5">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">FIRST NAME</th>
                                            <th scope="col">LAST NAME</th>
                                            <th scope="col">EMAIL</th>
{{--                                            <th scope="col">AFFILIATE FULL NAME </th>--}}

                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key=> $user)

                                            <tr>
                                                <th scope="row">{{ $key+1 }}</th>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
{{--                                                <td>{{$user->full_name?? "-"}}</td>--}}
                                                <td>
                                                  <div class="dropdown show">
                                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                      <a class="dropdown-item" href="{{ route('adminRec.client.profile',$user->id)}}">View Profile</a>
                                                      <a class="dropdown-item" href="{{ route('owner.delete.client',$user->id) }}" onclick="return confirm('Are You Sure?')">Delete</a>
                                                    </div>
                                                  </div>
                                                    {{-- <a class="btn btn-secondary" href="{{ route('adminRec.client.profile',$user->id)}}"
                                                       role="button"><i class="fa fa-file-text"></i></a> --}}

                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                    {{-- <a href="{{ route('owner.delete.client',$user->id) }}"><button class="btn btn-danger" onclick="return confirm('Are You Sure?')" data-id="{{ $user->id}}" ><i class="fa fa-trash"></i> </button></a> --}}

                                                    {{--<a class="btn btn-primary" href="{{route('owner.destroy',$admin['id'])}}" data-method="delete" rel="nofollow" role="button">Delete</a>--}}

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="row pull-right">
                                  {{ $users->links() }}
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
                    title: "Destroy this client?",
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

                            $.ajax(
                                {
                                    url: "/owner/client/" + id,
                                    type: 'DELETE',
                                    data: {
                                        "id": id,
                                        "_token": token,
                                    },
                                    success: function () {
                                        location.reload();
                                        console.log("it Works");
                                    }
                            });
                        }
                    }
                });

            })
        })


    </script>

@endsection
