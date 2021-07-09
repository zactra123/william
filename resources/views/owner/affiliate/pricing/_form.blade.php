<style>

    /* .priceName{
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
    } */

</style>


<div class="ms-ua-box mb-4">
    <div class="row text-center m-5">
        <h3>Personal InformAtion and Statement</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                                <label for="inquiries"> <strong>Inquiries $</strong> </label>
                          </div>
                          <div class="col-md-12">
                                <input  type="text" id="inquiries" class="form-control" name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}"  title="Inquiries">
                          </div>
                        </div>
                    {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="personalinfo"> <strong>Personal Info $</strong> </label>
                          </div>
                          <div class="col-md-12">
                            <input type="text" id="personalinfo" name="personal_info" class="form-control" value="{{ $pricing->personal_info ?? $default->personal_info}}"  title="Personal Info">
                          </div>
                        </div>

                    {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                     <div class="row">
                        <div class="col-md-12">
                          <label for="fraudalerts"> <strong>Fraud Alerts $</strong> </label>
                        </div>
                        <div class="col-md-12">
                          <input type="text" id="fraudalerts" class="form-control" name="fraud_alerts" value="{{ $pricing->fraud_alerts ?? $default->fraud_alerts}}"  title="Fraud Alerts">
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
        <h3>Late Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="creditcardlate"> <strong>Credit Card Late $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="creditcardlate" type="text" class="form-control" name="credit_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card Late">
                    </div>
                  </div>


                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="chargecardlate"> <strong>Charge Card Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="chargecardlate" type="text" class="form-control" name="charge_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card Late">
                      </div>
                    </div>

                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="securedcreditcard"> <strong>Secured Credit Card $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input  type="text" id="securedcreditcard" class="form-control" name="secured_credit_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit Card">
                    </div>
                  </div>

                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="autoloanlate"> <strong>Auto Loan Late  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="autoloanlate" type="text" class="form-control" name="auto_loan_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan Late">
                      </div>
                    </div>

                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="autoleaselate"> <strong>Auto Lease Late  $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="autoleaselate" type="text" class="form-control" name="auto_lease_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease Late ">
                    </div>
                  </div>

                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="recreationalmerchandise"> <strong>Recreational Merchandise Late  $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" id="recreationalmerchandise" class="form-control" name="r_m_late" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="Recreational Merchandise Late">
                    </div>
                  </div>

                    {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="unsecuredloanlate"> <strong>Unsecured Loan Late  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="unsecuredloanlate" type="text" class="form-control" name="unscured_loan_late" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan Late">
                      </div>
                    </div>

                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="lineofcredit"> <strong>Line of Credit Late  $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input type="text" id="lineofcredit" class="form-control" name="line_credit_late" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="Line of Credit Late">
                    </div>
                  </div>

                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="securedloanlate"> <strong>Secured Loan Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" id="securedloanlate" class="form-control" name="scured_loan_late" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan Late">
                      </div>
                    </div>

                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="mortagagelate"> <strong>Mortgage Late  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="mortagagelate" type="text" class="form-control" name="mortgage_late" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage Late">
                      </div>
                    </div>

                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="fhamortgage"> <strong>Fha Mortgage Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" id="fhamortgage" class="form-control" name="fha_mort_late" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage Late">
                      </div>
                    </div>

                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label form="homeequity"> <strong>Home Equity Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="homeequity" class="form-control" type="text" name="home_equity_late" value="{{ $pricing->public_record ?? $default->public_record}}"  title="Home Equity Late">
                      </div>
                    </div>

                    {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="salescontract"> <strong>Sales Contract Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="salescontract" name="sale_contract_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract Late">
                      </div>
                    </div>

                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="rentallate"> <strong>Rental Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="rentallate" name="rental_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental Late">
                      </div>
                    </div>




                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="convrealestate"> <strong>Conv. Real Estate Mtg Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="convrealestate" type="text" class="form-control" name="conv_real_mtg_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg Late">
                      </div>
                    </div>

                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="educationlate"> <strong>Education Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="educationlate" type="text" class="form-control" name="education_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education Late">
                      </div>
                    </div>

                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="securedloclate"> <strong>Secured Loc Late $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="securedloclate" type="text" class="form-control" name="secured_loc_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc Late">
                    </div>
                  </div>

                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label id="utilitycompany"> <strong>Utility Company Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="utlity_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Utility Company Late">
                      </div>
                    </div>

                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="childsupportlate"> <strong>Child Support Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="childsupportlate" name="child_support_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Child Support Late">
                      </div>
                    </div>

                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label> <strong>Unknown Late $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="unknown_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
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
        <h3>Blocking Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="creditcard"> <strong>Credit Card $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="creditcard" type="text" class="form-control" name="credit_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card">
                      </div>
                    </div>

                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="chargecard"> <strong>Charge Card $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="chargecard" type="text" class="form-control" name="charge_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card">
                      </div>
                    </div>

                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="securedcredit">Secured Credit $</label>
                      </div>
                      <div class="col-md-12">
                        <input id="securedcredit" type="text" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                      </div>
                    </div>

                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="autoloan"> <strong>Auto Loan  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="autoloan" type="text" class="form-control" name="auto_loan_block" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan">
                      </div>
                    </div>

                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label> <strong>Auto Lease  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input  type="text" class="form-control" name="auto_lease_block" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease">
                      </div>
                    </div>

                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="recreationalmerchandise"> <strong>Recreational Merchandise $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="recreationalmerchandise" type="text" class="form-control" name="r_m_block" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="Recreational Merchandise">
                      </div>
                    </div>

                    {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="unsercuredloan"> <strong>Unsecured Loan $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="unsercuredloan" class="form-control" type="text" class="from-control" name="unsecured_loan_block" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan">
                      </div>
                    </div>

                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="lineofcredit"> <strong>Line of Credit  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="lineofcredit" type="text" class="form-control" name="line_credit_block" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="Line of Credit">
                      </div>
                    </div>

                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="securedloan"> <strong>Secured Loan $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="securedloan" type="text" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                    </div>
                  </div>

                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="mortgage"> <strong>Mortgage  $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="mortgage" type="text" class="form-control" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                    </div>
                  </div>

                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="fhamortgage"> <strong>Fha Mortgage $</strong> </label>
                      </div>
                      <div class="col-md-12">
                        <input id="fhamortgage" type="text" class="form-control" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                      </div>
                    </div>

                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="homeequity"> <strong>Home Equity $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="homeequity" type="text" class="form-control" name="home_equity_block" value="{{ $pricing->public_record ?? $default->public_record}}"  title="Home Equity">
                    </div>
                  </div>

                    {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="salescontract"> <strong>Sales Contract $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="salescontract" type="text" class="form-control" name="sale_contract_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract">
                    </div>
                  </div>

                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="rental1"> <strong>Rental $</strong> </label>
                    </div>
                    <div class="col-md-12">
                      <input id="rental1" type="text" class="form-control" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                    </div>
                  </div>

                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="realestate1"> <strong>CONV. REAL ESTATE MTG $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="realestate1" type="text" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="CONV. REAL ESTATE MTG">
                        </div>
                    </div>

                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="education"> <strong>Education $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="education" type="text" class="form-control" name="education_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloc1"> <strong>Secured Loc $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloc1" type="text" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="utilitycompany1"> <strong>Utility Company $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="utilitycompany1" type="text" class="form-control" name="utility_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Utility Company">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="childsupport"> <strong>CHILD SUPPORT $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="childsupport" type="text" class="form-control" name="child_support_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CHILD SUPPORT">
                        </div>
                    </div>
                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="unknownblocking"> <strong>Unknown Blocking $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="unknownblocking" class="form-control" name="unknown_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Unknown Blocking">
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
        <h3>Charge off Pricing no Range</h3>
    </div>
    <div>
        <h3>Regular Charged off Removal – No Settlement </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedcredit"> <strong>Secured Credit $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedcredit" type="text" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloan"> <strong>Secured Loan $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloan" type="text" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="realestatemtg1"> <strong>Conv. Real Estate Mtg $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="realestatemtg1" type="text" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="mortgage1"> <strong>Mortgage  $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="mortgage1" type="text" class="form-control" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fhamortgage1"> <strong>Fha Mortgage $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="fhamortgage1" type="text" class="form-control" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rental2"> <strong>Rental $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="rental2" class="form-control" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloc2"> <strong>Secured Loc $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="securedloc2" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="UNKNOWN">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>Regular Charged Off - Removal After Settlement  </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedcredit"> <strong>Secured Credit $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedcredit" type="text" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""> <strong>Secured Loan $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="" type="text" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="realestatemtg2"> <strong>Conv. Real Estate Mtg $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="realestatemtg2" type="text" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="mortgage2"> <strong>Mortgage  $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="mortgage2" type="text" class="form-control" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fhamortgage2"> <strong>Fha Mortgage $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="fhamortgage2" type="text" class="form-control" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rental3"> <strong>Rental $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="rental3" type="text" class="form-control" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloc3"> <strong>Secured Loc $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloc3" type="text" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>Doubled Charged Off Removal – No Settlement </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedcredit3"> <strong>Secured Credit $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedcredit3" type="text" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloan3"> <strong>Secured Loan $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloan3" type="text" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="realestate3"> <strong>Conv. Real estate Mtg $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="realestate3" type="text" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real estate Mtg">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="mortgage3"> <strong>Mortgage  $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="mortgage3" type="text" class="form-control" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fhamortgage3"> <strong>Fha Mortgage $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="fhamortgage3" type="text" class="form-control" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rental4"> <strong>Rental $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="rental4" type="text" class="form-control" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloc4"> <strong>Secured Loc $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloc4" type="text" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>
    <div>
        <h3>Doubled Charged Off - Removal After Settlement </h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedcredit4"> <strong>Secured Credit $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedcredit4" type="text" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                        </div>
                    </div>
                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="priceName">
                        <div class="name">
                            <label for="securedloan4"> <strong>Secured Loan $</strong> </label>
                        </div>
                        <div class="price">
                            <input id="securedloan4" type="text" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                        </div>
                    </div>
                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="realestate4"> <strong>Conv. Real Estate Mtg $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="realestate4" type="text" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="mortgage4"> <strong>Mortgage  $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="mortgage4" type="text" class="form-control" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fhamortgage4"> <strong>Fha Mortgage $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="fhamortgage4" type="text" class="form-control" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                        </div>
                    </div>
                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rental5"> <strong>Rental $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="rental5" type="text" class="form-control" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                        </div>
                    </div>
                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="securedloc5"> <strong>Secured Loc $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="securedloc5" type="text" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
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
        <h3>Regular Charged Off Removal – No Settlement Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>Credit Card  </h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min1"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min1" type="text" class="form-control" name="credit_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : '' }}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="max1"> <strong>Max $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="max1" type="text" class="form-control" name="credit_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                                </div>
                            </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price1"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price1" type="text" class="form-control" name="credit_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="credit_card_co" id="add_credit_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="credit_card_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label> <strong>Min $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4 ">
                    <div class="row">
                        <div class="col-md-12">
                            <label> <strong>Max $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <strong> Infinite</strong>
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="price5"> <strong>Price  $</strong> </label>
                        </div>
                        <div class="col-md-12">
                            <input id="price5" type="text" class="form-control"  id="credit_card_co_price_last"class="collection" title="Price">
                        </div>
                    </div>
                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Charge Card</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min6"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min6" type="text" class="form-control" name="charge_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max6"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max6" type="text" class="form-control" name="charge_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label for="price6"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="priceCA">
                                <input id="price6" type="text" class="form-control" name="charge_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_co" id="add_charge_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="charge_card_co_range">

            </div>
            <div class="row p-3">
              <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="min7"> <strong>Min $</strong> </label>
                      </div>
                      <div class="col-md-12">
                          <input id="min7" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                      </div>
                  </div>
                  {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
              </div>
              <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-12">
                          <label for=""> <strong>Max $</strong> </label>
                      </div>
                      <div class="col-md-12">
                          <strong> Infinite</strong>
                      </div>
                  </div>
                  {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
              </div>
              <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-12">
                          <label> <strong>Price  $</strong> </label>
                      </div>
                      <div class="col-md-12">
                          <input type="text" class="form-control"   id="charge_card_co_price_last"class="collection" title="Price">
                      </div>
                  </div>
                  {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
        </div>

        <div class="form-group">
            <h4> Sales Contract</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min8"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min8" type="text" class="form-control" name="sales_contract_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max8"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max8" type="text" class="form-control" name="sales_contract_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price8"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                              <div class="">

                              </div>
                                <input id="price8" type="text" class="form-control" name="sales_contract_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="sales_contract_co" id="add_sales_contract_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="sales_contract_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min9"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min9" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price9"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price9" type="text" class="form-control" id="sales_contract_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Unsecured</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min10"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min10" type="text" class="form-control" name="unsecured_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max10"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max10" type="text" class="form-control" name="unsecured_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control" name="unsecured_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="unsecured_co" id="add_unsecured_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="unsecured_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min11"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min11" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price11"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price11" type="text" class="form-control"  id="unsecured_co_price_last" class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Line Of Credit</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min12"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min12" type="text" class="form-control" name="line_credit_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max12"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max12" type="text" class="form-control" name="line_credit_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price12"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price12" type="text" class="form-control" name="line_credit_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_co" id="add_line_credit_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="line_credit_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min13"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min13" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price13"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price13" type="text" class="form-control"  id="line_credit_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Home Equity</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min14"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min14" type="text" class="form-control" name="home_equity_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max14"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max14" type="text" class="form-control" name="home_equity_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price14"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price14" type="text" class="form-control" name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="home_equity_co" id="add_home_equity_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="home_equity_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min15"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min15" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price15"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price15" type="text" class="form-control" id="home_equity_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Education</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min16"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min16" type="text" class="form-control" name="education_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max16"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max16" type="text" class="form-control" name="education_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price16"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price16" type="text" class="form-control" name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="education_co" id="add_education_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="education_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min17"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min17" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price17"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price17" type="text" class="form-control" id="education_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Utility Company</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min18"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min18" type="text" class="form-control" name="utility_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max18"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max18" type="text" class="form-control" name="utility_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price18"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price18" type="text" class="form-control" name="utility_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                            <strong class="add_range h3" class="btn form-control" data-type="utility_co" id="add_utility_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="utility_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min19"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min19" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price19"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price19" type="text" class="form-control collection" id="utility_co_price_last" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Child Support</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min20"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min20" type="text" class="form-control collection" name="child_support_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max20"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max20" type="text" class="form-control collection" name="child_support_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price20"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price20" type="text" class="form-control collection" name="child_support_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="child_support_co" id="add_child_support_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="child_support_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min21"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min21" type="text" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_co_min_val_last" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price21"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price21" type="text" class="form-control" id="child_support_co_price_last"class="collection" title="Price">
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
            <h4>Auto Lease</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min22"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min22" type="text" class="form-control" name="auto_lease_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max22"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max22" type="text" class="form-control" name="auto_lease_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price22"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price22" type="text" class="form-control" name="auto_lease_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_lease_co" id="add_auto_lease_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_lease_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min23"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min23" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price24"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price24" type="text" class="form-control" id="auto_lease_co_price_last" class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Auto Loan</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min24"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min24" type="text" class="form-control" name="auto_loan_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max24"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max24" type="text" class="form-control" name="auto_loan_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price25"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price25" type="text" class="form-control" name="auto_loan_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_loan_co" id="add_auto_loan_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_loan_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min26"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min26" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price26"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price26" type="text" class="form-control" id="auto_loan_co_price_last" class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Recreational Merchandise</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min27"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min27" type="text" class="form-control" name="r_m_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max27"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max27" type="text" class="form-control" name="r_m_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price27"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price27" type="text" class="form-control" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="r_m_co" id="add_r_m_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="r_m_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min28"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min28" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price28"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price28" type="text" class="form-control" id="r_m_co_price_last"class="collection" title="Price">
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
        <h3>Regular Charged Off - Removal After Settlement  Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>Credit Card  </h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min29"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min29" type="text" class="form-control" name="credit_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max29"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max29" type="text" class="form-control" name="credit_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price29"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price29" type="text" class="form-control" name="credit_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="credit_card_s_co" id="add_credit_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="credit_card_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min30"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min30" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label for="price31"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="priceCA">
                                <input id="price31" type="text" class="form-control" id="credit_card_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Charge Card</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min32"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min32" type="text" class="form-control" name="charge_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max32"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max32" type="text" class="form-control" name="charge_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label for="price32"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="priceCA">
                                <input id="price32" type="text" class="form-control" name="charge_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="charge_card_s_co" id="add_charge_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="charge_card_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min33"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min33" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max34"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price33"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price33" type="text" class="form-control" id="charge_card_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> Sales Contract</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min34"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min34" type="text" class="form-control" name="sales_contract_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max34"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max34" type="text" class="form-control" name="sales_contract_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price34">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="price34" type="text" class="form-control" name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="sales_contract_s_co" id="add_sales_contract_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sales_contract_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min35"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min35" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite </strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price35"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price35" type="text" class="form-control" id="sales_contract_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Unsecured</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min36"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min36" type="text" class="form-control" name="unsecured_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max" type="text" class="form-control" name="unsecured_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control" name="unsecured_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="unsecured_s_co" id="add_unsecured_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="unsecured_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price36"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price36" type="text" class="form-control" id="unsecured_s_co_price_last" class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Line of Credit</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min37"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min37" type="text" class="form-control" name="line_credit_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max37"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max37" type="text" class="form-control" name="line_credit_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price37"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price37" type="text" class="form-control" name="line_credit_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="line_credit_s_co" id="add_line_credit_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="line_credit_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min38"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min38" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price38"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price38" type="text" class="form-control"  id="line_credit_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Home Equity</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min39"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min39" type="text" class="form-control" name="home_equity_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max39"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max39" type="text" class="form-control" name="home_equity_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price39"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price39" type="text" class="form-control" name="home_equity_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="home_equity_s_co" id="add_home_equity_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="home_equity_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min40"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min40" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price40"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price40" type="text" class="form-control" id="home_equity_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Education</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min41"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min41" type="text" class="form-control" name="education_s_co[0][minimum]" value="{{  isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max41"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max41" type="text" class="form-control" name="education_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price41"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price41" type="text" class="form-control" name="education_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="education_s_co" id="add_education_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="education_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min42"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min42" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price42"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price42" type="text"  class="form-control" id="education_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Utility Company</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min43"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min43" type="text" class="form-control" name="utility_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max43"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max43" type="text" class="form-control" name="utility_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price43"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input  id="price43"type="text" class="form-control" name="utility_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="utility_s_co" id="add_utility_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="utility_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min44"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min44" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price44"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price44" type="text" class="form-control" id="utility_s_co_price_val_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Child Support</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min45"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min45" type="text" class="form-control" name="child_support_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max45"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max45" type="text" class="form-control" name="child_support_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price45"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price45" type="text" class="form-control" name="child_support_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="child_support_s_co" id="add_child_support_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="child_support_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min46"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min46" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_s_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price46"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price46" type="text" class="form-control"  id="child_support_s_price_last"class="collection" title="Price">
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
            <h4>Auto Lease</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min47"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min47" type="text" class="form-control" name="auto_lease_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max47"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max47" type="text" class="form-control" name="auto_lease_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price47"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price47" type="text" class="form-control" name="auto_lease_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_lease_s_co" id="add_auto_lease_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_lease_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min48"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min48" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price48">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="price48" type="text" class="form-control" id="auto_lease_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Auto Loan</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min49"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min49" type="text" class="form-control" name="auto_loan_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max49"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max49" type="text" class="form-control" name="auto_loan_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price49"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price49" type="text" class="form-control" name="auto_loan_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="auto_loan_s_co" id="add_auto_loan_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>
                    </div>
                </div>
            </div>
            <div id="auto_loan_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min50"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min50" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price50"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price50" type="text" class="form-control" id="auto_loan_s_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Recreational Merchandise</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min51"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min51" type="text" class="form-control" name="r_m_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max51"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max51" type="text" class="form-control" name="r_m_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price51"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price51" type="text" class="form-control" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="r_m_s_co" id="add_r_m_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r_m_s_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min52"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min52" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_s_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price52"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price52" type="text" class="form-control"  id="r_m_s_co_price_last"class="collection" title="Price">
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
        <h3>Doubled Charged Off Removal – No Settlement  Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>Credit Card  </h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min53"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min53" type="text" class="form-control" name="credit_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max53"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max53" type="text" class="form-control" name="credit_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price53"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price53" type="text" class="form-control" name="credit_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-1">
                          <strong class="add_range h3" class="btn form-control" data-type="credit_card_d_co" id="add_credit_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="credit_card_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min54"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min54" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price54"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price54" type="text" class="form-control" id="credit_card_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Charge Card</h4>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min55"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min55" type="text" class="form-control" name="charge_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max56"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max56" type="text" class="form-control" name="charge_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price56"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price56" type="text" class="form-control" name="charge_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="charge_card_d_co" id="add_charge_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="charge_card_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min57"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min57" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price57"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price57" type="text" class="form-control" id="charge_card_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> Sales Contract</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min58"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min58" type="text" class="form-control" name="sales_contract_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max58"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max58" type="text" class="form-control" name="sales_contract_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price58"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price58" type="text" class="form-control" name="sales_contract_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="sales_contract_d_co" id="add_sales_contract_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sales_contract_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min59"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min59" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price59"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price59" type="text" class="form-control" id="sales_contract_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Unsecured</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min60"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min60" type="text" class="form-control" name="unsecured_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max60"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max60" type="text" class="form-control" name="unsecured_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price60"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price60" type="text" class="form-control" name="unsecured_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="unsecured_d_co" id="add_unsecured_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="unsecured_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min61"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min61" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price61"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price61" type="text" class="form-control"  id="unsecured_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Line of Credit</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min62"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min62" type="text" class="form-control" name="line_credit_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min62"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min62" type="text" class="form-control" name="line_credit_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price62"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price62" type="text" class="form-control" name="line_credit_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="line_credit_d_co" id="add_line_credit_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="line_credit_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min63"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min63" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price63"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price63" type="text" class="form-control" id="line_credit_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Home Equity</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min64"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min64" type="text" class="form-control" name="home_equity_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max64"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max64" type="text" class="form-control" name="home_equity_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price64"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price64" type="text" class="form-control" name="home_equity_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="home_equity_d_co" id="add_home_equity_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="home_equity_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min65"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min65" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="ptice65"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="ptice65" type="text" class="form-control" id="home_equity_d_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Education</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min66"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min66" type="text" class="form-control" name="education_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max66"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max66" type="text" class="form-control" name="education_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price66"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price66" type="text" class="form-control" name="education_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="education_d_co" id="add_education_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="education_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min67"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min67" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price67"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price67" type="text" class="form-control"  id="education_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Utility Company</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min68"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min68" type="text" class="form-control" name="utility_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min68"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min68" type="text" class="form-control"  name="utility_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min68"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min68" type="text" class="form-control"  name="utility_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="PERCENTAGE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="utility_d_co" id="add_utility_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="utility_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min69"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min69" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price69"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price69" type="text" class="form-control"  id="utility_d_co_price_val_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Child Support</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min70"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min70" type="text" class="form-control" name="child_support_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max70"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max70" type="text" class="form-control" name="child_support_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price70"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price70" type="text" class="form-control" name="child_support_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="child_support_d_co" id="add_child_support_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="child_support_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min71"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min71" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_d_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price71"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price71" type="text" class="form-control"  id="child_support_d_price_last"class="collection" title="Price">
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
            <h4>Auto Lease</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min72"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min72" type="text" class="form-control" name="auto_lease_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max72"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max72" type="text" class="form-control"  name="auto_lease_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max72"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max72" type="text" class="form-control"  name="auto_lease_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_lease_d_co" id="add_auto_lease_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_lease_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min73"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min73" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price73"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price73" type="text" class="form-control"  id="auto_lease_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <h4>Auto Loan</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min74"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min74" class="form-control" type="text" name="auto_loan_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max74"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max74" class="form-control" type="text"  name="auto_loan_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price74"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price74" class="form-control" type="text"  name="auto_loan_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_loan_d_co" id="add_auto_loan_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_loan_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min75"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min75" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price76"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price76" type="text" class="form-control"  id="auto_loan_d_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Recreational Merchandise</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min77"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min77" type="text" class="form-control" name="r_m_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max77"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max77" type="text" class="form-control"  name="r_m_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price77"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price77" type="text" class="form-control"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="r_m_d_co" id="add_r_m_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r_m_d_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min78"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min78" type="text" class="form-control"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_d_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price78"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price78" type="text" class="form-control"   id="r_m_d_co_price_last"class="collection" title="Price">
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
        <h3>Doubled Charged Off - Removal After Settlement Pricing</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>Credit Card  </h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min79"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min79" type="text" class="form-control" name="credit_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max79"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max79" type="text" class="form-control"  name="credit_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price79"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price79" type="text" class="form-control"  name="credit_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                      <div class="row mt-4 pt-2">
                        <strong class="add_range h3" class="btn form-control" data-type="credit_card_sd_co" id="add_credit_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                      </div>

                    </div>
                </div>
            </div>
            <div id="credit_card_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min80"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min80" type="text" class="form-control"  value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price80"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price80" type="text" class="form-control"   id="credit_card_sd_co_price_last" class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Charge Card</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min81"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min81" type="text" class="form-control" name="charge_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max81"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max81" type="text" class="form-control"  name="charge_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price81"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price81" type="text" class="form-control"  name="charge_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-3 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="charge_card_sd_co" id="add_charge_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="charge_card_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min82"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min82" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min82">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price82"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price82" type="text" class="form-control"  id="charge_card_sd_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4> Sales Contract</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min83"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min83" type="text" class="form-control" name="sales_contract_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max83"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max83" type="text" class="form-control"  name="sales_contract_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price83">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="price83" type="text" class="form-control"  name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="sales_contract_sd_co" id="add_sales_contract_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sales_contract_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min84"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min84" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price84"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price84" type="text" class="form-control"  id="sales_contract_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Unsecured</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min85"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min85" type="text" class="form-control" name="unsecured_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max85"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max85" type="text" class="form-control"  name="unsecured_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price85"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price85" type="text" class="form-control"  name="unsecured_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="unsecured_sd_co" id="add_unsecured_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="unsecured_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min86"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min86" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> INFINITE</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price86"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price86" type="text" class="form-control"  id="unsecured_sd_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Line of Credit</h4>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min87"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min87" type="text" class="form-control" name="line_credit_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max87"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max87" type="text" class="form-control"  name="line_credit_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price87">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="price87" type="text" class="form-control"  name="line_credit_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="line_credit_sd_co" id="add_line_credit_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="line_credit_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min88"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min88" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price88"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price88" type="text" class="form-control"  id="line_credit_sd_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Home Equity</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min89"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min89" type="text" class="form-control" name="home_equity_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max89"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max89" type="text" class="form-control"  name="home_equity_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price89"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price89" type="text" class="form-control"  name="home_equity_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="home_equity_sd_co" id="add_home_equity_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="home_equity_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min90"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min90" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price90"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price90" type="text" class="form-control"  id="home_equity_sd_co_price_last" class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Education</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min91"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min91" type="text" class="form-control" name="education_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max91"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max91" type="text" class="form-control" name="education_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price91"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price91" type="text" class="form-control" name="education_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="education_sd_co" id="add_education_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="education_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min92"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min92" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price92"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price92" type="text" class="form-control"  id="education_sd_co_price_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Utility Company</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min93"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min93" type="text" class="form-control" name="utility_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max93"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max93" type="text" class="form-control" name="utility_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price93">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="price93" type="text" class="form-control" name="utility_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="utility_sd_co" id="add_utility_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="utility_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min94"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min94" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price94"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price94" type="text" class="form-control"  id="utility_sd_co_price_val_last"class="collection" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Child Support</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min95"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min95" type="text" class="form-control" name="child_support_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max95"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max95" type="text" class="form-control"  name="child_support_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price95"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price95" type="text" class="form-control"  name="child_support_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="child_support_sd_co" id="add_child_support_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="child_support_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min96"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min96" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_sd_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price96"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price96" type="text" class="form-control"  id="child_support_sd_price_last"class="collection" title="Price">
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
            <h4>Auto Lease</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min97"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min97" type="text" class="form-control" name="auto_lease_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max97"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max97" type="text" class="form-control"  name="auto_lease_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price97"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price97" type="text" class="form-control"  name="auto_lease_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_lease_sd_co" id="add_auto_lease_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_lease_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Max $</label>
                            </div>
                            <div class="col-md-12">
                                <strong> Infinite</strong>
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Price  $</label>
                            </div>
                            <div class="col-md-12">
                                <input id="" type="text" class="form-control"  id="auto_lease_sd_co_price_last"class="collection" title="PRICE">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>AUTO LOAN</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="priceName">
                            <div class="nameCA">
                                <label>MIN $</label>
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
                                <label>MAX $</label>
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
                                <label>PRICE  $</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                    <label>TIMESHARE/RESORT COLLECTION</label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
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
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
                                    </div>
                                    <div class="priceCA">
                                        <input type="text" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>% </label>
                                </div>
                                <div class="priceCA">
                                    <input type="text" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>MIN $</label>
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
                                        <label>MAX $</label>
                                    </div>
                                    <div class="priceCA">
                                        <input type="text" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="MAXIMUM">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2" style="margin: 0">
                            <div class="priceName">
                                <div class="nameCA">
                                    <label>% </label>
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
                                    <label>MIN/PRICE$</label>
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
                                        <label>MAX/PRICE$</label>
                                    </div>
                                    <div class="priceCA">
                                        {{-- <input type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
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
    <div class="row" id="charge_{type}_{id}">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="priceName">
                    <div class="nameCA">
                        <label>MIN $</label>
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
                        <label>MAX $</label>
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
                        <label>PRICE $</label>
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



   {{-- <div class="ms-ua-box">

       <input type="hidden" name="user_id" value="{{$pricing->user_id}}">
   <div>
       <div class="form-group">
           <div class="row">
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label> INQUIRIES $</label>
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
                           <label>PERSONAL INFO $</label>
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
                           <label>FRAUD ALERTS $</label>
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
                           <label>CREDIT CARD LATE $</label>
                       </div>
                       <div class="price">
                           <input  type="text"  name="cc_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="CREDIT CARD LATE">
                       </div>
                   </div>
                   {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>PERSONAL LOAN LATE $</label>
                       </div>
                       <div class="price">
                           <input type="text" name="p_loan_late" value="{{ $pricing->p_loan_late ?? $default->p_loan_late}}"  title="PERSONAL LOAN LATE">
                       </div>
                   </div>
                   {!! $errors->first('p_loan_late', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>AUTO LOAN/LEASE LATE $</label>
                       </div>
                       <div class="price">
                           <input type="text"  name="auto_late" value="{{ $pricing->auto_late ?? $default->auto_late}}"  title="AUTO LOAN/LEASE LATE">
                       </div>
                   </div>
                   {!! $errors->first('auto_late', '<p class="help-block">:message</p>') !!}
               </div>
           </div>
       </div>
       <div class="form-group">

           <div class="row">
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>MORTGAGE LATE  $</label>
                       </div>
                       <div class="price">
                           <input  type="text"  name="mortgage_late" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="MORTGAGE LATE ">
                       </div>
                   </div>
                   {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>STUDENT LOAN LATE  $</label>
                       </div>
                       <div class="price">
                           <input  type="text"  name="student_loan_late" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="MORTGAGE LATE ">
                       </div>
                   </div>
                   {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
               </div>

               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>CREDIT CARD BLOCKING $</label>
                       </div>
                       <div class="price">
                           <input type="text"  name="cc_blocking" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="CREDIT CARD BLOCKING">
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
                           <label>UTILITY  $</label>
                       </div>
                       <div class="price">
                           <input  type="text"  name="utility_blocking" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="CELL PHONE BLOCKING ">
                       </div>
                   </div>
                   {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>AUTO LOAN BLOCKING $</label>
                       </div>
                       <div class="price">
                           <input type="text" name="auto_blocking" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="AUTO LOAN/LEASE BLOCKING">
                       </div>
                   </div>
                   {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>PERSONAL LOAN BLOCKING $</label>
                       </div>
                       <div class="price">
                           <input type="text"  name="p_loan_blocking" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="PERSONAL LOAN BLOCKING">
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
                           <label>MORTGAGE BLOCKING  $</label>
                       </div>
                       <div class="price">
                           <input  type="text"  name="mortgage_blocking" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="MORTGAGE BLOCKING ">
                       </div>
                   </div>
                   {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>STUDENT LOAN BLOCKING $</label>
                       </div>
                       <div class="price">
                           <input type="text" name="student_loan_blocking" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="STUDENT LOAN BLOCKING">
                       </div>
                   </div>
                   {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
               </div>
               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>PUBLIC RECORD $</label>
                       </div>
                       <div class="price">
                           <input type="text" name="public_record" value="{{ $pricing->public_record ?? $default->public_record}}"  title="PUBLIC RECORD">
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
                           <label>CELL PHONE $</label>
                       </div>
                       <div class="price">
                           <input type="text"  name="cell_blocking" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="CELL PHONE">
                       </div>
                   </div>
                   {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
               </div>

               <div class="col-md-4" style="margin: 0">
                   <div class="priceName">
                       <div class="name">
                           <label>UNKNOWN $</label>
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
   <div class="pt-5">
       <div class="form-group">
           <div class="row">
               <div class="col-md-4">
                   <label> COLLECTIONS </label>
               </div>
           </div>
           @for($i = 0; $i < 4; $i++)
               <div class="row">
                   <div class="col-md-12">
                       <div class="col-md-2" style="margin: 0">
                           <div class="priceName">
                               <div class="nameCA">
                                   <label>MIN $</label>
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
                                       <label>MAX $</label>
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
                                   <label>% </label>
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
                                   <label>MIN/PRICE$</label>
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
                                       <label>MAX/PRICE$</label>
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
</div>  --}}
