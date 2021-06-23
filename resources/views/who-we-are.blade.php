
@extends('layouts.layout1')

@section('meta')
    <title>Prudent Credit Solutions - leader in credit repair industry Who We Are?</title>
    <meta name="description" content="Prudent Credit Solutions helps dispute and correct inaccuracies on credit
        reports, improve credit history, achieve reasonable credit-fitness goals.">
    <meta name="keywords" content="top credit repair companies, credit repair companies near me, best credit repair services, fast credit repair, improving credit ratings">

@endsection

@section('content')

  <div class="p-r">
    <section style="background:url({{ asset('/images/page-name.jpg') }}); min-height:250px; filter:brightness(0.5)">


    </section>
    <div class="innet-div-about ">
        <h1 class="text-center text-light fs-25">Prudent Credit Solutions</h1>
        <p class="text-center text-light fs-15">  Home / <span class="theme-color-dark bold">About Us</span>   </p>
    </div>
  </div>


  <div class="container mt-5">
      <div class="row">
        <div class="col-md-3">
          <div class="feature-box bmargin">
            <div class="image-holder"><img width="100%" src="{{asset('images/3.jpg')}}" alt="" class="img-responsive"></div>
            <div class="clearfix"></div>
            <br>
            <h4 class="ubuntu" id="c-text2">Clarity</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="feature-box bmargin">
            <div class="image-holder"><img width="100%" src="{{asset('images/1.jpg')}}" alt="" class="img-responsive"></div>
            <div class="clearfix"></div>
            <br>
            <h4 class="ubuntu" id="c-text2">Insight</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="feature-box bmargin">
            <div class="image-holder"><img width="100%" src="{{asset('images/05.jpg')}}" alt="" class="img-responsive"></div>
            <div class="clearfix"></div>
            <br>
            <h4 class="ubuntu" id="c-text2">Strategy</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>
        <!--end item-->

        <div class="col-md-3">
          <div class="feature-box15 bmargin px-2" style="border: 3px solid #37c6f5">
            <div class="clearfix"></div>
            <br>
            <div class="col-xs-12">
              <h4 class="paddtop1 dosis font-weight-2 lspace-sm">What we do <span class="text-orange-2">For You!</span></h4>

              <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>


          </div>
        </div>
        <!--end item-->

        <!--end item-->

      </div>
    </div>


  <section class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="bg-dark py-3 mt-3">
          <p class="text-light fs-20 text-center"> We entertain our customer with our best services and solutions   </p>
        </div>




        <div class="row pt-5 pb-4 justify-content-center">
          <div class="col-md-6">
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img class="mt-5 pt-5" src="{{ asset('images/about-us.png') }}" width="100%" alt="">
          </div>
          <div class="col-md-6 mb-5">
            <h1 class="theme-color-dark fs-25">Prudent Scores - Improving credit ratings and score, fast credit repair</h1>


            <p class="who-font text-justify">
                At Prudent Credit Solutions, we have over eighteen years of experience in the credit repair industry.
                As a superior credit restoration firm, we set the industry standards. Prudent Credit Solutions
                employs experts who work diligently on acquiring new and superb knowledge concerning the credit
                restoration industry and use that knowledge to help you strategically dispute and correct
                inaccuracies on your credit reports, build better credit, and enhance borrowing power for your
                personal or professional needs.
            </p>
            <p class="who-font text-justify">
                We know the stress that bankruptcies, foreclosures, and other financial hardship can create – and we
                are proud to help our clients escape those stressful situations. We combine timing, technique,
                services, and practical solutions in helping our clients to improve their credit history and achieve
                all their reasonable credit-fitness goals and enhance their borrowing power.
            </p>
            <p class="who-font text-justify" >
                Most of the other credit repair firms are in letter writing business. Writing dispute letters is a
                “lazy man’s” approach to credit repair – one with minimal results and the constant danger of removed
                items being re-inserted into credit reports. Those firms usually charge consumers a monthly fee for
                their services, making any dishonest firm drag dispute process longer because the longer they keep
                you as a client, the more money they will “earn.”In comparison, we do not charge monthly fees and
                always strive to complete the process in the shortest time possible. We will bill you only when we
                correct or remove an incomplete, unverifiable, misleading, frivolous, erroneous, obsolete,
                inaccurate, unauthorized, or fraudulent credit item from your credit reports.
            </p>
            {{-- <p class="who-font text-justify">
                Furthermore, due to our established name in the industry, Exceed Capital Lending, a financial lender
                dedicated to helping people build solid credit files, has generously agreed to finance our clients’
                credit restoration contracts. This agreement serves our clients further by providing an opportunity
                to have a positive account on the credit reports, improving credit ratings while we work to remedy
                past credit issues. Clients who make timely payments to Exceed Capital Lending while utilizing our
                services can work toward both establishing and fixing their credit, all in the same business
                strategy.

            </p>
            <p class="who-font text-justify">
                Our firm is registered and bonded and is in full compliance with the Credit Repair Organizations Act.
            </p>
            <p class="who-font text-justify">
                Our expertise and unique approach to credit restoration goes a long way toward establishing ourselves
                as a premier credit repair solutions entity. Over 95% of our business comes from referrals,
                illustrating our devotion to helping our clients succeed. We are zealously looking forward to
                working with you. Every improved credit profile opens a door to a better future.

            </p> --}}

          </div>
        </div>

      </div>
    </div>
  </section>



    <section>

        @include('helpers.chat')

    </section>



@endsection

@section('scripts')
  <style media="screen">
    header.box-shadow{
      box-shadow: none !important;
    }
  </style>
@endsection
