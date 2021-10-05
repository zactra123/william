<li class="nav-item"><a href="{{url('/client/details')}}">{{ zactra::translate_lang('HOME') }}</a></li>
@if(!empty(Auth::user()->clientDetails))
  @if(Auth::user()->clientDetails->registration_steps != 'registered')
  <li class="nav-item"><a href="{{route('client.details.edit', Auth::user()->id)}}">{{ zactra::translate_lang('EDIT DETAILS') }}</a></li>
  <li class="nav-item"><a href="{{route('client.addDriverSocial')}}">{{ zactra::translate_lang('UPLOAD DL & SS') }} </a></li>
  <li class="nav-item"><a href="{{route('client.credentials')}}">{{ zactra::translate_lang('CREDENTIALS') }}</a></li>
  @endif
@else
  <li class="nav-item"><a href="{{route('client.details.create')}}">{{ zactra::translate_lang('ADD YOUR DETAILS') }}</a></li>
@endif
