
<?php $__env->startSection('meta-keywords', "$seo->contact_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->contact_meta_desc"); ?>

<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Contact')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Contact')); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== CONTACT DETAILS PART START ======-->
         
 <div class="contact-info-section section-gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
					<div class="contact-info-items mb-md-gap-50">
						<div class="contact-info-item text-center">
							<i class="fal fa-phone"></i>
							<h5 class="title"><?php echo e(__('Phone Number')); ?></h5>
								<?php
                                    $fnumber = explode( ',', $setting->number );
                                    for ($i=0; $i < count($fnumber); $i++) { 
                                        echo '<p>'.$fnumber[$i].'</p>';
                                    }
                                ?>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-envelope"></i>
							<h5 class="title"><?php echo e(__('Email Address')); ?></h5>
							<?php
								$femail = explode( ',', $setting->email );
								for ($i=0; $i < count($femail); $i++) { 
									echo '<p>'.$femail[$i].'</p>';
								}
							?>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-map"></i>
							<h5 class="title"><?php echo e(__('Office Location')); ?></h5>
							<p><?php echo e($setting->address); ?></p>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-globe"></i>
							<h5 class="title"><?php echo e(__('Opening Hours')); ?></h5>
							<p><?php echo e($setting->opening_hours); ?></p>
						</div>
					</div>
			</div>
			<div class="col-lg-6 ">
				<div class="contact-map-three">
					<?php echo $sinfo->contact_map; ?>

				</div> <!-- map area -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== CONTACT DETAILS PART ENDS ======-->

<!--====== GET IN TOUCH PART START ======-->

<!--====== GET IN TOUCH PART ENDS ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/contact.blade.php ENDPATH**/ ?>