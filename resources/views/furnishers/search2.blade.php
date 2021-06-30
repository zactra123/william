<style>
    .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        list-style: none;
        font-size: 14px;
        text-align: left;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
    }

    .ui-autocomplete > li > div {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #333333;
        white-space: nowrap;
    }

    .ui-menu-item:hover {
        text-decoration: none;
        color: #262626;
        background-color: #f5f5f5;
        cursor: pointer;
    }

    .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .selectize-control{
      border: none;
    }
</style>

  

<div class="col-md-12 pull-right mt-3">
    <form action="{{!empty($url) ? $url : '/admins/furnishers'}}" method="get">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                  <div class=" col-md-4">
                      <input type="text" name="term" value="{{request()->term}}" class="form-control autocomplete-search" placeholder="SEARCH...">
                  </div>
                  <div class="col-md-4">
                      <?php $types = \App\BankLogo::TYPES;  unset($types[40]); $types = $types + ['NON-BANK SBA LENDER' => 'NON-BANK SBA LENDER', 'BANK-SBA LENDER' => 'BANK-SBA LENDER']; asort($types)?>
                      {!! Form::select("types[]", [""=>"FILTER BY TYPE"] + $types, request()->types, ['class'=>'selectize-type', 'id' => "bank-type"]); !!}

                  </div>
                  <div class="col-md-4 state-filter hide">
                      <?php $states = \App\BankAddress::STATES;   asort($types)?>
                      {!! Form::select("states", [""=>"FILTER BY STATE"] + $states, request()->states, ['class'=>' selectize-single state'] ); !!}
                  </div>

                </div>

                <div class="row m-2 pl-3">
                  <div class="form-group">
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

        if ($( ".autocomplete-search" ).length >0 ){

            $( ".autocomplete-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: '/admins/furnishers/parent-bank',
                        dataType: "json",
                        data: {
                            search_key: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function( event, ui ) {
                    ui.item.value = ui.item.name
                }
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" )
                    .attr( "data-value", item.name )
                    .append( item.name )
                    .appendTo( ul );
            };
        }
    });
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
  });
</script>
