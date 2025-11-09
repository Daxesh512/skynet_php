

<div class="tab-pane fade active show" id="v-pills-ptab{{ $category_id->id }}" role="tabpanel" aria-labelledby="v-pills-ptab{{ $category_id->id }}-tab">
    <div class="row">
        @foreach ($products as $product)
      <div class="col-md-3">
        <div class="product-item">
            <div class="product-thumb">
                <img src="{{asset('assets/front/img/'.$product->image)}}" alt="Image">
                @if($product->stock <= 0)
                  @if ($product->is_downloadable != 1)
                    <span class="tag">{{ __('Stock Out') }}</span>
                  @endif
                @endif
                <div class="product-overlay">
                    <ul>
                        <li><a href="javascript:;" data-href="{{route('add.cart',$product->id)}}" class="cart-link"  data-toggle="tooltip" data-placement="right" title="{{ __('Add To Cart') }}"><i class="fal fa-shopping-cart"></i></a></li>
                        <li>
                          <form class="d-inline-block" method="GET" action="{{route('front.product.checkout',$product->slug)}}">
                            <button class=""  data-toggle="tooltip" data-placement="right" title="{{ __('Buy Now') }}"> <i class="fal fa-shopping-bag"></i></button>
                          </form>
                        <li><a href="{{ route('front.product.details',$product->slug) }}" data-toggle="tooltip" data-placement="right" title="{{ __('View Details') }}"><i class="fal fa-eye"></i></a></li>
                    </ul>
                </div>
            </div>
        
          <div class="product-content">
            <h5 class="title"><a href="{{ route('front.product.details',$product->slug) }}">{{$product->title}}</a></h5>
            <p class="price"><del>{{Helper::showCurrencyPrice($product->previous_price)}}</del> {{Helper::showCurrencyPrice($product->current_price)}}</p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>

