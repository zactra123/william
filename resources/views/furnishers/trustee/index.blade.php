@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "TRUSTEE", 'route' => ["Home"=> '/owner',"TRUSTEE" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="row m-2  pt-4">
                        <div class="col-md-11 pull-right">
                            <a class="btn btn-primary pull-right" href="{{ route('admins.trustee.create')}}" role="button">
                                ADD TRUSTEE
                            </a>
                        </div>
                    </div>
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">

                                <div class="card-header">
                                    <label class="header m-2">TRUSTEE</label>
                                </div>

                                <div class="card-body mt-5">
                                    <table class="table table-hover">
                                        <thead class="thead thead-dark">
                                        <tr>
                                            <th class="col-md-1">#</th>
                                            <th class="col-md-2">NAME</th>
                                            <th class="col-md-2">CITY</th>
                                            <th class="col-md-2">EMAIL</th>
                                            <th class="col-md-2">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($trustee as $key=> $value)

                                            <tr>
                                                <th scope="row">{{ (($trustee->currentPage() - 1 ) * $trustee->perPage() ) + $loop->iteration }}</th>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->city}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>
                                                    <a href="{{route('admins.trustee.edit', $value['id'])}}"  data-id="{{ $value['id'] }}" ><i class="fa fa-pencil-square-o"></i></a>
                                                    <button class="btn delete" data-id="{{ $value['id'] }}" ><i class="fa fa-trash-o"></i></button>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $trustee->links() }}
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
                    title: "DESTROY  THIS TRUSTEE?",
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
                                url: "/admins/furnishers/trustee/" + id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function () {
                                    console.log("it Works");
                                    // location.reload()
                                }
                            });
                        }
                    }
                });


            })
        })


    </script>
@endsection




