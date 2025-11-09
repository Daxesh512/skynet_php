

<?php $__env->startSection('meta-keywords', "$portfolio->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$portfolio->meta_description"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e($portfolio->title); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class=""><a href="<?php echo e(route('front.portfolio')); ?>"><?php echo e(__('Portfolio')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e($portfolio->title); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== NEWS PART START ======-->
                   
 <div class="service-details-page section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-content">
                    <?php if($portfolio_images->count() > 0): ?>
                    <div class="portfolio-details-slider">
                        <?php $__currentLoopData = $portfolio_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="image">
                                <img src="<?php echo e(asset('assets/front/img/portfolio/'.$item->image )); ?>" alt="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="img">
                      <img src="<?php echo e(asset('assets/front/img/portfolio/'.$portfolio->featured_image)); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="content">
                      <?php echo $portfolio->content; ?>

                    </div>
                  </div>
            </div>
            <div class="col-lg-4 blog-sidebar order-first order-lg-last">
                <div class="case-live">
                    <div class="case-live-item-area ">
                        <div class="case-live-item">
                            <h5 class="title"><?php echo e(__('Sweet Client')); ?></h5>
                            <span><?php echo e($portfolio->client_name); ?></span>
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title"><?php echo e(__('Start Date')); ?></h5>
                            <span><?php echo e($portfolio->start_date); ?></span>
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title"><?php echo e(__('Submit Date')); ?></h5>
                            <span><?php echo e($portfolio->submission_date); ?></span>
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title"><?php echo e(__('Category')); ?></h5>
                            <span><?php echo e($portfolio->service->title); ?></span>
                            <i class="fal fa-tags"></i>
                        </div>
                    </div>
                    <?php if($portfolio->link): ?>
                    <div class="case-live-btn text-center">
                        <a class="main-btn" href="<?php echo e($portfolio->link); ?>"><?php echo e(__('Live Preview')); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="widget social-links mt-30">
                    <h4 class="widget-title"><?php echo e(__('Never Miss News')); ?></h4>
                        <ul>
                          <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><a href="<?php echo e($item->url); ?>"><i class="<?php echo e($item->icon); ?>"></i></a></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                  </div>
                  <div class="side-bar-contact mt-30" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->contact_form_image)); ?>);">
                      <div class="overlay"></div>
                      <div class="content">
                        <h3><?php echo e(__('Make a call for any type query.')); ?></h3>
                          <i class="fas fa-headset"></i>
                      <h4 class="call">
                        <?php
                        $fnumber = explode( ',', $commonsetting->number );
                        for ($i=0; $i < count($fnumber); $i++) { 
                            echo '<a class="d-block" href="tel:'.$fnumber[$i].'">'.$fnumber[$i].'</a>';
                        }
                        ?>
                      </h4>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div> 

<!--====== NEWS PART ENDS ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/portfolio-details.blade.php ENDPATH**/ ?>