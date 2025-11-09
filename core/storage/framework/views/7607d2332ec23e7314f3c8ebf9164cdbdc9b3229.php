<div class="col-sm-auto col-12">
    <div class="top-left-content">
        <div class="language-change">
            <p class="name
            <?php if(request()->path() == '/'): ?>
                <?php if($commonsetting->theme_version == 'theme1'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                    text-white
                <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                    text-white 
                <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?> 
                text-white
            <?php endif; ?>
            "><i class="fas fa-globe-americas"></i><?php echo e($currentLang->name); ?></p>
            <div class="language-menu">
                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('changeLanguage', $lang->code)); ?>" class="<?php echo e($lang->code == $currentLang->code ? 'active' : ''); ?>"><?php echo e($lang->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php if( $visibility->is_shop == 1): ?>
        <div class="language-change curr-change">
            <p class="name
            <?php if(request()->path() == '/'): ?>
                <?php if($commonsetting->theme_version == 'theme1'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                    text-white
                <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                    text-white 
                <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?> 
                text-white
            <?php endif; ?>
            "><?php echo e($currentCurrency->sign); ?> <?php echo e($currentCurrency->name); ?></p>
            <div class="language-menu">
                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('changeCurrency', $currency->id)); ?>" class="<?php echo e($currency->id == $currentCurrency->code ? 'active' : ''); ?>"><?php echo e($currency->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="col-sm-auto col-12">
    <div class="top-right-wrapper">
        <div class="social-icon text-center">
            <ul>
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($item->url); ?>"><i class="<?php echo e($item->icon); ?>"></i></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
        <?php if( $visibility->is_user_system == 1): ?>
            <?php if(auth()->check()): ?>
            <div class="language-change">
                <a href="<?php echo e(route('user.login')); ?>" class="name login-btn
                <?php if(request()->path() == '/'): ?>
                    <?php if($commonsetting->theme_version == 'theme1'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                        text-white
                    <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                        text-white 
                    <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?> 
                    text-white
                <?php endif; ?>
                ">
                    <i class="far fa-user l-icon"></i><?php echo e(__("User")); ?><i class="fas fa-chevron-down r-icon"></i>
                </a>
                <div class="language-menu">
                    <a href="<?php echo e(route('user.dashboard')); ?>" class=""><?php echo e(__("User Dashboard")); ?></a>
                    <a href="<?php echo e(route('user.editprofile')); ?>" class=""><?php echo e(__("Edit Profile")); ?></a>
                    <a href="<?php echo e(route('user.logout')); ?>" class=""><?php echo e(__("Logout")); ?></a>
                </div>
            </div>
            <?php else: ?>
            <div class="language-change">
                <a href="<?php echo e(route('user.login')); ?>" class="name login-btn
                <?php if(request()->path() == '/'): ?>
                    <?php if($commonsetting->theme_version == 'theme1'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                        <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                            text-white
                        <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                            text-white 
                        <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                            <?php if($commonsetting->is_video_hero == '1'): ?>
                                text-white
                            <?php endif; ?>
                        <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                            <?php if($commonsetting->is_video_hero == '1'): ?>
                                text-white
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php else: ?> 
                            text-white
                    <?php endif; ?>
                    ">
                    <i class="far fa-sign-in"></i><?php echo e(__('Login')); ?>

                </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/partials/menu/topContent.blade.php ENDPATH**/ ?>