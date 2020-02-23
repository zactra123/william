@extends('layouts.login')
<style>
    .fullwidth-block{
        font-family: "Times New Roman";
        font-size: larger;
    }
</style>

@section('content')

    <div class="fullwidth-block">
        <div class="container fon">
            <div class="row justify-content-center">
            @foreach($contents as $content)
                <h1>{{$content->title}}</h1>
                <?php echo htmlspecialchars_decode(htmlspecialchars($content->content, ENT_QUOTES));  ?>

             @endforeach
            </div>
        </div>
    </div>
    @include('helpers/chat-box')
@endsection