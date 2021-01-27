





@extends('layouts.layout')

<style>

    .selectize-input,.selectize-select{
        border: 1px solid #000 !important;
        border-radius: 8px !important;
    }


    .ms-ua-box {
        background-color: #ffffff !important;
        border-radius: 4px !important;
        padding: 15px;
        box-shadow: 0 0 5px 1px #0000005c;
        opacity: 1;
    }
    .priceName{
        width: 100%;
        height: auto;
        padding: 0;
        float: left;
    }
    .price{
        width: 20%;
        height: auto;
        padding: 0;
        float: left;
    }
    .name{
        width: 80%;
        height: auto;
        padding: 0;
        float: left;
    }

</style>

@section('content')
    @include('helpers.breadcrumbs', ['title'=> "PRICING LIST", 'route' => ["Home"=> '/owner',"PRICING LIST" => "#"]])

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


<script>

    $(document).ready(function(){
        $('#date').focus(function () {

            this.type='date';
        });
        $('#date').click(function () {
            this.type='date';
        })  ;
        $('#date').blur(function () {
            if(this.value==''){this.type='text'};
        });

    })

</script>

<script src="/js/lib/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 250,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>


@endsection



