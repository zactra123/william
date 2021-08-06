<link rel="stylesheet" href="/css/chat_box.css">

<div class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{Session::get("guest")}}" >
    <img src="/images/chat_logo_new.png" >
</div>
{{--<button class="open-button open-chatbox-btn" data-user-id="{{Auth::id()}}" data-guest-id="{{7}}" >Chat</button>--}}


<div class="chat-popup ms-chat-tab">
    <div class="not-defined-user ">
        <div class="chat-header text-white">
            Chat
            <button type="button" class="close close-chat">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="chat-content initial">
            <div class="message darker">
                <p class="text-white">You can write your questions on our online portal.
                    Our experts will help you find answers to your questions.</p>
            </div>
        </div>
        <section class="ms-user-account">
            <div class="col-12">
                <div class="ms-ua-box">
                    <div class="ms-ua-form">
                        <form>
                            @csrf
                            <div class="form-group">
                                    <input id="full_name" type="text" class="form-control" name="full_name" value="" placeholder="You full name" autofocus>
                            </div>
{{--                            <div class="form-group ">--}}
{{--                                --}}
{{--                            </div>--}}
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-6" style="margin: 0">
                                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="E-Mail Address">
                                    </div>
                                    <div class="col-md-1 text-white" style="margin: 0; padding: 0">
                                        OR
                                    </div>
                                    <div class="col-md-5">
                                        <input id="phone" type="text" class="form-control us-phone" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" name="message" required placeholder="write your message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="ms-ua-submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="defined-user">
        <div class="chat-header">
            Chat
            <button type="button" class="close close-chat">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="chat-content">
        </div>
        <section class="ms-user-account">
            <div class="col-12">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="ms-ua-box">
                    <form>
                        <div class="form-group">
                            <textarea class=" form-control textinput" placeholder="Type message.." name="message" ></textarea>
                        </div>
                        <div class="form-group">
                            <input clas type="submit" value="Send" class="ms-ua-submit">
                        </div>

                     </form>
                </div>

            </div>
        </section>
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
    <div class="message darker" data-message-id="{message-id}">
        <p>{message}</p>
        <span class="time-left">{time}</span>
    </div>
</script>
