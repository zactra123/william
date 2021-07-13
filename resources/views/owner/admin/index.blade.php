@extends('owner.layouts.app')

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
									<h4 class="card-title mg-b-0 mt-2">Admins</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 text-muted mb-2">List of all admins for your system
                  <a href="{{ route('owner.admin.create')}}"
                   class="btn btn-primary btn-sm float-right">Create  New Admin</a> </p>
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
                          <th scope="col">NEGATIVE TYPE</th>
                          <th scope="col">ACTION</th>
                      </tr>
										</thead>
										<tbody>
                      @foreach($admins as $key=> $admin)

                          <tr>
                              <th scope="row">{{ (($admins->currentPage() - 1 ) * $admins->perPage() ) + $loop->iteration }}</th>
                              <td>{{$admin->first_name}}</td>
                              <td>{{$admin->last_name}}</td>
                              <td>{{$admin->email}}</td>
                              <td >{{join(", ",  $admin->adminSpecifications->pluck('name')->all())}}</td>
                              <td>
                                  {{-- <a href="{{route('owner.admin.edit', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-pencil-square-o"></i></a>
                                  <a href="{{route('owner.admin.changePassword', $admin['id'])}}"  data-id="{{ $admin['id'] }}" ><i class="fa fa-key"></i></a>
                                  <a href="{{ route('owner.delete.admin',$admin['id']) }}"><button class="btn btn-danger" onclick="return confirm('Are You Sure?')" data-id="{{ $admin['id'] }}" ><i class="fa fa-trash-o"></i></button></a> --}}
                                  <meta name="csrf-token" content="{{ csrf_token() }}">
                                  <div class="dropdown show">
                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <a class="dropdown-item" href="{{route('owner.admin.edit', $admin['id'])}}"  data-id="{{ $admin['id'] }}" >Edit</a>
                                      <a class="dropdown-item" href="{{route('owner.admin.changePassword', $admin['id'])}}"  data-id="{{ $admin['id'] }}">Change Password</a>
                                      <a class="dropdown-item" href="{{ route('owner.delete.admin',$admin['id']) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $admin['id'] }}">Delete</a>
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
                      {{ $admins->links() }}
                    </div>
                </div>

							</div>
						</div>
					</div>
    </div>


    <script>
        $(document).ready(function () {
            $(".delete").on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                console.log("test");
                bootbox.confirm({
                    title: "Destroy  this admin?",
                    message: "Do you really want to delete record?",
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

                            $.ajax({
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
                    }
                });


            })
        })


    </script>
@endsection
