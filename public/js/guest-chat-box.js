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
                console.log(error)
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

connectToChannel = function(guest) {
    window.Echo.channel("LiveChat.guest_1")
        .listen("LiveChat", function(e){
            console.log(e)
        })
};

$(document).ready(function(){
    $(".open-chatbox-btn").click(function(){
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
                connectToChannel(result.id)
            })
            .catch(function(error){
                console.log(err)
            })
    })
    })

