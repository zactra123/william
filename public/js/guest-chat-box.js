



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
                message: message,
                recipient_type: type,
                recipient_id: recipient
            },
            success: function(response) {
                resolve(response)
            },
            error: function(error){
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
        })
};

addAllMessages = function (data){
    return $.each(data , function(index, message){
        addMessageToChat(message);
    });

};

addMessageToChat = function(message) {
    var message_date = new Date(message.created_at);
    var time = message_date.toLocaleTimeString('en-US', {hour: "2-digit", minute: "2-digit" });
    var message_template = $("#chat-message-to-admin-template").html();
    if (message.type == 'from') {
        message_template = $("#chat-message-from-admin-template").html();
    }
    message_template = message_template.replace(/{message}/g, message.message)
                                        .replace(/{time}/g, time)
                                        .replace(/{message-id}/g, message.id);
    $(".chat-content").append(message_template);
};

$(document).ready(function(){
    $(".open-chatbox-btn").click(function(){
        var guest = $(this).data("guestId"),
            user = $(this).data('userId');
        if(guest != '' || user != '') {
            var type = guest != ''? "guest" : "user",
                recipient =  guest != '' ? guest : user;
            getChatMessages(recipient, type)
                .then(function(result){
                    return addAllMessages(result.messages)
                })
                .then(function(){
                    connectToChannel(recipient, type);
                    return true;
                })
                .then(function(data){
                    $(".not-defined-user").hide();
                    $(".defined-user").show();
                    $(".chat-popup").show();
                    $(this).hide();
                }.bind(this));
            return false
        }
        $(".chat-popup").show();
        $(this).hide();
    });

    //validate js avelacnel
    //stugel vor emaile u message partadir lracrac lini
    //
    $(".not-defined-user form").submit(function(e) {
        e.preventDefault();
        form = $(this).serializeArray();
        data = {};
        $.each(form, function(key, el){
            data[el.name] = el.value;
        });
        identifyUser(data)
            .then(function(result){
                addMessageToChat(result.message);
                $(".not-defined-user").hide();
                $(".defined-user").show();
                // connectToChannel(result.id)
            })
            .catch(function(error){
                console.log(error)
            })
    })

    $(".form-container").submit(function(){
       console.log("asdasd")
    });

    $(".close-chat").click(function(){
        $(".chat-popup").hide();
        $(".open-button").show();
    })
});

