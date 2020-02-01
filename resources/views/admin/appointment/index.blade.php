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
                                    <input type="hidden" id="start_date">
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


                            </div>
                            <div class="modal-footer">

                            </div>

                            </form>
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
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,


                select: function (start, end, allDay) {
                    start_date = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss")
                    if ( new Date(start_date).getTime() < new Date().getTime()) {
                        alert("can't add appointment in the past")
                        return false;
                    }
                    $('#appointments').modal('show');
                    $("#start_date").val(start_date );

                    calendar.fullCalendar('unselect');
                },

                // eventDrop: function (event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                //     $.ajax({
                //         url: SITEURL + 'fullcalendar/update',
                //         data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
                //         type: "POST",
                //         success: function (response) {
                //             displayMessage("Updated Successfully");
                //         }
                //     });
                // },


                eventClick: function (event) {
                    //ajax vercnenq appoinment event.id-ov
                    //modalov cuyc tanq appointment detailse
                    // meje delete button karanq dnenq, ira click jsov brnenq ajaxov jnjenq
                    $('#appointments').modal('show');


                    // var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: '/fullcalendar/delete',
                            data: "&amp;id=" + event.id,
                            success: function (response) {
                                if(parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                }

            });

            $("#appointments form").submit(function(e){
                e.preventDefault()
                var form = $(this).serializeArray()
                var token = form[0]['value'];
                var time = form[1]['value'];
                var title = form[2]['value'];
                var description = form[3]['value']
                var phone_number = form[4]['value']
                var start_date =  $("#start_date").val()

                $.ajax({
                    url: "/admin/appointment/create",
                    type:"POST",
                    data:{time:time, title:title, description:description, phone_number:phone_number,
                        start_date:start_date, _token:token},
                    success: function (results) {

                        calendar.fullCalendar('renderEvent',
                            {

                                id: results['id'],
                                title: results['name'],
                                start: results['start_date'],
                                end: results['start_date'],
                                allDay: true
                            },
                            true
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







