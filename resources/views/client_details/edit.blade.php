@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Client Profile') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/client/details') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Client Profile') }}</li>
      </ol>
    </nav>
  </div>
</div>

<div class="main-content-container container-fluid px-4 mt-5">
  <div class="alert alert-success alert-dismissible fade show mb-0 mb-3 text-center text-white" role="alert" style="background-color: #17c671 !important;">
    <span class="close pointer" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" style="color: red;">×</span>
    </span>
    {{-- @if(!$client->credentials->is_present()) --}}
    <span>
      {{ zactra::translate_lang('Please provide us your credentials, so we can fetch your report. You can provide them') }}
      <a href="{{route("client.credentials")}}" class="" style="font-size:16px;">{{ zactra::translate_lang('here') }}</a>
    </span>
    {{-- @elseif(!$client->reports->first())
    <span>We are trying to fetch your report data. As it can take some time, we'll notify you once it is done.</span>
    @else
    <span>
      We've already got your report data, you can start disputes
      <a href="#" class="" style="font-size: 16px;"> here</a>
    </span>
    @endif --}}
  </div>

  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-4">
      <div class="card card-small mb-4 pt-3">
        <div class="card-header border-bottom text-center">
          <div class="main-profile-overview">
            <div class="main-img-user profile-user"><img alt="" src="https://mpng.subpng.com/20180411/rzw/kisspng-user-profile-computer-icons-user-interface-mystique-5aceb0245aa097.2885333015234949483712.jpg"><a href="JavaScript:void(0);" class="fas fa-camera profile-edit"></a></div>
          </div>
          <h4 class="mb-0">{{ $client->full_name() }}</h4>
          <span class="text-muted d-block mb-2">{{ zactra::translate_lang('Client') }}</span>
        </div>
        <div class="">
          <table class="table">
            <tr>
              <td class="pborder-none"><strong class="text-muted mb-2">{{ zactra::translate_lang('Email :') }}</strong></td>
              <td class="pborder-none">{{ $client->email }}</td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mb-2">{{ zactra::translate_lang('Address :') }}</strong></td>
              <td class="pborder-none">{{$client->clientDetails->number}} {{$client->clientDetails->name}} {{$client->clientDetails->city}}, {{$client->clientDetails->state}} {{$client->clientDetails->zip}}</td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mt-2">{{ zactra::translate_lang('Date of Birth :') }}</strong></td>
              <td class="pborder-none">{{date("m/d/Y", strtotime($client->clientDetails->dob))}}</td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mt-2">{{ zactra::translate_lang('Age :') }}</strong></td>
              <td class="pborder-none">{{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}</td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mt-2">{{ zactra::translate_lang('Social Security Number :') }}</strong></td>
              <td class="pborder-none">{{$client->clientDetails->ssn}}</td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mt-2">{{ zactra::translate_lang('Gender :') }}</strong></td>
              <td class="pborder-none">
                @if($client->clientDetails->sex == 'M')
                  {{ zactra::translate_lang('Male') }}
                @elseif($client->clientDetails->sex == 'F')
                  {{ zactra::translate_lang('Female') }}
                @else
                  {{ zactra::translate_lang('Non-binary') }}
                @endif
              </td>
            </tr>
            <tr>
              <td class="pborder-none"><strong class="text-muted mt-2">{{ zactra::translate_lang('Referred By :') }}</strong></td>
              <td class="pborder-none"> {{strtoupper($client->clientDetails->referred_by)}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">{{ zactra::translate_lang('Please Review Your Personal Data And Make Changes If Necessary') }}</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm', 'class' => 'm-form m-form--label-align-right']) !!}
                @method('PUT')
                @csrf
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control form-group m-input', 'placeholder' => 'Full Name']) }}
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::text('client[phone_number]', $client->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'Phone Number']) }}
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::date('client[dob]', $client->clientDetails->dob, ['class' => 'form-control form-group m-input', 'placeholder'=>'Date of Birth']) }}
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::text('client[ssn]', $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'placeholder' => 'Social Security Number']) }}
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::text('client[address]', strtoupper($client->clientDetails->address), ['class' => 'form-control form-group m-input', 'id'=>'address', 'placeholder' => 'Current Street Address']) }}
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                      {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'], $client->clientDetails->sex, ['class'=>'col-md-12 form-control']) }}
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-primary pull-right" style="float: right;" name="" value="{{ zactra::translate_lang('Update') }}" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">{{ zactra::translate_lang('Upload Documents') }}</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                {!! Form::open(['route'=>['client.updateDriver'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => ' m-form m-form--label-align-right', "id" => "doc_sunb"]) !!} @method("PUT") @csrf
                <div class="col-sm-12 form-group files mt-3">
                  {{-- <input class="bank_logo file-box" type="file" name="driver" id="bank_logo" />--}}
                  <input class="driver_license file-box" class="custom-file-input" id="inputGroupFile01" type="file" name="driver" id="driver_license" />
                  <label class="custom-file-label" for="inputGroupFile01">{{ zactra::translate_lang('Choose Driver License') }}</label>
                </div>
                <div class="col-sm-12 form-group files mt-4">
                  <input class="social_security file-box" class="custom-file-input" id="inputGroupFile02" type="file" name="social" id="social_security" />
                  <label class="custom-file-label" for="inputGroupFile02">{{ zactra::translate_lang('Choose Social Security') }} </label>
                </div>
                <div class="col-sm-12 pr-0 mt-3 mt-4">
                  <input type="submit" value="Upload" class="btn btn-primary ms-ua-submit pull-right" style="float: right;" />
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Default Light Table -->
</div>
@endsection
@section('js')
<script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}"></script>
<script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
<script src="{{ asset('js/lib/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/lib/gstatic.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#doc_sunb").validate({
      rules: {
        social: {
          required: "#driver_license:blank",
        },
        driver: {
          required: "#social_security:blank",
        },
      },
      errorPlacement: function (error, element) {
        error.insertAfter($(element));
      },
    });
  });
</script>
<script>
  $(document).ready(function () {
    autocomplete = new google.maps.places.Autocomplete($("#address")[0], {
      types: ["address"],
      componentRestrictions: { country: "us" },
    });
    google.maps.event.addListener(autocomplete, "place_changed", function () {
      var place = autocomplete.getPlace();
      $("#address").val(place.formatted_address);
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
  $(document).ready(function () {
    $(".ssn").mask("999-99-9999");
    $("#phone_number").mask("(000) 000-0000");

    $.validator.addMethod(
      "one_option",
      function (value, element) {
        if (element.name.indexOf("sex") != -1) {
          return $(".sex_options").length < 2;
        }
        return $("[name='" + element.name + "']").length < 2;
      },
      "Please choose one of the options"
    );

    $.validator.addMethod(
      "valid_ssn",
      function (value, element) {
        console.log(value, element);
        return !!value.match(/[0-9]{3}-[0-9]{2}-[0-9]{4}/g);
      },
      "Not valid ssn format."
    );

    $.validator.addMethod(
      "valid_address",
      function (value, element) {
        // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
        return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
      },
      "Not valid address format."
    );

    $("#clientDetailsForm").validate({
      rules: {
        "client[full_name]": {
          required: true,
          one_option: true,
        },
        "client[dob]": {
          required: true,
          one_option: true,
        },
        "client[ssn]": {
          required: true,
          valid_ssn: true,
        },
        "client[address]": {
          required: true,
          one_option: true,
          valid_address: true,
        },
        "client[zip]": {
          required: true,
          one_option: true,
        },
        "client[sex]": {
          required: true,
          one_option: true,
        },
        "client[sex_uploaded]": {
          required: true,
        },
      },
      errorPlacement: function (error, element) {
        error.insertAfter($(element).parents(".form-group"));
      },
    });

    $(".file-box").on("change", function (e) {
      var file = e.target.files[0];
      var _this = this;
      if (file.type == "application/pdf") {
        var fileReader = new FileReader();
        fileReader.onload = function () {
          var pdfData = new Uint8Array(this.result);
          var loadingTask = pdfjsLib.getDocument({ data: pdfData });
          loadingTask.promise.then(
            function (pdf) {
              // Fetch the first page
              var pageNumber = 1;
              pdf.getPage(pageNumber).then(function (page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });

                // Prepare canvas using PDF page dimensions
                var canvas = $("#pdfViewer")[0];
                var context = canvas.getContext("2d");
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                // Render PDF page into canvas context
                var renderContext = {
                  canvasContext: context,
                  viewport: viewport,
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                  // console.log(canvas.toDataURL("image/png", 0.8))
                  $(_this).css("background-image", 'url("' + $("#pdfViewer").get(0).toDataURL("image/jpeg", 0.8) + '")');
                  $(_this).css("background-size", "200px");
                });
              });
            },
            function (reason) {
              console.error(reason);
            }
          );
        };
        fileReader.readAsArrayBuffer(file);
      }
    });

    $("#driver_license").change(function (e) {
      $(this).removeClass("driver_license");

      $(this).removeClass("driver_dropp");
      var file = e.target.files[0];
      if (file.type == "application/pdf") {
        $(this).addClass("driver_dropp");
        // $(".driver_dropp").css('background-image', 'url("/images/pdf_icon.png")');
      } else {
        var reader = new FileReader();

        reader.onload = function (event) {
          $(".driver_dropp").css("background-image", "url(" + event.target.result + ")");
        };
        reader.readAsDataURL(file);
      }

      $(this).removeClass("driver_license");
      $(this).addClass("driver_dropp");
    });

    $("#social_security").change(function (e) {
      $(this).removeClass("social_dropp");
      var file = e.target.files[0];

      if (file.type == "application/pdf") {
        $(this).addClass("social_dropp");
      } else {
        var reader = new FileReader();

        reader.onload = function (event) {
          $(".social_dropp").css("background-image", "url(" + event.target.result + ")");
        };
        reader.readAsDataURL(file);
      }
      $(this).removeClass("social_security");
      $(this).addClass("social_dropp");
    });

    $(".driver_license").bind("dragover", function () {
      console.log("xxx");
      $(this).addClass("drag-over");
    });
    $(".driver_license").bind("dragleave", function () {
      $(this).removeClass("drag-over");
    });
    $(".social_security").bind("dragover", function () {
      $(this).addClass("drag-over");
    });
    $(".social_security").bind("dragleave", function () {
      $(this).removeClass("drag-over");
    });

    $("#bank_logo").val(null);

    $(".closeUpload").click(function (e) {
      e.preventDefault();

      var hideShow = $(".updateLogo").attr("class");
      if (hideShow.search("hide") != -1) {
        $(".updateLogo").removeClass("hide");
      } else {
        $(".updateLogo").addClass("hide");
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
    $(document).ready(function(){
    // $(document).on("click", function () {
      var scaleSS = $(".zoomSS").attr("class");
      var scaleDL = $(".zoomDL").attr("class");
      var full_name = $(".full_name").attr("class");
      var ssn = $(".ss_number").attr("class");

      if (scaleSS.search("scaleSS") != -1 && ssn.search("hide") != -1) {
        $(".zoomSS").removeClass("scaleSS");
        $(".zoomSS").addClass("hide");
        $(".ss_number").removeClass("hide");
      }
      if (scaleDL.search("scaleDL") != -1 && full_name.search("hide") != -1) {
        $(".zoomDL").removeClass("scaleDL");
        $(".zoomDL").addClass("hide");
        $(".full_name").removeClass("hide");
      }
    });


    $(document).on("click", function () {
      var scaleSS = $(".zoomSS").attr("class");
      var scaleDL = $(".zoomDL").attr("class");
      var full_name = $(".full_name").attr("class");
      var ssn = $(".ss_number").attr("class");

      if (scaleSS.search("scaleSS") != -1 && ssn.search("hide") != -1) {
        $(".zoomSS").removeClass("scaleSS");
        $(".zoomSS").addClass("hide");
        $(".ss_number").removeClass("hide");
      }
      if (scaleDL.search("scaleDL") != -1 && full_name.search("hide") != -1) {
        $(".zoomDL").removeClass("scaleDL");
        $(".zoomDL").addClass("hide");
        $(".full_name").removeClass("hide");
      }
    });

    // $(document).on("click", function () {
    //   var scaleSS = $(".zoomSS").attr("class");
    //   var scaleDL = $(".zoomDL").attr("class");
    //   var full_name = $(".full_name").attr("class");
    //   var ssn = $(".ss_number").attr("class");
    //
    //   if (scaleSS.search("scaleSS") != -1 && ssn.search("hide") != -1) {
    //     $(".zoomSS").removeClass("scaleSS");
    //     $(".zoomSS").addClass("hide");
    //     $(".ss_number").removeClass("hide");
    //   }
    //   if (scaleDL.search("scaleDL") != -1 && full_name.search("hide") != -1) {
    //     $(".zoomDL").removeClass("scaleDL");
    //     $(".zoomDL").addClass("hide");
    //     $(".full_name").removeClass("hide");
    //   }
    // });

    $(".dl-field").mouseover(function () {
      $(".zoomDL").removeClass("hide");
      $(".full_name").addClass("hide");
    });
    $(".dl-field").mouseout(function () {
      var scaleDL = $(".zoomDL").attr("class");
      if (scaleDL.search("scaleDL") == -1) {
        $(".zoomDL").addClass("hide");
        $(".full_name").removeClass("hide");
      }
    });

    $(".ssn-field").mouseover(function () {
      $(".zoomSS").removeClass("hide");
      $(".ss_number").addClass("hide");
    });
    $(document).on("mouseout", ".ssn-field", function () {
      if (!$(".zoomSS").hasClass("scaleSS")) {
        $(".zoomSS").addClass("hide");
        $(".ss_number").removeClass("hide");
      }
    });

    $(".zoomSS").dblclick(function () {
      var scale = $(".zoomSS").attr("class");
      if (scale.search("scaleSS") == -1) {
        $(".zoomSS").addClass("scaleSS");
      }
    });

    $(".zoomDL").dblclick(function () {
      var scale = $(".zoomDL").attr("class");
      if (scale.search("scaleDL") == -1) {
        $(".zoomDL").addClass("scaleDL");
      }
    });
  });
</script>

<script type="text/javascript">
  var per1 = $(".progress.p1").attr("data-1");
  var per2 = $(".progress.p1").attr("data-2");
  $(".p1 .number h2").text(per1);
  var val1 = 440 - (440 * per1) / 100;
  var val2 = (440 * per2) / 100;
  var val3 = val1 - val2;
  console.log(val1, val2, per2);

  $(".p1 svg circle:nth-child(2)").animate({ "stroke-dashoffset": val3 }, 1000);
  $(".p1 svg circle:nth-child(3)").animate({ "stroke-dashoffset": val1 }, 1000);
  </script>

  <script>
  $(document).ready(function () {
    autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ["address"], componentRestrictions: { country: "us" } });
    google.maps.event.addListener(autocomplete, "place_changed", function () {
      var place = autocomplete.getPlace();
      $("#address").val(place.formatted_address);
      for (var i = 0; i < place.address_components.length; i++) {
        for (var j = 0; j < place.address_components[i].types.length; j++) {
          if (place.address_components[i].types[j] == "postal_code") {
            $("#zip").val(place.address_components[i].long_name);
          }
        }
      }
    });

    $(".ssn").mask("999-99-9999");
    $("#phone_number").mask("(000) 000-0000");

    $(".cancel-changes").click(function () {
      location.reload();
    });

    $(".tab-selector i").click(function () {
      $parent = $(this).parents(".form-group");
      $parent.removeClass("has-error");
      $parent.next(".warning-message").remove();
      $(this).parents(".tab-selector").remove();
      $parent.children(".tab-selector").find(".col-md-1").remove();
    });

    $.validator.addMethod(
      "one_option",
      function (value, element) {
        if (element.name.indexOf("sex") != -1) {
          return $(".sex_options").length < 2;
        }
        return $("[name='" + element.name + "']").length < 2;
      },
      "Please choose one of the options"
    );

    $.validator.addMethod(
      "valid_address",
      function (value, element) {
        // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
        return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
      },
      "Not valid address format."
    );

    $("#clientDetailsForm").validate({
      rules: {
        "client[full_name]": {
          required: true,
          one_option: true,
        },
        "client[dob]": {
          required: true,
          one_option: true,
        },
        "client[ssn]": {
          required: true,
          one_option: true,
        },
        "client[address]": {
          required: true,
          one_option: true,
          valid_address: true,
        },
        "client[zip]": {
          required: true,
          one_option: true,
        },
        "client[sex]": {
          required: true,
          one_option: true,
        },
        "client[sex_uploaded]": {
          required: true,
        },
      },
      errorPlacement: function (error, element) {
        error.insertAfter($(element).parents(".form-control"));
      },
    });
  });
</script>

@endsection
