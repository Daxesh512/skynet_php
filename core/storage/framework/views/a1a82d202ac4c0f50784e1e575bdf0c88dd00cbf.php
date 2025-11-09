<?php
$lang_code = $currentLang->code;

$admin = Auth::guard('admin')->user();
  if (!empty($admin->role)) {
    $permissions = $admin->role->permissions;
    $permissions = json_decode($permissions, true);
}
?>

<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-light-primary">
    <!-- Sidebar -->
    <div class="sidebar pt-0 mt-0">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <a href="<?php echo e(route('front.index')); ?>" class="name text-dark" target="_blank">
                <img src="<?php echo e(asset('assets/front/img/'.$setting->header_logo)); ?>" alt="">
            </a>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                        class="nav-link <?php if(request()->path() == 'admin/dashboard'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?php echo e(__('Dashboard')); ?>

                        </p>
                    </a>
                </li>
                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Website Customization', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/basicinfo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/seoinfo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/custom-css'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slinks'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/footer'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/announcement'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/maintanance'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/preloader'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/flink'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/permalinks'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/flink/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/page-visibility'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/sitemap'): ?> menu-open   
                        <?php elseif(request()->path() == 'admin/menu'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> menu-open 
                        <?php elseif(request()->is('admin/slinks/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/flink/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/basicinfo'): ?> active
                            <?php elseif(request()->path() == 'admin/seoinfo'): ?> active 
                            <?php elseif(request()->path() == 'admin/sitemap'): ?> active   
                            <?php elseif(request()->path() == 'admin/custom-css'): ?> active
                            <?php elseif(request()->path() == 'admin/slinks'): ?> active
                            <?php elseif(request()->path() == 'admin/footer'): ?> active
                            <?php elseif(request()->path() == 'admin/announcement'): ?> active
                            <?php elseif(request()->path() == 'admin/maintanance'): ?> active
                            <?php elseif(request()->path() == 'admin/preloader'): ?> active
                            <?php elseif(request()->path() == 'admin/flink'): ?> active
                            <?php elseif(request()->path() == 'admin/permalinks'): ?> active
                            <?php elseif(request()->path() == 'admin/flink/add'): ?> active
                            <?php elseif(request()->path() == 'admin/page-visibility'): ?> active
                            <?php elseif(request()->path() == 'admin/menu'): ?> active
                            <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> active 
                            <?php elseif(request()->is('admin/flink/edit/*')): ?> active
                            <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>
                                <?php echo e(__('Website Customization')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.basicinfo'). '?language=' . $lang_code); ?>"
                                    class="nav-link <?php if(request()->path() == 'admin/basicinfo'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Basic Information')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.menu.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/menu'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Menu Builder')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.slinks')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/slinks'): ?> active
                                    <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Social Links')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item 
                            <?php if(request()->path() == 'admin/seoinfo'): ?>  menu-open 
                            <?php elseif(request()->path() == 'admin/sitemap'): ?>  menu-open 
                            <?php endif; ?>">
                                <a href="#" class="nav-link 
                                <?php if(request()->path() == 'admin/seoinfo'): ?>  active 
                                <?php elseif(request()->path() == 'admin/sitemap'): ?>  active 
                                <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('SEO')); ?></p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.seoinfo'). '?language=' . $lang_code); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/seoinfo'): ?>  active <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Meta Info')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.sitemap.index'). '?language=' . $lang_code); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/sitemap'): ?>  active <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Sitemap')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.pagevisibility')); ?>"
                                    class="nav-link  
                                    <?php if(request()->path() == 'admin/page-visibility'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> active 
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Pages Visibility')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.permalinks.index')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/permalinks'): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Permalink')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.maintanance.index')); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/maintanance'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Maintanance Mode')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.announcement.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/announcement'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Announcement')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.preloader.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/preloader'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Preloader')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.footer.index'). '?language=' . $lang_code); ?>" class="nav-link  
                                <?php if(request()->path() == 'admin/footer'): ?> active <?php endif; ?>
                                ">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Footer Info')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.flink.index'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/flink'): ?> active 
                                <?php elseif(request()->path() == 'admin/flink/add'): ?> active
                                <?php elseif(request()->is('admin/flink/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Footer Link')); ?></p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('General Settings', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/custom-css'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/email-config'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/scripts'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/theme-version'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/cookie-alert'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/mail-admin'): ?> menu-open
                        <?php elseif(request()->is('admin/slinks/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/custom-css'): ?> active
                            <?php elseif(request()->path() == 'admin/theme-version'): ?> active
                            <?php elseif(request()->path() == 'admin/scripts'): ?> active
                            <?php elseif(request()->path() == 'admin/cookie-alert'): ?> active
                            <?php elseif(request()->path() == 'admin/mail-admin'): ?> active
                            <?php elseif(request()->path() == 'admin/email-config'): ?> active
                            <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fas fa-cog"></i>
                            <p>
                                <?php echo e(__('General Settings')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.theme_version')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/theme-version'): ?> active
                            <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Theme Versions')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item 
                            <?php if(request()->path() == 'admin/email-config'): ?>  menu-open 
                            <?php elseif(request()->path() == 'admin/mail-admin'): ?>  menu-open 
                            <?php endif; ?>">
                                <a href="#" class="nav-link 
                                <?php if(request()->path() == 'admin/email-config'): ?>  active 
                                <?php elseif(request()->path() == 'admin/mail-admin'): ?>  active 
                                <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Email Configuration')); ?></p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview 
                                    <?php if(request()->path() == 'admin/email-config'): ?>  menu-open <?php endif; ?>
                                    " >
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.mail.config')); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/email-config'): ?>  active <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Mail From Admin')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.mailadmin')); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/mail-admin'): ?>  active <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Mail To Admin')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                         
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.scripts')); ?>"
                                    class="nav-link <?php if(request()->path() == 'admin/scripts'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Scripts')); ?></p>
                                </a>
                            </li>
                           
                           
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.cookie.alert'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/cookie-alert'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Cookie Alert')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.custom.css')); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/custom-css'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Custom CSS')); ?></p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Ecommerce', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/currency'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/payment/gateways'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/shipping/methods'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/currency/add'): ?> menu-open
        
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/currency'): ?> active
                        <?php elseif(request()->path() == 'admin/payment/gateways'): ?> active
                        <?php elseif(request()->path() == 'admin/shipping/methods'): ?> active
                        <?php elseif(request()->path() == 'admin/currency/add'): ?> active
            
                        <?php endif; ?>">
                        <i class="nav-icon far fa-credit-card"></i>
                        <p>
                            <?php echo e(__('Payment Settings')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.currency')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/currency'): ?> active
                                <?php elseif(request()->path() == 'admin/currency/add'): ?> active
                                <?php elseif(request()->is('admin/currency/edit/*')): ?> active
                                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Currencies')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.payment.index')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/payment/gateways'): ?> active
                                <?php elseif(request()->is('admin/payment/gateway/edit/*')): ?> active
                                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Payment Gateway')); ?></p>
                                </a>
                            </li>
                
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.shipping.index'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/shipping/methods'): ?> active
                                <?php elseif(request()->is('admin/shipping/method/edit/*')): ?> active
                                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Shipping Method')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/product'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/product-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/product-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/all/orders'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/pending/orders'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/processing/orders'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/completed/orders'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/product/rejected/orders'): ?> menu-open
                        <?php elseif(request()->is('admin/product/product-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/product/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/product/orders/detais/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/product'): ?> active
                            <?php elseif(request()->path() == 'admin/product/product-category'): ?> active
                            <?php elseif(request()->path() == 'admin/product/product-category/add'): ?> active
                            <?php elseif(request()->path() == 'admin/product/add'): ?> active
                            <?php elseif(request()->path() == 'admin/product/pending/orders'): ?> active
                            <?php elseif(request()->path() == 'admin/product/all/orders'): ?> active
                            <?php elseif(request()->path() == 'admin/product/processing/orders'): ?> active
                            <?php elseif(request()->path() == 'admin/product/completed/orders'): ?> active
                            <?php elseif(request()->path() == 'admin/product/rejected/orders'): ?> active
                            <?php elseif(request()->is('admin/product/product-category/edit/*')): ?> active
                            <?php elseif(request()->is('admin/product/edit/*')): ?> active
                            <?php elseif(request()->is('admin/product/orders/detais/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                <?php echo e(__('Products')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.product.category'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/product/product-category'): ?> active
                                <?php elseif(request()->path() == 'admin/product/product-category/add'): ?> active
                                <?php elseif(request()->is('admin/product/product-category/edit/*')): ?> active
                                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Product Categories')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.product'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/product'): ?> active
                                <?php elseif(request()->path() == 'admin/product/add'): ?> active
                                <?php elseif(request()->is('admin/product/edit/*')): ?> active
                                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Products')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.all.product.orders')); ?>"
                                   class="nav-link <?php if(request()->path() == 'admin/product/all/orders'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('All Order')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.pending.product.orders')); ?>"
                                   class="nav-link <?php if(request()->path() == 'admin/product/pending/orders'): ?> active <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Pending Order')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.processing.product.orders')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/product/processing/orders'): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('In Progress Order')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.completed.product.orders')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/product/completed/orders'): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Completed Order')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.rejected.product.orders')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/product/rejected/orders'): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Rejected Order')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
               
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Home', $permissions))): ?>
                    <li class="nav-item
                        <?php if(request()->path() == 'admin/hero/static'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/who-we-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/intro-video'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/about-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/feature'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/project-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/why-choose-us'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/contact-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/counter'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slider'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/meet-us'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/team'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/team/add'): ?> menu-open
                        <?php elseif(request()->is('admin/team/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/faq'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/faq/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/counter/add'): ?> menu-open
                        <?php elseif(request()->is('admin/counter/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/client'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/client/add'): ?> menu-open
                        <?php elseif(request()->is('admin/client/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/faq/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/testimonial'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/testimonial/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/slider'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> menu-open
                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> menu-open
                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/testimonial/edit/*')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/hero/static'): ?> active
                        <?php elseif(request()->path() == 'admin/who-we-section'): ?> active
                        <?php elseif(request()->path() == 'admin/intro-video'): ?> active
                        <?php elseif(request()->path() == 'admin/about-section'): ?> active
                        <?php elseif(request()->path() == 'admin/feature'): ?> active
                        <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> active
                        <?php elseif(request()->path() == 'admin/project-section'): ?> active
                        <?php elseif(request()->path() == 'admin/service-section'): ?> active
                        <?php elseif(request()->path() == 'admin/why-choose-us'): ?> active
                        <?php elseif(request()->path() == 'admin/contact-section'): ?> active
                        <?php elseif(request()->path() == 'admin/blog-section'): ?> active
                        <?php elseif(request()->path() == 'admin/counter'): ?> active
                        <?php elseif(request()->path() == 'admin/slider'): ?> active
                        <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                        <?php elseif(request()->path() == 'admin/meet-us'): ?> active
                        <?php elseif(request()->path() == 'admin/team'): ?> active
                        <?php elseif(request()->path() == 'admin/team/add'): ?> active
                        <?php elseif(request()->path() == 'admin/counter/add'): ?> active
                        <?php elseif(request()->is('admin/counter/edit/*')): ?> active
                        <?php elseif(request()->is('admin/team/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/faq'): ?> active
                        <?php elseif(request()->path() == 'admin/faq/add'): ?> active
                        <?php elseif(request()->is('admin/team/faq/*')): ?> active
                        <?php elseif(request()->path() == 'admin/client'): ?> active
                        <?php elseif(request()->path() == 'admin/client/add'): ?> active
                        <?php elseif(request()->is('admin/team/client/*')): ?> active
                        <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/testimonial'): ?> active
                        <?php elseif(request()->path() == 'admin/testimonial/add'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/slider'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                        <?php elseif(request()->is('admin/testimonial/edit/*')): ?> active
                        <?php endif; ?>
                        ">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                <?php echo e(__('Home Page')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item
                                <?php if(request()->path() == 'admin/hero/static'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/slider'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                                <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                                <?php endif; ?>
                                ">
                                <a href="#" class="nav-link
                                <?php if(request()->path() == 'admin/hero/static'): ?> active
                                <?php elseif(request()->path() == 'admin/slider'): ?> active
                                <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> active
                                <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                                <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Hero Section')); ?> <i class="right fas fa-angle-left"></i></p>
                                </a>
                                    <ul class="nav nav-treeview
                                    <?php if(request()->path() == 'admin/slider'): ?> menu-open
                                    <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                                    <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                                    <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                                    <?php endif; ?>
                                    ">
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.hero.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/hero/static'): ?> active <?php endif; ?>
                                    ">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p><?php echo e(__('Static Version')); ?></p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.slider'). '?language=' . $lang_code); ?>" class="nav-link
                                                <?php if(request()->path() == 'admin/slider'): ?> active
                                                <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                                                <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                                                <?php endif; ?>
                                                ">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p><?php echo e(__('Slider Version')); ?></p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.herovideo')); ?>" class="nav-link
                                                <?php if(request()->path() == 'admin/hero/herovideo'): ?> active <?php endif; ?>
                                                ">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p><?php echo e(__('Video Version')); ?></p>
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            <li class="nav-item 
                                    <?php if(request()->path() == 'admin/ecommerce/slider'): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> menu-open
                                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> menu-open
                                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> menu-open
                                    <?php endif; ?>
                                ">
                                <a href="#" class="nav-link
                                        <?php if(request()->path() == 'admin/ecommerce/slider'): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                                        <?php endif; ?>
                                    ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Ecommerce Module')); ?> <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.ecommerce.slider'). '?language=' . $lang_code); ?>" class="nav-link
                                            <?php if(request()->path() == 'admin/ecommerce/slider'): ?> active
                                            <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                                            <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                                            <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Slider')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.ecommerce.banner'). '?language=' . $lang_code); ?>" class="nav-link
                                            <?php if(request()->path() == 'admin/ecommerce/banner'): ?> active
                                            <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                                            <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                                            <?php endif; ?>
                                        ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p><?php echo e(__('Banner')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.about_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/about-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('About Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.w_w_a'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/who-we-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Who We Are Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.feature.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/feature'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Features Section')); ?></p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.intro_video'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/intro-video'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Intro Video Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.why_chooseus'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/why-choose-us'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Why Choose Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.service_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/service-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Service Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.project_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/project-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Project Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.testimonial'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/testimonial'): ?> active
                                <?php elseif(request()->path() == 'admin/testimonial/add'): ?> active
                                <?php elseif(request()->is('admin/testimonial/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Testimonial Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.team'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/team'): ?> active
                            <?php elseif(request()->path() == 'admin/team/add'): ?> active
                            <?php elseif(request()->is('admin/team/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Team Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.faq'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/faq'): ?> active
                            <?php elseif(request()->path() == 'admin/faq/add'): ?> active
                            <?php elseif(request()->is('admin/team/faq/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('FAQ Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.counter.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/counter'): ?> active 
                            <?php elseif(request()->path() == 'admin/counter/add'): ?> active
                            <?php elseif(request()->is('admin/counter/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Counter Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.meet_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/meet-us'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Meet Us Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.contact_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/contact-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Contact Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.blog_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/blog-section'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Blog Section')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.client.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/client'): ?> active 
                            <?php elseif(request()->path() == 'admin/client/add'): ?> active
                            <?php elseif(request()->is('admin/client/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Client Section')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Inner Page', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/history'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/history/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/contact-page'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/package'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/package/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/portfolio'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/portfolio/add'): ?> menu-open
                        <?php elseif(request()->is('admin/package/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/history/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/service/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/portfolio/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/history'): ?> active
                            <?php elseif(request()->path() == 'admin/history/add'): ?> active
                            <?php elseif(request()->path() == 'admin/package'): ?> active
                            <?php elseif(request()->path() == 'admin/contact-page'): ?> active
                            <?php elseif(request()->path() == 'admin/package/add'): ?> active
                            <?php elseif(request()->path() == 'admin/service'): ?> active
                            <?php elseif(request()->path() == 'admin/service/add'): ?> active
                            <?php elseif(request()->path() == 'admin/portfolio'): ?> active
                            <?php elseif(request()->path() == 'admin/portfolio/add'): ?> active
                            <?php elseif(request()->is('admin/package/edit/*')): ?> active
                            <?php elseif(request()->is('admin/history/edit/*')): ?> active
                            <?php elseif(request()->is('admin/service/edit/*')): ?> active
                            <?php elseif(request()->is('admin/portfolio/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                <?php echo e(__('Inner Page')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.history.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/history'): ?> active 
                                    <?php elseif(request()->path() == 'admin/history/add'): ?> active
                                    <?php elseif(request()->is('admin/history/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('About History')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.package'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/package'): ?> active
                                    <?php elseif(request()->path() == 'admin/package/add'): ?> active
                                    <?php elseif(request()->is('admin/package/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        <?php echo e(__('Package')); ?>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.service'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/service'): ?> active
                                    <?php elseif(request()->path() == 'admin/service/add'): ?> active
                                    <?php elseif(request()->is('admin/service/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        <?php echo e(__('Service')); ?>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.contact_page'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/contact-page'): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        <?php echo e(__('Contact')); ?>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.portfolio.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/portfolio'): ?> active
                                    <?php elseif(request()->path() == 'admin/portfolio/add'): ?> active
                                    <?php elseif(request()->is('admin/portfolio/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    
                                    <p>
                                        <?php echo e(__('Portfolio')); ?>

                                    </p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>


                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Quote', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/all/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/all/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/pending/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/processing/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/completed/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/rejected/quote'): ?> menu-open 
                        <?php elseif(request()->is('admin/quote/details/*')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link <?php if(request()->path() == 'admin/all/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/pending/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/processing/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/completed/quote'): ?> active
                            <?php elseif(request()->path() == 'admin/rejected/quote'): ?> active
                            <?php elseif(request()->is('admin/quote/details/*')): ?> active
                            <?php endif; ?>">
                        <i class="nav-icon fas fa-quote-left"></i>
                        <p>
                            <?php echo e(__('Quote')); ?>

                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.all.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/all/quote'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('All Quote')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.pending.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/pending/quote'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Pending Quote')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.processing.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/processing/quote'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Processing Quote')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.completed.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/completed/quote'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Completed Quote')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.rejected.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/rejected/quote'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Rejected Quote')); ?></p>
                            </a>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>
    

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Gallery', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/gallery'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/gallery-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/add'): ?> menu-open
                        <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/gallery/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/gallery'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/gallery-category'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/add'): ?> active
                            <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> active
                            <?php elseif(request()->is('admin/gallery/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-film"></i>
                            <p>
                                <?php echo e(__('Gallery')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.gcategory'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/gallery/gallery-category'): ?> active 
                                    <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> active
                                    <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> active 
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Category')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.gallery.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/gallery'): ?> active 
                                    <?php elseif(request()->path() == 'gallery/gallery/add'): ?> active
                                    <?php elseif(request()->is('admin/gallery/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Gallery')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Job', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/job'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/job-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/interviewing'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/pending'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/selected'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/rejected'): ?> menu-open
                        <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/job/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/job'): ?> active
                        <?php elseif(request()->path() == 'admin/job/job-category'): ?> active
                        <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> active
                        <?php elseif(request()->path() == 'admin/job/add'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/interviewing'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/pending'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/selected'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/rejected'): ?> active
                        <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> active
                        <?php elseif(request()->is('admin/job/edit/*')): ?> active
                        <?php endif; ?>">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            <?php echo e(__('Jobs')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.jcategory'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/job/job-category'): ?> active
                            <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> active
                            <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Job Categories')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.job'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/job'): ?> active
                            <?php elseif(request()->path() == 'admin/job/add'): ?> active
                            <?php elseif(request()->is('admin/job/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Jobs')); ?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('All Application')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.pending')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/pending'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Pending')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.interviewing')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/interviewing'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Interviewing')); ?></p>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.selected')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/selected'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Selected')); ?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.rejected')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/rejected'): ?> active <?php endif; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('Rejected')); ?></p>
                            </a>
                        </li>
                        
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Blog', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/blog'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/archives'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/archive/add'): ?> menu-open
                        <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/blog/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/archive/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/blog'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                            <?php elseif(request()->path() == 'admin/archives'): ?> active
                            <?php elseif(request()->path() == 'admin/archive/add'): ?> active
                            <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active
                            <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                            <?php elseif(request()->is('admin/archive/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fab fa-blogger-b"></i>
                            <p>
                                Blog
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.bcategory'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/blog/blog-category'): ?> active 
                                    <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                                    <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active 
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.archive'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/archives'): ?> active 
                                    <?php elseif(request()->path() == 'admin/archive/add'): ?> active
                                    <?php elseif(request()->is('admin/archive/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Arcive</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.blog'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/blog'): ?> active 
                                    <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                                    <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Role Management', $permissions))): ?>
                    <li class="nav-item
                        <?php if(request()->path() == 'admin/roles'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/role/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/users'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/user/add'): ?> menu-open
                        <?php elseif(request()->is('admin/user/*/edit')): ?> menu-open
                        <?php elseif(request()->is('admin/role/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/roles'): ?> active
                            <?php elseif(request()->path() == 'admin/role/add'): ?> active
                            <?php elseif(request()->path() == 'admin/users'): ?> active
                            <?php elseif(request()->path() == 'admin/user/add'): ?> active
                            <?php elseif(request()->is('admin/user/*/edit')): ?> active
                            <?php elseif(request()->is('admin/role/edit/*')): ?> active
                            <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> active
                            <?php endif; ?>
                            ">
                        <i class="nav-icon fas fa-unlock-alt"></i>
                        <p>
                            <?php echo e(__('Role Management')); ?>

                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.role.index')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/roles'): ?> active
                                <?php elseif(request()->path() == 'admin/role/add'): ?> active
                                <?php elseif(request()->is('admin/role/edit/*')): ?> active
                                <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> active
                                <?php endif; ?>
                                ">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__("Role Permission")); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/users'): ?> active
                                <?php elseif(request()->path() == 'admin/user/add'): ?> active
                                <?php elseif(request()->is('admin/user/*/edit')): ?> active
                                <?php endif; ?>
                                ">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('User Role')); ?></p>
                            </a>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/subscriber'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/subscriber/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> menu-open
                        <?php endif; ?>
                            ">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/subscriber'): ?> active 
                        <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                        <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> active
                        <?php endif; ?>
                        ">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                <?php echo e(__('Subscribers')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.newsletter')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/subscriber'): ?> active 
                            <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                            <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Subscribers')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.mailsubscriber')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/mailsubscriber'): ?> active <?php endif; ?>
                            ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?php echo e(__('Mail to Subscribers')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            
                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Users Management', $permissions))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.front_user.index')); ?>"
                        class="nav-link <?php if(request()->path() == 'admin/user'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?php echo e(__('Users Management')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Dynamic Page', $permissions))): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.dynamic_page'). '?language=' . $lang_code); ?>"
                            class="nav-link <?php if(request()->path() == 'admin/dynamic-page'): ?> active <?php endif; ?>">

                            <i class="nav-icon  fab fa-sith"></i>
                            <p>
                                <?php echo e(__('Dynamic Page')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

 
                
                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Language', $permissions))): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.language-manage')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/language'): ?> active
                            <?php elseif(request()->path() == 'admin/language/add'): ?> active
                            <?php elseif(request()->is('admin/language/21/edit')): ?> active
                            <?php elseif(request()->is('admin/language/*/edit/keyword')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-language"></i>
                            <p>
                                <?php echo e(__('Language')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Clear Cache', $permissions))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.cache.clear')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-broom"></i>
                        <p>
                            <?php echo e(__('Clear Cache')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/admin/partials/side-navbar.blade.php ENDPATH**/ ?>