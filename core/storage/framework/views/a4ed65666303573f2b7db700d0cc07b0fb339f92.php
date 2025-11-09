

<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e($service->title); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class=""><a href="<?php echo e(route('front.service')); ?>"><?php echo e(__('Service')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e($service->title); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== Service details  Start ======-->
<section class="service-details-page section-gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="service-details-content">
          <div class="img">
            <img src="<?php echo e(asset('assets/front/img/service/'.$service->image)); ?>" alt="">
          </div>
          <div class="content">
            <?php echo $service->content; ?>

          </div>
        </div>
      </div>
      <div class="col-lg-4 blog-sidebar order-first order-lg-last">
        <div class="widget categories-widget">
            <h4 class="widget-title"><?php echo e(__('All Services')); ?></h4>
          
              <ul>
                <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('front.service.details', $item->slug)); ?>" class="<?php if($service->id == $item->id ): ?> active  <?php endif; ?>"><?php echo e($item->title); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
        </div>
        <div class="widget social-links">
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
</section>
<!--====== Service details  End ======-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/service-details.blade.php ENDPATH**/ ?>