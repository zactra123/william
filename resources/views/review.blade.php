@extends('layouts.layout1')
@section('content')
  <br><br><br><br><br><br><br><br>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <div class="container my-5">
    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
      {{-- <div class="card p-5">
        <div class="row">
          <input type="radio" class="hidden" name="star-selector" value="1"/><i class="fa fa-star"></i>
          <input type="radio" class="hidden" name="star-selector" value="2"/><i class="fa fa-star"></i>
          <input type="radio" class="hidden" name="star-selector" value="3"/><i class="fa fa-star"></i>
          <input type="radio" class="hidden" name="star-selector" value="4"/><i class="fa fa-star"></i>
          <input type="radio" class="hidden" name="star-selector" value="5"/><i class="fa fa-star"></i>
        </div>
      </div> --}}
      <div class="row">
	</div>
    <div class="row lead">
        <div id="stars" style="" class="starrr"></div>
        <br>

	</div>
  <div class="row">
      <strong>You gave a rating of <span id="count">0</span> star(s)</strong>
  </div>

    </div>
  </div>

<script type="text/javascript">
var __slice = [].slice;

(function($, window) {
var Starrr;

Starrr = (function() {
  Starrr.prototype.defaults = {
    rating: void 0,
    numStars: 5,
    change: function(e, value) {}
  };

  function Starrr($el, options) {
    var i, _, _ref,
      _this = this;

    this.options = $.extend({}, this.defaults, options);
    this.$el = $el;
    _ref = this.defaults;
    for (i in _ref) {
      _ = _ref[i];
      if (this.$el.data(i) != null) {
        this.options[i] = this.$el.data(i);
      }
    }
    this.createStars();
    this.syncRating();
    this.$el.on('mouseover.starrr', 'span', function(e) {
      return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
    });
    this.$el.on('mouseout.starrr', function() {
      return _this.syncRating();
    });
    this.$el.on('click.starrr', 'span', function(e) {
      return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
    });
    this.$el.on('starrr:change', this.options.change);
  }

  Starrr.prototype.createStars = function() {
    var _i, _ref, _results;

    _results = [];
    for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
      _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty' style='font-size:50px;color:yellow'></span>"));
    }
    return _results;
  };

  Starrr.prototype.setRating = function(rating) {
    if (this.options.rating === rating) {
      rating = void 0;
    }
    this.options.rating = rating;
    this.syncRating();
    return this.$el.trigger('starrr:change', rating);
  };

  Starrr.prototype.syncRating = function(rating) {
    var i, _i, _j, _ref;

    rating || (rating = this.options.rating);
    if (rating) {
      for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
      }
    }
    if (rating && rating < 5) {
      for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    }
    if (!rating) {
      return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
    }
  };

  return Starrr;

})();
return $.fn.extend({
  starrr: function() {
    var args, option;

    option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
    return this.each(function() {
      var data;

      data = $(this).data('star-rating');
      if (!data) {
        $(this).data('star-rating', (data = new Starrr($(this), option)));
      }
      if (typeof option === 'string') {
        return data[option].apply(data, args);
      }
    });
  }
});
})(window.jQuery, window);

$(function() {
return $(".starrr").starrr();
});

$( document ).ready(function() {

$('#stars').on('starrr:change', function(e, value){
  $('#count').html(value);
});

$('#stars-existing').on('starrr:change', function(e, value){
  $('#count-existing').html(value);
});
});
</script>

@endsection
