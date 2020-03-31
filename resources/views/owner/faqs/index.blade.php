@extends('layouts.owner')

@section('content')
        <div class="container mt-5 pt-5">

            <div class="row justify-content-center ">
                <div class="col-11">
                    <div class="card">
                        <div class="row mr-0 ml-0">
                            <label class="dasd">FAQs</label>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faqs as $key=> $faq)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$faq->title}}</td>
                                        <td>{{$faq->description}}</td>
                                        <td>

                                            <a class="btn btn-secondary" href="{{ route('owner.faqs.edit',$faq->id)}}"
                                               role="button"><span class="fa fa-pencil"></span></a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <button class="btn btn-danger delete" data-id="{{ $faq->id }}"><span class="fa fa-trash-o"></span> </button>

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
                            url: "/ owner/faqs/" + id,
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
