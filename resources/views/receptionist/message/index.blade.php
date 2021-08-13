@extends('owner.layouts.app')
@section('title')
<title>Appointment</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
          </nav>
    </div>
  </div>
  <section class="ms-working working-section section-padding">
    <div class="container mp-0">
            <div class="section-wrapper">
                <div class="row align-items-center">
                  <div class="container mt-5 pt-5 mp0-t10">
                      <div class="row justify-content-center">
                          <div class="col-12 col-md-10 col-sm-12 mp-0">
                              <div class="container">
                                  <div class="row justify-content-center mb-5">
                                      <div class="list-group list-group-horizontal col-md-6">
                                          <a class="list-group-item list-group-item-action p-2 tab-selector active" href="{{route("receptionist.message.index")}}" >All Messages</a>
                                          <a class="list-group-item list-group-item-action p-2 tab-selector pending" href="{{route("receptionist.message.index", ["type" => "pending"])}}">Pending</a>
                                          <a class="list-group-item list-group-item-action p-2 tab-selector completed" href="{{route("receptionist.message.index", ["type" => "completed"])}}">Completed</a>
                                      </div>
                                  </div>
                                  <div class="response">

                                  </div>
                                  <div id='calendar' class="card" style="overflow: auto;">
                                  </div>
                                </div>

                              <div class="modal fade" id="appointments" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="favoritesModalLabel">Message details</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">x</span> </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="d-none text-danger text-center font-italic" > All fields are required</div>

                                              <div class="ms-ua-form">
                                                  <form method="post" action="{{route('receptionist.message.create')}}">
                                                      @csrf
                                                      <input type="hidden" name="start_date" id="start_date">

                                                      <div class="row">
                                                        <div class="col-md-6 admin_id">

                                                            <select class="form-control" name="admin_id">
                                                                <option value=''>Select Admin</option>
                                                                @foreach($admins as $id => $admin)
                                                                    <option value={{$id}}>{{$admin}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 phone_number_id">
                                                            <input class="form-control" type="text" name="phone_number" id="phoneNumberId" placeholder="Phone Number">
                                                        </div>
                                                      </div>

                                                      <div class="row mt-2">
                                                        <div class="col-md-6 full_name_id ">
                                                            <input class="form-control" type="text" name="full_name" id="fullNameId" placeholder="Full Name">
                                                        </div>

                                                        <div class="col-md-6 email_id">
                                                            <input class="form-control" type="email" name="email" id="emailId" placeholder="Email">
                                                        </div>
                                                      </div>

                                                      <div class="row mt-2">
                                                        <div class="col-md-6 title_id">
                                                            <input class="form-control" type="text" name="title" id="titleId" placeholder="Title">
                                                        </div>
                                                        <div class="col-md-6 time_id">
                                                            <input class="form-control" type="time" name="time" id="timeId" placeholder="Time">
                                                        </div>
                                                      </div>

                                                      <div class="form-group mt-2">
                                                          <textarea class="form-control" name="description" rows="5" id="descriptionId" placeholder="Description"> </textarea>
                                                      </div>

                                                      <div class="form-group text-right">
                                                          <input type="submit" value="Add message" class="ms-ua-submit btn btn-primary">
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
                                              <h3 class="modal-title" id="appointmentDetailsModalLabel">Appointment details</h3>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <table class="table table-striped">
                                              <tr>
                                                <th>FULL NAME</th>
                                                <td><span class="left" id="appointment-full_name"></span></td>
                                              </tr>
                                              <tr>
                                                <th>PHONE NUMBER:</th>
                                                <td><span class="left" id="appointment-phone"></span></td>
                                              </tr>
                                              <tr>
                                                <th>EMAIL:</th>
                                                <td><span class="left" id="appointment-email"></span></td>
                                              </tr>
                                              <tr>
                                                <th>DATE:</th>
                                                <td><span class="left" id="appointment-date"></span></td>
                                              </tr>
                                              <tr>
                                                <th>TITLE:</th>
                                                <td> <p id="appointment-title" class="appointment-title"></p> </td>
                                              </tr>
                                              <tr>
                                                <th>DESCRIPTION:</th>
                                                <td> <p class="appointment-desc" id="appointment-description"></p> </td>
                                              </tr>
                                            </table>


                                              <div class="note .overflow-vertical" id="noteId">
                                              </div>

                                              <div class="addNote" >
                                                  <div class="ms-ua-form">
                                                      <h5>Add A Note</h5>
                                                      <form method="POST" action="{{ route('receptionist.message.note') }}">
                                                          @csrf
                                                          <div class="form-group message_id">
                                                              <input class="form-control" type="hidden" name="message_id" id="messageId" >
                                                          </div>
                                                          <div class="form-group">
                                                              <textarea class="form-control" rows="5" name="notes" id=""></textarea>
                                                          </div>
                                                          <div class="form-group text-right">
                                                              <input type="submit" value="Add" class="ms-ua-submit btn btn-primary">
                                                          </div>
                                                      </form>

                                                  </div>
                                              </div>
                                          </div>
                                          <div id="buttonCompleted"></div>

                                         {{-- <button class="ms-ua-submit add-note">ADD NOTE</button> --}}

                                          <div class="modal-footer">
                                              <button class="btn btn-secondary edit-appointment" ><i class="fa fa-edit"></i></button>
                                              <button class="btn btn-danger remove-appointment"><i class="fa fa-trash"></i></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              <div class="modal fade" id="updateMessage" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="favoritesModalLabel">Edit message</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">x</span> </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="ms-ua-form">
                                                  <form method="PUT" action="" id="updateMessageId">
                                                      @csrf
                                                      <div class="row">
                                                        <div class="col-md-6 admin_id ">
                                                            <select class="form-control " name="admin_id" id="oldAdminId">
                                                                <option value=''>SELECT ADMIN</option>
                                                                @foreach($admins as $id => $admin)
                                                                    <option value={{$id}}>{{$admin}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 full_name_id">
                                                            <input class="form-control" type="text" name="full_name" id="oldFullNameId" placeholder="Full Name">

                                                        </div>
                                                      </div>
                                                      <input type="hidden" name="id" id="editMessageId" >
                                                      <div class="row mt-3">
                                                        <div class="col-md-6 phone_number_id">
                                                            <input class="form-control" type="text" name="phone_number" id="oldPhoneNumberId" placeholder="Phone Number">
                                                        </div>

                                                        <div class="col-md-6 email_id">
                                                            <input class="form-control" type="email" name="email" id="oldEmailId" placeholder="Email">
                                                        </div>
                                                      </div>

                                                      <div class="row mt-3">
                                                        <div class="col-md-6 time_id">
                                                            <input class="form-control" type="date" name="date" id="oldDateId" placeholder="Date">
                                                        </div>
                                                        <div class="col-md-6 time_id">
                                                            <input class="form-control" type="time" name="time" id="oldTimeId" placeholder="Time">
                                                        </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                        <div class="col-md-12 title_id">
                                                            <input class="form-control" type="text" name="title" id="oldTitleId" placeholder="Title">
                                                        </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" rows="5" name="description" id="oldDescriptionId" placeholder="Description"> </textarea>
                                                        </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                        <div class="col-md-12 text-right">
                                                            <input type="submit" value="Add" class="ms-ua-submit btn btn-primary">
                                                        </div>
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
                </div>

            </div> <!-- section-wrapper -->
        </div>
    </section>

@endsection
@section('css')
  <style>
      .app_details{
          padding-left: 15px;
          padding-bottom: 15px;
      }
      .left{
          padding-left: 15px;
      }

      .appointment-desc{
          max-height: 150px;
      }
  </style>

  {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css">
@endsection
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js" defer></script>
  {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

  <script type="text/javascript">
      $(document).ready(function () {
          var url = $(location).attr("search");
          if (url.search("pending") == 6) {
              $(".tab-selector").removeClass("active");
              $(".pending").addClass("active");
          } else if (url.search("completed") == 6) {
              $(".tab-selector").removeClass("active");
              $(".completed").addClass("active");
          }

          $.ajaxSetup({
              headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
          });
          var calendar = $("#calendar").fullCalendar({
              editable: true,
              events: "message",
              disableDragging: true,
              displayEventTime: true,
              editable: true,
              events: {
                  url: window.location.href,
              },
              eventRender: function (event, element, view) {
                  element.text(event.title);
              },
              selectable: true,
              selectHelper: true,
              select: function (start, end, allDay) {
                  start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
                  end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
                  console.log(new Date(start_date).getTime() + 86400001, new Date(end_date).getTime());
                  if (new Date(start_date).getTime() + 86400001 < new Date(end_date).getTime()) {
                      alert("can't add message in the past");
                      calendar.fullCalendar("unselect");
                      return false;
                  }
                  $("#appointments").modal("show");
                  $("#start_date").val(start_date);

                  calendar.fullCalendar("unselect");
              },
              eventClick: function (event) {
                  $.ajax({
                      type: "GET",
                      url: "/receptionist/message/" + event.id,
                      success: function (results) {
                          $("#appointmentDetailsModalLabel").text(results.message.title);
                          $("#appointment-full_name").text(results.message.name);
                          $("#appointment-phone").text(results.message.phone_number);
                          $("#appointment-email").text(results.message.email);

                          $("#appointment-title").text(results.message.title);
                          $("#appointment-description").text(results.message.description);

                          $("#appointment-date").text(results.message.call_date);

                          button = "";

                          if (results.message.completed == 0) {
                              button += '<button class="btn btn-success" id="message-completed" data-target =';
                              button += results.message.id + '><span class="fa fa-check"></span></button>';
                          }
                          $("#buttonCompleted").html(button);

                          html = '<div class="form-group row">';
                          html += '<table class="table table-hover"> <thead> <tr> <th></th><h5>Notes</h5> </tr> </thead> <tbody><tr> ';

                          for (let val in results.note) {
                              console.log(results.note[val]);
                              html += '<th scope="row"></th><td class="text-primary">' + results.note[val]["created_at"] + "</td><td>" + results.note[val]["notes"] + "</td></tr>";
                          }
                          html += "</tbody> </table>";
                          $("#noteId").html(html);
                          $("#messageId").val(results.message.id);

                          $(".edit-appointment").attr("data-id", results.message.id);

                          $(".remove-appointment").attr("data-id", results.message.id);

                          $("#appointmentDetails").modal("show");
                      },
                      error: function (err, state) {
                          console.log(err);
                      },
                  });
              },
          });

          $("#buttonCompleted").click(function () {
              var id = $("#message-completed").attr("data-target");

              var token = "<?= csrf_token()?>";
              console.log(id);
              $.ajax({
                  url: "message/completed",
                  method: "POST",
                  data: { id: id, _token: token },
                  success: function () {
                      console.log("it Works");
                      location.reload();
                  },

                  error: function (err, state) {
                      console.log(err);
                  },
              });
          });

          $(".edit-appointment").click(function () {
              var id = $(this).attr("data-id");

              $.ajax({
                  type: "GET",
                  url: "/receptionist/message/" + id,
                  success: function (results) {
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

                      $("#updateMessage").modal("show");
                      console.log(results.message.call_date);
                  },
                  error: function (err, state) {
                      console.log(err);
                  },
              });
          });

          $("#updateMessage form").submit(function (e) {
              e.preventDefault();
              var form = $(this).serializeArray(),
                  data = {};
              $.each(form, function (index, el) {
                  data[el.name] = el.value;
              });

              $.ajax({
                  url: "/receptionist/message/update",
                  type: "PUT",
                  data: data,
                  success: function (results) {
                      calendar.fullCalendar(
                          "renderEvent",
                          {
                              id: results["id"],
                              title: results["name"],
                              start: results["start_date"],
                              end: results["start_date"],
                              allDay: true,
                          },
                          "stick"
                      );
                      $("#updateMessage form")[0].reset();
                      $("#updateMessage").modal("hide");
                  },

                  error: function (err, state) {
                      console.log(JSON.parse(err.responseText));
                      $("#updateMessage .text-danger").removeClass("d-none");
                  },
              });
          });

          $("#appointments form").submit(function (e) {
              e.preventDefault();
              var form = $(this).serializeArray(),
                  data = {};
              $.each(form, function (index, el) {
                  data[el.name] = el.value;
              });

              $.ajax({
                  url: "/receptionist/message/create",
                  type: "POST",
                  data: data,
                  success: function (results) {
                      calendar.fullCalendar(
                          "renderEvent",
                          {
                              id: results["id"],
                              title: results["name"],
                              start: results["start_date"],
                              end: results["start_date"],
                              allDay: true,
                          },
                          "stick"
                      );
                      $("#appointments form")[0].reset();
                      $("#appointments").modal("hide");
                  },

                  error: function (err, state) {
                      console.log(JSON.parse(err.responseText));
                      $("#appointments .text-danger").removeClass("d-none");
                  },
              });
          });

          $("#phoneNumberId").keyup(function () {
              var val = this.value.replace(/\D/g, "");
              var newVal = "";
              if (val.length > 4) {
                  this.value = val;
              }

              if (val.length > 3 && val.length < 7) {
                  newVal += val.substr(0, 3) + "-";
                  val = val.substr(3);
              }
              if (val.length > 6) {
                  newVal += val.substr(0, 3) + "-";
                  newVal += val.substr(3, 3) + "-";
                  val = val.substr(6);
              }
              newVal += val;
              this.value = newVal.substring(0, 12);

              if (newVal.length == 12) {
                  var token = "<?= csrf_token()?>";
                  $.ajax({
                      url: "message/user/data",
                      method: "POST",
                      data: { phone_number: newVal, _token: token },
                      success: function (result) {
                          if (result != "") {
                              $("#fullNameId").val(result.full_name);
                              $("#emailId").val(result.email);
                          }
                      },

                      error: function (err, state) {
                          console.log(err);
                      },
                  });
              }
          });

          $(".remove-appointment").click(function () {
              var id = $(this).attr("data-id");
              $("#appointmentDetails").modal("hide");
              bootbox.confirm("Do you really want to delete record?", function (result) {
                  if (result) {
                      $.ajax({
                          url: "/receptionist/message/" + id,
                          type: "DELETE",
                          data: {
                              " _token": $("meta[name='csrf-token']").attr("content"),
                          },
                          success: function () {
                              calendar.fullCalendar("removeEvents", id);
                              displayMessage("Deleted Successfully");
                          },
                      });
                  }
              });
          });
      });

      $("#oldPhoneNumberId").keyup(function () {
          var val = this.value.replace(/\D/g, "");
          var newVal = "";
          if (val.length > 4) {
              this.value = val;
          }

          if (val.length > 3 && val.length < 7) {
              newVal += val.substr(0, 3) + "-";
              val = val.substr(3);
          }
          if (val.length > 6) {
              newVal += val.substr(0, 3) + "-";
              newVal += val.substr(3, 3) + "-";
              val = val.substr(6);
          }
          newVal += val;
          this.value = newVal.substring(0, 12);
      });

      function displayMessage(message) {
          $(".response").html("<div class='success'>" + message + "</div>");
          setInterval(function () {
              $(".success").fadeOut();
          }, 1000);
      }
  </script>

@endsection
