<link rel="stylesheet" href="{{asset('/css/registration_steps.css')}}">
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
                        <a href="#register"  aria-controls="register" role="tab" data-toggle="tab">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>REGISTRATION</p>
                        </a>
                    </li>
                    <li role="presentation" class="{{$documents}}">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            <p>DOCUMENTS</p>
                        </a></li>
                    <li role="presentation " class="{{$credentials}}">
                        <a href="#credentials" aria-controls="optimization" role="tab" data-toggle="tab">
                            <i class="fa fa-key" aria-hidden="true"></i>
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