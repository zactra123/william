<div class="col-md-9 pull-right">
    <form action="/admins/furnishers" method="get">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class=" form-group">
                    <input type="text" name="term" value="{{request()->term}}" class="form-control" placeholder="SEARCH...">
                </div>
                <div class="form-group">
                    <?php $types = \App\BankLogo::TYPES;   asort($types)?>
                    {!! Form::select("types[]", [""=>"FILTER BY TYPE"] + $types, request()->types, ['multiple'=>'multiple', 'class'=>' selectize', 'id' => "bank-type"]); !!}

                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="no_logo"  {{ request()->no_logo ? 'checked' : '' }}>
                    <label for="checkbox"> WITHOUT LOGO</label>
                </div>

            </div>
            <div class="col-md-4">
                <div class=" form-group">
                    <input type="submit" value="Search" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </form>
</div>
