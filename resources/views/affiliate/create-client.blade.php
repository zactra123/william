@extends('layouts.affiliate')



@section('content')


    <style>
        .tab-selector {
            background-color:  #0c71c3;
            /*border-color:#1a41ad;*/
            color: #FFFFFF;
            font-size: large;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size: large;
        }
        /*.tab-selector:hover{*/
            /*background-color: #FFFFFF;*/
            /*color:#0c71c3;*/
        /*}*/

        .tab-selector.active {
            background-color:  #FFFFFF;
            color:#0c71c3;
        }
        .card-header{

            border-bottom: none;
        }
        .pdf-upload{
            display: none
        }
        .pdf-upload.active{
            display: block;
        }

    </style>


    <div class="page-content">
        <div class="fullwidth-block">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach ($errors->all() as $error)

                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach

                        <div class="card">
                            <div class="card-header">
                                <div class="head m-2"> ADD CLIENT </div>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('affiliate.store.client') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection



