<style>
    .design-process-section .text-align-center {
        line-height: 25px;
        margin-bottom: 12px;
    }
    .design-process-content {
        border: 1px solid #e9e9e9;
        position: relative;
        padding: 16px 34% 30px 30px;
    }
    .design-process-content img {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        max-height: 100%;
    }
    .design-process-content h3 {
        margin-bottom: 16px;
    }
    .design-process-content p {
        line-height: 26px;
        margin-bottom: 12px;
    }
    .process-model {
        list-style: none;
        padding: 0;
        position: relative;
        max-width: 600px;
        margin: 20px auto 26px;
        border: none;
        pointer-events: none;
        z-index: 0;
    }
    .process-model li::after {
        background: #ffffff none repeat scroll 0 0;
        bottom: 0;
        content: "";
        display: block;
        height: 4px;
        margin: 0 auto;
        position: absolute;
        right: -30px;
        top: 33px;
        width: 85%;
        z-index: -1;
    }
    .process-model li.visited::after {
        background: #68a6f8;
    }
    .process-model li:last-child::after {
        width: 0;
    }
    .process-model li {
        display: inline-block;
        width: 18%;
        text-align: center;
        float: none;
    }
    .nav-tabs.process-model > li.active > a, .nav-tabs.process-model > li.active > a:hover, .nav-tabs.process-model > li.active > a:focus, .process-model li a:hover, .process-model li a:focus {
        border: none;
        background: transparent;

    }
    .process-model li a {
        padding: 0;
        border: none;
        color: #606060;
    }
    .process-model li.active,
    .process-model li.visited {
        color: #68a6f8;
    }
    .process-model li.active a,
    .process-model li.active a:hover,
    .process-model li.active a:focus,
    .process-model li.visited a,
    .process-model li.visited a:hover,
    .process-model li.visited a:focus {
        color: #68a6f8;
    }
    .process-model li.active p,
    .process-model li.visited p {
        font-weight: 600;
    }
    .process-model li i {
        display: block;
        height: 68px;
        width: 68px;
        text-align: center;
        margin: 0 auto;
        background: #f5f6f7;
        border: 2px solid #e5e5e5;
        line-height: 65px;
        font-size: 30px;
        border-radius: 50%;
    }
    .process-model li.active i, .process-model li.visited i  {
        background: #fff;
        border-color: #68a6f8;
    }
    .process-model li p {
        font-size: 14px;
        margin-top: 11px;
    }
    .process-model.contact-us-tab li.visited a, .process-model.contact-us-tab li.visited p {
        color: #606060!important;
        font-weight: normal
    }
    .process-model.contact-us-tab li::after  {
        display: none;
    }
    .process-model.contact-us-tab li.visited i {
        border-color: #e5e5e5;
    }



    @media screen and (max-width: 560px) {
        .more-icon-preocess.process-model li span {
            font-size: 23px;
            height: 50px;
            line-height: 46px;
            width: 50px;
        }
        .more-icon-preocess.process-model li::after {
            top: 24px;
        }
    }
    @media screen and (max-width: 380px) {
        .process-model.more-icon-preocess li {
            width: 16%;
        }
        .more-icon-preocess.process-model li span {
            font-size: 16px;
            height: 35px;
            line-height: 32px;
            width: 35px;
        }
        .more-icon-preocess.process-model li p {
            font-size: 8px;
        }
        .more-icon-preocess.process-model li::after {
            top: 18px;
        }
        .process-model.more-icon-preocess {
            text-align: center;
        }
    }
</style>
<?php
    switch (auth()->user()->clientDetails->registration_steps){
        case "documents":
            $registered = "visited";
            $documents = "active";
            $credentials = "";
            $reviewed = "";
            $finished = "";
            break;
        case "credentials":
            $registered = "visited";
            $documents = "visited";
            $credentials = "active";
            $reviewed = "";
            $finished = "";
            break;
        case "review":
            $registered = "visited";
            $documents = "visited";
            $credentials = "visited";
            $reviewed = "active";
            $finished = "";
            break;
        case "finished":
            $registered = "visited";
            $documents = "visited";
            $credentials = "visited";
            $reviewed = "visited";
            $finished = "active";
            break;
        default:
            $registered = "active";
            $documents = "";
            $credentials = "";
            $reviewed = "";
            $finished = "";
    }

?>
<section class="design-process-section" id="process-tab">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- design process steps-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                    <li role="presentation" class="{{$registered}}">
                        <a href="#register" aria-controls="discover" role="tab" data-toggle="tab">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>REGISTRATION</p>
                        </a>
                    </li>
                    <li role="presentation" class="{{$documents}}">
                        <a href="#document" aria-controls="strategy" role="tab" data-toggle="tab">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <p>DOCUMENTS</p>
                        </a></li>
                    <li role="presentation " class="{{$credentials}}">
                        <a href="#credentials" aria-controls="optimization" role="tab" data-toggle="tab">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            <p>CREDENTIALS</p>
                        </a>
                    </li>
                    <li role="presentation" class="{{$reviewed}}">
                        <a href="#content" aria-controls="content" role="tab" data-toggle="tab">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            <p>REVIEW</p>
                        </a>
                    </li>
                    <li role="presentation" class="{{$finished}}">
                        <a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab">
                            <i class="fa fa-flag" aria-hidden="true"></i>
                            <p>FINISH</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>