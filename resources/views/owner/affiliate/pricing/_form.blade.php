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


<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>PERSONAL INFORMATION AND STATEMENT</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right"> INQUIRIES $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}"  title="INQUIRIES">
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
    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>LATE PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CREDIT CARD LATE $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="credit_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CHARGE CARD LATE $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="charge_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT CARD $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUTO LOAN LATE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="auto_loan_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="MORTGAGE LATE ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUTO LEASE LATE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="auto_lease_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="MORTGAGE LATE ">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RECREATIONAL MERCHANDISE LATE$</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="r_m_late" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="CREDIT CARD BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UNSECURED LOAN LATE $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="unscured_loan_late" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="CELL PHONE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">LINE OF CREDIT LATE  $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="line_credit_late" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="AUTO LOAN/LEASE BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="scured_loan_late" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
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
                            <input  type="text"  name="mortgage_late" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mort_late" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">HOME EQUITY LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="home_equity_late" value="{{ $pricing->public_record ?? $default->public_record}}"  title="PUBLIC RECORD">
                        </div>
                    </div>
                    {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SALES CONTRACT LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="sale_contract_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">EDUCATION LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="education_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loc_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UTILITY COMPANY LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="utlity_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CHILD SUPPORT LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="child_support_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UNKNOWN LATE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>BLOCKING PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CREDIT CARD $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="credit_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CHARGE CARD $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="charge_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUTO LOAN  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="auto_loan_block" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="MORTGAGE LATE ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUTO LEASE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="auto_lease_block" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="MORTGAGE LATE ">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RECREATIONAL MERCHANDISE $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="r_m_block" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="CREDIT CARD BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UNSECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="unsecured_loan_block" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="CELL PHONE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">LINE OF CREDIT  $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="line_credit_block" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="AUTO LOAN/LEASE BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">MORTGAGE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">HOME EQUITY $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="home_equity_block" value="{{ $pricing->public_record ?? $default->public_record}}"  title="PUBLIC RECORD">
                        </div>
                    </div>
                    {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SALES CONTRACT $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="sale_contract_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">EDUCATION $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="education_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UTILITY COMPANY $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="utility_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CHILD SUPPORT $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="child_support_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">UNKNOWN BLOCKING$</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>CHARGE OFF PRICING NO RANGE</h3>
    </div>
    <div>
        <h3>REGULAR CHARGED OFF REMOVAL – NO SETTLEMENT </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">MORTGAGE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>REGULAR CHARGED OFF - REMOVAL AFTER SETTLEMENT  </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">MORTGAGE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>DOUBLED CHARGED OFF REMOVAL – NO SETTLEMENT </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">MORTGAGE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>DOUBLED CHARGED OFF - REMOVAL AFTER SETTLEMENT </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED CREDIT $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOAN $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">CONV. REAL ESTATE MTG $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">MORTGAGE  $</label>
                        </div>
                        <div class="price">
                            <input  type="text"  name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">FHA MORTGAGE $</label>
                        </div>
                        <div class="price">
                            <input type="text" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">RENTAL $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">SECURED LOC $</label>
                        </div>
                        <div class="price">
                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>REGULAR CHARGED OFF REMOVAL – NO SETTLEMENT PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>CREDIT CARD  </h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="credit_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : '' }}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label style="float: right">MAX $</label>
                                </div>
                                <div class="priceCA">
                                    <input type="text"  name="credit_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                                </div>
                            </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="credit_card_co" id="add_credit_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                <div class="col-md-3 p-0">
                    <div class="priceName">
                        <div class="nameCA">
                            <label style="float: right">MIN $</label>
                        </div>
                        <div class="priceCA">
                            <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3 ">
                    <div class="priceName">
                        <div class="nameCA">
                            <label style="float: right">MAX $</label>
                        </div>
                        <div class="priceCA">
                            <strong> INFINITE</strong>
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                    <div class="priceName">
                        <div class="nameCA">
                            <label style="float: right">PRICE  $</label>
                        </div>
                        <div class="priceCA">
                            <input type="text"   id="credit_card_co_price_last"class="collection" title="PRICE">
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHARGE CARD</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="charge_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_co" id="add_charge_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="charge_card_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> SALES CONTRACT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="sales_contract_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="sales_contract_co" id="add_sales_contract_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="sales_contract_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UNSECURED</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="unsecured_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="unsecured_co" id="add_unsecured_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="unsecured_co_price_last" class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>LINE OF CREDIT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="line_credit_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_co" id="add_line_credit_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="line_credit_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>HOME EQUITY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="home_equity_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="home_equity_co" id="add_home_equity_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="home_equity_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>EDUCATION</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="education_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="education_co" id="add_education_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="education_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="education_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UTILITY COMPANY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="utility_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="utility_co" id="add_utility_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="utility_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="utility_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHILD SUPPORT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="child_support_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="child_support_co" id="add_child_support_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="child_support_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="child_support_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <div class="form-group">
            <h4>AUTO LEASE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_lease_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_lease_co" id="add_auto_lease_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_lease_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_lease_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_loan_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_co" id="add_auto_loan_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_loan_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_loan_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>RECREATIONAL MERCHANDISE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="r_m_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_co" id="add_r_m_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="r_m_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="r_m_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>REGULAR CHARGED OFF - REMOVAL AFTER SETTLEMENT  PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>CREDIT CARD  </h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="credit_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="credit_card_s_co" id="add_credit_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHARGE CARD</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="charge_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_s_co" id="add_charge_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="charge_card_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> SALES CONTRACT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="sales_contract_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="sales_contract_s_co" id="add_sales_contract_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="sales_contract_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UNSECURED</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="unsecured_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="unsecured_s_co" id="add_unsecured_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="unsecured_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>LINE OF CREDIT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="line_credit_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_s_co" id="add_line_credit_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="line_credit_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>HOME EQUITY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="home_equity_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="home_equity_s_co" id="add_home_equity_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="home_equity_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>EDUCATION</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="education_s_co[0][minimum]" value="{{  isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="education_s_co" id="add_education_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="education_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="education_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UTILITY COMPANY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="utility_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="utility_s_co" id="add_utility_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="utility_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="utility_s_co_price_val_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHILD SUPPORT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="child_support_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="child_support_s_co" id="add_child_support_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="child_support_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_s_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="child_support_s_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <div class="form-group">
            <h4>AUTO LEASE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_lease_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_lease_s_co" id="add_auto_lease_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_lease_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_lease_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_loan_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_s_co" id="add_auto_loan_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_loan_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_loan_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>RECREATIONAL MERCHANDISE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="r_m_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_s_co" id="add_r_m_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="r_m_s_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="r_m_s_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>DOUBLED CHARGED OFF REMOVAL – NO SETTLEMENT  PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>CREDIT CARD  </h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="credit_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="credit_card_d_co" id="add_credit_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHARGE CARD</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="charge_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_d_co" id="add_charge_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="charge_card_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> SALES CONTRACT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="sales_contract_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="sales_contract_d_co" id="add_sales_contract_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="sales_contract_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UNSECURED</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="unsecured_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="unsecured_d_co" id="add_unsecured_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="unsecured_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>LINE OF CREDIT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="line_credit_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_d_co" id="add_line_credit_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="line_credit_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>HOME EQUITY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="home_equity_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="home_equity_d_co" id="add_home_equity_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="home_equity_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>EDUCATION</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="education_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="education_d_co" id="add_education_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="education_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="education_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UTILITY COMPANY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="utility_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="utility_d_co" id="add_utility_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="utility_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="utility_d_co_price_val_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHILD SUPPORT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="child_support_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="child_support_d_co" id="add_child_support_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="child_support_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_d_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="child_support_d_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group">
            <h4>AUTO LEASE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_lease_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_lease_d_co" id="add_auto_lease_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_lease_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_lease_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_loan_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_d_co" id="add_auto_loan_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_loan_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_loan_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>RECREATIONAL MERCHANDISE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="r_m_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_d_co" id="add_r_m_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="r_m_d_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="r_m_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>DOUBLED CHARGED OFF - REMOVAL AFTER SETTLEMENT PRICING</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>CREDIT CARD  </h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="credit_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="credit_card_sd_co" id="add_credit_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHARGE CARD</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="charge_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_sd_co" id="add_charge_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="charge_card_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> SALES CONTRACT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="sales_contract_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="sales_contract_sd_co" id="add_sales_contract_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="sales_contract_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UNSECURED</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="unsecured_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="unsecured_sd_co" id="add_unsecured_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="unsecured_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>LINE OF CREDIT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="line_credit_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_sd_co" id="add_line_credit_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="line_credit_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>HOME EQUITY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="home_equity_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="home_equity_sd_co" id="add_home_equity_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="home_equity_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>EDUCATION</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="education_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="education_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="education_sd_co" id="add_education_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="education_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="education_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>UTILITY COMPANY</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="utility_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="utility_sd_co" id="add_utility_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="utility_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="utility_sd_co_price_val_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>CHILD SUPPORT</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="child_support_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="child_support_sd_co" id="add_child_support_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="child_support_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_sd_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="child_support_sd_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div>
        <div class="form-group">
            <h4>AUTO LEASE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_lease_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_lease_sd_co" id="add_auto_lease_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_lease_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_lease_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_loan_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_sd_co" id="add_auto_loan_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_loan_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_loan_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>RECREATIONAL MERCHANDISE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="r_m_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_sd_co" id="add_r_m_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="r_m_sd_co_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="r_m_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>REPOSSESSION</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>AUTO LEASE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_lease_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_lease_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_lease_r" id="add_auto_lease_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_lease_r_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_r_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_lease_r_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="auto_loan_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="auto_loan_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_r" id="add_auto_loan_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="auto_loan_r_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_r_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="auto_loan_r_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>RECREATIONAL MERCHANDISE</h4>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text" name="r_m_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="r_m_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_r" id="add_r_m_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                    </div>
                </div>
            </div>
            <div id="r_m_r_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_r_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MAX $</label>
                            </div>
                            <div class="priceCA">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE  $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="r_m_r_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>COLLECTION PRICING</h3>
    </div>
    <div class="pt-5">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>UNKNOWN COLLECTION</label>
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
                                    {{-- <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM"> --}}
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text"   value="" id="min-price-{{isset($i) ? $i : ''}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text"   value="" id="max-price-{{isset($i) ? $i : ''}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CREDIT CARD  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text"   value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CHARGE CARD COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>MED FINANCE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>JEWELERY CARD COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>BUSINESS CARD COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>BUSINESS LOAN COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>PERSONAL LOAN COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>UTILITY  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CELLPHONE  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum'] ) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CHECK CASHING  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>PAYDAY  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CHECK GURANTEE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CABLE/INTERNET/TV COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>HOME SECURITY  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>RENT/LEASE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>HOA  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>AUTO LOAN  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>AUTO LEASE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>MOTORCYCLE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>AUTO INSURANCE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>SOLAR PROVIDER COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>HOUSEHOLD ITEM/APPLIANCE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text"   value="" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>TRUCK LOAN COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>EDUCATION LOAN COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>MORTGAGE COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>HELOC  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text"   value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>TIMESHARE/RESORT COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>IMMEGRATION LOAN  COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>CHILD/FAMILY SUPPORT COLLECTION</label>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    {{-- <input type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input type="text" value="" title="MAX PRICE" readonly>
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
</div>


<script type="text/html" id="charge_off_range">
    <div class="row pt-3" id="charge_{type}_{id}">
        <div class="col-md-12 p-0">
            <div class="col-md-3 p-0">
                <div class="priceName">
                    <div class="nameCA">
                        <label style="float: right">MIN $</label>
                    </div>
                    <div class="priceCA">
                        <input type="text" name="{type}[{id}][minimum]"  class="collection" data-id="{id}"   title="MINIMUM">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-3 ">
                <div class="priceName">
                    <div class="nameCA">
                        <label style="float: right">MAX $</label>
                    </div>
                    <div class="priceCA">
                        <input type="text"  name="{type}[{id}][maximum]"  class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-3">
                <div class="priceName">
                    <div class="nameCA">
                        <label style="float: right">PRICE $</label>
                    </div>
                    <div class="priceCA">
                        <input type="text"  name="{type}[{id}][price]" class="collection" data-id="0"  title="PRICE">
                    </div>
                </div>
                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-md-3">
                <strong class="add_range pr-5 h3" class="btn form-control" data-type="{type}" data-id="{id}" id="add_{type}_{id}" ><i class="fa fa-plus text-success"></i></strong>

                <strong class="remove_range h3" class="btn form-control" data-type="{type}" data-id="{id}" id="remove_{type}_{id}"><i class="fa fa-trash text-danger"></i></strong>
            </div>

        </div>
    </div>


</script>


<script type="text/javascript">


    $(document).on('click', '.add_range' ,function(){

        var type  = $(this).attr('data-type')
        var dataId  = $(this).attr('data-id')
        var id = parseInt(dataId) + 1
        var last = parseInt(dataId) + 2
        $("#add_"+type+"_"+dataId).addClass("hidden")
        $("#remove_"+type+"_"+dataId).addClass("hidden")
        $("#"+type+"_min_val_last").attr('name', type+'_co['+last+'][minimum]')
        $("#"+type+"_price_last").attr('name', type+'_co['+last+'][price]')

        var charge_off_range =  $("#charge_off_range").html()
        charge_off_range = charge_off_range.replace(/{type}/g, type)
            .replace(/{id}/g, id)
        $("#"+type+"_range").append(charge_off_range);
    })

    $(document).on('click', '.remove_range' ,function(){

        var type  = $(this).attr('data-type')
        var dataId  = $(this).attr('data-id')
        var id = parseInt(dataId) - 1
        var last = parseInt(dataId)
        $("#add_"+type+"_"+id).removeClass("hidden")
        $("#remove_"+type+"_"+id).removeClass("hidden")
        $("#"+type+"_min_val_last").attr('name', type+'_co['+last+'][minimum]')
        $("#"+type+"_price_last").attr('name', type+'_co['+last+'][price]')
        $("#charge_"+type+"_"+dataId).remove()

    })

</script>


{{--<div class="ms-ua-box">--}}

{{--        <input type="hidden" name="user_id" value="{{$pricing->user_id}}">--}}
{{--    <div>--}}
{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right"> INQUIRIES $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}"  title="INQUIRIES">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">PERSONAL INFO $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text" name="personal_info" value="{{ $pricing->personal_info ?? $default->personal_info}}"  title="PERSONAL INFO">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">FRAUD ALERTS $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="fraud_alerts" value="{{ $pricing->fraud_alerts ?? $default->fraud_alerts}}"  title="FRAUD ALERTS">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">CREDIT CARD LATE $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="cc_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">PERSONAL LOAN LATE $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text" name="p_loan_late" value="{{ $pricing->p_loan_late ?? $default->p_loan_late}}"  title="PERSONAL LOAN LATE">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">AUTO LOAN/LEASE LATE $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="auto_late" value="{{ $pricing->auto_late ?? $default->auto_late}}"  title="AUTO LOAN/LEASE LATE">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">MORTGAGE LATE  $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="mortgage_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="MORTGAGE LATE ">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">STUDENT LOAN LATE  $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="student_loan_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="MORTGAGE LATE ">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}

{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">CREDIT CARD BLOCKING $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="cc_blocking" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="CREDIT CARD BLOCKING">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">UTILITY  $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="utility_blocking" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="CELL PHONE BLOCKING ">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">AUTO LOAN BLOCKING $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text" name="auto_blocking" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="AUTO LOAN/LEASE BLOCKING">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">PERSONAL LOAN BLOCKING $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="p_loan_blocking" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">MORTGAGE BLOCKING  $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input  type="text"  name="mortgage_blocking" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">STUDENT LOAN BLOCKING $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text" name="student_loan_blocking" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">PUBLIC RECORD $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text" name="public_record" value="{{ $pricing->public_record ?? $default->public_record}}"  title="PUBLIC RECORD">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">CELL PHONE $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="cell_blocking" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}

{{--                <div class="col-md-4" style="margin: 0">--}}
{{--                    <div class="priceName">--}}
{{--                        <div class="name">--}}
{{--                            <label style="float: right">UNKNOWN $</label>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <input type="text"  name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="pt-5">--}}
{{--        <div class="form-group">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    <label style="float: right"> COLLECTIONS </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @for($i = 0; $i < 4; $i++)--}}
{{--                <div class="row pt-3">--}}
{{--                    <div class="col-md-12 p-0">--}}
{{--                        <div class="col-md-2 p-0" style="margin: 0">--}}
{{--                            <div class="priceName">--}}
{{--                                <div class="nameCA">--}}
{{--                                    <label style="float: right">MIN $</label>--}}
{{--                                </div>--}}
{{--                                <div class="priceCA">--}}
{{--                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2 " style="margin: 0">--}}
{{--                            @if($i < 3)--}}
{{--                                <div class="priceName">--}}
{{--                                    <div class="nameCA">--}}
{{--                                        <label style="float: right">MAX $</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="priceCA">--}}
{{--                                            <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2" style="margin: 0">--}}
{{--                            <div class="priceName">--}}
{{--                                <div class="nameCA">--}}
{{--                                    <label style="float: right">% </label>--}}
{{--                                </div>--}}
{{--                                <div class="priceCA">--}}
{{--                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2" style="margin: 0">--}}
{{--                            <div class="priceName">--}}
{{--                                <div class="namCA">--}}
{{--                                    <label style="float: left">ADD FEE $</label>--}}
{{--                                </div>--}}
{{--                                <div class="priceCA">--}}
{{--                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2" style="margin: 0">--}}
{{--                            <div class="priceName">--}}
{{--                                <div class="nameCA">--}}
{{--                                    <label style="float: right">MIN/PRICE$</label>--}}
{{--                                </div>--}}
{{--                                <div class="priceCA">--}}
{{--                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??--}}
{{--                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2" style="margin: 0">--}}
{{--                            @if($i < 3)--}}
{{--                                <div class="priceName">--}}
{{--                                    <div class="nameCA">--}}
{{--                                        <label style="float: right">MAX/PRICE$</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="priceCA">--}}
{{--                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??--}}
{{--                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endfor--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
