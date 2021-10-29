<aside class="sidebar col-md-4 col-sm-12 col-12">
  <div class="sidebar__content">
    <ul class="side-nav list-group">
      <li class="list-group-item">
        <a href="{{ route('owner.reports.index')}}">
          <i class="fa fa-user-md"></i>
          <span class="ml-1">{{ zactra::translate_lang('REGISTERED CLIENTS') }}</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="#">
          <i class="fa fa-credit-card" aria-hidden="true"></i>

          <span class="ml-1">{{ zactra::translate_lang('TOTAL PAYMENTS COLLECTED') }}</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="#">
          <i class="fa fa-money" aria-hidden="true"></i>
          <span class="ml-1">{{ zactra::translate_lang('CURRENT PAYMENTS DUE') }}</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="#">
          <i class="fa fa-calendar" aria-hidden="true"></i>
          <span class="ml-1">{{ zactra::translate_lang('OVER DUE PAYMENTS') }}</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="#">
          <i class="fa fa-trash-o" aria-hidden="true"></i>
          <span class="ml-1">{{ zactra::translate_lang('TOTAL ITEMS REMOVED') }}</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
