
@extends('layouts.login')

@section('content')
    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="breadcrumbs">
                            <div class="container">
                                <a href="{{url('/')}}">Home</a> &rarr;
                                <a href="#">who we are</a>
                            </div>
                        </div>
                        <div class="container">
                                    <h1> {{env('PROJECT')}} </h1>

                                    <p style="text-align: justify">
                                        {{env('PROJECT')}} is a credit restoration firm bonded and registered with the US Department of
                                        Justice with 18 years of experience in helping our clients repair their credit and gain their
                                        second chance. Over 95 percent of our business comes from referrals—which reflects our tireless
                                        devotion to customer service and the robust solutions we implement for our clients to improve
                                        their credit scores. Writing dispute letters is a “lazy man’s” approach—one with minimal
                                        results and the constant danger of removed items being re-inserted into credit reports. We combine
                                        timing, technique, service, and effective solutions to help consumers to truly improve their
                                        credit history.
                                    </p>
                                    <p style="text-align: justify">
                                        Experts at our firm work diligently on acquiring new and superior knowledge concerning the
                                        credit restoration industry and use that knowledge to truly help our clients. Our specialists
                                        will strategically dispute erroneous, misleading, and unverifiable information reported on your
                                        credit reports directly with furnishers and Credit Reporting Agencies.
                                    </p>

                                    <p style="text-align: justify">
                                        Our exclusive pre-litigation and litigation processes have helped thousands of U.S. families to
                                        raise their credit scores after bankruptcy, foreclosure, and other serious credit reporting
                                        issues.
                                    </p>

                                    <h1> Why Choose {{env('PROJECT')}}?</h1>
                                    <p style="text-align: justify">
                                        {{env('PROJECT')}} is a company devoted to truly helping our clients achieve financial freedom.
                                        We know the stress that bankruptcies, foreclosures, and other financial hardships can create—and
                                        we are proud to help others escape those stressful situations and their effects. Our devotion to
                                        our customers is the first thing that sets us apart from others.
                                    </p>

                                    <p style="text-align: justify">
                                        Our expertise and unique approach to credit repair is the second thing which makes {{env('PROJECT')}}
                                         the best choice for credit repair. Unlike other firms, we also offer the following:

                                    <ul>
                                        <li>
                                            Long-lasting Results: Where other companies seek out short-term solutions that can backfire
                                            in the future with removed items being re-inserted into credit reports, we invest the time and
                                            energy needed to fix your score for good.
                                        </li>
                                        <li>
                                            No Charge Until Your Dispute is Complete: We don’t charge you a dime until we know we’ve done
                                            our work. Only when your credit is fixed will we bill you anything.
                                        </li>

                                        <li>
                                            Charge Per Dispute: to save you money, we charge per dispute—meaning you only pay for what
                                            you need. This saves many of our clients money--many people need only a few items on their
                                            report “fixed,” so paying a flat-fee designed to cover the work necessary to initiate many
                                            disputes may result in overpaying.
                                        </li>
                                        <li>
                                            Two unique methods of payment:
                                            <ul>
                                                <li>
                                                    Online escrow: we offer the option to open an online escrow account using
                                                    escrow.com. Our clients deposit funds once we remove an item from their credit
                                                    report, provide proof of its successful removal, and request a release of portion of
                                                    funds for work completed.
                                                </li>
                                                <li>
                                                    Monthly payments: we also give clients the option to make monthly payments to our
                                                    partner financing company, who will finance the credit repair contract and help
                                                    boost your credit score as they report to credit agencies your monthly payments to
                                                    them.
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            Honest Charges for Speedy Service: many other firms charge you monthly fees to access
                                            their help—which can make dishonest companies drag out your disputes over a longer period
                                            of time to “earn” more of your money! In comparison, we do  not charge monthly fees and
                                            always looks to help our clients out as quickly as possible.
                                        </li>
                                    </ul>



                                    </p>



                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection