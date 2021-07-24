

<div class="ms-ua-box mb-4">
    <div class="row text-center m-3">
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
    <div class="row text-center m-3">
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
    <div class="row text-center m-3">
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
                        <label for="securedcredit"> <strong>Secured Credit $</strong> </label>
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
    <div class="row text-center m-3">
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
    <div class="row text-center m-3">
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
    <div class="row text-center m-3">
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
                                <label for="price34"> <strong>Price  $</strong> </label>
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
                                <label for="price48"> <strong>Price  $</strong> </label>
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
    <div class="row text-center m-3">
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
    <div class="row text-center m-3">
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
                                <label for="price83"> <strong>Price  $</strong> </label>
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
                                <label for="price87"> <strong>Price  $</strong> </label>
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
                                <label for="price93"> <strong>Price  $</strong> </label>
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
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min98"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min98" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="MINIMUM">
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
                                <label for="price98"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price98" type="text" class="form-control"  id="auto_lease_sd_co_price_last"class="collection" title="PRICE">
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
                                <label for="min99"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min99" class="form-control" type="text" name="auto_loan_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max99"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max99" class="form-control" type="text"  name="auto_loan_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price99"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price99" class="form-control" type="text"  name="auto_loan_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_loan_sd_co" id="add_auto_loan_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_loan_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min100"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min100" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
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
                                <label for="price100"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price100" type="text" class="form-control"  id="auto_loan_sd_co_price_last"class="collection" title="Price">
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
                                <label for="min101"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min101" type="text" class="form-control" name="r_m_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max101"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max101" type="text" class="form-control"  name="r_m_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">


                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price101"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price101" type="text" class="form-control"  name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="r_m_sd_co" id="add_r_m_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r_m_sd_co_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min102"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min102" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_sd_co_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
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
                                <label for="price102"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price102" type="text" class="form-control"  id="r_m_sd_co_price_last"class="collection" title="Price">
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
    <div class="row text-center m-3">
        <h3>Repossession</h3>
    </div>
    <div>
        <div class="form-group">
            <h4>Auto Lease</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min103"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min103" type="text" class="form-control" name="auto_lease_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max103"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max103" type="text" class="form-control"  name="auto_lease_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0"title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price103"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price103" type="text" class="form-control"  name="auto_lease_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_lease_r" id="add_auto_lease_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_lease_r_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min104"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min104" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_r_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
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
                                <label for="price104"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price104" type="text" class="form-control"  id="auto_lease_r_price_last"class="collection" title="Price">
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
                                <label for="min105"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min105" type="text" class="form-control" name="auto_loan_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min105"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min105" type="text" class="form-control"  name="auto_loan_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price105"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price105" type="text" class="form-control"  name="auto_loan_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="auto_loan_r" id="add_auto_loan_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="auto_loan_r_range">

            </div>
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min106"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min106" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_r_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
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
                                <label for="price106"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price106" type="text" class="form-control"  id="auto_loan_r_price_last"class="collection" title="Price">
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
                                <label for="min107"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min107" type="text" name="r_m_r[0][minimum]" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" class="collection" data-id="0"  id="min-0" title="Min">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="max107"> <strong>Max $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="max107" type="text"  name="r_m_r[0][maximum]" class="form-control" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" class="collection" data-id="0"  id="max-0" title="Max">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="price107"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price107" type="text"  name="r_m_r[0][price]" class="form-control" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" class="collection" data-id="0"  id="percent-0" title="Price">
                            </div>
                        </div>
                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="col-md-1">
                        <div class="row mt-4 pt-2">
                          <strong class="add_range h3" class="btn form-control" data-type="r_m_r" id="add_r_m_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r_m_r_range">

            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="min108"> <strong>Min $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="min108" type="text" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_r_min_val_last" class="collection" data-id="0"  id="min-0" title="Min">
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
                                <label for="price108"> <strong>Price  $</strong> </label>
                            </div>
                            <div class="col-md-12">
                                <input id="price108" type="text" class="form-control"  id="r_m_r_price_last"class="collection" title="Price">
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
    <div class="row text-center m-3">
        <h3>CollecTion Pricing</h3>
    </div>
    <div class="pt-2">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label> <strong>Unknown Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min109{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input type="text" name="collection[{{$i}}][minimum]" value="{{ $pricing->collection[$i]['minimum'] ?? $default->collection[$i]['minimum']}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="MINIMUM"> --}}
                                    <input id="min109{{$i}}" type="text" class="form-control" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max109{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max109{{$i}}" type="text" class="form-control"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id109{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id109{{$i}}" type="text" class="form-control"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="%">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee109{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee109{{$i}}" type="text" class="form-control" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice109{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice109{{$i}}" type="text"  class="form-control" value="" id="min-price-{{isset($i) ? $i : ''}}" title="Min Priceminprice109{{$i}}" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice109{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice109{{$i}}" type="text"  class="form-control" value="" id="max-price-{{isset($i) ? $i : ''}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Credit Card Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min110{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min110{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max110{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max110{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id110{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id110{{$i}}" type="text" class="form-control" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee110{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee110{{$i}}" type="text" class="form-control" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice110{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice110{{$i}}" type="text" class="form-control"  value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice110{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice110{{$i}}" type="text" class="form-control" value="" id="max-price-{{$i}}" title="Max Price" readonly>

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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Charge Card Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min111{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min111{{$i}}" type="text" class="form-control" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max111{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max111{{$i}}" type="text" class="form-control" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id111{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id111{{$i}}" type="text" class="form-control" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee111{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee111{{$i}}" type="text" class="form-control" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice111{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice111{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice111{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice111{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>

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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Med Finance Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min112{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min112{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max112{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max112{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id112{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id112{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee112{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee112{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice112{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice112{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice112{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice112{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Jewelery Card Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min113{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min113{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max113{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max113{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id113{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id113{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee113{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee113{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice113{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice113{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice113{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice113{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Business Card Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min114{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min114{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max114{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max114{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id114{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id114{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee114{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee114{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice114{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice114{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice114"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice114" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Business Loan Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min115{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min115{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max115{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max115{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id115{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id115{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee115{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee115{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice115{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice115{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice115{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice115{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Personal Loan Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min116{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min116{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max116{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max116{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id116{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id116{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee116{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee116{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice116{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice116{{$i}}" class="form-control" type="text" value="" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice116{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice116{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Utility  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min117{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min117{{$i}}" class="form-control" name="" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max117{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max117{{$i}}" class="form-control" name="" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id117{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id117{{$i}}" class="form-control" name="" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee117{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee117{{$i}}" class="form-control" name="" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice117{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" name="" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice117{{$i}}" class="form-control" name="" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice117{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" name="" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice117{{$i}}" class="form-control" name="" type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Cellphone  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min118{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min118{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum'] ) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max118{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max118{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id118{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id118{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee118{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee118{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice118{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice118{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice118{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice118{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Check Cashing  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min119{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min119{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max119{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max119{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id119{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id119{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee119{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee119{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice119{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice119{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice119{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice119{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Payday  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min120{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min120{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max120{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max120{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id120{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id120{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee120{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee120{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice120{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice120{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice120{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice120{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Check Gurantee Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min121{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min121{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max121{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max121{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id121{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id121{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee121{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee121{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice121{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice121{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice121{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice121{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Cable/Internet/Tv Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min122{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min122{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max122{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max122{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id122{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id122{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee122{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee122{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice122{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice122{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice122{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice122{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Home Security  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min123{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min123{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max123{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max123{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id123{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id123{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee123{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee123{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min123{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="min123{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max123{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="max123{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Rent/Lease Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min124{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min124{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max124{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max124{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id124{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id124{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee124{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee124{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice124{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice124{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice124{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice124{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Hoa  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min125{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min125{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max125{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max125{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id125{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id125{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee125{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee125{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice125{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice125{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Auto Loan  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min126{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min126{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max126{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max126{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id126{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id126{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee126{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee126{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice126{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice126{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="MIN PRICE" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice126{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice126{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Auto Lease Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min127{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min127{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max127{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max127{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id127{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id127{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee127{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee127{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice127{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice127{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice127{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice127{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Motorcycle Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min128{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min128{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max128{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max128{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id128{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id128{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee128{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee128{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice128{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice128{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice128{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice128{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Auto Insurance Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min129{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min129{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max129{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max129{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id129{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id129{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee129{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee129{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice129{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice129{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice129{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice129{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Solar Provider Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min130{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min130{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max130{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max130{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id130{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id130{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="PERCENTAGE">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee130{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee130{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice130{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice130{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice130{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice130{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label>Household Item/Appliance Collection</label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min131{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min131{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max131{{$i}}">Max $</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max131{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id131{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id131{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee131{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee131{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice131{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice131{{$i}}" class="form-control" type="text"   value="" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice131{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice131{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Truck Loan Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min132{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min132{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max132{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max132{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id132{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id132{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee132{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee132{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice132{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice132{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice132{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice132{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Education Loan Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min133{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min133{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max133{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max133{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id133{{$i}}"><strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id133{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee133{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee133{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice133{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice133{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice133{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice133{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="MAX PRICE" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Mortgage Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min134{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min134{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max134{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max134{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id134{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id134{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee134{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee134{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice134{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice134{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice134{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice134{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Heloc  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min135{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min135{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max135{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max135{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">


                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id135{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id135{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee135{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee135{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice135{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice135{{$i}}" class="form-control" type="text" value="" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice135{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice135{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Timeshare/Resort Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min136{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min136{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max136{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max136{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id136{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id136{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee136{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee136{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice136{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice136{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice136{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice136{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Immegration Loan  Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min137{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min137{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max137{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max137{{$i}}" class="form-control" type="text" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id137{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id137{{$i}}" class="form-control" type="text" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee137{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee137{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice137{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text"   value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice137{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice137{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice137{{$i}}" class="form-control" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
            <div class="row mt-5">
                <div class="col-md-4">
                    <label> <strong>Child/Family Support Collection</strong> </label>
                </div>
            </div>
            @for($i = 0; $i < 4; $i++)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="min138{{$i}}"> <strong>Min $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="min138{{$i}}" class="form-control" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" class="collection" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2 ">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="max138{{$i}}"> <strong>Max $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="max138{{$i}}" class="form-control" type="text" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" class="collection" data-id="{{$i}}"  id="max-{{$i}}" title="Max">

                                    </div>
                                </div>
                            @endif
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id138{{$i}}"> <strong>%</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="id138{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" class="collection" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addfee138{{$i}}"> <strong>Add Fee $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    <input id="addfee138{{$i}}" class="form-control" type="text"  name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="minprice138{{$i}}"> <strong>Min/Price $</strong> </label>
                                </div>
                                <div class="col-md-12">
                                    {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['minimum']?$pricing->collection[$i]['minimum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['minimum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="min-price-{{$i}}" title="MIN PRICE" readonly> --}}
                                        <input id="minprice138{{$i}}" class="form-control" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-2">
                            @if($i < 3)
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="maxprice138{{$i}}"> <strong>Max/Price $</strong> </label>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <input id="" class="form-control" type="text" value="{{$pricing->collection[$i]['maximum']?$pricing->collection[$i]['maximum']*($pricing->collection[$i]['percentage']/100) +$pricing->collection[$i]['additional_fee']:null??
                                        $default->collection[$i]['maximum']*($default->collection[$i]['percentage']/100) +$default->collection[$i]['additional_fee']}}" id="max-price-{{$i}}" title="MAX PRICE" readonly> --}}
                                        <input id="maxprice138{{$i}}" class="form-control" type="text" value="" title="Max Price" readonly>
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





   {{-- <div class="ms-ua-box">

       <input type="hidden" name="user_id" value="{{$pricing->user_id}}">
   <div>
       <div class="form-group">
           <div class="row">
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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

               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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
               <div class="col-md-4">
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

               <div class="col-md-4">
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
                       <div class="col-md-2">
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
                       <div class="col-md-2 ">
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
                       <div class="col-md-2">
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
                       <div class="col-md-2">
                           <div class="priceName">
                               <div class="namCA">
                                   <label>ADD FEE $</label>
                               </div>
                               <div class="priceCA">
                                   <input type="text"  name="collection[{{$i}}][additional_fee]" value="{{ $pricing->collection[$i]['additional_fee'] ?? $default->collection[$i]['additional_fee']}}"  class="collection" data-id="{{$i}}"  id="fee-{{$i}}" title="ADDITIONAL FEE">
                               </div>
                           </div>
                           {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                       </div>
                       <div class="col-md-2">
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
                       <div class="col-md-2">
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
