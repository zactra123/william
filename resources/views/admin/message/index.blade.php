@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Message') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Messages') }}</li>
			</ol>
		</nav>
	</div>
</div>
<section class="ms-working working-section section-padding">
	<div class="container mp-0">
		<div class="section-wrapper">
			<div class="container mt-5 pt-5 mp0-t10">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-sm-12 mp-0">
						<div class="container">
							<div class="row justify-content-center">
								<div class="list-group list-group-horizontal col-md-6">
									<a class="list-group-item list-group-item-action p-2 tab-selector active" href="{{route("admin.message.index")}}">{{ zactra::translate_lang('All Messages') }}</a>
									<a class="list-group-item list-group-item-action p-2 tab-selector pending" href="{{route("admin.message.index", ["type" => "pending"])}}">{{ zactra::translate_lang('Pending') }}</a>
									<a class="list-group-item list-group-item-action p-2 tab-selector completed" href="{{route("admin.message.index", ["type" => "completed"])}}">{{ zactra::translate_lang('Completed') }}</a>
								</div>
							</div>
							<div class="response">
							</div>
						</div>
						<div class="mt-2">
							<div id='calendar' class="card" style="overflow: auto;">
							</div>
						</div>
						<div class="modal fade" id="appointments" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="favoritesModalLabel">{{ zactra::translate_lang('Message details') }}</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">x</span> </button>
									</div>
									<div class="modal-body">
										<div class="d-none text-danger text-center font-italic"> {{ zactra::translate_lang('All fields are required') }}</div>
										<div class="ms-ua-form">
											<form method="post" action="{{route('admin.message.create')}}">
												@csrf
												<input type="hidden" name="start_date" id="start_date">
												<div class="row">
													<div class="col-md-6 full_name_id">
														<input class="form-control" type="text" name="full_name" id="fullNameId" placeholder="{{ zactra::translate_lang('Full Name') }}">
													</div>
													<div class="col-md-6 phone_number_id">
														<input class="form-control" type="text" name="phone_number" id="phoneNumberId" placeholder="{{ zactra::translate_lang('Phone Number') }}">
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-6 email_id">
														<input class="form-control" type="email" name="email" id="emailId" placeholder="{{ zactra::translate_lang('Email') }}">
													</div>
													<div class="col-md-6 time_id ">
														<input class="form-control" type="time" name="time" id="timeId" placeholder="{{ zactra::translate_lang('Time') }}">
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-12 ptitle_id">
														<input class="form-control" type="text" name="title" id="titleId" placeholder="{{ zactra::translate_lang('Title') }}">
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-12">
														<textarea class="form-control" name="description" rows="5" id="descriptionId" placeholder="{{ zactra::translate_lang('Description') }}"> </textarea>
													</div>
												</div>
												<div class="row mt-3 text-right">
													<div class="col-md-12">
														<input type="submit" value="{{ zactra::translate_lang('Add message') }}" class="ms-ua-submit btn btn-primary">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="appointmentDetails" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="appointmentDetailsModalLabel">{{ zactra::translate_lang('Appointment details') }}</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table class="table table-striped">
											<tr>
												<th>{{ zactra::translate_lang('Full Name') }}</th>
												<td><span class="left" id="appointment-full_name"></span></td>
											</tr>
											<tr>
												<th>{{ zactra::translate_lang('Phone Number') }}</th>
												<td> <span class="left" id="appointment-phone"></span> </td>
											</tr>
											<tr>
												<th>{{ zactra::translate_lang('Email') }}</th>
												<td> <span class="left" id="appointment-email"></span> </td>
											</tr>
											<tr>
												<th>{{ zactra::translate_lang('Date') }}</th>
												<td> <span class="left" id="appointment-date"></span> </td>
											</tr>
											<tr>
												<th>{{ zactra::translate_lang('Title') }}</th>
												<td>
													<p id="appointment-title"></p>
												</td>
											</tr>
											<tr>
												<th>{{ zactra::translate_lang('Description') }}</th>
												<td>
													<p id="appointment-description"></p>
												</td>
											</tr>
										</table>
										<div class="note .overflow-vertical app_details" id="noteId"></div>
										<div class="addNote">
											<div class="ms-ua-form">
												<form method="POST" action="{{ route('admin.message.note') }}">
													@csrf
													<div class=" form-group message_id">
														<input class="form-control" type="hidden" name="message_id" id="messageId">
													</div>
													<div class="form-group ">
														<textarea class="form-control" rows="5" name="notes" id=""></textarea>
													</div>
													<div class="form-group text-right">
														<input type="submit" value="{{ zactra::translate_lang('Add') }}" class="ms-ua-submit btn btn-primary">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<div id="buttonCompleted"></div>
										<button class="btn btn-secondary edit-appointment"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger remove-appointment"><i class="fa fa-trash"></i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="updateMessage" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="favoritesModalLabel">{{ zactra::translate_lang('Edit Message') }}</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">x</span> </button>
									</div>
									<div class="modal-body ">
										<div class="ms-ua-form">
											<form method="PUT" action="" id="updateMessageId">
												@csrf
												<div class="row">
													<div class="col-md-6 full_name_id">
														<input class="form-control" type="text" name="full_name" id="oldFullNameId" placeholder="{{ zactra::translate_lang('FULL NAME') }}">
													</div>
													<input type="hidden" name="id" id="editMessageId">
													<div class="col-md-6 phone_number_id">
														<input class="form-control" type="text" name="phone_number" id="oldPhoneNumberId" placeholder="{{ zactra::translate_lang('PHONE NUMBER') }}">
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-6 email_id">
														<input class="form-control" type="email" name="email" id="oldEmailId" placeholder="{{ zactra::translate_lang('EMAIL') }}">
													</div>
													<div class="col-md-6 time_id">
														<input class="form-control" type="date" name="date" id="oldDateId" placeholder="{{ zactra::translate_lang('Date') }}">
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-6 time_id">
														<input class="form-control" type="time" name="time" id="oldTimeId" placeholder="{{ zactra::translate_lang('TIME') }}">
													</div>
													<div class="col-md-6 title_id">
														<input class="form-control" type="text" name="title" id="oldTitleId" placeholder="{{ zactra::translate_lang('TITLE') }}">
													</div>
												</div>
												<div class="col-md-12 mt-3 p-0">
													<textarea class="form-control" rows="5" name="description" id="oldDescriptionId" placeholder="{{ zactra::translate_lang('DESCRIPTION') }}"> </textarea>
												</div>
												<div class="col-md-12 text-right mt-3 p-0">
													<input type="submit" value="{{ zactra::translate_lang('Add') }}" class="ms-ua-submit btn btn-primary">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- section-wrapper -->
	</div>
