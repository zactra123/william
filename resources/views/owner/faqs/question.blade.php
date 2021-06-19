@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "FAQ", 'route' => ["Home"=> '/owner',"QUESTION" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="row mr-0 ml-0">
                                <label class="dasd">FAQs QUESTION</label>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">EMAI</th>
                                        <th scope="col">QUESTION</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $key=> $question)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$question->name}}</td>
                                            <td>{{$question->email}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="{{ route('admin.delete.question',$question->id) }}"><button class="btn btn-primary delete2" onclick="return confirm('Are You Sure!')" data-id="{{ $question->id }}" >Delete </button></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$questions->links()}}
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
                                url: "/owner/faqs/question/delete/" + id,
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
