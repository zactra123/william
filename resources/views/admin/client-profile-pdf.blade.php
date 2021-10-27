<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <link href="{{public_path('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{public_path('css/style.css')}}" />
    <style>
      @import "{{public_path('css/app.css')}}";
    </style>
    <style type="text/css">
      .dropdown-submenu.pull-left > {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
      }

      .internal {
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        font-size: 0.7rem;
        font-weight: 400;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        border: 0px solid #ced4da;
        border-right: 1px solid #ced4da;
      }

      .external {
        display: block;
        width: 100%;
        height: calc(1.6em + 0.75rem + 2px);
        font-size: 0.7rem;
        color: #495057;
        background-color: #fff;
        border: 0px solid #ced4da;
      }
    </style>
  </head>
  <body>
    <div class="page-content pt-4">
      <div class="page-content p-0 mr-0 ml-0">
        <div class="row mr-0 ml-0">
          <div class="col-xs-12 pl-2">
            <div class="pl-3 row border-bottom">
              <div class="external">
                {{ $client->full_name()==" " ? "FULL NAME" : $client->full_name() }}
              </div>
            </div>
            <div class="pl-3 row border-bottom">
              <div class="external">{{ $client->clientDetails->address??"ADDRESS" }}</div>
            </div>
            <div class="pb-1 row border-bottom">
              <div class="col-xs-4 internal">{{ $client->clientDetails->phone_number??"PHONE NUMBER" }}</div>
              <div class="col-xs-6 external">{{ $client->email }}</div>
            </div>
            <div class="pb-1 row border-bottom">
              <div class="col-xs-4 internal">{{ $client->clientDetails->ssn??"SNN" }}</div>
              <div class="col-xs-6 external">{{ $client->clientDetails?date_format(date_create($client->clientDetails->dob), 'm/d/Y'):"DATE OF BIRTH" }}</div>
            </div>
            @if($client->clientDetails != null)
              <div class="pb-1 row border-bottom">
                <div class="col-xs-6 external">
                  @if($client->clientDetails->sex == "M")
                    {{ zactra::translate_lang('MALE') }}
                  @elseif($client->clientDetails->sex == "F")
                    {{ zactra::translate_lang('FEMALE') }}
                  @else
                    {{ zactra::translate_lang('NON BINARY') }}
                  @endif
                </div>
              </div>
            @else
              <div class="pb-1 row border-bottom">
                <div class="col-xs-6 external">
                  {{ zactra::translate_lang('NOT SPECIFIED') }}
                </div>
              </div>
            @endif
            <div class="pt-2 pb-2 pl-3 row external">
              {{ zactra::translate_lang('REFFERED BY') }} {{$client->referredBy()}}
            </div>
            <div>
              @if(!empty($client->clientAttachments()))
                <?php $dl = $client->clientAttachments()->where('category', "DL")->first(); ?>
                @if(!empty($dl))
                  <img type="file" width="70%" src="{{public_path($dl->path)}}" width="125px" name="img-drvl" id="img-drvl" />
                @endif
                <br />
                <?php $ss = $client->clientAttachments()->where('category', "SS")->first(); ?>
                @if(!empty($ss))
                  <img type="file" width="70%" src="{{public_path($ss->path)}}" width="125px" name="img-sos" id="img-sose" />
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
