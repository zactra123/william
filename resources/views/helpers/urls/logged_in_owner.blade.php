<li class="dropdown menu-item sign-hide" ><a href="#" onclick="location.href='{{ url('/owner') }}'" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->email }}<span class="caret"></span></a>
    <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">

        <li class="menu-item"><a href="{{ route('owner.reports.index')}}">Reports</a></li>
        <li class="menu-item"><a href="{{ route('owner.admin.index')}}">Admin List</a></li>
        <li class="menu-item"><a href="{{ route('owner.receptionist.index')}}">Receptionist</a></li>
        <li class="menu-item"> <a href="{{ url('owner/message')}}">Messages</a> </li>
        <li class="menu-item"><a href="{{ route('owner.client.index')}}" >User List</a></li>
        <li class="menu-item"><a href="{{route('owner.home.content')}}">Credit Education</a></li>
        <li class="menu-item sign-hide"><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                LOG OUT  <i class="fa fa-power-off"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</li>
