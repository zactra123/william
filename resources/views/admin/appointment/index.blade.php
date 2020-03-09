@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="list-group list-group-horizontal col-md-6">
                            <a class="list-group-item list-group-item-action p-1 tab-selector active" href="{{route("admin.appointment.index")}}" >All Messages</a>
                            <a class="list-group-item list-group-item-action p-1 tab-selector pending" href="{{route("admin.appointment.index", ["type" => "pending"])}}">Pending</a>
                            <a class="list-group-item list-group-item-action p-1 tab-selector completed" href="{{route("admin.appointment.index", ["type" => "completed"])}}">Completed</a>
                        </div>
                    </div>
                    <div class="response">

                    </div>
                    <div id='calendar' class="card">
                    </div>
                </div>

                <div class="modal fad" id="appointments" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="favoritesModalLabel">Message details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Close</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-none text-danger text-center font-italic" >All fields are required</div>

                                    <form method="post" action="{{route('admin.appointment.create')}}">
                                    @csrf
                                    <input type="hidden" name="start_date" id="start_date">

                                    <div class="admin_id m-1">

                                          <select class="selectAdmin" name="admin_id">
                                              <option value=''>SELECT ADMIN</option>
                                              @foreach($admins as $id => $admin)
                                                  <option value={{$id}}>{{$admin}}</option>
                                              @endforeach
                                          </select>



                                    </div>
                                    <div class="full_name_id m-1">
                                        <input type="text" name="full_name" id="fullNameId" placeholder="FULL NAME">

                                    </div>

                                    <div class="phone_number_id m-1">
                                        <input type="text" name="phone_number" id="phoneNumberId" placeholder="PHONE NUMBER">
                                    </div>

                                    <div class="email_id m-1">
                                        <input type="email" name="email" id="emailId" placeholder="EMAIL">
                                    </div>

                                    <div class="time_id m-1">
                                        <input type="time" name="time" id="timeId" placeholder="TIME">

                                    </div>
                                    <div class="title_id m-1">
                                        <input type="text" name="title" id="titleId" placeholder="TITLE">

                                    </div>


                                    <div class="form-group row m-1">

                                        <textarea name="description" id="descriptionId" placeholder="DESCRIPTION"> </textarea>

                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                ADD MESSAGE
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fad" id="appointmentDetails" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="appointmentDetailsModalLabel">Appointment details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div><span class="text-primary pr-1 pb-3">FULL NAME</span><span id="appointment-full_name"></span></div>
                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-mobile-phone pr-1"></i>Phone Number:</span><span id="appointment-phone"></span></div>
                                <div><span class="text-primary pr-1 pb-3">EMAIL:</span><span id="appointment-email"></span></div>
                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-calendar pr-1"></i>Date:</span><span id="appointment-date"></span></div>
                                <div class="overflow-auto h-25 border rounded border-primary pb-3 appointment-title" id="appointment-title">
                                </div>
                                <div class="overflow-auto h-25 border rounded border-primary pb-3 appointment-desc" id="appointment-description">
                                </div>
                                <div class="note" id="noteId">
                                </div>

                                <div class="addNote" style="display: none;">
                                    <form method="POST" action="{{ route('admin.message.note') }}">
                                        @csrf
                                        <div class="message_id">
                                            <input type="hidden" name="message_id" id="messageId" >
                                        </div>
                                        <div class="form-group row m-1">
                                            <textarea name="notes" id=""></textarea>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-9 offset-md-5">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <div id="buttonCompleted"></div>

                                <button class="btn btn-primary add-note">ADD NOTE</button>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary edit-appointment" ><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger remove-appointment"><i class="fa fa-trash-o"></i></button>
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
                                    <span aria-hidden="true">Close</span> </button>
                            </div>
                            <div class="modal-body ">
                                <form method="PUT" action="" id="updateMessageId">
                                    @csrf




                                    <div class="admin_id m-1">

                                        <select class="selectAdmin" name="admin_id" id="oldAdminId">
                                            <option value=''>SELECT ADMIN</option>
                                            @foreach($admins as $id => $admin)
                                                <option value={{$id}}>{{$admin}}</option>
                                            @endforeach
                                        </select>



                                    </div>
                                    <div class="full_name_id m-1">
                                        <input type="text" name="full_name" id="oldFullNameId" placeholder="FULL NAME">

                                    </div>
                                    <input type="hidden" name="id" id="editMessageId" >
                                    <div class="phone_number_id m-1">
                                        <input type="text" name="phone_number" id="oldPhoneNumberId" placeholder="PHONE NUMBER">
                                    </div>

                                    <div class="email_id m-1">
                                        <input type="email" name="email" id="oldEmailId" placeholder="EMAIL">
                                    </div>

                                    <div class="time_id m-1">
                                        <input type="date" name="date" id="oldDateId" placeholder="Date">

                                    </div>
                                    <div class="time_id m-1">
                                        <input type="time" name="time" id="oldTimeId" placeholder="TIME">

                                    </div>
                                    <div class="title_id m-1">
                                        <input type="text" name="title" id="oldTitleId" placeholder="TITLE">

                                    </div>


                                    <div class="form-group row m-1">

                                        <textarea name="description" id="oldDescriptionId" placeholder="DESCRIPTION"> </textarea>

                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                EDIT MESSAGE
                                            </button>
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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js" defer></script>

    <style>
        .selectAdmin{
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
            opacity:0.8; // I ADDED THIS LINE
        }
        .appointment-desc{
            max-height: 150px;
        }

    </style>



    <script type="text/javascript">

        $(document).ready(function () {

            var url = $(location).attr('search');
            if(url.search("pending")== 6){
                $('.tab-selector').removeClass("active");
                $(".pending" ).addClass("active");
            }else if (url.search("completed")== 6){
                $('.tab-selector').removeClass("active");
                $(".completed" ).addClass("active");
            };




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "appointment",
                disableDragging: true,
                displayEventTime: true,
                editable: true,
                events: {
                    url: window.location.href
                },
                eventRender: function (event, element, view) {
                    element.text(event.title);
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    console.log(new Date(start_date).getTime()+86400001,     new Date(end_date).getTime())
                    if(new Date(start_date).getTime()+86400001 < new Date(end_date).getTime()){
                        alert("can't add appointment in the past");
                        calendar.fullCalendar( 'unselect' );
                        return false;
                    }
                    $('#appointments').modal('show');
                    $("#start_date").val(start_date );

                    calendar.fullCalendar('unselect');
                },
                eventClick: function (event) {
                    $.ajax({
                        type: 'GET',
                        url: "/admin/appointment/"+ event.id,
                        success: function (results) {

                            $("#appointmentDetailsModalLabel").text(results.appointment.title);
                            $("#appointment-full_name").text(results.appointment.name);
                            $("#appointment-phone").text(results.appointment.phone_number);
                            $("#appointment-email").text(results.appointment.email);

                            $("#appointment-title").text(results.appointment.title);
                            $("#appointment-description").text(results.appointment.description);

                            $("#appointment-date").text(results.appointment.call_date);

                            button ='';

                            if(results.appointment.completed == 0){

                                button += '<button class="btn btn-success" id="message-completed" data-target =';
                                button +=   results.appointment.id+'><span class="fa fa-check"></span></button>'

                            }
                            $("#buttonCompleted").html(button);

                            html='<div class="form-group row">';
                            html += '<table class="table table-hover"> <thead> <tr> <th >#</th><th >date</th>' +
                                '<th>Note</th> </tr> </thead> <tbody><tr> ';

                            for( let val in results.note){
                                console.log(results.note[val])
                                html +='<th scope="row"></th><td>'+ results.note[val]['created_at'] +
                                    '</td><td>'+ results.note[val]['notes']+'</td></tr>'

                            }
                            html+= '</tbody> </table>'
                            $("#noteId").html(html);
                            $("#messageId").val(results.appointment.id);

                            $(".edit-appointment").attr("data-id", results.appointment.id);

                            $(".remove-appointment").attr("data-id",  results.appointment.id);

                            $('#appointmentDetails').modal('show');
                        },
                        error:function (err, state) {
                          console.log(err)
                        }
                    })
                }

            });

            $('#buttonCompleted').click(function(){
                var  id = $("#message-completed").attr("data-target")

                        var token = "<?= csrf_token()?>";
                        console.log(id);
                        $.ajax({
                            url: "message/completed",
                            method:"POST",
                            data:{id:id, _token: token},
                            success: function () {
                                console.log("it Works");
                                location.reload()
                            },

                            error:function (err,state) {
                                console.log(err)
                            }
                        });


            });


            $('.add-note').click(function(){
                $(".addNote").show()
            })


            $('.edit-appointment').click(function(){
                var id = $(this).attr("data-id");

                $.ajax({
                    type: 'GET',
                    url: "/admin/appointment/"+ id,
                    success: function (results) {
                        var date = results.appointment.call_date.split(" ");
                        console.log(date);

                        $("#appointmentDetails").modal("hide");

                        $("#oldAdminId").val(results.appointment.user_id);
                        $("#oldFullNameId").val(results.appointment.name);
                        $("#oldPhoneNumberId").val(results.appointment.phone_number);
                        $("#oldEmailId").val(results.appointment.email);
                        $("#oldDateId").val( date[0]);
                        $("#oldTimeId").val(date[1]);
                        $("#oldTitleId").val(results.appointment.title);
                        $("#editMessageId").val(results.appointment.id);
                        $("#oldDescriptionId").val(results.appointment.description);

                        $('#updateMessage').modal('show');
                        console.log(results.appointment.call_date);
                    },
                    error:function (err, state) {
                        console.log(err)
                    }
                })

            })


            $("#updateMessage form").submit(function(e){
                e.preventDefault();
                var form = $(this).serializeArray(), data={};
                $.each(form, function(index, el){
                    data[el.name] = el.value
                });

                $.ajax({
                    url:  "/admin/appointment/update",
                    type:"PUT",
                    data: data,
                    success: function (results) {
                        calendar.fullCalendar('renderEvent',
                            {

                                id: results['id'],
                                title: results['name'],
                                start: results['start_date'],
                                end: results['start_date'],
                                allDay: true
                            },
                            'stick'
                        );
                        $("#updateMessage form")[0].reset()
                        $('#updateMessage').modal('hide');
                   },

                    error:function (err, state) {
                        console.log(JSON.parse(err.responseText))
                        $("#updateMessage .text-danger").removeClass("d-none")
                    }
                });




            })


            $("#appointments form").submit(function(e){
                e.preventDefault();
                var form = $(this).serializeArray(), data={};
                $.each(form, function(index, el){
                    data[el.name] = el.value
                });

                $.ajax({
                    url: "/admin/appointment/create",
                    type:"POST",
                    data: data,
                    success: function (results) {
                        console.log(results);
                        calendar.fullCalendar('renderEvent',
                            {


                                id: results['id'],
                                title: results['title'],
                                start: results['call_date'],
                                end: results['call_date'],
                                allDay: true
                            },
                            'stick'
                        );
                        $("#appointments form")[0].reset()
                        $('#appointments').modal('hide');
                    },

                    error:function (err, state) {
                        console.log(JSON.parse(err.responseText))
                        $("#appointments .text-danger").removeClass("d-none")
                    }
                });



            })
        });

        $('.remove-appointment').click(function(){
            var id = $(this).attr("data-id");
            $("#appointmentDetails").modal("hide");
            bootbox.confirm("Do you really want to delete record?", function (result) {
                if (result) {
                    $.ajax(
                        {
                            url: "/admin/appointment/" + id,
                            type: 'DELETE',
                            data:{
                                " _token": $("meta[name='csrf-token']").attr("content")
                            },
                            success: function () {
                                calendar.fullCalendar('removeEvents', id);
                                displayMessage("Deleted Successfully");
                            }
                        });
                }
            })
        })


        $('#phoneNumberId').keyup(function() {

            var val = this.value.replace(/\D/g, '');
            var newVal = '';
            if(val.length > 4) {
                this.value = val;
            }

            if((val.length > 3) && (val.length <7)) {
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
        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>"+message+"</div>");
            setInterval(function() { $(".success").fadeOut(); }, 1000);
        }



    </script>







@endsection







