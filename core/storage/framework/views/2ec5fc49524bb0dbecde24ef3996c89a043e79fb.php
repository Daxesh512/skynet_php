
<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>

<!--====== BANNER PART START ======-->
<?php if($visibility->is_t2_hero_section == 1): ?>
    <?php if($visibility->is_video_hero == 1): ?>
    <section id="herovideo" class="banner-section-three" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->hero_bg_image )); ?>);">
        <div id="bgndVideo" data-property="{videoURL:'<?php echo e($commonsetting->hero_section_video_link); ?>',containment:'#herovideo', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
        <div class="overlay">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="banner-content text-center">
                            <span class="title-tag wow fadeInDown" data-wow-delay="0.3s"><?php echo e($sinfo->hero_sub_title); ?></span>
                            <h1 class="title wow fadeInLeft" data-wow-delay="0.5s"><?php echo e($sinfo->hero_title); ?></h1>
                            <p class="wow fadeInUp" data-wow-delay="0.7s"><?php echo e($sinfo->hero_text); ?></p>
                            <ul class="banner-btns">
                                <li class="wow fadeInUp" data-wow-delay="0.7s">
                                    <a class="main-btn rounded-btn" href="<?php echo e(route('front.quot')); ?>"><?php echo e(__('Gate A Quote')); ?></a>
                                </li>
                                <li class="wow fadeInUp" data-wow-delay="0.8s">
                                    <a class="main-btn transparent-border-btn rounded-btn" href="<?php echo e(route('front.about')); ?>"><?php echo e(__('Learn More')); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
        <div class="banner-section home2" style="background-image: url(<?php echo e(asset('assets/front/')); ?>/images/banner-gradient-bg.png)">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-content pt-100">
                            <span class="title-tag wow fadeInDown" data-wow-delay="0.3s"><?php echo e($sinfo->hero_sub_title); ?></span>
                            <h1 class="title wow fadeInLeft" data-wow-delay="0.5s"><?php echo e($sinfo->hero_title); ?></h1>
                            <ul class="banner-btns">
                                <?php if($sinfo->hero_f_icon1 && $sinfo->hero_f_text1): ?>
                                <li class="wow fadeInUp" data-wow-delay="0.7s">
                                    <a class="btn-1" href="#">
                                        <span class="icon"><i class="<?php echo e($sinfo->hero_f_icon1); ?>"></i></span>
                                        <span><?php echo e($sinfo->hero_f_text1); ?></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($sinfo->hero_f_icon2 && $sinfo->hero_f_text2): ?>
                                <li class="wow fadeInUp">
                                    <a class="btn-2"href="#">
                                        <span class="icon"><i class="<?php echo e($sinfo->hero_f_icon2); ?>"></i></span>
                                        <span><?php echo e($sinfo->hero_f_text2); ?></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
                <div class="banner-img">
                    <img src="<?php echo e(asset('assets/front/img/'.$sinfo->hero_image)); ?>" alt="">
                </div>
            </div> <!-- container -->
        </div>
    <?php endif; ?>
<?php endif; ?>
<!--====== BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->
<?php if($visibility->is_t2_about_section == 1): ?>
<div class="about-section section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-2 order-lg-1  wow fadeInLeft" data-wow-delay="0.3s">
                <div class="about-thumb mt-30">
                    <img src="<?php echo e(asset('assets/front/img/'.$sinfo->about_image)); ?>" alt="">
                </div> <!-- about thumb -->
            </div>
            <div class="col-lg-6 col-md-12 wow fadeInRight order-1 order-lg-2" data-wow-delay="0.3s">
                <div class="about-text-block pl-lg-5 mt-md-gap-60">
                    <div class="section-title mb-40">
                        <span class="title-tag"><?php echo e($sinfo->about_sub_title); ?></span>
                        <h3 class="title"><?php echo e($sinfo->about_title); ?></h3>
                    </div>
                    <p class="text-color-3"><?php echo (strlen(strip_tags(Helper::convertUtf8($sinfo->about_text))) > 280) ? substr(strip_tags(Helper::convertUtf8($sinfo->about_text)), 0, 280) . '...' : strip_tags(Helper::convertUtf8($sinfo->about_text)); ?></p>
                    
                    <div class="about-experience pb-40 pt-20">
                        <h3><?php echo e($sinfo->about_experince_yers); ?></h3>
                        <span><?php echo e(__('Years Of Experience')); ?></span>
                    </div>
                    <ul class="about-btns">
                        <li>
                            <a class="main-btn" href="<?php echo e(route('front.about')); ?>"><?php echo e(__('Learn More')); ?></a>
                        </li>
                        <li>
                            <a class="main-btn main-btn-2 video-popup" href="<?php echo e($sinfo->about_intro_video); ?>"><i class="fal fa-video"></i> <?php echo e(__('Intro Video')); ?></a>
                        </li>
                    </ul>
                </div> <!-- about item -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<?php endif; ?>
