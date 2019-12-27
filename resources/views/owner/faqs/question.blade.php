@extends('layouts.owner')

@section('content')
    <div class="page content mr-0 ml-0">
        <div class="row mr-0 ml-0">
            <label class="dasd">FAQs QUESTION</label>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Question</th>
                    <th scope="col">Action</th>
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
                            <button class="btn btn-primary delete" data-id="{{ $question->id }}" >Delete </button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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