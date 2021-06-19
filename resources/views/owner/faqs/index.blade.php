@extends('layouts.layout')

@section('content')

    @include('helpers.breadcrumbs', ['title'=> "FAQ", 'route' => ["Home"=> '/owner',"FAQs LIST" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="row mr-0 ml-0">
                                    <label class="dasd">FAQs</label>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="col-lg-2">Title</th>
                                            <th class="col-lg-8">Question</th>
                                            <th class="col-lg-2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($faqs as $key=> $faq)
                                            <tr>
                                                <th scope="row">{{ (($faqs->currentPage() - 1 ) * $faqs->perPage() ) + $loop->iteration }}</th>
                                                <td>{{$faq->title}}</td>
                                                <td>{{$faq->description}}</td>
                                                <td>

                                                    <a class="btn btn-secondary" href="{{ route('owner.faqs.edit',$faq->id)}}"
                                                       role="button"><span class="fa fa-pencil"></span></a>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <a href="{{ route('admin.delete.faq',$faq->id) }}"><button class="btn btn-danger delete2" onclick="return confirm('Are You Sure!')" data-id="{{ $faq->id }}"><span class="fa fa-trash-o"></span> </button></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$faqs->links()}}
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
                                    url: "/owner/faqs/" + id,
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
