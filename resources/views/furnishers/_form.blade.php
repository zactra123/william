
<div class="ms-ua-form ms-ua-box">
    <div class="row" >
        @if (isset($state->bucket))
            <div class="col-md-12 p-5" >
                <img src=" {{$state->flag()}} " class="w-100">
            </div>
        @endif
        <div class="col-md-12">
            <h3>{{$state->full_name}} ({{$state->name}})</h3>

        </div>
    </div>
    @if($state->type == 1)
    {!! Form::open(['route' => "admins.mortgage.days", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
    @csrf
    <div class="form-group p-5">
        <div class="row" >


                <div class="col-md-12 form-group" >
                    <div class="col-md-6">
                        <label >NOTICE OF DEFAULT DATE</label>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="n_default_date" value="{{ $state->n_default_date}}"  title="NOTICE OFF DAYS">
                        <input type="hidden" name="id" value="{{ $state->id}}">
                    </div>
                </div>
                <div class="col-md-12 form-group" >
                    <div class="col-md-6">
                        <label >NOTICE OF SALE MONTH</label>
                    </div>
                    <div class="col-md-6">
                        <input  class="form-control" type="text" name="n_sale_date" value="{{ $state->n_sale_date}}"  title="NOTICE OF SALE MONTH">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-6">
                        <label>AUCTION DATE</label>
                    </div>
                    <div class="col-md-6">
                        <input  class="form-control" type="text" name="auction_date" value="{{ $state->auction_date}}"  title="AUCTION DAYS">
                    </div>
                </div>

        </div>
    </div>

    <div class="col">
        <input type="submit" value="Add" class="ms-ua-submit">
    </div>
    {!! Form::close() !!}
    @endif
</div>
