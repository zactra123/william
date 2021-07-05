		<!--- Clender js -->
		<script src="{{asset('/')}}/assets/js/app-calendar.js"></script>
		<!--- JQuery min js -->
		<script src="{{asset('/')}}/assets/plugins/jquery/jquery.min.js"></script>

		<!--- Datepicker js -->
		<script src="{{asset('/')}}/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!--- Bootstrap Bundle js -->
		<script src="{{asset('/')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js -->
		<script src="{{asset('/')}}/assets/plugins/ionicons/ionicons.js"></script>

		<!--- Chart bundle min js -->
    <script src="{{asset('/')}}/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!--- Internal Sampledata js -->
    <script src="{{asset('/')}}/assets/js/chart.flot.sampledata.js"></script>
    <!--- Index js -->
    <script src="{{asset('/')}}/assets/js/index.js"></script>

		<!--- Moment js -->
		<script src="{{asset('/')}}/assets/plugins/moment/moment.js"></script>

		<!--- JQuery sparkline js -->
		<script src="{{asset('/')}}/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Perfect-scrollbar js -->
		<script src="{{asset('/')}}/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="{{asset('/')}}/assets/plugins/perfect-scrollbar/p-scroll.js"></script>


		<!--- Rating js -->
		<script src="{{asset('/')}}/assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="{{asset('/')}}/assets/plugins/rating/jquery.barrating.js"></script>

		<!--- Custom Scroll bar Js -->
		<script src="{{asset('/')}}/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>


		<!--- Sidebar js -->
		<script src="{{asset('/')}}/assets/plugins/side-menu/sidemenu.js"></script>


		<!--- Right-sidebar js -->
		<script src="{{asset('/')}}/assets/plugins/sidebar/sidebar.js"></script>
		<script src="{{asset('/')}}/assets/plugins/sidebar/sidebar-custom.js"></script>

		<!--- Eva-icons js -->
		<script src="{{asset('/')}}/assets/js/eva-icons.min.js"></script>
		<!-- form-elements js -->
		<script src="{{asset('/')}}/assets/js/form-elements.js"></script>
		<!--- Scripts js -->
		<script src="{{asset('/')}}/assets/js/script.js"></script>

		<!--- Custom js -->
		<script src="{{asset('/')}}/assets/js/custom.js"></script>

		<!--- Switcher js -->
		<script src="{{asset('/')}}/assets/switcher/js/switcher.js"></script>

		<script src="{{asset('/')}}/assets/plugins/select2/js/select2.min.js"></script>



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
		                events: "message",
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
		                        alert("can't add message in the past");
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
		                        url: "/admin/message/"+ event.id,
		                        success: function (results) {

		                            $("#appointmentDetailsModalLabel").text(results.message.title);
		                            $("#appointment-full_name").text(results.message.name);
		                            $("#appointment-phone").text(results.message.phone_number);
		                            $("#appointment-email").text(results.message.email);

		                            $("#appointment-title").text(results.message.title);
		                            $("#appointment-description").text(results.message.description);

		                            $("#appointment-date").text(results.message.call_date);

		                            button ='';

		                            if(results.message.completed == 0){

		                                button += '<button class="btn btn-success" id="message-completed" data-target =';
		                                button +=   results.message.id+'><span class="fa fa-check"></span></button>'

		                            }
		                            $("#buttonCompleted").html(button);

		                            html='<div class="form-group row">';
		                            html += '<div><h5>Notes</h5></div>' +
		                                '<ul class="list-group w-100">';

		                            for( let val in results.note){
		                                console.log(results.note[val])
		                                html +='<li class="list-group-item"><span class="text-primary">'+ results.note[val]['created_at'] +
		                                    '</span> '+ results.note[val]['notes']+'</li>'

		                            }
		                            html+= '</ul>'
		                            $("#noteId").html(html);
		                            $("#messageId").val(results.message.id);

		                            $(".edit-appointment").attr("data-id", results.message.id);

		                            $(".remove-appointment").attr("data-id",  results.message.id);

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

		            $('.edit-appointment').click(function(){
		                var id = $(this).attr("data-id");

		                $.ajax({
		                    type: 'GET',
		                    url: "/admin/message/"+ id,
		                    success: function (results) {
		                        var date = results.message.call_date.split(" ");
		                        console.log(date);

		                        $("#appointmentDetails").modal("hide");

		                        $("#oldAdminId").val(results.message.user_id);
		                        $("#oldFullNameId").val(results.message.name);
		                        $("#oldPhoneNumberId").val(results.message.phone_number);
		                        $("#oldEmailId").val(results.message.email);
		                        $("#oldDateId").val( date[0]);
		                        $("#oldTimeId").val(date[1]);
		                        $("#oldTitleId").val(results.message.title);
		                        $("#editMessageId").val(results.message.id);
		                        $("#oldDescriptionId").val(results.message.description);

		                        $('#updateMessage').modal('show');
		                        console.log(results.message.call_date);
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
		                    url:  "/admin/message/update",
		                    type:"PUT",
		                    data: data,
		                    success: function (results) {

		                        var date = results.call_date.split(" ");
		                        calendar.fullCalendar('renderEvent',
		                            {

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
		                    url: "/admin/message/create",
		                    type:"POST",
		                    data: data,
		                    success: function (results) {
		                        var date = results.call_date.split(" ");
		                        calendar.fullCalendar('renderEvent',
		                            {
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

		                    error:function (err, state) {
		                        console.log(JSON.parse(err.responseText))
		                        $("#appointments .text-danger").removeClass("d-none")
		                    }
		                });



		            })

		            $('.remove-appointment').click(function(){
		                var id = $(this).attr("data-id");
		                $("#appointmentDetails").modal("hide");
		                bootbox.confirm("Do you really want to delete record?", function (result) {
		                    if (result) {
		                        $.ajax(
		                            {
		                                url: "/admin/message/" + id,
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

		                if(newVal.length == 12){
		                    var token = "<?= csrf_token()?>";
		                    $.ajax({
		                        url: "message/user/data",
		                        method:"POST",
		                        data:{phone_number:newVal, _token: token},
		                        success: function (result) {
		                            if(result!=''){

		                                $('#fullNameId').val(result.full_name);
		                                $('#emailId').val(result.email);
		                            }
		                        },

		                        error:function (err,state) {
		                            console.log(err)
		                        }
		                    });
		                }

		            });


		        });




		        $('#oldPhoneNumberId').keyup(function() {

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


    @yield('js')
