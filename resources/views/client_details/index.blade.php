@extends('layouts.client')


@section('content')
    // #1a41ad

    <style>


        .karma, .experian, .tuMembership, .tuOnline {
            background-color:  #FFFFFF;
            border-color:#1a41ad;
            color: #1a41ad;
            font-size: large;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }


        .btn-outline-color:not(:disabled):not(.disabled):active,
        .btn-outline-color:not(:disabled):not(.disabled).active,
        .show > .btn-outline-color.dropdown-toggle {
            color: #fff;
            background-color: #3490dc;
            border-color: #3490dc;
        }



        .nameUpload{
            font-family: "Times New Roman";
            font-size: large;
            background-color:  #0c71c3;
            color: #FFFFFF;
        }
        .btn-uploadBtn{
            background-color:  #0c71c3;
            color: #FFFFFF;
            font-family: "Times New Roman";
            font-size: large;        }

    </style>


    <div class="page-content">
        <div class="fullwidth-block">
            <div class="card" style="text-align: center">
                <h1> You can upload you credit report choose  one of the options </h1> <br> <br>


                        <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                <button type="button" class="btn btn-outline-primary karma" id="karma">Credit Karma</button>


                                <button type="button" class="btn btn-outline-primary experian" id="experian">Experian</button>


                                <button type="button" class="btn  btn-outline-primary tuMembership" id="tuMembership">TransUnion CREDIT MONITORING</button>

                                <button type="button" class="btn btn-outline-color  tuOnline" id="tuOnline"> TransUnion Online Dispute </button>

                        </div>

                <br><br>
            </div>

            <br>


            <div class="row justify-content-center"  >
                <div class="col-md-8">
                    <div class="card karmaUpload" style="display: none">
                        <div class="card-header font nameUpload">
                            Upload credit karma report
                        </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf

                            <div class="form-group files">

                                <input type="file" name="credit_report_credit_karma" class="form-control" multiple="">
                            </div>

                            <div class="form-group row mb-0 font">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-uploadBtn">
                                        Upload
                                    </button>


                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card experianUpload" style="display: none">
                        <div class="card-header font nameUpload"> Upload Expiran report </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf

                            <div class="form-group files">
                                <label>Upload Your File </label>
                                <input type="file" name="credit_report_expiran" class="form-control" multiple="">
                            </div>

                            <div class="form-group row mb-0 font">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-uploadBtn">
                                        Upload
                                    </button>


                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card tuOnlineDisputeUpload" style="display: none">
                        <div class="card-header font nameUpload"> Upload TransUnion CREDIT MONITORING </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf

                            <div class="form-group files">
                                <label>Upload Your File </label>
                                <input type="file" name="credit_report_trans_client_details" class="form-control" multiple="">
                            </div>
                            <div class="form-group files">
                                <label>Upload Your File </label>
                                <input type="file" name="credit_report_payment_history" class="form-control" multiple="">
                            </div>

                            <div class="form-group row mb-0 font">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-uploadBtn">
                                        Upload
                                    </button>


                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card tuMembershipUpload" style="display: none">
                        <div class="card-header font nameUpload"> Upload TransUnion Online Dispute Service </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf

                            <div class="form-group files">
                                <label>Upload Your File </label>
                                <input type="file" name="credit_report_trans_union_online" class="form-control" multiple="">
                            </div>


                            <div class="form-group row mb-0 font">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-uploadBtn">
                                        Upload
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


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('INPUT[type="file"]').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];
            console.log(ext);
            switch (ext) {
                case 'pdf':
                case 'PDF':
                    $('#uploadButton').attr('disabled', false);
                    break;
                default:
                    alert('This is not an allowed file type.');
                    this.value = '';
            }
        });


        $(".karma").on("click",function () {
            console.log('jhg');




            $(".karmaUpload").css('display','block');
            $(".experianUpload").css('display','none');
            $(".tuOnlineDisputeUpload").css('display','none');
            $(".tuMembershipUpload").css('display','none');

        });

        $(".experian").on("click",function () {

            $(".karmaUpload").css('display','none');
            $(".experianUpload").css('display','block');
            $(".tuOnlineDisputeUpload").css('display','none');
            $(".tuMembershipUpload").css('display','none');

        });

        $(".tuMembership").on("click",function () {

            $(".karmaUpload").css('display','none');
            $(".experianUpload").css('display','none');
            $(".tuOnlineDisputeUpload").css('display','block');
            $(".tuMembershipUpload").css('display','none');

        });

        $(".tuOnline").on("click",function () {

            $(".karmaUpload").css('display','none');
            $(".experianUpload").css('display','none');
            $(".tuOnlineDisputeUpload").css('display','none');
            $(".tuMembershipUpload").css('display','block');


        });
    })


</script>