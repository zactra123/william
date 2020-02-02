@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="container">
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
                                    <div class="time_id">
                                        <input type="time" name="time" id="timeId" placeholder="Time">

                                    </div>
                                    <div class="title_id">
                                        <input type="text" name="title" id="titleId" placeholder="Title">

                                    </div>

                                    <div class="phone_number_id">
                                        <input type="text" name="phone_number" id="phoneNumberId" placeholder="Phone number">
                                    </div>

                                    <div class="form-group row m-1">

                                        <textarea name="description" id="descriptionId" placeholder="Description"> </textarea>

                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                Add note
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
                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-mobile-phone pr-1"></i>Phone Number:</span><span id="appointment-phone"></span></div>
                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-calendar pr-1"></i>Date:</span><span id="appointment-date"></span></div>
                                <div class="overflow-auto h-25 border rounded border-primary pb-3 appointment-desc" id="appointment-description">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger remove-appointment"><i class="fa fa-trash-o"></i></button>
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
                            $("#appointmentDetailsModalLabel").text(results.title);
                            $("#appointment-description").text(results.description);
                            $("#appointment-phone").text(results.phone_number);
                            $("#appointment-date").text(results.start_date);
                            $(".remove-appointment").attr("data-id", results.id);
                            $('#appointmentDetails').modal('show');
                        },
                        error:function (err, state) {
                          console.log(err)
                        }
                    })
                }

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







