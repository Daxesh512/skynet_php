@extends('front.layout')
@section('meta-keywords', "$seo->product_meta_key")
@section('meta-description', "$seo->product_meta_desc")


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/jquery-ui.css">
@endsection


@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('Products') }}</h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
						<li class="active" aria-current="page">{{ __('Products') }}</li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

  <!-- Product Area Start -->
  <section class="product-area section-gap">
    <div class="container">
      <div class="row justify-content-center">
       @include('front.load.search_product',$categories)
        <div class="col-lg-9">
            <div class="shop-top-bar">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-4">
                        <div class="shop-search-form serch-form">
                            <div class="input-box">
                                <input type="text" id="searchProductInput" value="{{request()->input('search')}}" placeholder="{{ __('Search Product') }}...">
                                <button id="searchProduct"><i class="fal fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="product-sorting">
                            <select class="form-control product-sorting-select" id="sorting">
                              <option value="new" {{request()->input('type') == 'new' ? 'selected' : ''}} >{{ __('Newest') }}</option>
                              <option value="old" {{request()->input('type') == 'old' ? 'selected' : ''}} >{{ __('Oldest') }}</option>
                              <option value="high_low" {{request()->input('type') == 'high_low' ? 'selected' : ''}}>{{ __('Highest To Lowest') }}</option>
                              <option value="low_high" {{request()->input('type') == 'low_high' ? 'selected' : ''}}>{{ __('Lowest To Highest') }}</option>
                            </select>
                          </div>
                    </div>
                </div>
            </div>
          <div class="row entry-products">
           
            @foreach ($products as $product)
            <div class="col-md-4 col-sm-6">
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
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <nav aria-label="Page navigation example">
                  {{$products->links()}}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Area End -->
  <form action="{{route('front.products')}}" method="GET" id="search_product">
    <input type="hidden" name="category" value="{{request()->input('category')}}" id="category_id">
    <input type="hidden" name="search" value="{{request()->input('search')}}" id="search">
    <input type="hidden" name="max" value="{{request()->input('max')}}" id="max">
    <input type="hidden" name="min" value="{{request()->input('min')}}" id="min">
    <input type="hidden" name="type" value="{{request()->input('type')}}" id="type">
    <input type="hidden" name="rating" value="{{request()->input('rating')}}" id="rating">
    <button type="submit" id="search_submit" class="d-none"></button>
  </form>
    


@endsection


@section('script')
    <script src="{{ asset('assets/front/') }}/js/jquery-ui.js"></script>


    <script>
        $(document).on('change','.rating_count',function(){
            $('#search_product #rating').val($(this).val());
            submit();
        });

        $(document).on('click','.filter_price',function(){
            let max = $('.price-range-max').html();
            let min = $('.price-range-min').html();
            $('#search_product #max').val(max);
            $('#search_product #min').val(min);
            submit();
        });

        $(document).on('change','#sorting',function(){
            let sort = $(this).val();
            $('#type').val(sort);
            submit();
        });

        $(document).on('click','#searchProduct',function(){
            let search = $('#searchProductInput').val();
            console.log(search);
            $('#search').val(search);
            submit();
        });


        $(document).on('click','#category',function(){
            let category = $(this).attr('data');
            $('#category_id').val(category);
            submit();
        });



        function submit(){
            $('#search_submit').click();
        }



        function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;
        if (r1 < x2 || x1 > r2) return false;
        return true;
        }

        // Fetch Url value
        var getQueryString = function (parameter) {
        var href = window.location.href;
        var reg = new RegExp("[?&]" + parameter + "=([^&#]*)", "i");
        var string = reg.exec(href);
        return string ? string[1] : null;
        };
        // End url

        // // slider call
        $("#slider").slider({
            range: true,
            min: 0,
            max: 9999,
            step: 1,
            values: [
            getQueryString("minval") ? getQueryString("minval") : '{{request()->input('min') ? request()->input('min') : 0 }}',
            getQueryString("maxval") ? getQueryString("maxval") :'{{request()->input('max') ? request()->input('max') : '' }}',
            ],

            slide: function (event, ui) {
            $(".ui-slider-handle:eq(0) .price-range-min").html( ui.values[0]);
            $(".ui-slider-handle:eq(1) .price-range-max").html( ui.values[1]);
            $(".price-range-both").html(
                "<i>" + ui.values[0] + " - </i>" + ui.values[1]
            );

            // get values of min and max
            $("#minval").val(ui.values[0]);
            $("#maxval").val(ui.values[1]);

            if (ui.values[0] == ui.values[1]) {
                $(".price-range-both i").css("display", "none");
            } else {
                $(".price-range-both i").css("display", "inline");
            }

            if (collision($(".price-range-min"), $(".price-range-max")) == true) {
                $(".price-range-min, .price-range-max").css("opacity", "0");
                $(".price-range-both").css("display", "block");
            } else {
                $(".price-range-min, .price-range-max").css("opacity", "1");
                $(".price-range-both").css("display", "none");
            }
            },
        });

        $(".ui-slider-range").append(
            '<span class="price-range-both value"><i>' +
            $("#slider").slider("values", 0) +
            " - </i>" +
            $("#slider").slider("values", 1) +
            "</span>"
        );

        $(".ui-slider-handle:eq(0)").append(
            '<span class="price-range-min value">' +
            $("#slider").slider("values", 0) +
            "</span>"
        );

        $(".ui-slider-handle:eq(1)").append(
            '<span class="price-range-max value">' +
            $("#slider").slider("values", 1) +
            "</span>"
        );

    </script>
@endsection