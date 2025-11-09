
<?php $__env->startSection('meta-keywords', "$seo->about_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->about_meta_desc"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('About')); ?></h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
						<li class="active" aria-current="page"><?php echo e(__('About')); ?></li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<?php if($visibility->is_about_about == 1): ?>
<section class="about-section section-gap">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 col-md-8 wow fadeInLeft" data-wow-delay="0.3s">
				<div class="about-thumb">
					<img src="<?php echo e(asset('assets/front/img/'.$sinfo->about_image)); ?>" alt="Image">
				</div>
			</div>
			<div class="col-lg-6 col-md-10 wow fadeInRight" data-wow-delay="0.3s">
				<div class="about-text-block pl-lg-5 mt-md-gap-60">
					<div class="section-title mb-40">
						<span class="title-tag"><?php echo e($sinfo->about_experince_yers); ?> - <?php echo e(__('Years Of Experience')); ?></span>
						<h2 class="title"><?php echo e($sinfo->about_title); ?></h2>
					</div>
					<p class="text-color-3">
						<?php echo $sinfo->about_text; ?>

					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($visibility->is_about_about == 1): ?>
<div class="who-we-are-area pb-120">
	<div class="container">
		<div class="row justify-content-center">
			<?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.3s">
					<div class="service-item-three text-center mt-30">
						<div class="icon">
							<i class="<?php echo e($item->icon); ?>"></i>
						</div>
						<h5 class="title"><?php echo e($item->title); ?></h5>
						<p><?php echo e($item->text); ?></p>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div> <!-- row -->
	</div> 
</div>

<?php endif; ?>

<?php if($visibility->is_about_w_w_a == 1): ?>
<section class="whu-section section-gap soft-blue-bg">
	<div class="container">
		<div class="row justify-content-center align-content-center">
			<div class="col-lg-6 col-md-10 order-lg-2">
				<div class="tile-gallery-two mb-md-gap-50">
					<div class="img-one wow fadeInRight"  data-wow-delay="0.3s">
						<img src="<?php echo e(asset('assets/front/img/'.$sinfo->w_c_us_image1 )); ?>" alt="Image">
					</div>
					<div class="img-two text-right wow fadeInUp"  data-wow-delay="0.5s">
						<img src="<?php echo e(asset('assets/front/img/'.$sinfo->w_c_us_image2 )); ?>" alt="Image">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-10 order-lg-1">
				<div class="section-title mb-50 wow fadeInUp"  data-wow-delay="0.3s">
					<span class="title-tag"><?php echo e($sinfo->w_c_us_sub_title); ?></span>
					<h2 class="title"><?php echo e($sinfo->w_c_us_title); ?></h2>
				</div>
				<ul class="feature-list">
					<?php $__currentLoopData = $why_selects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s">
                        <h4><?php echo e($item->title); ?></h4>
                        <p><?php echo e($item->text); ?></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<?php if($commonsetting->about_choose_us == 1): ?>
		<div class="feature-intro-video mt-100">
			<img src="<?php echo e(asset('assets/front/img/'.$sinfo->video_bg_image )); ?>" alt="Images">
			<a href="<?php echo e($sinfo->video_link); ?>" class="video-popup"><i class="fal fa-play"></i></a>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if($visibility->is_about_history == 1): ?>
<div class="about-history-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8">
				<div class="section-title text-center">
					<h2 class="title"><?php echo e($sinfo->our_history_title); ?></h2>
					<p><?php echo e($sinfo->our_history_text); ?></p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($loop->iteration % 2 == 0): ?>
					<div class="row justify-content-start">
						<div class="col-md-6">
							<div class="history-item">
								<div class="history-thumb wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".1s">
									<img src="<?php echo e(asset('assets/front/img/history/'.$item->image)); ?>" alt="history">
								</div>
								<div class="history-content wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".1s">
									<span><?php echo e($item->date); ?> - <?php echo e($item->position); ?></span>
									<h4 class="title"><?php echo e($item->title); ?></h4>
								</div>
								<div class="number-box">
									<span><?php echo e(++$id); ?></span>
								</div>
							</div> 
						</div>
					</div>
					<?php else: ?> 
					<div class="row justify-content-end">
						<div class="col-md-6">
							<div class="history-item history-item-2">
								<div class="history-thumb wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".1s">
									<img src="<?php echo e(asset('assets/front/img/history/'.$item->image)); ?>" alt="history">
								</div>
								<div class="history-content wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".1s">
									<span><?php echo e($item->date); ?> - <?php echo e($item->position); ?></span>
									<h4 class="title"><?php echo e($item->title); ?></h4>
								</div>
								<div class="number-box">
									<span><?php echo e(++$id); ?></span>
								</div>
							</div> 
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			
		</div> <!-- row -->
	</div> <!-- container -->
</div> 
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/about.blade.php ENDPATH**/ ?>