@extends('owner.layouts.app')

@section('body')
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Affiliates</li>
              </ol>
            </nav>
      </div>

    </div>


    <div class="row row-sm">
      <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0 mt-2">Affiliate List</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-2">List of all affiliate for your system

                </p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">FIRST NAME</th>
                          <th scope="col">LAST NAME</th>
                          <th scope="col">EMAIL</th>
{{--                                            <th scope="col">AFFILIATE FULL NAME </th>--}}

                          <th scope="col">Action</th>
                      </tr>
										</thead>
										<tbody>
                      @foreach($users as $key=> $user)

                          <tr>
                              <th scope="row">{{ $key+1 }}</th>
                              <td>{{$user->first_name}}</td>
                              <td>{{$user->last_name}}</td>
                              <td>{{$user->email}}</td>
{{--                                                <td>{{$user->full_name?? "-"}}</td>--}}
                              <td>
                                <div class="dropdown show">
                                  <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('owner.delete.client',$user->id) }}" onclick="return confirm('Are You Sure?')">Delete</a>
                                  </div>
                                </div>
                                  {{-- <a class="btn btn-secondary" href="{{ route('adminRec.client.profile',$user->id)}}"
                                     role="button"><i class="fa fa-file-text"></i></a> --}}

                                  <meta name="csrf-token" content="{{ csrf_token() }}">

                                  {{-- <a href="{{ route('owner.delete.client',$user->id) }}"><button class="btn btn-danger" onclick="return confirm('Are You Sure?')" data-id="{{ $user->id}}" ><i class="fa fa-trash"></i> </button></a> --}}

                                  {{--<a class="btn btn-primary" href="{{route('owner.destroy',$admin['id'])}}" data-method="delete" rel="nofollow" role="button">Delete</a>--}}

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

@section('js')
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
                              url: "/owner/client/" + id,
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

@endsection
