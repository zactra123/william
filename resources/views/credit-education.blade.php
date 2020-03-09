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
    @media (max-width: 768px) {
        .sidebar{
            font-size: 8px;
        }
        .fullwidth-block {
            font-size: 12px;

        }
    }

    .color{
        color: white;
        /*margin-left: 5% ;*/
    }

</style>
@extends('layouts.login')

@section('content')


    <div class="page-content">
        <div class="fullwidth-block">
            <div class="container">
                <div class="card">
                    <div class="breadcrumbs">
                        <div class="container">
                            <a href="{{url('/')}}">Home</a> &rarr;
                            <a href="{{url('credit-education')}}">CREDIT EDUCATION</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 sidebar ml-0 mr-0">
                                @foreach($contents as  $content)
                                    @if($content->id%2==0 )
                                        <p><a href="{{route('credit.educationInfo', $content->url )}}" class="font-bolt color"> {{$content->title}}</a></p><hr>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-8">

                                <div class="fullwidth-block slide-down">
                                    <div class="container">

                                        @if(isset($moreInfo))
                                            @foreach($moreInfo as $info)
                                                <h1>{{$info->title}}</h1><br/>
                                                <div class="row justify-content-center">
                                                    <?php echo htmlspecialchars_decode(htmlspecialchars($info->content, ENT_QUOTES));  ?>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>

                                </div>

                            </div>
                            <div class="col-2 sidebar">
                                @foreach($contents as $content)
                                    @if($content->id%2!=0 )
                                        <p><a href="{{route('credit.educationInfo', $content->url )}}" class="font-bolt color"> {{$content->title}}</a></p><hr>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection