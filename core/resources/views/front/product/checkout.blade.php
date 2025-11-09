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
					<h2 class="title">{{ __('Checkout') }}</h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
						<li class="active" aria-current="page">{{ __('Checkout') }}</li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<form class="needs-validation" action="javascript:;" id="payment_gateway_check" method="POST">
    <!-- Checkout Area Start -->
    <section class="checkout-area">
      <div class="container">
        <div class="row">
          <div class="col-md-5 order-md-2 mb-4">
            <div class="cart-product">
              <h4 class="d-flex justify-content-between align-items-center mb-3 g-title">
                <span>{{ __('Your cart') }}</span>
              @php
                  $countitem = 0;
                  $cartTotal = 0;
                  if($cart){
                      foreach($cart as $p){
                          $cartTotal += (double)$p['price'] * (int)$p['qty'];
                          $countitem += $p['qty'];
                      }
                  }
  
              @endphp
                <span class="badge badge-success badge-pill cart-item-view">{{ $countitem }}</span>
              </h4>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="img">{{ __('Image') }}</th>
                      <th>{{ __('Product Name') }}</th>
                      <th class="t-total">{{ __('Total') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($cart as $id => $item)
                  <tr>
                      <td>
                          <img src="{{ asset('assets/front/img/'.$item['image']) }}" class="w-70" alt="">
                      </td>
                    <td>
                      @php
                          $product = App\Models\Product::findOrFail($id);
                      @endphp
                      <h4 class="product-title">
                        <a href="{{ route('front.product.details',$product->slug) }}">{{ $item['title'] }}</a></h4>
                    </td>
                    <td class="price">{{ Helper::showCurrencyPrice($item['price']) }} * {{ $item['qty'] }}
                      <br>
                      = {{ Helper::showCurrencyPrice($item['price'] * $item['qty']) }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              @php
                  $shipping_methods = DB::table('shippings')->where('language_id',$currentLang->id)->where('status',1)->get();
              @endphp
              @if(count($shipping_methods)>0)
              <div class="add-shiping-methods">
                <h4 class="g-title">{{ __('Shipping Methods') }}</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="cart-header">
                      <tr>
                        <th class="custom-space">#</th>
                        <th>{{ __('Method') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipping_methods as $method)
                        <tr>
                          <td>
                            <input type="radio"  @if ($loop->first) checked @endif  name="shipping_charge" data="{{ Helper::showPrice($method->cost) }}" class="shipping-charge"
                              value="{{ $method->id }}">
                          </td>
                          <td>
                            <p><strong>{{ $method->title }} (<span>{{ Helper::showCurrencyPrice($method->cost) }}</span>)</strong></p>
                            <p><small>{{ $method->subtitle }}</small></p>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              <div class="cart-summery">
                <h4 class="title g-title">
                  {{ __('Cart Summery') }} :
                </h4>
                <table class="table table-bordered">
                  <tr>
                    <th width="33.3%">{{ __('Subtotal') }}</th>
                    <td>{{ Helper::showCurrencyPrice($cartTotal) }} </td>
                  </tr>
                  @if($shipping_methods->count() > 0)
                  @php
                      $shipping_cost = Helper::showPrice(json_decode($shipping_methods,true)[0]['cost']);
                  @endphp
                    <tr>
                      <th width="33.3%">{{ __('Shiping Cost') }}</th>
                      <td>+ <span>{{ Helper::showCurrency() }}</span><span class="shipping_cost">{{ $shipping_cost }}</span> </td>
                    </tr>
                  @endif
                  <tr>
                    <th width="33.3%">Total</th>
                    <td><span>{{ Helper::showCurrency() }}</span><span class="grand_total" data="{{  Helper::showPrice($cartTotal)  }}" >{{ Helper::showPrice($cartTotal + $shipping_cost)  }}</span> </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-7 order-md-1">
            
              <div class="billing-area">
                <h4 class="mb-3 g-title">{{ __('Billing Address') }}</h4>
                  @php
                      $user = Auth::user();
                  @endphp
                <div class="mb-3">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control" id="name" name="billing_name" value="{{ $user->name }}" placeholder="{{ __('Name') }}">
                  @if ($errors->has('billing_name'))
                    <p class="text-danger"> {{ $errors->first('billing_name') }} </p>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="address">{{ __('Address') }}</label>
                  <input type="text" class="form-control" name="billing_address" value="{{ $user->address }}" id="address" placeholder="{{ __('Address') }}">
                  @if ($errors->has('billing_address'))
                    <p class="text-danger"> {{ $errors->first('billing_address') }} </p>
                  @endif
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" class="form-control" name="billing_email" value="{{ $user->email }}" id="email" placeholder="{{ __('Email') }}" value="" >
                    @if ($errors->has('billing_email'))
                    <p class="text-danger"> {{ $errors->first('billing_email') }} </p>
                    @endif
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="number">{{ __('Phone Number') }}</label>
                    <input type="text" class="form-control" id="number" value="{{ $user->phone }}" name="billing_number" placeholder="{{ __('Phone Number') }}" value="" >
                    @if ($errors->has('billing_number'))
                    <p class="text-danger"> {{ $errors->first('billing_number') }} </p>
                    @endif
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country">{{ __('Country') }}</label>
                    <input type="text" class="form-control" name="billing_country" value="{{ $user->country }}" id="country" placeholder="{{ __('Country') }}" >
                    @if ($errors->has('billing_country'))
                    <p class="text-danger"> {{ $errors->first('billing_country') }} </p>
                    @endif
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="billing_state" value="{{ $user->state }}" id="state" placeholder="State" >
                    @if ($errors->has('billing_state'))
                    <p class="text-danger"> {{ $errors->first('billing_state') }} </p>
                    @endif
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip-code">{{ __('Zip Code') }}</label>
                    <input type="text" class="form-control" name="billing_zip_code" value="{{ $user->zipcode }}" id="zip-code" placeholder="Zip Code" >
                    @if ($errors->has('billing_zip_code'))
                    <p class="text-danger"> {{ $errors->first('billing_zip_code') }} </p>
                    @endif
                  </div>
                </div>
              </div>
  
              <div class="ship-diff-toogle">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="is_ship" id="change_address"{{ old('is_ship') == 'on' ? 'checked' : '' }}>
                  <label class="custom-control-label" for="change_address">{{ __('Ship to a different location?') }}</label>
                </div>
              </div>
  
              <div class="shipping-area {{ old('is_ship') == 'on' ? '' : 'd-none' }}" id="shipping-area">
                <h4 class="mb-3 g-title">{{ __('Shipping Address') }}</h4>
                     <div class="mb-3">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control" id="name" name="shipping_name" placeholder="{{ __('Name') }}">
                  @if ($errors->has('shipping_name'))
                  <p class="text-danger"> {{ $errors->first('shipping_name') }} </p>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="address">{{ __('Address') }}</label>
                  <input type="text" class="form-control" name="shipping_address" id="address" placeholder="{{ __('Address') }}">
                  @if ($errors->has('shipping_address'))
                  <p class="text-danger"> {{ $errors->first('shipping_address') }} </p>
                  @endif
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" class="form-control" name="shipping_email" id="email" placeholder="{{ __('Email') }}" value="" >
                    @if ($errors->has('shipping_email'))
                    <p class="text-danger"> {{ $errors->first('shipping_email') }} </p>
                    @endif
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="number">{{ __('Phone Number') }}</label>
                    <input type="text" class="form-control" id="number" name="shipping_number" placeholder="{{ __('Phone Number') }}" value="" >
                    @if ($errors->has('shipping_number'))
                    <p class="text-danger"> {{ $errors->first('shipping_number') }} </p>
                    @endif
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country">{{ __('Country') }}</label>
                    <input type="text" class="form-control" name="shipping_country" id="country" placeholder="{{ __('Country') }}" >
                    @if ($errors->has('shipping_country'))
                    <p class="text-danger"> {{ $errors->first('shipping_country') }} </p>
                    @endif
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">{{ __('State') }}</label>
                    <input type="text" class="form-control" name="shipping_state" id="state" placeholder="{{ __('State') }}" >
                    @if ($errors->has('shipping_state'))
                    <p class="text-danger"> {{ $errors->first('shipping_state') }} </p>
                    @endif
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip-code">{{ __('Zip Code') }}</label>
                    <input type="text" class="form-control" name="shipping_zip_code" id="zip-code" placeholder="Zip Code" >
                    @if ($errors->has('shipping_zip_code'))
                    <p class="text-danger"> {{ $errors->first('shipping_zip_code') }} </p>
                    @endif
                  </div>
                </div>
              </div>
              @csrf
              <input type="hidden" value="" id="ref_id" name="ref_id">
              <div class="patment-area">
                <hr class="mb-4">
  
                <h4 class="mb-3"> {{ __('Select Payment Gateway') }} </h4>
                <div class="d-block my-3">
                  <div class="payment-gateway">
                      <ul class="select-payment">
                       
                          @foreach (DB::table('payment_gateweys')->where('status',1)->get() as $gateway)
                          <li class="product_payment_gateway_check" data-href="{{ $gateway->id }}" id="{{ $gateway->type == 'automatic' ? $gateway->title : $gateway->title }}">
                              <div class="img">
                                <img src="{{ asset('assets/front/img/'.$gateway->image) }}" title="{{ $gateway->type == 'automatic' ? $gateway->title : $gateway->title }}" alt="gateway-image">
                              </div>
                          </li>
                          @endforeach
                        </ul>
                      @if ($errors->has('gateway'))
                          <p class="text-danger"> {{ $errors->first('gateway') }} </p>
                      @endif
                  </div>
                </div>
                <input type="hidden" value="" id="payment_gateway" name="payment_gateway" value="payment_gateway">
                <div class="payment_show_check d-none">
                  <div class="row">
                
                    <div class="col-md-6 mb-3">
                      <label for="cc-number">{{ __('Credit Card Number') }}</label>
                      <input type="text" class="form-control" name="card_number" value="" id="cc-number" placeholder="{{ __('Credit Card Number') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="cc-month">{{ __('Month') }}</label>
                      <input type="text" class="form-control" name="month" value="" id="cc-month" placeholder="{{ __('Month') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-expiration">{{ __('Expaire Year') }}</label>
                        <input type="text" class="form-control" name="year" value="" id="cc-expiration" placeholder="{{ __('Expaire') }}">
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="cc-cvv">{{ __('CVC') }}</label>
                        <input type="text" class="form-control" name="cvc" value="" id="cc-cvv" placeholder="{{ __('CVC') }}">
                      </div>
                  </div>
              </div>
  
              <input type="hidden" name="currency_code" value="{{ Helper::showCurrencyCode() }}">
              <input type="hidden" name="currency_sign" value="{{ Helper::showCurrency() }}">
              <input type="hidden" name="currency_value" value="{{ Helper::showCurrencyValue() }}">
                <hr class="mb-4">
                <button class="main-btn paystack_btn" type="submit">{{ __('Place Order') }}</button>
              </div>
          </div>
        </div>
      </div>
    </section>
</form>
<input type="hidden" id="product_paypal" value="{{route('product.paypal.submit')}}">
<input type="hidden" id="product_stripe" value="{{route('product.stripe.submit')}}">
<input type="hidden" id="product_paytm" value="{{route('product.paytm.submit')}}">
<input type="hidden" id="product_paystack" value="{{route('product.paystack.submit')}}">
<input type="hidden" id="product_cash_on_delivery" value="{{route('product.cash_on_delivery.submit')}}">
<!-- Checkout Area End -->

@endsection
@php
$data = App\Models\PaymentGatewey::whereKeyword('paystack')->first();
$paydata = $data->convertAutoData();

  if (Session::has('currency')){
        $curr = App\Models\Currency::where('id', session()->get('currency'))->first();
    }
    else
    {
        $curr = App\Models\Currency::where('is_default', 1)->first();
    }
@endphp

@section('script')

<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
 
  $(document).on('submit','.product_paystack',function(e){
    e.preventDefault();
    let shipcost = parseFloat($('.shipping_cost').text());
    
    shipcost = parseFloat(shipcost).toFixed();
      var total = parseFloat('{{ Helper::showPrice($cartTotal)  }}') + parseFloat($('.shipping_cost').text());
          
          var handler = PaystackPop.setup({
            key: '{{$paydata['key']}}',
            email: '{{$user->email}}',
            amount: total * 100,
            currency: '{{Helper::showCurrencyCode()}}',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
              $('#ref_id').val(response.reference);
              $('.product_paystack').removeClass('product_paystack');
              $('.paystack_btn').click();
            },
            onClose: function(){
              window.location.reload();
            }
          });
          handler.openIframe();
              return false;
  });
</script>

@endsection

