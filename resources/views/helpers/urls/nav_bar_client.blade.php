<li><a href="{{url('/client/details')}}">Home</a></li>
@if(!empty(Auth::user()->clientDetails))
    <li ><a href="{{route('client.details.edit', Auth::user()->id)}}">Edit details</a></li>
@else
    <li><a href="{{route('client.details.create')}}">Add your Details</a></li>
@endif
<li ><a href="{{route('client.addDriverSocial')}}">Upload DL & SS </a></li>
<li><a href="{{route('client.credentials')}}">Credentials</a></li>