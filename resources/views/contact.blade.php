
@extends('layouts.login')

@section('content')


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
                        <h1>Addresss</h1>
                        <address>
                            <p>Better Credit Fix</p>
                            <p>Address</p>
                            <p>Phone: +1 932 349 313 <br>info@bettercreditfix.com</p>
                        </address>
                    </div>
                    <div class="col-md-9">
                        <h1>Contact Form</h1>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-4">
                                    <p ><input type="text" placeholder="Your name..."></p>
                                    <p ><input type="email" placeholder="Email..."></p>
                                </div>
                                <div class="col-md-8">
                                    <p ><textarea name="" id=""></textarea></p>
                                    <input type="submit" class="button pull-right" value="Send Messages">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



@endsection
