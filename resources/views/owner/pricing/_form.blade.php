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

</style>

<input type="hidden" name="user_id" value="{{$pricing->user_id}}">
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
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                     <label style="float: right">CC ACCNT BLOCKING $</label>
                </div>
                <div class="price">
                    <input type="text"  name="cc_accnt_bloking" value="{{ $pricing->cc_accnt_bloking ?? $default->cc_accnt_bloking }}"  title="CC ACCNT BLOCKING">
                </div>
            </div>
            {!! $errors->first('cc_accnt_bloking', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO BLOCKING $</label>
                </div>
                <div class="price">
                    <input type="text" class="form-control " name="auto_blocking" value="{{ $pricing->auto_blocking ?? $default->auto_blocking }}"  title="AUTO BLOCKING">
                </div>
            </div>
                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MORTGAGE BLOCKING $</label>
                </div>
                <div class="price">
                    <input type="text" class="form-control " name="mortgage_blocking" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking }}"  title="MORTGAGE BLOCKING">
                </div>
            </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">P. LOAN CLOCKING $</label>
                </div>
                <div class="price">
                    <input type="text"  name="p_loan_blocking" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="P. LOAN BLOCKING">
                </div>
            </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">STUDENT LOAN BLOCKING $</label>
                </div>
                <div class="price">
                    <input type="text"  name="student_loan_blocking" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                </div>
            </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CC LATE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="cc_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CC LATE">
                </div>
            </div>
                   {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO LATE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_late" value="{{ $pricing->auto_late ?? $default->auto_late}}"  title="AUTO LATE">
                </div>
            </div>
                    {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MORTGAGE LATE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="mortgage_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}" title="MORTGAGE LATE">
                </div>
            </div>
                    {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">STUDENT LOAN LATE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="student_loan_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}" title="STUDENT LOAN LATE">
                </div>
            </div>
            {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">STUDENT LOAN CHARGED OFF $</label>
                </div>
                <div class="price">
                    <input type="text"  name="student_loan_charged_off" value="{{ $pricing->student_loan_charged_off ?? $default->student_loan_charged_off}}"  title="STUDENT LOAN LATE">
                </div>
            </div>
            {!! $errors->first('student_loan_charged_off', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CC CHARGED OFF $</label>
                </div>
                <div class="price">
                    <input type="text"  name="cc_charged_off" value="{{ $pricing->cc_charged_off ?? $default->cc_charged_off}}"  title="CC CHARGED OFF">
                </div>
            </div>
                    {!! $errors->first('cc_charged_off', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO CHARGED OFF $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_charged_off" value="{{ $pricing->auto_charged_off ?? $default->auto_charged_off }}" title="AUTO CHARGED OFF">
                </div>
            </div>
                   {!! $errors->first('auto_charged_off', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO REPO $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_repo" value="{{ $pricing->auto_repo ?? $default->auto_repo}}"  title="AUTO REPO">
                </div>
            </div>
                    {!! $errors->first('auto_repo', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO EARLY TERMINATION $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_early_termination" value="{{ $pricing->auto_early_termination ?? $default->auto_early_termination}}"  title="AUTO EARLY TERMINATION">
                </div>
            </div>
                {!! $errors->first('auto_early_termination', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO EARLY TERMINATION/SETTLED $</label>
                </div>
                <div class="price">
                    <input type="text"  name="settled" value="{{ $pricing->settled ?? $default->settled}}"  title="AUTO EARLY TERMINATION/SETTLED">
                </div>
            </div>
                  {!! $errors->first('settled', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">REDEEMED REPO $</label>
                </div>
                <div class="price">
                    <input type="text"  name="redeemed_repo" value="{{ $pricing->redeemed_repo ?? $default->redeemed_repo}}"  title="REDEEMED REPO">
                </div>
            </div>
                    {!! $errors->first('redeemed_repo', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">TRUCK TRAILER NEG $</label>
                </div>
                <div class="price">
                    <input type="text"  name="truck_trailer_neg" value="{{ $pricing->truck_trailer_neg ?? $default->truck_trailer_neg }}" title="TRUCK TRAILER NEG">
                </div>
            </div>
                 {!! $errors->first('truck_trailer_neg', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                  <label style="float: right">MORTGAGE FORECLOSURE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="mortgage_foreclosure" value="{{ $pricing->mortgage_foreclosure ?? $default->mortgage_foreclosure}}"  title="MORTGAGE FORECLOSURE">
                </div>
            </div>
                    {!! $errors->first('mortgage_foreclosure', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MORTGAGE SHORT SALE $</label>
                </div>
                <div class="price">
                    <input type="text"  name="mortgage_short_sale" value="{{ $pricing->mortgage_short_sale ?? $default->mortgage_short_sale }}"  title="MORTGAGE SHORT SALE">
                </div>
            </div>
                {!! $errors->first('mortgage_short_sale', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">LOAN MODIFIED $</label>
                </div>
                <div class="price">
                    <input type="text"  name="loan_modified" value="{{ $pricing->loan_modified ?? $default->loan_modified}}"  title="LOAN MODIFIED">
                </div>
            </div>
                    {!! $errors->first('loan_modified', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">TIME SHARE NEG $</label>
                </div>
                <div class="price">
                    <input type="text"  name="time_share_neg" value="{{ $pricing->time_share_neg ?? $default->time_share_neg}}"  title="TIME SHARE NEG">
                </div>
            </div>
                 {!! $errors->first('time_share_neg', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">BANKRUPTCIES $</label>
                </div>
                <div class="price">
                    <input type="text"  name="bankruptcies" value="{{ $pricing->bankruptcies ?? $default->bankruptcies}}"  title="BANKRUPTCIES">
                </div>
            </div>
                    {!! $errors->first('bankruptcies', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CHILD SUPPORT $</label>
                </div>
                <div class="price">
                    <input type="text"  name="child_support" value="{{ $pricing->child_support ?? $default->child_support}}" title="CHILD SUPPORT">
                </div>
            </div>
                {!! $errors->first('child_support', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MED CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="med_ca" value="{{ $pricing->med_ca ?? $default->med_ca}}"  title="MED CA">
                </div>
            </div>
                {!! $errors->first('med_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CC CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="cc_ca" value="{{ $pricing->cc_ca ?? $default->cc_ca}}" title="CC CA">
                </div>
            </div>
                {!! $errors->first('cc_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_ca" value="{{ $pricing->auto_ca ?? $default->auto_ca}}"  title="AUTO CA">
                </div>
            </div>
                {!! $errors->first('auto_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">UTILITY CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="utility_ca" value="{{ $pricing->utility_ca ?? $default->utility_ca}}" title="UTILITY CA">
                </div>
            </div>
                {!! $errors->first('utility_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CELLPHONE CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="cellphone_ca" value="{{ $pricing->cellphone_ca ?? $default->cellphone_ca}}"  title="CELLPHONE CA">
                </div>
            </div>
                {!! $errors->first('cellphone_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MCA CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="mca_ca" value="{{ $pricing->mca_ca ?? $default->mca_ca }}" title="MCA CA">
                </div>
            </div>
                {!! $errors->first('mca_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">MISC CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="misc_ca" value="{{ $pricing->misc_ca ?? $default->misc_ca}}" title="MISC CA">
                </div>
            </div>
                {!! $errors->first('misc_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">AUTO INS. CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="auto_ins_ca" value="{{ $pricing->auto_ins_ca ?? $default->auto_ins_ca}}"  title="AUTO INS. CA">
                </div>
            </div>
            {!! $errors->first('auto_ins_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">JEWELERY CA $</label>
                </div>
                <div class="price">
                     <input type="text"  name="jewelery_ca" value="{{ $pricing->jewelery_ca ?? $default->jewelery_ca}}" title="JEWELERY CA">
                </div>
            </div>
            {!! $errors->first('jewelery_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                     <label style="float: right">RENTAL/LEASE AGREEMENT $</label>
                </div>
                <div class="price">
                    <input type="text"  name="lease_agreement" value="{{ $pricing->lease_agreement ?? $default->lease_agreement}}"  title="RENTAL/LEASE AGREEMENT">
                </div>
            </div>
            {!! $errors->first('lease_agreement', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                  <label style="float: right">PEST CA $</label>
                </div>
                    <div class="price">
                    <input type="text"  name="pest_ca" value="{{ $pricing->pest_ca ?? $default->pest_ca}}"  title="PEST CA">
                </div>
            </div>
                {!! $errors->first('pest_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">DEPOSIT ACCNT CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="deposit_accnt_ca" value="{{ $pricing->deposit_accnt_ca ?? $default->deposit_accnt_ca}}"  title="DEPOSIT ACCNT CA">
                </div>
            </div>
            {!! $errors->first('deposit_accnt_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">CHECK CASHING CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="check_cashing_ca" value="{{ $pricing->check_cashing_ca ?? $default->check_cashing_ca}}"  title="CHECK CASHING CA">
                </div>
            </div>
               {!! $errors->first('check_cashing_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">LAW FIRM CA $</label>
                </div>
                <div class="price">
                    <input type="text"  name="law_firm_ca" value="{{ $pricing->law_firm_ca ?? $default->law_firm_ca }}" title="LAW FIRM CA">
                </div>
            </div>
                {!! $errors->first('law_firm_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">TRUCK LOAD CA $</label>
                </div>
                <div class="price">
                    <input type="text" name="truck_load_ca" value="{{ $pricing->truck_load_ca ?? $default->truck_load_ca}}" title="TRUCK LOAD CA">
                </div>
            </div>
                    {!! $errors->first('truck_load_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <div class="priceName">
                <div class="name">
                    <label style="float: right">UNKNOWN $</label>
                </div>
                <div class="price">
                    <input type="text" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}" title="UNKNOWN">
                </div>
            </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
