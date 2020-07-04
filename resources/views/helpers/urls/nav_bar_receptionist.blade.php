<li><a href="{{ url('receptionist/message') }}" class="branding pull-left">Home</a></li>

<li class="menu-item">
    <a href="{{ route('receptionist.liveChat.index')}}"> <span>Chat</span>
        <span class="pl-1">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
        @if(!empty($all_unreads))
            <span id="allMessageCount" class="pl-1"> {{array_sum(Auth::user()->unreads(["type" => "to"]))}}</span>
        @endif
    </a>

</li>
