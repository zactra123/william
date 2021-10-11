@extends('layouts.client')
@section('content')
<style>
	.tab-selector {
		background-color: #0c71c3;
		/*border-color:#1a41ad;*/
		color: #ffffff;
		font-size: large;
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
	}

	.tab-selector:hover {
		background-color: #ffffff;
		color: #0c71c3;
	}

	.tab-selector.active {
		background-color: #ffffff;
		color: #0c71c3;
	}

	.card-header {
		padding: 0 !important;
		border-bottom: none;
	}

	.pdf-upload {
		display: none;
	}

	.pdf-upload.active {
		display: block;
	}

	.btn-uploadBtn {
		background-color: #0c71c3;
		color: #ffffff;
		font-family: "Times New Roman";
		font-size: large;
	}
</style>
<div class="fullwidth-block">
	<div class="row justify-content-center mt-4">
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">
					<div class="w-100 btn-group btn-group-toggle" data-toggle="buttons">
						<button type="button" class="btn tab-selector active" data-target="karma-tab" id="karma">{{ zactra::translate_lang('Credit Karma') }}</button>
						<button type="button" class="btn tab-selector" data-target="experian-tab" id="experian">{{ zactra::translate_lang('ServiExperiances') }}</button>
						<button type="button" class="btn tab-selector" data-target="tu-tab" id="tuMembership">{{ zactra::translate_lang('TransUnion CREDIT MONITORING') }}</button>
						<button type="button" class="btn tab-selector" data-target="tu-online-tab" id="tuOnline">{{ zactra::translate_lang('TransUnion Online Dispute') }}</button>
					</div>
				</div>
				<div class="card-body">
					{!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
					@csrf
					<div class="pdf-upload karma-tab active">
						<div class="form-group files">
							<input type="file" name="credit_report[credit_karma]" class="form-control" multiple="" />
						</div>
					</div>
					<div class="pdf-upload experian-tab">
						<div class="form-group files">
							<label>{{ zactra::translate_lang('Upload Your File') }} </label>
							<input type="file" name="credit_report[experian]" class="form-control" multiple="" />
						</div>
					</div>
					<div class="pdf-upload tu-tab">
						<div class="form-group files">
							<label>{{ zactra::translate_lang('Upload Your File') }} </label>
							<input type="file" name="credit_report[tu][client_details]" class="form-control" multiple="" />
						</div>
						<div class="form-group files">
							<label>{{ zactra::translate_lang('Upload Your File') }} </label>
							<input type="file" name="credit_report[tu][payment_history]" class="form-control" multiple="" />
						</div>
					</div>
					<div class="pdf-upload tu-online-tab">
						<div class="form-group files">
							<label>{{ zactra::translate_lang('Upload Your File') }} </label>
							<input type="file" name="credit_report[tu_online]" class="form-control" multiple="" />
						</div>
					</div>
					<div class="form-group row mb-0 font">
						<div class="col-md-8 offset-md-5">
							<button type="submit" class="btn btn-uploadBtn">
								{{ zactra::translate_lang('Upload') }}
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$(".tab-selector").click(function() {
			var tab = $(this).attr("data-target");

			$(".tab-selector").removeClass("active");
			$(".pdf-upload").removeClass("active");
			$(".pdf-upload input").prop("disabled", true);
			$("." + tab).addClass("active");
			$("." + tab + " input").prop("disabled", false);
		});

		$('input[type="file"]').change(function() {
			var ext = this.value.split(".");

			switch (ext[ext.length - 1]) {
				case "pdf":
					we;
				case "PDF":
					$("#uploadButton").attr("disabled", false);
					break;
				default:
					alert("This is not an allowed file type.");
					this.value = "";
			}
		});
	});
</script>
@endsection
