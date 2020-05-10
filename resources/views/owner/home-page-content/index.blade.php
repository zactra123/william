@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "CREDIT EDUCATION", 'route' => ["Home"=> '/owner',"CREDIT EDUCATION LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="container mt-5 pt-5">
                                <div class="row justify-content-center pt-2">
                                    <div class="col-11">
                                        <div class="card ">
                                            <div class="row m-0 p-2">
                                                <a class="btn btn-success" href="{{route('owner.home.content.create')}}" role="button">Crete Content</a>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">category</th>
                                                    <th scope="col">url</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Sub Content</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contents as $key=> $content)
                                                    <tr>
                                                        <th scope="row">{{$content->id}}</th>
                                                        <td>{{$content->category}}</td>
                                                        <td>{{$content->url}}</td>
                                                        <td>{{$content->title}}</td>
                                                        <td><?php echo htmlspecialchars_decode(htmlspecialchars($content->sub_content, ENT_QUOTES));  ?></td>
                                                        <td>

                                                            <a class="btn btn-default" href="{{route('owner.home.content.show', $content->url)}}"
                                                               role="button"><i class="fa fa-file-text"></i></a>
                                                            <a class="btn btn-default" href="{{route('owner.home.content.edit', $content->url)}}"
                                                               role="button"><span class="fa fa-pencil"></span></a>
                                                            <meta name="csrf-token" content="{{ csrf_token() }}">

                                                            <button class="btn btn-danger " data-id="{{ $content->url}}" ><span class="fa fa-trash"></span> </button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $contents->links() }}
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
                                url: "delete/home-page-content/" + id,
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
@endsection


