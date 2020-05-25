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
</style>



@section('content')
    <link href="{{ asset('css/receptionist/receptionist.css') }}" rel="stylesheet">

    @include('helpers.breadcrumbs', ['title'=> "RECEPTIONIST", 'route' => ["Home"=> '/owner',"CHAT" => "#"]])

    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="list-group list-group-horizontal">
                    <a class="list-group-item  active" href="{{route("receptionist.liveChat.index")}}" >My Messages <span class="badge badge-notify"> 8</span></a>
                    <a class="list-group-item " href="{{route("receptionist.liveChat.index", ["all"=>true])}}" >All Messages <span class="badge badge-notify"> 124</span></a>
                </div>
            </div>
        </div>
        <section class="ms-edu">
            <div class="container-fluid">

                <div class="page-content">
                        <div class="row justify-content-center m-0">
                            <aside class="sidebar col-md-3">
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item  active">
                                            <span>Clients</span>
                                            <span class="badge badge-notify"> 3</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>Not registered</span>
                                            <span class="badge badge-notify"> 5</span>
                                        </li>
                                    </ul>
                                </div>
                                <div id="chat-filters">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">newest</option>
                                            <option value="">unreads</option>
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
                                                    @if($chat->type == 'User')

                                                    <div class="list-group-item chatMessage " id="{{$chat->type}}{{$chat->id}}"
                                                         data-id="{{$chat->id}}" data-type="{{$chat->type}}" >
                                                        <div class="row">
                                                            <span class="pl-2"><h3>{{$chat->user_full_name??"FULL NAME"}}</h3></span>
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
                                                @elseif($chat->type == 'Guest')
                                                    <div class="list-group-item chatMessage " id="{{$chat->type}}{{$chat->id}}"
                                                         data-id="{{$chat->id}}" data-type="{{$chat->type}}" >

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
                                                @endif

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
                                            @csrf
{{--                                            <div class="form-group privateCheckBox">--}}
{{--                                                <div class="col-2  v-100 m-0 mb-2">--}}
{{--                                                    <label>Private Message</label>--}}
{{--                                                    <input type="hidden" name="private"  value="0">--}}
{{--                                                    <input class="form-control" type="checkbox" name="private"  value="1">--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
                                            <div class="form-group" style="height: 10%">


                                                <div class="form-group  v-100 m-0">
                                                    <input type="hidden" name="recipient_id" id="recipientId" >
                                                    <div class="form-group privateCheckBox">
                                                        <input type="hidden" name="recipient_type" id="recipientType" >
                                                        <input class="form-check-input" type="checkbox" name="private"  {{ old('private') ? 'checked' : '' }}>
                                                    </div>
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

@endsection
