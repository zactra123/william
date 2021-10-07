@extends('layouts.layout1')
@section('meta')
<title>{{ zactra::translate_lang('How Prudent Credit Solutions work for credit restoration? Get to know!') }}</title>
<meta name="description" content="Decided to hire our firm? Find out how Prudent Credit Solutions work for credit restoration? Stages and rules. Relax and expect to hear some good news!">
@endsection
@section('content')
<br><br><br>
<!-- Working Area -->
<section class="ms-working working-section section-padding">
	<div class="container">
		<div class="section-wrapper">
			<div class="row justify-content-center">
				<h1 class="mt-5">{{ zactra::translate_lang('How It Works') }}</h1>
			</div>
			<div class="row align-items-center">
				<div class="col-md-7">
					<div class="wrapper-content">
						<p class="p-4" style="text-align: justify">
							{{ zactra::translate_lang('When you decide to hire our firm for your credit restoration needs, we direct you to
							register and create an account. Then, with your help and authorization, our proprietary
							software scans and conducts credit audit on your credit reports by searching for
							incomplete, unverifiable, misleading, frivolous, erroneous, obsolete, inaccurate,
							unauthorized, or fraudulent information. Next, you review our findings, sign the credit
							restoration contract, and apply for a personal loan account with Exceed Capital Lending
							(optional). Now, we go to work, and you sit back, relax, and expect to hear some good') }}
							news.
							<br><br>
							{{ zactra::translate_lang('Lastly, once credit reporting agencies update or remove a disputed item or items
							from your credit report, we will notify you and Exceed Capital Lending (given that you
							chose finance option) for payment disbursement.') }}
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="video-wrapper">
						<video controls="" width="100%">
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
@endsection
