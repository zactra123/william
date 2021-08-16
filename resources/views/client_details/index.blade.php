@extends('layouts.layout2')
@section('body')
  <div class="main-content-container container-fluid px-4">
      <!-- Page Header -->
      <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <h3 class="page-title">Dashboard</h3>
          </div>
      </div>
      <!-- End Page Header -->
      <!-- Small Stats Blocks -->

      <!-- End Small Stats Blocks -->
      <div class="row">
          <!-- Users Stats -->
          <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
              <div class="card card-small">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">Users</h6>
                  </div>
                  <div class="card-body pt-0">
                      <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                          <div class="chartjs-size-monitor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                              <div style="position: absolute; width: 1000000px; height: 1000000px; left: 0; top: 0;"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                              <div style="position: absolute; width: 200%; height: 200%; left: 0; top: 0;"></div>
                          </div>
                      </div>
                      <div class="row border-bottom py-2 bg-light">
                          <div class="col-12 col-sm-6">
                              <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                                  <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1" />
                                  <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2" />
                                  <span class="input-group-append">
                                      <span class="input-group-text">
                                          <i class="material-icons"></i>
                                      </span>
                                  </span>
                              </div>
                          </div>
                          <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                              <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report →</button>
                          </div>
                      </div>
                      <canvas height="349" style="max-width: 100% !important; display: block; width: 807px; height: 349px;" class="blog-overview-users chartjs-render-monitor" width="807"></canvas>
                  </div>
              </div>
          </div>
          <!-- End Users Stats -->
          <!-- Users By Device Stats -->
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">DISPUTE PROGRESS</h6>
                  </div>
                  <div class="card-body d-flex text-center">
                      <div id="piechart_3d" class="" style="width: 500px; height: 300px;"></div>
                  </div>

              </div>
          </div>
          <!-- End Users By Device Stats -->
          <!-- New Draft Component -->
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <!-- Quick Post -->
              <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">New Draft</h6>
                  </div>
                  <div class="card-body d-flex flex-column">
                      <form class="quick-post-form">
                          <div class="form-group">
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brave New World" />
                          </div>
                          <div class="form-group">
                              <textarea class="form-control" placeholder="Words can be like X-rays if you use them properly..."></textarea>
                          </div>
                          <div class="form-group mb-0">
                              <button type="submit" class="btn btn-accent">Create Draft</button>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- End Quick Post -->
          </div>
          <!-- End New Draft Component -->
          <!-- Discussions Component -->
          <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
              <div class="card card-small blog-comments">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">DISPUTES</h6>
                  </div>
                  <div class="card-body p-0" style="min-height:380px;">
                    @foreach($toDos as $todo)
                        @foreach($todo->disputes as $dispute)
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $info =  $dispute->disputable->showDetails();?>
                                    {{$info}}
                                </div>
                                <div class="col-md-6">
                                    {{$status[$dispute->status]}}

                                </div>
                            </div>
                        @endforeach
                    @endforeach
                  </div>

              </div>
          </div>
          <!-- End Discussions Component -->
          <!-- Top Referrals Component -->
          <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
              <div class="card card-small">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">CREDIT REPORTS</h6>
                  </div>
                  <div class="card-body p-0">
                      <ul class="list-group list-group-small list-group-flush">
                          <li class="list-group-item d-flex px-3">
                            <div class="dropdown">
                                <span class="report_access bold">EQUIFAX</span>
                                {{-- <img class="report_access"src="{{asset('images/report_access/eq_logo_2.png')}}"  width="70%"> --}}
                                <div class="dropdown-content equifax" style="height:150px !important;overflow:scroll;">
                                    <a href="https://my.equifax.com/membercenter/#/login" target="_blank">LOGIN</a>
                                    <a href="{{route('client.credentials',['source'=> 'equifax'])}}">CREDENTIALS</a>
                                    <a href="#" target="_blank">REGISTER</a>
                                    <a href="#">ARCHIVE</a>
                                    @foreach($reportsDateEQ as $keyEq=> $eqDate)
                                        <a href="{{route('client.report', ['type'=>"equifax", 'date'=>$keyEq])}}">{{date("m/d/Y",strtotime($eqDate))}}</a>
                                    @endforeach
                                </div>
                            </div>
                          </li>
                          <li class="list-group-item d-flex px-3">
                            <div class="dropdown">
                              <span class="report_access bold">EXPERIAN</span>
                                {{-- <img class="report_access"src="{{asset('images/report_access/ex_logo_2.png')}}"   width="70%"> --}}
                                <div class="dropdown-content experina" style="height:150px !important;overflow:scroll;">
                                    <a href="https://usa.experian.com/login/index" target="_blank">LOGIN</a>
                                    <a href="https://usa.experian.com/#/registration?offer=at_fcras100&br=exp&dAuth=true" target="_blank">REGISTER</a>
                                    <a href="{{route('client.credentials',['source'=> 'experian'])}}">CREDENTIALS</a>
                                    <a href="#">ARCHIVE</a>

                                    @foreach($reportsDateEX as $keyEx => $exDate)
                                        <a href="{{route('client.report', ['type'=>"experian", 'date'=>$keyEx])}}">{{date("m/d/Y",strtotime($exDate))}}</a>
                                    @endforeach
                                </div>
                            </div>
                          </li>
                          <li class="list-group-item d-flex px-3">
                            <div class="dropdown ">
                              <span class="report_access bold">TRANSUNION</span>
                                {{-- <img class="report_access"src="{{asset('images/report_access/tu_logo_2.png')}}"   width="70%"> --}}
                                <div class="dropdown-content transunion" style="height:150px !important;overflow:scroll;">
                                    <div class="">
                                        <a class="p-1 mt-1 pl-3" href="https://service.transunion.com/dss/login.page" target="_blank">MEMBER LOGIN</a>
                                        <a class="p-1  mt-1 pl-3" href="{{route('client.credentials',['source'=> 'transunion_member'])}}">MEMBER CREDENTIALS</a>
                                        <a class="p-1 mt-1 pl-3" href="https://membership.tui.transunion.com/tucm/orderStep1_form.page?offer=3BM10246&PLACE_CTA=top_right_search" target="_blank">MEMBER  REGISTRATION</a>
                                        <hr class="my-1">
                                    </div>
                                    <div class="">
                                        <a class="p-1 mt-1 pl-3" href="https://membership.tui.transunion.com/tucm/login.page" target="_blank">DISPUTE LOGIN</a>
                                        <a class="p-1 mt-1 pl-3" href="{{route('client.credentials',['source'=> 'transunion_dispute'])}}">DISPUTE CREDENTIALS</a>
                                        <a class="p-1 mt-1 pl-3" href="https://service.transunion.com/dss/orderStep1_form.page?" target="_blank">DISPUTE REGISTRATION</a>
                                        <hr class="my-1">
                                    </div>
                                    <div class="">
                                        <a class="p-1 mt-1 pl-3" href="#">ARCHIVE</a>
                                    </div>

                                    @foreach($reportsDateTU as $keyTu => $tuDate)
                                        <a href="{{route('client.report', ['type'=>"transunion", 'date'=>$keyTu])}}">{{date("m/d/Y",strtotime($tuDate))}}</a>
                                    @endforeach
                                </div>
                            </div>
                          </li>
                          <li class="list-group-item d-flex px-3">
                            <div class="dropdown">
                              <span class="report_access bold">OTHER REPORTS</span>
                                {{-- <img class="report_access"src="{{asset('images/report_access/misc_4.png')}}"   width="70%"> --}}
                                <div class="dropdown-content report" style="height:150px !important;overflow:scroll;">
                                    <div class="dropdown">
                                        <ul class="dropdown-submenu">
                                          <a href="https://www.creditkarma.com/auth/logon?redirectUrl=https%3A%2F%2Fwww.creditkarma.com%2Fdashboard"class="dropdown-toggle" data-toggle="dropdown" target="_blank"> <span class="report_access">CREDITKARMA</span></a>
                                            {{-- <a href="https://www.creditkarma.com/auth/logon?redirectUrl=https%3A%2F%2Fwww.creditkarma.com%2Fdashboard"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/ck_logo_1.png')}}"  width="110px"></a> --}}
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('client.credentials',['source'=> 'credit_karma'])}}"target="_blank">CREDENTIALS</a>
                                            </ul>
                                        </ul>
                                        <ul>
                                          <a href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/"class="dropdown-toggle" data-toggle="dropdown" target="_blank"> <span class="report_access">CHEXSYSTEMS</span></a>
                                            {{-- <a href="https://www.chexsystems.com/web/chexsystems/consumerdebit/page/requestreports/consumerdisclosure/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDRxdHA1Ngg183AP83QwcXX39LIJDfYwM_M30w1EV-HuEGAEVuPq4Gxt5G7oHmuhHkaQfTYGBOZH6cQBHA8rsByqIwm98uH4UqhVoIeBrTkABKIjwOtIAbgJuVxTkhoaGRhhkeqYrKgIArc3mYw!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/"class="dropdown-toggle" data-toggle="dropdown" target="_blank"><img class="report_access"src="{{asset('images/report_access/cs_logo_1.png')}}"  width="110px"></a> --}}


                                        </ul>

                                    </div>
                                </div>
                            </div>
                          </li>


                      </ul>
                  </div>

              </div>
          </div>
          <!-- End Top Referrals Component -->
      </div>
  </div>
