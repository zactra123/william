
@extends('layouts.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="{{url('/')}}">Home</a> &rarr;
            <a href="#">who we are</a>
        </div>
    </div>


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Who We Are </h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Who We Are</span>
        </div>
    </section>

    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>{{env('PROJECT')}}</h2>
                <div class="border-2"></div>
                <div class="wrapper-content">
            </div> <!-- section-title -->
            <div class="wrapper-content">
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    We have over 18 years of experience in the credit repair industry. As a superior credit restoration firm,
                    Prudent Credit Solutions sets the industry standards. Prudent Credit Solutions employs experts who work
                    diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that
                    knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better
                    credit, and enhance borrowing power for your personal or professional needs.
                </p>
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    Our firm is a registered and bonded, and is in full compliance with the Credit Repair Organizations Act.
                </p>
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    At Prudent Credit Solutions, we are genuinely devoted to helping our clients to achieve their reasonable
                    credit-fitness goals. We know the stress that bankruptcies, foreclosures, and other financial hardship can
                    create – and we are proud to help our clients escape those stressful situations.  We combine timing,
                    technique, services, and practical solutions when assisting the consumers to improve their credit history
                    correctly.
                </p>
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    Most of the other credit repair firms are in letter writing business. Writing dispute letters is a
                    “lazy man’s” approach to credit repair – one with minimal results and the constant danger of removed items
                    being re-inserted into credit reports. Those firms usually charge consumers a monthly fee for their
                    services, which can make any dishonest firm drag consumers dispute process longer because the longer they
                    keep you as a client, the more money they will “earn.” In comparison, we do not charge monthly fees and
                    always look to help our clients out as quickly as possible.

                </p>
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    At Prudent Credit Solutions, we will not charge you a dime until we deliver a result. We will bill you only
                    when we correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
                    inaccurate, unauthorized, or fraudulent credit item from your credit reports. Furthermore, due to our
                    established name in the industry, Exceed Capital Lending has generously agreed to finance our clients’
                    credit restoration contracts, which in itself is another way to improve your credit rating by having a
                    positive account reported on your credit reports (of course, you have to make payments to them on- time).
                    Exceed Capital Lending is a financial company with a mission to help people build credit, particularly those
                    who are new to credit or who might not have access to traditional financial products.
                </p>
                <p class="pr-4 pl-4 who-font"  style="text-align: justify">
                    Over 95 percent of our business comes from referrals – which reflects our tireless devotion to customer
                    service and the robust solutions we implement for our clients to improve their creditworthiness.
                    Our dedication to our clients is the first thing that sets us apart from other credit repair companies.
                    Our expertise and unique approach to credit restoration is the second thing that makes us the best choice
                    for your all credit correction needs.

                </p>

            </div> <!-- section-wrapper -->
        </div>
        </div>
    </section>



@endsection
