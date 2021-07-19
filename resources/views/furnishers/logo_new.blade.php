@extends('owner.layouts.app')
@section('title')
<title> Furnishers </title>
@endsection
@section('body')

  <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Furnishers</li>
            </ol>
          </nav>
    </div>
    <div class="">
      <a class="btn btn-primary pull-left" href="{{ route('admins.bank.create')}}" role="button">
          ADD FURNISHERs / CRAs
      </a>
    </div>
  </div>

  <div class="container">
    <div class="row row-sm">
      <div class="col-md-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Furnishers
            </div>
            <p class="mg-b-20">See list of furnishers here ...</p>

                  @include('furnishers.search')


                  <section class="ms-user-account">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-3 col-sm-12"></div>
                              <div class="col-md-12 col-sm-12">

                                  <div class="row m-2">

                                  </div>
                                  <div class="container">
                                      <?php $alphas = range('A', 'Z');?>
                                      <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                          <li class="page-item {{empty(request()->character) ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type])}}">ALL</a></li>
                                          <li class="page-item {{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                                          @foreach($alphas as $alpha)
                                          <li class="page-item {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a class="page-link" href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                                          @endforeach
                                        </ul>
                                      </nav>

                                      {{-- <ul class="pagination alphabetical ">
                                          <li class="{{empty(request()->character) ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type])}}">ALL</a></li>
                                          <li class="{{!empty(request()->character) && request()->character == '#' ? "active":""}}"><a href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' => "#"])}}">#</a></li>
                                          @foreach($alphas as $alpha)
                                              <li class=" {{!empty(request()->character) && request()->character == strtolower($alpha) ? "active":""}}"><a  href="{{ route('admins.bank.show', ['type'=> request()->type, 'character' =>  strtolower($alpha)])}}">{{$alpha}}</a></li>
                                          @endforeach
                                      </ul> --}}
                                      {{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination2')}}

                                  </div>


                                  <div class="album py-5">
                                      <div class="container">
                                          <div class="row">
                                              @foreach($banksLogos as  $logos)
                                                  <div class="col-md-3" title="{{strtoupper($logos->name)}}">
                                                      <div class="card mb-4 pt-5" >
                                                          <?php /** Checking logo in Aws S3 storage */?>
                                                          @if($logos->checkUrlAttribute())
                                                              <?php /** Get AWS S3 file link with  getUrlAttribute function */?>
                                                              <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{$logos->getUrlAttribute()}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                          @else
                                                              <?php /** if Furnisher doesn't have logo in AWS S3 storage use default or in case of Furnisher should not has a logo use default no logo icon*/?>
                                                              @if($logos->no_logo)
                                                                  <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/no_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                              @else
                                                                  <a href="{{route("admins.bank.edit", $logos->id)}}"><img class="card-img-top banks-card" src="{{asset('images/default_bank_logos.png')}}"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" alt="Card image cap"></a>
                                                              @endif
                                                          @endif

                                                          <div class="card-body">
                                                              <div class="card-text mt-5">
                                                                  <div class="bank-name b"  onclick="location.href='{{route("admins.bank.edit", $logos->id)}}'" > {{strtoupper($logos->name)}}</div>

                                                                  <a href="{{ route('furnishers.bank.delete',$logos->id) }}"><div class="delete2 text-right" data-toggle="popover" onclick="return confirm('Are You Sure?')" data-placement="top" data-id="{{ $logos->id}}" >
                                                                      <span> <i class="fa fa-trash"></i> </span>
                                                                  </div></a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div class="container">
                                    <div class="row mr-2 mb-5">
                                      <div class="col-md-12 pull-right p-0">
                                        {{ $banksLogos->appends(request()->except('page'))->links('helpers.pagination')}}
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>


          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('js')
  <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
  <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
  <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>
  <script src="{{ asset('js/site/admin/banks.js?v=2') }}" ></script>
  <script type="text/javascript">

      $(document).ready(function () {

          var url = $(location).attr('search');
          if(url.search("pending")== 6){
              $('.tab-selector').removeClass("active");
              $(".pending" ).addClass("active");
          }else if (url.search("completed")== 6){
              $('.tab-selector').removeClass("active");
              $(".completed" ).addClass("active");
          };

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          var calendar = $('#calendar').fullCalendar({
              editable: true,
              events: "message",
              disableDragging: true,
              displayEventTime: true,
              editable: true,
              events: {
                  url: window.location.href
              },
              eventRender: function (event, element, view) {
                  element.text(event.title);
              },
              selectable: true,
              selectHelper: true,
              select: function (start, end, allDay) {
                  start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
                  end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
                  console.log(new Date(start_date).getTime()+86400001,     new Date(end_date).getTime())
                  if(new Date(start_date).getTime()+86400001 < new Date(end_date).getTime()){
                      alert("can't add message in the past");
                      calendar.fullCalendar( 'unselect' );
                      return false;
                  }
                  $('#appointments').modal('show');
                  $("#start_date").val(start_date );

                  calendar.fullCalendar('unselect');
              },
              eventClick: function (event) {
                  $.ajax({
                      type: 'GET',
                      url: "/admin/message/"+ event.id,
                      success: function (results) {

                          $("#appointmentDetailsModalLabel").text(results.message.title);
                          $("#appointment-full_name").text(results.message.name);
                          $("#appointment-phone").text(results.message.phone_number);
                          $("#appointment-email").text(results.message.email);

                          $("#appointment-title").text(results.message.title);
                          $("#appointment-description").text(results.message.description);

                          $("#appointment-date").text(results.message.call_date);

                          button ='';

                          if(results.message.completed == 0){

                              button += '<button class="btn btn-success" id="message-completed" data-target =';
                              button +=   results.message.id+'><span class="fa fa-check"></span></button>'

                          }
                          $("#buttonCompleted").html(button);

                          html='<div class="form-group row">';
                          html += '<div><h5>Notes</h5></div>' +
                              '<ul class="list-group w-100">';

                          for( let val in results.note){
                              console.log(results.note[val])
                              html +='<li class="list-group-item"><span class="text-primary">'+ results.note[val]['created_at'] +
                                  '</span> '+ results.note[val]['notes']+'</li>'

                          }
                          html+= '</ul>'
                          $("#noteId").html(html);
                          $("#messageId").val(results.message.id);

                          $(".edit-appointment").attr("data-id", results.message.id);

                          $(".remove-appointment").attr("data-id",  results.message.id);

                          $('#appointmentDetails').modal('show');
                      },
                      error:function (err, state) {
                          console.log(err)
                      }
                  })
              }

          });

          $('#buttonCompleted').click(function(){
              var  id = $("#message-completed").attr("data-target")

              var token = "<?= csrf_token()?>";
              console.log(id);
              $.ajax({
                  url: "message/completed",
                  method:"POST",
                  data:{id:id, _token: token},
                  success: function () {
                      console.log("it Works");
                      location.reload()
                  },

                  error:function (err,state) {
                      console.log(err)
                  }
              });


          });

          $('.edit-appointment').click(function(){
              var id = $(this).attr("data-id");

              $.ajax({
                  type: 'GET',
                  url: "/admin/message/"+ id,
                  success: function (results) {
                      var date = results.message.call_date.split(" ");
                      console.log(date);

                      $("#appointmentDetails").modal("hide");

                      $("#oldAdminId").val(results.message.user_id);
                      $("#oldFullNameId").val(results.message.name);
                      $("#oldPhoneNumberId").val(results.message.phone_number);
                      $("#oldEmailId").val(results.message.email);
                      $("#oldDateId").val( date[0]);
                      $("#oldTimeId").val(date[1]);
                      $("#oldTitleId").val(results.message.title);
                      $("#editMessageId").val(results.message.id);
                      $("#oldDescriptionId").val(results.message.description);

                      $('#updateMessage').modal('show');
                      console.log(results.message.call_date);
                  },
                  error:function (err, state) {
                      console.log(err)
                  }
              })

          })

          $("#updateMessage form").submit(function(e){
              e.preventDefault();
              var form = $(this).serializeArray(), data={};
              $.each(form, function(index, el){
                  data[el.name] = el.value
              });

              $.ajax({
                  url:  "/admin/message/update",
                  type:"PUT",
                  data: data,
                  success: function (results) {

                      var date = results.call_date.split(" ");
                      calendar.fullCalendar('renderEvent',
                          {

                              id: results['id'],
                              title: results['title'],
                              start: date[0],
                              end: date[0],
                              allDay: true
                          },
                          'stick'
                      );
                      $("#updateMessage form")[0].reset()
                      $('#updateMessage').modal('hide');
                  },

                  error:function (err, state) {
                      console.log(JSON.parse(err.responseText))
                      $("#updateMessage .text-danger").removeClass("d-none")
                  }
              });


          })

          $("#appointments form").submit(function(e){
              e.preventDefault();
              var form = $(this).serializeArray(), data={};
              $.each(form, function(index, el){
                  data[el.name] = el.value
              });

              $.ajax({
                  url: "/admin/message/create",
                  type:"POST",
                  data: data,
                  success: function (results) {
                      var date = results.call_date.split(" ");
                      calendar.fullCalendar('renderEvent',
                          {
                              id: results['id'],
                              title: results['title'],
                              start: date[0],
                              end: date[0],
                              allDay: true
                          },
                          'stick'
                      );
                      $("#appointments form")[0].reset()
                      $('#appointments').modal('hide');
                  },

                  error:function (err, state) {
                      console.log(JSON.parse(err.responseText))
                      $("#appointments .text-danger").removeClass("d-none")
                  }
              });



          })

          $('.remove-appointment').click(function(){
              var id = $(this).attr("data-id");
              $("#appointmentDetails").modal("hide");
              bootbox.confirm("Do you really want to delete record?", function (result) {
                  if (result) {
                      $.ajax(
                          {
                              url: "/admin/message/" + id,
                              type: 'DELETE',
                              data:{
                                  " _token": $("meta[name='csrf-token']").attr("content")
                              },
                              success: function () {
                                  calendar.fullCalendar('removeEvents', id);
                                  displayMessage("Deleted Successfully");
                              }
                          });
                  }
              })
          })

          $('#phoneNumberId').keyup(function() {

              var val = this.value.replace(/\D/g, '');
              var newVal = '';
              if(val.length > 4) {
                  this.value = val;
              }

              if((val.length > 3) && (val.length <7)) {
                  newVal += val.substr(0, 3) + '-';
                  val = val.substr(3);
              }
              if (val.length > 6) {
                  newVal += val.substr(0, 3) + '-';
                  newVal += val.substr(3, 3) + '-';
                  val = val.substr(6);
              }
              newVal += val;
              this.value = newVal.substring(0, 12);

              if(newVal.length == 12){
                  var token = "<?= csrf_token()?>";
                  $.ajax({
                      url: "message/user/data",
                      method:"POST",
                      data:{phone_number:newVal, _token: token},
                      success: function (result) {
                          if(result!=''){

                              $('#fullNameId').val(result.full_name);
                              $('#emailId').val(result.email);
                          }
                      },

                      error:function (err,state) {
                          console.log(err)
                      }
                  });
              }

          });


      });

      $('#oldPhoneNumberId').keyup(function() {

          var val = this.value.replace(/\D/g, '');
          var newVal = '';
          if(val.length > 4) {
              this.value = val;
          }

          if((val.length > 3) && (val.length <7)) {
              newVal += val.substr(0, 3) + '-';
              val = val.substr(3);
          }
          if (val.length > 6) {
              newVal += val.substr(0, 3) + '-';
              newVal += val.substr(3, 3) + '-';
              val = val.substr(6);
          }
          newVal += val;
          this.value = newVal.substring(0, 12);
      });


      function displayMessage(message) {
          $(".response").html("<div class='success'>"+message+"</div>");
          setInterval(function() { $(".success").fadeOut(); }, 1000);
      }



  </script>



      <script type="text/html" id="confirmation">
          <div>
              <button class="cancel btn btn-secondary ">cancel</button>
              <button class="delete-bank btn btn-danger" data-id="{bank_id}">yes</button>
          </div>
      </script>

      <script>
      $(document).ready(function () {
              $(".go-to").click(function () {
                  var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
                  let url = new URL(window.location.href);
                  let params = new URLSearchParams(url.search.slice(1));

                  params.append('page', page);
                  url.search = params
                  location.href = url.toString()
              })

              $('.go-to-page').keypress(function (e) {
                  var key = e.which;
                  if(key == 13){
                      var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
                      let url = new URL(window.location.href);
                      let params = new URLSearchParams(url.search.slice(1));
                      params.append('page', page);
                      url.search = params
                      location.href = url.toString()
                  }
              });


              $('[data-toggle="popover"]').popover({
                  html:true,
                  title: "ARE YOU SURE?",
                  content: function() {
                      var $this = $(this);
                      return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'))
                  }
              }).click(function (e) {
                  $('[data-toggle=popover]').not(this).popover('hide');
              });

              $(document).click(function (e) {
                  if ($('[data-toggle=popover]').has(e.target).length == 0 && (($('.popover').has(e.target).length == 0) || $(e.target).is('.cancel'))) {
                      $('[data-toggle=popover]').popover('hide');
                  }
              });

              $(document).on('click',".delete-bank", function (e) {
                  var id = $(this).attr('data-id'),
                  token = $("meta[name='csrf-token']").attr("content");
                  $.ajax({
                      url: "/admins/furnishers/logo/" + id,
                      type: 'DELETE',
                      data: {
                          "id": id,
                          "_token": token,
                      },
                      success: function () {
                          location.reload();
                      }
                  });
              })
              $(".selectize-type").selectize({plugins: ['remove_button']});
              // $('.selectize-multiple').selectize({ placeholder: "FILTER BY TYPE" });

              // var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });
          });

      </script>



      <script>
          $(document).ready(function($) {

              $('.selectize-single').selectize({
                  selectOnTab: true,
              });
              $(document).on('change', '#bank-type' ,function() {
                  var bankType = $('#bank-type').val();
                  console.log(bankType)
                  if(bankType.includes("2") || bankType.includes("55")){
                      $('.state-filter').removeClass('hide');
                  }else{
                      $('.state-filter').addClass('hide');

                  }
              })

              if ($( ".autocomplete-search" ).length >0 ){

                  $( ".autocomplete-search" ).autocomplete({
                      source: function( request, response ) {
                          $.ajax({
                              url: '/admins/furnishers/parent-bank',
                              dataType: "json",
                              data: {
                                  search_key: request.term
                              },
                              success: function( data ) {
                                  response( data );
                              }
                          });
                      },
                      select: function( event, ui ) {
                          ui.item.value = ui.item.name
                      }
                  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                      return $( "<li>" )
                          .attr( "data-value", item.name )
                          .append( item.name )
                          .appendTo( ul );
                  };
              }
          });
          // In your Javascript (external .js resource or <script> tag)

      </script>

@endsection
