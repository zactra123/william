@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Eductions') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Educations') }}</li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container mmap-0">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12 mmap-0">
        <div class="ms-ua-box">
          <div class="col-md-12 col-sm-12 col-12 mmap-0">
            <div class="container">
              <div class="row justify-content-center pt-2">
                <div class="col-12 col-md-12 col-sm-12 mmap-0">
                  <div class="card p-3">
                    <div class="card-header mb-3">
                      <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">{{ zactra::translate_lang('EDUCATIONS') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                      </div>
                      <p class="tx-12 text-muted mb-2">{{ zactra::translate_lang('List of all education') }} <a href="{{route('owner.credit.education.create')}}" class="btn btn-primary btn-sm float-right">{{ zactra::translate_lang('Add Education') }}</a></p>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>{{ zactra::translate_lang('#') }}</th>
                            <th scope="col">{{ zactra::translate_lang('Url') }}</th>
                            <th scope="col">{{ zactra::translate_lang('Title') }}</th>
                            <th scope="col">{{ zactra::translate_lang('Sub Content') }}</th>
                            <th scope="col">{{ zactra::translate_lang('Action') }}</th>
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
                              <meta name="csrf-token" content="{{ csrf_token() }}" />
                              <div class="dropdown show">
                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ zactra::translate_lang('Action') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="{{route('owner.credit.education.show', $content->url)}}">{{ zactra::translate_lang('View') }}</a>
                                  <a class="dropdown-item" href="{{route('owner.credit.education.edit', $content->url)}}">{{ zactra::translate_lang('Edit') }}</a>
                                  <a class="dropdown-item" href="{{ route('admin.delete.education',$content->id) }}" onclick="return confirm('Are You Sure?')">{{ zactra::translate_lang('Delete') }}</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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
    $(".delete").on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      bootbox.confirm({
        title: "Destroy  this Credit Education?",
        message: "Do you really want to delete this record?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Cancel',
            className: "btn-success",
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Confirm',
            className: "btn-danger",
          },
        },
        callback: function (result) {
          console.log("This was logged in the callback: " + result);
          if (result) {
            $.ajax({
              url: "credit-education/" + id,
              type: "DELETE",
              data: {
                id: id,
                _token: token,
              },
              success: function () {
                console.log("it Works");
              },
            });
          }
        },
      });
    });
  });
</script>
@endsection
