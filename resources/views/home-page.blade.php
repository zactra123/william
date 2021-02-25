@extends('layouts.layout1')

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection

@section('content')
    <section class="header">
        <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background">
        <div class="container header-banner">
            <div class="header-slider row">
                <div class="banner-text col-12 col-md-5">
                    <div class="information">
                        <h4 class="title">
                            We not only <strong>help clients</strong> to fix their credit
                        </h4>
                        <h4 class="title">
                            but we also educate them to keep their <strong> good credit </strong> in healthy shape.
                        </h4>
                    </div>
                    <div class="header-links">
                        <a href="{{route('login')}}" class="basic-button">Get Started</a>
                    </div>
                </div>
                <div class="banner-img col-12 col-md-7">
                    <div class="owl-carousel"  id="header_slider" >
                        @for($i = 1; $i<=7; $i++)
                            <div class="header-img-block">
                                <img src="{{asset("images/new/header_banner_img_{$i}.png")}}" alt="banner-img">
                            </div>
                        @endfor
                    </div>
                    <img class="banner-background" src="{{asset("images/new/header_banner_img_bck.png")}}" alt="background">
                </div>
            </div>
        </div>

        @include('helpers.chat')
    </section>
    <section class="about-us">
        <div class="container">
            <div class="about-us-inner row">
                <div class="information-block col-12 col-md-6">
                    <h4> We have over {{date("Y")-2003}} years of experience in the credit repair industry</h4>
                    <p>
                        As a superior credit restoration firm, Prudent Credit Solutions sets the industry standards.
                        Prudent Credit Solutions employs experts who work diligently on acquiring new and superb
                        knowledge concerning the credit restoration industry and use that knowledge to help you
                        strategically dispute and correct inaccuracies on your credit reports, build better credit,
                        and enhance borrowing power for your personal or professional needs.
                    </p>
                    <a href="{{route('whoWeAre')}}" class="basic-button">Read more</a>
                </div>
                <div class="video-block col-12 col-md-6">
                    <div class="video-box">
                        <video src="{{asset('images/howItWorks.mp4')}}" controls></video>
                        <img class="banner-background" src="{{asset("images/new/header_banner_img_bck.png")}}" alt="background">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="help" >
        <div class="container">
            <h2 class="title">We Can Help you Resolve Inaccuracies with</h2>
            <div class="help-inner row">
                <div class="name col-12 col-md-6">
                    <p>
                        <a data-id="bankruptcies" class="name-point"><span>Bankruptcies</span></a>
                        <a data-id="mortgage_negatives" class="name-point "><span>Mortgage Negatives</span></a>
                        <a data-id="late_remarks" class="name-point "><span>Late Remarks</span></a>
                    </p>
                    <p>
                        <a data-id="collections" class="name-point "><span>Collections</span></a>
                        <a data-id="judgments" class="name-point "><span>Judgments</span></a>
                    </p>
                    <p>
                        <a data-id="inquiries" class="name-point "><span>Inquiries</span></a>
                        <a data-id="repossessions" class="name-point "><span>Repossessions</span></a>
                        <a data-id="student_loans" class="name-point active "><span>Student Loans</span></a>
                    </p>
                    <p>
                        <a data-id="mixed_files" class="name-point "><span>Mixed Files</span></a>
                        <a data-id="charge_offs" class="name-point "><span>Charge Offs</span></a>
                    </p>
                    <p>
                        <a data-id="fraud_accounts" class="name-point "><span>Fraud Accounts</span></a>
                        <a data-id="chexsystems" class="name-point "><span>ChexSystems</span></a>
                    </p>
                </div>
                <div class="block col-12 col-md-8 col-lg-6">
                    <div class="help-description first" data-id="bankruptcies">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Bankruptcies</h6>
                            <p>
                                Bankruptcy is a court proceeding in which a judge and court trustee examine the assets and
                                liabilities of individuals and businesses who can’t pay their bills and decide whether to
                                discharge those debts so they are no longer legally required to pay them. Bankruptcy will have
                                a devastating impact on your credit health. The exact effects will vary. But according to the
                                top-scoring model FICO, filing for bankruptcy can send a good credit score of 700 or above
                                plummeting by at least 200 points. If your score is a bit lower—around 680—you can lose between
                                130 and 150 points.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="mortgage_negatives">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Mortgage</h6>
                            <p>
                                A delinquent mortgage is a home loan for which the borrower has failed to
                                make payments as required in the loan documents. A mortgage will be considered delinquent or
                                late when a scheduled payment is not made on or before the due date. If the borrower can't bring
                                the payments on a delinquent mortgage current within a certain time period, the lender may begin
                                foreclosure proceedings. A lender may also offer a borrower a number of options to help prevent
                                foreclosure when a mortgage becomes delinquent.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="late_remarks">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Late Remarks</h6>
                            <p>
                                If you're late paying a bill, your creditor might report it to the consumer
                                credit bureaus — and that could hurt your credit. But you might be able to get the late payment
                                removed if you paid on time or other factors are present, or if it's more than seven years old.
                                On-time payments are the biggest factor affecting your credit score, so missing a payment can
                                sting. If you have otherwise spotless credit, a payment that's more than 30 days past due can
                                knock as many as 100 points off your credit score. If your score is already low, it won't hurt
                                it as much but will still do damage.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="collections">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Collections</h6>
                            <p>
                                Once an account is sold to a collection agency, the collection account can then be
                                reported as a separate account on your credit report. Collection accounts have a significant
                                negative impact on your credit scores. Collections can appear from unsecured accounts, such as
                                credit cards and personal loans. Collections have a negative effect on your credit score. The
                                older a collection is, the less it hurts you. Collections remain on your credit report for seven
                                years past the date of delinquency. In the newest versions of FICO® and VantageScore®, paid
                                collections don't hurt your score but unpaid collections do.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="inquiries">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Inquiries</h6>
                            <p>
                                An inquiry refers to a request to look at your credit file and falls into one of two
                                camps: hard or soft. A credit inquiry occurs when you apply for a credit card or loan and permit
                                the issuer or lender to check your credit. Some inquiries, such as soft inquiries, do not affect
                                your credit score, but others, such as hard inquiries can lower your credit score. In general,
                                hard credit inquiries have a small impact on your FICO Scores. For most people, one additional
                                hard credit inquiry will take less than five points off their FICO Scores. For perspective, the
                                full range for FICO Scores is 300-850. Hard Inquiries can have a greater impact if you have few
                                accounts or short credit history.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="repossessions">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Repossessions</h6>
                            <p>
                                The simple definition of repossession is reclaiming ownership of something that
                                has not been paid off but still has value. In most cases, cars are the primary asset involved in
                                repossession, but it could be real estate, jewelry, artwork, or any tangible asset that can be
                                sold to recoup money for the unpaid loan balance. In all, a repo could cause a 100-point drop
                                in your credit score, Sanford says. And late payments, collections, and public records generally
                                all stay on your credit for about seven years, according to
                                <a href="myFICO.com" target="_blank">myFICO.com.</a> You can stop a repo. The
                                key is to communicate with the lender.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="student_loans">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Student Loans</h6>
                            <p>
                                Some borrowers may not realize it, but student loan debt is a personal financial
                                liability that needs to be viewed like any other financial obligation – and with the same sense
                                of urgency as other payments. The reality is that missing student loan payments can hold you
                                back financially, just like missing credit card or car payments will. A student loan is
                                considered delinquent the first day after you miss a payment; if the delinquency lasts more
                                than 90 days, your loan servicer, which handles the billing and other services for your loan,
                                will report it to the three major national credit bureaus, which will lower your credit score.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="mixed_files">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Mixed Files</h6>
                            <p>
                                A mixed credit file occurs whenever a CRA inadvertently commingles the credit
                                histories of two different individuals into a single report. The result is a credit report
                                that contains information belonging to two different consumers, bundled together as if those
                                two people were the same person.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="charge_offs">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Charge Offs</h6>
                            <p>
                                A charge-off is a declaration by a creditor (usually a credit card account) that an
                                amount of debt is unlikely to be collected. This occurs when a consumer becomes severely
                                delinquent on a debt. Traditionally, creditors make this declaration at the point of six months
                                without payment. If you have a loan marked as charged off, it will hurt your credit score
                                drastically. A charge-off will remain on your credit report for seven years. Even if an account
                                is charged off, you still owe the money. And, as it turns out, it may even make it more
                                challenging to repay the debt afterward.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="fraud_accounts">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Fraud Accounts</h6>
                            <p>
                                Fraudulent accounts can damage your credit scores, mainly because the identity
                                thief is highly unlikely to make any payments on the account. So, in addition to reporting the
                                fraud to the credit card issuer and the police, dispute the unauthorized account with the credit
                                bureaus. While having your credit card or debit card account information stolen can undeniably
                                be quite frustrating, the good news is that fraudulent charges generally will not impact your
                                credit reports and scores at all.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="chexsystems">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>ChexSystems</h6>
                            <p>
                                ChexSystems reports are a record of your bank account history.
                                Depending on the type of account activity or public record that's been reported,
                                a negative mark could remain on your ChexSystems report for up to 10 years.
                            </p>
                        </div>
                    </div>
                    <div class="help-description" data-id="judgments">
                        <div class="modal-heading">
                            <button class="close">x</button>
                        </div>
                        <div class='modal-body'>
                            <h6>Judgments</h6>
                            <p>
                                A judgment is a court order that is the decision in a lawsuit. If a judgment is
                                entered against you, a debt collector will have stronger tools, like garnishment, to collect
                                the debt. Judgments are no longer factored into credit scores, though they are still public r
                                ecords and can still impact your ability to qualify for credit or loans. Lenders may still check
                                to see whether any outstanding judgments against a potential borrower exist.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="report">
        <div class="container">
            <h3 class="title">Credit Report</h3>
            <div class="report-inner row">
                <div class="report-slider owl-carousel" id="home_report_slider">
                    <div class="report-item">
                        <div class="body">
                            <div class="icon">
                                <img src="{{asset("images/new/analysing_icon.png")}}" alt="analysing_icon">
                            </div>
                            <h6>Analyze your finances and credit score to identify areas for improvement</h6>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="body">
                            <div class="icon">
                                <img src="{{asset("images/new/analytics_icon.png")}}" alt="analytics_icon">
                            </div>
                            <h6>Highlight errors on your credit report and make a plan to dispute them</h6>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="body">
                            <div class="icon">
                                <img src="{{asset("images/new/deal_icon.png")}}" alt="deal_icon">
                            </div>
                            <h6>Identify bad debts that have opportunities to negotiate for lower payments</h6>
                        </div>
                    </div>
                    <div class="report-item">
                        <div class="body">
                            <div class="icon">
                                <img src="{{asset("images/new/deal_icon.png")}}" alt="deal_icon">
                            </div>
                            <h6>Help you build good habits to keep your credit score in tip top shape</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="education">
        <div class="container">
            <h3 class="title">Credit Education</h3>
            <div class="education-inner row">
                <div class="text-block col-12 col-md-5">
                    <h3 class="title">Credit Score Pie Chart</h3>
                    <p>
                        In the 1800s, most credit transactions were conducted by businesses, not by consumers. As
                        business transactions increased, commercial lenders needed to create a way to standardize
                        credit evaluation. In 1841, the Mercantile Agency solicited information from correspondents
                        throughout the United States to systemize a borrower's "character and assets." However, this
                        data considered too subjective by many as the opinions noted racial, class, and gender biases.
                        Subscribers to the Mercantile Agency (renamed R.G.
                    </p>
                </div>
                <div class="img-block col-12 col-md-7">
                    <div class="credit-graph">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
                <a href="{{route('credit.education')}}" class="basic-button">Read More</a>
            </div>
        </div>
    </section>
@endsection

