connectToChannel = function (user) {
    window.Echo.channel(`ReceptionistLiveChat.${user}`)
        .listen("ReceptionistLiveChat", function(e){

            var id = $('.active-user').attr('data-id');
            var type = $('.active-user').attr('data-type');
            var messageCount = ' '
            messageCount += e.unreads

            console.log(e.message['recipient_id'] , id, e.message['recipient_type'] , type , e.message);

            if( e.message['recipient_id'] == id &&  e.message['recipient_type'] == type){
                console.log('ashxatuma bayc chi nakrum!!!!!');
                addMessageToChat(e.message)
            }

            chatListHtml = '';

            $.each(e.recipient_lists, function( index, value ) {
                chatListHtml +=  addChatUserList(value);
            });

            $("#chatListId").html(chatListHtml);
            $("#"+type+id).addClass('active-user');
            $("#allMessageCount").html(messageCount)
        })
};


addMessageToChat = function(message) {
    console.log(message)
    if ($("#showChatMessage").find(`[data-message-id='${message.id}']`).length > 0){
        return false;
    }
    var message_date = new Date(message['created_at']);
    var message_template = $("#receptionist-question-template").html();
    var time = message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
    if (message.type != 'to') {
        message_template = $("#receptionist-answer-template").html()
    }
    message_template = message_template.replace(/{message}/g, message.message)
                                        .replace(/{time}/g, time)
                                        .replace(/{message-id}/g, message.id);
    $("#showChatMessage").append(message_template);
    $('#scrollingDiv').scrollTop($('#scrollingDiv')[0].scrollHeight);

};


addChatUserList = function(chatUserList) {
    chatListHtml = ''
    chatListHtml += '<div class="list-group-item chatMessage" id=' + chatUserList.type + chatUserList.id + ' data-id='+chatUserList.id
    chatListHtml +=  ' data-type='+chatUserList.type+ '> <div class="form-group"><span><h3>'
    chatListHtml += chatUserList.full_name+'</h3></span>'
    if(chatUserList.message != 0){
        chatListHtml += '<span class="pl-2"><i class="fa fa-comment-o" aria-hidden="true"></i>'
        chatListHtml += chatUserList.message+'</span>'
    }

    chatListHtml += '</div> <div class="form-group"> <span>'+chatUserList.type
    chatListHtml += '</span>   <span class="pl-2">'+chatUserList.email+'</span></div></div>'
    return chatListHtml

};


$(document).ready(function(){
    $.ajax({
        url: "live-chat/unreads",
        method: "GET",

        success: function (result) {
            var messageCount = ' '
            messageCount += result
            $("#allMessageCount").html(messageCount)
        },

    });


    $(document).on('click',".chatMessage", function(){


        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var token = $("meta[name='csrf-token']").attr("content");

        console.log(token, 'asdadasd');

        $.ajax({
            url: "live-chat/chat-message",
            method:"POST",
            data:{id:id, type:type, _token: token},
            success: function (result) {


                $("#showChatMessage").html("")
                $.each(result.chatMessage, function( index, value ) {
                    addMessageToChat(value)
                });
                chatListHtml = '';

                $.each(result.chats, function( index, value ) {
                    chatListHtml +=  addChatUserList(value);
                });
                console.log(type);
                if(type == "Guest"){
                    $(".privateCheckBox").hide();
                }else{ $(".privateCheckBox").show();}

                $("#chatListId").html(chatListHtml);
                $("#recipientId").val(result.recipient.id);
                $("#recipientType").val(result.recipient.type);
                $("#chatAnswer").show()
                $("#"+type+id).addClass('active-user')

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
                        html += '<div class="form-group  pt-2" ><div class="col-6  align-left message"><div class="form-group">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="form-group">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'

                    }else{
                        html += '<div class="form-group  pt-2" ><div class="col-6 offset-6 align-left message darker" ><div class="form-group">'
                        html +=  result.chatMessage[val]['message']+'</div><div class="form-group">'
                        html += message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
                        html +=  '</div></div></div>'
                    }
                }
                html+= '</div>'
                $("#showChatMessage").html(html);
                $('#scrollingDiv').scrollTop($('#scrollingDiv')[0].scrollHeight);

                $("#recipientId").val(result.recipient.id);
                $("#recipientType").val(result.recipient.type);

                $("#chatAnswer form")[0].reset()

                $("#chatAnswer").show()
            },

            error:function (err, state) {

            }
        });

    })

    var user = $('#app').data("user");
    console.log(user)
    if (user != ''){
        connectToChannel(user)
    }
    console.log(user, 'hhhhh');
});
