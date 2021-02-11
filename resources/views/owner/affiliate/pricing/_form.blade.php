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
                                <input type="text" name="credit_card_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                    <input type="text"  name="credit_card_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                                </div>
                            </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                       <strong class="add_range" class="btn form-control" data-type="credit_card" id="add_credit_card_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                <div class="col-md-3 p-0">
                    <div class="priceName">
                        <div class="nameCA">
                            <label style="float: right">MIN $</label>
                        </div>
                        <div class="priceCA">
                            <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                            <label style="float: right">PRICE </label>
                        </div>
                        <div class="priceCA">
                            <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="charge_card_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="charge_card_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="charge_card" id="add_charge_card_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="sales_contract_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="sales_contract_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="sales_contract" id="add_sales_contract_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="unsecured_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="unsecured_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="unsecured" id="add_unsecured_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="line_credit_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="line_credit_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="line_credit" id="add_line_credit_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="home_equity_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="home_equity_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="home_equity" id="add_home_equity_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="education_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="education_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="education" id="add_education_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="education_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="utility_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="utility_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="utility" id="add_utility_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="utility_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="child_support_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="child_support_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="child_support" id="add_child_support_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="child_support">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="credit_cards_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="credit_cards_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_cards_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="credit_cards" id="add_credit_cards_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="credit_cards_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="charge_cards_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="charge_cards_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_cards_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="charge_cards" id="add_charge_cards_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="charge_cards_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="sales_contracts_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="sales_contracts_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contracts_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="sales_contracts" id="add_sales_contracts_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="sales_contracts_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="unsecured_cos[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="unsecured_cos[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_cos[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="unsecured" id="add_unsecured_s_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_s_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="line_credit_cos[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="line_credit_cos[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_cos[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="line_credit" id="add_line_credit_s_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_s_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="home_equitys_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="home_equitys_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equitys_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="home_equitys" id="add_home_equitys_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="home_equitys_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="educations_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="educations_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equitys_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="educations" id="add_educations_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="educations_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="utilitys_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="utilitys_cos[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utilitys_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="utilitys" id="add_utilitys_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="utilitys_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="child_supports_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="child_supports_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_supports_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="child_supports" id="add_child_supports_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="child_supports">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="credit_card_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="credit_card_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_card_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="credit_card" id="add_credit_card_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="credit_card_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="charge_card_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="charge_card_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_card_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="charge_card" id="add_charge_card_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="charge_card_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="sales_contract_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="sales_contract_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contract_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="sales_contract" id="add_sales_contract_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="sales_contract_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="unsecured_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="unsecured_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecured_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="unsecured" id="add_unsecured_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="line_credit_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="line_credit_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_credit_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="line_credit" id="add_line_credit_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="line_credit_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="home_equity_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="home_equity_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="home_equity" id="add_home_equity_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="home_equity_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="education_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="education_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equity_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="education" id="add_education_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="education_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="utility_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="utility_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utility_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="utility" id="add_utility_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="utility_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="child_support_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="child_support_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_support_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="child_support" id="add_child_support_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="child_support">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="credit_cardsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="credit_cardsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="credit_cardsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="credit_cardsd" id="add_credit_cardsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="credit_cardsd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="charge_cardsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="charge_cardsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="charge_cardsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="charge_cardsd" id="add_charge_cardsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="charge_cardsd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="sales_contractsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="sales_contractsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="sales_contractsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="sales_contractsd" id="add_sales_contractsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="sales_contractsd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="unsecuredsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="unsecuredsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="unsecuredsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="unsecuredsd" id="add_unsecuredsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="unsecured_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="line_creditsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="line_creditsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="line_creditsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="line_creditsd" id="add_line_creditsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="line_creditsd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="home_equitysd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="home_equitysd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equitysd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="home_equitysd" id="add_home_equitysd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="home_equitysd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="educationsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="educationsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="home_equitysd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="educationsd" id="add_educationsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="educationsd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="utilitysd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="utilitysd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="utilitysd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="utilitysd" id="add_utilitysd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="utilitysd_range">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                <input type="text" name="child_supportsd_co[0][minimum]" value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <input type="text"  name="child_supportsd_co[0][maximum]" value="{{ $pricing->collection[0]['maximum'] ?? $default->collection[0]['maximum']}}" class="collection" data-id="0"  id="max-0"title="MAXIMUM">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  name="child_supportsd_co[0][price]" value="{{ $pricing->collection[0]['percentage'] ?? $default->collection[0]['percentage']}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <strong class="add_range" class="btn form-control" data-type="child_supportsd" id="add_child_supportsd_0" data-id="0">ADD RANGE</strong>
                    </div>
                </div>
            </div>
            <div id="child_supportsd">

            </div>
            <div class="row pt-3">
                <div class="col-md-12 p-0">
                    <div class="col-md-3 p-0">
                        <div class="priceName">
                            <div class="nameCA">
                                <label style="float: right">MIN $</label>
                            </div>
                            <div class="priceCA">
                                <input type="text"  value="{{ $pricing->collection[0]['minimum'] ?? $default->collection[0]['minimum']}}" id="credit_card_charge_off_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label style="float: right">PRICE </label>
                            </div>
                            <div class="priceCA">
                                <input type="text"   id="credit_card_charge_off_price_val_last"class="collection" title="PRICE">
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                                    <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM">
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
                                        <input type="text"  name="collection[{{$i}}][maximum]" value="{{ $pricing->collection[$i]['maximum'] ?? $default->collection[$i]['maximum']}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


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
                                    <input type="text"  name="collection[{{$i}}][percentage]" value="{{ $pricing->collection[$i]['percentage'] ?? $default->collection[$i]['percentage']}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
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
                                    <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly>
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
                                        <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
                <strong class="add_range" class="btn form-control" data-type="{type}" data-id="{id}" id="add_{type}_{id}" >ADD RANGE</strong>

                <strong class="remove_range" class="btn form-control" data-type="{type}" data-id="{id}" id="remove_{type}_{id}">REMOVE RANGE</strong>
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
        $("#add_"+type+"_"+dataId).addClass("Hidden")
        $("#remove_"+type+"_"+dataId).addClass("Hidden")
        $("#"+type+"_charge_off_min_val_last").attr('name', type+'_co['+last+'][minimum]')
        $("#"+type+"_charge_off_price_val_last").attr('name', type+'_co['+last+'][price]')

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
        $("#add_"+type+"_"+id).removeClass("Hidden")
        $("#remove_"+type+"_"+id).removeClass("Hidden")
        $("#"+type+"_charge_off_min_val_last").attr('name', type+'_co['+last+'][minimum]')
        $("#"+type+"_charge_off_price_val_last").attr('name', type+'_co['+last+'][price]')
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


