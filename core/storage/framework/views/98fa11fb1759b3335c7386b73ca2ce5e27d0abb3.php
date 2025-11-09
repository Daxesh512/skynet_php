
<?php $__env->startSection('meta-keywords', "$seo->service_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->service_meta_desc"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Service')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Service')); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
<!-- Service Area Start -->
<section class="service-section-two section-gap-top pb-90">
	<div class="container">
		<div class="row service-items justify-content-center">
			<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-4 col-md-6 col-sm-8">
				<a href="<?php echo e(route('front.service.details', $item->slug)); ?>" class="service-item-eight mb-30 d-block">
					<div class="service-img" style="background-image: url(<?php echo e(asset('assets/front/img/service/'.$item->image)); ?>)"></div>
					<div class="services-overlay">
						<div class="icon"><i class="<?php echo e($item->icon); ?>"></i></div>
						<h4 class="title"><?php echo e($item->title); ?></h4>
						<p><?php echo e((strlen(strip_tags(Helper::convertUtf8($item->content))) > 100) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 100) . '...' : strip_tags(Helper::convertUtf8($item->content))); ?></p>
					</div>
				</a> <!-- single services -->
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div> <!-- row -->
	</div> <!-- container -->
</section>
<!-- Service Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/service.blade.php ENDPATH**/ ?>