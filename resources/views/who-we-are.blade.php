
@extends('layouts.layout1')

@section('meta')
    <title>Prudent Credit Solutions - leader in credit repair industry Who We Are?</title>
    <meta name="description" content="Prudent Credit Solutions helps dispute and correct inaccuracies on credit
        reports, improve credit history, achieve reasonable credit-fitness goals.">
@endsection

@section('content')

    <section class="header">
        <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background">
        <div class="container header-banner">

        </div>

        <div class="container header-banner about-us">
            <div class="container">
                <div class="section-title text-center">
                    <h2>{{env('PROJECT')}}</h2>

                    <div class="wrapper-content">
                    </div> <!-- section-title -->
                    <div class="wrapper-content">
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            At Prudent Credit Solutions, we have over eighteen years of experience in the credit repair industry.
                            As a superior credit restoration firm, we set the industry standards. Prudent Credit Solutions
                            employs experts who work diligently on acquiring new and superb knowledge concerning the credit
                            restoration industry and use that knowledge to help you strategically dispute and correct
                            inaccuracies on your credit reports, build better credit, and enhance borrowing power for your
                            personal or professional needs.
                        </p>
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we
                            are proud to help our clients escape those stressful situations. We combine timing, technique,
                            services, and practical solutions in helping our clients to improve their credit history and achieve
                            all their reasonable credit-fitness goals and enhance their borrowing power.
                        </p>
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            Most of the other credit repair firms are in letter writing business. Writing dispute letters is a
                            “lazy man’s” approach to credit repair – one with minimal results and the constant danger of removed
                            items being re-inserted into credit reports. Those firms usually charge consumers a monthly fee for
                            their services, making any dishonest firm drag dispute process longer because the longer they keep
                            you as a client, the more money they will “earn.”In comparison, we do not charge monthly fees and
                            always strive to complete the process in the shortest time possible. We will bill you only when we
                            correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
                            inaccurate, unauthorized, or fraudulent credit item from your credit reports.
                        </p>
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            Furthermore, due to our established name in the industry, Exceed Capital Lending, a financial lender
                            dedicated to helping people build solid credit files, has generously agreed to finance our clients’
                            credit restoration contracts. This agreement serves our clients further by providing an opportunity
                            to have a positive account on the credit reports, improving credit ratings while we work to remedy
                            past credit issues. Clients who make timely payments to Exceed Capital Lending while utilizing our
                            services can work toward both establishing and fixing their credit, all in the same business
                            strategy.

                        </p>
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            Our firm is registered and bonded and is in full compliance with the Credit Repair Organizations Act.
                        </p>
                        <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                            Our expertise and unique approach to credit restoration goes a long way toward establishing ourselves
                            as a premier credit repair solutions entity. Over 95% of our business comes from referrals,
                            illustrating our devotion to helping our clients succeed. We are zealously looking forward to
                            working with you. Every improved credit profile opens a door to a better future.

                        </p>

                    </div> <!-- section-wrapper -->
                </div>
            </div>
        </div>

        @include('helpers.chat')
    </section>



@endsection
