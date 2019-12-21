@extends('layouts.client')


@section('content')
    <style>


        .tab-selector {
            background-color:  #FFFFFF;
            /*border-color:#1a41ad;*/
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

        .tab-selector:hover{
            background-color: #0c71c3;
            color:#FFFFFF;
        }

        .tab-selector.active {
            background-color:  #0c71c3;
            color:#FFFFFF;
        }
        .card-header{
            padding: 0 !important;
        }


        .btn-outline-color:not(:disabled):not(.disabled):active,
        .btn-outline-color:not(:disabled):not(.disabled).active,
        .show > .btn-outline-color.dropdown-toggle {
            color: #fff;
            background-color: #3490dc;
            border-color: #3490dc;
        }


        .pdf-upload{
            display: none
        }
        .pdf-upload.active{
            display: block;
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
                <h1> You can upload you credit report choose  one of the options </h1>

            </div>
            <div class="row justify-content-center"  >
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                <button type="button" class="btn tab-selector active" data-target="karma-tab" id="karma">Credit Karma</button>


                                <button type="button" class="btn tab-selector" data-target="experian-tab" id="experian">Experian</button>


                                <button type="button" class="btn tab-selector" data-target="tu-tab" id="tuMembership">TransUnion CREDIT MONITORING</button>

                                <button type="button" class="btn tab-selector" data-target="tu-online-tab" id="tuOnline"> TransUnion Online Dispute </button>

                            </div>
                        </div>

                        <div class="card-body">
                            {!! Form::open(['route'=>['client.uploadPdf'],'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form--label-align-right']) !!}
                            @csrf
                                <div class="pdf-upload karma-tab active">

                                    <div class="form-group files">

                                        <input type="file" name="credit_report[credit_karma]" class="form-control" multiple="">
                                    </div>
                                </div>

                                <div class="pdf-upload experian-tab">

                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" name="credit_report[experian]" class="form-control" multiple="">
                                    </div>
                                </div>
                                <div class="pdf-upload tu-tab">

                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" name="credit_report[tu][client_details]" class="form-control" multiple="">
                                    </div>
                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" name="credit_report[tu][payment_history]" class="form-control" multiple="">
                                    </div>
                                </div>
                                <div class="pdf-upload tu-online-tab">
                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" name="credit_report[tu_online]" class="form-control" multiple="">
                                    </div>

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
        $('.tab-selector').click(function(){
            var tab = $(this).attr("data-target");

            $('.tab-selector').removeClass("active");
            $('.pdf-upload').removeClass("active");
            $("." + tab).addClass("active")
        })

    //     $('INPUT[type="file"]').change(function () {
    //         var ext = this.value.match(/\.(.+)$/)[1];
    //         console.log(ext);
    //         switch (ext) {
    //             case 'pdf':
    //             case 'PDF':
    //                 $('#uploadButton').attr('disabled', false);
    //                 break;
    //             default:
    //                 alert('This is not an allowed file type.');
    //                 this.value = '';
    //         }
    //     });
    //
    //
    //     $(".karma").on("click",function () {
    //         console.log('jhg');
    //
    //
    //
    //
    //         $(".karmaUpload").css('display','block');
    //         $(".experianUpload").css('display','none');
    //         $(".tuOnlineDisputeUpload").css('display','none');
    //         $(".tuMembershipUpload").css('display','none');
    //
    //     });
    //
    //     $(".experian").on("click",function () {
    //
    //         $(".karmaUpload").css('display','none');
    //         $(".experianUpload").css('display','block');
    //         $(".tuOnlineDisputeUpload").css('display','none');
    //         $(".tuMembershipUpload").css('display','none');
    //
    //     });
    //
    //     $(".tuMembership").on("click",function () {
    //
    //         $(".karmaUpload").css('display','none');
    //         $(".experianUpload").css('display','none');
    //         $(".tuOnlineDisputeUpload").css('display','block');
    //         $(".tuMembershipUpload").css('display','none');
    //
    //     });
    //
    //     $(".tuOnline").on("click",function () {
    //
    //         $(".karmaUpload").css('display','none');
    //         $(".experianUpload").css('display','none');
    //         $(".tuOnlineDisputeUpload").css('display','none');
    //         $(".tuMembershipUpload").css('display','block');
    //
    //
    //     });
    })

</script>