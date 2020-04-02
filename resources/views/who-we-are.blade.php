
@extends('layouts.login')

@section('content')

    <div class="breadcrumbs pt-6">
        <div class="container">
            <a href="{{url('/')}}">Home</a> &rarr;
            <a href="#">WHO WE ARE</a>
        </div>
    </div>
    <div class="container">
        <h1> {{env('PROJECT')}} </h1>

        <p style="text-align: justify">
            We have over 18 years of experience in the credit repair industry. As a superior credit restoration firm,
            Prudent Credit Solutions sets the industry standards. Prudent Credit Solutions employs experts who work
            diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that
            knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better
            credit, and enhance borrowing power for your personal or professional needs.


        </p>
        <p style="text-align: justify">
            Our firm is a registered and bonded credit repair firm and is in full compliance with the Credit Repair
            Organization Act.
            At Prudent Credit Solutions, we are genuinely devoted to helping our clients to achieve their reasonable
            credit-fitness goals. We know the stress that bankruptcies, foreclosures, and other financial hardship can
            create – and we are proud to help our clients escape those stressful situations.  We combine timing,
            technique, services, and practical solutions when assisting the consumers to improve their credit history
            correctly.

        </p>
        <p style="text-align: justify">
            Most of the credit repair firms are in letter writing business. Writing dispute letters is a “lazy man’s”
            approach to credit repair – one with minimal results and the constant danger of removed items being
            re-inserted into credit reports. Those firms usually charge consumers a monthly fee for their services,
            which can make any dishonest firm drag consumers dispute process longer because the longer they keep you as
            a client, the more money they will “earn.” In comparison, we do not charge monthly fees and always look to
            help our clients out as quickly as possible.

        </p>
        <p style="text-align: justify">
            At Prudent Credit Solutions, we will not charge you a dime until we deliver a result. We will bill you only
            when we correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
            inaccurate, unauthorized, or fraudulent credit item from your credit reports. Furthermore, due to our
            established name in the industry, Exceed Capital Lending has generously agreed to finance our clients’
            credit restoration contracts, which in itself is another way to improve your credit rating by having a
            positive account reported on your credit reports (of course, you have to make payments to them on- time).

        </p>
        <p style="text-align: justify">
            Over 95 percent of our business comes from referrals – which reflects our tireless devotion to customer
            service and the robust solutions we implement for our clients to improve their creditworthiness. Our
            dedication to our clients is the first thing that sets us apart from other credit repair companies. Our
            expertise and unique approach to credit restoration is the second thing that makes us the best choice for
            your all credit correction needs.

        </p>



{{--        <p style="text-align: justify">--}}
{{--            {{env('PROJECT')}} is a credit restoration firm bonded and registered with the US Department of--}}
{{--            Justice with 18 years of experience in helping our clients repair their credit and gain their--}}
{{--            second chance. Over 95 percent of our business comes from referrals—which reflects our tireless--}}
{{--            devotion to customer service and the robust solutions we implement for our clients to improve--}}
{{--            their credit scores. Writing dispute letters is a “lazy man’s” approach—one with minimal--}}
{{--            results and the constant danger of removed items being re-inserted into credit reports. We combine--}}
{{--            timing, technique, service, and effective solutions to help consumers to truly improve their--}}
{{--            credit history.--}}
{{--        </p>--}}
{{--        <p style="text-align: justify">--}}
{{--            Experts at our firm work diligently on acquiring new and superior knowledge concerning the--}}
{{--            credit restoration industry and use that knowledge to truly help our clients. Our specialists--}}
{{--            will strategically dispute erroneous, misleading, and unverifiable information reported on your--}}
{{--            credit reports directly with furnishers and Credit Reporting Agencies.--}}
{{--        </p>--}}

{{--        <p style="text-align: justify">--}}
{{--            Our exclusive pre-litigation and litigation processes have helped thousands of U.S. families to--}}
{{--            raise their credit scores after bankruptcy, foreclosure, and other serious credit reporting--}}
{{--            issues.--}}
{{--        </p>--}}

{{--        <h1> Why Choose {{env('PROJECT')}}?</h1>--}}
{{--        <p style="text-align: justify">--}}
{{--            {{env('PROJECT')}} is a company devoted to truly helping our clients achieve financial freedom.--}}
{{--            We know the stress that bankruptcies, foreclosures, and other financial hardships can create—and--}}
{{--            we are proud to help others escape those stressful situations and their effects. Our devotion to--}}
{{--            our customers is the first thing that sets us apart from others.--}}
{{--        </p>--}}

{{--        <p style="text-align: justify">--}}
{{--            Our expertise and unique approach to credit repair is the second thing which makes {{env('PROJECT')}}--}}
{{--            the best choice for credit repair. Unlike other firms, we also offer the following:--}}

