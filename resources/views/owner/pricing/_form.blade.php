<input type="hidden" name="user_id" value="{{$pricing->user_id}}">
<div class="form-group">

    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input  type="text" class="form-control " name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}" placeholder="INQUIRIES" title="INQUIRIES">
            {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control " name="personal_info" value="{{ $pricing->personal_info ?? $default->personal_info}}" placeholder="PERSONAL INFO" title="PERSONAL INFO">
            {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control " name="fraud_alerts" value="{{ $pricing->fraud_alerts ?? $default->fraud_alerts}}" placeholder="FRAUD ALERTS" title="FRAUD ALERTS">
            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control " name="cc_accnt_bloking" value="{{ $pricing->cc_accnt_bloking ?? $default->cc_accnt_bloking }}" placeholder="CC ACCNT BLOCKING" title="CC ACCNT BLOCKING">
            {!! $errors->first('cc_accnt_bloking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control " name="auto_blocking" value="{{ $pricing->auto_blocking ?? $default->auto_blocking }}" placeholder="AUTO BLOCKING" title="AUTO BLOCKING">
            {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control " name="mortgage_blocking" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking }}" placeholder="MORTGAGE BLOCKING" title="MORTGAGE BLOCKING">
            {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="p_loan_blocking" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}" placeholder="P. LOAN CLOCKING" title="P. LOAN CLOCKING">
            {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="student_loan_blocking" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}" placeholder="STUDENT LOAN BLOCKING" title="STUDENT LOAN BLOCKING">
            {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="cc_late" value="{{ $pricing->cc_late ?? $default->cc_late}}" placeholder="CC LATE" title="CC LATE">
            {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_late" value="{{ $pricing->auto_late ?? $default->auto_late}}" placeholder="AUTO LATE" title="AUTO LATE">
            {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="mortgage_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}" placeholder="MORTGAGE LATE" title="MORTGAGE LATE">
            {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="student_loan_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}" placeholder="STUDENT LOAN LATE" title="STUDENT LOAN LATE">
            {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="student_loan_charged_off" value="{{ $pricing->student_loan_charged_off ?? $default->student_loan_charged_off}}" placeholder="STUDENT LOAN CHARGED OFF" title="STUDENT LOAN LATE">
            {!! $errors->first('student_loan_charged_off', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="cc_charged_off" value="{{ $pricing->cc_charged_off ?? $default->cc_charged_off}}" placeholder="CC CHARGED OFF" title="CC CHARGED OFF">
            {!! $errors->first('cc_charged_off', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_charged_off" value="{{ $pricing->auto_charged_off ?? $default->auto_charged_off }}" placeholder="AUTO CHARGED OFF" title="AUTO CHARGED OFF">
            {!! $errors->first('auto_charged_off', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_repo" value="{{ $pricing->auto_repo ?? $default->auto_repo}}" placeholder="AUTO REPO" title="AUTO REPO">
            {!! $errors->first('auto_repo', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_early_termination" value="{{ $pricing->auto_early_termination ?? $default->auto_early_termination}}" placeholder="AUTO EARLY TERMINATION" title="AUTO EARLY TERMINATION">
            {!! $errors->first('auto_early_termination', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="settled" value="{{ $pricing->settled ?? $default->settled}}" placeholder="AUTO EARLY TERMINATION/SETTLED" title="AUTO EARLY TERMINATION/SETTLED">
            {!! $errors->first('settled', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="redeemed_repo" value="{{ $pricing->redeemed_repo ?? $default->redeemed_repo}}" placeholder="REDEEMED REPO" title="REDEEMED REPO">
            {!! $errors->first('redeemed_repo', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="truck_trailer_neg" value="{{ $pricing->truck_trailer_neg ?? $default->truck_trailer_neg }}" placeholder="TRUCK TRAILER NEG" title="TRUCK TRAILER NEG">
            {!! $errors->first('truck_trailer_neg', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="mortgage_foreclosure" value="{{ $pricing->mortgage_foreclosure ?? $default->mortgage_foreclosure}}" placeholder="MORTGAGE FORECLOSURE" title="MORTGAGE FORECLOSURE">
            {!! $errors->first('mortgage_foreclosure', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="mortgage_short_sale" value="{{ $pricing->mortgage_short_sale ?? $default->mortgage_short_sale }}" placeholder="MORTGAGE SHORT SALE" title="MORTGAGE SHORT SALE">
            {!! $errors->first('mortgage_short_sale', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="loan_modified" value="{{ $pricing->loan_modified ?? $default->loan_modified}}" placeholder="LOAN MODIFIED" title="LOAN MODIFIED">
            {!! $errors->first('loan_modified', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="time_share_neg" value="{{ $pricing->time_share_neg ?? $default->time_share_neg}}" placeholder="TIME SHARE NEG" title="TIME SHARE NEG">
            {!! $errors->first('time_share_neg', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="bankruptcies" value="{{ $pricing->bankruptcies ?? $default->bankruptcies}}" placeholder="BANKRUPTCIES" title="BANKRUPTCIES">
            {!! $errors->first('bankruptcies', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="child_support" value="{{ $pricing->child_support ?? $default->child_support}}" placeholder="CHILD SUPPORT" title="CHILD SUPPORT">
            {!! $errors->first('child_support', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="med_ca" value="{{ $pricing->med_ca ?? $default->med_ca}}" placeholder="MED CA" title="MED CA">
            {!! $errors->first('med_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="cc_ca" value="{{ $pricing->cc_ca ?? $default->cc_ca}}" placeholder="CC CA" title="CC CA">
            {!! $errors->first('cc_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_ca" value="{{ $pricing->auto_ca ?? $default->auto_ca}}" placeholder="AUTO CA" title="AUTO CA">
            {!! $errors->first('auto_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="utility_ca" value="{{ $pricing->utility_ca ?? $default->utility_ca}}" placeholder="UTILITY CA" title="UTILITY CA">
            {!! $errors->first('utility_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="cellphone_ca" value="{{ $pricing->cellphone_ca ?? $default->cellphone_ca}}" placeholder="CELLPHONE CA" title="CELLPHONE CA">
            {!! $errors->first('cellphone_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="mca_ca" value="{{ $pricing->mca_ca ?? $default->mca_ca }}" placeholder="MCA CA" title="MCA CA">
            {!! $errors->first('mca_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="misc_ca" value="{{ $pricing->misc_ca ?? $default->misc_ca}}" placeholder="MISC CA" title="MISC CA">
            {!! $errors->first('misc_ca', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="auto_ins_ca" value="{{ $pricing->auto_ins_ca ?? $default->auto_ins_ca}}" placeholder="AUTO INS. CA" title="AUTO INS. CA">
            {!! $errors->first('auto_ins_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="jewelery_ca" value="{{ $pricing->jewelery_ca ?? $default->jewelery_ca}}" placeholder="JEWELERY CA" title="JEWELERY CA">
            {!! $errors->first('jewelery_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="lease_agreement" value="{{ $pricing->lease_agreement ?? $default->lease_agreement}}" placeholder="RENTAL/LEASE AGREEMENT" title="RENTAL/LEASE AGREEMENT">
            {!! $errors->first('lease_agreement', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="pest_ca" value="{{ $pricing->pest_ca ?? $default->pest_ca}}" placeholder="PEST CA" title="PEST CA">
            {!! $errors->first('pest_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="deposit_accnt_ca" value="{{ $pricing->deposit_accnt_ca ?? $default->deposit_accnt_ca}}" placeholder="DEPOSIT ACCNT CA" title="DEPOSIT ACCNT CA">
            {!! $errors->first('deposit_accnt_ca', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="check_cashing_ca" value="{{ $pricing->check_cashing_ca ?? $default->check_cashing_ca}}" placeholder="CHECK CASHING CA" title="CHECK CASHING CA">
            {!! $errors->first('check_cashing_ca', '<p class="help-block">:message</p>') !!}

        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="law_firm_ca" value="{{ $pricing->law_firm_ca ?? $default->law_firm_ca }}" placeholder="LAW FIRM CA" title="LAW FIRM CA">
            {!! $errors->first('law_firm_ca', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-4" style="margin: 0">
            <input type="text" class="form-control phone" name="truck_load_ca" value="{{ $pricing->truck_load_ca ?? $default->truck_load_ca}}" placeholder="TRUCK LOAD CA" title="TRUCK LOAD CA">
            {!! $errors->first('truck_load_ca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
