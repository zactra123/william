
@extends('layouts.layout1')

@section('meta')
    <title>Is Repair Legal in All 50 States? Prudent Credit Solutions</title>
    <meta name="description" content="Credit repair is a legal way to improve damaged credit history and raise credit
         score. It's a federally protect right. Get more information on our website.">
    <meta name="keywords" content="is credit repair legal, fair credit reporting act (fcra), credit repair organizations act croa">
@endsection

@section('content')

    <section class="header">
        <img class="background-image"  src="{{asset("images/new/header-background.jpg")}}" alt="background">
        <div class="container header-banner">

        </div>

        <div class="container header-banner">
                <div class="section-title text-center">
                    <h2>Legality of the Credit Repair</h2>
                    <div class="wrapper-content mt-5">
                        <h2>Is Credit Repair Legal?</h2>
                        <p class="text-justify">
                            Credit repair may not have the best reputation as financial services go, but it's a
                            federally protect right. Two primary credit repair laws guarantee consumers the right to
                            correct errors in their credit reports. They are the Fair Credit Reporting Act (FCRA)
                            and the Credit Repair Organizations Act (CROA). There are also laws in every state that
                            regulate the credit repair industry and service providers.
                        </p>
                        <p class="text-justify">
                            It's important to note that credit repair is legal in all 50 states. There's a federal
                            law that guarantees consumers the right to dispute information in their credit report to
                            have it corrected. There's also a federal law that outlines how credit repair companies
                            can provide services to consumers. These two laws set the foundation for how credit
                            repair works in the U.S.
                        </p>

                    </div> <!-- section-title -->
                </div>

        </div>

        @include('helpers.chat')
    </section>

@endsection
