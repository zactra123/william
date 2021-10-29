<div class="col-md-12 pull-right mt-3">
  <form action="{{!empty($url) ? $url : '/admins/furnishers'}}" method="get">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
            <input type="text" name="term" value="{{request()->term}}" class="form-control autocomplete-search mmb-5" placeholder="{{ zactra::translate_lang('SEARCH...') }}" />
          </div>
          <div class="col-md-3">
            <?php
              $types = \App\BankLogo::TYPES;  unset($types[40]); $types = $types + ['NON-BANK SBA LENDER' => 'NON-BANK SBA LENDER', 'BANK-SBA LENDER' => 'BANK-SBA LENDER'];
              asort($types)
            ?>
            {!! Form::select("types[]", [""=>"FILTER BY TYPE"] + $types, request()->types, ['multiple'=>'multiple', 'class'=>'form-control mmb-5 selectize-multiple', 'id' => "bank-type"]); !!}
          </div>
          <div class="col-md-3 state-filter hide">
            <?php $states = \App\BankAddress::STATES;   asort($types)?>
            {!! Form::select("states", [""=>"FILTER BY STATE"] + $states, request()->states, ['class'=>' form-control mmb-5 selectize-single state'] ); !!}
          </div>
          <div class="col-md-3">
            <span class="ml-3"> <input class="form-check-input mt-2" type="checkbox" name="no_logo" {{ request()->no_logo ? 'checked' : '' }}> <label for="checkbox" class="mt-1">{{ zactra::translate_lang('Without Logo') }}</label></span>
            <input type="submit" value="{{ zactra::translate_lang('Search') }}" class="btn btn-primary" style="float: right;" />
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
