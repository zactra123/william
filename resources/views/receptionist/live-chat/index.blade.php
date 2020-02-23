@extends('layouts.receptionist')
<style>

    .comment-text-area {
        position: relative;
        float: left;
        width: calc(100%);

        height: 75%;
    }

    .textinput {
        position: relative;
        float:left;
        width: 100%;
        min-height: 35px;
        outline: none;
        resize: none;
        border: 1px solid #f0f0f0;
    }
    .card {
        min-height: 80vh !important;
        max-height: 85vh !important;
    }
    .chatList {
        min-height: 80vh !important;
        max-height: 100vh !important;
    }

    .chatMessage:hover{
        background-color: #adafb8;
    }

    .scrollDiv {
        height:auto;
        max-height:150%;
        overflow:auto;
    }

    .message {
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 0 10px;
        margin: 10px 1px 10px 10px;
        width: fit-content;
        float: right;
        min-width: 51%;
    }

    /* Darker chat container */
    .darker {
        border-color: #ccc;
        background-color: #ddd;
        margin: 10px 10px 10px 1px;
        float: left;
    }


</style>
@section('content')

<div class="p-2 m-0">
    <div class="page-content">
        <div class="row justify-content-center m-0">
            <aside class="sidebar col-md-3 scrollDiv">
                <div class="sidebar__content">
                    <div class="side-nav list-group">
                        <div class="card ">
                            <div class="chatList scrollDiv" id="chatListId">
                                @foreach($chats as $chat)

                                    @if($chat->type == "User")
                                        <div class="list-group-item chatMessage " id="{{$chat->type}}{{$chat->id}}"
                                             data-id="{{$chat->id}}" data-type="{{$chat->type}}" >
                                            <div class="row">
                                                <span class="pl-2"><h3>{{$chat->user_full_name}}</h3></span>
                                                @if($chat->message != 0)
                                                    <span class="pl-2"><i class="fa fa-comment-o" aria-hidden="true">

                                                </i>{{$chat->message}}</span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <span class="pl-2">{{$chat->type}}</span>
                                            </div>
                                        </div>

                                    @elseif($chat->type == "Guest")
                                        <div class="list-group-item chatMessage " id="{{$chat->type}}{{$chat->id}}"
                                             data-id="{{$chat->id}}" data-type="{{$chat->type}}" >
                                            <div class="row">
                                                <span class="pl-2"><h3>{{$chat->full_name}}</h3></span>
                                                @if($chat->message != 0)
                                                    <span class="pl-2"><i class="fa fa-comment-o" aria-hidden="true">

                                                </i>{{$chat->message}}</span>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <span class="pl-2">{{$chat->type}}</span>
                                            </div>

                                        </div>
                                    @endif

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-md-9">
                <div class="card m-0 p-0">
                    <div class="card-body scrollDiv">
                        <div class="card-body " id="showChatMessage">

                        </div>

                    </div>

                    <div class="dropdown-divider"></div>

                    <div id="chatAnswer" style="display: none">

                        {!! Form::open(['route' =>['receptionist.liveChat.create'], 'method' => 'POST', 'class' => 'v-100 p-2 m-1']) !!}
                        @csrf
                        <div class="row v-100 m-0" style="height: 10%">

                            <div class="col-11  v-100 m-0">
                                <input type="hidden" name="recipient_id" id="recipientId" >
                                <input type="hidden" name="recipient_type" id="recipientType" >

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

@endsection

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

<script>

</script>
