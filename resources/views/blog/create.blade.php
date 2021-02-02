





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
    @include('helpers.breadcrumbs', ['title'=> "BLOG", 'route' => ["Home"=> '#',"BLOG" => "#"]])

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="ms-ua-title">


                        </div>

                        {!! Form::open(['route'=>['blog.store'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right', "id" => "send_email"]) !!}

                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="TITLE" />
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}

                        </div>
                        <div class="form-group">
                            <input type="text" name="url" class="form-control" placeholder="URL" />
                            {!! $errors->first('url', '<p class="help-block">:message</p>') !!}

                        </div>
                        <div class="form-group">
                            <input type="file" name="attach" class="form-control"  placeholder="TITLE IMAGE"/>
                            {!! $errors->first('attach', '<p class="help-block">:message</p>') !!}

                        </div>
                        <div class="form-group">
                            <input type="text" name="published_date" class="form-control"  placeholder="DATE PUBLISHED" id="date"/>
                            {!! $errors->first('published_date', '<p class="help-block">:message</p>') !!}

                        </div>

                        <div class="form-group">
                            <textarea name="article" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                            {!! $errors->first('article', '<p class="help-block">:message</p>') !!}

                        </div>



                        <div class="form-group">
                            <input type="submit" value="ADD" class="btn btn-primary"/>
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



