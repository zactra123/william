<div class="">
  <div class="row">
    <div class="col-md-12 p-5">
      @if ($state->flag())
      <img src="{{$state->flag()}}" class="w-100" />
      @else
      <img src="https://cdn.britannica.com/79/4479-050-6EF87027/flag-Stars-and-Stripes-May-1-1795.jpg" class="w-100" />
      @endif
    </div>
    <div class="col-md-12 text-center">
      <h3>{{$state->full_name}} ({{$state->name}})</h3>
    </div>
  </div>
  @if($state->type == 1) {!! Form::open(['route' => "admins.mortgage.days", 'method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'class' => 'm-form m-form label-align-right', 'id'=>'bankInformation']) !!} @csrf
  <div class="form-group">
    <div class="row">
      <div class="col-md-12 form-group">
        <div class="col-md-12">
          <label>Notice of Default Date</label>
        </div>
        <div class="col-md-12">
          <input class="form-control" type="text" name="n_default_date" value="{{ $state->n_default_date}}" title="NOTICE OFF DAYS" />
          <input type="hidden" name="id" value="{{ $state->id}}" />
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="col-md-12">
          <label>Notice of Sale Month</label>
        </div>
        <div class="col-md-12">
          <input class="form-control" type="text" name="n_sale_date" value="{{ $state->n_sale_date}}" title="NOTICE OF SALE MONTH" />
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="col-md-12">
          <label>Auction Date</label>
        </div>
        <div class="col-md-12">
          <input class="form-control" type="text" name="auction_date" value="{{ $state->auction_date}}" title="AUCTION DAYS" />
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-right">
      <input type="submit" value="Add" class="btn btn-primary pull-right" />
    </div>
  </div>
  {!! Form::close() !!} @endif
</div>
