@extends('owner.layouts.app')
@section('title')
<title>Slogans</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Slogans</li>
            </ol>
          </nav>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-md-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Slogans
            </div>
            <p class="mg-b-20">See list of slogans here...</p>
            <div class="card-body">
              <table class="table">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Author</th>
                      <th scope="col">Slogan</th>
                      <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($slogans as $key=> $slogan)
                      <tr>
                          <th scope="row">{{ (($slogans->currentPage() - 1 ) * $slogans->perPage() ) + $loop->iteration }}</th>
                          <td>{{$slogan->author}}</td>
                          <td>{{$slogan->slogan}}</td>
                          <td>
                            <div class="dropdown show">
                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('admin.slogan.delete',$slogan->id) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $slogan->id }}">Delete</a>
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
                    {{$slogans->links()}}
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
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
                              url: "/ owner/slogans/" + id,
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
