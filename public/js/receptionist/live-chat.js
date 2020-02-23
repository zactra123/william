
connectToChannel = function () {
    connectToChannel = function(user) {
        window.Echo.channel(`ReceptionistLiveChat.user_${user}`)
            .listen("LiveChat", function(e){
                console.log(e)
            })
    };
};

$(document).ready(function(){
    var user = $('#app').data("userId");
    if (user != ''){
        connectToChannel(user)
    }
    console.log(user)
});