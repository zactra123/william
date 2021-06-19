@extends('layouts.layout')


@section('content')
    @include('helpers.breadcrumbs', ['title'=> "CREDIT EDUCATION", 'route' => ["Home"=> '/owner',"ADD EDUCATION" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Content</h3>
                                    {!! Form::open(['route' => ['owner.credit.education.store'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                                    @csrf
                                    <div class="form-group row font">

                                        {{ Form::text('content[title]', old('content.title'), ['class' => 'form-control m-input', 'placeholder' => 'Title']) }}

                                    </div>
                                    <div class="form-group row font">

                                        {{ Form::text('content[url]', old('content.url'), ['class' => 'form-control m-input', 'placeholder' => 'url example: some-url-example']) }}

                                    </div>
                                    <div class="form-group row font">

                                        {{ Form::number('content[category]', old('content.category'), ['class' => 'form-control m-input', 'placeholder' => 'Please enter 1 or 2']) }}
                                    </div>
                                    <div class="form-group row font">

                                        {{ Form::textarea('content[sub_content]', old('content.sub_content'), ['class' => 'form-control m-input', 'placeholder' => 'Sub Content']) }}

                                    </div>
                                    <div class="form-group row font">

                                        {{ Form::textarea('content[content]', old('content.content'), ['class' => 'form-control m-input', 'placeholder' => 'Full Content']) }}
                                    </div>

                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Add Content
                                            </button>


                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
