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
              <table class="table">
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
                        <th>{{ $value->key }}</th>
                        <th>{{ $value->english }}</th>
                        <th>{{ $value->spanish }}</th>
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
            <div class="col-md-12 mt-3">
              <div class="float-right">
                  {{$translation->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
