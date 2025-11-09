@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")

@php
    $reviews = App\Models\ProductReview::where('product_id', $product->id)->get();
    $avarage_rating = App\Models\ProductReview::where('product_id',$product->id)->avg('review');
    $avarage_rating =  round($avarage_rating,2);

    if(Auth::user()){
        $userID = Auth::user()->id;
    }else{
        $userID = null;
    }

    $userOrders = App\Models\Order::where('user_id', $userID)->get();

    $isBuyProduct = '';

    foreach ($userOrders as $key => $userOrder) {
      $cart = json_decode($userOrder->cart,true);
      foreach ($cart as $key => $item){
        if($item['id'] == $product->id){
          $isBuyProduct = true;
        }
      }
    }


@endphp

@section('content')

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area"
        style="background-image: url('{{ asset('assets/front/img/' . $setting->breadcrumb_image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{ __('Product Details') }}</h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                            <li class="active" aria-current="page">{{ __('Product Details') }}</li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!-- Product Details Section Start -->
    <section class="product-details-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="product-gallery-wrap mb-md-gap-50">
                       @php
                           $pc = App\Models\ProductImage::where('product_id', $product->id)->first();
                       @endphp
                        @if ($pc)
                            <div class="product-main-slider">
                                @foreach ($product->product_images as $image)
                                    <div class="image">
                                        <img src="{{ asset('assets/front/img/' . $image->image) }}" alt="Image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-thumb-slider mt-30 row">
                                @foreach ($product->product_images as $image2)
                                    <div class="image col">
                                        <img src="{{ asset('assets/front/img/' . $image2->image) }}" alt="Image">
                                    </div>
                                @endforeach
                            </div> 
                        @else
                            <div class="s-image">
                                <img src="{{asset('assets/front/img/'.$product->image)}}" alt="Image">
                            </div>
                        @endif
                        
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product-summery">
                        <div class="rate">
                            <div class="rating" style="width:{{$product->rating * 20}}%"></div>
                        </div>

                        <h4 class="title">{{ $product->title }}</h4>
                        <p class="price">{{ Helper::showCurrencyPrice($product->current_price) }}
                            <del>{{ Helper::showCurrencyPrice($product->previous_price) }}
                        </p>

                        <div class="product-meta">
                            <ul>
                                @if ($product->stock > 0)
                                    @if ($product->is_downloadable != 1)
                                        <li class="stock"><span>{{ __('Stock') }}:</span> {{ __('In Stock') }}</li>
                                    @endif
                                @else
                                    <li class="out-stock"><span>{{ __('Stock') }}:</span> {{ __('Out of Stock') }}
                                    </li>
                                @endif
                                <li><span>{{ __('Category') }} : </span>{{ $product->category->name }}</li>
                                <li><span>{{ __('SKU') }} : </span>{{ $product->sku }}</li>
                            </ul>
                        </div>
                        <p class="short-desc">{{ $product->short_description }}</p>
                            @if ($product->is_downloadable != 1)
                                <div class="qtySelector product-quantity">
                                    <span class="decreaseQty subclick"><i class="fas fa-minus "></i></span>
                                    <input type="text" class="qtyValue cart-amount" value="1" />
                                    <span class="increaseQty addclick"><i class="fas fa-plus"></i></span>
                                    <input type="hidden" value="{{ $product->stock }}" id="current_stock">
                                </div>
                            @endif
                        <div class="cart-buttons">
                            <a data-href="{{ route('add.cart', $product->id) }}" href="javascript:;"
                                class="main-btn add-cart-btn first cart-link"> {{ __('Add
                    to Cart') }}
                                <i class="fas fa-shopping-cart"></i></a>

                            <form class="d-inline-block ml-2" method="GET"
                                action="{{ route('front.product.checkout', $product->slug) }}">
                                <input type="hidden" class="qtyValue cart-amount" value="1" />
                                <button class="main-btn add-cart-btn"> {{ __('Buy Now') }} <i
                                        class="fas fa-shopping-basket"></i></button>
                            </form>
                        </div>

                        @if($visibility->is_shop_share_links == 1 )
                        <div class="a2a_kit a2a_kit_size_32">
                            <ul class="social-share">
                                <li>
                                    <a class="facebook a2a_button_facebook" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="twitter a2a_button_twitter" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkedin a2a_button_linkedin" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="pinterest a2a_button_pinterest" href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="product-details-tab">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#descriptions"
                                    role="tab">{{ __('Description') }}</a> 
                            </li>
                            @if ($product->attributes_title  &&  $product->attributes_description )
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specifications"
                                        role="tab">{{ __('Features') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#review" role="tab">{{ __('Reviews') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="descriptions" role="tabpanel">
                                {!! $product->description !!}
                            </div>
                            @if ($product->attributes_title  &&  $product->attributes_description)
                            <div class="tab-pane fade" id="specifications" role="tabpanel">
                                <table class="table table-bordered">
                                    @if ($product->attributes_title && $product->attributes_description)
                                        @foreach (explode(',,,', $product->attributes_title) as $attr_key => $attr_title)
                                            @php
                                                $attr_desc = explode(',,,', $product->attributes_description)[$attr_key];
                                            @endphp
                                            <tr>
                                                <th>{{ $attr_title }}</th>
                                                <td>{{ $attr_desc }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                            @endif
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <div class="review-wrapper">

                                  @if (count($reviews) > 0)
                                    @foreach ($reviews as $review)
                                      <div class="review-single">
                                        <div class="avatar">
                                            <img src="{{ $review->user->image ? asset('assets/front/img/' . $review->user->image) : 'no-image' }}"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="comnt-text">
                                            <div class="comnt-info">
                                                <h5>{{ $review->user->name }}</h5>
                                                <div class="review-block">
                                                  <div class="rate">
                                                    <div class="rating" style="width:{{$review->review * 20}}%"></div>
                                                  </div>
                                                </div>
                                                <p class="date-area">{{ $review->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p class="">{{ $review->comment }}</p>
                                        </div>
                                      </div>
                                    @endforeach
                                  @else
                                    <div class="bg-light mt-4 text-center py-5">
                                      {{__('No Rating Available')}}
                                    </div>
                                  @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if (Auth::user())
                                            @if ($isBuyProduct == true)

                                                <div class="review-form">
                                                    <h3 class="mb-60">{{ __('Add a Review') }}</h3>

                                                    <div class="star-area d-flex justify-content-between">
                                                        <h5>{{ __('Your Rating:') }}</h5>
                                                        <ul class="star-list">
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="1">
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="2">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="active">
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="3">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="4">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="5">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <form action="{{ route('front.review.submit') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="review" id="rating_get" value="">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"
                                                            id="">
                                                        <div class="form-group mb-30">
                                                            <textarea class="form-control"  name="comment" rows="10"
                                                                placeholder="{{ __('Your Message') }}"></textarea>
                                                        </div>
                                                        <button class="main-btn"
                                                            type="submit">{{ __('Post a Review') }}</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @else
                                            <div class="review-form">
                                                <a href="{{ route('user.login') }}"
                                                    class="main-btn">{{ __('Login') }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Product Details Section Start -->


@endsection


@section('script')

@endsection
