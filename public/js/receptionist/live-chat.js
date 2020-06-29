connectToChannel = function (user) {
    window.Echo.channel(`ReceptionistLiveChat.${user}`)
        .listen("ReceptionistLiveChat", function(e){
            var id = $('.active-user').attr('data-id');
            var type = $('.active-user').attr('data-type');
            var messageCount = ' ';
            var messageAllCount = ' ';
            var clientMessageCount = ' ';
            var allClientMessageCount = ' ';
            var guestMessageCount = ' ';
            var allGuestMessageCount = ' ';

            if(typeof(e.unreads['App\\User']) != "undefined" && e.unreads['App\\User'] !== null) {
                messageCount += e.unreads['App\\User'];
                clientMessageCount += e.unreads['App\\User'];
            }
            if(typeof(e.unreads['App\\Guest']) != "undefined" && e.unreads['App\\Guest'] !== null) {
                messageCount += e.unreads['App\\Guest'];
                guestMessageCount += e.unreads['App\\Guest'];
            }
            if(typeof(e.all_unreads['App\\User']) != "undefined" && e.all_unreads['App\\User'] !== null) {
                messageAllCount += e.all_unreads['App\\User'];
                allClientMessageCount += e.all_unreads['App\\User'];

            }
            if(typeof(e.all_unreads['App\\Guest']) != "undefined" && e.all_unreads['App\\Guest'] !== null) {
                messageAllCount += e.all_unreads['App\\Guest'];
                allClientMessageCount += e.all_unreads['App\\Guest'];
            }

            if( e.message['recipient_id'] == id &&  e.message['recipient_type'] == ('App\\'+ type)){
                addMessageToChat(e.message)
            }
            chatListHtml = '';

            $.each(e.recipient_lists, function( index, value ) {
                chatListHtml +=  addChatUserList(value);
            });

            console.log('fsd',chatListHtml,'dfgdfgdfg');

            $("#chatListId").html(chatListHtml);
            $("#"+type+id).addClass('active-user');
            $("#allMessageCount").html(messageCount);
            $("#userUnreds").html(messageCount);
            $("#allUserUnreds").html(messageAllCount);
            if(clientMessageCount != ' '){
                $("#clientMessageCount").html(clientMessageCount)
            }
            if(guestMessageCount != ' '){
                $("#guestMessageCount").html(guestMessageCount)
            }
            if(clientMessageCount != ' '){
                $("#allClientMessageCount").html(allClientMessafeCount)
            }
            if(allGuestMessageCount != ' '){
                $("#allGuestMessageCount").html(allGuestMessageCount)
            }

        })
};


addMessageToChat = function(message) {
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
                                        .replace(/{message-id}/g, message.id)
                                        .replace(/{admin_full_name}/g, message.admin.first_name + " " + message.admin.last_name);
    $("#showChatMessage").append(message_template);
    $('#scrollingDiv').scrollTop($('#scrollingDiv')[0].scrollHeight);

};

allChatList = function(chats) {
    chatListHtml = '';

    $.each(chats, function( index, value ) {
        chatListHtml +=  addChatUserList(value);
    });
    $("#chatListId").html(chatListHtml);
}

addChatUserList = function(chatUserList) {
    chatListHtml = $("#recipient-list-user").html()
    connected = ''
    if (chatUserList.recipient_type == "Guest") {
        chatListHtml = $("#recipient-list-guest").html()
        if (chatUserList.user_full_name) {
            connected = '<span class="text-info"> CONNECTED TO CLIENT: ' + chatUserList.user_full_name + '</span>'
        }
    }
    unreads = ''
    if (chatUserList.message != 0) {
        unreads += '<span class="badge badge-warning float-right"><i class="fa fa-comment-o" aria-hidden="true"></i>'
        unreads += chatUserList.message+'</span>'
    }



    chatListHtml = chatListHtml.replace(/{recipient-identifier}/g, chatUserList.recipient_type + chatUserList.recipient_id)
                               .replace(/{recipient-id}/g, chatUserList.recipient_id)
                               .replace(/{recipient-type}/g, chatUserList.recipient_type)
                               .replace(/{full_name}/g, chatUserList.full_name?? "Unnamed "+chatUserList.recipient_type)
                               .replace(/{unreads}/g, unreads)
                               .replace(/{connected_user_details}/g, connected)
    return chatListHtml

};

getChatInformations = function(data){
    return new Promise(function(resolve, reject) {
        $.ajax({
            // url: '/receptionist/live-chat',
            type: "GET",
            data: data,
            success: function(response) {
                resolve(response)
            },
            error: function(error) {
                console.log(error);
                reject(error)
            }
        })
    })
}


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
                show_direct_answer = false;
                if (result.chatMessage[0]["recipient_type"] == 'App\\Guest') {
                    show_direct_answer = !!result.chatMessage[0]["recipient"]["user"]
                }
                $("#direct-answer").toggleClass("hidden", !show_direct_answer)
                $("#showChatMessage").html("")
                $.each(result.chatMessage, function( index, value ) {
                    addMessageToChat(value)
                });
                chatListHtml = '';

                $.each(result.chats, function( index, value ) {
                    chatListHtml +=  addChatUserList(value);
                });

                //esi petq chi voncor
                if(type == "Guest"){
                    $(".privateCheckBox").hide();
                }else{ $(".privateCheckBox").show();}
                console.log(result.recipient);

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
    $("#direct-answer").on("click", function(){
        $("#direct-to-user").attr("disabled", false)
    })
    $("#chatAnswer form").submit(function(e){
        e.preventDefault();
        var form = $(this).serializeArray(), data={};
        $.each(form, function(index, el){
            data[el.name] = el.value
        });
        $("#direct-to-user").attr("disabled", true)

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

    $(document).on("click", "#chat_type li",function(){
        var type = $(this).attr("data-type")
        getChatInformations({"type": type})
            .then(function(response){
                $("#chat_type li").removeClass("active")
                $(this).addClass("active")
                allChatList(response.chats)
            }.bind(this))
            .catch(function(err){
                console.log(err)
            })
    });

    $(document).on("change keyup", "#chat-filters", function(){
        var data = {
            type: $("#chat_type li.active").attr("data-type"),
            order: $("#chat-filters select").val(),
            term: $("#chat-filters input").val()
        };

        getChatInformations(data)
            .then(function(response){
                allChatList(response.chats)
            })
            .catch(function(err){
                console.log(err)
            })
    });

    var user = $('#app').data("user");
    if (user != ''){
        connectToChannel(user)
    }
    console.log(user, 'hhhhh');
});
