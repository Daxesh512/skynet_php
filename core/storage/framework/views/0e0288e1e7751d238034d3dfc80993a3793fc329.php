<?php
    $links = json_decode($menus, true);
    //  dd($links);
?>

<div class="site-nav-menu">
    <ul class="primary-menu">

        <?php
            $product_category = App\Models\ProductCategory::where('language_id', $currentLang->id)
                ->where('status', 1)
                ->get();
        ?>

        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $href = Helper::getHref($link);

            ?>

            <?php if(strpos($link['type'], 'products-mega') !== false): ?>
                <li class="megamenu-item dn-mobile <?php if($href == URL::current()): ?> current <?php endif; ?>" id="product_view"
                    data=""
                    data-name="<?php echo e($product_category->count() >= 1 ? route('front.product.load', $product_category[0]->id) : ''); ?>">
                    <a class="p-link" href="<?php echo e(route('front.products')); ?>">
                        <?php echo e(__('Product')); ?>

                    </a>
                    <div class="megamenu">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php if($product_category->count() >= 1): ?>
                                        <div class="col-3">
                                            <div class="tabnav" role="tablist" aria-orientation="vertical">
                                                <?php $__currentLoopData = $product_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a class="nav-link view_category_wise_product <?php if($loop->first): ?> active <?php endif; ?>"
                                                        data-name="<?php echo e(route('front.product.load', $pcategory->id)); ?>"
                                                        id="v-pills-ptab<?php echo e($pcategory->id); ?>-tab"
                                                        data-target="<?php echo e($pcategory->id); ?>" data-toggle="pill"
                                                        href="#v-pills-ptab<?php echo e($pcategory->id); ?>" role="tab"
                                                        aria-controls="v-pills-ptab<?php echo e($pcategory->id); ?>"
                                                        aria-selected="true"><?php echo e($pcategory->name); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('front.products')); ?>"
                                                    class="nav-link"><?php echo e(__('All Categories')); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="tab-content" id="ajax_product_view">
                                                <img class="loader_ajax" src="<?php echo e(asset('assets/front/tenor.gif')); ?>"
                                                    alt="">
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-lg-12 text-center bg-white">
                                            <span><?php echo e(__('No Category & Product Found')); ?> </span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="pore db-mobile <?php if(request()->path() == 'products'): ?> current <?php endif; ?>">
                    <a class="" href="<?php echo e(route('front.products')); ?>"><?php echo e(__('Product')); ?></a>
                </li>
            <?php else: ?>
                <?php if(!array_key_exists('children', $link)): ?>
                    <li class="pore  <?php if($href == URL::current()): ?> current <?php endif; ?>">
                        <a class="" href="<?php echo e($link['href'] == null ? $href : $link['href']); ?>"
                            target="<?php echo e($link['target']); ?>"><?php echo e($link['text']); ?></a>
                    </li>
                <?php else: ?>
                    <li class="submenu-wrapper pore <?php if($href == URL::current()): ?> current <?php endif; ?>">
                        <a class="sm-link p-link" href="<?php echo e($href); ?>"
                            target="<?php echo e($link['target']); ?>"><?php echo e($link['text']); ?></a>
                        <ul class="submenu">
                            <?php $__currentLoopData = $link['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $l2Href = Helper::getHref($level2);

                                ?>
                                <li>
                                    <a href="<?php echo e($l2Href); ?>"
                                        target="<?php echo e($level2['target']); ?>"><?php echo e($level2['text']); ?></a>
                                    <?php

                                        if (array_key_exists('children', $level2)) {
                                            Helper::createMenu($level2);
                                        }
                                    ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($visibility->is_quote_page == 1): ?>
            <li class="mobile-quote">
                <a href="<?php echo e(route('front.quot')); ?>"><?php echo e(__('Gate A Quote')); ?></a>
            </li>
        <?php endif; ?>

    </ul>
    <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
</div>

<div class="header-extra d-flex align-items-center">

    

    <div class="nav-toggler">
        <span></span><span></span><span></span>
    </div>
    
</div>
<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/partials/menu/nav-item.blade.php ENDPATH**/ ?>