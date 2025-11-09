
<?php if(request()->path() == '/'): ?>
        <?php if($commonsetting->theme_version == 'theme1'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
                <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        <?php elseif($commonsetting->theme_version == 'theme2'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
                <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            
        <?php elseif($commonsetting->theme_version == 'theme3'): ?>
            <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
        <?php elseif($commonsetting->theme_version == 'theme4'): ?>
            <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
        <?php elseif($commonsetting->theme_version == 'theme5'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
            <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        <?php elseif($commonsetting->theme_version == 'theme6'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
            <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php elseif($commonsetting->theme_version == 'theme7'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
                <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php elseif($commonsetting->theme_version == 'theme8'): ?>
            <?php if($commonsetting->is_video_hero == '1'): ?>
                <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php elseif($commonsetting->theme_version == 'theme9'): ?>
            <?php echo $__env->make('front.partials.menu.menu1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
    <?php echo $__env->make('front.partials.menu.menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

    <?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/partials/menu.blade.php ENDPATH**/ ?>