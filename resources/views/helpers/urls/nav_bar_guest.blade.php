<li class="nav-item"><a href="{{url('/')}}">Home</a></li>
{{--<li class="nav-item"><a title="How It Works" href="{{route('howItWorks')}}">How It Works</a></li>--}}
<li class="nav-item"><a href="{{route('credit.education')}}">Credit Education</a></li>
<li class="nav-item"><a href="{{route('whoWeAre')}}">About Us</a></li>
<li class="nav-item"><a href="{{route('blog')}}">News Room</a></li>

@if (Auth::check())
  <li class="nav-item"><a href="{{ route('logout') }}">Logout</a></li>
@else
  <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>

  <li class="nav-item"><a href="{{ route('register') }}">Sign up</a></li>
@endif
