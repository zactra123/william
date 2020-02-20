identifyUser = function(guest) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: '/identify-user',
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

postNewMessage = function(guest, message) {
    return new Promise(function(resolve, reject){
        $.ajax({
            url: "/guest/" + guest + "/new-messages",
            type: "POST",
            data: {
                message: message
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

getChatMessages = function(guest) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: "/guest/" + guest + "/get-chat-messages",
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

};

$(document).ready(function(){
    // connectToChannel(1)
    $(".open-chatbox-btn").click(function(){
        $(this).data("guestId");
        //yete data guest id uni  minagmic cuyc enq tallis defined-user
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
                addMessageToChat(result.message)
                // connectToChannel(result.id)
            })
            .catch(function(error){
                console.log(err)
            })
    })
    })

