
@extends('layouts.login')

@section('content')
        <div id="site-content">

            <div class="container mt-5 pt-5">
                <p class="who-font" style="text-align: justify">
                    <span class="font-italic">PRUDENT CREDIT SOLUTIONS</span> was created to help make fixing your credit
                    a hassle-free task. We help you dispute any errors showing on your report, negotiate any bad debts
                    and their repayment schedules, and then we’ll point you in the right direction to ensure you keep
                      the upward trend of a growing credit score! With us, you have a fighting chance to get our credit
                    back into tip top shape!
                </p>

                <h1>Contact Us</h1>
                <p  class="who-font"  style="text-align: justify">
                    Have a question or want a free review of your financial profile to determine whether we
                    can help? Contact us through our contact information detailed below:
                </p>

            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h1>Address</h1>
                        <address>
                            <p  class="who-font font-italic" >PRUDENT CREDIT SOLUTIONS</p>
                            <p>Address</p>
                            <p>Phone: +1 932 349 313 <br>info@prudentcredit.com</p>
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
