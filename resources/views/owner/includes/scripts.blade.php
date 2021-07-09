		<!--- Clender js -->
		<script src="{{asset('/')}}assets/js/app-calendar.js"></script>
		<!--- JQuery min js -->
		<script src="{{asset('/')}}assets/plugins/jquery/jquery.min.js"></script>

		<!--- Datepicker js -->
		<script src="{{asset('/')}}assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!--- Bootstrap Bundle js -->
		<script src="{{asset('/')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js -->
		<script src="{{asset('/')}}assets/plugins/ionicons/ionicons.js"></script>

		<!--- Internal jquery.maskedinput js -->
		<script src="{{asset('/')}}assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

		<!--- Internal Spectrum-colorpicker js -->
		<script src="{{asset('/')}}assets/plugins/spectrum-colorpicker/spectrum.js"></script>

		<!--- Chart bundle min js -->
    <script src="{{asset('/')}}assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!--- Internal Sampledata js -->
    <script src="{{asset('/')}}assets/js/chart.flot.sampledata.js"></script>
    <!--- Index js -->
    <script src="{{asset('/')}}assets/js/index.js"></script>

		<!--- Moment js -->
		<script src="{{asset('/')}}assets/plugins/moment/moment.js"></script>

		<!--- JQuery sparkline js -->
		<script src="{{asset('/')}}assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Perfect-scrollbar js -->
		<script src="{{asset('/')}}assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="{{asset('/')}}assets/plugins/perfect-scrollbar/p-scroll.js"></script>


		<!--- Rating js -->
		<script src="{{asset('/')}}assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="{{asset('/')}}assets/plugins/rating/jquery.barrating.js"></script>

		<!--- Custom Scroll bar Js -->
		<script src="{{asset('/')}}assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>


		<!--- Sidebar js -->
		<script src="{{asset('/')}}assets/plugins/side-menu/sidemenu.js"></script>


		<!--- Right-sidebar js -->
		<script src="{{asset('/')}}assets/plugins/sidebar/sidebar.js"></script>
		<script src="{{asset('/')}}assets/plugins/sidebar/sidebar-custom.js"></script>

		<!--- Eva-icons js -->
		<script src="{{asset('/')}}assets/js/eva-icons.min.js"></script>
		<!-- form-elements js -->
		<script src="{{asset('/')}}assets/js/form-elements.js"></script>
		<!--- Scripts js -->
		<script src="{{asset('/')}}assets/js/script.js"></script>

		<!--- Custom js -->
		<script src="{{asset('/')}}assets/js/custom.js"></script>

		<!--- Switcher js -->
		<script src="{{asset('/')}}assets/switcher/js/switcher.js"></script>

		<script src="{{asset('/')}}assets/plugins/select2/js/select2.min.js"></script>

		<!--- Internal ion.rangeSlider.min js -->
		<script src="{{asset('/')}}assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
		<!--- Internal jquery-simple-datetimepicker js -->
		<script src="{{asset('/')}}assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
		<!--- Ionicons js -->
		<script src="{{asset('/')}}assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
		<!--- Internal Pickerjs js -->
		<script src="{{asset('/')}}assets/plugins/pickerjs/picker.min.js"></script>

			@if (Route::currentRouteName()=="admins.bank.show")

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



										<script type="text/html" id="confirmation">
								        <div>
								            <button class="cancel btn btn-secondary ">cancel</button>
								            <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
								        </div>
								    </script>

								    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
								    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
								    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
								    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>
								    <script>
								    $(document).ready(function () {
								            $(".go-to").click(function () {
								                var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
								                let url = new URL(window.location.href);
								                let params = new URLSearchParams(url.search.slice(1));

								                params.append('page', page);
								                url.search = params
								                location.href = url.toString()
								            })

								            $('.go-to-page').keypress(function (e) {
								                var key = e.which;
								                if(key == 13){
								                    var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
								                    let url = new URL(window.location.href);
								                    let params = new URLSearchParams(url.search.slice(1));
								                    params.append('page', page);
								                    url.search = params
								                    location.href = url.toString()
								                }
								            });


								            $('[data-toggle="popover"]').popover({
								                html:true,
								                title: "ARE YOU SURE?",
								                content: function() {
								                    var $this = $(this);
								                    return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'))
								                }
								            }).click(function (e) {
								                $('[data-toggle=popover]').not(this).popover('hide');
								            });

								            $(document).click(function (e) {
								                if ($('[data-toggle=popover]').has(e.target).length == 0 && (($('.popover').has(e.target).length == 0) || $(e.target).is('.cancel'))) {
								                    $('[data-toggle=popover]').popover('hide');
								                }
								            });

								            $(document).on('click',".delete-bank", function (e) {
								                var id = $(this).attr('data-id'),
								                token = $("meta[name='csrf-token']").attr("content");
								                $.ajax({
								                    url: "/admins/furnishers/logo/" + id,
								                    type: 'DELETE',
								                    data: {
								                        "id": id,
								                        "_token": token,
								                    },
								                    success: function () {
								                        location.reload();
								                    }
								                });
								            })
								            $(".selectize-type").selectize({plugins: ['remove_button']});
														// $('.selectize-multiple').selectize({ placeholder: "FILTER BY TYPE" });

								            // var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });
								        });

								    </script>



										<script>
										    $(document).ready(function($) {

										        $('.selectize-single').selectize({
										            selectOnTab: true,
										        });
										        $(document).on('change', '#bank-type' ,function() {
										            var bankType = $('#bank-type').val();
										            console.log(bankType)
										            if(bankType.includes("2") || bankType.includes("55")){
										                $('.state-filter').removeClass('hide');
										            }else{
										                $('.state-filter').addClass('hide');

										            }
										        })

										        if ($( ".autocomplete-search" ).length >0 ){

										            $( ".autocomplete-search" ).autocomplete({
										                source: function( request, response ) {
										                    $.ajax({
										                        url: '/admins/furnishers/parent-bank',
										                        dataType: "json",
										                        data: {
										                            search_key: request.term
										                        },
										                        success: function( data ) {
										                            response( data );
										                        }
										                    });
										                },
										                select: function( event, ui ) {
										                    ui.item.value = ui.item.name
										                }
										            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
										                return $( "<li>" )
										                    .attr( "data-value", item.name )
										                    .append( item.name )
										                    .appendTo( ul );
										            };
										        }
										    });
										    // In your Javascript (external .js resource or <script> tag)

										</script>

			@endif


			@if (Route::currentRouteName()=="admins.bank.edit")
				<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
				<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
				<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
				<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
				<script src="{{ asset('js/site/admin/banks.js') }}"></script>

				<script>
						$(document).ready(function ($) {

								$.validator.addMethod("extension", function (value, element, param) {
										param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
										return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
								}, "Please enter a value with a valid extension.");

								$('#bankInformation').validate({
										rules: {
												"logo": {
														extension: "jpg,jpeg,png"
												},
										},
										messages: {
												"logo": {
														extension: "You're only allowed to upload jpg or png images."
												},

										},
										errorPlacement: function (error, element) {
												error.insertAfter(element);
										}
								})
								$(".selectize-type").selectize({plugins: ['remove_button']})

						})
				</script>

				<script>
						$('.delete-furnisher').click(function (e) {
								e.preventDefault() // Don't post the form, unless confirmed

								bootbox.confirm({
										title: "Destroy  this FURNISHER/CRAs?",
										message: "Do you really want to delete this record?",
										buttons: {
												cancel: {
														label: '<i class="fa fa-times"></i> Cancel',
														className: 'btn-success'

												},
												confirm: {
														label: '<i class="fa fa-check"></i> Confirm',
														className: 'btn-danger'

												}
										},
										callback: function (result) {
												if (result) {
														$(e.target).closest('form').submit() // Post the surrounding form
												}
										}
								});
						});
				</script>


			@endif

			@if (Route::currentRouteName()=="admins.bank.create")

				    <script>
				        var types = {!!  json_encode($subTypes) !!};

				    </script>


				    <script type="text/html" id="sub_types_append">

				        <div class="col-md-4 remove_sub_type">

				            <input name="bank[additional_information][sub_type][]"  type="checkbox" value ="{value}">
				            {value}
				        </div>

				    </script>

				    <script type="text/html" id="addtional_address_template">
				        <formset class="additional_address">
				            <div class="row remove-address">
				                <div class="col-md-6"><label for="">Additional Address</label>  </div>
				                <div class="col-md-6 text-right">
				                    <button type="button" class="btn btn-danger mb-3">
				                        <i class="fa fa-remove"></i>
				                    </button>
				                </div>
				            </div>
				            <div class="col-md-12 addresses " id="address-additional_address-{i}">
				                <div class="row">
				                    <div class="form-group col-sm-12">
				                        {!! Form::text("bank_address[additional_address][{i}][name]", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
				                    </div>
				                </div>
				                <div class="row">
				                    {!! Form::hidden("bank_address[additional_address][{i}][type]", 'additional_address', ["class"=>"form-control"]) !!}

				                    <div class="form-group col-sm-5">
				                        {!! Form::text("bank_address[additional_address][{i}][street]",  null, ["class"=>"form-control street", "placeholder"=>"Street"]) !!}
				                    </div>
				                    <div class="form-group col-sm-3">
				                        {!! Form::text("bank_address[additional_address][{i}][city]",   null, ["class"=>"form-control city","placeholder"=>"City"]) !!}
				                    </div>
				                    <div class="form-group col-sm-2">
				                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][state]", 'State'); !!}--}}
				                        {!! Form::select("bank_address[additional_address][{i}][state]", $states,  null, ['class'=>'{class} state','placeholder' => 'State']); !!}
				                    </div>
				                    <div class="form-group col-sm-2">
				                        {{--                                            {!! Form::label("bank_address[{$k}][{$type}][zip]", 'Zip'); !!}--}}
				                        {!! Form::text("bank_address[additional_address][{i}][zip]",  null, ["class"=>"us-zip form-control", "placeholder"=>"Zip code"]) !!}
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="form-group col-sm-4">
				                        <div class="form-group col-sm-2 p-0">
				                            <img  class="responsive" src="{{asset('/')}}/images/phone.png">
				                        </div>
				                        <div class="form-group col-sm-10">
				                            {!! Form::text("bank_address[additional_address][{i}][phone_number]",null, ["class"=>"us-phone form-control phone", "placeholder"=>"Phone number"]) !!}
				                        </div>
				                    </div>
				                    <div class="form-group col-sm-4">
				                        <div class="form-group col-sm-2 p-0">
				                            <img  class="responsive" src="{{asset('/')}}/images/fax.png">
				                        </div>
				                        <div class="form-group col-sm-10">
				                            {!! Form::text("bank_address[additional_address][{i}][fax_number]", null, ["class"=>"us-phone form-control fax", "placeholder"=>"Fax number"]) !!}
				                        </div>
				                    </div>
				                    <div class="form-group col-sm-4">
				                        <div class="form-group col-sm-2 p-0">
				                            <img  class="responsive" src="{{asset('/')}}/images/email.png">
				                        </div>
				                        <div class="form-group col-sm-10">
				                            {!! Form::email("bank_address[additional_address][{i}][email]", null, ["class"=>"form-control email", "placeholder"=>"Email"]) !!}
				                        </div>
				                    </div>

				                </div>
				            </div>
				        </formset>
				    </script>

				    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
				    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
				    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
				    <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>

				    <script>
				        $(document).ready(function($) {
				            $.validator.addMethod("extension", function(value, element, param) {
				                param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
				                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
				            },"Please enter a value with a valid extension.");
				            $('#bankInformation').validate({
				                rules: {
				                    "logo": {
				                        extension: "jpg,jpeg,png"
				                    },
				                },
				                messages: {
				                    "logo": {
				                        extension: "You're only allowed to upload jpg or png images."
				                    },

				                },
				                errorPlacement: function(error, element) {
				                    error.insertAfter(element);
				                }
				            })
				            // $(".selectize-type").selectize({plugins: ['remove_button']})
				            var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });
				        })
				    </script>
			@endif

			
    @yield('js')
