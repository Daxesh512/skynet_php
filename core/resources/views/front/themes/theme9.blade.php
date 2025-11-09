@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

    @if ($extra_visibility->is_t9_slider_section == 1)
        <!-- Hero Area Start -->
        <section class="ecommerce-slider">
            <div class="banner-slider  banner-slider-active" >
                @foreach ($esliders as $eslider)
                <div class="single-banner"  style="background-image: url({{ asset('assets/front/img/slider/'.$eslider->background_image ) }}">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="banner-text">
                                    <div class="banner-content">
                                        <h1 data-animation="fadeInDown" data-delay="0.8s" class="title">
                                            {{ $eslider->title }}
                                        </h1>
                                        <span class="only"  data-animation="fadeInDown" data-delay="0.7s" >{{ __('ONLY') }}</span>
                                        <h4 class="price"  data-animation="fadeInDown"  data-delay="0.6s" >{{Helper::showCurrencyPrice($eslider->price)}}</h4>
                                        <a data-animation="fadeInDown" data-delay="0.5s" class="main-btn rounded-btn icon-right small-size" href="{{ $eslider->button_link }}">
                                            {{ $eslider->button_text }} <i class="fal fa-long-arrow-right"></i>
                                        </a>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="banner-img" data-animation="fadeInDown" data-delay="0.7s">
                                    <img src="{{ asset('assets/front/img/slider/'.$eslider->image) }}" alt="Banner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
               <!-- Shape Bottom -->
        </section>
        <!-- Hero Area End -->
    @endif

    @if ($extra_visibility->is_t9_banner_section == 1)
        {{-- Ecommerce Banner Start --}}
        <div class="e-section-banner section-gap-top">
            <div class="container">
                <div class="row">
                    @foreach ($ebanners as $ebanner)
                        <div class="col-lg-6">
                            <div class="single-banner">
                                <img src="{{asset('assets/front/img/'.$ebanner->image)}}" alt="Image">
                                <div class="content">
                                    <div class="inner-content">
                                        <h3>{{ $ebanner->title }}</h3>
                                        <h4><small>{{ __('Starts From') }}</small> {{Helper::showCurrencyPrice($ebanner->price)}}</h4>
                                        <a href="{{ $ebanner->button_link }}" class="main-btn">{{ $ebanner->button_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Ecommerce Banner End --}}
    @endif

    @if ($extra_visibility->is_t9_popularcategory_section == 1)
        {{-- Popular Category Section Start --}}
        <section class="popular-category-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title e-section-title mb-30 text-center">
                            <h2 class="title">{{  __('Popular Categories') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($popularCategories as $item)
                        <div class="col-lg-3 col-md-6">
                            <a href="#" class="p-single-category">
                                <img src="{{asset('assets/front/img/'.$item->image)}}" alt="Image">
                                <h4>{{  $item->name  }}</h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- Popular Category Section End --}}
    @endif



    @if ($extra_visibility->is_t9_newproduct_section == 1)
        {{-- Popular Category Section Start --}}
        <section class="popular-category-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title e-section-title mb-30 text-center">
                            <h2 class="title">{{  __('New Product') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row entry-products">
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item mb-30">
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
                                <div class="rate">
                                  <div class="rating" style="width:{{$product->rating * 20}}%"></div>
                                </div>
                                <p class="price"><del>{{Helper::showCurrencyPrice($product->previous_price)}}</del> {{Helper::showCurrencyPrice($product->current_price)}}</p>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
            </div>
        </section>
        {{-- Popular Category Section End --}}
    @endif

    @if ($extra_visibility->is_t9_featureproduct_section == 1)
        @foreach ($featuredCategories as $fCategory)
        <section class="popular-category-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title e-section-title mb-30 text-center">
                            <h2 class="title">{{  $fCategory->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row entry-products">
                    @foreach ($fCategory->products->where('status',1)->take(8) as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item mb-30">
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
                                <div class="rate">
                                  <div class="rating" style="width:{{$product->rating * 20}}%"></div>
                                </div>
                                <p class="price"><del>{{Helper::showCurrencyPrice($product->previous_price)}}</del> {{Helper::showCurrencyPrice($product->current_price)}}</p>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
            </div>
        </section>
        @endforeach
    @endif
        <div class="d-block mb-5 pb-5"></div>
        
@endsection
