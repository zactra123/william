@extends('owner.layouts.app')

@section('body')

    {{-- @include('helpers.breadcrumbs', ['title'=> "APPOINTMENT", 'route' => ["Home"=> '/owner',"APPOINTMENT" => "#"]]) --}}
    <div class="breadcrumb-header justify-content-between">
      <div>
          <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Messages</li>
              </ol>
            </nav>
      </div>

    </div>
    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="container mt-5 pt-5">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="container">
                                    <div class="row justify-content-center mb-5">
                                        <div class="list-group list-group-horizontal col-md-6">
                                            <a class="list-group-item list-group-item-action p-2 tab-selector active" href="{{route("owner.message.index")}}" >All Messages</a>
                                            <a class="list-group-item list-group-item-action p-2 tab-selector pending" href="{{route("owner.message.index", ["type" => "pending"])}}">Pending</a>
                                            <a class="list-group-item list-group-item-action p-2 tab-selector completed" href="{{route("owner.message.index", ["type" => "completed"])}}">Completed</a>
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
                                                <h4 class="modal-title" id="favoritesModalLabel">Message Details</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-none text-danger text-center font-italic" > All fields are required</div>
                                                <div class="ms-ua-form">
                                                    <form method="post" action="{{route('admin.message.create')}}">
                                                        @csrf
                                                        <input type="hidden" name="start_date" id="start_date">
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group phone_number_id">
                                                                <input class="form-control" type="text" name="phone_number" id="phoneNumberId" placeholder="Phone Number">
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group full_name_id">
                                                                <input class="form-control"  type="text" name="full_name" id="fullNameId" placeholder="Full Name">
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group email_id">
                                                                <input class="form-control"  type="email" name="email" id="emailId" placeholder="Email">
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group time_id">
                                                                <input class="form-control" type="time" name="time" id="timeId" placeholder="Time">
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="form-group title_id">
                                                            <input class="form-control" type="text" name="title" id="titleId" placeholder="Title">

                                                        </div>
                                                        <div class="form-group">

                                                            <textarea class="form-control" name="description" id="descriptionId" rows="6" placeholder="Description"> </textarea>

                                                        </div>

                                                        <div class="row" style="float:right">
                                                          <div class="col-md-12">
                                                            <input type="submit" value="Add Message" class="ms-ua-submit btn btn-primary">
                                                          </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="appointmentDetails" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="appointmentDetailsModalLabel">Appointment details</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div><span class="text-primary app_details">FULL NAME</span><span class="left" id="appointment-full_name"></span></div>
                                                <div><span class="text-primary app_details"><i class="fa fa-mobile-phone" style="padding-right: 15px"></i>PHONE NUMBER:</span><span class="left" id="appointment-phone"></span></div>
                                                <div><span class="text-primary app_details"><i class="fa fa-mail-reply" style="padding-right: 15px"></i>EMAIL:</span><span class="left" id="appointment-email"></span></div>
                                                <div><span class="text-primary app_details"><i class="fa fa-calendar" style="padding-right: 15px"></i>DATE:</span><span class="left" id="appointment-date"></span></div>
                                                <div class="overflow-auto h-25  app_details appointment-title" id="appointment-title">
                                                </div>
                                                <div class="overflow-auto h-25 app_details border rounded pb-3 appointment-desc" id="appointment-description">
                                                </div>
                                                <div class="note .overflow-vertical app_details" id="noteId">
                                                </div>


                                                <div class="addNote">

                                                    <div class="ms-ua-form">
                                                        <form method="POST" action="{{ route('admin.message.note') }}">
                                                            @csrf
                                                            <div class=" form-group message_id">
                                                                <input class="form-control" type="hidden" name="message_id" id="messageId" >
                                                            </div>
                                                            <div class="form-group ">
                                                                <textarea class="form-control" name="notes" id=""></textarea>
                                                            </div>
                                                            <div class="form-group ">
                                                                <input type="submit" value="Add" class="ms-ua-submit">
                                                            </div>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <div id="buttonCompleted"></div>

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
                                                <div class="ms-ua-form">
                                                    <form method="PUT" action="" id="updateMessageId">
                                                        @csrf

                                                        <div class="form-group phone_number_id">
                                                            <input class="form-control" type="text" name="phone_number" id="oldPhoneNumberId" placeholder="PHONE NUMBER">
                                                        </div>
                                                        <div class="form-group full_name_id">
                                                            <input class="form-control" type="text" name="full_name" id="oldFullNameId" placeholder="FULL NAME">

                                                        </div>
                                                        <input class="form-control" type="hidden" name="id" id="editMessageId" >

                                                        <div class="form-group email_id">
                                                            <input class="form-control" type="email" name="email" id="oldEmailId" placeholder="EMAIL">
                                                        </div>

                                                        <div class="form-group time_id">
                                                            <input class="form-control" type="date" name="date" id="oldDateId" placeholder="Date">

                                                        </div>
                                                        <div class=" form-group time_id m-1">
                                                            <input class="form-control" type="time" name="time" id="oldTimeId" placeholder="TIME">

                                                        </div>
                                                        <div class="form-group title_id">
                                                            <input class="form-control" type="text" name="title" id="oldTitleId" placeholder="TITLE">

                                                        </div>


                                                        <div class="form-group ">

                                                            <textarea class="form-control" name="description" id="oldDescriptionId" placeholder="DESCRIPTION"> </textarea>

                                                        </div>
                                                        <div class="form-group row mb-0">
                                                            <input type="submit" value="Add message" class="ms-ua-submit">
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

