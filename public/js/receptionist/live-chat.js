
connectToChannel = function () {
    connectToChannel = function(user) {
        window.Echo.channel(`ReceptionistLiveChat.user_${user}`)
            .listen("LiveChat", function(e){
                console.log(e)
            })
    };
};

$(document).ready(function(){


    $(document).on('click',".chatMessage", function(){
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var token = $("meta[name='csrf-token']").attr("content");
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

    });

    $("#chatAnswer form").submit(function(e){
        e.preventDefault();

        var form = $(this).serializeArray(), data={};
        $.each(form, function(index, el){
            data[el.name] = el.value
        });
        $.ajax({
            url: '/receptionist/live-chat/answer',
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

    var user = $('#app').data("userId");
    if (user != ''){
        connectToChannel(user)
    }
    console.log(user)
});