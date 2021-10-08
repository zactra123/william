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
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('owner.translation.index') }}">{{ zactra::translate_lang('Translation') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($translation) ? 'Edit Translation' : 'Add Translation'}} </li>
      </ol>
    </nav>
  </div>
</div>
<section class="ms-user-account">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-12"></div>
      <div class="col-md-8 col-sm-12">
        <div class="ms-ua-box">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>{{ isset($translation) ? 'Edit Translation' : 'Add New Translation'}}</h4>
                <p>{{ zactra::translate_lang('Please enter followiing information to') }} {{ isset($translation) ? zactra::translate_lang('edit') : zactra::translate_lang('add new')}} {{ zactra::translate_lang('translation') }}</p>
              </div>
              <div class="card-body pl-4 pr-4">
                <form class="" action="{{ isset($translation) ? route('owner.translation.update') : route('owner.translation.store') }}" method="post">
                @csrf
                @if (isset($translation))
                  <input type="hidden" name="id" value="{{ $translation->id }}">
                @endif
                <div class="form-group row font">
                  <textarea name="key" rows="5" class="form-control" placeholder="{{ zactra::translate_lang('Key') }}" required>{{ isset($translation) ? $translation->key : ''}}</textarea>
                  {{-- <input type="text" name="key" class="form-control" placeholder="{{ zactra::translate_lang('Key') }}" value="{{ isset($translation) ? $translation->key : ''}}" required> --}}
                </div>
                <div class="form-group row font">
                  <textarea name="english" rows="5" class="form-control" placeholder="{{ zactra::translate_lang('In English') }}" required>{{ isset($translation) ? $translation->english : ''}}</textarea>
                  {{-- <input type="text" name="english" class="form-control" placeholder="{{ zactra::translate_lang('In English') }}" value="{{ isset($translation) ? $translation->english : ''}}"> --}}
                </div>
                <div class="form-group row font">
                  <textarea name="spanish" rows="5" class="form-control" placeholder="{{ zactra::translate_lang('In Spanish') }}" required>{{ isset($translation) ? $translation->spanish : ''}}</textarea>
                  {{-- <input type="text" name="spanish" class="form-control" placeholder="{{ zactra::translate_lang('In Spanish') }}" value="{{ isset($translation) ? $translation->spanish : ''}}"> --}}
                </div>
                <div class="form-group row font">
                  <textarea name="french" rows="5" class="form-control" placeholder="{{ zactra::translate_lang('In French') }}" required>{{ isset($translation) ? $translation->french : ''}}</textarea>
                  {{-- <input type="text" name="french" class="form-control" placeholder="{{ zactra::translate_lang('In French') }}" value="{{ isset($translation) ? $translation->french : ''}}"> --}}
                </div>
                <div class="form-group row font">
                  <textarea name="german" rows="5" class="form-control" placeholder="{{ zactra::translate_lang('In German') }}" required>{{ isset($translation) ? $translation->german : ''}}</textarea>
                  {{-- <input type="text" name="german" class="form-control" placeholder="{{ zactra::translate_lang('In German') }}" value="{{ isset($translation) ? $translation->german : ''}}"> --}}
                </div>
                <div class="form-group row mb-0 font">
                  <div class="col-md-12 text-right px-0">
                    <button type="submit" class="btn btn-primary pull-right">
                      {{ isset($translation) ? zactra::translate_lang('Update') : zactra::translate_lang('Add Translation') }}
                    </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
