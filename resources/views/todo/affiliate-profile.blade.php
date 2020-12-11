
@extends('layouts.layout')
@section('content')
    <link href="{{asset('css/css/admin.css')}}" rel="stylesheet" type="text/css">
    <style>
        .scrollDiv {
            height: 270px;
            background-color: white;
            overflow-y: auto;

        }
        .dropdown {
            position:relative;
            display: inline-block;

        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 100%;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content.experina {
            background-color: #294991;
        }
        .dropdown-content.experina  a {
            color:  #f1f1f1;
            font-weight: bolder;
        }
        .dropdown-content.equifax  {
            background-color: #b32541;
        }
        .dropdown-content.equifax  a {
            color:  #f1f1f1;
            font-weight: bolder;
        }

        .dropdown-content.transunion {
            background-color: #02a5ca;
        }
        .dropdown-content.transunion  a {
            color:  #f1f1f1;
            font-weight: bolder;
        }


        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .disput-progress {
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        @media only screen and (max-width: 479px) {
            .disput-progress {
                flex-direction: column;
            }
        }

        .progress {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }


        svg {
            position: relative;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
        .p1 svg circle {
            position: relative;
            transform: translate(50%, 50%);
            /*margin-left: -50%;*/
            /*width: 100%;*/
            /*height: 100%;*/
            fill: none;
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 0;
            stroke: rgb(255, 173, 22);
            stroke-linecap: butt;
        }
        .p1 svg circle:nth-child(2) {
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 300;
            stroke: rgb(255, 14, 52);

        }


        .p1 svg circle:nth-child(3) {
            stroke-width: 30;
            stroke-dasharray: 440;
            stroke-dashoffset: 400;
            stroke: #01bb01;

        }

        .p1 svg circle:nth-child(4) {
            stroke-width: 30;
            stroke-dasharray: 5, 20;
            stroke-dashoffset: 200;
            stroke: rgb(255, 255, 255);
        }

        .p1 svg circle:nth-child(5) {
            transform: translate(50%, 50%);
            width: 100%;
            height: 100%;
            fill: none;
            stroke: rgba(102, 102, 102, 0.295);
            stroke-width: 15;
            stroke-dasharray: 440;
            stroke-linecap: butt;
            stroke-dashoffset: 2;
        }


        .number {
            width: 100%;
            height: 100%;
            top: 10px;
            left: 0;
            display: flex;
            text-align: center;
            justify-content: center;
            position: absolute;
            border-radius: 50%;
            align-items: center;
        }

        .number h2 {
            text-align: center;
        }

        .number span {
            width: 20px;
            height: 30px;
            font-size: 20px;
            position: relative;
            line-height: 10px;
        }




        .driver_license {
            background-image: url(/images/correct-dl.png);
            display: block;
            background-size: 80%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .social_security {
            background-image: url(/images/correct-ss.png);
            display: block;
            background-size: 80%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .driver_license:after, .social_security:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 70px;
            right: 0;
            height: 76px;
            content: "";
            background-image: url(/images/upload.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .driver_license:before, .social_security:before {
            position: absolute;
            bottom: 0px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "choose or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #341d31;
            font-weight: 900;
            font-size: 20px;
            text-transform: capitalize;
            text-align: center;
        }

        .driver_dropp, .social_dropp {
            display: block;
            background-size: 80%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .driver_dropp:before {
            position: absolute;
            bottom: 0px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "ID IS ATTACHED ";
            display: block;
            margin: 0 auto;
            color: #341d31;
            font-weight: 900;
            font-size: 20px;
            text-transform: capitalize;
            text-align: center;
        }
        .social_dropp: before {
            position: absolute;
            bottom: 0px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "SSC IS ATTACHED";
            display: block;
            margin: 0 auto;
            color: #341d31;
            font-weight: 900;
            font-size: 20px;
            text-transform: capitalize;
            text-align: center;
        }







        .social {
            display: block;
        }
        .driver {
            display: block;
        }

        .zoomDL:hover {
            transform:translate(225%,150%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .zoomSS:hover {
            transform:translate(225%,-50%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .scaleDL{
            transform:translate(225%,150%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }
        .scaleSS{
            transform:translate(225%,-50%) scale(6.5);
            transition: transform .5s ease-in-out;
            position: fixed;
        }

        .side-nav .categories > li {
            padding: 10px 40px 10px 30px !important;
        }
        .responsive {
            width: 16.6%;
            height: auto;
            padding-right: 5px;
        }
        .responsive.small{
            width: 10%;
            padding-right: 0px !important;

        }

        .addressImage{
            width: 100%;
            height: auto;
            padding-right: 5px;
        }
        .address{
            width: 100%;
            height: auto;
            padding: 0;
            float: left;
        }
        .address1{
            width: 16.6%;
            height: auto;
            padding: 0;
            float: left;
        }
        .address2{
            width: 83%;
            height: auto;
            padding: 0;
            float: left;
        }
        .refferred {
            font-size: 2vw !important
        }

        .zodiac{
            display: none;
        }
        .date_of_birth:hover  .zodiac{
            display:block;
        }


    </style>

    @include('helpers.breadcrumbs', ['title'=> "Affiliate Profile", 'route' => ["Home"=> '#', "Affiliate Profile" => "#"]])

    <div class="row">
        <div class="col-sm-3">
            <aside class="side-nav" id="show-side-navigation1">
                <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
                <div class="heading">
                    {{--                    <img src="assets/images/trump.jpg" alt="">--}}
                    <div class="row" >
                        <div class="info">
                        </div>
                    </div>

                </div>
                <ul class="categories">
                    <li title="FULL NAME" class="dl-field">

                        <a href="#"><span style="font-weight: bold">{{$affiliate->full_name()}}</span></a>
                    </li>
                    <li title="PHONE NUMBER">
                        <img  class="responsive" src="/images/phone_number.png">
                        <a href="tell:{{$affiliate->clientDetails->phone_number}}"> {{$affiliate->clientDetails->phone_number}}</a>
                    </li>
                    <li title="EMAIL ADDRESS">
                        <a href="#" data-toggle="modal" data-target="#sendEmail">
                        <img  class="responsive" src="/images/email.png">
                        </a>
                        <a href="mailto:{{$affiliate->email}}"> {{strtoupper($affiliate->email)}}</a>
                    </li>
                    <li title="FULL ADDRESS" >
                        <div class="address">
                            <div class="address1">
                                <a href="#" data-toggle="modal" data-target="#mapModal">
                                  <img  class="addressImage" src="/images/location.png">
                                </a>
                            </div>
                            <div class="address2">
                                <div class="address">
                                    {{$affiliate->clientDetails->number}} {{$affiliate->clientDetails->name}}
                                </div>
                                <div class="address">
                                    {{$affiliate->clientDetails->city}}, {{$affiliate->clientDetails->state}} {{$affiliate->clientDetails->zip}}
                                </div>
                            </div>
                        </div>
                    </li>

                    <li title="DATE OF BIRTH" class="date_of_birth">
                            <img  class="responsive" src="/images/birthday.png">
                            {{date("m/d/Y", strtotime($affiliate->clientDetails->dob))}}
                            <img src="/images/age.jpg" class="responsive small"> {{date("Y")- date("Y",strtotime($affiliate->clientDetails->dob))}}

                    </li>
                    @if($affiliate->clientDetails->ssn)
                    <li title="SOCIAL SECURITY NUMBER" >

                        <img  class="responsive ss_number" src="/images/ssc.png">

                        <span class="ssn">{{$affiliate->clientDetails->ssn}}</span>
                    </li>
                    @endif
                    @if($affiliate->clientDetails->ein)
                    <li title="SOCIAL SECURITY NUMBER">

                        <img  class="responsive ss_number" src="/images/ssc.png">

                        <span class="ssn">{{$affiliate->clientDetails->ein}}</span>
                    </li>
                    @endif


                    <li><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white"><i class="fa fa-pencil-square-o  fa-fw"></i> Edit Profile</a></li>
                </ul>
            </aside>
        </div>

        <div class="col-sm-9">
            <section id="contents">
                <div class="welcome">
                    <div class="container-fluid">

                    </div>
                </div>
            </section>
            <section  id="contents">
                <section class="charts">
                    <div class="container-fluid">
                        <div class="chart-container">
                            <div class="content">
                                <h2>Client List</h2>
                                <div class="container-fluid">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">FULL NAME</th>
                                                <th scope="col">EMAIL</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clients as $key=> $user)
                                                <tr>
                                                    <th scope="row">{{$key+1}}</th>
                                                    <td>
                                                        <a href="{{route('adminRec.client.profile', $user->id)}}" role="button">
                                                            {{$user->full_name!= ' ' ?$user->full_name:"No Name"}}
                                                        </a>
                                                    </td>

                                                    <td>{{$user->email}}</td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>

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


    <link rel="stylesheet" href="{{asset('css/lib/leaflet.css')}}" />
    <script src="{{asset('js/lib/leaflet.js')}}"></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>

    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/additional-methods.min.js') }}" ></script>
    <script src="{{ asset('js/lib/selectize.min.js?v=2') }}" ></script>

{{--    nkar mecacnel poqracnel--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(".ssn").mask("999-99-9999");
        })
    </script>

    <script src="/js/lib/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 250,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>

    <link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css">
{{--    map--}}
    <script>
        $(document).ready(function(){
            var mymap = L.map('mapid')
            $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q={{$affiliate->clientDetails->address}}', function(data){
                console.log(data);
                mymap.setView([data[0]['lat'], data[0]['lon']], 17);
                L.marker([data[0]['lat'], data[0]['lon']]).addTo(mymap);

            });

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
            mymap.invalidateSize()
            $("#mapModal").on('shown.bs.modal', function(e) {
                mymap.invalidateSize();
            });
        })

    </script>







@endsection
