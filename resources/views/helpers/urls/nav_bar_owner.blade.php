
<li><a href="{{ route('owner.reports.index')}}">Reports</a></li>
<li><a href="{{ route('owner.admin.list')}}">Admins</a></li>
<li><a href="{{ route('owner.receptionist.list')}}">Receptionist</a></li>
<li><a href="{{ url('owner/message')}}">Messages</a></li>
<li><a href="{{ route('owner.client.list')}}" >Clients</a></li>
<li><a href="{{route('owner.home.content')}}">Educations</a></li>
<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">Slogans</a>
    <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
        <li><a href="{{route('owner.slogans.index')}}"> View Slogans</a></li>
        <li><a href="{{route('owner.slogans.create')}}"> Add Slogans</a></li>
    </ul>
</li>
<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">FAQs</a>
    <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
        <li><a href="{{route('owner.faqs.index')}}"> View FAQs</a></li>
        <li><a href="{{route('owner.faqs.create')}}"> Add FAQs</a></li>

        <li><a href="{{route('owner.faqs.question')}}">Question</a></li>

    </ul>
</li>