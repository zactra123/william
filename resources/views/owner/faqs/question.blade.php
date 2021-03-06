@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Questions') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Questions') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="container mmap-0">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0 mt-2">{{ zactra::translate_lang('Faqs Questions') }}</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
          <p class="tx-12 text-muted mb-2">{{ zactra::translate_lang('List of all faqs questions for your system...') }}</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">{{ zactra::translate_lang('#') }}</th>
                  <th scope="col">{{ zactra::translate_lang('NAME') }}</th>
                  <th scope="col">{{ zactra::translate_lang('EMAIL') }}</th>
                  <th scope="col">{{ zactra::translate_lang('QUESTION') }}</th>
                  <th scope="col">{{ zactra::translate_lang('ACTION') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($questions as $key=> $question)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$question->name}}</td>
                  <td>{{$question->email}}</td>
                  <td>{{$question->question}}</td>
                  <td>
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="dropdown show">
                      <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ zactra::translate_lang('Action') }}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('admin.delete.question',$question->id) }}" onclick="return confirm('Are You Sure?')" data-id="{{ $question->id }}">{{ zactra::translate_lang('Delete') }}</a>
                      </div>
                    </div>
                    {{-- <a href="{{ route('admin.delete.question',$question->id) }}"><button class="btn btn-primary delete2" onclick="return confirm('Are You Sure!')" data-id="{{ $question->id }}">{{ zactra::translate_lang('Delete') }}</button></a> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="float-right">
          {{$questions->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  $(document).ready(function () {
    $(".delete").on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      console.log("test");
      bootbox.confirm("Do you really want to delete record?", function (result) {
        console.log(result);
        if (result) {
          $.ajax({
            url: "/owner/faqs/question/delete/" + id,
            type: "DELETE",
            data: {
              id: id,
              _token: token,
            },
            success: function () {
              console.log("it Works");
              location.reload();
            },
          });
        }
      });
    });
  });
</script>
@endsection
