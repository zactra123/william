@if(isset($state))
<div class="ms-ua-form">
    {!! Form::open(['route' => "admins.mortgage.days", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!}
    @csrf
    <div class="form-group">
        <div class="row" >
            <div class="col-md-1" style="margin: 0">
                <div class="priceName">
                        <img src=" {{$state->flag()}} ">

                </div>
            </div>
            <div class="col-md-3" style="margin: 0">
                <div class="priceName">
                    <label style="float: right">{{$state->full_name}} ({{$state->name}})</label>
                    <input type="hidden" name="id" value="{{ $state->id}}">

                </div>
            </div>

            @if(!is_null($state))
                @if($state->type == 1)
                <div class="col-md-2" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">N/D DATE</label>
                        </div>
                        <div class="price">
                            <input type="text" name="n_default_date" value="{{ $state->n_default_date}}"  title="NOTICE OFF DAYS">
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">N/S MONTH</label>
                        </div>
                        <div class="price">
                            <input type="text" name="n_sale_date" value="{{ $state->n_sale_date}}"  title="NOTICE OF SALE MONTH">
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUCTION DATE</label>
                        </div>
                        <div class="price">
                            <input type="text" name="auction_date" value="{{ $state->auction_date}}"  title="AUCTION DAYS">
                        </div>
                    </div>
                </div>
            @endif
            @endif

        </div>
    </div>


    <div class="col">
        <input type="submit" value="Add" class="ms-ua-submit">
    </div>
    {!! Form::close() !!}
</div>
@endif
    @if(!is_null($states))
        @foreach($states as $state)

    <div class="form-group">
        <div class="row" >
            <div class="col-md-1" style="margin: 0">
                <div class="priceName">
                    <img src="{{$state->flag()}}" class="w-100">
                </div>
            </div>
            <div class="col-md-3" style="margin: 0">
                <div class="priceName">
                    <label style="float: right">{{$state->full_name}} ({{$state->name}})</label>
                </div>
            </div>
            @if($state->type == 1)
                <div class="col-md-2" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">N/D DATE</label>
                        </div>
                        <div class="price">
                            <label style="float: right">{{ $state->n_default_date ?? "NA"}}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">N/S MONTH</label>
                        </div>
                        <div class="price">
                            <label style="float: right">{{ $state->n_sale_date ?? "NA"}}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="margin: 0">
                    <div class="priceName">
                        <div class="name">
                            <label style="float: right">AUCTION DATE</label>
                        </div>
                        <div class="price">
                            <label style="float: right">{{ $state->auction_date ?? "NA"}}</label>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endforeach
    @endif








