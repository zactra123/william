<link rel="stylesheet" href="css/chat_box.css">

<button class="open-button open-chatbox-btn" >Chat</button>

<div class="chat-popup">
    <div class="not-defined-user">
            <form  class="form-container ">
                @csrf
                <div class="form-group row m-1">
                    <div class="col-md-11">
                        <input id="full_name" type="text" class="form-control" name="full_name" value="" placeholder="You full name" autofocus>
                    </div>
                </div>
                <div class="form-group row m-1">
                    <div class="col-md-11">
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="E-Mail Address">
                    </div>
                </div>

                <div class="form-group row m-1">
                    <div class="col-md-11">
                        <input id="phone" type="text" class="form-control" name="phone" required placeholder="Phone Number">

                    </div>
                </div>
                <div class="form-group row m-1">
                    <div class="col-md-11">
                        <textarea  class="form-control" name="message" required placeholder="write your message"></textarea>

                    </div>
                </div>
                <div class="form-group row m-1">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
        </form>
    </div>
    <div class="defined-user">
        <div class="chat-content">
            <div class="message">
                <p>Hello. How are you today?</p>
                <span class="time-right">11:00</span>
            </div>

            <div class="message darker">
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
            </div>
            <div class="message">
                <p>Hello. How are you today?</p>
                <span class="time-right">11:00</span>
            </div>

            <div class="message darker">
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
            </div>
            <div class="message">
                <p>Hello. How are you today?</p>
                <span class="time-right">11:00</span>
            </div>

            <div class="message darker">
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
            </div>
        </div>
        <form class="form-container">

            <div class="d-inline">
                <textarea placeholder="Type message.." name="msg" required></textarea>
            </div>
            <div class="d-inline">
                <button type="button" class="btn" onclick="closeForm()">send</button>
            </div>

        </form>
    </div>
</div>


<script>
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
</script>