{{--        <ul>--}}
{{--            <li>--}}
{{--                Long-lasting Results: Where other companies seek out short-term solutions that can backfire--}}
{{--                in the future with removed items being re-inserted into credit reports, we invest the time and--}}
{{--                energy needed to fix your score for good.--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                No Charge Until Your Dispute is Complete: We don’t charge you a dime until we know we’ve done--}}
{{--                our work. Only when your credit is fixed will we bill you anything.--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                Charge Per Dispute: to save you money, we charge per dispute—meaning you only pay for what--}}
{{--                you need. This saves many of our clients money--many people need only a few items on their--}}
{{--                report “fixed,” so paying a flat-fee designed to cover the work necessary to initiate many--}}
{{--                disputes may result in overpaying.--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                Two unique methods of payment:--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        Online escrow: we offer the option to open an online escrow account using--}}
{{--                        escrow.com. Our clients deposit funds once we remove an item from their credit--}}
{{--                        report, provide proof of its successful removal, and request a release of portion of--}}
{{--                        funds for work completed.--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        Monthly payments: we also give clients the option to make monthly payments to our--}}
{{--                        partner financing company, who will finance the credit repair contract and help--}}
{{--                        boost your credit score as they report to credit agencies your monthly payments to--}}
{{--                        them.--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                Honest Charges for Speedy Service: many other firms charge you monthly fees to access--}}
{{--                their help—which can make dishonest companies drag out your disputes over a longer period--}}
{{--                of time to “earn” more of your money! In comparison, we do  not charge monthly fees and--}}
{{--                always looks to help our clients out as quickly as possible.--}}
{{--            </li>--}}
{{--        </ul>--}}



{{--        </p>--}}



    </div>



    {{--    <div class="page-content">--}}
{{--        <div class="fullwidth-block">--}}
{{--            <div class="container fon">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="card pb-4">--}}
{{--                        <div class="breadcrumbs">--}}
{{--                            <div class="container">--}}
{{--                                <a href="{{url('/')}}">Home</a> &rarr;--}}
{{--                                <a href="#">WHO WE ARE</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="container">--}}
{{--                                    <h1> {{env('PROJECT')}} </h1>--}}

{{--                                    <p style="text-align: justify">--}}
{{--                                        {{env('PROJECT')}} is a credit restoration firm bonded and registered with the US Department of--}}
{{--                                        Justice with 18 years of experience in helping our clients repair their credit and gain their--}}
{{--                                        second chance. Over 95 percent of our business comes from referrals—which reflects our tireless--}}
{{--                                        devotion to customer service and the robust solutions we implement for our clients to improve--}}
{{--                                        their credit scores. Writing dispute letters is a “lazy man’s” approach—one with minimal--}}
{{--                                        results and the constant danger of removed items being re-inserted into credit reports. We combine--}}
{{--                                        timing, technique, service, and effective solutions to help consumers to truly improve their--}}
{{--                                        credit history.--}}
{{--                                    </p>--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Experts at our firm work diligently on acquiring new and superior knowledge concerning the--}}
{{--                                        credit restoration industry and use that knowledge to truly help our clients. Our specialists--}}
{{--                                        will strategically dispute erroneous, misleading, and unverifiable information reported on your--}}
{{--                                        credit reports directly with furnishers and Credit Reporting Agencies.--}}
{{--                                    </p>--}}

{{--                                    <p style="text-align: justify">--}}
{{--                                        Our exclusive pre-litigation and litigation processes have helped thousands of U.S. families to--}}
{{--                                        raise their credit scores after bankruptcy, foreclosure, and other serious credit reporting--}}
{{--                                        issues.--}}
{{--                                    </p>--}}

{{--                                    <h1> Why Choose {{env('PROJECT')}}?</h1>--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        {{env('PROJECT')}} is a company devoted to truly helping our clients achieve financial freedom.--}}
{{--                                        We know the stress that bankruptcies, foreclosures, and other financial hardships can create—and--}}
{{--                                        we are proud to help others escape those stressful situations and their effects. Our devotion to--}}
{{--                                        our customers is the first thing that sets us apart from others.--}}
{{--                                    </p>--}}

{{--                                    <p style="text-align: justify">--}}
{{--                                        Our expertise and unique approach to credit repair is the second thing which makes {{env('PROJECT')}}--}}
{{--                                         the best choice for credit repair. Unlike other firms, we also offer the following:--}}

{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            Long-lasting Results: Where other companies seek out short-term solutions that can backfire--}}
{{--                                            in the future with removed items being re-inserted into credit reports, we invest the time and--}}
{{--                                            energy needed to fix your score for good.--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            No Charge Until Your Dispute is Complete: We don’t charge you a dime until we know we’ve done--}}
{{--                                            our work. Only when your credit is fixed will we bill you anything.--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            Charge Per Dispute: to save you money, we charge per dispute—meaning you only pay for what--}}
{{--                                            you need. This saves many of our clients money--many people need only a few items on their--}}
{{--                                            report “fixed,” so paying a flat-fee designed to cover the work necessary to initiate many--}}
{{--                                            disputes may result in overpaying.--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            Two unique methods of payment:--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    Online escrow: we offer the option to open an online escrow account using--}}
{{--                                                    escrow.com. Our clients deposit funds once we remove an item from their credit--}}
{{--                                                    report, provide proof of its successful removal, and request a release of portion of--}}
{{--                                                    funds for work completed.--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    Monthly payments: we also give clients the option to make monthly payments to our--}}
{{--                                                    partner financing company, who will finance the credit repair contract and help--}}
{{--                                                    boost your credit score as they report to credit agencies your monthly payments to--}}
{{--                                                    them.--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            Honest Charges for Speedy Service: many other firms charge you monthly fees to access--}}
{{--                                            their help—which can make dishonest companies drag out your disputes over a longer period--}}
{{--                                            of time to “earn” more of your money! In comparison, we do  not charge monthly fees and--}}
{{--                                            always looks to help our clients out as quickly as possible.--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}



{{--                                    </p>--}}



{{--                                </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
