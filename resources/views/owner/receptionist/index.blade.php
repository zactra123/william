@extends('owner.layouts.app')
@section('title')
<title>Receptionist</title>
@endsection
@section('body')
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admins</li>
              </ol>
            </nav>
      </div>

    </div>

    <div class="row row-sm">
      <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0 mt-2">Receptionists</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-2">List of all receptionists for your system
                  <a class="btn btn-primary btn-sm float-right" href="{{ route('owner.receptionist.create')}}" role="button">
                      Create Receptionist
                  </a>
                </p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover text-md-nowrap" id="example1">
										<thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">FIRST NAME</th>
                          <th scope="col">LAST NAME</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">ACTION</th>
                      </tr>
										</thead>
										<tbody>
                      @foreach($receptionists as $key => $receptionist)

                          <tr>
                              <th scope="row">{{ $key+1 }}</th>
                              <td>{{$receptionist->first_name}}</td>
                              <td>{{$receptionist->last_name}}</td>
                              <td>{{$receptionist->email}}</td>
                              <td>

                                  <meta name="csrf-token" content="{{ csrf_token() }}">

                                  <div class="dropdown show">
                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <a class="dropdown-item" href="{{route('owner.receptionist.edit', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}" >Edit</a>
                                      <a class="dropdown-item" href="{{route('owner.admin.changePassword', $receptionist['id'])}}"  data-id="{{ $receptionist['id'] }}">Change Password</a>
                                      <a class="dropdown-item" href="{{ route('owner.delete.receptionist',$receptionist['id']) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $receptionist['id'] }}">Delete</a>
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
                        {{ $receptionists->links() }}
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
                              url: "/owner/admin/" + id,
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
