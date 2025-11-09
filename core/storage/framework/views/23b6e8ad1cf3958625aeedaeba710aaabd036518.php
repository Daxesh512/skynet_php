<footer class="footer-area footer-area-two" style="background-image: url(<?php echo e(asset('assets/front/img/'.$setting->footer_bg_image )); ?>);">
    <div class="footer-overlay">
        <div class="container position-relative">
            <div class="row footer-widgets">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item-1 mt-30">
                        <img src="<?php echo e(asset('assets/front/img/'.$setting->footer_logo )); ?>" alt="">
                        <p><?php echo e($setting->footer_text); ?></p>
                    </div> <!-- widget item 1 -->
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="widget-item-2  mt-30">
                        <h4 class="title"><?php echo e(__('Contact Us')); ?></h4>
                        <ul>
                            <li><i class="far fa-clock"></i> <?php echo e($setting->opening_hours); ?></li>
                            <li>
                                <?php
                                    $fnumber = explode( ',', $commonsetting->number );
                                    for ($i=0; $i < count($fnumber); $i++) { 
                                        echo '<a class="d-block" href="tel:'.$fnumber[$i].'"><i class="fas fa-headset"></i> '.$fnumber[$i].'</a>';
                                    }
                                ?>
                            </li>
                            <li>
                                <?php
                                $femail = explode( ',', $commonsetting->email );
                                for ($i=0; $i < count($femail); $i++) { 
                                    echo '<a class="d-block" href="mailto:'.$femail[$i].'"><i class="far fa-envelope"></i> '.$femail[$i].'</a>';
                                }
                            ?>
                            </li> 
                        </ul>
                    </div> <!-- widget item 3 -->
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widget-item-2 mt-30">
                        <h4 class="title"><?php echo e(__('Links')); ?></h4>
                        <div class="footer-list">
                            <ul>
                                <?php $__currentLoopData = $flinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($item->url); ?>"><i class="fal fa-angle-right"></i><?php echo e($item->name); ?></a></li> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div> <!-- widget item 2 -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item-3 mt-30">
                        <h4 class="title"><?php echo e(__('Newletter')); ?></h4>
                        <div class="features-sub">
                            <p><?php echo e(__('Many aspects of computing and technology and the term is more recognizable than before.')); ?></p>
                            <form action="<?php echo e(route('front.newsletter')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="input-box">
                                    <input type="email" name="email" placeholder="<?php echo e(__('Enter your email....')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                    <?php endif; ?>
                                    <button type="submit" class="main-btn"><?php echo e(__('Subscribe Now')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright">
                     <div class="py-3">
                        <?php echo $setting->copyright_text; ?>

                     </div>
                    </div> <!-- footer copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
</footer>
<?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/partials/footer.blade.php ENDPATH**/ ?>