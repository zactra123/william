
@extends('layouts.login')

@section('content')
    <style>


        /*.card {*/
        /*    min-height: 90vh !important;*/
        /*    max-height: 100vh !important;*/
        /*}*/
        .chatList {
            min-height: 90vh !important;
            max-height: 100vh !important;
        }

        .chatMessage:hover{
            background-color: #adafb8;
        }

        .scrollDiv {
            height:auto;
            max-height:150%;
            overflow:auto;

        }
        .credit-logo{

            background-image: url('/images/logo-footer.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: contain;


        }


        /* Darker chat container */
        .darker {
            border-color: #ccc;
            background-color: #ddd;
            margin: 10px 10px 10px 1px;
            float: left;
        }

        .list-group-item.active-user{
            background-color: #adafb8
        }
    </style>

    <div class="pt-3 mt-5">
        <div class="page-content">
            <div class="row justify-content-center m-0">
                <aside class="sidebar col-md-3 scrollDiv">
                    <div class="sidebar__content">
                        <div class="side-nav list-group">
                            <div class="card ">
                                <div class="chatList scrollDiv" id="chatListId">
                                    @foreach($contents as $content)
                                        <div class="list-group-item chatMessage ">
                                            <div class="row">
                                            <span class="pl-2">
                                                <a href="{{route('credit.educationInfo', $content->url )}}" class="font-bolt color">
                                                    {{$content->title}}</a>
                                            </span>

                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                @if(isset($moreInfo))
                    <div class="col-9 mt-0 pt-0 credit-logo">
                        <div class="fullwidth-block mt-0 pt-0">

                            @foreach($moreInfo as $info)
                                <div class="card pr-3 pl-3">
                                    <h1>{{$info->title}}</h1>

                                    <?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?>

                                </div>
                            @endforeach


                        </div>
                    </div>
                @else
                    <div class="col-8 credit-logo">

                        <div class="credit-education-logo">

                        </div>

                    </div>

                @endif


            </div>
        </div>
    </div>

@endsection

