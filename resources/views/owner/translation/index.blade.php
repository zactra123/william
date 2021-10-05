@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Translation') }}</title>
@endsection
@section('body')
  <div class="breadcrumb-header justify-content-between">
    <div>
      <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Translation') }}</li>
        </ol>
      </nav>
    </div>
    <div class="mmt-7">
      <a class="btn btn-primary pull-left mmt-7" href="{{ route('owner.translation.create') }}" role="button">
        {{ zactra::translate_lang('Create Translation') }}
      </a>
    </div>
  </div>
  <div class="container mmap-0">
    <div class="row row-sm">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="card mg-b-20" id="tabs-style2">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              {{ zactra::translate_lang('Translation') }}
            </div>
            <p class="mg-b-20">{{ zactra::translate_lang('See list of translation here...') }}</p>
            <div class="card-body">
              <table class="table text-md-nowrap" id="example1">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ zactra::translate_lang('Key') }}</th>
                    <th scope="col">{{ zactra::translate_lang('In English') }}</th>
                    <th scope="col">{{ zactra::translate_lang('In Spanish') }}</th>
                    <th scope="col">{{ zactra::translate_lang('Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($translation)>0)
                    @foreach ($translation as $key => $value)
                      <tr>
                        <th>{{ $key+1 }}</th>
                        <th>{{ zactra::limit_words($value->key,110) }}</th>
                        <th>{{ zactra::limit_words($value->english,110) }}</th>
                        <th>{{ zactra::limit_words($value->spanish,110) }}</th>
                        <th>
                          <div class="dropdown show">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ zactra::translate_lang('Action') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="{{ route('owner.translation.edit',$value->id) }}" data-id="">{{ zactra::translate_lang('Edit') }}</a>
                              <a class="dropdown-item" href="{{ route('owner.translation.delete',$value->id) }}" onclick="return confirm('Are You Sure?')" data-id="">{{ zactra::translate_lang('Delete') }}</a>
                            </div>
                          </div>
                        </th>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <!-- Internal Data tables -->
  <script src="{{asset('/')}}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.dataTables.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/responsive.dataTables.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/jquery.dataTables.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/jszip.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/pdfmake.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/vfs_fonts.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/buttons.html5.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/buttons.print.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/buttons.colVis.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('/')}}assets/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
  <!-- datatable js -->
  <script src="{{asset('/')}}assets/js/table-data.js"></script>
@endsection
