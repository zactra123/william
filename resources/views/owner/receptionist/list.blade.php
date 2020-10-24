@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"RECEPTIONIST LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">

                    <div class="row m-2  pt-4">
                        <div class="col-md-11 pull-right">
                            <a class="btn btn-primary pull-right" href="{{ route('owner.receptionist.create')}}" role="button">
                                Create
                            </a>
                        </div>
                    </div>
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">RECEPTIONISTS</label>
                                </div>

                                <div class="card-body mt-5">
                                    <table class="table table-hover">
                                        <thead class="thead thead-dark">
                                        <tr>
                                            <th class="col-md-1">#</th>
                                            <th class="col-md-2">FIRST NAME</th>
                                            <th class="col-md-2">LAST NAME</th>
                                            <th class="col-md-2">EMAIL</th>
                                            <th class="col-md-1">ACTION</th>
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
                                                    <a class="btn" href="{{route('owner.receptionist.edit', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}" >
                                                        <i class="fa fa-pencil"></i></a>

                                                    <button class="btn  delete" data-id="{{ $receptionist['id'] }}" >
                                                        <i class="fa fa-trash"></i></button>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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

