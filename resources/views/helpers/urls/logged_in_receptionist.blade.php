<li class="dropdown menu-item sign-hide" ><a href="#" onclick="location.href='{{ url('/receptionist/message')}}'" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->email }}<span class="caret"></span></a>
    <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">


        <li class="menu-item sign-hide"><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }} <i class="fa fa-power-off"></i> </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</li>
