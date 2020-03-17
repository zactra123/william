
@extends('layouts.login')

@section('content')

    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container fon">
                <div class="card m-0 pb-4">
                    <div class="breadcrumbs">
                        <div class="container">
                            <a href="{{url('/')}}">Home</a> &rarr;
                            <a href="#">CONTACT US</a>
                        </div>
                    </div>

                    <div id="site-content">

                        <div class="container">
                            <p style="text-align: justify">
                                BetterCreditFix.com was created to help make fixing your credit a hassle-free task. We
                                 help you dispute any errors showing on your report, negotiate any bad debts and their
                                 repayment schedules, and then we’ll point you in the right direction to ensure you keep
                                  the upward trend of a growing credit score! With us, you have a fighting chance to get
                                   your credit back into tip top shape!
                                </p>

                            <h1>Contact Us</h1>
                            <p style="text-align: justify">
                                Have a question or want a free review of your financial profile to determine whether we
                                can help? Contact us through our contact information detailed below:

                            </p>

                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <h1 class="wow fadeInLeft">Addresss</h1>
                                    <address class="wow fadeInLeft">
                                        <p>Better Credit Fix</p>
                                        <p>Address</p>
                                        <p>Phone: +1 932 349 313 <br>info@bettercreditfix.com</p>
                                    </address>
                                </div>
                                <div class="col-md-9">
                                    <h1 class="wow fadeInRight">Contact Form</h1>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="wow fadeInRight"><input type="text" placeholder="Your name..."></p>
                                                <p class="wow fadeInRight"><input type="email" placeholder="Email..."></p>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="wow fadeInRight"><textarea name="" id=""></textarea></p>
                                                <input type="submit" class="button pull-right wow fadeInRight" value="Send Messages">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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