<li class="nav-item"><a href="{{url('/client/details')}}">HOME</a></li>

@if(!empty(Auth::user()->clientDetails))
    @if(Auth::user()->clientDetails->registration_steps != 'registered')
    <li class="nav-item"><a href="{{route('client.details.edit', Auth::user()->id)}}">EDIT DETAILS</a></li>
    <li class="nav-item"><a href="{{route('client.addDriverSocial')}}">UPLOAD DL & SS </a></li>
    <li class="nav-item"><a href="{{route('client.credentials')}}">CREDENTIALS</a></li>
    @endif
@else
    <li class="nav-item"><a href="{{route('client.details.create')}}">ADD YOUR DETAILS</a></li>

@endif
