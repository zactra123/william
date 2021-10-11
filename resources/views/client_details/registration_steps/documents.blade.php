<link rel="stylesheet" href="{{ asset('css/new_style.min.css?v='.env('ASSET_VERSION') ) }}">
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card card-small mb-4">
			<div class="card-header border-bottom">
				<h6 class="m-0">{{ zactra::translate_lang('Upload Documents') }}</h6>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item p-3">
					<div class="row">
						<div class="col">
							<form id="add_client_3" data-id="3" data-type="only_broker" class="add-client additional-reg {{$current_page}}" enctype="multipart/form-data">
								{{-- <form id="add_client_3" data-id="3" data-type="only_broker" class="add-client additional-reg" enctype="multipart/form-data"> --}}
								@csrf
								<h3 class="title_r theme-color-dark">{{ zactra::translate_lang('Incorect') }}</h3>
								<div class="upload-images">
									<div class="upload-img">
										<img src="{{asset("images/new/corect_1.jpg")}}">
									</div>
									<div class="upload-img">
										<img src="{{asset("images/new/corect_2.jpg")}}">
									</div>
								</div>
								<div class="upload-images upload-active">
									<div class="upload-img">
										<p class="upload-title">{{ zactra::translate_lang('Upload your identification card or driver license') }}</p>
										<div class="upload-img-box">
											<span href="#" class="thumbnailpreview"> <img class="upload-img " id="id_card" src="{{asset("images/new/id_card.jpg")}}" alt=""> <span><img class="upload-img " id="id_card" src="{{asset("images/new/id_card.jpg")}}" alt=""></span> </span>
											<div class="upload-btn">
												<button>
													<svg width="48" height="44" viewBox="0 0 48 44" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7437 15.5633H12.886C12.0815 15.5633 11.3599 15.0775 11.0508 14.3355C10.743 13.5937 10.9133 12.7392 11.4818 12.1708L22.5934 1.05595C23.3713 0.281319 24.6287 0.281319 25.405 1.05595L36.5184 12.1708C37.0869 12.7392 37.2571 13.5951 36.951 14.3355C36.6417 15.0789 35.9185 15.5633 35.114 15.5633H30.258V29.9736C30.258 31.4358 29.0725 32.6196 27.6121 32.6196H20.3896C18.9291 32.6196 17.7437 31.4356 17.7437 29.9736V15.5633ZM43.2282 23.351C43.2282 22.0328 44.2964 20.9643 45.6133 20.9643C46.9316 20.9643 48 22.0328 48 23.3511V33.3304C48 38.9517 43.4265 43.5251 37.8051 43.5251H10.1947C4.57324 43.5251 0 38.9516 0 33.3304V23.3511C0 22.0328 1.0683 20.9643 2.3866 20.9643C3.70337 20.9643 4.77325 22.0328 4.77325 23.351V33.3303C4.77325 36.3197 7.20514 38.7516 10.1947 38.7516H37.8051C40.7946 38.7516 43.2282 36.3197 43.2282 33.3303V23.351Z" fill="white" />
													</svg>
												</button>
											</div>
											<input type="file" name="driver_license" id="upload_id">
										</div>
									</div>
									<div class="upload-img">
										<p class="upload-title">{{ zactra::translate_lang('Upload your social security') }}</p>
										<div class="upload-img-box getdocumenturl" data-target={{ route('client.storeDriverSocial') }}>
											<span href="#" class="thumbnailpreview"><img class="upload-img" id="social_card" src="{{asset("images/new/social_card.jpg")}}" alt=""> <span><img class="upload-img" id="social_card" src="{{asset("images/new/social_card.jpg")}}" alt=""></span> </span>
											<div class="upload-btn">
												<button>
													<svg width="48" height="44" viewBox="0 0 48 44" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7437 15.5633H12.886C12.0815 15.5633 11.3599 15.0775 11.0508 14.3355C10.743 13.5937 10.9133 12.7392 11.4818 12.1708L22.5934 1.05595C23.3713 0.281319 24.6287 0.281319 25.405 1.05595L36.5184 12.1708C37.0869 12.7392 37.2571 13.5951 36.951 14.3355C36.6417 15.0789 35.9185 15.5633 35.114 15.5633H30.258V29.9736C30.258 31.4358 29.0725 32.6196 27.6121 32.6196H20.3896C18.9291 32.6196 17.7437 31.4356 17.7437 29.9736V15.5633ZM43.2282 23.351C43.2282 22.0328 44.2964 20.9643 45.6133 20.9643C46.9316 20.9643 48 22.0328 48 23.3511V33.3304C48 38.9517 43.4265 43.5251 37.8051 43.5251H10.1947C4.57324 43.5251 0 38.9516 0 33.3304V23.3511C0 22.0328 1.0683 20.9643 2.3866 20.9643C3.70337 20.9643 4.77325 22.0328 4.77325 23.351V33.3303C4.77325 36.3197 7.20514 38.7516 10.1947 38.7516H37.8051C40.7946 38.7516 43.2282 36.3197 43.2282 33.3303V23.351Z" fill="white" />
													</svg>
												</button>
											</div>
											<input type="file" name="social_security" id="upload_social">
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-12 text-center">
									<div class="basic-button upload mt-5">
										<input class="login mscrb-8" type="submit" value="{{ zactra::translate_lang('Upload') }}" name="">
									</div>
								</div>
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
