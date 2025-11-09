<header class="header-one sticky-header">
    <div class="header-topbar">
        <div class="container-fluid container-1470">
            <div class="row align-items-center justify-content-between">
                <?php echo $__env->make('front.partials.menu.topContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <div class="header-navigation">
        <div class="container-fluid mainmenu-wrapper container-1470 d-flex align-items-center justify-content-between">
            <div class="header-left">
                <div class="site-logo">
                    <a href="<?php echo e(route('front.index')); ?>"><img
                            src="<?php echo e(asset('assets/front/img/' . $setting->header_logo)); ?>" alt="Omnivus"></a>
                </div>
            </div>
            <div class="header-right d-flex align-items-center justify-content-end">
                <?php echo $__env->make('front.partials.menu.nav-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

</header>
<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/partials/menu/menu1.blade.php ENDPATH**/ ?>