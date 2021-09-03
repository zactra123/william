@extends('owner.layouts.app')
@section('title')
<title>Affiliates</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Affiliates List</li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container mmap-0">
    <div class="row">
      <div class="col-md-3 col-sm-12"></div>
      <div class="col-md-12 col-sm-12 col-12 mmap-0">
        <div class="ms-ua-box">
          <div class="col-md-11">
            <div class="card">
              <div class="card-header">
                <label class="header m-2">AFFILIATE LIST</label>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">FULL NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CLIENTS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $key=> $user)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>
                          <a href="{{route('adminRec.affiliate.profile', $user->id)}}" role="button">
                            {{$user->first_name}} {{$user->last_name}}
                          </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td class="text-center">{{$user->client}}</td>
                        <td>
                          {{-- <a class="btn btn-secondary" href="{{ route('owner.affiliate.show',$user->id)}}" role="button"><span class="fa fa-file"></span></a> --}} {{--
                          <a class="btn btn-primary" href="{{route('owner.destroy',$admin['id'])}}" data-method="delete" rel="nofollow" role="button">Delete</a>--}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <div class="row float-right">
                  {{ $users->links() }}
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

<script>
  $(document).ready(function () {
    $(".delete").on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      console.log("test");
      bootbox.confirm("Do you really want to delete record?", function (result) {
        console.log(result);
        if (result) {
          $.ajax({
            url: "/owner/client/" + id,
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
      });
    });
  });
</script>

@endsection
