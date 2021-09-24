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
				<li class="breadcrumb-item active" aria-current="page">Settings</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row row-sm" data-select2-id="12">
	<!-- Col -->
	<div class="col-lg-4">
		<div class="card mg-b-20">
			<div class="card-body">
				<div class="pl-0">
					<div class="main-profile-overview">
						<div class="main-img-user profile-user">
							@if (isset(Auth::user()->photo))
							<img src="{{ Auth::user()->photo }}" alt="Profile Image">
							@else
							<img alt="" src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg">
							@endif
							<a href="JavaScript:void(0);" onclick="getClickToFile('.profileimg')" class="fas fa-camera profile-edit"></a></div>
						<div class="d-flex justify-content-between mg-b-20">
							<div>
								<h5 class="main-profile-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
								<p class="main-profile-name-text">{{ ucfirst(Auth::user()->role) }}</p>
							</div>
						</div>
						<h6>Bio</h6>
						<div class="main-profile-bio">
							{{ zactra::limit_words(Auth::user()->bio,150) }} <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter">More</a>
						</div>

						<!-- main-profile-bio -->
						{{-- <div class="main-profile-work-list">
											<div class="media">
												<div class="media-logo bg-success-transparent text-success">
													<i class="icon ion-logo-whatsapp"></i>
												</div>
												<div class="media-body">
													<h6>Web Designer at <a href="#">Spruko</a></h6><span>2018 - present</span>
													<p>Past Work: Spruko, Inc.</p>
												</div>
											</div>
											<div class="media">
												<div class="media-logo bg-primary-transparent text-primary">
													<i class="icon ion-logo-buffer"></i>
												</div>
												<div class="media-body">
													<h6>Studied at <a href="#">University</a></h6><span>2004-2008</span>
													<p>Graduation: Bachelor of Science in Computer Science</p>
												</div>
											</div>
										</div> --}}
						<!-- main-profile-work-list -->

						<hr class="mg-y-30">
						<label class="main-content-label tx-13 mg-b-20">Social</label>
						<div class="main-profile-social-list">

							<div class="media">
								<div class="media-icon bg-success-transparent text-success">
									<i class="icon ion-logo-twitter"></i>
								</div>
								<div class="media-body">
									<span>Twitter</span> <a href="{{ Auth::user()->twitter }}">{{ Auth::user()->twitter }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-info-transparent text-info">
									<i class="icon ion-logo-linkedin"></i>
								</div>
								<div class="media-body">
									<span>Linkedin</span> <a href="{{ Auth::user()->linkedin }}">{{ Auth::user()->linkedin }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-danger-transparent text-danger">
									<i class="icon ion-logo-googleplus"></i>
								</div>
								<div class="media-body">
									<span>Google+</span> <a href="{{ Auth::user()->googleplus }}">{{ Auth::user()->googleplus }}</a>
								</div>
							</div>
						</div><!-- main-profile-social-list -->
					</div><!-- main-profile-overview -->
				</div>
			</div>
		</div>
		<div class="card mg-b-20">
			<div class="card-body">
				<div class="main-content-label tx-13 mg-b-25">
					Conatct
				</div>
				<div class="main-profile-contact-list">
					<div class="media">
						<div class="media-icon bg-primary-transparent text-primary">
							<i class="icon ion-md-phone-portrait"></i>
						</div>
						<div class="media-body">
							<span>Mobile</span>
							<div>
								{{ Auth::user()->phone }}
							</div>
						</div>
					</div>

					<div class="media">
						<div class="media-icon bg-info-transparent text-info">
							<i class="icon ion-md-locate"></i>
						</div>
						<div class="media-body">
							<span>Current Address</span>
							<div>
								{{ Auth::user()->address }}
							</div>
						</div>
					</div>
				</div><!-- main-profile-contact-list -->
			</div>
		</div>
	</div>
	<!-- /Col -->
	<!-- Col -->
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">Personal Information</div>
				<form action="{{ route('update.owner.setting') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-4 main-content-label">Name</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">First Name</label>
							</div>
							<div class="col-md-9">
								<input type="file" class="profileimg" name="photo" value="" style="display:none !important;">
								<input type="text" class="form-control" name="fisrt_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Last Name</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
							</div>
						</div>
					</div>

					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Designation</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ ucfirst(Auth::user()->role) }}" readonly>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Bio</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="bio" rows="4" placeholder="Bio">{{ Auth::user()->bio }}</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">Contact Info</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Email<i>(required)</i></label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Phone</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{ Auth::user()->phone }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Address</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="address" rows="2" placeholder="Address">{{ Auth::user()->address }}</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">Social Info</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Twitter</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ Auth::user()->twitter }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Facebook</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ Auth::user()->facebook }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Google+</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="googleplus" class="form-control" placeholder="Google Plus" value="{{ Auth::user()->googleplus }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Linked in</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="linkedin" placeholder="Linkedin" value="{{ Auth::user()->linkedin }}">
							</div>
						</div>
					</div>

			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update Profile</button>
			</div>
			</form>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">Change Password</div>
				<form class="form-horizontal" action="{{ route('update.owner.password') }}" method="post">
					@csrf
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Old Password</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="oldpassword" placeholder="Old Password" value="" required>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">New Password</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="newpassword" placeholder="New Password" value="" required>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Confrim Password</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="confirmpassword" placeholder="Confrim Password" value="" required>
							</div>
						</div>
					</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update Password</button>
			</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
	</div>
	<!-- /Col -->
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{{ Auth::user()->bio }}
			</div>

		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	function getClickToFile(file) {
		$(file).get(0).click();
	}
</script>
@endsection
