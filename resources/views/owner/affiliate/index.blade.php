@extends('layouts.admin')

@section('content')

    {{-- @include('helpers.breadcrumbs', ['title'=> "AFFILIATES", 'route' => ["Home"=> '/owner',"AFFILIATES LIST" => "#"]]) --}}
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-5"></div>
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">Affiliate List</label>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">FIRST NAME</th>
                                            <th scope="col">LAST NAME</th>
                                            <th scope="col">EMAI</th>
                                            <th scope="col">CLIENT NUMBER</th>
                                            <th scope="col">ACTIONS</th>
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
{{--                                                    <a class="btn btn-secondary" href="{{ route('owner.affiliate.show',$user->id)}}"--}}
{{--                                                       role="button"><span class="fa fa-file"></span></a>--}}

                                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                                    <button class="btn btn-danger delete" data-id="{{$user->id}}" ><span class="fa fa-trash-o"></span> </button>

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
                </div>
            </div>
        </div>
    </section>


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
