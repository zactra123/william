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
				<form action="{{ route('owner.slider.update') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-4 main-content-label">First Slider</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Image</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="first_slider_image" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="first_slider_title" class="form-control" value="{{ isset($sitesettings->first_slider_title) ? $sitesettings->first_slider_title : ''  }}" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="first_slider_text" class="form-control" value="{{ isset($sitesettings->first_slider_text) ? $sitesettings->first_slider_text : ''  }}" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="first_slider_button_text" class="form-control" value="{{ isset($sitesettings->first_slider_button_text) ? $sitesettings->first_slider_button_text : ''  }}" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="first_slider_button_link" class="form-control" value="{{ isset($sitesettings->first_slider_button_link) ? $sitesettings->first_slider_button_link : ''  }}" placeholder="Button Link">
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
								<input type="file" name="second_slider_image" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="second_slider_title" class="form-control" value="{{ isset($sitesettings->second_slider_title) ? $sitesettings->second_slider_title : ''  }}" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="second_slider_text" class="form-control" value="{{ isset($sitesettings->second_slider_text) ? $sitesettings->second_slider_text : ''  }}" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="second_slider_button_text" class="form-control" value="{{ isset($sitesettings->second_slider_button_text) ? $sitesettings->second_slider_button_text : ''  }}" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="second_slider_button_link" class="form-control" value="{{ isset($sitesettings->second_slider_button_link) ? $sitesettings->second_slider_button_link : ''  }}" placeholder="Button Link">
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
								<input type="file" name="third_slider_image" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Title</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="third_slider_title" class="form-control" value="{{ isset($sitesettings->third_slider_title) ? $sitesettings->third_slider_title : ''  }}" placeholder="Title">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="third_slider_text" class="form-control" value="{{ isset($sitesettings->third_slider_text) ? $sitesettings->third_slider_text : ''  }}" placeholder="Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Text</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="third_slider_button_text" class="form-control" value="{{ isset($sitesettings->third_slider_button_text) ? $sitesettings->third_slider_button_text : ''  }}" placeholder="Button Text">
							</div>
						</div>
					</div>

          <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Button Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="third_slider_button_link" class="form-control" value="{{ isset($sitesettings->third_slider_button_link) ? $sitesettings->third_slider_button_link : ''  }}" placeholder="Button Link">
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
				<form class="form-horizontal" action="{{ route('owner.footer.update') }}" method="post">
					@csrf
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Address</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="address" placeholder="Address" value="{{ isset($sitesettings->address) ? $sitesettings->address : ''  }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Phone</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ isset($sitesettings->phone) ? $sitesettings->phone : ''  }}">
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Email</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control" name="email" placeholder="Email" value="{{ isset($sitesettings->email) ? $sitesettings->email : ''  }}">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Twitter Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link" value="{{ isset($sitesettings->twitter_link) ? $sitesettings->twitter_link : ''  }}">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Facebook Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link" value="{{ isset($sitesettings->facebook_link) ? $sitesettings->facebook_link : ''  }}">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Instagram Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="instagram_link" placeholder="Instagram Link" value="{{ isset($sitesettings->instagram_link) ? $sitesettings->instagram_link : ''  }}">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Skype Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="skype_link" placeholder="Skype Link" value="{{ isset($sitesettings->skype_link) ? $sitesettings->skype_link : ''  }}">
							</div>
						</div>
					</div>
          <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Linkedin Link</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="linkedin_link" placeholder="Linkedin Link" value="{{ isset($sitesettings->linkedin_link) ? $sitesettings->linkedin_link : ''  }}">
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
