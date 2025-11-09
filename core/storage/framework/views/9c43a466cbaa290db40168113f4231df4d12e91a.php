
<?php $__env->startSection('meta-keywords', "$seo->quot_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->quot_meta_desc"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Request A Quote')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Request A Quote')); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
<!-- Quot Area Start -->
<section class="quote-page pt-120 pb-120"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('front.quote_submit')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Full Name Here')); ?> *" name="name" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="email"  placeholder="<?php echo e(__('Email Here')); ?> *" name="email" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20"> 
                                <input type="text"  placeholder="<?php echo e(__('Phone No')); ?> *" name="phone" value="<?php echo e(old('phone')); ?>">
                            </div> <!-- input box -->
                            <?php if($errors->has('phone')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('phone')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Country')); ?>" name="country" value="<?php echo e(old('country')); ?>">
                                <?php if($errors->has('country')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('country')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Approx Budget')); ?>" name="budget" value="<?php echo e(old('budget')); ?>">
                            </div> <!-- input box -->
                            <?php if($errors->has('budget')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('budget')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Skype Id')); ?>" name="skypenumber" value="<?php echo e(old('skypenumber')); ?>">
                                <?php if($errors->has('skypenumber')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('skypenumber')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Subject')); ?> *" name="subject" value="<?php echo e(old('subject')); ?>">
                                <?php if($errors->has('subject')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('subject')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box file mb-20">
                                <label for="budget"><?php echo e(__('pdf, doc, docx, zip file only')); ?></label>
                                <input type="file"  id="budget" name="file">
                            </div> <!-- input box -->
                            <?php if($errors->has('file')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('file')); ?> </p>
                            <?php endif; ?>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="input-box text-center mb-20">
                                <textarea name="description"  id="#" cols="30" rows="10" placeholder="<?php echo e(__('Project Description')); ?> *"><?php echo e(old('description')); ?></textarea>
                                <?php if($errors->has('description')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('description')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if($visibility->is_recaptcha == 1): ?>
                            <div class="row mb-4">
                              <div class="col-lg-12">
                                <?php echo NoCaptcha::renderJs(); ?>

                                <?php echo NoCaptcha::display(); ?>

                                <?php if($errors->has('g-recaptcha-response')): ?>
                                  <?php
                                      $errmsg = $errors->first('g-recaptcha-response');
                                  ?>
                                  <p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
                                <?php endif; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box mb-20">
                            <button class="main-btn wow fadeInUp mt-20" data-wow-duration="1s" data-wow-delay=".3s" type="submit"><?php echo e(__('Submit')); ?></button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Quot Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/quote.blade.php ENDPATH**/ ?>