</section>

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js" defer></script>

<style>
	.selectAdmin {
		padding: 10px 20px;
		border-radius: 20px;
		border: 2px solid #0c71c3;
		font-family: inherit;
		font-size: 0.875em;
		font-weight: 300;
		width: 100%;
		outline: none;
		transition: .3s ease;
	}

	.modal-backdrop {
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1030;
		background-color: #333333;
		opacity: 0.8; // I ADDED THIS LINE
	}

	.modal-content {

		width: 150%;
	}

	.appointment-desc {
		max-height: 150px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {

		var url = $(location).attr('search');
		if (url.search("pending") == 6) {
			$('.tab-selector').removeClass("active");
			$(".pending").addClass("active");
		} else if (url.search("completed") == 6) {
			$('.tab-selector').removeClass("active");
			$(".completed").addClass("active");
		};

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var calendar = $('#calendar').fullCalendar({
			editable: true,
			events: "message",
			disableDragging: true,
			displayEventTime: true,
			editable: true,
			events: {
				url: window.location.href
			},
			eventRender: function(event, element, view) {
				element.text(event.title);
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
				end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
				console.log(new Date(start_date).getTime() + 86400001, new Date(end_date).getTime())
				if (new Date(start_date).getTime() + 86400001 < new Date(end_date).getTime()) {
					alert("can't add message in the past");
					calendar.fullCalendar('unselect');
					return false;
				}
				$('#appointments').modal('show');
				$("#start_date").val(start_date);

				calendar.fullCalendar('unselect');
			},
			eventClick: function(event) {
				$.ajax({
					type: 'GET',
					url: "/admin/message/" + event.id,
					success: function(results) {

						$("#appointmentDetailsModalLabel").text(results.message.title);
						$("#appointment-full_name").text(results.message.name);
						$("#appointment-phone").text(results.message.phone_number);
						$("#appointment-email").text(results.message.email);

						$("#appointment-title").text(results.message.title);
						$("#appointment-description").text(results.message.description);

						$("#appointment-date").text(results.message.call_date);

						button = '';

						if (results.message.completed == 0) {

							button += '<button class="btn btn-success" id="message-completed" data-target =';
							button += results.message.id + '><span class="fa fa-check"></span></button>'

						}
						$("#buttonCompleted").html(button);

						html = '<div class="form-group">';
						html += '<div><h5>Notes</h5></div>' +
							'<ul class="list-group w-100">';

						for (let val in results.note) {
							console.log(results.note[val])
							html += '<li class="list-group-item"><span class="text-primary">' + results.note[val]['created_at'] +
								'</span> ' + results.note[val]['notes'] + '</li>'

						}
						html += '</ul>'
						$("#noteId").html(html);
						$("#messageId").val(results.message.id);

						$(".edit-appointment").attr("data-id", results.message.id);

						$(".remove-appointment").attr("data-id", results.message.id);

						$('#appointmentDetails').modal('show');
					},
					error: function(err, state) {
						console.log(err)
					}
				})
			}

		});

		$('#buttonCompleted').click(function() {
			var id = $("#message-completed").attr("data-target")

			var token = "<?= csrf_token() ?>";
			console.log(id);
			$.ajax({
				url: "message/completed",
				method: "POST",
				data: {
					id: id,
					_token: token
				},
				success: function() {
					console.log("it Works");
					location.reload()
				},

				error: function(err, state) {
					console.log(err)
				}
			});

		});

		$('.edit-appointment').click(function() {
			var id = $(this).attr("data-id");
			$.ajax({
				type: 'GET',
				url: "/admin/message/" + id,
				success: function(results) {
					var date = results.message.call_date.split(" ");
					console.log(date);

					$("#appointmentDetails").modal("hide");

					$("#oldAdminId").val(results.message.user_id);
					$("#oldFullNameId").val(results.message.name);
					$("#oldPhoneNumberId").val(results.message.phone_number);
					$("#oldEmailId").val(results.message.email);
					$("#oldDateId").val(date[0]);
					$("#oldTimeId").val(date[1]);
					$("#oldTitleId").val(results.message.title);
					$("#editMessageId").val(results.message.id);
					$("#oldDescriptionId").val(results.message.description);

					$('#updateMessage').modal('show');
					console.log(results.message.call_date);
				},
				error: function(err, state) {
					console.log(err)
				}
			})

		})

		$("#updateMessage form").submit(function(e) {
			e.preventDefault();
			var form = $(this).serializeArray(),
				data = {};
			$.each(form, function(index, el) {
				data[el.name] = el.value
			});
			$.ajax({
				url: "/admin/message/update",
				type: "PUT",
				data: data,
				success: function(results) {

					var date = results.call_date.split(" ");
					calendar.fullCalendar('renderEvent', {

							id: results['id'],
							title: results['title'],
							start: date[0],
							end: date[0],
							allDay: true
						},
						'stick'
					);
					$("#updateMessage form")[0].reset()
					$('#updateMessage').modal('hide');
				},
				error: function(err, state) {
					console.log(JSON.parse(err.responseText))
					$("#updateMessage .text-danger").removeClass("d-none")
				}
			});

		})


		$("#appointments form").submit(function(e) {
			e.preventDefault();
			var form = $(this).serializeArray(),
				data = {};
			$.each(form, function(index, el) {
				data[el.name] = el.value
			});
			$.ajax({
				url: "/admin/message/create",
				type: "POST",
				data: data,
				success: function(results) {
					var date = results.call_date.split(" ");
					calendar.fullCalendar('renderEvent', {
							id: results['id'],
							title: results['title'],
							start: date[0],
							end: date[0],
							allDay: true
						},
						'stick'
					);
					$("#appointments form")[0].reset()
					$('#appointments').modal('hide');
				},
				error: function(err, state) {
					console.log(JSON.parse(err.responseText))
					$("#appointments .text-danger").removeClass("d-none")
				}
			});

		})

		$('.remove-appointment').click(function() {
			var id = $(this).attr("data-id");
			$("#appointmentDetails").modal("hide");
			// bootbox.confirm("Do you really want to delete record?", function (result) {
			//     if (result) {
			$.ajax({
				url: "/admin/message/" + id,
				type: 'DELETE',
				data: {
					" _token": $("meta[name='csrf-token']").attr("content")
				},
				success: function() {
					calendar.fullCalendar('removeEvents', id);
					displayMessage("Deleted Successfully");
				}
			});
			//     }
			// })
		})

		$('#phoneNumberId').keyup(function() {

			var val = this.value.replace(/\D/g, '');
			var newVal = '';
			if (val.length > 4) {
				this.value = val;
			}

			if ((val.length > 3) && (val.length < 7)) {
				newVal += val.substr(0, 3) + '-';
				val = val.substr(3);
			}
			if (val.length > 6) {
				newVal += val.substr(0, 3) + '-';
				newVal += val.substr(3, 3) + '-';
				val = val.substr(6);
			}
			newVal += val;
			this.value = newVal.substring(0, 12);

			if (newVal.length == 12) {
				var token = "<?= csrf_token() ?>";
				$.ajax({
					url: "message/user/data",
					method: "POST",
					data: {
						phone_number: newVal,
						_token: token
					},
					success: function(result) {
						if (result != '') {

							$('#fullNameId').val(result.full_name);
							$('#emailId').val(result.email);
						}
					},

					error: function(err, state) {
						console.log(err)
					}
				});
			}

		});

	});

	function displayMessage(message) {
		$(".response").html("<div class='success'>" + message + "</div>");
		setInterval(function() {
			$(".success").fadeOut();
		}, 1000);
	}
</script>

@endsection
