<li><a href="{{ url('receptionist/message') }}" class="branding pull-left">Home</a></li>
<li class="menu-item"><a href="{{ route('adminRec.changePassword')}}" >Change Password</a></li>


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
<li class="menu-item"><a href="{{ route('adminRec.client.list')}}" >Client List</a></li>
<li class="menu-item"><a href="{{ route('adminRec.affiliate.list')}}" >Affiliate List</a></li>
<li class="menu-item"><a href="{{ route('adminRec.toDo.list')}}" >To Do List</a></li>
