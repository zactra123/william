@extends('layouts.layout')
<style>
    .fullwidth-block{
        font-family: "Times New Roman";
        font-size: larger;
    }
</style>

@section('content')


    @include('helpers.breadcrumbs', ['title'=> "CREDIT EDUCATION", 'route' => ["Home"=> '/owner',"VIEW EDUCATION" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="row justify-content-center">
                                    @foreach($content as $value)
                                        <h2>Title:  {{$value->title}}</h2>
                                        <br/> <hr>

                                        <h2>url:  {{$value->url}} </h2>
                                        <br/><hr>
                                        <h2>Category number: {{$value->category}} </h2><br/><hr>
                                        <p> Sub Content: <?php echo htmlspecialchars_decode(htmlspecialchars($value->sub_content, ENT_QUOTES));  ?></p>

                                        <p> Content: <?php echo htmlspecialchars_decode(htmlspecialchars($value->content, ENT_QUOTES));  ?> </p>

                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
