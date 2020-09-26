@extends('layouts.login')

@section('content')

    <div class="slider">
        <ul class="slides">
            @foreach($pageContentUp as $contentUp)
                <li>
                    <div class="container">
                        {{--<img src="dummy/server.jpg" alt="">--}}
                        <div class="slide-caption">
                            <h2 class="slide-title">{{$contentUp->title}}</h2>
                            {{--<small class="slide-subtitle">Nemo enom ipsam voluptatem voluptas</small>--}}
                            <div class="slide-summary">
                                <?php echo htmlspecialchars_decode(htmlspecialchars($contentUp->sub_content, ENT_QUOTES));  ?>

                            </div>
                            <a href="{{route('more.information', $contentUp->url )}}" class="button up-color">Read More</a>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul> <!-- .slides -->
    </div> <!-- .slider -->

    <div class="fullwidth-block feature-section">
        <div class="container">

            <div class="row">
                @foreach($pageContentDown as $contentDown)
                    <div class="col-md-3">
                        <div class="feature wow fadeInUp" style="height: 550px">
                            <div class="feature-title">
                                {{--<i class="icon-customer-service"></i>--}}
                                <h2 class="title">{{$contentDown->title}}</h2>
                                {{--<small class="subtitle">Nulla eros odio dolor</small>--}}
                            </div>
                            <div class="feature-summary">
                                <?php echo htmlspecialchars_decode(htmlspecialchars($contentDown->sub_content, ENT_QUOTES));  ?>

                            </div>
                            <a href="{{route('more.information', $contentDown->url )}}" class="button">More info</a>
                        </div> <!-- .feature -->
                    </div> <!-- .col-md-4 -->
                @endforeach
            </div> <!-- .row -->

        </div> <!-- .container -->
    </div> <!-- .feature-section -->

    {{--<div class="fullwidth-block pricing-section">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3 col-xs-6 col-us">--}}
    {{--<div class="pricing-table wow fadeInLeft" data-wow-delay=".2s">--}}
    {{--<div class="pricing-title">--}}
    {{--<h2 class="pricing-type">Basic</h2>--}}
    {{--<small>For small bussiness</small>--}}
    {{--</div>--}}
    {{--<div class="price-tag">--}}
    {{--<strong>$9.99</strong>--}}
    {{--<small>/Per month</small>--}}
    {{--</div>--}}
    {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
    {{--<ul class="list-fa">--}}
    {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 GB disc space</li>--}}
    {{--<li><i class="fa fa-check"></i> 10 email accounts</li>--}}
    {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
    {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
    {{--</ul>--}}
    {{--</div> <!-- .pricing-table -->--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-xs-6 col-us">--}}
    {{--<div class="pricing-table wow fadeInLeft">--}}
    {{--<div class="pricing-title">--}}
    {{--<h2 class="pricing-type">Standard</h2>--}}
    {{--<small>For medium bussiness</small>--}}
    {{--</div>--}}
    {{--<div class="price-tag">--}}
    {{--<strong>$59.99</strong>--}}
    {{--<small>/Per month</small>--}}
    {{--</div>--}}
    {{--<p class="pricing-desc">Etiam interdum nulla eros odio scelerisque magna</p>--}}
    {{--<ul class="list-fa">--}}
    {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
    {{--<li><i class="fa fa-check"></i> 100 GB disc space</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 email accounts</li>--}}
    {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
    {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
    {{--</ul>--}}
    {{--</div> <!-- .pricing-table -->--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-xs-6 col-us">--}}
    {{--<div class="pricing-table wow fadeInRight">--}}
    {{--<div class="pricing-title">--}}
    {{--<h2 class="pricing-type">Advanced</h2>--}}
    {{--<small>For large bussiness</small>--}}
    {{--</div>--}}
    {{--<div class="price-tag">--}}
    {{--<strong>$99.99</strong>--}}
    {{--<small>/Per month</small>--}}
    {{--</div>--}}
    {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
    {{--<ul class="list-fa">--}}
    {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
    {{--<li><i class="fa fa-check"></i> 250 GB disc space</li>--}}
    {{--<li><i class="fa fa-check"></i> 100 email accounts</li>--}}
    {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
    {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
    {{--</ul>--}}
    {{--</div> <!-- .pricing-table -->--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-xs-6 col-us">--}}
    {{--<div class="pricing-table wow fadeInRight" data-wow-delay=".2s">--}}
    {{--<div class="pricing-title">--}}
    {{--<h2 class="pricing-type">Professional</h2>--}}
    {{--<small>For corporate bussiness</small>--}}
    {{--</div>--}}
    {{--<div class="price-tag">--}}
    {{--<strong>$299.99</strong>--}}
    {{--<small>/Per month</small>--}}
    {{--</div>--}}
    {{--<p class="pricing-desc">Curabitur facilisis consectetur leo in venenatis mauris nisl</p>--}}
    {{--<ul class="list-fa">--}}
    {{--<li><i class="fa fa-check"></i> Quad core</li>--}}
    {{--<li><i class="fa fa-check"></i> 50 GB ram</li>--}}
    {{--<li><i class="fa fa-check"></i> 500 GB disc space</li>--}}
    {{--<li><i class="fa fa-check"></i> 100 email accounts</li>--}}
    {{--<li><i class="fa fa-check"></i> Support 24/h</li>--}}
    {{--<li><i class="fa fa-check"></i> Admin panel</li>--}}
    {{--</ul>--}}
    {{--</div> <!-- .pricing-table -->--}}
    {{--</div>--}}
    {{--</div> <!-- .row -->--}}
    {{--</div> <!-- .container -->--}}
    {{--</div> <!-- .pricing-section -->--}}

    {{--<div class="fullwidth-block about-section">--}}

    {{--<div class="container">--}}

    {{--<div class="row">--}}

    {{--<div class="col-md-6 wow fadeInUp">--}}
    {{--<h2>Safe &amp; high-speed hosting</h2>--}}
    {{--<p class="leading">Pallentesque nibh pharetra urna elementum viverra elit duis faucibus augue tempor eleifend</p>--}}
    {{--<p>Tiramisu cotton candy caramels cake biscuit jelly-o chupa chups chocolate. Tootsie roll lollipop topping. Macaroon ice cream cookie powder dessert gingerbread oat cake. Pudding cake powder icing tart sugar plum sesame snaps.</p>--}}
    {{--<p>Fruitcake tootsie roll candy. Sweet roll toffee donut. Chocolate cake gummi bears fruitcake cookie biscuit cotton candy marshmallow.</p>--}}
    {{--<p>Liquorice macaroon marshmallow macaroon cheesecake sweet soufflé. Cheesecake cookie dessert jelly-o. Fruitcake tart topping.</p>--}}

    {{--</div>--}}

    {{--<div class="col-md-6">--}}
    {{--<h2 class="wow fadeInRight">What can you expect?</h2>--}}
    {{--<hr class="separator">--}}
    {{--<ul class="feature-list">--}}
    {{--<li class="wow fadeInRight">--}}
    {{--<i class="icon-money-globe"></i>--}}
    {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
    {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
    {{--</li>--}}
    {{--<li class="wow fadeInRight">--}}
    {{--<i class="icon-server-lock"></i>--}}
    {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
    {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
    {{--</li>--}}
    {{--<li class="wow fadeInRight">--}}
    {{--<i class="icon-person-time"></i>--}}
    {{--<h3>Aliquam nibh quam iaculis tempis</h3>--}}
    {{--<p>Candy powder. Carrot cake ice cream toffee bonbon. Donut marzipan chupa chups cookie tart dessert fruitcake brownie. </p>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}

    {{--</div> <!-- .row -->--}}

    {{--</div> <!-- .container -->--}}
    {{--</div> <!-- .fullwidth-block -->--}}
    @include('helpers/chat-box')
@endsection