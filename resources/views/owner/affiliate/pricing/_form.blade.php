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
                                                {{-- <label for="inquiries"> <strong>Inquiries $</strong> </label> --}}
                                          </div>
                                          <div class="col-md-12">
                                                <input type="text" id="inquiries" class="form-control" placeholder="Inquiries $" name="inquiries" value="{{ $pricing->inquiries ?? $default->inquiries}}"  title="Inquiries">
                                          </div>
                                        </div>
                                    {!! $errors->first('inquiries', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 mb-2 mmb-5">
                                        <div class="row">
                                          <div class="col-md-12">
                                            {{-- <label for="personalinfo"> <strong>Personal Info $</strong> </label> --}}
                                          </div>
                                          <div class="col-md-12">
                                            <input type="text" id="personalinfo" name="personal_info" class="form-control" placeholder="Personal Info $" value="{{ $pricing->personal_info ?? $default->personal_info}}"  title="Personal Info">
                                          </div>
                                        </div>

                                    {!! $errors->first('personal_info', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 mb-2 mmb-5">
                                     <div class="row">
                                        <div class="col-md-12">
                                          {{-- <label for="fraudalerts"> <strong>Fraud Alerts $</strong> </label> --}}
                                        </div>
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
                                      {{-- <label for="creditcardlate"> <strong>Credit Card Late $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="creditcardlate" type="text" class="form-control" placeholder="Credit Card Late $" name="credit_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card Late">
                                    </div>
                                  </div>
                                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="chargecardlate"> <strong>Charge Card Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="chargecardlate" type="text" class="form-control" placeholder="Charge Card Late $" name="charge_card_late" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="securedcreditcard"> <strong>Secured Credit Card $</strong> </label> --}}
                                    </div>
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
                                        {{-- <label for="autoloanlate"> <strong>Auto Loan Late  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="autoloanlate" type="text" class="form-control" name="auto_loan_late" placeholder="Auto Loan Late $" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="autoleaselate"> <strong>Auto Lease Late  $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="autoleaselate" type="text" class="form-control" name="auto_lease_late" placeholder="Auto Lease Late $" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease Late ">
                                    </div>
                                  </div>

                                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="recreationalmerchandise"> <strong>Recreational Merchandise Late  $</strong> </label> --}}
                                    </div>
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
                                        {{-- <label for="unsecuredloanlate"> <strong>Unsecured Loan Late  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="unsecuredloanlate" type="text" class="form-control" placeholder="Unsecured Loan Late $" name="unscured_loan_late" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="lineofcredit"> <strong>Line of Credit Late  $</strong> </label> --}}
                                    </div>
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
                                        {{-- <label for="mortagagelate"> <strong>Mortgage Late  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="mortagagelate" type="text" class="form-control" name="mortgage_late" placeholder="Mortgage Late $" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="fhamortgage"> <strong>Fha Mortgage Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input type="text" id="fhamortgage" class="form-control" name="fha_mort_late" placeholder="Fha Mortgage Late $" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label form="homeequity"> <strong>Home Equity Late $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="salescontract"> <strong>Sales Contract Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" id="salescontract" name="sale_contract_late" placeholder="Sales Contract Late $" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="rentallate"> <strong>Rental Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" id="rentallate" name="rental_late" placeholder="Rental Late $" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="convrealestate"> <strong>Conv. Real Estate Mtg Late $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="educationlate"> <strong>Education Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="educationlate" type="text" class="form-control" placeholder="Education Late $" name="education_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="securedloclate"> <strong>Secured Loc Late $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="securedloclate" type="text" class="form-control" placeholder="Secured Loc Late $" name="secured_loc_late" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc Late">
                                    </div>
                                  </div>

                                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label id="utilitycompany"> <strong>Utility Company Late $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="childsupportlate"> <strong>Child Support Late $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" id="childsupportlate" placeholder="Child Support Late $" name="child_support_late" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Child Support Late">
                                      </div>
                                    </div>

                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label> <strong>Unknown Late $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="creditcard"> <strong>Credit Card $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="creditcard" type="text" class="form-control" placeholder="Credit Card $" name="credit_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card">
                                      </div>
                                    </div>

                                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="chargecard"> <strong>Charge Card $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="chargecard" type="text" class="form-control" placeholder="Charge Card $" name="charge_card_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Charge Card">
                                      </div>
                                    </div>

                                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="securedcredit"> <strong>Secured Credit $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="autoloan"> <strong>Auto Loan  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="autoloan" type="text" class="form-control" placeholder="Auto Loan $" name="auto_loan_block" value="{{ $pricing->mortgage_late ?? $default->mortgage_late}}"  title="Auto Loan">
                                      </div>
                                    </div>

                                    {!! $errors->first('mortgage_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label> <strong>Auto Lease  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input  type="text" class="form-control" name="auto_lease_block" placeholder="Auto Lease $" value="{{ $pricing->student_loan_late ?? $default->student_loan_late}}"  title="Auto Lease">
                                      </div>
                                    </div>

                                    {!! $errors->first('student_loan_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="recreationalmerchandise"> <strong>Recreational Merchandise $</strong> </label> --}}
                                      </div>
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
                                        {{-- <label for="unsercuredloan"> <strong>Unsecured Loan $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="unsercuredloan" class="form-control" type="text" placeholder="Unsecured Loan $" name="unsecured_loan_block" value="{{ $pricing->utility_blocking ?? $default->utility_blocking}}"  title="Unsecured Loan">
                                      </div>
                                    </div>

                                    {!! $errors->first('utility_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="lineofcredit"> <strong>Line of Credit  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="lineofcredit" type="text" class="form-control" placeholder="Line of Credit $" name="line_credit_block" value="{{ $pricing->auto_blocking ?? $default->auto_blocking}}"  title="Line of Credit">
                                      </div>
                                    </div>

                                    {!! $errors->first('auto_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="securedloan"> <strong>Secured Loan $</strong> </label> --}}
                                    </div>
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
                                      {{-- <label for="mortgage"> <strong>Mortgage  $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="mortgage" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                    </div>
                                  </div>

                                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                      <div class="col-md-12">
                                        {{-- <label for="fhamortgage"> <strong>Fha Mortgage $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                        <input id="fhamortgage" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                      </div>
                                    </div>

                                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="homeequity"> <strong>Home Equity $</strong> </label> --}}
                                    </div>
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
                                      {{-- <label for="salescontract"> <strong>Sales Contract $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="salescontract" type="text" class="form-control" placeholder="Sales Contract $" name="sale_contract_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Sales Contract">
                                    </div>
                                  </div>

                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {{-- <label for="rental1"> <strong>Rental $</strong> </label> --}}
                                    </div>
                                    <div class="col-md-12">
                                      <input id="rental1" type="text" class="form-control" placeholder="Rental $" name="rental_block" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Rental">
                                    </div>
                                  </div>

                                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="realestate1"> <strong>Conv. Real Estate Mtg $</strong> </label> --}}
                                        </div>
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
                                            {{-- <label for="education"> <strong>Education $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="education" type="text" class="form-control" placeholder="Education $" name="education_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Education">
                                        </div>
                                    </div>
                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="securedloc1"> <strong>Secured Loc $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="securedloc1" type="text" class="form-control" placeholder="Secured Loc $" name="unknown" value="{{ $pricing->unknown ?? $default->unknown}}"  title="Secured Loc">
                                        </div>
                                    </div>
                                    {!! $errors->first('unknown', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="utilitycompany1"> <strong>Utility Company $</strong> </label> --}}
                                        </div>
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
                                            {{-- <label for="childsupport"> <strong>Child Support $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="childsupport" type="text" class="form-control" placeholder="Child Support $" name="child_support_block" value="{{ $pricing->cell_blocking ?? $default->cell_blocking}}"  title="Child Support">
                                        </div>
                                    </div>
                                    {!! $errors->first('cell_blocking', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="unknownblocking"> <strong>Unknown Blocking $</strong> </label> --}}
                                        </div>
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
                                            {{-- <label for="securedcredit"> <strong>Secured Credit $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="securedcredit" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Credit Card Late">
                                        </div>
                                    </div>
                                    {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="securedloan"> <strong>Secured Loan $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="securedloan" type="text" class="form-control" placeholder="Secured Loan $" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                                        </div>
                                    </div>
                                    {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="realestatemtg1"> <strong>Conv. Real Estate Mtg $</strong> </label> --}}
                                        </div>
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
                                            {{-- <label for="mortgage1"> <strong>Mortgage  $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="mortgage1" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                        </div>
                                    </div>
                                    {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="fhamortgage1"> <strong>Fha Mortgage $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input id="fhamortgage1" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                        </div>
                                    </div>
                                    {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="rental2"> <strong>Rental $</strong> </label> --}}
                                        </div>
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
                                            {{-- <label for="securedloc2"> <strong>Secured Loc $</strong> </label> --}}
                                        </div>
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
                                          {{-- <label for="securedcredit"> <strong>Secured Credit $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="securedcredit" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                                      </div>
                                  </div>
                                  {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for=""> <strong>Secured Loan $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="" type="text" class="form-control" name="secured_loan_block" placeholder="Secured Loan $" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                                      </div>
                                  </div>
                                  {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="realestatemtg2"> <strong>Conv. Real Estate Mtg $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="mortgage2"> <strong>Mortgage  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="mortgage2" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="fhamortgage2"> <strong>Fha Mortgage $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="fhamortgage2" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="rental3"> <strong>Rental $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="securedloc3"> <strong>Secured Loc $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="securedcredit3"> <strong>Secured Credit $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="securedcredit3" type="text" class="form-control" placeholder="Secured Credit $" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                                      </div>
                                  </div>
                                  {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="securedloan3"> <strong>Secured Loan $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="securedloan3" type="text" class="form-control" placeholder="Secured Loan $" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                                      </div>
                                  </div>
                                  {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="realestate3"> <strong>Conv. Real estate Mtg $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="mortgage3"> <strong>Mortgage  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="mortgage3" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="fhamortgage3"> <strong>Fha Mortgage $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="fhamortgage3" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="rental4"> <strong>Rental $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="securedloc4"> <strong>Secured Loc $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="securedcredit4"> <strong>Secured Credit $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="securedcredit4" type="text" placeholder="Secured Credit $" class="form-control" name="secured_credit_block" value="{{ $pricing->cc_late ?? $default->cc_late}}"  title="Secured Credit">
                                      </div>
                                  </div>
                                  {!! $errors->first('cc_late', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="priceName">
                                      <div class="name">
                                          {{-- <label for="securedloan4"> <strong>Secured Loan $</strong> </label> --}}
                                      </div>
                                      <div class="price">
                                          <input id="securedloan4" type="text" placeholder="Secured Loan $" class="form-control" name="secured_loan_block" value="{{ $pricing->p_loan_blocking ?? $default->p_loan_blocking}}"  title="Secured Loan">
                                      </div>
                                  </div>
                                  {!! $errors->first('p_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="realestate4"> <strong>Conv. Real Estate Mtg $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="mortgage4"> <strong>Mortgage  $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="mortgage4" type="text" class="form-control" placeholder="Mortgage $" name="mortgage_block" value="{{ $pricing->mortgage_blocking ?? $default->mortgage_blocking}}"  title="Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('mortgage_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="fhamortgage4"> <strong>Fha Mortgage $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input id="fhamortgage4" type="text" class="form-control" placeholder="Fha Mortgage $" name="fha_mortgage_block" value="{{ $pricing->student_loan_blocking ?? $default->student_loan_blocking}}"  title="Fha Mortgage">
                                      </div>
                                  </div>
                                  {!! $errors->first('student_loan_blocking', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for="rental5"> <strong>Rental $</strong> </label> --}}
                                      </div>
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
                                          {{-- <label for="securedloc5"> <strong>Secured Loc $</strong> </label> --}}
                                      </div>
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
                                                {{-- <label for="min1"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="credit_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : '' }}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="max1"> <strong>Max $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Max $" class="form-control collection" name="credit_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                                </div>
                                            </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price1"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                            {{-- <label> <strong>Min $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-4 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label> <strong>Max $</strong> </label> --}}
                                        </div>
                                        <div class="col-md-12">
                                            {{-- <strong> Infinite</strong> --}}
																						<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                        </div>
                                    </div>
                                    {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-3 mmb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="price5"> <strong>Price $</strong> </label> --}}
                                        </div>
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
                                                {{-- <label for="min6"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max6"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="charge_card_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="priceName">
                                            <div class="nameCA">
                                                {{-- <label for="price6"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                          {{-- <label for="min7"> <strong>Min $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                      </div>
                                  </div>
                                  {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-4 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                      </div>
                                      <div class="col-md-12">
                                          {{-- <strong> Infinite</strong> --}}
																					<input type="text" class="form-control" placeholder="Max $" value="Infinite" name="" readonly>
                                      </div>
                                  </div>
                                  {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                              </div>
                              <div class="col-md-3 mmb-5">
                                  <div class="row">
                                      <div class="col-md-12">
                                          {{-- <label> <strong>Price $</strong> </label> --}}
                                      </div>
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
                                                {{-- <label for="min8"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max8"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price8"> <strong>Price  $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min9"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label>Max $</label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong>Infinite</strong> --}}
																								<input type="text" class="form-control" name="" placeholder="Max $" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price9"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min10"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max10"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min11"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong>Infinite</strong> --}}
																								<input type="text" class="form-control" name="" placeholder="Max $" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price11"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min12"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max12"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price12"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min13"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                  <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price13"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min14"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max14"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price14"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min15"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price15"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min16"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="education_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max16"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="education_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price16"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min17"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price17"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min18"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="utility_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max18"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="utility_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price18"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min19"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price19"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min20"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="child_support_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max20"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="child_support_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price20"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min21"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price21"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min22"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="auto_lease_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max22"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price22"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min23"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_co_min_val_last"  data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control collection" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price24"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min24"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control" name="auto_loan_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}"  data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max24"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="auto_loan_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price25"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min26"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="">Max $</label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price26"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min27"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="r_m_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max27"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="r_m_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price27"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min28"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price28"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min29"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="credit_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max29"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="credit_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price29"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min30"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="priceName">
                                            <div class="nameCA">
                                                {{-- <label for="price31"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min32"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="charge_card_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max32"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="charge_card_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="priceName">
                                            <div class="nameCA">
                                                {{-- <label for="price32"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min33"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max34"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price33"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min34"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max34"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price34"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min35"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite </strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price35"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min36"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price36"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min37"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max37"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price37"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min38"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price38"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min39"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max39"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="home_equity_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price39"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min40"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price40"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min41"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="education_s_co[0][minimum]" value="{{  isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max41"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="education_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price41"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min42"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price42"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min43"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="utility_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max43"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="utility_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price43"> <strong>Price $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Price $" class="form-control collection" name="utility_s_co[0][price]" value="{{ isset($pricing->collection[0]['percentage']) ? $default->collection[0]['percentage'] : ''}}" data-id="0"  id="percent-0" title="Price">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-1 mmb-5">
                                        <div class="row pt-2">
                                          <strong class="add_range h3" class="btn form-control" data-type="utility_s_co" id="add_utility_s_co_0" data-id="0"><i class="fa fa-plus text-success"></i></strong>
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
                                                {{-- <label for="min44"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price44"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min45"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="child_support_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max45"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="child_support_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price45"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min46"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_s_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price46"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min47"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max47"> <strong>Max $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min48"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price48"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min49"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="auto_loan_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max49"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="auto_loan_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price49"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min50"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price50"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min51"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="r_m_s_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max51"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="r_m_s_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price51"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min52"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_s_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price52"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min53"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="credit_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max53"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="credit_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price53"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min54"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price54"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min55"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max56"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" class="form-control collection" name="charge_card_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price56"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min57"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price57"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min58"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max58"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price58"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min59"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>

                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price59"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min60"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max60"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price60"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min61"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price61"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min62"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="min62"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price62"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min63"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price63"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min64"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max64"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price64"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min65"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_d_co_min_val_last" data-id="0"  id="min-0" title="Minimum">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="ptice65"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min66"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="education_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max66"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="education_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price66"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min67"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price67"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min68"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="utility_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="min68"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="utility_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="min68"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min69"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price69"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min70"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="child_support_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max70"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="child_support_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price70"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min71"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_d_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price71"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min72"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max72"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max72"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min73"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price73"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min74"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Min $" type="text" name="auto_loan_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>

                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max74"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="auto_loan_d_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price74"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min75"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price76"> <strong>Price $</strong> </label> --}}
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
                                                {{-- <label for="min77"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="r_m_d_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max77"> <strong>Max $</strong> </label> --}}
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
                                                {{-- <label for="price77"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min78"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_d_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price78"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min79"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="credit_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max79"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="credit_card_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price79"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min80"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="credit_card_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price80"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min81"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="charge_card_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max81"> <strong>Max $</strong> </label> --}}
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
                                                {{-- <label for="price81"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min82"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="charge_card_sd_co_min_val_last" data-id="0"  id="min-0" title="Min82">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price82"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min83"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="sales_contract_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max83"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="sales_contract_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price83"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min84"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="sales_contract_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price84"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min85"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="unsecured_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max85"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="unsecured_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price85"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min86"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="unsecured_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price86"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min87"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="line_credit_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max87"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="line_credit_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price87"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min88"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="line_credit_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price88"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min89"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="home_equity_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max89"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="home_equity_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price89"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min90"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="home_equity_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price90"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min91"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="education_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max91"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="education_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price91"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min92"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="education_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price92"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min93"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="utility_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max93"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="utility_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price93"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min94"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="utility_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="">Max $</label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price94"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min95"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="child_support_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max95"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="child_support_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price95"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min96"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="child_support_sd_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price96"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min97"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="auto_lease_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max97"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price97"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min98"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_sd_co_min_val_last" data-id="0"  id="min-0" title="Minimum">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price98"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min99"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control collection" placeholder="Min $" type="text" name="auto_loan_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max99"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control collection" type="text" placeholder="Max $" name="auto_loan_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price99"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min100"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price100"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min101"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="r_m_sd_co[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max101"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="r_m_sd_co[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">


                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price101"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min102"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_sd_co_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="">Max $</label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price102"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min103"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Min $" class="form-control collection" name="auto_lease_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max103"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="auto_lease_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0"title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price103"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min104"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_lease_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price104"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min105"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" name="auto_loan_r[0][minimum]" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="min105"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Max $" name="auto_loan_r[0][maximum]" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price105"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min106"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="auto_loan_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" class="form-control" placeholder="Max $" name="" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price106"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min107"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="r_m_r[0][minimum]" placeholder="Min $" class="form-control collection" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="max107"> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Max $" name="r_m_r[0][maximum]" class="form-control collection" value="{{ isset($pricing->collection[0]['maximum']) ? $default->collection[0]['maximum'] : ''}}" data-id="0"  id="max-0" title="Max">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price107"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                {{-- <label for="min108"> <strong>Min $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control collection" placeholder="Min $" value="{{ isset($pricing->collection[0]['minimum']) ? $default->collection[0]['minimum'] : ''}}" id="r_m_r_min_val_last" data-id="0"  id="min-0" title="Min">
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-4 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for=""> <strong>Max $</strong> </label> --}}
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <strong> Infinite</strong> --}}
																								<input type="text" name="" class="form-control" placeholder="Max $" value="Infinite" readonly>
                                            </div>
                                        </div>
                                        {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3 mmb-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="price108"> <strong>Price $</strong> </label> --}}
                                            </div>
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
                                                    {{-- <label for="min109{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max109{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id109{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control collection" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="%">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee109{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control collection" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice109{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice109{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min110{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max110{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id110{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control collection" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee110{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control collection" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice110{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice110{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min111{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max111{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id111{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="%" class="form-control collection" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee111{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Add Fee $" class="form-control collection" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice111{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice111{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min112{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max112{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id112{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee112{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice112{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice112{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min113{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max113{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id113{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee113{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice113{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice113{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min114{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max114{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id114{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee114{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice114{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice114"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min115{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max115{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id115{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee115{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice115{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice115{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min116{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max116{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id116{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee116{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice116{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice116{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min117{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max117{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id117{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" name="" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee117{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" name="" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice117{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice117{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min118{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max118{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id118{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee118{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice118{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice118{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min119{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max119{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id119{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee119{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice119{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice119{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min120{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max120{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id120{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee120{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice120{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice120{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min121{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max121{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id121{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee121{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice121{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice121{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min122{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max122{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id122{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee122{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice122{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice122{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min123{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max123{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id123{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee123{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="min123{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max123{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min124{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max124{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id124{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee124{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" placeholder="Add Fee $" type="text" class="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice124{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice124{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min125{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max125{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id125{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee125{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice125{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min126{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max126{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id126{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee126{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice126{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice126{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min127{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max127{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id127{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee127{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice127{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice127{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min128{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max128{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id128{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee128{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice128{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice128{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min129{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max129{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id129{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee129{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice129{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice129{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min130{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max130{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id130{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee130{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice130{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice130{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min131{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max131{{$i}}">Max $</label> --}}
                                                    </div>
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
                                                    {{-- <label for="id131{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee131{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice131{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice131{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min132{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max132{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id132{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee132{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice132{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice132{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min133{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max133{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id133{{$i}}"><strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee133{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice133{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice133{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min134{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max134{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id134{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee134{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice134{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice134{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min135{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max135{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id135{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee135{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice135{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice135{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min136{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max136{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id136{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee136{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice136{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice136{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min137{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max137{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id137{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <inputclass="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee137{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice137{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice137{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="min138{{$i}}"> <strong>Min $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="max138{{$i}}"> <strong>Max $</strong> </label> --}}
                                                    </div>
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
                                                    {{-- <label for="id138{{$i}}"> <strong>%</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="%" name="collection[{{$i}}][percentage]" value="{{ isset($pricing->collection[$i]['percentage']) ? $default->collection[$i]['percentage'] : ''}}" data-id="{{$i}}"  id="percent-{{$i}}" title="Percentage">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="addfee138{{$i}}"> <strong>Add Fee $</strong> </label> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control collection" type="text" placeholder="Add Fee $" name="collection[{{$i}}][additional_fee]" value="{{ isset($pricing->collection[$i]['additional_fee']) ? $default->collection[$i]['additional_fee'] : ''}}" data-id="{{$i}}"  id="fee-{{$i}}" title="Additional Fee">
                                                </div>
                                            </div>
                                            {!! $errors->first('fraud_alerts', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-md-2 mmb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- <label for="minprice138{{$i}}"> <strong>Min/Price $</strong> </label> --}}
                                                </div>
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
                                                        {{-- <label for="maxprice138{{$i}}"> <strong>Max/Price $</strong> </label> --}}
                                                    </div>
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
