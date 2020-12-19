
<li class="menu-item"><a href="{{ route('adminRec.changePassword')}}" >Change Password</a></li>
<li class="menu-item"><a href="{{ route('admin.message.index')}}" >Messages</a></li>
<li class="menu-item"><a href="{{ route('adminRec.client.list')}}" >User List</a></li>
<li class="menu-item"><a href="{{ route('adminRec.toDo.list')}}" >To Do List</a></li>
<li class="dropdown menu-item">
    <a href="{{ route('admins.bank.show')}}"  data-toggle="dropdown" >FURNISHERs/CRAs</a>
    <ul id="products-menu" class="dropdown-menu scrolled-content" role="menu">
        <li><a href="{{ route('admins.bank.show')}}">FURNISHERs/CRAs</a></li>
        <li><a href="{{ route('admins.bank.types')}}">FURNISHERs/CRAs TYPES</a></li>
    </ul>
</li>