{{--    <div class="container mt-5 pt-5">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-10">--}}
{{--                <div class="container">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="list-group list-group-horizontal col-md-6">--}}
{{--                            <a class="list-group-item list-group-item-action p-1 tab-selector active" href="{{route("admin.message.index")}}" >All Messages</a>--}}
{{--                            <a class="list-group-item list-group-item-action p-1 tab-selector pending" href="{{route("admin.message.index", ["type" => "pending"])}}">Pending</a>--}}
{{--                            <a class="list-group-item list-group-item-action p-1 tab-selector completed" href="{{route("admin.message.index", ["type" => "completed"])}}">Completed</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="response">--}}

{{--                    </div>--}}
{{--                    <div id='calendar' class="card">--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="modal fad" id="appointments" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">--}}
{{--                    <div class="modal-dialog" role="document">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h4 class="modal-title" id="favoritesModalLabel">Message details</h4>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">Close</span> </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <div class="d-none text-danger text-center font-italic" > All fields are required</div>--}}

{{--                                <form method="post" action="{{route('admin.message.create')}}">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="start_date" id="start_date">--}}
{{--                                    <div class="phone_number_id m-1">--}}
{{--                                        <input type="text" name="phone_number" id="phoneNumberId" placeholder="PHONE NUMBER">--}}
{{--                                    </div>--}}
{{--                                    <div class="full_name_id m-1">--}}
{{--                                        <input type="text" name="full_name" id="fullNameId" placeholder="FULL NAME">--}}

{{--                                    </div>--}}
{{--                                    <div class="email_id m-1">--}}
{{--                                        <input type="email" name="email" id="emailId" placeholder="EMAIL">--}}
{{--                                    </div>--}}

{{--                                    <div class="time_id m-1">--}}
{{--                                        <input type="time" name="time" id="timeId" placeholder="TIME">--}}

{{--                                    </div>--}}
{{--                                    <div class="title_id m-1">--}}
{{--                                        <input type="text" name="title" id="titleId" placeholder="TITLE">--}}

{{--                                    </div>--}}
{{--                                    <div class="form-group row m-1">--}}

{{--                                        <textarea name="description" id="descriptionId" placeholder="DESCRIPTION"> </textarea>--}}

{{--                                    </div>--}}

{{--                                    <div class="form-group row mb-0">--}}
{{--                                        <div class="col-md-9 offset-md-5">--}}
{{--                                            <button type="submit" class="btn btn-primary">--}}
{{--                                                ADD MESSAGE--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="modal fad" id="appointmentDetails" tabindex="-1" role="dialog" aria-labelledby="appointmentDetailsModalLabel">--}}
{{--                    <div class="modal-dialog" role="document">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h4 class="modal-title" id="appointmentDetailsModalLabel">Appointment details</h4>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <div><span class="text-primary pr-1 pb-3">FULL NAME</span><span id="appointment-full_name"></span></div>--}}
{{--                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-mobile-phone pr-1"></i>PHONE NUMBER:</span><span id="appointment-phone"></span></div>--}}
{{--                                <div><span class="text-primary pr-1 pb-3">EMAIL:</span><span id="appointment-email"></span></div>--}}
{{--                                <div><span class="text-primary pr-1 pb-3"><i class="fa fa-calendar pr-1"></i>DATE:</span><span id="appointment-date"></span></div>--}}
{{--                                <div class="overflow-auto h-25  pr-1   pb-3 appointment-title" id="appointment-title">--}}
{{--                                </div>--}}
{{--                                <div class="overflow-auto h-25 border rounded pb-3 appointment-desc" id="appointment-description">--}}
{{--                                </div>--}}
{{--                                <div class="note overflow-auto" id="noteId">--}}
{{--                                </div>--}}

{{--                                <div class="addNote">--}}
{{--                                    <form method="POST" action="{{ route('admin.message.note') }}">--}}
{{--                                        @csrf--}}
{{--                                        <div class="message_id">--}}
{{--                                            <input type="hidden" name="message_id" id="messageId" >--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row m-1">--}}
{{--                                            <textarea name="notes" id=""></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row mb-0">--}}
{{--                                            <div class="col-md-9 offset-md-5">--}}
{{--                                                <button type="submit" class="btn btn-primary">Add</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}

{{--                                <div id="buttonCompleted"></div>--}}

{{--                            </div>--}}

{{--                            <div class="modal-footer">--}}
{{--                                <button class="btn btn-secondary edit-appointment" ><i class="fa fa-pencil"></i></button>--}}
{{--                                <button class="btn btn-danger remove-appointment"><i class="fa fa-trash-o"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="modal fade" id="updateMessage" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">--}}
{{--                    <div class="modal-dialog" role="document">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h4 class="modal-title" id="favoritesModalLabel">Edit message</h4>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">Close</span> </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body ">--}}
{{--                                <form method="PUT" action="" id="updateMessageId">--}}
{{--                                    @csrf--}}

{{--                                    <div class="phone_number_id m-1">--}}
{{--                                        <input type="text" name="phone_number" id="oldPhoneNumberId" placeholder="PHONE NUMBER">--}}
{{--                                    </div>--}}
{{--                                    <div class="full_name_id m-1">--}}
{{--                                        <input type="text" name="full_name" id="oldFullNameId" placeholder="FULL NAME">--}}

{{--                                    </div>--}}
{{--                                    <input type="hidden" name="id" id="editMessageId" >--}}

{{--                                    <div class="email_id m-1">--}}
{{--                                        <input type="email" name="email" id="oldEmailId" placeholder="EMAIL">--}}
{{--                                    </div>--}}

{{--                                    <div class="time_id m-1">--}}
{{--                                        <input type="date" name="date" id="oldDateId" placeholder="Date">--}}

{{--                                    </div>--}}
{{--                                    <div class="time_id m-1">--}}
{{--                                        <input type="time" name="time" id="oldTimeId" placeholder="TIME">--}}

{{--                                    </div>--}}
{{--                                    <div class="title_id m-1">--}}
{{--                                        <input type="text" name="title" id="oldTitleId" placeholder="TITLE">--}}

{{--                                    </div>--}}


{{--                                    <div class="form-group row m-1">--}}

{{--                                        <textarea name="description" id="oldDescriptionId" placeholder="DESCRIPTION"> </textarea>--}}

{{--                                    </div>--}}

{{--                                    <div class="form-group row mb-0">--}}
{{--                                        <div class="col-md-9 offset-md-5">--}}
{{--                                            <button type="submit" class="btn btn-primary">--}}
{{--                                                EDIT MESSAGE--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js" defer></script>







@endsection
