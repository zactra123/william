
@extends('layouts.layout')

@section('meta')
    <title>Credit Resources - the most popular resources to improve your score</title>
    <meta name="description" content="Credit Resources help keep your credit in tip-top shape. We offer resources
        that will help you - Mint, AnnualCreditReport.com, NerdWallet, CreditKarma.">
@endsection

@section('content')


    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title"> Credit Resources </h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Credit Resources</span>
        </div>
    </section>

    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>Credit Resources</h2>
                <div class="border-2"></div>
                <div class="wrapper-content">
                    <p style="text-align: justify">
                        Credit Resources - Need some trusted resources to help keep your credit in tip-top shape? Or
                        perhaps you’d like to educate yourself on how to improve your score? Having the right tools with
                        a trusted reputation and track history proven to help is vital. Here are some popular resources
                        that will get the job done right for you
                    </p>
                    <h2>Mint</h2>
                    <p style="text-align: justify">
                        Mint is an online software that helps you budget your money, monitor your credit, and
                        help you find opportunities to improve your finances. Furthermore, they provide you with
                        even more tools and resources to continue educating yourself on personal finance!
                    </p>

                    <h2>AnnualCreditReport.com</h2>
                    <p style="text-align: justify">
                        It’s the law that every US citizen can get a free credit report without impacting your score.
                        This can be obtained with AnnualCreditReport.com. It allows you to monitor your credit year over
                        year and gives you a very detailed outline of every debt listed on your credit.

                    </p>

                    <h2>NerdWallet</h2>
                    <p style="text-align: justify">
                        NerdWallet is an educational resource to help you understand all things related to money. This
                        includes credit cards, banking, investing, mortgages, loans, insurance, personal finance, and
                        even traveling! Along with their educational resources, they partner with some of the top
                        companies in the industry to give you exclusive deals to helpful money tools, including credit
                        repair tips and tricks!
                    </p>

                    <h2>CreditKarma</h2>
                    <p style="text-align: justify">
                        CreditKarma.com is a generic monitoring app that allows its subscribers to get a basic
                        TransUnion and Equifax credit information, including but not limited to credit scores.
                    </p>

                </div> <!-- section-title -->

            </div>
        </div>
    </section>
@endsection
