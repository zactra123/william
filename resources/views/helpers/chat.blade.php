<style>
  #chat .chat-box-inner {
    height: 180px !important;
  }
  #chat .my-message {
    background-color: #eff3fc;
  }
  #chat .other-message {
    background-color: #feecea;
  }
  #email-error {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    margin-top: 15px !important;
  }
  .chat .body {
    background-color: #37c6f5;
  }
</style>
@php
  $guestid = '';
@endphp
@if (!null==(session()->get('guest')))
  @php
    $guestid = session()->get("guest");
  @endphp
  <input type="hidden" class="isguest" name="" value="{{ zactra::translate_lang('yes') }}" />
@else
  <input type="hidden" class="isguest" name="" value="{{ zactra::translate_lang('no') }}" />
@endif
<input type="hidden" class="sessionid" name="" value="{{ $guestid }}" />
<div class="chat" id="chat">
  <div class="header open-chatbox" id="chat_header" data-user-id="{{Auth::id()}}" data-guest-id="{{Session::get("guest")}}">
  <svg width="368" viewBox="0 0 368 52" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M26 22.5049C19.6 42.9049 6 50.0049 0 51.0049H368C352 49.5049 342 21.0049 341.5 21.5049C333.1 3.90485 315 -0.161814 307 0.00485253C223 0.171519 55 0.404853 55 0.00485253C37.4 0.404853 28.3333 15.1715 26 22.5049Z" fill="url(#paint0_linear)" />
    <defs>
      <linearGradient id="paint0_linear" x1="16.5" y1="26" x2="353" y2="26" gradientUnits="userSpaceOnUse">
        <stop stop-color="#F63565" />
        <stop offset="1" stop-color="#FA6642" />
      </linearGradient>
    </defs>
  </svg>
  <p>
    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M16.625 5.25H6.125C5.642 5.25 5.25 5.642 5.25 6.125C5.25 6.608 5.642 7 6.125 7H16.625C17.108 7 17.5 6.608 17.5 6.125C17.5 5.642 17.108 5.25 16.625 5.25Z" fill="white" />
      <path d="M13.125 8.75H6.125C5.642 8.75 5.25 9.142 5.25 9.625C5.25 10.108 5.642 10.5 6.125 10.5H13.125C13.608 10.5 14 10.108 14 9.625C14 9.142 13.608 8.75 13.125 8.75Z" fill="white" />
      <path d="M19.25 0H3.5C1.56975 0 0 1.56975 0 3.5V21C0 21.3395 0.196 21.6493 0.504 21.7927C0.62125 21.847 0.749 21.875 0.875 21.875C1.07625 21.875 1.27575 21.805 1.435 21.672L6.44175 17.5H19.25C21.1803 17.5 22.75 15.9303 22.75 14V3.5C22.75 1.56975 21.1803 0 19.25 0ZM21 14C21 14.9642 20.216 15.75 19.25 15.75H6.125C5.92025 15.75 5.7225 15.8218 5.565 15.953L1.75 19.1327V3.5C1.75 2.53575 2.534 1.75 3.5 1.75H19.25C20.216 1.75 21 2.53575 21 3.5V14Z" fill="white" />
      <path d="M24.5 7C24.017 7 23.625 7.392 23.625 7.875C23.625 8.358 24.017 8.75 24.5 8.75C25.466 8.75 26.25 9.53575 26.25 10.5V25.3032L23.296 22.9408C23.142 22.8183 22.9478 22.75 22.75 22.75H10.5C9.534 22.75 8.75 21.9642 8.75 21V20.125C8.75 19.642 8.358 19.25 7.875 19.25C7.392 19.25 7 19.642 7 20.125V21C7 22.9303 8.56975 24.5 10.5 24.5H22.442L26.5773 27.8092C26.7365 27.9352 26.9307 28 27.125 28C27.2528 28 27.3822 27.972 27.5047 27.9142C27.8075 27.7673 28 27.461 28 27.125V10.5C28 8.56975 26.4303 7 24.5 7Z" fill="white" />
    </svg>
    <span id="chat_header_hide_text">
      {{ zactra::translate_lang('Talk to us, we are online!') }}
    </span>
  </p>
</div>
<div class="body" id="chat_body">
  <div class="not-defined-user">
    <div class="chat-title">
      <h3 class="text-white">{{ zactra::translate_lang('Chat') }}</h3>
      <div id="chat_close" onclick="hidechatsystem()">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.1988 12.0197L23.5439 2.6743C24.1521 2.06642 24.1521 1.08357 23.5439 0.475685C22.936 -0.132195 21.9532 -0.132195 21.3453 0.475685L11.9999 9.82109L2.65474 0.475685C2.04658 -0.132195 1.064 -0.132195 0.456124 0.475685C-0.152041 1.08357 -0.152041 2.06642 0.456124 2.6743L9.80125 12.0197L0.456124 21.3651C-0.152041 21.973 -0.152041 22.9559 0.456124 23.5637C0.759068 23.867 1.15739 24.0193 1.55543 24.0193C1.95347 24.0193 2.35152 23.867 2.65474 23.5637L11.9999 14.2183L21.3453 23.5637C21.6485 23.867 22.0466 24.0193 22.4446 24.0193C22.8426 24.0193 23.2407 23.867 23.5439 23.5637C24.1521 22.9559 24.1521 21.973 23.5439 21.3651L14.1988 12.0197Z" fill="#94A2B3" />
        </svg>
      </div>
    </div>
    <div class="chat-content initial">
      <div class="message darker">
        <p class="text-white">{{ zactra::translate_lang('You can write your questions on our online portal. Our experts will help you find answers to your questions.') }}</p>
      </div>
    </div>
    <form action="" id="chat_form">
      @csrf
      <input type="text" name="full_name" value="" class="form-control" placeholder="{{ zactra::translate_lang('Your full name') }}" autofocus />
      <div class="contact">
        <label for="email" class="email-label">
          <input type="email" name="email" value="" id="email" class="form-control" placeholder="{{ zactra::translate_lang('E-mail Address') }}" />
        </label>
        <p class="text-white">{{ zactra::translate_lang('or') }}</p>
        <label for="phone" class="phone-label">
          <input type="tel" id="phone" name="phone" class="us-phone form-control" disabled placeholder="{{ zactra::translate_lang('Phone Number') }}" />
        </label>
      </div>
      <div class="textarea">
        <textarea name="message" placeholder="{{ zactra::translate_lang('Write your message') }}" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="form-submit mb-5">
        <input type="submit" value="{{ zactra::translate_lang('Submit') }}" />
      </div>
    </form>
  </div>
  <div class="defined-user">
    <div class="chat-title">
      <h3 class="text-white">{{ zactra::translate_lang('Chat') }}</h3>
      <div id="chat_close" onclick="hidechatsystem()">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.1988 12.0197L23.5439 2.6743C24.1521 2.06642 24.1521 1.08357 23.5439 0.475685C22.936 -0.132195 21.9532 -0.132195 21.3453 0.475685L11.9999 9.82109L2.65474 0.475685C2.04658 -0.132195 1.064 -0.132195 0.456124 0.475685C-0.152041 1.08357 -0.152041 2.06642 0.456124 2.6743L9.80125 12.0197L0.456124 21.3651C-0.152041 21.973 -0.152041 22.9559 0.456124 23.5637C0.759068 23.867 1.15739 24.0193 1.55543 24.0193C1.95347 24.0193 2.35152 23.867 2.65474 23.5637L11.9999 14.2183L21.3453 23.5637C21.6485 23.867 22.0466 24.0193 22.4446 24.0193C22.8426 24.0193 23.2407 23.867 23.5439 23.5637C24.1521 22.9559 24.1521 21.973 23.5439 21.3651L14.1988 12.0197Z" fill="#94A2B3" />
        </svg>
      </div>
    </div>
    <div class="chat-box">
      <div class="chat-box-inner chat-content"></div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form action="" id="chat_form">
      <div class="textarea">
        <textarea class="form-control textinput" placeholder="{{ zactra::translate_lang('Type message...') }}" class="form-control" name="message" cols="30" rows="1"></textarea>
      </div>
      <div class="form-submit mb-5 text-right">
        <input type="submit" class="float-right" value="{{ zactra::translate_lang('Send') }}" />
      </div>
    </form>
  </div>
</div>
</div>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
--}}
<script>
  var getguestid = $(".isguest").val();

  if (getguestid == "yes") {
    var guestid = $(".sessionid").val();

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
    var pusher = new Pusher("8ac5f99d033445cbcf73", {
      cluster: "ap2",
    });

    var channel = pusher.subscribe("LiveChat.guest_" + guestid);
    channel.bind("client_send_message", function (data) {
      // alert(JSON.stringify(data));
      if (data["message"]["recipient_id"] == guestid) {
        var message_template = $("#chat-message-to-admin-template").html();

        message_template = $("#chat-message-from-admin-template").html();

        message_template = message_template.replace(/{message}/g, data["message"]["message"]).replace(/{message-id}/g, data["message"]["id"]);
        $(".chat-content").append(message_template);
        // $('#scrollingDiv').scrollTop($('#scrollingDiv')[0].scrollHeight);
        $(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
        // $('.chat-box-inner').scrollTop($('.chat-box-inner')[0].scrollHeight);
        // $('.chat-content').scrollTop($('.chat-content')[0].scrollHeight);
      }
    });
  }
</script>
<script id="chat-message-to-admin-template" type="text/html">
  <div class="my-message message p-2" data-message-id="{message-id}">
    <p>{message}</p>
    <span class="time">{time}</span>
  </div>
</script>
<script id="chat-message-from-admin-template" type="text/html">
  <div class="other-message message darker p-2" data-message-id="{message-id}">
    <p>{message}</p>
    <span class="time">{time}</span>
  </div>
</script>

<script type="text/javascript">
  function hidechatsystem() {
    $(".body").removeClass("show");
  }
</script>
