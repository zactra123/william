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

        .chatList {
            min-height: 90vh !important;
            max-height: 100vh !important;
        }
        .scrollDiv {
            height:auto;
            max-height:150%;
            overflow:auto;

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


        }



    </style>
    <div class="container mt-5 pt-2">
        <div class="row mt-4">
            <div class="col-3  ml-0 mr-0">
                <div class="chatList scrollDiv sidebar " id="chatListId">
                @foreach($contents as  $content)

                    <h3><a href="#{{$content->url}}" class="font-bolt color"> {{$content->title}}</a></h3><hr>
                @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="chatList scrollDiv container">
                    @foreach($contents as $info)
                        <h1 id="{{$info->url}}">{{$info->title}}</h1>
                        <div class="row justify-content-center">
                            <?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?>
                        </div>
                    @endforeach
                </div>

            </div>



        </div>

    </div>



@endsection


