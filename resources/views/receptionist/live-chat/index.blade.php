@extends('layouts.layout')





@section('content')
    <link href="{{ asset('css/receptionist/receptionist.css') }}" rel="stylesheet">

    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"CHAT" => "#"]])

    <section class="ms-working working-section section-padding">


        <div class="container mt-5 pt-5">
            <div class="p-2 m-0">
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
                            <div class="card m-0 p-0">
                                <div  id="scrollingDiv" class="card-body scrollDiv">
                                    <div class="card-body " id="showChatMessage"  >

                                    </div>

                                </div>

                                <div class="dropdown-divider"></div>

                                <div id="chatAnswer" style="display: none">

                                    {!! Form::open(['route' =>['receptionist.liveChat.create'], 'method' => 'POST', 'class' => 'v-100 p-2 m-1']) !!}
                                    @csrf
                                    <div class="row mb-2 privateCheckBox">

                                        <div class="col-2 pull-left  v-100 m-0 mb-2">
                                            <label>Private Message</label>
                                            <input class="form-check-input" type="checkbox" name="private"  value="private">

                                        </div>

                                    </div>
                                    <div class="row" style="height: 10%">


                                        <div class="col-10  v-100 m-0">
                                            <input type="hidden" name="recipient_id" id="recipientId" >
                                            <input type="hidden" name="recipient_type" id="recipientType" >
                                            <input class="form-check-input" type="checkbox" name="private"  {{ old('private') ? 'checked' : '' }}>
                                            <div class="comment-text-area">
                                                <textarea class="textinput"  name="answer" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-1 m-0 p-0">
                                            <button type="submit" class="btn btn-secondary m-0">
                                                Send message
                                            </button>
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



    <script src="{{ asset('js/receptionist/live-chat.js') }}"></script>


    <script id="receptionist-question-template" type="text/html">
        <div class="row  pt-2" data-message-id="{message-id}">
            <div class="col-6  align-left message">
                <div class="row">{message}</div>
                <div class="row">{time}</div>
            </div>
        </div>
    </script>


    <script id="receptionist-answer-template" type="text/html">
        <div class="row  pt-2" data-message-id="{message-id}">
            <div class="col-6 offset-6 align-left message darker">
                <div class="row">{message}</div>
                <div class="row">{time}</div>
            </div>
        </div>
    </script>

    <script id="receptionist-recipient-template" type="text/html">
        <div class="row  pt-2" data-message-id="{message-id}">
            <div class="col-6 offset-6 align-left message darker">
                <div class="row">{message}</div>
                <div class="row">{time}</div>
            </div>
        </div>
    </script>

@endsection
