<div>
    <div class="form-group">
        <div class="row days hidden" id="state-{{$state->id}}">
            <div class="col-md-2" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right"> {{$state->name}}</label>
                    </div>
                    <input type="hidden" name="name" value="{{ $state->id}}">

                </div>
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">NOTICE OF DEFAULT DAYS</label>
                    </div>
                    <div class="price">
                        <input type="text" name="n_default_day" value="{{ $state->n_default_day}}"  title="NOTICE OFF DAYS">
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">NOTICE OF SALE MONTH</label>
                    </div>
                    <div class="price">
                        <input type="text" name="n_sale_day" value="{{ $state->n_sale_day}}"  title="NOTICE OF SALE MONTH">
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">AUCTION DAYS</label>
                    </div>
                    <div class="price">
                        <input type="text" name="auction_day" value="{{ $state->auction_day}}"  title="AUCTION DAYS">
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
