@extends('layouts.layout1')
@section('content')
<br>
<div class="container my-5 pb-5">
  <div class="col-md-12 col-lg-12 col-sm-12 col-12">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="card p-3">
          <div class="row pl-5 justify-content-center">
            <img src="https://user-images.trustpilot.com/default/v1/73x73.png" width="30" alt="{{ zactra::translate_lang('image') }}" /> <span class="ml-3 pt-1"><a class="fs-20" href="{{ route('web.review.create') }}">{{ zactra::translate_lang('Write a review') }}</a> </span>
            <span class="ml-4 pt-2" style="color: yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
          </div>
        </div>
      </div>
    </div>
    @if (count($review)>0)
    <div class="row mb-4">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="card p-3 mt-4">
          <span class="fs-18">{{ zactra::translate_lang('Total Reviews') }} (<span class="bold">{{ isset($total) ? $total : '' }}</span>)</span>
          <hr />
          <div class="row">
            <div class="col-md-2 text-center">
              <span>{{ zactra::translate_lang('Excellent') }}</span>
            </div>
            @php
              $excellentper = ($excellent/$total)*100;
            @endphp
            <div class="col-md-8">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $excellentper }}%;background:#41b77a;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <span>{{ zactra::decimal($excellentper,2) }} {{ zactra::translate_lang('%') }}</span>
            </div>
          </div>
          @php
            $greatper = ($great/$total)*100;
          @endphp
          <div class="row">
            <div class="col-md-2 text-center">
              <span>{{ zactra::translate_lang('Great') }}</span>
            </div>
            <div class="col-md-8">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $greatper }}%;background:#73cf16;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <span>{{ zactra::decimal($greatper,2) }} {{ zactra::translate_lang('%') }}</span>
            </div>
          </div>
          @php
            $averageper = ($average/$total)*100;
          @endphp
          <div class="row">
            <div class="col-md-2 text-center">
              <span>{{ zactra::translate_lang('Average') }}</span>
            </div>
            <div class="col-md-8">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $averageper }}%;background:#ffcf3a;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <span>{{ zactra::decimal($averageper,2) }} {{ zactra::translate_lang('%') }}</span>
            </div>
          </div>
          @php
            $poorper = ($poor/$total)*100;
          @endphp
          <div class="row">
            <div class="col-md-2 text-center">
              <span>{{ zactra::translate_lang('Poor') }}</span>
            </div>
            <div class="col-md-8">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $poorper }}%;background:#fc8739;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <span>{{ zactra::decimal($poorper,2) }} {{ zactra::translate_lang('%') }}</span>
            </div>
          </div>
          @php
            $badper = ($bad/$total)*100;
          @endphp
          <div class="row">
            <div class="col-md-2 text-center">
              <span>{{ zactra::translate_lang('Bad') }}</span>
            </div>
            <div class="col-md-8">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $badper }}%;background:#f93f37;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <span>{{ zactra::decimal($badper,2) }} {{ zactra::translate_lang('%') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @foreach ($review as $key => $value)
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-12">
        <div class="card px-5 py-3 mt-3">
          <div class="row">
            @if ($value->rating=='5')
              <span class="pt-2" style="color: yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
            @elseif($value->rating=='4')
              <span class="pt-2" style="color: yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span><span class="pt-2 ml-1"><i class="fa fa-star"></i></span>
            @elseif($value->rating=='3')
              <span class="pt-2" style="color: yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
              <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
            @elseif($value->rating=='2')
              <span class="pt-2" style="color: yellow;"><i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
              <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
            @elseif($value->rating=='1')
              <span class="pt-2" style="color: yellow;"><i class="fa fa-star"></i> </span>
              <span class="pt-2"><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i><i class="fa fa-star ml-1"></i></span>
            @endif
          </div>
          <div class="row mt-2"><strong>{{ ucfirst($value->name) }},</strong>&nbsp; on {{ zactra::convertDay($value->created_by) }}</div>
          <div class="row mt-2">
            {{ $value->review }}
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="row pull-right mt-3 mb-3">
      <div class="col-md-12">
        {{ $review->links() }}
      </div>
    </div>
    @endif
  </div>
</div>

<style media="screen"></style>
@endsection
