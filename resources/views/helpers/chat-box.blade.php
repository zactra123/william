<link rel="stylesheet" href="/css/chat_box.css">

<button class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{Session::get("guest")}}" >Chat</button>
{{--<button class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{4}}" >Chat</button>--}}

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
<script src="{{ asset('js/guest-chat-box.js?v=2') }}" defer></script>

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