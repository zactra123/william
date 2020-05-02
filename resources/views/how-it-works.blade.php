
@extends('layouts.layout')


@section('content')

    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">How It Works</h2>
            <span class="sub-title"><a href="index.html">Home</a> &gt; How It Works</span>
        </div>
    </section>



    <!-- Working Area -->
    <section class="ms-working working-section section-padding">
        <div class="container">
{{--            <div class="section-title text-center">--}}
{{--                <h2>About Company</h2>--}}
{{--                <div class="border-2"></div>--}}
{{--            </div> <!-- section-title -->--}}

            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="wrapper-content">
                            <p class="p-4"     style="text-align: justify">
                                When you decide to hire our firm for your credit restoration needs, we direct you to register and create an
                                account. Then, with your help and authorization, our proprietary software scans and conducts credit audit
                                on your credit reports by searching for incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
                                inaccurate, unauthorized or fraudulent information. Next, you review our findings and sign the credit
                                restoration contract and simultaneously apply for a personal loan account with Exceed Capital Lending.
                                Now, we go to work, and you sit back, relax, and expect to hear some good news. Lastly, we will notify you
                                and Exceed Capital Lending once an item or items have been corrected/removed from your credit report for the
                                payment disbursement for the completed work.

                            </p>

{{--                            <a href="#" class="btn btn-primary">Read More</a>--}}
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="video-wrapper">
                            <video controls="">
                                <source src="{{asset('images/howItWorks.mp4')}}" type="video/mp4">
                            </video>
                        </div> <!-- video-wrapper -->
                    </div>
                </div>
            </div> <!-- section-wrapper -->
        </div>
    </section>



@endsection
