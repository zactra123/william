
<li class="menu-item"><a href="{{ route('adminRec.changePassword')}}" >CHANGE PASSWORD</a></li>
<li class="menu-item"><a href="{{ route('admin.message.index')}}" >MESSAGES</a></li>
<li class="menu-item"><a href="{{ route('adminRec.client.list')}}" >CLIENT LIST</a></li>
<li class="menu-item"><a href="{{ route('adminRec.toDo.list')}}" >TO DO LIST</a></li>
<li class="dropdown menu-item">
    <a href="{{ route('admins.bank.show')}}"  data-toggle="dropdown" >FURNISHERs/CRAs</a>
    <ul id="products-menu" class="dropdown-menu scrolled-content" role="menu">
        <li><a href="{{ route('admins.bank.show')}}">FURNISHERs/CRAs</a></li>

    </ul>
</li>
