
<li class="menu-item nav-item"><a href="{{ route('adminRec.changePassword')}}" >{{ zactra::translate_lang('CHANGE PASSWORD') }}</a></li>
<li class="menu-item nav-item"><a href="{{ route('admin.message.index')}}" >{{ zactra::translate_lang('MESSAGES') }}</a></li>
<li class="menu-item nav-item"><a href="{{ route('adminRec.client.list')}}" >{{ zactra::translate_lang('CLIENT LIST') }}</a></li>
<li class="menu-item nav-item"><a href="{{ route('adminRec.toDo.list')}}" >{{ zactra::translate_lang('TO DO LIST') }}</a></li>
<li class="dropdown menu-item">
    <a href="{{ route('admins.bank.show')}}"  data-toggle="dropdown" >{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a>
    <ul id="products-menu" class="dropdown-menu scrolled-content" role="menu">
        <li><a href="{{ route('admins.bank.show')}}">{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a></li>

    </ul>
</li>
<li class="menu-item"><a href="{{ route('blog.index')}}" >{{ zactra::translate_lang('BLOG') }}</a></li>
