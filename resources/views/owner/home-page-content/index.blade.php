@extends('layouts.owner')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a class="btn btn-success" href="{{route('owner.home.content.create')}}" role="button">Crete Content</a>
        </div>
        <div class="row">
        <div class="row justify-content-center">

                <label class="dasd">Users List</label>
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

                                <a class="btn btn-secondary" href="{{route('owner.home.content.show', $content->url)}}"
                                   role="button">View</a>
                                <a class="btn btn-outline-success" href="{{route('owner.home.content.edit', $content->url)}}"
                                   role="button">Edit</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <button class="btn btn-primary delete" data-id="{{ $content->url}}" >Delete </button>

                            </td>
                        </tr>
                    @endforeach
                    {{ $contents->links() }}


                    </tbody>
                </table>
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
