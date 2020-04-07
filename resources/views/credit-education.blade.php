
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
            background-color: #0c71c3;
        }
        .credit-logo{

            background-image: url('/images/logo-footer.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: contain;
            background-attachment:fixed;

        }

        .credit-education-logo{
            position: fixed;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);

        }


        @media (max-width: 768px) {
            .sidebar{
                font-size: 8px;
            }
            .fullwidth-block {
                font-size: 12px;
            }

            .credit-education-logo {
                top: 30%;
            }

        }
        .color{
            color: white;
            /*margin-left: 5% ;*/
        }


    </style>
        <div class="container mt-5 pt-2">
            <div class="row mt-4">
                <div class="col-2 sidebar ml-0 mr-0">
                    @foreach($contents as  $content)
                        @if($content->id%2==0 )
                            <p><a href="{{route('credit.educationInfo', $content->url )}}" class="font-bolt color"> {{$content->title}}</a></p><hr>
                        @endif
                    @endforeach
                </div>

                @if(isset($moreInfo))
                <div class="col-8">
                    <div class="fullwidth-block slide-down">
                        <div class="container">
                            @foreach($moreInfo as $info)
                                <h1>{{$info->title}}</h1>
                                <div class="row justify-content-center">
                                    <?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <div class="col-8 credit-logo">
                    <div class="fullwidth-block slide-down">

{{--                            <div class="credit-education-logo">--}}
{{--                                <img class="credit-logo" src="{{asset('/images/logo-footer.png')}}">--}}
{{--                            </div>--}}

                    </div>
                </div>

               @endif

                <div class="col-2 sidebar">
                    @foreach($contents as $content)
                        @if($content->id%2!=0 )
                            <p><a href="{{route('credit.educationInfo', $content->url )}}" class="font-bolt color"> {{$content->title}}</a></p><hr>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>



@endsection
