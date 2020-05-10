@extends('layouts.layout')


@section('content')

    @include('helpers.breadcrumbs', ['title'=> "FAQ", 'route' => ["Home"=> '/owner',"ADD FAQ" => "#"]])
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Add FAQs</h2>
                                    {!! Form::open(['route' => ['owner.faqs.store'], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                                    @csrf
                                    <div class="form-group row font">

                                        {{ Form::text('faqs[title]', old('faqs.title'), ['class' => 'form-control m-input', 'placeholder' => 'Title']) }}

                                    </div>

                                    <div class="form-group row font">

                                        {{ Form::textarea('faqs[description]', old('content.sub_content'), ['class' => 'form-control m-input', 'placeholder' => 'Sub Content']) }}

                                    </div>
                                    <div class="form-group row mb-0 font">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Add FAQs
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