<!--====== ABOUT PART ENDS ======-->



<!--====== SERVICES ITEM PART START ======-->
<?php if($visibility->is_t2_service_section == 1): ?>
<div class="service-section section-gap soft-blue-bg">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50">
                        <span class="title-tag"><?php echo e($sinfo->service_sub_title); ?></span>
                        <h3 class="title"><?php echo e($sinfo->service_title); ?></h3>
                    </div> <!-- services title item -->
                </div>
            </div> <!-- row -->
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
</div> 
<?php endif; ?>
<!--====== SERVICES ITEM PART ENDS ======-->


<!--====== INTRO VIDEO PART START ======-->
<?php if($visibility->is_t2_intro_video_section == 1): ?>
<div class="intro-video-area" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->video_bg_image)); ?>);">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="intro-video-content">
                        <span><?php echo e($sinfo->video_sub_title); ?></span>
                        <h2 class="title"><?php echo e($sinfo->video_title); ?></h2>
                        <p class="text-1"><?php echo e($sinfo->video_text); ?></p>
                        <p class="text-2"><?php echo e($sinfo->video_content); ?></p>
                    </div> <!-- intro video content -->
                </div>
                <div class="col-lg-6 col-md-10 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="intro-thumb mt-md-gap-60">
                        <img src="<?php echo e(asset('assets/front/img/'.$sinfo->video_image)); ?>" alt="">
                        <a class="video-popup" href="<?php echo e($sinfo->video_link); ?>"><i class="fas fa-play"></i></a>
                    </div> <!-- intro thumb -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
</div>
<?php endif; ?>
<!--====== INTRO VIDEO PART ENDS ======-->

<!--====== LEADERSHIP PART START ======-->
<?php if($visibility->is_t2_team_section == 1): ?>
<div class="team-area section-gap soft-blue-bg position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="title-tag"><?php echo e($sinfo->team_sub_title); ?></span>
                    <h2 class="title"><?php echo e($sinfo->team_title); ?></h2>
                </div> <!-- section title 2 -->
            </div>
        </div> <!-- row -->
        <div class="row team-members team-slider-two">
            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="team-member-three mb-30">
                    <div class="member-inner">
                        <img src="<?php echo e(asset('assets/front/img/team/'.$item->image)); ?>" alt="">
                        <div class="team-content">
                            <h5 class="name"><a href="<?php echo e(route('front.team_details', $item->id)); ?>"><?php echo e($item->name); ?></a></h5>
                            <span class="position"><?php echo e($item->dagenation); ?></span>
                        </div>
                    </div>
                </div> <!-- leadership item -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<?php endif; ?>
<!--====== LEADERSHIP PART ENDS ======-->

<!--====== PROGRESS BAR PART START ======-->
<?php if($visibility->is_t2_counter_section == 1): ?>
<section class="counter-section secondary-bg pt-100 pb-100">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="counter-box color-<?php echo e(++$id); ?>">
                    <div class="icon"><i class="<?php echo e($item->icon); ?>"></i></div>
                    <span class="counter"><?php echo e($item->number); ?></span>
                    <h6 class="title"><?php echo e($item->title); ?></h6>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--====== PROGRESS BAR PART ENDS ======-->

