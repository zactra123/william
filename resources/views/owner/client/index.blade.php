@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Client') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Clients') }}</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header pb-0">
				<div class="d-flex justify-content-between">
					<h4 class="card-title mg-b-0 mt-2">{{ zactra::translate_lang('Clients') }}</h4>
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
				<p class="tx-12 text-muted mb-2">{{ zactra::translate_lang('List of all clients for your system...') }}</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th scope="col">{{ zactra::translate_lang('#') }}</th>
								<th scope="col">{{ zactra::translate_lang('FIRST NAME') }}</th>
								<th scope="col">{{ zactra::translate_lang('LAST NAME') }}</th>
								<th scope="col">{{ zactra::translate_lang('EMAIL') }}</th>
								{{-- <th scope="col">{{ zactra::translate_lang('AFFILIATE FULL NAME') }}</th> --}}
								<th scope="col">{{ zactra::translate_lang('Action') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $key=> $user)
							<tr>
								<th scope="row">{{ $key+1 }}</th>
								<td>{{$user->first_name}}</td>
								<td>{{$user->last_name}}</td>
								<td>{{$user->email}}</td>
								{{-- <td>{{$user->full_name?? "-"}}</td> --}}
								<td>
									<div class="dropdown show">
										<a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											{{ zactra::translate_lang('Action') }}
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="{{ route('adminRec.client.profile',$user->id)}}">{{ zactra::translate_lang('View Profile') }}</a>
											<a class="dropdown-item" href="{{ route('owner.delete.client',$user->id) }}" onclick="return confirm('Are You Sure?')">{{ zactra::translate_lang('Delete') }}</a>
										</div>
									</div>
									<meta name="csrf-token" content="{{ csrf_token() }}" />
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
@endsection
@section('js')
<script>
	$(document).ready(function() {
		$(".delete").on("click", function(e) {
			e.preventDefault();
			var id = $(this).data("id");
			var token = $("meta[name='csrf-token']").attr("content");
			console.log("test");
			bootbox.confirm({
				title: "Destroy this client?",
				message: "Do you really want to delete record?",
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
				callback: function(result) {
					console.log("This was logged in the callback: " + result);
					if (result) {
						$.ajax({
							url: "/owner/client/" + id,
							type: "DELETE",
							data: {
								id: id,
								_token: token,
							},
							success: function() {
								location.reload();
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
