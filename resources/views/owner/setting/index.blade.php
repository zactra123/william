@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Settings') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Settings') }}</li>
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
						<h6>{{ zactra::translate_lang('Bio') }}</h6>
						<div class="main-profile-bio">
							{{ zactra::limit_words(Auth::user()->bio,150) }} <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter">{{ zactra::translate_lang('More') }}</a>
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
						<label class="main-content-label tx-13 mg-b-20">{{ zactra::translate_lang('Social') }}</label>
						<div class="main-profile-social-list">

							<div class="media">
								<div class="media-icon bg-success-transparent text-success">
									<i class="icon ion-logo-twitter"></i>
								</div>
								<div class="media-body">
									<span>{{ zactra::translate_lang('Twitter') }}</span> <a href="{{ Auth::user()->twitter }}">{{ Auth::user()->twitter }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-info-transparent text-info">
									<i class="icon ion-logo-linkedin"></i>
								</div>
								<div class="media-body">
									<span>{{ zactra::translate_lang('Linkedin') }}</span> <a href="{{ Auth::user()->linkedin }}">{{ Auth::user()->linkedin }}</a>
								</div>
							</div>
							<div class="media">
								<div class="media-icon bg-danger-transparent text-danger">
									<i class="icon ion-logo-googleplus"></i>
								</div>
								<div class="media-body">
									<span>{{ zactra::translate_lang('Google+') }}</span> <a href="{{ Auth::user()->googleplus }}">{{ Auth::user()->googleplus }}</a>
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
					{{ zactra::translate_lang('Conatct') }}
				</div>
				<div class="main-profile-contact-list">
					<div class="media">
						<div class="media-icon bg-primary-transparent text-primary">
							<i class="icon ion-md-phone-portrait"></i>
						</div>
						<div class="media-body">
							<span>{{ zactra::translate_lang('Mobile') }}</span>
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
							<span>{{ zactra::translate_lang('Current Address') }}</span>
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
				<div class="mb-4 main-content-label">{{ zactra::translate_lang('Personal Information') }}</div>
				<form action="{{ route('update.owner.setting') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-4 main-content-label">{{ zactra::translate_lang('Name') }}</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('First Name') }}</label>
							</div>
							<div class="col-md-9">
								<input type="file" class="profileimg" name="photo" value="" style="display:none !important;">
								<input type="text" class="form-control" name="fisrt_name" placeholder="{{ zactra::translate_lang('First Name') }}" value="{{ Auth::user()->first_name }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Last Name</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="last_name" placeholder="{{ zactra::translate_lang('Last Name') }}" value="{{ Auth::user()->last_name }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Designation') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="designation" placeholder="{{ zactra::translate_lang('Designation') }}" value="{{ ucfirst(Auth::user()->role) }}" readonly>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Bio') }}</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="bio" rows="4" placeholder="{{ zactra::translate_lang('Bio') }}">{{ Auth::user()->bio }}</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">{{ zactra::translate_lang('Contact Info') }}</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Email') }}<i>({{ zactra::translate_lang('required') }})</i></label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="email" placeholder="{{ zactra::translate_lang('Email') }}" value="{{ Auth::user()->email }}" readonly>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Phone') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="phone" placeholder="{{ zactra::translate_lang('Phone number') }}" value="{{ Auth::user()->phone }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Address') }}</label>
							</div>
							<div class="col-md-9">
								<textarea class="form-control" name="address" rows="2" placeholder="{{ zactra::translate_lang('Address') }}">{{ Auth::user()->address }}</textarea>
							</div>
						</div>
					</div>
					<div class="mb-4 main-content-label">{{ zactra::translate_lang('Social Info') }}</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Twitter') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="twitter" class="form-control" placeholder="{{ zactra::translate_lang('Twitter') }}" value="{{ Auth::user()->twitter }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Facebook') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="facebook" class="form-control" placeholder="{{ zactra::translate_lang('Facebook') }}" value="{{ Auth::user()->facebook }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Google+') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="googleplus" class="form-control" placeholder="{{ zactra::translate_lang('Google Plus') }}" value="{{ Auth::user()->googleplus }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Linked in') }}</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="linkedin" placeholder="{{ zactra::translate_lang('Linkedin') }}" value="{{ Auth::user()->linkedin }}">
							</div>
						</div>
					</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">{{ zactra::translate_lang('Update Profile') }}</button>
			</div>
			</form>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="mb-4 main-content-label">{{ zactra::translate_lang('Change Password') }}</div>
				<form class="form-horizontal" action="{{ route('update.owner.password') }}" method="post">
					@csrf
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Old Password') }}</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="oldpassword" placeholder="{{ zactra::translate_lang('Old Password') }}" value="" required>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('New Password') }}</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="newpassword" placeholder="{{ zactra::translate_lang('New Password') }}" value="" required>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">{{ zactra::translate_lang('Confrim Password') }}</label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" name="confirmpassword" placeholder="{{ zactra::translate_lang('Confrim Password') }}" value="" required>
							</div>
						</div>
					</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary waves-effect waves-light pull-right">{{ zactra::translate_lang('Update Password') }}</button>
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
