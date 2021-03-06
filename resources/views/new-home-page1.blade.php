@extends('layouts.layout')
@section('meta')
<title>{{ zactra::translate_lang('Superior credit restoration firm - Prudent Credit Solutions') }} </title>
<meta name="description" content="We resolve inaccuracies with - Bankruptcy, Mortgage Negatives, Late Payment Remarks, Student Loans, Fraud Accounts, Charge Offs, Mixed Files, ChexSystems.">
@endsection
@section('content')
<section class="slider-section">
	<h2 class="hidden">{{ zactra::translate_lang('title') }}</h2>
	<div class="rev_slider_wrapper">
		<div id="rev_slider_4" class="rev_slider" style="display:none">
			<ul>
				<?php $k = 1; ?>
				@foreach($slogans as $key=> $value)
				<li data-transition="random" data-title="Slide Title" data-param1="Additional Text" data-thumb="{{asset('images/slider-1.jpg')}}">
					<!-- SLIDE'S MAIN BACKGROUND IMAGE -->
					<img src="{{asset("images/slider-{$k}.jpg")}}" alt="Sky" class="rev-slidebg">
					<!-- LAYER NR. 2 -->
					<div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="center" data-hoffset="0" data-y="top" data-voffset="300" data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[100%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
						{{$value['author']}}
					</div>
					<!-- LAYER NR. 2 -->
					@foreach( $value['slogan'] as $key=> $slogan)
					<div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="center" data-hoffset="0" data-y="top" data-voffset="{{340 + $key*40 }}" data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>{{$slogan}}
					</div>
					@endforeach
					<!-- LAYER NR. 4 -->
					<div class="tp-caption sfr tp-resizeme letter-space-4" data-x="center" data-hoffset="0" data-y="center" data-voffset="180" data-frames='[{"delay":2200,"speed":2000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'><a href="{{route('whoWeAre')}}" class="el-btn-regular slider-btn-left btn btn-primary">{{ zactra::translate_lang('About Us') }}</a>
					</div>
				</li>
				<?php $k = $k == 5 ? 1 : $k + 1; ?>
				@endforeach
			</ul>
		</div>
	</div>
</section>
<section class="startup-section section-padding">
	<div class="container">
		<div class="header">
			<div class="row">
				<div class="col-sm-6">
					<h3>{{ zactra::translate_lang('We work with all three major') }} <br>{{ zactra::translate_lang('credit reporting agencies') }} </h3>
				</div>
				<div class="col-sm-6">
					<p>{{ zactra::translate_lang('We work with credit bureaus and your creditors to challenge the inaccurate credit reporting that affects your credit score and financial fitness. We will ensure your credit history reflects accurate information.') }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="multi-section">
		<div class="container text-center">
			<div class="client-section">
				<ul class="logo client-carousel owl-carousel owl-theme">
					<li class="wow fadeIn item"><img src="{{asset('images/p-2.png')}}" alt=""></li>
					<li class="wow fadeIn item" data-wow-delay="0.2s"><img src="{{asset('images/p-3.png')}}" alt=""></li>
					<li class="wow fadeIn item" data-wow-delay="0.3s"><img src="{{asset('images/p-4.png')}}" alt=""></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="service-section section-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2>{{ zactra::translate_lang('We Can Help you Resolve Inaccuracies with') }}</h2>
			<div class="border-2"></div>
		</div> <!-- section-title -->
		<div class="row first-row">
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#bankruptcies" data-toggle="modal">{{ zactra::translate_lang('Bankruptcies') }}</a></h3>
						{{-- <li><a href="#{{$content->url}}-1" data-toggle="modal">{{$content->title}}</a></li>--}}
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#mortgage" data-toggle="modal">{{ zactra::translate_lang('Mortgage Negatives') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#collections" data-toggle="modal">{{ zactra::translate_lang('Collections') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 ">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#late" data-toggle="modal">{{ zactra::translate_lang('Late Remarks') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#inquiries" data-toggle="modal">{{ zactra::translate_lang('Inquiries') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#student" data-toggle="modal">{{ zactra::translate_lang('Student Loans') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#judgments" data-toggle="modal">{{ zactra::translate_lang('Judgments') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#fraud" data-toggle="modal">{{ zactra::translate_lang('Fraud Accounts') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#charge" data-toggle="modal">{{ zactra::translate_lang('Charge Offs') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#repossessions" data-toggle="modal">{{ zactra::translate_lang('Repossessions') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#mixed" data-toggle="modal">{{ zactra::translate_lang('Mixed Files') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="service-wrapper">
					<div class="wrapper-content">
						<h3><a href="#chexsystems" data-toggle="modal">{{ zactra::translate_lang('ChexSystems') }}</a></h3>
					</div>
					<div class="hover">
						<span class="hover-one"></span>
						<span class="hover-two"></span>
						<span class="hover-three"></span>
						<span class="hover-four"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="finance-service-section section-padding">
	<div class="container text-center">
		<div class="section-title">
			<h2>{{ zactra::translate_lang('CREDIT REPORT') }}</h2>
			<div class="border-2"></div>
		</div> <!-- section-title -->
		<div class="finance-carousel owl-carousel owl-theme">
			<div class="finance-wrapper item">
				<div class="icon"><img src="{{asset('images/service/1.png')}}" alt=""></div>
				<div class="wrapper-content">
					<h4><a href="#">{{ zactra::translate_lang('Analyze your finances and credit score to identify areas for improvement') }}</a></h4>
				</div>
				<div class="border">
					<span class="border-one"></span>
					<span class="border-two"></span>
					<span class="border-three"></span>
					<span class="border-four"></span>
				</div>
			</div>
			<div class="finance-wrapper item">
				<div class="icon"><img src="{{asset('images/service/2.png')}}" alt=""></div>
				<div class="wrapper-content">
					<h4><a href="#">{{ zactra::translate_lang('Highlight errors on your credit report and make a plan to dispute them') }}</a></h4>
				</div>
				<div class="border">
					<span class="border-one"></span>
					<span class="border-two"></span>
					<span class="border-three"></span>
					<span class="border-four"></span>
				</div>
			</div>
			<div class="finance-wrapper item">
				<div class="icon"><img src="{{asset('images/service/3.png')}}" alt=""></div>
				<div class="wrapper-content">
					<h4><a href="#">{{ zactra::translate_lang('Identify bad debts that have opportunities to negotiate for lower payments') }}</a></h4>
				</div>
				<div class="border">
					<span class="border-one"></span>
					<span class="border-two"></span>
					<span class="border-three"></span>
					<span class="border-four"></span>
				</div>
			</div>
			<div class="finance-wrapper item">
				<div class="icon"><img src="{{asset('images/service/4.png')}}" alt=""></div>
				<div class="wrapper-content">
					<h4><a href="#">{{ zactra::translate_lang('Help you build good habits to keep your credit score in tip top shape') }}</a></h4>
				</div>
				<div class="border">
					<span class="border-one"></span>
					<span class="border-two"></span>
					<span class="border-three"></span>
					<span class="border-four"></span>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="working-section section-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2>{{ zactra::translate_lang('About Company') }}</h2>
			<div class="border-2"></div>
		</div> <!-- section-title -->
		<div class="section-wrapper">
			<div class="row">
				<div class="col-md-4">
					<div class="wrapper-content">
						<h4> {{ zactra::translate_lang('We have over 18 years of experience in the credit repair industry') }}</h4>
						<p>{{ zactra::translate_lang('As a superior credit restoration firm, Prudent Credit Solutions sets the industry standards. Prudent Credit Solutions employs experts who work diligently on acquiring new and superb knowledge concerning the credit restoration industry and use that knowledge to help you strategically dispute and correct inaccuracies on your credit reports, build better credit, and enhance borrowing power for your personal or professional needs.') }} </p>
						<a href="{{route('whoWeAre')}}" class="btn btn-primary">{{ zactra::translate_lang('Read More') }}</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="video-wrapper">
						<video controls="">
							<source src="{{asset('images/howItWorks.mp4')}}" type="video/mp4">
						</video>
					</div>
          <!-- video-wrapper -->
				</div>
			</div>
		</div>
    <!-- section-wrapper -->
	</div>
</section>
<div class="modal fade" id="bankruptcies" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Bankruptcy') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('Bankruptcy is a court proceeding in which a judge and court trustee examine the assets and
					liabilities of individuals and businesses who can???t pay their bills and decide whether to
					discharge those debts so they are no longer legally required to pay them. Bankruptcy will have
					a devastating impact on your credit health. The exact effects will vary. But according to the
					top-scoring model FICO, filing for bankruptcy can send a good credit score of 700 or above
					plummeting by at least 200 points. If your score is a bit lower???around 680???you can lose between
					130 and 150 points.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="mixed" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Mixed Files') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('A mixed credit file occurs whenever a CRA inadvertently commingles the credit
					histories of two different individuals into a single report. The result is a credit report
					that contains information belonging to two different consumers, bundled together as if those
					two people were the same person.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="inquiries" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Inquiries') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('An inquiry refers to a request to look at your credit file and falls into one of two
					camps: hard or soft. A credit inquiry occurs when you apply for a credit card or loan and permit
					the issuer or lender to check your credit. Some inquiries, such as soft inquiries, do not affect
					your credit score, but others, such as hard inquiries can lower your credit score. In general,
					hard credit inquiries have a small impact on your FICO Scores. For most people, one additional
					hard credit inquiry will take less than five points off their FICO Scores. For perspective, the
					full range for FICO Scores is 300-850. Hard Inquiries can have a greater impact if you have few
					accounts or short credit history.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="charge" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Charge Offs') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('A charge-off is a declaration by a creditor (usually a credit card account) that an
					amount of debt is unlikely to be collected. This occurs when a consumer becomes severely
					delinquent on a debt. Traditionally, creditors make this declaration at the point of six months
					without payment. If you have a loan marked as charged off, it will hurt your credit score
					drastically. A charge-off will remain on your credit report for seven years. Even if an account
					is charged off, you still owe the money. And, as it turns out, it may even make it more
					challenging to repay the debt afterward.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="mortgage" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Mortgage Negatives') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('A delinquent mortgage is a home loan for which the borrower has failed to
					make payments as required in the loan documents. A mortgage will be considered delinquent or
					late when a scheduled payment is not made on or before the due date. If the borrower can not bring
					the payments on a delinquent mortgage current within a certain time period, the lender may begin
					foreclosure proceedings. A lender may also offer a borrower a number of options to help prevent
					foreclosure when a mortgage becomes delinquent.') }}
				</p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="student" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Student Loans') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('Some borrowers may not realize it, but student loan debt is a personal financial
					liability that needs to be viewed like any other financial obligation ??? and with the same sense
					of urgency as other payments. The reality is that missing student loan payments can hold you
					back financially, just like missing credit card or car payments will. A student loan is
					considered delinquent the first day after you miss a payment; if the delinquency lasts more
					than 90 days, your loan servicer, which handles the billing and other services for your loan,
					will report it to the three major national credit bureaus, which will lower your credit score.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="repossessions" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Repossessions') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('The simple definition of repossession is reclaiming ownership of something that
					has not been paid off but still has value. In most cases, cars are the primary asset involved in
					repossession, but it could be real estate, jewelry, artwork, or any tangible asset that can be
					sold to recoup money for the unpaid loan balance. In all, a repo could cause a 100-point drop
					in your credit score, Sanford says. And late payments, collections, and public records generally
					all stay on your credit for about seven years, according to') }}
					<a href="myFICO.com" target="_blank">{{ zactra::translate_lang('myFICO.com.') }}</a> {{ zactra::translate_lang('You can stop a repo. The
					key is to communicate with the lender.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="collections" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Collections') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('Once an account is sold to a collection agency, the collection account can then be
					reported as a separate account on your credit report. Collection accounts have a significant
					negative impact on your credit scores. Collections can appear from unsecured accounts, such as
					credit cards and personal loans. Collections have a negative effect on your credit score. The
					older a collection is, the less it hurts you. Collections remain on your credit report for seven
					years past the date of delinquency. In the newest versions of FICO?? and VantageScore??, paid
					collections don not hurt your score but unpaid collections do.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="judgments" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Judgments') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('A judgment is a court order that is the decision in a lawsuit. If a judgment is
					entered against you, a debt collector will have stronger tools, like garnishment, to collect
					the debt. Judgments are no longer factored into credit scores, though they are still public r
					ecords and can still impact your ability to qualify for credit or loans. Lenders may still check
					to see whether any outstanding judgments against a potential borrower exist.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="late" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Late Payment Remarks') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('If you are late paying a bill, your creditor might report it to the consumer
					credit bureaus ??? and that could hurt your credit. But you might be able to get the late payment
					removed if you paid on time or other factors are present, or if it is more than seven years old.
					On-time payments are the biggest factor affecting your credit score, so missing a payment can
					sting. If you have otherwise spotless credit, a payment that is more than 30 days past due can
					knock as many as 100 points off your credit score. If your score is already low, it will not hurt
					it as much but will still do damage.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="fraud" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('Fraud Accounts') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('Fraudulent accounts can damage your credit scores, mainly because the identity
					thief is highly unlikely to make any payments on the account. So, in addition to reporting the
					fraud to the credit card issuer and the police, dispute the unauthorized account with the credit
					bureaus. While having your credit card or debit card account information stolen can undeniably
					be quite frustrating, the good news is that fraudulent charges generally will not impact your
					credit reports and scores at all.') }}
				</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="chexsystems" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>{{ zactra::translate_lang('ChexSystems') }}</h3>
				<p style="text-align: justify">
					{{ zactra::translate_lang('ChexSystems reports are a record of your bank account history.
					Depending on the type of account activity or public record that is been reported,
					a negative mark could remain on your ChexSystems report for up to 10 years.') }}
				</p>
			</div>
		</div>
	</div>
</div>
@endsection
