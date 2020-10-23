@extends('layouts.layout')

<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
<style>
    .scrollDiv {
        height: 270px;
        background-color: white;
        overflow-y: auto;

    }
</style>

@section('content')



    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])

    <div class="row">
        <div class="col-sm-3">
            <aside class="side-nav" id="show-side-navigation1">
                <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                <div class="heading">
{{--                    <img src="assets/images/trump.jpg" alt="">--}}
                    <div class="info">
                        <h5>Client No: 01</h5>
                        <h3><a href="#">{{$client->full_name()}}</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
                <ul class="categories">
                    <li title="PHONE NUMBER"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tell:{{$client->clientDetails->phone_number}}"> {{$client->clientDetails->phone_number}}</a></li>
                    <li title="EMAIL ADDRESS"><i class="fa fa-envelope fa-fw"></i><a href="mailto:{{$client->eamil}}"> {{$client->email}}</a>
                    </li>
                    <li title="FULL ADDRESS"><i class="fa fa-map fa-fw"></i> {{$client->clientDetails->address}}</li>
                    <li title="DATE OF BIRTH"><i class="fa fa-calendar fa-fw"></i> {{date("m/d/Y", strtotime($client->clientDetails->dob))}}    <img src="/images/age.jpg" width="25px"> {{date("Y")- date("Y",strtotime($client->clientDetails->dob))}}</li>
                    <li title="SOCIAL SECURITY NUMBER"><i class="fa fa-shield fa-fw"></i> {{$client->clientDetails->ssn}}</li>
                    @if($client->clientDetails->referred_by != null)
                    <li title="REFERRED BY"><i class="fa fa-user fa-fw"></i> {{$client->clientDetails->referred_by}}</li>
                    @endif
                    <li title="GENDER"><i class="fa fa-venus-mars fa-fw"></i>
                    @if($client->clientDetails->sex == 'M')
                        Male
                    @elseif($client->clientDetails->sex == 'F')
                        Female
                    @else
                        Non-Binary
                    @endif
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white"><i class="fa fa-pencil-square-o  fa-fw"></i> Edit Profile</a></li>
                </ul>
            </aside>
        </div>

        <div class="col-sm-9">
            <section id="contents">
                <div class="welcome">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <h2>Welcome to Dashboard</h2>
{{--                                    <p>Please provide us your credentials, so we can fetch your report. You can provide them here.</p>--}}
                                    <p>We are trying to fetch your report data. As it can take some time, we'll notify you once it is done.</p>
{{--                                    <p>We've already got your report data, you can start disputes here.</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="charts">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="chart-container scrollDiv">
                                    <div class="boxheading">
                                        <h3>DISPUTES </h3>
                                    </div>
                                    <div class="mt20 ">
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



                            <div class="col-md-6">
                                <div class="chart-container">
                                    <div class="boxheading">
                                        <h3>DISPUTE PROGRESS</h3>
                                    </div>
                                    <div class="row p20">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="progress green">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">10</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6  col-sm-6">
                                            <div class="progress yellow">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">5</div>
                                            </div>
                                        </div>

                                    </div>
                                    <h4 class=" text-center">Uploaded Documents VS Processed</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>


                <section class="charts">
                    <div class="container-fluid">
                        <div class="chart-container">
                            <div class="content">
                                <h2>CREDIT REPORTS</h2>

                                <div class="row">
                                    <div  class="col-md-4 mt20">
                                        <a href="{{route('client.report', ['client'=> $client->id, 'type'=>"equifax"])}}">  <img class="report_access"src="{{asset('images/report_access/eq_logo_1.png')}}"  width="120"></a>
                                    </div>
                                    <div  class="col-md-4 mt20">
                                        <a href="{{route('client.report', ['client'=> $client->id, 'type'=>"experian"])}}"> <img class="report_access"src="{{asset('images/report_access/ex_logo_1.png')}}"  width="120"></a>
                                    </div>
                                    <div  class="col-md-4 mt20">
                                        <a  href="{{route('client.report', ['client'=> $client->id, 'type'=>"experian"])}}">  <img class="report_access"src="{{asset('images/report_access/tu_logo_1.png')}}"  width="120"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="charts">

                        <div class="row mt50">

                            <div class="col-md-6">
                                <div class="chart-container">
                                    <div class="boxheading">
                                        <h3>BILLING </h3>
                                    </div>
                                    <div class="mt20">
                                        <h4>billing statements</h4>
                                        <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <div class="boxheading">
                                        <h3>EXCEED COMPANIES</h3>
                                    </div>
                                    <div class="mt20">
                                        <h4>EXCEED AUTO GROUP</h4>
                                        <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                                    </div>
                                    <div class="mt20">
                                        <h4>EXCEED AUTO GROUP</h4>
                                        <p>EXCEED CAPITAL LENDING</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                </section>


                <section class="charts pb50 mt50">
                    <div class="container-fluid">
                        <div class="row ">

                        </div>
                    </div>
                </section>

            </section>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['client.details.update', $client->id], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                    @method('PUT')
                    @csrf
                        <div class="form row">
                            <div class="form-group col-md-12">

                                {{ Form::text('client[full_name]', $client->full_name(), ['class' => 'form-control m-input', 'placeholder' => 'FULL NAME']) }}
                            </div>

                            <div class="form-group col-md-12">
                                {{ Form::text('client[phone_number]', $client->clientDetails->phone_number, ['class' => 'form-control m-input', 'placeholder' => 'PHONE NUMBER']) }}
                            </div>
                            <div class="form-group col-md-12">

                                {{ Form::text('client[address]', strtoupper($client->clientDetails->address), ['class' => 'form-control m-input', 'id'=>'address', 'placeholder' => 'CURRENT STREET ADDRESS']) }}
                            </div>

                            <div class="form-group col-md-12">

                                {{ Form::select('client[sex]', [''=>'GENDER','M'=>'Male', 'F'=>'Female', 'O'=>'Non Binary'],  $client->clientDetails->sex, ['class'=>'col-md-10  form-control']) }}
                            </div>

{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="gender">Gender</label>--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked">--}}
{{--                                    <label class="form-check-label" for="male">Male</label>--}}

{{--                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">--}}
{{--                                    <label class="form-check-label" for="female">Female</label>--}}
{{--                                </div>--}}

{{--                            </div>--}}

                        </div>

                        <button type="submit" value="Update" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSYolQg54i3oiTNu7T3pA2plmtS6Pshwg&libraries=places">

    </script>

    <script>
        $(document).ready(function(){

            autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
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



            $(".ssn").mask("999-99-9999");
            $('#phone_number').mask('(000) 000-0000');

        </script>




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

            // Start chart

            var chart = document.getElementById('myChart');
            Chart.defaults.global.animation.duration = 2000; // Animation duration
            Chart.defaults.global.title.display = false; // Remove title
            Chart.defaults.global.title.text = "Chart"; // Title
            Chart.defaults.global.title.position = 'bottom'; // Title position
            Chart.defaults.global.defaultFontColor = '#999'; // Font color
            Chart.defaults.global.defaultFontSize = 10; // Font size for every label

            // Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
            Chart.defaults.global.tooltips.borderColor = 'white'; // Tooltips border color
            Chart.defaults.global.legend.labels.padding = 0;
            Chart.defaults.scale.ticks.beginAtZero = true;
            Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255, 255, 255, 0.1)';
            Chart.defaults.scale.gridLines.color = 'rgba(255, 255, 255, 0.02)';

            Chart.defaults.global.legend.display = false;

            var myChart = new Chart(chart, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", 'Jul'],
                    datasets: [{
                        label: "Lost",
                        fill: false,
                        lineTension: 0,
                        data: [45, 25, 40, 20, 45, 20],
                        pointBorderColor: "#4bc0c0",
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        showLine: true,
                    }, {
                        label: "Succes",
                        fill: false,
                        lineTension: 0,
                        startAngle: 2,
                        data: [20, 40, 20, 45, 25, 60],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ff6384",
                        borderColor: '#ff6384',
                        borderWidth: 2,
                        showLine: true,
                    }]
                },
            });
            //  Chart ( 2 )


            var Chart2 = document.getElementById('myChart2').getContext('2d');
            var chart = new Chart(Chart2, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", 'test', 'test', 'test', 'test'],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 79, 116)',
                        borderWidth: 2,
                        pointBorderColor: false,
                        data: [5, 10, 5, 8, 20, 30, 20, 10],
                        fill: false,
                        lineTension: .4,
                    }, {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [20, 14, 20, 25, 10, 15, 25, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#4bc0c0",
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        showLine: true,
                    }, {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [40, 20, 5, 10, 30, 15, 15, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ffcd56",
                        borderColor: '#ffcd56',
                        borderWidth: 2,
                        showLine: true,
                    }]
                },

                // Configuration options
                options: {
                    title: {
                        display: false
                    }
                }
            });


            console.log(Chart.defaults.global);

            var chart = document.getElementById('chart3');
            var myChart = new Chart(chart, {
                type: 'line',
                data: {
                    labels: ["One", "Two", "Three", "Four", "Five", 'Six', "Seven", "Eight"],
                    datasets: [{
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointBorderColor: "transparent",
                        pointColor: "white",
                        borderColor: '#d9534f',
                        borderWidth: 0,
                        showLine: true,
                        data: [0, 40, 10, 30, 10, 20, 15, 20],
                        pointBackgroundColor: 'transparent',
                    },{
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointColor: "white",
                        borderColor: '#5cb85c',
                        borderWidth: 0,
                        showLine: true,
                        data: [40, 0, 20, 10, 25, 15, 30, 0],
                        pointBackgroundColor: 'transparent',
                    },
                        {
                            label: "Lost",
                            fill: false,
                            lineTension: .5,
                            pointColor: "white",
                            borderColor: '#f0ad4e',
                            borderWidth: 0,
                            showLine: true,
                            data: [10, 40, 20, 5, 35, 15, 35, 0],
                            pointBackgroundColor: 'transparent',
                        },
                        {
                            label: "Lost",
                            fill: false,
                            lineTension: .5,
                            pointColor: "white",
                            borderColor: '#337ab7',
                            borderWidth: 0,
                            showLine: true,
                            data: [0, 30, 10, 25, 10, 40, 20, 0],
                            pointBackgroundColor: 'transparent',
                        }]
                },
            });

        });
    </script>



@endsection
