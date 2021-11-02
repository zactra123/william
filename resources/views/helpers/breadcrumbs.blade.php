<section class="header-title section-padding">
  <div class="container text-center">
    <h2 class="title">{{$title}}</h2>
    <span class="sub-title">
      @foreach($route as $name => $url)
        @if ($name != array_key_last($route))
        <a href="{{$url}}">{{$name}}</a>
        &gt;
        @else
          {{$name}}
        @endif
      @endforeach
    </span>
  </div>
</section>
