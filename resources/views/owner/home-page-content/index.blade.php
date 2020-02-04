@extends('layouts.owner')

@section('content')
    <div class="container">

        <div class="page-content">
        <div class="row justify-content-center pt-2">
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
                                   role="button"><span class="fa fa-file-o"></span></a>
                                <a class="btn btn-default" href="{{route('owner.home.content.edit', $content->url)}}"
                                   role="button"><span class="fa fa-pencil"></span></a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <button class="btn btn-danger " data-id="{{ $content->url}}" ><span class="fa fa-trash-o"></span> </button>

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
