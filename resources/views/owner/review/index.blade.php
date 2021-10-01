@extends('owner.layouts.app')
@section('title')
<title>Reviews</title>
@endsection
@section('body')
<div class="breadcrumb-header justify-content-between">
  <div>
    <h4 class="content-title mb-2">Hi, welcome back!</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/owner') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reviews</li>
      </ol>
    </nav>
  </div>
</div>
<div class="container mmap-0">
  <div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-header pb-0">
         <div class="d-flex justify-content-between">
           <h4 class="card-title mg-b-0 mt-2">Reviews</h4>
           <i class="mdi mdi-dots-horizontal text-gray"></i>
         </div>
         <p class="tx-12 text-muted mb-2">List of all reviews for your system</p>
       </div>
          <div class="card-body mt-5 table-responsive">
            <table class="table table-hover">
              <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">REVIEW</th>
                <th scope="col">RATING</th>
                <th scope="col">ACTION</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($reviews as $key => $value)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ ucfirst($value->name) }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ zactra::limit_words($value->review,80) }}</td>
                    <td>{{ $value->rating }}</td>
                    <td>
                      <div class="dropdown show">
                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="javascript:void(0)" onclick="getreview(this)" data-review="{{ $value->review }}" data-toggle="modal" data-target="#exampleModalCenter">View Review</a>
                          <a class="dropdown-item" href="{{ route('owner.delete.review',$value->id) }}" onclick="return confirm('Are You Sure?')">Delete</a>
                          @if ($value->show_home=='no')
                            <a class="dropdown-item" href="{{ route('owner.show.review',$value->id) }}">Show on Home Page</a>
                          @else
                            <a class="dropdown-item" href="{{ route('owner.hide.review',$value->id) }}">Hide from Home Page</a>
                          @endif
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12 mt-3">
            <div class="float-right">
              {{$reviews->links()}}
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Full Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="showreview"></p>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function getreview(ob) {
    var review = $(ob).attr('data-review');
    $('.showreview').html(review);
  }
</script>

@endsection
