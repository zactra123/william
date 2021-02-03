
<li><a href="{{ route('owner.reports.index')}}">REPORTS</a></li>


<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">USERS</a>
    <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
        <li><a href="{{ route('owner.admin.index')}}">ADMINS</a></li>
        <li><a href="{{ route('owner.receptionist.index')}}">RECEPTIONIST</a></li>
        <li><a href="{{ route('owner.client.index')}}" >CLIENTS</a></li>
        <li><a href="{{ route('owner.affiliate.index')}}" >AFFILIATES</a></li>
    </ul>
</li>

<li class="dropdown menu-item">
    <a href="{{ route('admins.bank.show')}}"  data-toggle="dropdown" >FURNISHERs/CRAs</a>
    <ul id="products-menu" class="dropdown-menu scrolled-content" role="menu">
        <li><a href="{{ route('admins.bank.show')}}">FURNISHERs/CRAs</a></li>
        <li><a href="{{ route('admins.bank.types')}}">FURNISHERs/CRAs TYPES</a></li>
        <li><a href="{{ route('admins.mortgage.days')}}">MORTGAGE JUDICIAL DAYS</a></li>
    </ul>
</li>


<li><a href="{{ url('owner/message')}}">MESSAGES</a></li>
<li><a href="{{ route('owner.affiliate.pricing')}}">PRICING</a></li>
<li><a href="{{route('owner.credit.education.index')}}">EDUCATIONS</a></li>
<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">SLOGANS</a>
    <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
        <li><a href="{{route('owner.slogans.index')}}">VIEW SLOGANS</a></li>
        <li><a href="{{route('owner.slogans.create')}}">ADD SLOGANS</a></li>
    </ul>
</li>
<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">FAQs</a>
    <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
        <li><a href="{{route('owner.faqs.index')}}">VIEW FAQs</a></li>
        <li><a href="{{route('owner.faqs.create')}}">ADD FAQs</a></li>

        <li><a href="{{route('owner.faqs.question')}}">QUESTION</a></li>

    </ul>
</li>
