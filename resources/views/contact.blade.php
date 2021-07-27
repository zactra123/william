
@extends('layouts.layout1')

@section('content')

  <div class="p-r">
    <section style="background:url({{ asset('/images/page-name.jpg') }}); min-height:250px; filter:brightness(0.5)">


    </section>
    <div class="innet-div-about ">
        <h1 class="text-center text-light fs-25">What we can do for you..?</h1>
        <p class="text-center text-light fs-15">  Home / <span class="theme-color-dark bold">Contact Us</span>   </p>
    </div>
  </div>
  <br><br>
    <!-- Working Area -->
    <section class="ms-working working-section section-padding mt-5">
        <div class="container">
            <!-- section-title -->
        <div class="row">
        <div class="col-md-8">
          <div class="col-md-12 nopadding">
            {{-- <div id="googleMap" style="width:100%;height:300px;"></div> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3308.251910018481!2d-118.16062677777458!3d33.986062727008566!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2ce8ad1141a4b%3A0x21e5480545b2ce21!2s5800%20S%20Eastern%20Ave%20Suit%20500%2C%20Los%20Angeles%2C%20CA%2090040!5e0!3m2!1sru!2sus!4v1611490037688!5m2!1sru!2sus" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <!--end map-->

          <div class="clearfix"></div>
          <br>
          <!-- end .smart-forms section -->
        </div>
        <div class="col-md-4">
          <div class="card py-3 px-3 card-no-box-shadow">
            <h4 class="text-orange-2 theme-color-dark">Find Us</h4>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-1">
                  <i class="fa fa-home"></i>
                </div>
                <div class="col-md-10">
                  5800 S. Eastern Ave., Suite 500 Commerce, CA 90040
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-2">
              <div class="row">
                <div class="col-md-1">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="col-md-10">
                  1-844-337-8336
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-2">
              <div class="row">
                <div class="col-md-1">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="col-md-10">
                  <a href="mailto:info@prudentscores.com"> info@prudentscores.com</a>
                </div>
              </div>
            </div>
            <!--<i class="fa fa-phone"></i> +923407712693 <br>-->
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-8 mt-5">
                      <p class="who-font fs-14" style="text-align: justify">
                          <span class="bold">PRUDENT CREDIT SOLUTIONS</span> created to help make fixing your credit a
                          hassle-free task. We help you dispute any errors showing on your report, negotiate any bad debts,
                          and their repayment schedules, and then we’ll point you in the right direction to ensure you keep
                          the upward trend of a growing credit score! With us, you have a fighting chance to get our credit
                          back into tip-top shape!
                      </p>


                      <p  class="who-font fs-14"  style="text-align: justify">
                          Have a question or want a free review of your financial profile to determine whether we
                          can help? Contact us through our contact information detailed below:
                      </p>
                    </div>

                    <div class="col-md-8">
                        <div class="video-wrapper" id="contactForm">
                            <h5>Contact Form</h5>
                            <form action="#" >
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <input class="form-control" name="contact[name]" type="text" placeholder="Your name..." required>
                                          </div>
                                          <div class="col-md-6">
                                            <input class="form-control" name="contact[email]" type="email" placeholder="Email..." required>

                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <textarea class="form-control" name="contact[text]" id="" rows=7 required placeholder="Write Message...."></textarea>
                                        <input type="submit" class="button pull-right btn btn-info mt-4" value="Send Messages">
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
<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(31.4504,73.1350),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@endsection
