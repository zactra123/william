@extends('layouts.login')

@section('content')

    <style>
        .fullwidth-block {
            font-family: "Times New Roman";
            font-size: larger;
        }
        .sidebar{

            font-size: 14px;
            color: #fff;

        }

        .active{
            background-color: #ffffff;

        }
        .title{
            font-size: 1.2rem;
        }

        .chatList {
            min-height: 90vh !important;
            max-height: 100vh !important;
        }
        .scrollDiv {
            height:auto;
            max-height:150%;
            overflow-y: auto;
        }
        .scrollDiv::-webkit-scrollbar {
            width: 6px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color:transparent;
        }



        @media (max-width: 768px) {
            .sidebar{
                font-size: 8px;
            }
            .fullwidth-block {
                font-size: 12px;
            }
            .title{
                font-size: 0.85rem;
            }


        }



    </style>
    <div class="container mt-5 pt-2">
        <div class="row mt-4">
            <div class="col-3  ml-0 mr-0">
                <div class="chatList scrollDiv sidebar " id="chatListId">
                @foreach($contents as  $content)

                    <a href="#{{$content->url}}" class="font-bolt title" data-target="{{$content->id}}"> {{$content->title}}</a><hr>
                @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="chatList scrollDiv container">
                    @foreach($contents as $info)
                        <div class="section" id="section{{$info->id}}">
                            <h1 id="{{$info->url}}">{{$info->title}}</h1>
                            <div class="row justify-content-center m-0 p-0">
                                <?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>



        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('.title').click(function(){
                var tab = $(this).attr("data-target");
                console.log(tab);
                $('.section').removeClass("active");
                $("#section"+tab ).addClass("active");
            })


        })

    </script>

@endsection


