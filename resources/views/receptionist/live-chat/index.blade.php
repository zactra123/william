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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

    $(document).on('click',".chatMessage", function(){
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var token = "<?= csrf_token()?>";

        $.ajax({
            url: "live-chat/chat-message",
            method:"POST",
            data:{id:id, type:type, _token: token},
            success: function (result) {

                html='<div class="chat-content">';
                for( let val in result.chatMessage){

                    var message_date = new Date(result.chatMessage[val]['created_at']);

                    if(result.chatMessage[val]['type'] == 'to'){
                        html += '<div class="row  pt-2" ><div class="col-6  align-left message"><div class="row">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="row">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'

                    }else{
                        html += '<div class="row  pt-2" ><div class="col-6 offset-6 align-left message darker" ><div class="row">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="row">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'
                    }
                }
                html+= '</div>'
                console.log(result)
                chatListHtml = '<div>';
                for( let val in result.chats){

                    if(result.chats[val]['type'] == 'User'){

                        chatListHtml += '<div class="list-group-item chatMessage" id='+result.chats[val]['type']+ result.chats[val]['id']+' data-id='+result.chats[val]['id']
                        chatListHtml +=  ' data-type='+result.chats[val]['type']+ '> <div class="row"><span><h3>'
                        chatListHtml += result.chats[val]['user_full_name']+'</h3></span>'
                        if(result.chats[val]['message'] != 0){
                            chatListHtml += '<span class="pl-2"><i class="fa fa-comment-o" aria-hidden="true"></i>'
                            chatListHtml += result.chats[val]['message']+'</span>'
                        }

                        chatListHtml += '</div> <div class="row"> <span>'+result.chats[val]['type']
                        chatListHtml += '</span></div></div>'


                    }else{
                        chatListHtml += '<div class="list-group-item chatMessage" id='+result.chats[val]['type']+ result.chats[val]['id']+' data-id='+result.chats[val]['id']
                        chatListHtml +=  ' data-type='+result.chats[val]['type']+ '> <div class="row"><span><h3>'
                        chatListHtml += result.chats[val]['full_name']+'</h3></span>'
                        if(result.chats[val]['message'] != 0){
                            chatListHtml += '<span class="pl-2"><i class="fa fa-comment-o" aria-hidden="true"></i>'
                            chatListHtml += result.chats[val]['message']+'</span>'
                        }

                        chatListHtml += '</div> <div class="row"> <span>'+result.chats[val]['type']
                        chatListHtml += '</span></div></div>'
                    }
                }

                chatListHtml += '</div>'

                $("#showChatMessage").html(html);
                $("#chatListId").html(chatListHtml);
                $("#recipientId").val(result.recipient.id);
                $("#recipientType").val(result.recipient.type);
                $("#chatAnswer").show()
                $("#"+type+id).css('background-color', '#adafb8')

            },

            error:function (err,state) {
                console.log(err)
            }
        });

    })

    $("#chatAnswer form").submit(function(e){
        e.preventDefault();

        var form = $(this).serializeArray(), data={};
        $.each(form, function(index, el){
            data[el.name] = el.value
        });
        $.ajax({
            url: '<?=route('receptionist.liveChat.create')?>',
            type:"POST",
            data: data,
            success: function (result) {
                html='<div>';
                for( let val in result.chatMessage){
                    var message_date = new Date(result.chatMessage[val]['created_at']);

                    if(result.chatMessage[val]['type'] == 'to'){
                        html += '<div class="row  pt-2" ><div class="col-6  align-left message"><div class="row">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="row">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'

                    }else{
                        html += '<div class="row  pt-2" ><div class="col-6 offset-6 align-left message darker" ><div class="row">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="row">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'
                    }
                }
                html+= '</div>'
                $("#showChatMessage").html(html);

                $("#recipientId").val(result.recipient.id);
                $("#recipientType").val(result.recipient.type);

                $("#chatAnswer form")[0].reset()

                $("#chatAnswer").show()
            },

            error:function (err, state) {

            }
        });

    })


})


</script>
