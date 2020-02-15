<link rel="stylesheet" href="css/chat_box.css">

<button class="open-button open-chatbox-btn" >Chat</button>

<div class="chat-popup">
    <div class="chat-content">
        <div class="message">
            <p>Hello. How are you today?</p>
            <span class="time-right">11:00</span>
        </div>

        <div class="message darker">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-left">11:01</span>
        </div>
    </div>
    <form action="/action_page.php" class="form-container">

        <div class="d-inline">
            <textarea placeholder="Type message.." name="msg" required></textarea>
        </div>
        <div class="d-inline">
            <button type="button" class="btn" onclick="closeForm()">send</button>
        </div>

    </form>
</div>


<script>
    $(document).ready(function(){
        $(".open-chatbox-btn").click(function(){
            $(".chat-popup").show();
            $(this).hide();
        })
        $()
    })
</script>