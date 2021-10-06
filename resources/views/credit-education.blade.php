@extends('layouts.layout1')


@section('meta')
<title>Free credit education information: stages, rules - Prudent Credit Solutions</title>
<meta name="description" content="Prudent Credit Solutions' free credit education info about how FICO scores work,
         FICO credit score ranges, how rebuild, create and maintain good credit.">
@endsection
@section('content')
<section class="good-credit">
	<div class="container small">
		<h1 class="title">{{ zactra::translate_lang('What Is Considered a Good Credit Score?') }}</h1>
		<div class="credit-education-text">
			<h5>{{ zactra::translate_lang('What is good credit score') }}</h5>
			<p class="fs-18">
				{{ zactra::translate_lang('A credit score is a number that typically ranges from 300 – 850 and is used by financial institutions to evaluate a credit applicants ability and willingness to pay back the funds they’re requesting to borrow. Credit scores can also reflect how responsible an individual is when applying for a job, how likely they are to pay for their rental property on time or to access risk when applying for insurance.
				The most common types of financial institutions include commercial banks, investment banks, brokerage firms, insurance companies, and asset management funds. Other types include the financial departments of “buy here, pay here” auto dealerships and furniture rental stores, credit unions, and finance firms.') }}
			</p>
			<h5>{{ zactra::translate_lang('Types of credit scores') }}</h5>
			<p class="fs-18">{{ zactra::translate_lang('Typically there are two types of credit scores:') }}</p>
			<ul class="fs-18">
				<li>{{ zactra::translate_lang('FICO ®') }}</li>
				<li>{{ zactra::translate_lang('VantageScore') }}</li>
			</ul>
			<p class="fs-18">{{ zactra::translate_lang('However, you may also find industry specific scores.') }}</p>
		</div>
	</div>
</section>
<section class="fico">
	<div class="container small">
		<div class="row mt-3">
			<div class="fico-description col-12 col-lg-6">
				<h5 class="servicespagetitle">{{ zactra::translate_lang('What is a good FICO score?') }}</h5>
				<p class="fs-18">{{ zactra::translate_lang('Fico is one of the most common types of credit scores, which were originated by the Fair Isaac Corporation. Fico scores range between 300 and 850. Therefore, a fico score that is above 680 is known as an average, good Fico score. A fico score above 780 is excellent. Here are the different Fico score ranges:') }}</p>
				<h5 class="servicespagetitle">{{ zactra::translate_lang('FICO scores and the percentage of the population') }}</h5>
				<ul class="fs-18">
					<li>{{ zactra::translate_lang('4.7% have credit scores between 300 and 499') }} </li>
					<li>{{ zactra::translate_lang('15.3% have scores that fall between 500 and 599') }}</li>
					<li>{{ zactra::translate_lang('23.2% come in between 600 and 699') }}</li>
					<li>{{ zactra::translate_lang('36.1% of credit reports show between 700 and 799') }}</li>
					<li>{{ zactra::translate_lang('20.7% have scores of 800 and 850 and typically have a long-established credit history.') }}</li>
				</ul>
			</div>
			<div class="fico-image col-12 col-lg-6">
				<h5 class="servicespagetitle">{{ zactra::translate_lang('Credit Score Chart and Range') }}</h5>
				<div class="img-part mt-5">
					<div class="img-box">
						<img src="{{asset('images/new/fico_graph.png')}}">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="vantage-score pt-5">
	<div class="container small">
		<h5 class="servicespagetitle">{{ zactra::translate_lang('What is a Good VantageScore?') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Just like Fico scores, VantageScores are also used by lenders. These credit scores were developed by the following three credit bureaus:') }}</p>
		<ol class="fs-18">
			<li>{{ zactra::translate_lang('Experian') }}</li>
			<li>{{ zactra::translate_lang('Equifax') }}</li>
			<li>{{ zactra::translate_lang('TransUnion') }}</li>
		</ol>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('VantageScore and the percentage of the population') }}</h5>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('5% have credit scores between 300 and 499') }} </li>
			<li>{{ zactra::translate_lang('21% have scores that fall between 500 and 599') }}</li>
			<li>{{ zactra::translate_lang('3% come in between 600 and 699') }}</li>
			<li>{{ zactra::translate_lang('38% of credit reports show between 700 and 799') }}</li>
			<li>{{ zactra::translate_lang('23% have scores of 800 and 850 and typically have a long-established credit history.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('Purpose of credit scores') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Lenders use credit scores as a great decision-making tool as it helps them in analyzing whether you will be able to repay your loan at the specified time or not. These scores are also known as risk scores as they help the lenders in determining the risk of giving you a loan and whether you will repay the debt on time. Therefore, having a good credit score is important as it will help you get your loan approved by the lender. These credit scores are like your report cards. They help in determining whether you qualify for the credit or not.') }}
			</br></br>
			{{ zactra::translate_lang('However, it is crucial to note that your credit score alone does not help in making the lender decide if you qualify for the loan or not. There is other information mentioned on your credit report such as the following which helps in getting your loan approved:') }}</p>

		<ul class="fs-18">
			<li>{{ zactra::translate_lang('The total amount of debt') }}</li>
			<li>{{ zactra::translate_lang('Types of credit') }}</li>
			<li>{{ zactra::translate_lang('The time that is taken to pay off debts') }}</li>
			<li>{{ zactra::translate_lang('Help determine your total monthly expenses') }}</li>
			<li>{{ zactra::translate_lang('The ratio of monthly expenses against your income.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('Factors affecting credit scores') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('There are certain factors in your credit report that may affect your overall credit score. These factors are mentioned below:') }}</p>
		<ol class="fs-18">
			<li>{{ zactra::translate_lang('Your payment history that includes loan and credit cards information') }}</li>
			<li>{{ zactra::translate_lang('Your credit card utilization rate') }}</li>
			<li>{{ zactra::translate_lang('The total amount of debt due') }}</li>
			<li>{{ zactra::translate_lang('If there is any public record against you, such as a bankruptcy.') }}</li>
			<li>{{ zactra::translate_lang('If any inquiry took place against your credit report') }}</li>
			<li>{{ zactra::translate_lang('Amount of credit accounts you have.') }}</li>
		</ol>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('How can you improve your credit scores?') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Many times people go over their credit information and come to the conclusion that their credit score is not where it should be to get approved for credit. When you know what kind of activities can affect your credit score, you can improve it by simply not getting yourself indulged in those activities. Get familiar with your credit report and find out the pattern that caused the downfall of your credit score. Once you are sure what caused it, try to avoid those activities. Doing this will have a great impact on your credit score altogether.') }} </p>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('Things to know about credit scores') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('It is essential to know that your credit score is not mentioned in your credit report, nor are they mentioned in your credit history. Your credit score is only calculated when you request it. Based on your credit history, the credit score can keep on changing over time, so there is nothing to worry about if you have a poor credit score.') }}
			</br></br>
			{{ zactra::translate_lang('There are certain reasons why you may not have a credit score. One of those reasons is that you may not have adequate credit history to have a credit score. However, you can still get a credit score if you are under 21. You need to have a cosigner who can guarantee that you will pay back any credit that is due.') }}</p>
	</div>
	<div class="container small">
		<h3 class="mt-4">{{ zactra::translate_lang('How do you maintain a healthy credit score?') }}</h3>
		<div class="wrapper-content">
			<h4 class="mt-4">{{ zactra::translate_lang('3 Tips to Keeping Your Credit Score in Healthy Shape') }}</h4>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('The best way to keep your credit in tip-top shape is to avoid it from ever getting nasty in the
				first place! Sure, this is much easier said than done. Let’s face it; life sometimes happens
				before we’ve had a second even to breathe! With that said, if you follow these four tips
				regularly, you won’t have to worry about your credit ever going down the drain, which means just
				one less thing to worry about.') }}
			</p>

			<h4 class="mt-2">{{ zactra::translate_lang('1. Monitor Your Credit Score Regularly') }}</h4>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('How do you monitor your credit report? Did you know that
				everyone can get a free credit report every year without affecting your credit score? Yup! It’s
				the law. To do so, you need to head over to AnnualCreditReport.com and click on “Request your
				free credit reports” located at the top of the page.') }}
			</p>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('After filling in your contact information and verifying your identity, you can print out a
				detailed report of your credit profile. It will detail all the current debts you have, their
				balances, how often you pay on time, how often you have late payments, and whether you have any
				bad debts such as collections.') }}
			</p>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Taking advantage of your free annual credit report is vital to keeping your credit score in
				check. Doing so will help you identify errors before they get out of hand, keeps you informed on
				how banks view your financial profile, and ultimately allows you to maintain a healthy credit
				score.') }}
			</p>

			<h4 class="mt-2">{{ zactra::translate_lang('2. Make Your Debt Payments on Time') }}</h4>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Perhaps the most common reason someone’s credit score drops are due to late payments. One late
				payment can affect your score dramatically. Two late payments are even worse, and more than that
				is just a downhill slipping slide.') }}
			</p>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Credit bureaus will identify how many payments are less than 30 days late and how many are less
				than 60 days late. If it’s more than 60 days late, there’s a good chance to go to collections.
				A perfect on-time payment history says novels to a bank about how likely you will repay a loan
				when needed. This only increases your chances of getting help from major financial institutions
				to purchase that dream home you’ve always wanted.') }}
			</p>

			<h4 class="mt-2">{{ zactra::translate_lang('3. Keep Your Balances Low') }}</h4>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Another common issue that has a significant impact on how your credit is scored is your total
				balances owed and, specifically, the average balances are of your revolving debt (credit cards
				and lines of credit). If you keep your revolving credit balances above 30% - 50% of their total
				credit limits, it’s negatively impacting your credit score and screams “SPENDER” to any bank
				reviewing your profile to lend you money.') }}
			</p>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Keeping your total balances ideally below 30% of your total limit allows you to stay off the
				radar in terms of holding high balances, while also allowing you to make monthly payments,
				indicating you can keep making your payments on time.') }}
			</p>
			<h4 class="mt-2">{{ zactra::translate_lang('4. Dispute Credit Report Errors ASAP!') }}</h4>
			<p class="text-justify fs-18">
				{{ zactra::translate_lang('Upon regularly monitoring your credit, you’ll notice errors in your credit reports as soon as
				they are updated. When you see something you don’t recognize on your credit report, the first
				thing you should do is reach out to the company that owns that debt. You’ll often notice some
				banks or lenders operate parts of their company under different names called a DBA (doing
				business as). Upon reaching out to the company, if you find it’s still an error, your next step
				is to reach out to credit bureaus immediately and dispute the mistake, or better yet, you will
				hire a professional credit repair company such as Prudent Credit Solutions, Inc to handle that
				matter swiftly on your behalf.') }}
			</p>

		</div> <!-- section-title -->
	</div>
</section>
<section class="credit-score">
	<div class="container small">
		<div class="row credit">
			<div class="credit-score-text col-12 col-md-6">
				<h5 class="servicespagetitle">{{ zactra::translate_lang('5. Common Factors of your Credit Score') }}</h5>
				<p class="fs-18">{{ zactra::translate_lang('The five common factors that determine a credit score are listed below, in order of importance.') }}</p>
			</div>
			<div class="credit-score-img col-12 col-md-6">
				<div class="img-block">
					<img src="{{asset("images/new/credit_education.png")}}" alt="credit eductaion">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="credit-history">
	<div class="container small">
		<h5 class="servicespagetitle">{{ zactra::translate_lang('PAYMENT HISTORY (35%)') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Paying debt on time (and in full) has the greatest positive impact on your credit score. Late payments, judgements, and charge-offs have a negative impact.') }}</p>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('Pay your bills on time, every time.') }}</li>
			<li>{{ zactra::translate_lang('Consider setting up automatic bill payments.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('OUTSTANDING BALANCES (30%)') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('This is a ratio that determines the difference between the outstanding balance and the available credit. Experts agree to keep your balance at no more than 30 percent of your total limit.') }}</p>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('Don’t “max out” or even get close to your credit limit.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('CREDIT HISTORY (15%)') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Credit scores are based on experience over time; the longer you’ve had an established credit line, the better.') }}</p>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('Keep credit lines open as long as reasonably feasible.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('TYPES OF CREDIT (10%)') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('A mix of mortgages, debit and credit cards, and auto loans is more beneficial than having many accounts in one type of credit.') }}</p>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('Apply for a CD secure, savings secure, or other line of credit to increase your credit diversity.') }}</li>
		</ul>
		<h5 class="servicespagetitle">{{ zactra::translate_lang('INQUIRIES (10%)') }}</h5>
		<p class="fs-18">{{ zactra::translate_lang('Recent credit activity is an indicator of your dependency on credit. If there are multiple inquiries over a short timeframe, it will negatively impact your score.') }}</p>
		<ul class="fs-18">
			<li>{{ zactra::translate_lang('Pay your bills on time, every time.') }}</li>
		</ul>
	</div>
</section>
@endsection
