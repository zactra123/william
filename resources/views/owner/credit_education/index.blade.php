@extends('owner.layouts.app')
@section('title')
<title> Eductions </title>
@endsection
@section('body')
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Educations</li>
              </ol>
            </nav>
      </div>
    </div>
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row justify-content-center pt-2">
                                    <div class="col-11">
                                        <div class="card p-3">
                                          <div class="card-header mb-3">
                            								<div class="d-flex justify-content-between">
                            									<h4 class="card-title mg-b-0 mt-2">EDUCATIONS</h4>
                            									<i class="mdi mdi-dots-horizontal text-gray"></i>
                            								</div>
                            								<p class="tx-12 text-muted mb-2">List of all education
                                              <a href="{{route('owner.credit.education.create')}}"
                                               class="btn btn-primary btn-sm float-right">Add Education</a> </p>
                            							</div>
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th >#</th>
                                                    <th scope="col">url</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Sub Content</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contents as $key=> $content)
                                                    <tr>
                                                        <th scope="row">{{$content->id}}</th>
                                                        <td>{{$content->url}}</td>
                                                        <td>{{$content->title}}</td>
                                                        <td>{{ zactra::limit_words($content->sub_content,150) }}</td>
                                                        <td>
                                                            {{-- <a style="margin: 1px" href="{{route('owner.credit.education.show', $content->url)}}" class="btn btn-primary" role="button"><i class="fa fa-eye"></i></a>
                                                            <a  href="{{route('owner.credit.education.edit', $content->url)}}" class="btn btn-primary" role="button"><span class="fa fa-edit"></span></a>
                                                            <a href="{{ route('admin.delete.education',$content->id) }}"><button class="btn btn-danger delete2" onclick="return confirm('Are You Sure!')" data-id="{{ $content->url}}" ><span class="fa fa-trash"></span> </button></a> --}}

                                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                            <div class="dropdown show">
                                                              <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                              </a>
                                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{route('owner.credit.education.show', $content->url)}}">View</a>
                                                                <a class="dropdown-item" href="{{route('owner.credit.education.edit', $content->url)}}">Edit</a>
                                                                <a class="dropdown-item" href="{{ route('admin.delete.education',$content->id) }}" onclick="return confirm('Are You Sure?')">Delete</a>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-md-12 mt-3">
                                                <div class="row float-right">
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
            </div>
        </div>
    </section>


@endsection
@section('js')
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
