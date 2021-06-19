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

                                            <div class="row m-2  pt-4">
                                                <div class="col-md-11 pull-right">
                                                    <a class="btn btn-primary pull-right" href="{{route('owner.credit.education.create')}}" role="button">
                                                        Add Education
                                                    </a>
                                                </div>

                                            </div>

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th >#</th>
                                                    <th class="col-lg-2">url</th>
                                                    <th class="col-lg-2">Title</th>
                                                    <th class="col-lg-7">Sub Content</th>
                                                    <th class="col-lg-1">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contents as $key=> $content)
                                                    <tr>
                                                        <th scope="row">{{$content->id}}</th>
                                                        <td>{{$content->url}}</td>
                                                        <td>{{$content->title}}</td>
                                                        <td><?php echo htmlspecialchars_decode(htmlspecialchars($content->sub_content, ENT_QUOTES));  ?></td>
                                                        <td>

                                                            <a style="margin: 1px" href="{{route('owner.credit.education.show', $content->url)}}"
                                                               role="button"><i class="fa fa-file-text"></i></a>
                                                            <a  href="{{route('owner.credit.education.edit', $content->url)}}"
                                                               role="button"><span class="fa fa-pencil"></span></a>
                                                            <meta name="csrf-token" content="{{ csrf_token() }}">

                                                            <a href="{{ route('admin.delete.education',$content->id) }}"><button class="btn btn-danger delete2" onclick="return confirm('Are You Sure!')" data-id="{{ $content->url}}" ><span class="fa fa-trash"></span> </button></a>

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
                bootbox.confirm({
                    title: "Destroy  this Credit Education?",
                    message: "Do you really want to delete this record?",
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

                            $.ajax(
                                {
                                    url: "credit-education/" + id,
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
                    }
                });

            })
        })

    </script>
@endsection
