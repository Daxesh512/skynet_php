

    <?php if(Session::has('cart') && count(Session::get('cart')) != 0): ?>

    <div class="dropdownmenu-wrapper">
        <div class="dropdown-cart-header">
        <span class="item-no">
            <span class="cart-quantity cart-item-view cart-count">
            <?php echo e(count($cart)); ?>

            </span> <?php echo e(__('Item(s)')); ?>

        </span>

        <a class="view-cart" href="<?php echo e(route('front.cart')); ?>">
            <?php echo e(__('View Cart')); ?>

        </a>
        </div>
        <ul class="dropdown-cart-products" id="view_cart_info">

            <?php
                $cart = Session::get('cart');
                $cartTotal = 0;
            ?>

            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $cartTotal += (double)$item['price'] * (int)$item['qty'];
            $product = App\Models\Product::findOrFail($key);
            ?>
            <li class="product product_remove<?php echo e($key); ?>">
                <figure class="product-image-container">
                <a href="<?php echo e(route('front.product.details',$product->slug)); ?>" class="product-image">
                    <img src="<?php echo e(asset('assets/front/img/'.$item['image'])); ?>" alt="product">
                </a>
                <div class="cart-remove header_item_remove" data-href="<?php echo e(route('cart.item.remove',$key)); ?>" rel="<?php echo e($key); ?>">
                    <i class="fas fa-times"></i>
                </div>
                </figure>
                <div class="product-details">
                <div class="content">
                    <a href="<?php echo e(route('front.product.details',$product->slug)); ?>">
                    <h4 class="product-title"><?php echo e($item['title']); ?></h4>
                    </a>
                    <span class="cart-product-info">
                    <span id="prct101S000000"><?php echo e(Helper::showCurrencyPrice($item['price'])); ?> * <?php echo e($item['qty']); ?></span>
                    </span>
                </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
            <div class="dropdown-cart-total">
                <span>Total</span>
                <span class="cart-total-price">
                <span class="cart-total"><?php echo e(Helper::showCurrencyPrice($cartTotal)); ?>

                </span>
                </span>
            </div>

        <div class="dropdown-cart-action">
        <a href="<?php echo e(route('front.checkout')); ?>" class="main-btn"><?php echo e(__('Checkout')); ?></a>
        </div>
    </div>
    <?php else: ?>
            <p class="cart-empty"><?php echo e(__('Cart is empty')); ?></p>
    <?php endif; ?>

<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/load/header_cart.blade.php ENDPATH**/ ?>