<!--====== TESTIMONIAL PART START ======-->
<?php if($visibility->is_t2_testimonial_section == 1): ?>
<section class="testimonials-section section-gap soft-blue-bg">
    <div class="container">
        <div class="section-title text-center mb-60">
            <span class="title-tag"><?php echo e($sinfo->testimonial_subtitle); ?></span>
            <h2 class="title"><?php echo e($sinfo->testimonial_title); ?></h2>
        </div>

        <div class="testimonials-slider row">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="testimonial-box color-1s">
                    
                    <p>
                           <span class="d-block"> <?php for($i = 0; $i < $item->rating; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?></span>
                        <?php echo e($item->message); ?>

                    </p>
                    <div class="author d-flex align-items-center">
                        <div class="photo">
                            <img src="<?php echo e(asset('assets/front/img/'.$item->image)); ?>" alt="Image">
                        </div>
                        <div class="desc">
                            <h6> <?php echo e($item->name); ?></h6>
                            <span class="position"><?php echo e($item->position); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--====== TESTIMONIAL PART ENDS ======-->

<!--====== QUOTE PART START ======-->
<?php if($visibility->is_t2_contact_section == 1): ?>
<div class="conatct-section-two section-gap" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->contact_section_bg_image)); ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title white-color text-center mb-40">
                    <span class="title-tag"><?php echo e($sinfo->contact_sub_title); ?></span>
                    <h2 class="title"><?php echo e($sinfo->contact_title); ?></h2>
                </div> <!-- section title 2 -->
            </div>
        </div> <!-- row -->
        <div class="contact-form">
            <form action="<?php echo e(route('front.contact.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="<?php echo e(__('Full Name Here')); ?>" name="name">
                            <span class="icon"><i class="fal fa-user"></i></span>
                            <?php if($errors->has('name')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="email" placeholder="<?php echo e(__('Email Here')); ?>" name="email">
                            <span class="icon"><i class="fal fa-envelope"></i></span>
                            <?php if($errors->has('email')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="<?php echo e(__('Phone No')); ?>" name="phone">
                            <span class="icon"><i class="fal fa-phone"></i></span>
                        </div> <!-- input box -->
                        <?php if($errors->has('phone')): ?>
                            <p class="text-danger"> <?php echo e($errors->first('phone')); ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="<?php echo e(__('Subject')); ?>" name="subject">
                            <span class="icon"><i class="fal fa-edit"></i></span>
                            <?php if($errors->has('subject')): ?>
                            <p class="text-danger"> <?php echo e($errors->first('subject')); ?> </p>
                        <?php endif; ?>
                        </div> <!-- input box -->
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group  textarea-group  mt-30">
                            <textarea name="message" id="#" cols="30" rows="10" placeholder="<?php echo e(__('Message Us')); ?>"></textarea>
                            <span class="icon"><i class="fal fa-pencil"></i></span>
                            <?php if($errors->has('message')): ?>
                            <p class="text-danger"> <?php echo e($errors->first('message')); ?> </p>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-12  mt-30">
                        <?php if($visibility->is_recaptcha == 1): ?>
                        <div class="d-inline-block">
                            <?php echo NoCaptcha::renderJs(); ?>

                            <?php echo NoCaptcha::display(); ?>

                            <?php if($errors->has('g-recaptcha-response')): ?>
                            <?php
                                $errmsg = $errors->first('g-recaptcha-response');
                            ?>
                            <p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                        <div class="input-group  textarea-group mt-20">
                            
                            <button class="main-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" type="submit"><?php echo e(__('Message Us')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- quote form -->
    </div> <!-- container -->
</div>
<?php endif; ?>
<!--====== QUOTE PART ENDS ======-->


<!--====== ANSWERS PART START ======-->
<?php if($visibility->is_t2_faq_section == 1): ?>
<div class="counter-faq-section section-gap soft-blue-bg">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title mb-50">
                    <span class="title-tag"><?php echo e($sinfo->faq_sub_title); ?></span>
                    <h2 class="title"><?php echo e($sinfo->faq_title); ?></h2>
                
                </div> <!-- section title 2 -->
                <div class="accordion-two" id="accordionExample">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header" id="heading<?php echo e($item->id); ?>">
                            <a class="<?php echo e($loop->first ? '' : 'collapsed'); ?>" href="" data-toggle="collapse" data-target="#collapse<?php echo e($item->id); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>" aria-controls="collapse<?php echo e($item->id); ?>">
                                <?php echo e($item->title); ?>

                            </a>
                        </div>

                        <div id="collapse<?php echo e($item->id); ?>" class="collapse <?php echo e($loop->first ? 'show' : ''); ?>" aria-labelledby="heading<?php echo e($item->id); ?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php echo $item->content; ?>

                            </div>
                        </div>
                    </div> <!-- card -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="tile-gallery-three mt-md-gap-50">
                    <div class="img-one wow fadeInRight" data-wow-delay="0.4s">
                        <img src="<?php echo e(asset('assets/front/img/'.$sinfo->faq_image2)); ?>" alt="">
                    </div>
                    <div class="img-two text-right wow fadeInUp" data-wow-delay="0.4s">
                        <img src="<?php echo e(asset('assets/front/img/'.$sinfo->faq_image1)); ?>" alt="">
                    </div>
                </div> <!-- answers thumb -->
            </div>
        </div> <!-- row -->
    </div> <!-- containter -->
</div>
<?php endif; ?>
<!--====== ANSWERS PART ENDS ======-->

<!--====== ACTION 2 PART START ======-->
<?php if($visibility->is_t2_quote_section == 1): ?>
<div class="call-to-action-four section-gap" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->contact_section_bg_image)); ?>);">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="cta-content">
                    <h2 class="title"><?php echo e(__('Get A Quote right now.')); ?></h2>
                </div> <!-- action item -->
            </div>
            <div class="col-lg-7">
                <div class="cta-btns">
                    <div class="cta-btn">
                        <p><?php echo e(__('Mail Us')); ?></p>
                        <span>
                            <?php
                            $number = explode( ',', $commonsetting->number );
                            ?>
                            <?php echo e($number[0]); ?>

                        </span>
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="cta-btn cta-btn-2">
                        <p><?php echo e(__('Make A Call')); ?></p>
                        <span>
                            <?php
                            $email = explode( ',', $commonsetting->email );
                            ?>
                            <?php echo e($email[0]); ?>

                        </span>
                        <i class="fal fa-phone"></i>
                    </div>
                </div> <!-- action support -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div> 