@endsection




    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/lib/gstatic.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#doc_sunb").validate({
                rules: {
                    "social": {
                        required: '#driver_license:blank',
                    },
                    "driver": {
                        required: '#social_security:blank',
                    },
                },

                errorPlacement: function(error, element) {
                    error.insertAfter($(element));
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {

            autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
                types: ['address'],
                componentRestrictions: {country: "us"}
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                $("#address").val(place.formatted_address)
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            $("#zip").val(place.address_components[i].long_name);

                        }
                    }
                }
            });
        });
    </script>
    <script>

        $(document).ready(function() {
            $(".ssn").mask("999-99-9999");
            $('#phone_number').mask('(000) 000-0000');

            $.validator.addMethod("one_option", function(value, element) {
                if (element.name.indexOf("sex") != -1){
                    return $(".sex_options").length < 2
                }
                return $("[name='" +element.name+ "']").length < 2;
            }, "Please choose one of the options");

            $.validator.addMethod("valid_ssn", function(value, element) {
                console.log(value, element)
                return !!value.match(/[0-9]{3}-[0-9]{2}-[0-9]{4}/g);
            }, "Not valid ssn format.");

            $.validator.addMethod("valid_address", function(value, element) {
                // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
                return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
            }, "Not valid address format.");


            $("#clientDetailsForm").validate({
                rules: {
                    "client[full_name]": {
                        required:true,
                        one_option: true
                    },
                    "client[dob]": {
                        required:true,
                        one_option: true
                    },
                    "client[ssn]": {
                        required:true,
                        valid_ssn: true
                    },
                    "client[address]": {
                        required:true,
                        one_option: true,
                        valid_address: true
                    },
                    "client[zip]": {
                        required:true,
                        one_option: true
                    },
                    "client[sex]": {
                        required:   true,
                        one_option: true
                    },
                    "client[sex_uploaded]": {
                        required:true
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).parents(".form-group"));
                }
            })

            $(".file-box").on("change", function(e){
                var file = e.target.files[0]
                var _this = this
                if(file.type == "application/pdf"){
                    var fileReader = new FileReader();
                    fileReader.onload = function() {
                        var pdfData = new Uint8Array(this.result);
                        var loadingTask = pdfjsLib.getDocument({data: pdfData});
                        loadingTask.promise.then(function(pdf) {
                            // Fetch the first page
                            var pageNumber = 1;
                            pdf.getPage(pageNumber).then(function(page) {
                                var scale = 1.5;
                                var viewport = page.getViewport({scale: scale});

                                // Prepare canvas using PDF page dimensions
                                var canvas = $("#pdfViewer")[0];
                                var context = canvas.getContext('2d');
                                canvas.height = viewport.height;
                                canvas.width = viewport.width;
                                // Render PDF page into canvas context
                                var renderContext = {
                                    canvasContext: context,
                                    viewport: viewport
                                };
                                var renderTask = page.render(renderContext);
                                renderTask.promise.then(function () {
                                    // console.log(canvas.toDataURL("image/png", 0.8))
                                    $(_this).css('background-image', 'url("'+ $('#pdfViewer').get(0).toDataURL("image/jpeg", 0.8) +'")');
                                    $(_this).css('background-size', '200px');

                                });
                            });
                        }, function (reason) {
                            console.error(reason);
                        });
                    };
                    fileReader.readAsArrayBuffer(file);
                }
            });

            $("#driver_license").change(function(e) {
                $(this).removeClass('driver_license')

                $(this).removeClass('driver_dropp')
                var file = e.target.files[0]
                if(file.type == "application/pdf"){
                    $(this).addClass('driver_dropp')
                    // $(".driver_dropp").css('background-image', 'url("/images/pdf_icon.png")');
                }else{
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $(".driver_dropp").css('background-image','url('+ event.target.result +')');
                    }
                    reader.readAsDataURL(file);
                }

                $(this).removeClass('driver_license');
                $(this).addClass('driver_dropp');
            });

            $("#social_security").change(function(e) {
                $(this).removeClass('social_dropp')
                var file = e.target.files[0]

                if(file.type == "application/pdf"){
                    $(this).addClass('social_dropp')
                }else{
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $(".social_dropp").css('background-image','url('+ event.target.result +')');
                    }
                    reader.readAsDataURL(file);
                }
                $(this).removeClass('social_security')
                $(this).addClass('social_dropp')
            });

            $('.driver_license').bind('dragover', function(){
                console.log('xxx')
                $(this).addClass('drag-over');
            });
            $('.driver_license').bind('dragleave', function(){
                $(this).removeClass('drag-over');
            });
            $('.social_security').bind('dragover', function(){
                $(this).addClass('drag-over');
            });
            $('.social_security').bind('dragleave', function(){
                $(this).removeClass('drag-over');
            });



            $("#bank_logo").val(null)

            $(".closeUpload").click(function (e) {
                e.preventDefault();

                var  hideShow = $(".updateLogo").attr("class")
                if(hideShow.search("hide") != -1){
                    $(".updateLogo").removeClass("hide")
                }else{
                    $(".updateLogo").addClass("hide")
                }
                // $(".changeLogo").addClass("hide")

            });

            // $(".driver").click(function (e) {
            //     e.preventDefault();
            //
            //     var  hideShow = $(".updateLogo").attr("class")
            //     if(hideShow.search("hide") != -1){
            //         $(".updateLogo").removeClass("hide")
            //     }else{
            //         $(".updateLogo").addClass("hide")
            //     }
            // });

            $(document).on("click",function() {

                var  scaleSS = $(".zoomSS").attr("class")
                var  scaleDL = $(".zoomDL").attr("class")
                var full_name = $(".full_name").attr("class")
                var ssn = $(".ss_number").attr("class")

                if(scaleSS.search("scaleSS") != -1 && ssn.search("hide") != -1) {
                    $(".zoomSS").removeClass("scaleSS")
                    $(".zoomSS").addClass("hide")
                    $(".ss_number").removeClass("hide")

                }
                if(scaleDL.search("scaleDL") != -1 && full_name.search("hide") != -1){
                    $(".zoomDL").removeClass("scaleDL")
                    $(".zoomDL").addClass("hide")
                    $(".full_name").removeClass("hide")
                }

           });

            $(".dl-field").mouseover(function(){
                $(".zoomDL").removeClass("hide");
                $(".full_name").addClass("hide")

            });
            $(".dl-field").mouseout(function(){
                var  scaleDL = $(".zoomDL").attr("class")
                if(scaleDL.search("scaleDL") == -1) {
                    $(".zoomDL").addClass("hide")
                    $(".full_name").removeClass("hide")
                }
            });

            $(".ssn-field").mouseover(function(){
                $(".zoomSS").removeClass("hide");
                $(".ss_number").addClass("hide")

            });
            $(document).on('mouseout',".ssn-field", function(){
                if(!$(".zoomSS").hasClass("scaleSS")) {
                    $(".zoomSS").addClass("hide")
                    $(".ss_number").removeClass("hide")
                }
            });

            $( ".zoomSS" ).dblclick(function() {
                var  scale = $(".zoomSS").attr("class")
                if(scale.search("scaleSS") == -1){
                    $(".zoomSS").addClass("scaleSS")
                }
            });

            $( ".zoomDL" ).dblclick(function() {
                var  scale = $(".zoomDL").attr("class")
                if(scale.search("scaleDL") == -1){
                    $(".zoomDL").addClass("scaleDL")
                }
            });

        })

        </script>

    <script type="text/javascript">
        var per1 = $(".progress.p1").attr("data-1");
        var per2 = $(".progress.p1").attr("data-2");
        $(".p1 .number h2").text(per1);
        var val1 = 440 - (440 * per1) / 100;

        var val2 = (440 * per2) / 100;
        var val3 = val1-val2
        console.log(val1, val2, per2)

        $(".p1 svg circle:nth-child(2)").animate({"stroke-dashoffset": val3}, 1000);
        $(".p1 svg circle:nth-child(3)").animate({"stroke-dashoffset": val1}, 1000);
    </script>

    <script type="text/javascript">

        var statusDispute =  JSON.parse('<?php echo $statusDispute; ?>');
        console.log( statusDispute, statusDispute['active'])
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Dispute progress'],
                ['Success',    statusDispute['complete']],
                ['Failed',      statusDispute['pending']],
                ['In Progress',  statusDispute['active']],
                ['Added',  statusDispute['added']],
                ['No data entity',  statusDispute['non_data']],
            ]);

            var options = {
                is3D: true,
                colors: ['#89caf4','#4678b7', '#363676', '#275ca8', '#77c1ce','#0091ca'],
                chartArea:{left:0,top:0,width:"100%",height:"100%"}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

{{-- 
       <script type="text/javascript">
            /*global $, console*/

            $(function () {

                'use strict';

                (function () {

                    var aside = $('.side-nav'),

                        showAsideBtn = $('.show-side-btn'),

                        contents = $('#contents');

                    showAsideBtn.on("click", function () {

                        $("#" + $(this).data('show')).toggleClass('show-side-nav');

                        contents.toggleClass('margin');

                    });

                    if ($(window).width() <= 767) {

                        aside.addClass('show-side-nav');

                    }
                    $(window).on('resize', function () {

                        if ($(window).width() > 767) {

                            aside.removeClass('show-side-nav');

                        }

                    });

                    // dropdown menu in the side nav
                    var slideNavDropdown = $('.side-nav-dropdown');

                    $('.side-nav .categories li').on('click', function () {

                        $(this).toggleClass('opend').siblings().removeClass('opend');

                        if ($(this).hasClass('opend')) {

                            $(this).find('.side-nav-dropdown').slideToggle('fast');

                            $(this).siblings().find('.side-nav-dropdown').slideUp('fast');

                        } else {

                            $(this).find('.side-nav-dropdown').slideUp('fast');

                        }

                    });

                    $('.side-nav .close-aside').on('click', function () {

                        $('#' + $(this).data('close')).addClass('show-side-nav');

                        contents.removeClass('margin');

                    });

                }());


            });
        </script> --}}
