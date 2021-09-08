recipient = {
    id: '',
    type: '',
};

identifyUser = function(guest) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: '/chat/identify-user',
            type: "POST",
            data: guest,
            success: function(response) {
                resolve(response)
            },
            error: function(error) {
                console.log(error);
                reject(error)
            }
        })
    })
};

postNewMessage = function(recipient, message) {
    return new Promise(function(resolve, reject){
        $.ajax({
            url: "/chat/new-message",
            type: "POST",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                message: message,
                recipient_type: recipient.type,
                recipient_id: recipient.id
            },
            success: function(response) {
                resolve(response)
            },
            error: function(error){
              console.log(error);
                reject(error)
            }

        })
    })
};

getChatMessages = function(recipient, type) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: "/chat/get-chat-messages",
            data: {
                id: recipient,
                type: type
            },
            success: function(response){
                resolve(response)
            },
            error: function(error) {
                reject(error)
            }
        })
    });
};

connectToChannel = function(recipient, type) {
    window.Echo.channel(`LiveChat.${type}_${recipient}`)
        .listen("LiveChat", function(e){
            console.log(e)
            addMessageToChat(e.message);
        })
};

addAllMessages = function (data){
    $(".chat-content").html("");
    return $.each(data , function(index, message){

        addMessageToChat(message);
    });

};

addMessageToChat = function(message) {

    if ($(".chat-content").find(`[data-message-id='${message.id}']`).length > 0){
        return false;
    }
    var message_date = new Date(message.created_at);
    var time = message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
    var message_template = $("#chat-message-to-admin-template").html();
    if (message.type == 'from') {
        message_template = $("#chat-message-from-admin-template").html();
    }
    if (recipient.type == "guest" && message.private) {
        message_template = message_template.replace(/{message}/g, "<a href='/login'>Please Log in to see the answer</a>")
            .replace(/{time}/g, time)
            .replace(/{message-id}/g, message.id);
        $(".chat-content").append(message_template);
        return false;
    }
    message_template = message_template.replace(/{message}/g, message.message)
                                        .replace(/{time}/g, time)
                                        .replace(/{message-id}/g, message.id);
    $(".chat-content").append(message_template);
};

$(document).ready(function(){
    $(".open-chatbox").click(function(){
        $(".defined-user").hide();

        var guest = $(this).data("guestId"),
            user = $(this).data('userId');
        if(guest != '' || user != '') {
            recipient.type = user != ''? "user" : "guest";
            recipient.id =  user != '' ? user : guest;
            getChatMessages(recipient.id, recipient.type)
                .then(function(result){
                    return addAllMessages(result.messages)
                })
                .then(function(data){
                    $(".not-defined-user").hide();
                    $(".defined-user").show();
                    // $(".chat-popup").show();
                    // $(this).hide();
                    connectToChannel(recipient.id, recipient.type)
                }.bind(this));
            return false
        }
        // $(".chat-popup").show();
        // $(this).hide();
    });
    $('.us-phone').mask('(000) 000-0000');
    $(".not-defined-user form").validate({
        rules: {
            "email": {
                required: true,
                email: true
            },
            "message":{
                required: true
            },
            phone: {

            }
        },
        submitHandler: function(form) {
            event.preventDefault();
            form_data = $(form).serializeArray();
            data = {};
            $.each(form_data, function(key, el){
                data[el.name] = el.value;
            });

            identifyUser(data)
                .then(function(result){
                    addMessageToChat(result.message);
                    $(".not-defined-user").hide();
                    $(".defined-user").show();

                    recipient.id = result.guest.id;
                    recipient.type = 'guest';

                    connectToChannel(result.guest.id, "guest")
                })
                .catch(function(error){
                    console.log(error)
                })
        }
    });

    $(".defined-user form").submit(function(e){
        e.preventDefault();
        var message = $(this).find(".textinput").val();
        if(message != ''){
            postNewMessage(recipient, message)
                .then(function(data){
                    addMessageToChat(data.messages);
                    $(".defined-user form")[0].reset();
                })
        }


    });

    $(".close-chat").click(function(){
        $(".chat-popup").hide();
        $(".open-button").show();
    })
});
