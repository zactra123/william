
@extends('layouts.layout')

@section('content')

    <section class="header-title section-padding">
        <div class="container text-center">
            <h2 class="title">Contact Us</h2>
            <span class="sub-title"><a href="{{ url('/') }}">Home</a> &gt; Contact Us</span>
        </div>
    </section>



    <!-- Working Area -->
    <section class="ms-working working-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <div class="container">
                    <p class="who-font" style="text-align: justify">
                        <span class="font-italic">PRUDENT CREDIT SOLUTIONS</span> created to help make fixing your credit a
                        hassle-free task. We help you dispute any errors showing on your report, negotiate any bad debts,
                        and their repayment schedules, and then we’ll point you in the right direction to ensure you keep
                        the upward trend of a growing credit score! With us, you have a fighting chance to get our credit
                        back into tip-top shape!
                    </p>


                    <p  class="who-font"  style="text-align: justify">
                        Have a question or want a free review of your financial profile to determine whether we
                        can help? Contact us through our contact information detailed below:
                    </p>

                </div>

            </div> <!-- section-title -->

            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="wrapper-content">
                            <h2>Address</h2>
                            <address>
                                <p  class="who-font font-italic" >PRUDENT CREDIT SOLUTIONS</p>
                                <p>5800 S. Eastern Ave., Suite 500 <br>Commerce, CA 90040</p>
                                <p>Phone: <a href="tel:1-844-337-8336">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                        1-844-337-8336
                                    </a>
                                </p>
                                <p>info@prudentcredit.com</p>
                            </address>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="video-wrapper" id="contactForm">
                            <h1>Contact Form</h1>
                            <form action="#" >
                                <div class="row">
                                    @csrf
                                    <div class="col-md-4">
                                        <p ><input class="form-control" name="contact[name]" type="text" placeholder="Your name..." required></p>
                                        <p ><input class="form-control" name="contact[email]" type="email" placeholder="Email..." required></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p ><textarea class="form-control" name="contact[text]" id="" required></textarea></p>
                                        <input type="submit" class="button pull-right" value="Send Messages">
                                    </div>
                                </div>
                            </form>
                        </div> <!-- video-wrapper -->
                    </div>
                </div>
            </div> <!-- section-wrapper -->
        </div>
    </section>

<script>
    $("#contactForm form").submit(function(e){
        e.preventDefault();
        var form = $(this).serializeArray(), data={};
        $.each(form, function(index, el){
            data[el.name] = el.value
        });
        console.log(data)

        $.ajax({
            url: "/contact/send-message",
            type:"POST",
            data: data,
            success: function (results) {

                bootbox.alert("Your email has been successfully sent")
                $("#contactForm form")[0].reset()

            },

            error:function (err, state) {
                console.log(JSON.parse(err.responseText))
                $("#appointments .text-danger").removeClass("d-none")
            }
        });



    })
</script>
@endsection
