@extends('layouts.admin')
@section('content')
  <section class="ms-user-account">
      <div class="container">
          <div class="row">
              <div class="col-md-3 col-sm-12 mt-5"></div>
              <div class="col-md-12 col-sm-12 mt-5">

                  <div class="ms-ua-box">
                      <div class="col-md-11">
                          <div class="card">

                              <div class="card-header">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <h4>Reviews</h4>
                                    </div>

                                  </div>
                              </div>

                              <div class="card-body mt-5">
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
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                          </div>
                          <div class="col-md-12 mt-3">
                              <div class="row pull-right">
                                {{ $reviews->links() }}
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>

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

<script type="text/javascript">
function getreview(ob) {
  var review = $(ob).attr('data-review');
  $('.showreview').html(review);
}
</script>
@endsection
