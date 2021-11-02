<li> <a href="{{ route('adminRec.changePassword')}}" >{{ zactra::translate_lang('CHANGE PASSWORD') }}</a> </li>
<li>
  <a href="{{ route('receptionist.liveChat.index')}}"> <span>{{ zactra::translate_lang('CHAT') }}</span>
    <span class="pl-1">
      <i class="fa fa-envelope" aria-hidden="true"></i>
    </span>
    @if(!empty($all_unreads))
      <span id="allMessageCount" class="pl-1"> {{array_sum(Auth::user()->unreads(["type" => "to"]))}}</span>
    @endif
  </a>
</li>
<li><a href="{{ route('adminRec.client.list')}}" >{{ zactra::translate_lang('CLIENT LIST') }}</a></li>
<li><a href="{{ route('adminRec.affiliate.list')}}" >{{ zactra::translate_lang('AFFILIATE LIST') }}</a></li>
<li><a href="{{ route('adminRec.toDo.list')}}" >{{ zactra::translate_lang('TO DO LIST') }}</a></li>
<li><a href="{{ route('admins.bank.show')}}">{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a></li>
