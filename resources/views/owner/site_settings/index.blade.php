@extends('owner.layouts.app')
@section('title')
<title>Settings</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
      <h4 class="content-title mb-2">Hi, welcome back!</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">Slider Settings</div>
				<form action="{{ route('update.owner.setting') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-4 main-content-label">First Slider</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Image</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="first_name" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Link">
							</div>
						</div>
					</div>

          <div class="mb-4 main-content-label">Second Slider</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Image</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="first_name" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Link">
							</div>
						</div>
					</div>

          <div class="mb-4 main-content-label">Third Slider</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Image</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="first_name" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" value="" placeholder="Button Link">
							</div>
						</div>
					</div>

			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update Slider</button>
			</div>
			</form>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">Footer</div>
				<form class="form-horizontal" action="{{ route('update.owner.password') }}" method="post">
					@csrf
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Address</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="" placeholder="Address" value="">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Phone</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="" placeholder="Phone" value="">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Email</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="" placeholder="Email" value="">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Twitter Link</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="confirmpassword" placeholder="Twitter Link" value="">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Facebook Link</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="confirmpassword" placeholder="Facebook Link" value="">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Instagram Link</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="confirmpassword" placeholder="Instagram Link" value="">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Skype Link</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="confirmpassword" placeholder="Skype Link" value="">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Linkedin Link</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="confirmpassword" placeholder="Linkedin Link" value="">
							</div>
						</div>
					</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update Footer</button>
			</div>
			</form>
		</div>
	</div>


@endsection
