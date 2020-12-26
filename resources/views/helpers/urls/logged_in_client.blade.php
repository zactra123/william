@if(!empty(Auth::user()->clientDetails))
    @if(Auth::user()->clientDetails->registration_steps != 'registered')
        <li class="menu-item sign-hide"><a href="{{route('client.details.edit', Auth::user()->id)}}">EDIT DETAILS</a></li>
        <li class="menu-item sign-hide"><a href="{{route('client.addDriverSocial')}}">UPLOAD DL & SS </a></li>
        <li class="menu-item sign-hide"><a href="{{route('client.credentials')}}">CREDENTIALS</a></li>
    @endif
@else
    <li class="menu-item sign-hide"><a href="{{route('client.details.create')}}">ADD YOUR DETAILS</a></li>
@endif
