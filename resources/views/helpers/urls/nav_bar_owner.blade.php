<li class="nav-item"><a href="{{ route('owner.reports.index')}}">{{ zactra::translate_lang('REPORTS') }}</a></li>
<li class="dropdown menu-item nav-item"><a href="#"  data-toggle="dropdown">{{ zactra::translate_lang('USERS') }}</a>
  <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
    <li class="nav-item"><a href="{{ route('owner.admin.index')}}">{{ zactra::translate_lang('ADMINS') }}</a></li>
    <li class="nav-item"><a href="{{ route('owner.receptionist.index')}}">{{ zactra::translate_lang('RECEPTIONIST') }}</a></li>
    <li class="nav-item"><a href="{{ route('owner.client.index')}}" >{{ zactra::translate_lang('CLIENTS') }}</a></li>
    <li class="nav-item"><a href="{{ route('owner.affiliate.index')}}" >{{ zactra::translate_lang('AFFILIATES') }}</a></li>
    <li class="nav-item"><a href="{{ route('owner.reviews.index')}}" >{{ zactra::translate_lang('REVIEWS') }}</a></li>
  </ul>
</li>
<li class="dropdown menu-item nav-item">
  <a href="{{ route('admins.bank.show')}}"  data-toggle="dropdown" >{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a>
  <ul id="products-menu" class="dropdown-menu scrolled-content" role="menu">
    <li class="nav-item"><a href="{{ route('admins.bank.show')}}">{{ zactra::translate_lang('FURNISHERs/CRAs') }}</a></li>
    <li class="nav-item"><a href="{{ route('admins.bank.types')}}">{{ zactra::translate_lang('FURNISHERs/CRAs TYPES') }}</a></li>
    <li class="nav-item"><a href="{{ route('admins.authority.index')}}">{{ zactra::translate_lang('AUTHORITIES') }}</a></li>
    <li class="nav-item"><a href="{{ route('admins.court.index')}}">{{ zactra::translate_lang('COURT') }}</a></li>
    <li class="nav-item"><a href="{{ route('admins.mortgage.days')}}">{{ zactra::translate_lang('MORTGAGE JUDICIAL DAYS') }}</a></li>
  </ul>
</li>
<li class="nav-item"><a href="{{ url('owner/message')}}">{{ zactra::translate_lang('MESSAGES') }}</a></li>
<li class="nav-item"><a href="{{ route('owner.affiliate.pricing')}}">{{ zactra::translate_lang('PRICING') }}</a></li>
<li class="nav-item"><a href="{{route('owner.credit.education.index')}}">{{ zactra::translate_lang('EDUCATIONS') }}</a></li>
<li class="dropdown menu-item"><a href="#"  data-toggle="dropdown">{{ zactra::translate_lang('SLOGANS') }}</a>
  <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
    <li><a href="{{route('owner.slogans.index')}}">{{ zactra::translate_lang('VIEW SLOGANS') }}</a></li>
    <li><a href="{{route('owner.slogans.create')}}">{{ zactra::translate_lang('ADD SLOGANS') }}</a></li>
  </ul>
</li>
<li class="dropdown menu-item nav-item"><a href="#"  data-toggle="dropdown">{{ zactra::translate_lang('FAQs') }}</a>
  <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
    <li><a href="{{route('owner.faqs.index')}}">{{ zactra::translate_lang('VIEW FAQs') }}</a></li>
    <li><a href="{{route('owner.faqs.create')}}">{{ zactra::translate_lang('ADD FAQs') }}</a></li>
    <li><a href="{{route('owner.faqs.question')}}">{{ zactra::translate_lang('QUESTION') }}</a></li>
  </ul>
</li>
