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
        max-height: 80vh !important;
    }
    .chat-content {
        max-height: 90%;
        overflow-y: auto;
    }
    .chatMessage:hover{
        background-color: #adafb8;
    }

</style>
@section('content')

<div class="p-2">
    <div class="page-content">
        <div class="row justify-content-center">
            <aside class="sidebar col-md-3">
                <div class="sidebar__content">
                    <div class="side-nav list-group">
                        <div class="chatList" id="chatListId">
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
            </aside>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body" id="showChatMessage">

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

                    if(result.chatMessage[val]['type'] == 'to'){
                        html += '<div class="row  pt-2" ><div class="col-6  align-left border border-primary rounded" style="background-color: #adafb8">'
                        html +=  result.chatMessage[val]['message']
                        html += '</div></div>'

                    }else{
                        html += '<div class="row  pt-2" ><div class="col-6 offset-6 align-left border border-primary rounded" style="background-color: #b3d7f5 ">'
                        html +=  result.chatMessage[val]['message']
                        html += '</div></div>'
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

                    if(result.chatMessage[val]['type'] == 'to'){
                        html += '<div class="row  pt-2" ><div class="col-6  align-left border border-primary rounded" style="background-color: #adafb8">'
                        html +=  result.chatMessage[val]['message']
                        html += '</div></div>'

                    }else{
                        html += '<div class="row  pt-2" ><div class="col-6 offset-6 align-left border border-primary rounded" style="background-color: #b3d7f5 ">'
                        html +=  result.chatMessage[val]['message']
                        html += '</div></div>'
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
