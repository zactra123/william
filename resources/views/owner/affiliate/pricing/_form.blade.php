<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="main-content-label mg-b-5">
					Pricing
				</div>
				<p class="mg-b-20">Here You see Pricing.</p>
				<div id="wizard3">
					<h3 class="screenhide">Personal Information and Statement</h3>
					<section class="mt-5">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12 mb-2 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" id="inquiries" class="form-control" placeholder="Inquiries $" name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}"  title="Inquiries">
                              </div>
                            </div>
                            {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 col-sm-12 col-12 mb-2 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" id="personalinfo" name="personal_info" class="form-control" placeholder="Personal Info $" value="{{ $pricing->personal_info ?? $default->personal_info}}"  title="Personal Info">
                            </div>
                          </div>
                          {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 col-sm-12 col-12 mb-2 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" id="fraudalerts" class="form-control" placeholder="Fraud Alerts $" name="fraud_alerts" value="{{ $pricing->fraud_alerts ?? $default->fraud_alerts}}"  title="Fraud Alerts">
                            </div>
                          </div>
                          {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</section>
					<h3>Late Pricing</h3>
					<section class="mt-5">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="creditcardlate" type="text" class="form-control" placeholder="Credit Card Late $" name="credit_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card Late">
                            </div>
                          </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="chargecardlate" type="text" class="form-control" placeholder="Charge Card Late $" name="charge_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card Late">
                              </div>
                            </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input  type="text" id="securedcreditcard" class="form-control" placeholder="Secured Credit Card $" name="secured_credit_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit Card">
                            </div>
                          </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="autoloanlate" type="text" class="form-control" name="auto_loan_late" placeholder="Auto Loan Late $" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan Late">
                              </div>
                            </div>
                            {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="autoleaselate" type="text" class="form-control" name="auto_lease_late" placeholder="Auto Lease Late $" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease Late ">
                            </div>
                          </div>
                            {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" id="recreationalmerchandise" class="form-control" placeholder="Recreational Merchandise Late $" name="r_m_late" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="Recreational Merchandise Late">
                            </div>
                          </div>
                            {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="unsecuredloanlate" type="text" class="form-control" placeholder="Unsecured Loan Late $" name="unscured_loan_late" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan Late">
                              </div>
                            </div>
                            {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" id="lineofcredit" class="form-control" name="line_credit_late" placeholder="Line of Credit Late $" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="Line of Credit Late">
                            </div>
                          </div>
                            {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                {{-- <label for="securedloanlate"> <strong>Secured Loan Late $</strong> </label> --}}
                              </div>
                              <div class="col-md-12">
                                <input type="text" id="securedloanlate" class="form-control" name="scured_loan_late" placeholder="Secured Loan Late $" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan Late">
                              </div>
                            </div>

                            {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="mortagagelate" type="text" class="form-control" name="mortgage_late" placeholder="Mortgage Late $" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage Late">
                              </div>
                            </div>
                            {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" id="fhamortgage" class="form-control" name="fha_mort_late" placeholder="Fha Mortgage Late $" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage Late">
                              </div>
                            </div>
                            {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="homeequity" class="form-control" type="text" name="home_equity_late" placeholder="Home Equity Late $" value="{{ $pricing->public_record ?? $default->public_record}}"  title="Home Equity Late">
                              </div>
                            </div>
                            {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" class="form-control" id="salescontract" name="sale_contract_late" placeholder="Sales Contract Late $" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract Late">
                              </div>
                            </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" class="form-control" id="rentallate" name="rental_late" placeholder="Rental Late $" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental Late">
                              </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="convrealestate" type="text" class="form-control" name="conv_real_mtg_late" placeholder="Conv. Real Estate Mtg Late $" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg Late">
                              </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="educationlate" type="text" class="form-control" placeholder="Education Late $" name="education_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education Late">
                              </div>
                            </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="securedloclate" type="text" class="form-control" placeholder="Secured Loc Late $" name="secured_loc_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc Late">
                            </div>
                          </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" class="form-control" name="utlity_late" placeholder="Utility Company Late $" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Utility Company Late">
                              </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" class="form-control" id="childsupportlate" placeholder="Child Support Late $" name="child_support_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Child Support Late">
                              </div>
                            </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input type="text" class="form-control" name="unknown_late" placeholder="Unknown Late $" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Unknown">
                              </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
						<br><br><br><br><br>
					</section>
					<h3>Blocking Pricing</h3>
					<section class="mt-5">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="creditcard" type="text" class="form-control" placeholder="Credit Card $" name="credit_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card">
                              </div>
                            </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="chargecard" type="text" class="form-control" placeholder="Charge Card $" name="charge_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card">
                              </div>
                            </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="securedcredit" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                              </div>
                            </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="autoloan" type="text" class="form-control" placeholder="Auto Loan $" name="auto_loan_block" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan">
                              </div>
                            </div>
                            {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input  type="text" class="form-control" name="auto_lease_block" placeholder="Auto Lease $" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease">
                              </div>
                            </div>
                            {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="recreationalmerchandise" type="text" class="form-control" placeholder="Recreational Merchandise $" name="r_m_block" value="{{ $pricing->cc_blocking ?? $default->cc_blocking}}"  title="Recreational Merchandise">
                              </div>
                            </div>
                            {!! $errors->first('cc_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="unsercuredloan" class="form-control" type="text" placeholder="Unsecured Loan $" name="unsecured_loan_block" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan">
                              </div>
                            </div>
                            {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="lineofcredit" type="text" class="form-control" placeholder="Line of Credit $" name="line_credit_block" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="Line of Credit">
                              </div>
                            </div>
                            {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="securedloan" type="text" class="form-control" placeholder="Secured Loan $" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                            </div>
                          </div>
                            {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="mortgage" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                            </div>
                          </div>
                            {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                              <div class="col-md-12">
                                <input id="fhamortgage" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                              </div>
                            </div>
                            {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="homeequity" type="text" class="form-control" placeholder="Home Equity $" name="home_equity_block" value="{{ $pricing->public_record ?? $default->public_record}}"  title="Home Equity">
                            </div>
                          </div>
                            {!! $errors->first('public_records', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="salescontract" type="text" class="form-control" placeholder="Sales Contract $" name="sale_contract_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract">
                            </div>
                          </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                          <div class="row">
                            <div class="col-md-12">
                              <input id="rental1" type="text" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                            </div>
                          </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="realestate1" type="text" class="form-control" placeholder="Conv. Real Estate Mtg $" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="education" type="text" class="form-control" placeholder="Education $" name="education_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education">
                                </div>
                            </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="securedloc1" type="text" class="form-control" placeholder="Secured Loc $" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="utilitycompany1" type="text" class="form-control" placeholder="Utility Company $" name="utility_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Utility Company">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="childsupport" type="text" class="form-control" placeholder="Child Support $" name="child_support_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Child Support">
                                </div>
                            </div>
                            {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" id="unknownblocking" class="form-control" placeholder="Unknown Blocking $" name="unknown_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Unknown Blocking">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
						<br><br><br><br><br>
					</section>
          <h3>Charge off Pricing no Range</h3>
          <section class="mt-5">
            <div class="mb-5">
                <h5>Regular Charged off Removal – No Settlement </h5>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="securedcredit" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card Late">
                                </div>
                            </div>
                            {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="securedloan" type="text" class="form-control" placeholder="Secured Loan $" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                                </div>
                            </div>
                            {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="realestatemtg1" type="text" class="form-control" placeholder="Conv. Real Estate Mtg $" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="mortgage1" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                </div>
                            </div>
                            {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="fhamortgage1" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                </div>
                            </div>
                            {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" id="rental2" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" id="securedloc2" placeholder="Secured Loc $" class="form-control" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Unknown">
                                </div>
                            </div>
                            {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="mb-5">
              <h5>Regular Charged Off - Removal After Settlement  </h5>
              <div class="form-group mt-4">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedcredit" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                              </div>
                          </div>
                          {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="" type="text" class="form-control" name="secured_loan_block" placeholder="Secured Loan $" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                              </div>
                          </div>
                          {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="realestatemtg2" type="text" class="form-control" placeholder="Conv. Real Estate Mtg $" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="mortgage2" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="fhamortgage2" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="rental3" type="text" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedloc3" type="text" class="form-control" placeholder="Secured Loc $" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>

                  </div>
              </div>
          </div>
          <div class="mb-5">
              <h5>Doubled Charged Off Removal – No Settlement </h5>
              <div class="form-group mt-4">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedcredit3" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                              </div>
                          </div>
                          {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedloan3" type="text" class="form-control" placeholder="Secured Loan $" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                              </div>
                          </div>
                          {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="realestate3" type="text" class="form-control" placeholder="Conv. Real estate Mtg $" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real estate Mtg">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="mortgage3" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="fhamortgage3" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="rental4" type="text" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedloc4" type="text" class="form-control" placeholder="Secured Loc $" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>

                  </div>
              </div>
          </div>
          <div>
              <h5>Doubled Charged Off - Removal After Settlement </h5>
              <div class="form-group mt-4">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedcredit4" type="text" placeholder="Secured Credit $" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                              </div>
                          </div>
                          {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="priceName">
                              <div class="price">
                                  <input id="securedloan4" type="text" placeholder="Secured Loan $" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                              </div>
                          </div>
                          {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="realestate4" type="text" placeholder="Conv. Real Estate Mtg $" class="form-control" name="conv_real_mtg_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Conv. Real Estate Mtg">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="mortgage4" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="fhamortgage4" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                              </div>
                          </div>
                          {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="rental5" type="text" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="row">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input id="securedloc5" type="text" class="form-control" placeholder="Secured Loc $" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                              </div>
                          </div>
                          {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                      </div>

                  </div>
              </div>
          </div>
          </section>
          <h3>Regular Charged Off Removal – <br> No Settlement Pricing</h3>
          <section class="mt-5">
            <div class="">
                <div class="form-group mb-5">
                    <h5>Credit Card  </h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="credit_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : '' }}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Max $" class="form-control collection" name="credit_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                        </div>
                                    </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="credit_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="credit_card_co" id="add_credit_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="credit_card_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-4 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
																		<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-3 mmb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control collection" placeholder="Price $" id="credit_card_co_price_last" title="Price">
                                </div>
                            </div>
                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Charge Card</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="charge_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="priceName">
                                    <div class="priceCA">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="charge_card_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="charge_card_co" id="add_charge_card_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="charge_card_co_range">

                    </div>
                    <div class="row p-3">
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_co_min_val_last" data-id="0"  id="min-0" title="Min">
                              </div>
                          </div>
                          {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-4 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
																	<input type="text" class="form-control" placeholder="Max $" value="Infinite" name="" readonly>
                              </div>
                          </div>
                          {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="col-md-3 mmb-5">
                          <div class="row">
                              <div class="col-md-12">
                                  <input type="text" class="form-control collection" placeholder="Price $"  id="charge_card_co_price_last" title="Price">
                              </div>
                          </div>
                          {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5> Sales Contract</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="">
                                      </div>
                                        <input type="text" class="form-control collection" placeholder="Price $" name="sales_contract_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="sales_contract_co" id="add_sales_contract_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="sales_contract_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" name="" placeholder="Max $" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="sales_contract_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Unsecured</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="unsecured_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="unsecured_co" id="add_unsecured_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="unsecured_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" name="" placeholder="Max $" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection"  id="unsecured_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Line Of Credit</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="line_credit_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="line_credit_co" id="add_line_credit_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="line_credit_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                          <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="line_credit_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Home Equity</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="home_equity_co" id="add_home_equity_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="home_equity_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="home_equity_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Education</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="education_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="education_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="home_equity_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="education_co" id="add_education_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="education_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" id="education_co_price_last" placeholder="Price $" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Utility Company</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="utility_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="utility_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="utility_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}"  data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                    <strong class="add_range h3 pointer" class="btn form-control" data-type="utility_co" id="add_utility_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="utility_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="utility_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Child Support</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="child_support_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="child_support_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="child_support_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="child_support_co" id="add_child_support_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="child_support_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="child_support_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <div class="form-group mb-5">
                    <h5>Auto Lease</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="auto_lease_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="auto_lease_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_lease_co" id="add_auto_lease_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_lease_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_co_min_val_last"  data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control collection" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="auto_lease_co_price_last"  title="PRICE">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Auto Loan</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control" name="auto_loan_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}"  data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="auto_loan_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="auto_loan_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control collection" data-type="auto_loan_co" id="add_auto_loan_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_loan_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="auto_loan_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Recreational Merchandise</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="r_m_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="r_m_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="r_m_co" id="add_r_m_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="r_m_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="r_m_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </section>
          <h3>Regular Charged Off - <br> Removal After Settlement Pricing</h3>
          <section class="mt-5">
            <div>
                <div class="form-group mb-5">
                    <h5>Credit Card  </h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="credit_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="credit_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="credit_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Percentage">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="credit_card_s_co" id="add_credit_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="credit_card_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="priceName">
                                    <div class="priceCA">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="credit_card_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Charge Card</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="charge_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="charge_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="priceName">
                                    <div class="priceCA">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="charge_card_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="charge_card_s_co" id="add_charge_card_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>

                            </div>
                        </div>
                    </div>
                    <div id="charge_card_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="charge_card_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5> Sales Contract</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="sales_contract_s_co" id="add_sales_contract_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sales_contract_s_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="sales_contract_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Unsecured</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="unsecured_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="unsecured_s_co" id="add_unsecured_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="unsecured_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="unsecured_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Line of Credit</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="line_credit_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="line_credit_s_co" id="add_line_credit_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>

                            </div>
                        </div>
                    </div>
                    <div id="line_credit_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="line_credit_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Home Equity</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="home_equity_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="home_equity_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="home_equity_s_co" id="add_home_equity_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home_equity_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="home_equity_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Education</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="education_s_co[0][minimum]" value="{{  isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="education_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="education_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Percentage">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="education_s_co" id="add_education_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="education_s_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="education_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Utility Company</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="utility_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="utility_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="utility_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="utility_s_co" id="add_utility_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="utility_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="utility_s_co_price_val_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Child Support</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="child_support_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="child_support_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="child_support_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="child_support_s_co" id="add_child_support_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="child_support_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_s_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="child_support_s_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <div class="form-group mb-5">
                    <h5>Auto Lease</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="auto_lease_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <label for="price47"> <strong>Price $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="auto_lease_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_lease_s_co" id="add_auto_lease_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_lease_s_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="auto_lease_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Auto Loan</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="auto_loan_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="auto_loan_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="auto_loan_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_loan_s_co" id="add_auto_loan_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_loan_s_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="auto_loan_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Recreational Merchandise</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="r_m_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="r_m_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="r_m_s_co" id="add_r_m_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="r_m_s_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="r_m_s_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </section>
          <h3>Doubled Charged Off Removal – <br> No Settlement Pricing</h3>
          <section class="mt-5">
            <div>
                <div class="form-group mb-5">
                    <h5>Credit Card  </h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="credit_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="credit_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="credit_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-1">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="credit_card_d_co" id="add_credit_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="credit_card_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="credit_card_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Charge Card</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" class="form-control collection" name="charge_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="charge_card_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="charge_card_d_co" id="add_charge_card_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="charge_card_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" id="charge_card_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5> Sales Contract</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="sales_contract_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="sales_contract_d_co" id="add_sales_contract_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sales_contract_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="sales_contract_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Unsecured</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" class="form-control collection" name="unsecured_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="unsecured_d_co" id="add_unsecured_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="unsecured_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="unsecured_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Line of Credit</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="line_credit_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="line_credit_d_co" id="add_line_credit_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="line_credit_d_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="line_credit_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Home Equity</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="home_equity_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="home_equity_d_co" id="add_home_equity_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home_equity_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_d_co_min_val_last" data-id="0"  id="min-0" title="Minimum">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="home_equity_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Education</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="education_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="education_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="education_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="education_d_co" id="add_education_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>

                            </div>
                        </div>
                    </div>
                    <div id="education_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="education_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Utility Company</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="utility_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="utility_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="utility_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Percentage">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="utility_d_co" id="add_utility_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="utility_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="utility_d_co_price_val_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Child Support</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="child_support_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="child_support_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="child_support_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="child_support_d_co" id="add_child_support_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="child_support_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_d_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="child_support_d_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group mb-5">
                    <h5>Auto Lease</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="auto_lease_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_lease_d_co" id="add_auto_lease_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_lease_d_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_lease_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <h5>Auto Loan</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" placeholder="Min $" type="text" name="auto_loan_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" type="text" placeholder="Max $" name="auto_loan_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" type="text" placeholder="Price $" name="auto_loan_d_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_loan_d_co" id="add_auto_loan_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_loan_d_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_loan_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Recreational Merchandise</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="r_m_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="r_m_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="r_m_d_co" id="add_r_m_d_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="r_m_d_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $"  id="r_m_d_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </section>
          <h3>Doubled Charged Off - <br> Removal After Settlement Pricing</h3>
          <section class="mt-5">
            <div>
                <div class="form-group mb-5">
                    <h5>Credit Card  </h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="credit_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="credit_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="credit_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                              <div class="row pt-2">
                                <strong class="add_range h3 pointer" class="btn form-control" data-type="credit_card_sd_co" id="add_credit_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                              </div>

                            </div>
                        </div>
                    </div>
                    <div id="credit_card_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="credit_card_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Charge Card</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="charge_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="charge_card_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="charge_card_sd_co" id="add_charge_card_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="charge_card_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_sd_co_min_val_last" data-id="0"  id="min-0" title="Min82">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="charge_card_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5> Sales Contract</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="sales_contracts_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="sales_contract_sd_co" id="add_sales_contract_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sales_contract_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="sales_contract_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Unsecured</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="unsecured_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="unsecured_sd_co" id="add_unsecured_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="unsecured_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="unsecured_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Line of Credit</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="line_credit_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="line_credit_sd_co" id="add_line_credit_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="line_credit_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="line_credit_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Home Equity</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="home_equity_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="home_equity_sd_co" id="add_home_equity_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home_equity_sd_co_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="home_equity_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Education</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="education_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="education_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="education_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="education_sd_co" id="add_education_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="education_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="education_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Utility Company</h5>
                    <div class="col-md-12 pt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="utility_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="utility_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="utility_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="utility_sd_co" id="add_utility_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="utility_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="utility_sd_co_price_val_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Child Support</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="child_support_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="child_support_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="child_support_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="child_support_sd_co" id="add_child_support_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="child_support_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_sd_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="child_support_sd_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group mb-5">
                    <h5>Auto Lease</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="auto_lease_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="auto_lease_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_lease_sd_co" id="add_auto_lease_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_lease_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_sd_co_min_val_last" data-id="0"  id="min-0" title="Minimum">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_lease_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Auto Loan</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" placeholder="Min $" type="text" name="auto_loan_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" type="text" placeholder="Max $" name="auto_loan_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control collection" type="text" placeholder="Price $" name="auto_loan_sd_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_loan_sd_co" id="add_auto_loan_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_loan_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_loan_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Recreational Merchandise</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="r_m_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="r_m_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="r_m_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="r_m_sd_co" id="add_r_m_sd_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="r_m_sd_co_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="r_m_sd_co_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
          <h3>Repossession</h3>
          <section class="mt-5">
            <div>
                <div class="form-group mb-5">
                    <h5>Auto Lease</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="auto_lease_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_lease_r" id="add_auto_lease_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_lease_r_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_lease_r_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Auto Loan</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" name="auto_loan_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Max $" name="auto_loan_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" name="auto_loan_r[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="auto_loan_r" id="add_auto_loan_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="auto_loan_r_range">

                    </div>
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="auto_loan_r_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <h5>Recreational Merchandise</h5>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="r_m_r[0][minimum]" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Max $" name="r_m_r[0][maximum]" class="form-control collection" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Price $" name="r_m_r[0][price]" class="form-control collection" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-1 mmb-5">
                                <div class="row pt-2">
                                  <strong class="add_range h3 pointer" class="btn form-control" data-type="r_m_r" id="add_r_m_r_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="r_m_r_range">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-4 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
																				<input type="text" name="" class="form-control" placeholder="Max $" value="Infinite" readonly>
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 mmb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control collection" placeholder="Price $" id="r_m_r_price_last" title="Price">
                                    </div>
                                </div>
                                {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </section>
          <h3>Collection Pricing</h3>
          <section class="mt-5">
            <div class="pt-2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Unknown Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="%">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <input type="text" placeholder="Min/Price $" class="form-control" value="" id="min-price-{{isset($i) ? $i : ''}}" title="Min Priceminprice109{{$i}}" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max/Price $" class="form-control" value="" id="max-price-{{isset($i) ? $i : ''}}" title="Max Price" readonly>
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
                            <h5>Credit Card Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Charge Card Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Min $" class="form-control collection" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="%" class="form-control collection" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Add Fee $" class="form-control collection" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Med Finance Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Jewelery Card Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Max $" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Business Card Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Max $" type="text" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Business Loan Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Personal Loan Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Utility  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" name="" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Max $" name="" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" name="" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" name="" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" name="" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" name="" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Cellphone  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum'] ) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Max $" type="text"  name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Check Cashing  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" value="" placeholder="Min/Price $" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Payday Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Check Gurantee Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Cable/Internet/Tv Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Home Security Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Rent/Lease Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Add Fee $" type="text" class="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Hoa Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Auto Loan  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                              <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Auto Lease Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" value="" placeholder="Max/Price $" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Motorcycle Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Max $" type="text" class="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Auto Insurance Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Min/Price $" type="text" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Solar Provider Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Household Item/Appliance Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $"  value="" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Truck Loan Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                              <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Education Loan Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Mortgage Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" value="" placeholder="Min/Price $" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Heloc  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" placeholder="Min $" type="text" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Timeshare/Resort Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" placeholder="Max/Price $" value="" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Immegration Loan  Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <inputclass="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" value="" placeholder="Min/Price $" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input  class="form-control" type="text" value="" placeholder="Max/Price $" id="max-price-{{$i}}" title="Max Price" readonly>
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
                            <h5>Child/Family Support Collection</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-12 mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Min $" name="collection[{{$i}}][minimum]" value="{{ isset($pricing->collection[$i]['minimum']) ? $default->collection[$i]['minimum'] : ''}}" data-id="{{$i}}"  id="min-{{$i}}" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="collection[{{$i}}][maximum]" value="{{ isset($pricing->collection[$i]['maximum']) ? $default->collection[$i]['maximum'] : ''}}" data-id="{{$i}}"  id="max-{{$i}}" title="Max">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Min/Price $" value="" id="min-price-{{$i}}" title="Min Price" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-2 mmb-5">
                                    @if($i < 3)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Max/Price $" type="text" value="" title="Max Price" readonly>
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
          </section>
				</div>
			</div>
		</div>
	</div>
</div>
