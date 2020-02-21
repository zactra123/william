



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
//
// connectToChannel = function(guest) {
//     window.Echo.channel("LiveChat.guest_"+ guest)
//         .listen("LiveChat", function(e){
//             console.log(e)
//         })
// };


addMessageToChat = function(message) {
    var message_template = $("#chat-message-to-admin-template").html();
    if (message.type == 'from') {
        message_template = $("#chat-message-to-admin-template").html();
    }
    message_template = message_template.replace(/{message}/g, message.message)
                                        .replace(/{time}/g, '11:00')//petqa poxvi
                                        .replace(/{message-id}/g, message.id)
    $(".chat-content").append(message_template);
};

$(document).ready(function(){
    // connectToChannel(1)
    $(".open-chatbox-btn").click(function(){
        guest = $(this).data("guestId");
        if(guest != '') {
            getChatMessages(guest, "Guest")
                .then(function(result){
                    console.log(result)
                })
            $(".not-defined-user").hide();
            $(".defined-user").show();
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
                console.log(result.message)
                addMessageToChat(result.message)
                $(".not-defined-user").hide();
                $(".defined-user").show();
                // connectToChannel(result.id)
            })
            .catch(function(error){
                console.log(error)
            })
    })
    })

