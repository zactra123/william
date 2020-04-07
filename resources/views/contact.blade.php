
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
                            <p>5800 S. Eastern Ave., Commerce, CA 90040</p>
                            <p>Phone: <a href="tel:1-844-337-8336">
                                    <i class="fa fa-phone-alt" aria-hidden="true"></i>
                                    1-844-337-8336
                                </a>
                            </p>
                            <p>info@prudentcredit.com</p>
                        </address>
                    </div>
                    <div class="col-md-9" id="contactForm">
                        <h1>Contact Form</h1>
                        <form action="#" >
                            <div class="row">
                                @csrf
                                <div class="col-md-4">
                                    <p ><input name="contact[name]" type="text" placeholder="Your name..." required></p>
                                    <p ><input name="contact[email]" type="email" placeholder="Email..." required></p>
                                </div>
                                <div class="col-md-8">
                                    <p ><textarea name="contact[text]" id="" required></textarea></p>
                                    <input type="submit" class="button pull-right" value="Send Messages">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


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
