@extends('layouts.layout')

<link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">

@section('content')



    @include('helpers.breadcrumbs', ['title'=> "Client Profile", 'route' => ["Home"=> '#', "Client Profile" => "#"]])


    <aside class="side-nav" id="show-side-navigation1">
        <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
        <div class="heading">
{{--            @foreach($client->clientAttachments->where('category','DL') as $attachment)--}}
{{--            <img src="{{$attachment->path}}" alt="">--}}
{{--            @endforeach--}}
            <div class="info">
                <h3><a href="#">{{$client->full_name()??""}}</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
        <ul class="categories">
            <li title="PHONE NUMBER"><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tell:+91-434-3433">{{$client->clientDetails->phone_number}}</a></li>
            <li title="EMAIL ADDRESS"><i class="fa fa-envelope fa-fw"></i><a href="mailto:demomail@gmail.com"> {{$client->email}}</a>
            </li>
            <li title="FULL ADDRESS"><i class="fa fa-map fa-fw"></i> {{$client->clientDetails->address??""}}</li>
            <li title="DATE OF BIRTH"><i class="fa fa-calendar fa-fw"></i>{{$client->clientDetails->dob??""}}</li>
            <li title="SOCIAL SECURITY NUMBER"><i class="fa fa-shield fa-fw"></i> {{$client->clientDetails->ssn??""}}</li>
            <li title="REFERRED BY"><i class="fa fa-user fa-fw"></i> {{$client->clientDetails->referred_by??""}}</li>
            <li title="GENDER"><i class="fa fa-venus-mars fa-fw"></i> {{$client->clientDetails->sex??""}}</li>


        </ul>
    </aside>
    <section id="contents">

        <div class="welcome">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h2>Welcome to Dashboard</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="charts">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="boxheading">
                                <h3>CREDIT REPORTS</h3>
                            </div>
                            <div class="col-6 mt20">
                                <h4>Lorem ipsum dolor sit.pdf</h4>
                                <p>12-04-2020</p>
                            </div>
                            <div class="col-6 ">
                                <h4>Lorem ipsum dolor sit.pdf</h4>
                                <p>12-04-2020</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="boxheading">
                                <h3>DISPUTE PROGRESS</h3>
                            </div>
                            <div class="mt20">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, doloribus.</h4>
                                <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt50">
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="boxheading">
                                <h3>ARCHIVE</h3>
                            </div>
                            <div class="col-6 mt20">
                                <h4>DOCUMENTS </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, tenetur.</p>
                            </div>
                            <div class="col-6 ">
                                <h4>MISCELLANEOUS</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, tenetur.</p>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
        </section>


        <section class="charts pb50 mt50">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-8 col-sm-offset-2">
                        <div class="chart-container">
                            <div class="boxheading">
                                <h3>EXCEED COMPANIES </h3>
                            </div>
                            <div class="mt20">
                                <h4>EXCEED AUTO GROUP</h4>
                                <p> consectetur adipisicing elit. Error fuga dicta iusto suscipit quibusdam nam ad, eum deleniti architecto debitis.</p>
                            </div>
                            <div class="mt20">
                                <h4>EXCEED AUTO GROUP</h4>
                                <p> EXCEED CAPITAL LENDING</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>

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
