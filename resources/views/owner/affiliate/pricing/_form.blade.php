<style>

    .priceName{
        width: 100%;
        height: auto;
        padding: 0;
        float: left;
    }
    .price{
        width: 20%;
        height: auto;
        padding: 0;
        float: left;
    }
    .name{
        width: 80%;
        height: auto;
        padding: 0;
        float: left;
    }


    .priceCA{
        width: 40%;
        height: auto;
        padding: 0;
        float: left;
    }
    .nameCA{
        width: 60%;
        height: auto;
        padding: 0;
        float: left;
    }

</style>

<input type="hidden" name="user_id" value="{{$pricing->user_id}}">
<div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right"> INQUIRIES $</label>
                    </div>
                    <div class="price">
                        <input  type="text"  name="inquiries" value=""  title="INQUIRIES">
                    </div>
                </div>
                {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">PERSONAL INFO $</label>
                    </div>
                    <div class="price">
                        <input type="text" name="personal_info" value="{{ $pricing->personal_info ?? $default->personal_info}}"  title="PERSONAL INFO">
                    </div>
                </div>
                {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">FRAUD ALERTS $</label>
                    </div>
                    <div class="price">
                        <input type="text"  name="fraud_alerts" value="{{ $pricing->fraud_alerts ?? $default->fraud_alerts}}"  title="FRAUD ALERTS">
                    </div>
                </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">CREDIT CARD LATE $</label>
                    </div>
                    <div class="price">
                        <input  type="text"  name="cc_late" value=""  title="CREDIT CARD LATE">
                    </div>
                </div>
                {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">PERSONAL LOAN LATE $</label>
                    </div>
                    <div class="price">
                        <input type="text" name="p_loan_late" value=""  title="PERSONAL LOAN LATE">
                    </div>
                </div>
                {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">AUTO LOAN/LEASE LATE $</label>
                    </div>
                    <div class="price">
                        <input type="text"  name="auto_late" value=""  title="AUTO LOAN/LEASE LATE">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">MORTGAGE LATE  $</label>
                    </div>
                    <div class="price">
                        <input  type="text"  name="mortgage_late" value=""  title="MORTGAGE LATE ">
                    </div>
                </div>
                {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">PUBLIC RECORD $</label>
                    </div>
                    <div class="price">
                        <input type="text" name="public_records" value=""  title="PUBLIC RECORD">
                    </div>
                </div>
                {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">CREDIT CARD BLOCKING $</label>
                    </div>
                    <div class="price">
                        <input type="text"  name="auto_late" value=""  title="CREDIT CARD BLOCKING">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">CELL PHONE BLOCKING  $</label>
                    </div>
                    <div class="price">
                        <input  type="text"  name="cp_blocking" value=""  title="CELL PHONE BLOCKING ">
                    </div>
                </div>
                {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">AUTO LOAN/LEASE BLOCKING $</label>
                    </div>
                    <div class="price">
                        <input type="text" name="auto_blocking" value=""  title="AUTO LOAN/LEASE BLOCKING">
                    </div>
                </div>
                {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">PERSONAL LOAN BLOCKING $</label>
                    </div>
                    <div class="price">
                        <input type="text"  name="p_loan_blocking" value=""  title="PERSONAL LOAN BLOCKING">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">MORTGAGE BLOCKING  $</label>
                    </div>
                    <div class="price">
                        <input  type="text"  name="mortgage_blocking" value=""  title="MORTGAGE BLOCKING ">
                    </div>
                </div>
                {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">STUDENT LOAN BLOCKING $</label>
                    </div>
                    <div class="price">
                        <input type="text" name="student_loan_blocking" value=""  title="STUDENT LOAN BLOCKING">
                    </div>
                </div>
                {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-4" style="margin: 0">
                <div class="priceName">
                    <div class="name">
                        <label style="float: right">UNKNOWN $</label>
                    </div>
                    <div class="price">
                        <input type="text"  name="unknown" value=""  title="UNKNOWN">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="pt-5">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label style="float: right"> COLLECTIONS </label>
            </div>
        </div>
        @for($i = 0; $i < 4; $i++)
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-2 p-0" style="margin: 0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="collection[{{$i}}][minimum]" value="" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-2 " style="margin: 0">
                        @if($i < 3)
                            <div class="priceName">
                                <div class="nameCA">
                                    <label style="float: right">MAX $</label>
                                </div>
                                <div class="priceCA">
                                        <input type="text"  name="collection[{{$i}}][minimum]" value="" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


                                </div>
                            </div>
                        @endif
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-2" style="margin: 0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">% </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="collection[{{$i}}][percentage]" value="" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-2" style="margin: 0">
                        <div class="priceName">
                            <div class="namCA">
                                <label style="float: left">ADD FEE $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="collection[{{$i}}][additional_fee]" value=""  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-2" style="margin: 0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN/PRICE$</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="collection[{{$i}}][min_price]" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-2" style="margin: 0">
                        @if($i < 3)
                            <div class="priceName">
                                <div class="nameCA">
                                    <label style="float: right">MAX/PRICE$</label>
                                </div>
                                <div class="priceCA">
                                    <input type="text"  name="collection[{{$i}}][max_price]" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                </div>
                            </div>
                        @endif
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
