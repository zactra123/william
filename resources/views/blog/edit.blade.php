@extends('layouts.layout')


@section('content')
    <style>
        .ms-ua-box {
            background-color: #ffffff !important;
            border-radius: 4px !important;
            padding: 15px;
            box-shadow: 0 0 5px 1px #0000005c;
            opacity: 1;
        }


    </style>

    @include('helpers.breadcrumbs', ['title'=> "BLOG", 'route' => ["Home"=> '#',"EDIT BLOG" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">


                        </div>

                        {!! Form::open(['route'=>['blog.update', $blog->id],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "send_email"]) !!}
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="TITLE" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="url"  value="{{$blog->url}}" class="form-control" placeholder="URL" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="attach" value="{{$blog->path}}" class="form-control"  placeholder="TITLE IMAGE"/>
                        </div>
                        <div class="form-group">
                            <input type="date" name="published_date"  value="{{$blog->published_date}}"  class="form-control"  placeholder="DATE PUBLISHED" id="date"/>
                        </div>

                        <div class="form-group">
                            <textarea name="article" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="UPDATE" class="btn btn-primary"/>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/lib/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('js/site/admin/blogs.js?v=2') }}" ></script>


@endsection



