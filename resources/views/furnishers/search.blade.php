


<div class="col-md-12 pull-right mt-3">
    <form action="{{!empty($url) ? $url : '/admins/furnishers'}}" method="get">
        <div class="row mb-5">
            <div class="col-md-10">
                <div class="row">
                  <div class=" col-md-6">
                      <input type="text" name="term" value="{{request()->term}}" class="form-control autocomplete-search" placeholder="SEARCH...">
                  </div>
                  <div class="col-md-6">
                      <?php $types = \App\BankLogo::TYPES;  unset($types[40]); $types = $types + ['NON-BANK SBA LENDER' => 'NON-BANK SBA LENDER', 'BANK-SBA LENDER' => 'BANK-SBA LENDER']; asort($types)?>
                      {{-- {!! Form::select("types[]", [""=>"FILTER BY TYPE"] + $types, request()->types, ['multiple'=>'multiple', 'class'=>'form-control selectize-multiple', 'id' => "bank-type"]); !!} --}}
                      <select class="form-control selectize-multiple" multiple id="bank-type">
                        @foreach ($types as $key => $value)
                          <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-6 mt-3 state-filter hide">
                      <?php $states = \App\BankAddress::STATES;   asort($types)?>
                      {!! Form::select("states", [""=>"FILTER BY STATE"] + $states, request()->states, ['class'=>' form-control selectize-single state'] ); !!}
                  </div>

                  <div class="col-md-6 mt-3 pl-5">
                        <input class="form-check-input" type="checkbox" name="no_logo"  {{ request()->no_logo ? 'checked' : '' }}>
                        <label for="checkbox"> WITHOUT LOGO</label>
                  </div>

                </div>



            </div>
            <div class="col-md-2">
                <div class=" form-group">
                    <input type="submit" value="Search" class="form-control btn btn-primary">
                </div>
            </div>
        </div>


    </form>
</div>
