@extends('layouts.admin')

@section('content')

    {{-- @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"RECEPTIONIST LIST" => "#"]]) --}}
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">

                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <div class="row">
                                      <div class="col-md-6">
                                          <h4>Receptionists</h4>
                                      </div>
                                      <div class="col-md-6 pull-right">
                                        <a class="btn btn-primary pull-right" href="{{ route('owner.receptionist.create')}}" role="button">
                                            Create Receptionist
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
                                            <th scope="col">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receptionists as $key=> $receptionist)

                                            <tr>
                                                <th scope="row">{{ (($receptionists->currentPage() - 1 ) * $receptionists->perPage() ) + $loop->iteration }}</th>
                                                <td>{{$receptionist->first_name}}</td>
                                                <td>{{$receptionist->last_name}}</td>
                                                <td>{{$receptionist->email}}</td>
                                                <td>
                                                    {{-- <a class="btn" href="{{route('owner.receptionist.edit', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}" >
                                                        <i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('owner.admin.changePassword', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}" ><i class="fa fa-key"></i></a>
                                                    <a href="{{ route('owner.delete.receptionist',$receptionist['id']) }}"><button class="btn" onclick="return confirm('Are You Sure?')" data-id="{{ $receptionist['id'] }}" >
                                                        <i class="fa fa-trash"></i></button></a> --}}
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                    <div class="dropdown show">
                                                      <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                      </a>

                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('owner.receptionist.edit', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}" >Edit</a>
                                                        <a class="dropdown-item" href="{{route('owner.admin.changePassword', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}">Change Password</a>
                                                        <a class="dropdown-item" href="{{ route('owner.delete.receptionist',$receptionist['id']) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $receptionist['id'] }}">Delete</a>
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
                                  {{ $receptionists->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

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



@endsection
