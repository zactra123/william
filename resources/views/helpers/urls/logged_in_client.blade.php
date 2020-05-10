<li class="dropdown menu-item sign-hide" ><a href="#" onclick="location.href='{{ url('/client/details') }}'" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->email }}<span class="caret"></span></a>
    <ul id="products-menu" class="dropdown-menu registration mr-0 ml-0" role="menu">

    @if(!empty(Auth::user()->clientDetails))
            @if(Auth::user()->clientDetails->registration_steps != 'registered')
            <li class="menu-item sign-hide"><a href="{{route('client.details.edit', Auth::user()->id)}}">Edit details</a></li>
            <li class="menu-item sign-hide"><a href="{{route('client.addDriverSocial')}}">Upload DL & SS </a></li>
            <li class="menu-item sign-hide"><a href="{{route('client.credentials')}}">Credentials</a></li>
            @endif
        @else
            <li class="menu-item sign-hide"><a href="{{route('client.details.create')}}">Add your Details</a></li>
        @endif

        <li class="menu-item sign-hide"><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</li>
