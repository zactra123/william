$(document).ready(function(){
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
                }
            })
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
                    console.log(result)
                })
                .catch(function(error){
                    console.log(err)
                })
        })
    })
});


window.Echo.channel("LiveChat.1")
    .listen("LiveChat", function(e){
        console.log(e)
    })