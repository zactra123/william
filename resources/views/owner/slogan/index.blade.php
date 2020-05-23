@extends('layouts.layout')

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "SLOGAN", 'route' => ["Home"=> '/owner',"SLOGAN LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="container mt-5 pt-5">
                            <div class="row justify-content-center ">
                                <div class="col-11">
                                    <div class="card">
                                        <div class="row mr-0 ml-0">
                                            <label class="dasd">Slogans</label>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Author</th>
                                                    <th scope="col">Slogan</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($slogans as $key=> $slogan)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td>{{$slogan->author}}</td>
                                                        <td>{{$slogan->slogan}}</td>
                                                        <td>
                                                            <button class="btn btn-danger delete" data-id="{{ $slogan->id }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$slogans->links()}}
                                        </div>

                                    </div>
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
                bootbox.confirm("Do you really want to delete record?", function (result) {
                    console.log(result);
                    if (result) {

                        $.ajax(
                            {
                                url: "/ owner/slogans/" + id,
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


