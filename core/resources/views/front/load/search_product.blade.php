<div class="col-lg-3 blog-sidebar">
    <div class="widget product-category">
        <h4 class="widget-title">
          {{ __('Categories') }}
        </h4>
        <ul>

            @foreach ($categories as $category)
            <li class="{{request()->input('category') == $category->slug ? 'active' : ''}}">
              <a href="javascript:;" id="category" data="{{$category->slug}}">
                {{$category->name}}
              </a>
            </li>
            @endforeach
        </ul>
      </div>
      
    <div class="widget widget-range-slider mt-30">
      <h6 class="widget-title">{{ __('Price') }} ({{ Helper::showCurrency() }})</h6>
      <div class="price-range-slider">

        <div id="slider"></div>
        <div class="p-info">
        </div>
        <a href="javascript:;" class="filter_price">{{ __('Filter') }}</a>
      </div>
    </div>

    <div class="widget widget-check-rating">
      <h6 class="widget-title">{{ __('Rating') }}</h6>
      <div class="check-area">
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '5' ? 'checked' : ''}} class="rating_count" value="5" name="review_value" id="s1">
          <label for="s1">
            <span class="rating-filter">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </span>
          </label>
        </div>
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '4' ? 'checked' : ''}} class="rating_count" value="4" name="review_value" id="s2">
          <label for="s2">

            <span class="rating-filter">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </span>
          </label>
        </div>
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '3' ? 'checked' : ''}} class="rating_count" value="3" name="review_value" id="s3">
          <label for="s3">
            <span class="rating-filter">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </span>
          </label>
        </div>
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '2' ? 'checked' : ''}} class="rating_count" value="2" name="review_value" id="s4">
          <label for="s4">

            <span class="rating-filter">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </span>
          </label>
        </div>
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '1' ? 'checked' : ''}} class="rating_count" value="1" name="review_value" id="s5">
          <label for="s5">
            <span class="rating-filter">
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </span>
          </label>
        </div>
        <div class="form-group">
          <input type="radio" {{request()->input('rating') == '1' ? 'checked' : ''}} class="rating_count" value="0" name="review_value" id="s6"
          ><label for="s6">
            <span class="rating-filter">
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </span>
          </label>
        </div>
      </div>
    </div>
  </div>