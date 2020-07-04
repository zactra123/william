filters_params = {};

connectToChannel = function (user) {
    window.Echo.channel(`ReceptionistLiveChat.${user}`)
        .listen("ReceptionistLiveChat", function(e){
            var id = $('.active-user').attr('data-id');
            var type = $('.active-user').attr('data-type');
            var messageCount = null;
            var messageAllCount = null;
            var clientMessageCount = null;
            var allClientMessageCount = null;
            var guestMessageCount = null;
            var allGuestMessageCount = null;

            if(typeof(e.unreads['App\\User']) != "undefined" && e.unreads['App\\User'] !== null) {
                messageCount += e.unreads['App\\User'];
                clientMessageCount = e.unreads['App\\User'];
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
                allGuestMessageCount += e.all_unreads['App\\Guest'];
            }

            if( e.message['recipient_id'] == id &&  e.message['recipient_type'] == ('App\\'+ type)){
                addMessageToChat(e.message)
            }
            chatListHtml = '';

            $.each(e.recipient_lists, function( index, value ) {
                chatListHtml +=  addChatUserList(value);
            });


            $("#chatListId").html(chatListHtml);
            $("#"+type+id).addClass('active-user');
            $("#allMessageCount").html(messageAllCount);
            $("#userUnreds").html(messageCount);
            $("#allUserUnreds").html(messageAllCount);
            if(clientMessageCount != null){
                $("#clientMessageCount").html(clientMessageCount)
            }
            if(guestMessageCountconsole.log(result) != null){
                $("#guestMessageCount").html(guestMessageCount)
            }
            if(allClientMessageCount != null){
                $("#allClientMessageCount").html(allClientMessageCount)
            }
            if(allGuestMessageCount != null){
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

    $(document).on('click',".chatMessage", function(e){
        console.log($(e.target).hasClass("show_details"))
        if ($(e.target).hasClass("show_details")) {
            return false;
        }
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var token = $("meta[name='csrf-token']").attr("content");
        data = {id:id, type:type, _token: token}
        $.ajax({
            url: "live-chat/chat-message",
            method:"POST",
            data: {...filters_params, ...data},
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

                var clientMessageCount = null;
                var guestMessageCount = null;
                var allClientMessageCount = null;
                var allGuestMessageCount = null;
                var messageCount = null;
                var messageAllCount = null;

                if(typeof(result.unreads['App\\User']) != "undefined"){
                    var clientMessageCount = result.unreads['App\\User'];
                }else{clientMessageCount= ''; }

                if(typeof(result.unreads['App\\Guest']) != "undefined"){
                    var guestMessageCount = result.unreads['App\\Guest'];
                }else{guestMessageCount= ''; }

                if(typeof(result.all_unreads['App\\User']) != "undefined"){
                    var allClientMessageCount = result.all_unreads['App\\User'];
                }else{allClientMessageCount= ''; }

                if(typeof(result.unreads['App\\Guest']) != "undefined"){
                    var allGuestMessageCount = result.all_unreads['App\\Guest'];
                }else{allGuestMessageCount= ''; }

                if(allClientMessageCount !=''){
                    messageAllCount += allClientMessageCount;
                }
                if(allGuestMessageCount !=''){
                    messageAllCount += allGuestMessageCount;
                }
                if(messageAllCount==null){messageAllCount=''}

                if(clientMessageCount !=''){
                    messageCount +=clientMessageCount;
                }
                if(guestMessageCount !=''){
                    messageCount += guestMessageCount;
                }
                if(messageCount == null){messageCount=''}

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
                $("#"+type+id).addClass('active-user');

                $("#allMessageCount").html(messageAllCount);
                $("#userUnreds").html(messageCount);
                $("#allUserUnreds").html(messageAllCount);
                $("#clientMessageCount").html(clientMessageCount)
                $("#guestMessageCount").html(guestMessageCount)
                $("#allClientMessageCount").html(allClientMessageCount)
                $("#allGuestMessageCount").html(allGuestMessageCount)
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
        filters_params = { ...filters_params, "type": $(this).attr("data-type")}
        getChatInformations(filters_params)
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
        filters_params = {
            type: $("#chat_type li.active").attr("data-type"),
            order: $("#chat-filters select").val(),
            term: $("#chat-filters input").val()
        };

        getChatInformations(filters_params)
            .then(function(response){
                allChatList(response.chats)
            })
            .catch(function(err){
                console.log(err)
            })
    });

    $(document).on('click',".show_details", function() {
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var token = $("meta[name='csrf-token']").attr("content");

        data = {id:id, type:type, _token: token};
        $.ajax({
            url: "live-chat/show-details",
            method:"POST",
            data: data,
            success: function (result) {
                console.log(result,'654');
                var full_name = '';
                var phone_number = '';
                var ssn = '';
                var dob = '';
                var address = '';


                if(result.recipient_guest != null){
                    full_name = result.recipient_guest['full_name'];
                     phone_number = result.recipient_guest['phone'];
                    if(result.guest_user != null){
                        ssn = result.guest_user['client_details']['ssn'];
                        address = result.guest_user['client_details']['address'];
                    }
                }else if(result.recipient_guest != null){
                    full_name = result.recipien_user['first_name']+' '+result.recipien_user['last_name'];
                    phone_number = result.recipient_guest['phone_number'];
                    ssn = result.guest_user['ssn'];
                    address = result.guest_user['address'];

                }
                $("#showFullName").html(full_name);
                $("#showPhoneNumber").html(phone_number);
                $("#showSSN").html(ssn)
                $("#showAddress").html(address)

            },

            error:function (err,state) {
                console.log(err)
            }
        });


    })


    var user = $('#app').data("user");
    if (user != ''){
        connectToChannel(user)
    }
});
