<link rel="stylesheet" href="/css/chat_box.css">

<button class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{Session::get("guest")}}" >Chat</button>
{{--<button class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{4}}" >Chat</button>--}}

<div class="chat-popup">
    <div class="not-defined-user">
        <div class="card-header">
          Chat
            <button type="button" class="close close-chat">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="chat-content initial">
            <div class="message darker">
                <p>You can write your questions on our online portal.
                    Our experts will help you find answers to your questions.</p>
            </div>
        </div>

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
                        <input id="phone" type="text" class="form-control us-phone" name="phone" placeholder="Phone Number">

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
        <div class="card-header">
            Chat
            <button type="button" class="close close-chat">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="chat-content">
        </div>
        <form class="form-container">

            <div class="d-inline">
                <div class="form-group row m-1">
                    <div class="col-md-10 m-0 p-0">
                        <div class="comment-text-area">
                            <textarea class="textinput" placeholder="Type message.." name="msg" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-2  p-1">
                        <button type="button" class="btn m-0 sendChatMessage" onclick="closeForm()">send</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>
<script src="{{ asset('/js/lib/jquery.validate.min.js') }}" defer></script>
<script src="{{ asset('/js/lib/jquery.mask.min.js') }}" defer></script>
<script src="{{ asset('/js/guest-chat-box.js?v=2') }}" defer></script>

<script id="chat-message-to-admin-template" type="text/html">
    <div class="message" data-message-id="{message-id}">
        <p>{message}</p>
        <span class="time-right">{time}</span>
    </div>
</script>
<script id="chat-message-from-admin-template" type="text/html">
    <div class="message darker" data-message-id="{data-message-id}">
        <p>{message}</p>
        <span class="time-left">{time}</span>
    </div>
</script>