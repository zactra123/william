@extends('layouts.layout')

<style>
    .list-group-horizontal .list-group-item
    {
        display: inline-block;
    }
    .list-group-horizontal .list-group-item
    {
        margin-bottom: 0;
        margin-left:-4px;
        margin-right: 0;
        border-right-width: 0;
    }
    .list-group-horizontal .list-group-item:first-child
    {
        border-top-right-radius:0;
        border-bottom-left-radius:4px;
    }
    .list-group-horizontal .list-group-item:last-child
    {
        border-top-right-radius:4px;
        border-bottom-left-radius:0;
        border-right-width: 1px;
    }
    .list-group-item>.badge-notify{
        background-color: red ;
    }
    .badge.badge-warning {
        background-color: red ;
    }
    .float-right {
        float: right;
    }
</style>



@section('content')
    <link href="{{ asset('css/receptionist/receptionist.css') }}" rel="stylesheet">

    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"CHAT" => "#"]])

    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="list-group list-group-horizontal">
                    <a class="list-group-item  {{Request()->all ? "" : "active"}}" href="{{route("receptionist.liveChat.index")}}" >My Messages
                        @if(array_sum($unreads))
                            <span class="badge badge-notify" id="userUnreds">{{array_sum($unreads)}}</span>
                        @endif
                    </a>
                    <a class="list-group-item {{Request()->all ? "active" : ""}}" href="{{route("receptionist.liveChat.index", ["all"=>true])}}" >All Messages
                        @if(array_sum($all_unreads))
                            <span class="badge badge-notify" id="allUserUnreds">{{array_sum($all_unreads)}}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
        <section class="ms-edu">
            <div class="container-fluid">

                <div class="page-content">
                        <div class="row justify-content-center m-0">
                            <aside class="sidebar col-md-3">
                                <div id="chat_type">
                                    <ul class="list-group">
                                        <li class="list-group-item  active" data-type="User">
                                            <span>Clients</span>
                                            @if(Request()->all)
                                                <span class="badge badge-notify" id="allClientMessageCount">{{!empty($all_unreads["App\User"]) ? $all_unreads["App\User"] :""}}</span>
                                            @else
                                                <span class="badge badge-notify" id="clientMessageCount">{{!empty($unreads["App\User"]) ? $unreads["App\User"] :""}}</span>
                                            @endif
                                        </li>
                                        <li class="list-group-item" data-type="Guest">
                                            <span>Guests</span>
                                            @if(Request()->all)
                                                <span class="badge badge-notify" id="allGuestMessageCount">{{!empty($all_unreads["App\Guest"]) ? $all_unreads["App\Guest"] :""}}</span>
                                            @else
                                                <span class="badge badge-notify" id="guestMessageCount">{{!empty($unreads["App\Guest"]) ? $unreads["App\Guest"] :""}}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div id="chat-filters">
                                    <div class="form-group">
                                        <select class="form-control" name="order">
                                            <option value="newest">newest</option>
                                            <option value="unreads">unreads</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name or Email">
                                    </div>
                                </div>
                                <div class="sidebar__content">
                                    <div class="side-nav list-group">
                                        <div class="card ">
                                            <div class="chatList scrollDiv" id="chatListId">
                                                @foreach($chats as $chat)
                                                    <div class="list-group-item chatMessage" id='{{$chat->recipient_type}}{{$chat->recipient_id}}'
                                                         data-id='{{$chat->recipient_id}}' data-type='{{$chat->recipient_type}}'>
                                                        <div class="form-group">
                                                            <span><h3>{{$chat->full_name??"Unnamed Guest"}}</h3></span>
                                                            @if($chat->message != 0)
                                                                <h3 class="badge badge-warning float-right">
                                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                                    {{$chat->message}}
                                                                </h3>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="text-link">
                                                                <a class="show_details" href="#showDetails" data-toggle="modal" data-id='{{$chat->recipient_id}}' data-type='{{$chat->recipient_type}}'>
                                                                    show details
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                        </div>
                                    </div>
                                </div>
                            </aside>

                            <div class="col-md-9">
                                <div class="card ">
                                    <div  id="scrollingDiv" class="card-body scrollDiv">
                                        <div class="card-body " id="showChatMessage"  >

                                        </div>

                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div id="chatAnswer" style="display: none">
                                        <div class="ms-ua-form">
                                            {!! Form::open(['route' =>['receptionist.liveChat.create'], 'method' => 'POST', 'class' => 'v-100 p-2 m-1']) !!}
{{--                                            @csrf--}}
                                            <div class="form-group" style="height: 10%">
                                                <div class="form-group  v-100 m-0">
                                                    <input type="hidden" name="recipient_id" id="recipientId" >
                                                    <input type="hidden" name="recipient_type" id="recipientType" >
                                                    <div class="comment-text-area">
                                                        <textarea class="textinput"  name="answer" placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <input type="hidden" name="direct" value="1" id="direct-to-user" disabled>
                                                        <input type="submit" value="Reply Directly To The Client" id="direct-answer" class="ms-ua-submit hidden">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <input type="submit" value="Send message" class="ms-ua-submit">
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal fade" id="showDetails" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <div  class="form-group">
                                <p> Full Name  <span id="showFullName"></span></p>
                            </div>
                            <div  class="form-group">
                                <p> Phone #  <span id="showPhoneNumber"></span></p>
                            </div>
                            <div  class="form-group">
                                <p> Social Security #  <span id="showSSN"></span></p>
                            </div>
                            <div  class="form-group">
                                <p> Address  <span id="showAddress"></span></p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </section>
    </section>



    <script src="{{ asset('js/receptionist/live-chat.js') }}"></script>


    <script id="receptionist-question-template" type="text/html">
        <div class="form-group  pt-2" data-message-id="{message-id}">
            <div class="col-6  align-left message">
                <div class="form-group">{message}</div>
                <div class="form-group">{time}</div>
            </div>
        </div>
    </script>


    <script id="receptionist-answer-template" type="text/html">
        <div class="form-group  pt-2" data-message-id="{message-id}">
            <div class="col-6 offset-6 align-left message darker">
                <div class="form-group">{admin_full_name}</div>
                <div class="form-group">{message}</div>
                <div class="form-group">{time}</div>
            </div>
        </div>
    </script>

    <script id="receptionist-recipient-template" type="text/html">
        <div class="form-group  pt-2" data-message-id="{message-id}">
            <div class="col-6 offset-6 align-left message darker">
                <div class="form-group">{message}</div>
                <div class="form-group">{time}</div>
            </div>
        </div>
    </script>

    <script id="recipient-list-user" type="text/html">
        <div class="list-group-item chatMessage" id='{recipient-identifier}' data-id='{recipient-id}' data-type='{recipient-type}'>
            <div class="form-group">
                <span><h3>{full_name}</h3></span>
                {unreads}
            </div>
            <div class="form-group">
                <div class="text-link">
                    <a class="show_details" href="#showDetails" data-toggle="modal" data-id='{recipient-id}' data-type='{recipient-type}'>
                        show details
                    </a>
                </div>
            </div>
        </div>
    </script>

    <script id="recipient-list-guest" type="text/html">
        <div class="list-group-item chatMessage" id='{recipient-identifier}' data-id='{recipient-id}' data-type='{recipient-type}'>
            <div class="form-group">
                <span class="h3 text-uppercase">{full_name}</span>
                {unreads}
            </div>
            <div class="form-group">
                {connected_user_details}
                <div class="text-link">
                    <a class="show_details" href="#showDetails" data-toggle="modal" data-id='{recipient-id}' data-type='{recipient-type}'>
                        show details
                    </a>
                </div>
            </div>
        </div>
    </script>

@endsection
