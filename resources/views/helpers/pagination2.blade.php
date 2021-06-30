

@if ($paginator->hasPages())




    <div class="row page-navigation-container mr-3">
        <div class="col-md-5">
          <a class="btn btn-primary pull-left" href="{{ route('admins.bank.create')}}" role="button">
              ADD FURNISHERs/CRAs
          </a>
        </div>
        <div class="col-md-7 p-0">
            <div class="row">
              <div class="col-md-3">

              </div>
              <div class="col-md-6 p-1">
                  <input class="form-control go-to-page" type="text" id="" name="page_number" placeholder="PAGE #">
              </div>
              <div class="col-md-3 p-1 pl-2">
                  <button class="form-control btn btn-primary go-to" id="">GO TO</button>
              </div>
            </div>

        </div>
    </div>
@endif
