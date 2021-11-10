@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('To Do') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admins') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('To Do List') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="card">
      <div class="card-body">
        <form>
          <div class="row">
            @if(auth()->user()->role=='receptionist')
              <div class="col-md-4 col-sm-12 col-12 mmb-5">
                <div class="">
                  <select class="form-control" name="admin" id="gender">
                    <option disabled="disabled" selected="selected" class="p-5 m-5">{{ zactra::translate_lang('Admin') }}</option>
                    @foreach($admins as $id => $value)
                    <option value="{{$id}}" class="p-5 m-5">{{$value}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-12 pt-2 mmb-5">
                <input type="checkbox" class="" name="assign" placeholder="{{ zactra::translate_lang('To Do Title') }}" />
                {{ zactra::translate_lang('Assigned') }}
              </div>
            @else
              <div class="col-md-6 col-sm-6 col-6"></div>
            @endif
            <div class="col-md-5 col-sm-12 col-12 mmb-5">
              <input type="text" name="title" class="form-control" placeholder="{{ zactra::translate_lang('To Do Title') }}" />
            </div>
            <div class="col-md-1 pr-1 pl-0 col-sm-6 col-6 col-sm-12 col-12 mml-12">
              <input type="submit" value="{{ zactra::translate_lang('Search') }}" class="btn btn-primary" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 col-sm-12 col-12">
    <div class="card">
      <div class="card-header">
        <label class="header m-2">{{ zactra::translate_lang('To Do List') }}</label>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">{{ zactra::translate_lang('#') }}</th>
                <th scope="col">{{ zactra::translate_lang('Full Name') }}</th>
                <th scope="col">{{ zactra::translate_lang('Dispute Title') }}</th>
                @if(auth()->user()->role=='receptionist')
                <th scope="col">{{ zactra::translate_lang('Assignment') }}</th>
                <th scope="col">{{ zactra::translate_lang('Action') }}</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($toDos as $todo)
                @php
                  $key = 0;
                @endphp
              <tr data-id="{{$todo->id}}">
                <th scope="row">{{ $key+1 }}</th>
                <td><a href="{{route('adminRec.client.profile', $todo->client_id)}}" role="button">{{$todo->client->full_name()}}</a></td>
                <td>{{$todo->title}}</td>
                @if(auth()->user()->role=='receptionist')
                <td>
                  {!! Form::select('todo[user_id]',[""=>""]+$admins,$todo->user_id ,['class'=>'selectize-owner', 'id' => 'select-account']); !!}
                </td>
                <td>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <button class="btn">
                    <a href="{{ route('adminRec.toDolist.destroy',$todo->id) }}" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash text-danger"></i></a>
                  </button>
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $toDos->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/lib/selectize.min.js?v=2') }}"></script>
<script src="{{ asset('js/todo-list.js?v=2') }}"></script>
@endsection
@section('css')
<link href="{{asset('css/lib/selectize.css')}}" rel="stylesheet" type="text/css" />
@endsection
