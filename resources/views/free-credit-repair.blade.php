
@extends('layouts.login')

@section('content')

    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="card m-0 pb-4">
                    <div class="breadcrumbs">
                        <div class="container">
                            <a href="{{url('/')}}">Home</a> &rarr;
                            <a href="#">FREE CREDIT REPAIR</a>
                        </div>
                    </div>

                    <div id="site-content">

                        <div class="container">

                            <h1>3 Tips to Keeping Your Credit Score in Healthy Shape</h1>
                            <p style="text-align: justify">
                                The best way to keep your credit in tip top shape is to avoid it from ever getting bad
                                in the first place! Sure, this is much easier said than done. Let’s face it, life
                                sometimes just happens before we’ve had a second to even breathe! With that said, if you
                                follow these 4 tips on a regular basis, you won’t have to worry about your credit ever
                                going down the drain which means just one less thing to worry about.
                            </p>

                            <h1>1.	Monitor Your Credit Score Regularly</h1>
                            <p style="text-align: justify">
                                How do you monitor your credit report? Did you know that everyone can get a free credit
                                report every year without it affecting your credit score? Yup! It’s the law. To do so,
                                you need to head over to AnnualCreditReport.com and click on “Request yours now!”
                                located at the top of the page.
                            </p>
                            <p style="text-align: justify">
                                After filling in your contact information and verifying your identity, you can print out
                                a detailed report of your credit profile. It will detail all the current debts you have,
                                their balances, how often you pay on time, how often you have late payments, and whether
                                you have any bad debts such as collections.
                            </p>
                            <p style="text-align: justify">
                                Taking advantage of your free annual credit report is vital to making sure you keep your
                                credit score in check. Doing so will help you identify errors before they get out of
                                hand, keeps you informed on how banks view your financial profile, and ultimately allows
                                you to maintain a healthy credit score.
                            </p>

                            <h1>2.	Make Your Debt Payments on Time</h1>
                            <p style="text-align: justify">
                                Perhaps the most common reason someone’s credit score drops is due to late payments. One
                                late payment can affect your score dramatically. Two late payments are even worse, and
                                more than that is just a downhill slipping slide.
                            </p>
                            <p style="text-align: justify">
                                Credit bureaus will identify how many payments are less than 30 days late and how many
                                payments are less than 60 days late. If it’s more than 60 days late, there’s a good
                                chance it’s going to collections. A perfect on time payment history says novels to a
                                bank about how likely you are to repay a loan when needed. This only increases your
                                chances of getting help from major financial institutions to purchase that dream home
                                you’ve always wanted.
                            </p>

                            <h1>3.	Keep Your Balances Low</h1>
                            <p style="text-align: justify">
                                Another common issue that has a major impact on how your credit is scored is your total
                                balances owed and, specifically, what the average balances are of your revolving debt
                                (credit cards and lines of credit). If you keep your revolving credit balances above
                                30% - 50% of their total credit limits, it’s negatively impacting your credit score and
                                screams “SPENDER” to any bank reviewing your profile to lend you money.

                            </p>
                            <p style="text-align: justify">
                                Keeping your total balances ideally below 30% of your total limit allows you to stay off
                                the radar in terms of holding high balances, while also allowing you to still make
                                monthly payments, indicating you can keep making your payments on time.

                            </p>
                            <h1>4.	Dispute Credit Report Errors ASAP!</h1>
                            <p style="text-align: justify">
                                Upon monitoring your credit regularly, you’ll be able to notice errors on your report as
                                soon as they are updated. The first thing you should do when you see something you don’t
                                recognize on your credit report is reach out to the company that owns that debt. Often
                                times, you’ll notice some banks or lenders operate parts of their company under different
                                names called a DBA (doing business as). Upon reaching out to the company, if you find
                                it’s still an error, your next step is to reach out to credit bureaus immediately and
                                dispute the error.
                            </p>
                            <p style="text-align: justify">
                                One of the main reasons this is an often missed tip to keeping your credit healthy is
                                because consumers don’t want to deal with the hassle of being put on long holds, dealing
                                with credit documents and trying to prove the errors on your report. This is were a
                                credit companies like Better Credit Fix can help!

                            </p>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.show').click(function(){
                console.log('dasdasda');
                $className = (this).className;
                $show = $className.replace('col-md-1 show title1-', '');

                $('.desc-'+$show).css('display','block');
                $('.title1-'+$show).css('display','none');
                $('.title2-'+$show).css('display','block');

            })

            $('.hide').click(function(){

                $className = (this).className;
                $show = $className.replace('col-md-1 hide title2-', '');
                $('.desc-'+$show).css('display','none');
                $('.title1-'+$show).css('display','block');
                $('.title2-'+$show).css('display','none');

            })


        })


    </script>

@endsection