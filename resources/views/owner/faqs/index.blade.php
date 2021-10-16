@extends('owner.layouts.app')
@section('title')
<title>{{ zactra::translate_lang('Faqs') }}</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">{{ zactra::translate_lang('Hi, welcome back!') }}</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">{{ zactra::translate_lang('Dashboard') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ zactra::translate_lang('Faqs') }}</li>
      </ol>
    </nav>
  </div>
  <div class="mmt-7">
    <a class="btn btn-primary pull-left mmt-7" href="{{ route('owner.faqs.question')}}" role="button">
      {{ zactra::translate_lang('Faqs Questions') }}
    </a>
  </div>
</div>
<div class="container mmap-0">
  <div class="row row-sm">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0 mt-2">{{ zactra::translate_lang('Faqs') }}</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
          <p class="tx-12 text-muted mb-2">
            {{ zactra::translate_lang('List of all faqs for your system...') }}
            <a href="{{ route('owner.faqs.create') }}" class="btn btn-primary float-right btn-sm">{{ zactra::translate_lang('Add New') }}</a>
          </p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table text-md-nowrap" id="example1">
              <thead>
                <tr>
                  <th>{{ zactra::translate_lang('#') }}</th>
                  <th>{{ zactra::translate_lang('Question') }}</th>
                  <th width="60%">{{ zactra::translate_lang('Answer') }}</th>
                  <th>{{ zactra::translate_lang('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($faqs as $key=> $faq)
                <tr>
                  <th scope="row">{{ (($faqs->currentPage() - 1 ) * $faqs->perPage() ) + $loop->iteration }}</th>
                  <td>{{$faq->title}}</td>
                  <td>{{ zactra::limit_words($faq->description,150) }}</td>
                  <td>
                    <div class="dropdown show">
                      <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ zactra::translate_lang('Action') }}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('owner.faqs.edit',$faq->id)}}">{{ zactra::translate_lang('Edit') }}</a>
                        <a class="dropdown-item" href="{{ route('admin.delete.faq',$faq->id) }}" onclick="return confirm('Are You Sure?')">{{ zactra::translate_lang('Delete') }}</a>
                      </div>
                    </div>
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="float-right">
            {{$faqs->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
            url: "/owner/faqs/" + id,
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
