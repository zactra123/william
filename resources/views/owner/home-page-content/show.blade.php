@extends('layouts.owner')
<style>
    .fullwidth-block{
        font-family: "Times New Roman";
        font-size: larger;
    }
</style>

@section('content')

    <div class="fullwidth-block mt-5 pt-5">
        <div class="container fon">
            <p class="row justify-content-center">
                @foreach($content as $value)
                    <h1>Title:  {{$value->title}}</h1>
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

@endsection
