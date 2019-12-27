@extends('layouts.owner')


@section('content')


    <div class="container fon">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Edit FAQs</h1>
                        {!! Form::open(['route' => ['owner.faqs.update', $faq->id], 'method' => 'POST',   'class' => 'm-form m-form--label-align-right']) !!}
                        @method('PUT')
                        @csrf
                        <div class="form-group row font">

                            {{ Form::text('faqs[title]',$faq->title , ['class' => 'form-control m-input', 'placeholder' => 'Title']) }}

                        </div>

                        <div class="form-group row font">

                            {{ Form::textarea('faqs[description]', $faq->description, ['class' => 'form-control m-input', 'placeholder' => 'Sub Content']) }}

                        </div>
                        <div class="form-group row mb-0 font">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit FAQs
                                </button>


                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection











