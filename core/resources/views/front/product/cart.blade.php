@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
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


  <!-- Cart Area Start -->
  <section class="shoping-cart-area  section-gap">
    @if($cart !=null)
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="cart-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('Image') }}</th>
                      <th>{{ __('Product Name') }}</th>
                      <th>{{ __('Quantity') }}</th>
                      <th>{{ __('Price') }}</th>
                      <th>{{ __('Total') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i = 1;
                          $cartTotal = 0;
                          $countitem = 0;
                      @endphp
                      @foreach ($cart as $pid => $item)
                      @php
                          $countitem += $item['qty'];
                          $cartTotal += (double)$item['price'] * (int)$item['qty'];
                          $product = App\Models\Product::findOrFail($pid);
                      @endphp
                      <input type="hidden" value="{{$pid}}" class="product_id">
                      <tr class="remove{{$pid}}">
                          <td>{{ $i++ }}</td>
                          <td class="product-thumbnail">
                              <img src="{{ asset('assets/front/img/'.$item['image']) }}" alt="product-image">
                          </td>
                          <td class="product-name"> 
                            @php
                                $cproduct = App\Models\Product::where('id', $item['id'])->first();
                            @endphp
                            <a href="{{ route('front.product.details',$cproduct->slug) }}">{{ $item['title'] }}</a>
                          </td>
                          <td class="product-quantity"><input type="number" aria-details="{{ $product->stock }}" name="product_quantity[]" class="quantity form-control cart_qty_update" value="{{ $item['qty'] }}">
                          </td>
                          <td class="product-subtotal">
                            {{Helper::showCurrencyPrice($item['price'])}}
                            
                             <span class="fas fa-times"></span> {{ $item['qty'] }}</td>
                          <td class="product-subtotal"><span>{{ Helper::showCurrency() }}</span><span class="cart_price">{{ Helper::showPrice($item['price']) * $item['qty'] }}</td></span>
                          <td class="product-remove">
                            <a href="javascript:;" class="item-remove" rel="{{$pid}}" data-href="{{route('cart.item.remove',$pid)}}"><i class="far fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-right">
            <div class="update-cart d-inline-block">
              <button id="cart_update" rel="{{ __('Updating...') }}" rel2="{{ __('Update Cart')  }}"  data-href="{{route('cart.update')}}" class="main-btn">{{ __('Update Cart') }}</button>

            </div>
          </div>
      </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="cart-total-box">
              <h4 class="title">
                Cart Summery :
              </h4>
              <ul class="list">
                <li>
                    {{ __('Total Item') }}<span>{{ $countitem }}</span>
                </li>
                <li>
                  {{ __('Total') }} <span>{{ Helper::showCurrencyPrice($cartTotal) }}</span>
                </li>
              </ul>
              <a href="{{ route('front.checkout') }}" class="main-btn"> Checkout </a>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="bg-light py-5 text-center">
              <h3 class="text-uppercase">{{__('Cart is empty!')}}</h3>
            </div>
          </div>
        </div>
      </div>
    @endif
  </section>
  <!-- Cart Area End -->

@endsection

