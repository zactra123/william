@extends('layouts.layout')





@section('content')
    <link href="{{ asset('css/receptionist/receptionist.css') }}" rel="stylesheet">

    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"CHAT" => "#"]])

    <section class="ms-working working-section section-padding">

        <section class="ms-edu ms-edu-desktop">
            <div class="container-fluid">

                <div class="page-content">
                        <div class="row justify-content-center m-0">
                            <aside class="sidebar col-md-3 scrollDiv">
                                <div class="sidebar__content">
                                    <div class="side-nav list-group">
                                        <div class="card ">
                                            <div class="chatList scrollDiv" id="chatListId">
                                                @foreach($chats as $chat)
                                                    <div class="list-group-item chatMessage " id="{{$chat->type}}{{$chat->id}}"
                                                         data-id="{{$chat->id}}" data-type="{{$chat->type}}" >
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <div class="row">
                                                            <span class="pl-2"><h3>{{$chat->full_name??"FULL NAME"}}</h3></span>
                                                            @if($chat->message != 0)
                                                                <h3 class="pl-2"><i class="fa fa-comment-o" aria-hidden="true">
                                                                    </i>{{$chat->message}}</h3>
                                                            @endif
                                                        </div>

                                                        <div class="row">
                                                            <span class="pl-2">{{$chat->type}}</span>
                                                            <span class="pl-2">{{$chat->email}}</span>
                                                        </div>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>

                            <div class="col-md-9">
                                <div class="card scrollDiv">
                                    <div  id="scrollingDiv" class="card-body scrollDiv">
                                        <div class="card-body " id="showChatMessage"  >

                                        </div>

                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div id="chatAnswer" style="display: none">
                                        <div class="ms-ua-form">
                                            {!! Form::open(['route' =>['receptionist.liveChat.create'], 'method' => 'POST', 'class' => 'v-100 p-2 m-1']) !!}
                                            @csrf
                                            <div class="form-group privateCheckBox">
                                                <div class="col-2  v-100 m-0 mb-2">
                                                    <label>Private Message</label>
                                                    <input class="form-control" type="checkbox" name="private"  value="private">

                                                </div>

                                            </div>
                                            <div class="form-group" style="height: 10%">


                                                <div class="form-group  v-100 m-0">
                                                    <input type="hidden" name="recipient_id" id="recipientId" >
                                                    <input type="hidden" name="recipient_type" id="recipientType" >
                                                    <input class="form-check-input" type="checkbox" name="private"  {{ old('private') ? 'checked' : '' }}>
                                                    <div class="comment-text-area">
                                                        <textarea class="textinput"  name="answer" placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Send message" class="ms-ua-submit">
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

@endsection
