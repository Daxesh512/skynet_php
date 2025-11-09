

    @if(Session::has('cart') && count(Session::get('cart')) != 0)

    <div class="dropdownmenu-wrapper">
        <div class="dropdown-cart-header">
        <span class="item-no">
            <span class="cart-quantity cart-item-view cart-count">
            {{ count($cart) }}
            </span> {{ __('Item(s)') }}
        </span>

        <a class="view-cart" href="{{ route('front.cart') }}">
            {{ __('View Cart') }}
        </a>
        </div>
        <ul class="dropdown-cart-products" id="view_cart_info">

            @php
                $cart = Session::get('cart');
                $cartTotal = 0;
            @endphp

            @foreach ($cart as  $key => $item)
            @php
            $cartTotal += (double)$item['price'] * (int)$item['qty'];
            $product = App\Models\Product::findOrFail($key);
            @endphp
            <li class="product product_remove{{ $key }}">
                <figure class="product-image-container">
                <a href="{{ route('front.product.details',$product->slug) }}" class="product-image">
                    <img src="{{ asset('assets/front/img/'.$item['image']) }}" alt="product">
                </a>
                <div class="cart-remove header_item_remove" data-href="{{route('cart.item.remove',$key)}}" rel="{{ $key }}">
                    <i class="fas fa-times"></i>
                </div>
                </figure>
                <div class="product-details">
                <div class="content">
                    <a href="{{ route('front.product.details',$product->slug) }}">
                    <h4 class="product-title">{{ $item['title'] }}</h4>
                    </a>
                    <span class="cart-product-info">
                    <span id="prct101S000000">{{ Helper::showCurrencyPrice($item['price']) }} * {{ $item['qty'] }}</span>
                    </span>
                </div>
                </div>
            </li>
            @endforeach
        </ul>
            <div class="dropdown-cart-total">
                <span>Total</span>
                <span class="cart-total-price">
                <span class="cart-total">{{ Helper::showCurrencyPrice($cartTotal) }}
                </span>
                </span>
            </div>

        <div class="dropdown-cart-action">
        <a href="{{ route('front.checkout') }}" class="main-btn">{{ __('Checkout') }}</a>
        </div>
    </div>
    @else
            <p class="cart-empty">{{ __('Cart is empty') }}</p>
    @endif