<?php endif; ?>
<!--====== ACTION 2 PART ENDS ======-->

<!--====== LATEST NEWS PART START ======-->
<?php if($visibility->is_t2_news_section == 1): ?>
<section class="latest-news section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-30 wow fadeInUp" data-wow-delay="0.3s">
                    <span class="title-tag"><?php echo e($sinfo->blog_sub_title); ?></span>
                    <h2 class="title"><?php echo e($sinfo->blog_title); ?></h2>
                </div> 
            </div> 
        </div>
        <div class="row justify-content-center">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="latest-news-box mt-30">
                    <div class="post-thumb">
                        <img src="<?php echo e(asset('assets/front/img/blog/'.$item->image)); ?>" alt="Image">
                    </div>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li><a href="#">By Admin,</a></li>
                            <li><a href="#"><?php echo e(date ( 'd M, Y', strtotime($item->created_at) )); ?></a></li>
                        </ul>
                        <h4 class="title">
                            <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>">
                                <?php echo e((strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title))); ?>

                            </a>
                        </h4>
                        <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>" class="read-more-btn"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--====== LATEST NEWS PART ENDS ======-->

<!--====== BRAND 2 PART START ======-->
<?php if($visibility->is_t2_client_section == 1): ?>
<div class="brand-section pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-slider">
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item->link); ?>" class="brand-item">
                        <img src="<?php echo e(asset('assets/front/img/client/'.$item->image)); ?>" alt="<?php echo e($item->name); ?>">
                    </a> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- brand item -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<?php endif; ?>
<!--====== BRAND 2 PART ENDS ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/themes/theme2.blade.php ENDPATH**/ ?>