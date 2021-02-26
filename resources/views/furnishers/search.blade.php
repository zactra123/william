<div class="col-md-7 pull-right">
    <form action="/admins/furnishers" method="get">
        <div class="row">
            <div class="col-md-8">
                <div class=" form-group">
                    <input type="text" name="term" value="{{request()->term}}" class="form-control" placeholder="SEARCH...">
                </div>
                <div class="form-group">
                    <?php $types = \App\BankLogo::TYPES;   asort($types)?>
                    {!! Form::select("types[]", [""=>"FILTER BY TYPE"] + $types, request()->types, ['multiple'=>'multiple', 'class'=>' selectize-type', 'id' => "bank-type"]); !!}

                </div>
                <div class="form-group state-filter hide">
                    <?php $states = \App\BankAddress::STATES;   asort($types)?>
                    {!! Form::select("states", [""=>"FILTER BY STATE"] + $states, request()->states, ['class'=>'selectize-single state'] ); !!}

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


<script>
    $(document).ready(function($) {

        $('.selectize-single').selectize({
            selectOnTab: true,
        });
        $(document).on('change', '#bank-type' ,function() {
            var bankType = $('#bank-type').val();
            console.log(bankType)
            if(bankType.includes("2") || bankType.includes("55")){
                $('.state-filter').removeClass('hide');
            }else{
                $('.state-filter').addClass('hide');

            }
        })

    });
</script>
