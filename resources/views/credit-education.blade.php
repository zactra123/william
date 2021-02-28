@extends('layouts.layout1')

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection

@section('meta')
    <title>Free credit education information: stages, rules - Prudent Credit Solutions</title>
    <meta name="description" content="Prudent Credit Solutions' free credit education info about how FICO scores work,
         FICO credit score ranges, how rebuild, create and maintain good credit.">
@endsection

@section('content')

    <section class="good-credit">
        <div class="container small">
            <h1 class="title">Credit Education</h1>
            <div class="credit-education-text">
                <h5>What is good credit score</h5>
                <p>
                    A credit score is a number that typically ranges from 300 – 850 and is used by financial institutions to evaluate a credit applicants ability and willingness to pay back the funds they’re requesting to borrow. Credit scores can also reflect how responsible an individual is when applying for a job, how likely they are to pay for their rental property on time or to access risk when applying for insurance.
                    The most common types of financial institutions include commercial banks, investment banks, brokerage firms, insurance companies, and asset management funds. Other types include the financial departments of “buy here, pay here” auto dealerships and furniture rental stores, credit unions, and finance firms.
                </p>
                <h6>Types of credit scores</h6>
                <p>Typically there are two types of credit scores:</p>
                <ul>
                    <li>FICO®</li>
                    <li>VantageScore</li>
                </ul>
                <p>However, you may also find industry specific scores.</p>
            </div>
        </div>

        @include('helpers.chat')
    </section>

    <section class="fico">
        <div class="container small">
            <div class="row">
                <div class="fico-description col-12 col-lg-6">
                    <h6 class="title">What is a good FICO score?</h6>
                    <p>Fico is one of the most common types of credit scores, which were originated by the Fair Isaac Corporation. Fico scores range between 300 and 850. Therefore, a fico score that is above 680 is known as an average, good Fico score. A fico score above 780 is excellent. Here are the different Fico score ranges:</p>
                    <h6 class="title">FICO scores and the percentage of the population</h6>
                    <ul>
                        <li>4.7% have credit scores between 300 and 499 </li>
                        <li>15.3% have scores that fall between 500 and 599</li>
                        <li>23.2% come in between 600 and 699</li>
                        <li>36.1% of credit reports show between 700 and 799</li>
                        <li>20.7% have scores of 800 and 850 and typically have a long-established credit history.</li>
                    </ul>
                </div>
                <div class="fico-image col-12 col-lg-6">
                    <h6 class="title img-title">Credit Score Chart and Range</h6>
                    <div class="img-box">
                        <img src="{{asset('images/new/fico_graph.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vantage-score">
        <div class="container small">
            <h5 class="title">What is a Good VantageScore?</h5>
            <p>Just like Fico scores, VantageScores are also used by lenders. These credit scores were developed by the following three credit bureaus:</p>
            <ol>
                <li>Experian</li>
                <li>Equifax</li>
                <li>TransUnion</li>
            </ol>
            <h5 class="title">VantageScore and the percentage of the population</h5>
            <ul>
                <li>5% have credit scores between 300 and 499 </li>
                <li>21% have scores that fall between 500 and 599</li>
                <li>3% come in between 600 and 699</li>
                <li>38% of credit reports show between 700 and 799</li>
                <li>23% have scores of 800 and 850 and typically have a long-established credit history./li>
            </ul>
            <h5 class="title">Purpose of credit scores</h5>
            <p>Lenders use credit scores as a great decision-making tool as it helps them in analyzing whether you will be able to repay your loan at the specified time or not. These scores are also known as risk scores as they help the lenders in determining the risk of giving you a loan and whether you will repay the debt on time. Therefore, having a good credit score is important as it will help you get your loan approved by the lender. These credit scores are like your report cards. They help in determining whether you qualify for the credit or not.
                </br></br>
                However, it is crucial to note that your credit score alone does not help in making the lender decide if you qualify for the loan or not. There is other information mentioned on your credit report such as the following which helps in getting your loan approved:</p>

            <ul>
                <li>The total amount of debt</li>
                <li>Types of credit</li>
                <li>The time that is taken to pay off debts</li>
                <li>Help determine your total monthly expenses</li>
                <li>The ratio of monthly expenses against your income.</li>
            </ul>
            <h5 class="title">Factors affecting credit scores</h5>
            <p>There are certain factors in your credit report that may affect your overall credit score. These factors are mentioned below:</p>
            <ol>
                <li>Your payment history that includes loan and credit cards information</li>
                <li>Your credit card utilization rate</li>
                <li>The total amount of debt due</li>
                <li>If there is any public record against you, such as a bankruptcy.</li>
                <li>If any inquiry took place against your credit report</li>
                <li>Amount of credit accounts you have.</li>
            </ol>
            <h5 class="title">How can you improve your credit scores?</h5>
            <p>Many times people go over their credit information and come to the conclusion that their credit score is not where it should be to get approved for credit. When you know what kind of activities can affect your credit score, you can improve it by simply not getting yourself indulged in those activities. Get familiar with your credit report and find out the pattern that caused the downfall of your credit score. Once you are sure what caused it, try to avoid those activities. Doing this will have a great impact on your credit score altogether. </p>
            <h5 class="title">Things to know about credit scores</h5>
            <p>It is essential to know that your credit score is not mentioned in your credit report, nor are they mentioned in your credit history. Your credit score is only calculated when you request it. Based on your credit history, the credit score can keep on changing over time, so there is nothing to worry about if you have a poor credit score.
                </br></br>
                There are certain reasons why you may not have a credit score. One of those reasons is that you may not have adequate credit history to have a credit score. However, you can still get a credit score if you are under 21. You need to have a cosigner who can guarantee that you will pay back any credit that is due.</p>

        </div>
    </section>
    <section class="credit-score education-chart">
        <div class="container small">
            <div class="row credit">
                <div class="credit-score-text col-12 col-md-6">
                    <h3 class="title">5 Common Factors of your Credit Score</h3>
                    <p>The five common factors that determine a credit score are listed below, in order of importance.</p>
                </div>
                <div class="credit-score-img col-12 col-md-6">
                    <div class="img-block">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="credit-history">
        <div class="container small">
            <h5 class="title">PAYMENT HISTORY (35%)</h5>
            <p>Paying debt on time (and in full) has the greatest positive impact on your credit score. Late payments, judgements, and charge-offs have a negative impact.</p>
            <ul>
                <li>Pay your bills on time, every time.</li>
                <li>Consider setting up automatic bill payments.</li>
            </ul>
            <h5 class="title">OUTSTANDING BALANCES (30%)</h5>
            <p>This is a ratio that determines the difference between the outstanding balance and the available credit. Experts agree to keep your balance at no more than 30 percent of your total limit.</p>
            <ul>
                <li>Don’t “max out” or even get close to your credit limit.</li>
            </ul>
            <h5 class="title">CREDIT HISTORY (15%)</h5>
            <p>Credit scores are based on experience over time; the longer you’ve had an established credit line, the better.</p>
            <ul>
                <li>Keep credit lines open as long as reasonably feasible.</li>
            </ul>
            <h5 class="title">TYPES OF CREDIT (10%)</h5>
            <p>A mix of mortgages, debit and credit cards, and auto loans is more beneficial than having many accounts in one type of credit.</p>
            <ul>
                <li>Apply for a CD secure, savings secure, or other line of credit to increase your credit diversity.</li>
            </ul>
            <h5 class="title">INQUIRIES (10%)</h5>
            <p>Recent credit activity is an indicator of your dependency on credit. If there are multiple inquiries over a short timeframe, it will negatively impact your score.</p>
            <ul>
                <li>Pay your bills on time, every time.</li>
            </ul>
        </div>
    </section>


@endsection

