
<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>

    <!--====== BANNER PART START ======-->
    <?php if($visibility->is_t1_slider_section == 1): ?>
        <?php if($visibility->is_video_hero == 1): ?>
            <section id="herovideo" class="banner-section-three theme1"
                style="background-image: url(<?php echo e(asset('assets/front/img/' . $sinfo->hero_bg_image)); ?>);">
                <div id="bgndVideo"
                    data-property="{videoURL:'<?php echo e($commonsetting->hero_section_video_link); ?>',containment:'#herovideo', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}">
                </div>
                <div class="overlay">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="banner-content text-center">
                                    <span class="title-tag wow fadeInDown"
                                        data-wow-delay="0.3s"><?php echo e($sinfo->hero_sub_title); ?></span>
                                    <h1 class="title wow fadeInLeft" data-wow-delay="0.5s"><?php echo e($sinfo->hero_title); ?></h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.7s"><?php echo e($sinfo->hero_text); ?></p>
                                    <ul class="banner-btns">
                                        
                                        <li class="wow fadeInUp" data-wow-delay="0.8s">
                                            <a class="main-btn transparent-border-btn rounded-btn"
                                                href="<?php echo e(route('front.about')); ?>"><?php echo e(__('Learn More')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="banner-slider banner-slider-three banner-slider-active">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-banner"
                        style="background-image: url(<?php echo e(asset('assets/front/img/slider/' . $item->image)); ?>)">
                        <div class="container">
                            <div
                                class="row align-items-center <?php if($currentLang->direction == 'rtl'): ?> justify-content-end <?php endif; ?>">
                                <div class="col-lg-9">
                                    <div class="banner-text">
                                        <div class="banner-content">
                                            <span data-animation="fadeInUp" data-delay="0.3s" class="title-tag">
                                                <?php echo e($item->subtitle); ?>

                                            </span>
                                            <h1 data-animation="fadeInLeft" data-delay="0.6s" class="title">
                                                <?php echo e($item->title); ?>

                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay=".9s">
                                                <?php echo e($item->text); ?>

                                            </p>
                                            <a data-animation="fadeInUp" data-delay="1.1s"
                                                class="main-btn rounded-btn icon-right small-size"
                                                href="<?php echo e($item->button_link); ?>">
                                                <?php echo e($item->button_text); ?> <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        <?php endif; ?>

    <?php endif; ?>
    <!--====== BANNER PART ENDS ======-->

    <!--====== WHO WE ARE PART START ======-->

    <?php if($visibility->is_t1_who_we_are_section == 1): ?>
        <section class="about-section section-gap about-with-shape">
            <div class="container">
                <div class="about-text-block">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <div class="section-title mb-md-gap-30 wow fadeInLeft" data-wow-delay="0.3s">
                                <span class="title-tag"><?php echo e($sinfo->w_we_are_sub_title); ?></span>
                                <h2 class="title"><?php echo e($sinfo->w_we_are_title); ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                            <p><?php echo e($sinfo->w_we_are_text); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service Start -->
                <div class="service-items pt-50">
                    <div class="row">
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
                    </div>
                </div>
                <!-- Service End -->
            </div>
            <div class="about-shape-1">
                <img src="<?php echo e(asset('assets/front/')); ?>/images/what-we-are-shape-1.png" alt="shape">
            </div>
            <div class="about-shape-2">
                <img src="<?php echo e(asset('assets/front/')); ?>/images/what-we-are-shape-2.png" alt="shape">
            </div>
        </section>
    <?php endif; ?>

    <!--====== WHO WE ARE PART ENDS ======-->

    <!--====== SOLUTION PART START ======-->

    <?php if($visibility->is_t1_intro_video_section == 1): ?>
        <section class="video-cta" style="background-image: url(<?php echo e(asset('assets/front/img/' . $sinfo->video_bg_image)); ?>)">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-8 col-lg-9 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="video-cta-content">
                            <h3 class="title"><?php echo e($sinfo->video_title); ?></h3>
                            <p><?php echo e($sinfo->video_content); ?></p>
                        </div>
                    </div>
                    <div class="col-auto wow fadeInRight" data-wow-delay="0.3s">
                        <div class="video-cta-play">
                            <a class="video-popup" href="<?php echo e($sinfo->video_link); ?>"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== SOLUTION PART ENDS ======-->

    <!--====== SERVICES TITLE PART START ======-->
    <?php if($visibility->is_t1_service_section == 1): ?>
        <section class="service-section section-gap service-with-shape">
            <div class="container">
                <div class="section-title white-color text-center mb-10">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9">
                            <span class="title-tag"><?php echo e($sinfo->service_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->service_title); ?></h2>
                        </div>
                    </div>
                    <div class="ring-shape"></div>
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item-four mt-50">
                                <div class="services-thumb">
                                    <img src="<?php echo e(asset('assets/front/img/service/' . $item->image)); ?>" alt="Service-Image">
                                </div>
                                <div class="services-content">
                                    <h4 class="title"><?php echo e($item->title); ?></h4>
                                    <p> <?php echo e(strlen(strip_tags(Helper::convertUtf8($item->content))) > 140 ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 140) . '...' : strip_tags(Helper::convertUtf8($item->content))); ?>

                                    </p>
                                    <a href="<?php echo e(route('front.service.details', $item->slug)); ?>" class="service-link">
                                        <?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== SERVICES TITLE PART ENDS ======-->


    <!--====== WHY CHOOSE PART START ======-->
    <?php if($visibility->is_t1_why_choose_us_section == 1): ?>
        <div class="why-choose-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title white-color mb-30 text-center">
                            <span class="title-tag"><?php echo e($sinfo->w_c_us_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->w_c_us_title); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $why_selects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-9 wow slideInUp" data-wow-duration=".5s"
                            data-wow-delay="0s">
                            <div class="single-choose text-center mt-30">
                                <div class="icon-box">
                                    <span class="rotate-dot"></span>
                                    <i class="<?php echo e($item->icon); ?>"></i>
                                </div>
                                <h4 class="title"><?php echo e($item->title); ?></h4>
                                <p><?php echo e($item->text); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="choose-dot">
                <img src="<?php echo e(asset('assets/front/')); ?>/images/choose-dot.png" alt="">
            </div>
            <div class="choose-shape">
                <img src="<?php echo e(asset('assets/front/')); ?>/images/choose-shape.png" alt="">
            </div>
        </div>
    <?php endif; ?>
    <!--====== WHY CHOOSE PART ENDS ======-->

    <!--====== CASE STUDIES PART START ======-->
    <?php if($visibility->is_t1_portfolio_section == 1): ?>
        <section class="portfolio-area section-gap">
            <div class="container">
                <div class="portfolio-top-title mb-60">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-8">
                            <div class="section-title mb-md-gap-30">
                                <span class="title-tag"><?php echo e($sinfo->portfolio_sub_title); ?></span>
                                <h2 class="title"><?php echo e($sinfo->portfolio_title); ?></h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="portfolio-arrow-two"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0 overflow-hidden">
                <div class="portfolio-items portfolio-slider-two row">
                    <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="portfolio-item">
                                <div class="portfolio-img"
                                    style="background: url(<?php echo e(asset('assets/front/img/portfolio/' . $item->featured_image)); ?>)">
                                </div>
                                <div class="portfolio-content">
                                    <div class="item">
                                        <span class="category"><?php echo e($item->service->title); ?></span>
                                        <h5 class="title">
                                            <?php echo e(strlen(strip_tags(Helper::convertUtf8($item->title))) > 40 ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title))); ?>

                                        </h5>
                                    </div>
                                    <a href="<?php echo e(route('front.portfolio.details', $item->slug)); ?>"
                                        class="portfolio-link"><i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== CASE STUDIES PART ENDS ======-->



    <!--====== TEAM MEMBER PART START ======-->
    <?php if($visibility->is_t1_team_section == 1): ?>
        <div class="team-area section-gap-bottom overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-10">
                            <span class="title-tag"><?php echo e($sinfo->team_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->team_title); ?></h2>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="container">
                <div class="row team-members justify-content-center">
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="team-member-two mt-50">
                                <div class="member-photo">
                                    <img src="<?php echo e(asset('assets/front/img/team/' . $item->image)); ?>" alt="Member-Photo">
                                </div>
                                <div class="team-content">
                                    <div class="social-icon">
                                        <?php if($item->url1 && $item->icon1): ?>
                                            <a href="<?php echo e($item->url1); ?>">
                                                <i class="<?php echo e($item->icon1); ?>"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($item->url2 && $item->icon2): ?>
                                            <a href="<?php echo e($item->url2); ?>">
                                                <i class="<?php echo e($item->icon2); ?>"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($item->url3 && $item->icon3): ?>
                                            <a href="<?php echo e($item->url3); ?>">
                                                <i class="<?php echo e($item->icon3); ?>"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($item->url4 && $item->icon4): ?>
                                            <a href="<?php echo e($item->url4); ?>">
                                                <i class="<?php echo e($item->icon4); ?>"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($item->url5 && $item->icon5): ?>
                                            <a href="<?php echo e($item->url5); ?>">
                                                <i class="<?php echo e($item->icon5); ?>"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="name"><a href="<?php echo e(route('front.team_details', $item->id)); ?>"
                                            class="d-block"><?php echo e($item->name); ?></a></h5>
                                    <span class="position"><?php echo e($item->dagenation); ?></span>
                                </div>
                            </div> <!-- single team member -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- row -->
            </div> <!-- container fluid -->
        </div>
    <?php endif; ?>
    <!--====== TEAM MEMBER PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->
    <?php if($visibility->is_t1_testimonial_section == 1): ?>
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
                                    <span class="d-block">
                                        <?php for($i = 0; $i < $item->rating; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </span>
                                    <?php echo e($item->message); ?>

                                </p>
                                <div class="author d-flex align-items-center">
                                    <div class="photo">
                                        <img src="<?php echo e(asset('assets/front/img/' . $item->image)); ?>" alt="Image">
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

    <!--====== CONTACT US PART START ======-->
    <?php if($visibility->is_t1_contact_section == 1): ?>
        <section class="conatct-section section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title white-color text-center mb-60">
                            <span class="title-tag"><?php echo e($sinfo->contact_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->contact_title); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form-area wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="contact-thumb mb-md-gap-50">
                                <img src="<?php echo e(asset('assets/front/img/' . $sinfo->contact_form_image)); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form">
                                <form action="<?php echo e(route('front.contact.submit')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <h3 class="form-title"><?php echo e($sinfo->contact_form_title); ?></h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="<?php echo e(__('Full Name Here')); ?>"
                                                    name="name">
                                                <span class="icon"<i class="fal fa-user"></i></span>
                                            </div> <!-- input box -->
                                            <?php if($errors->has('name')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="email" placeholder="<?php echo e(__('Email Here')); ?>"
                                                    name="email">
                                                <span class="icon"<i class="fal fa-envelope-open"></i></span>
                                            </div> <!-- input box -->
                                            <?php if($errors->has('email')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="<?php echo e(__('Phone No')); ?>" name="phone">
                                                <span class="icon"<i class="fal fa-phone"></i></span>
                                            </div> <!-- input box -->
                                            <?php if($errors->has('phone')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('phone')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="<?php echo e(__('Subject')); ?>" name="subject">
                                                <span class="icon"<i class="fal fa-edit"></i></span>
                                                <?php if($errors->has('subject')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('subject')); ?> </p>
                                                <?php endif; ?>
                                            </div> <!-- input box -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group textarea-group mt-30">
                                                <textarea name="message" id="#" cols="30" rows="10" placeholder="<?php echo e(__('Message Us')); ?>"></textarea>
                                                <span class="icon"<i class="fal fa-pencil"></i></span>
                                                <?php if($errors->has('message')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('message')); ?> </p>
                                                <?php endif; ?>
                                            </div> <!-- input box -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-grou textarea-groupp">
                                                <div class="contact-btn-captcha-wrapper align-items-center pt-3">

                                                    <button class="main-btn wow slideInUp d-inline-block"
                                                        data-wow-duration="1.5s" data-wow-delay="0s"
                                                        type="submit"><?php echo e(__('Send Message')); ?>

                                                        <i class="fal fa-long-arrow-right"></i></button>
                                                    <?php if($visibility->is_recaptcha == 1): ?>
                                                        <div class="mt-3 d-inline-block ml-4">
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
                                                </div>
                                            </div> <!-- input box -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conatct-one-bg"
                style="background-image: url(<?php echo e(asset('assets/front/img/' . $sinfo->contact_section_bg_image)); ?>)"></div>
        </section>

    <?php endif; ?>
    <!--====== CONTACT US PART ENDS ======-->

    <!--====== OUE CHOOSE PART START ======-->

    <?php if($visibility->is_t1_faq_counter_section == 1): ?>
        <section class="counter-faq-section section-gap-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-title mb-50">
                            <span class="title-tag"><?php echo e($sinfo->faq_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->faq_title); ?></h2>
                        </div>
                        <div class="accordion-one" id="accordionExample">
                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?php echo e($item->id); ?>">
                                        <a class="<?php echo e($loop->first ? '' : 'collapsed'); ?>" href=""
                                            data-toggle="collapse" data-target="#collapse<?php echo e($item->id); ?>"
                                            aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>"
                                            aria-controls="collapse<?php echo e($item->id); ?>">
                                            <i class="fal fa-long-arrow-right"></i> <?php echo e($item->title); ?>

                                        </a>
                                    </div>

                                    <div id="collapse<?php echo e($item->id); ?>"
                                        class="collapse <?php echo e($loop->first ? 'show' : ''); ?>" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><?php echo $item->content; ?></p>
                                        </div>
                                    </div>
                                </div> <!-- card -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="faq-counter-boxes row">
                            <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="counter-box-three counter-active mt-50">
                                        <div class="counter-wrap">
                                            <span class="counter"><?php echo e($item->number); ?></span> <sup>+</sup>
                                        </div>
                                        <span class="title"><?php echo e($item->title); ?></span>
                                        <p><?php echo e($item->text); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
    <!--====== OUE CHOOSE PART ENDS ======-->

    <!--====== MEET US PART START ======-->
    <?php if($visibility->is_t1_meet_us_section == 1): ?>
        <section class="call-to-action-two">
            <div class="container">
                <div class="call-to-action-inner"
                    style="background-image: url(<?php echo e(asset('assets/front/img/' . $sinfo->meeet_us_bg_image)); ?>);">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-7">
                            <h3 class="title"><?php echo e($sinfo->meeet_us_text); ?></h3>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo e($sinfo->meeet_us_button_link); ?>"
                                class="main-btn small-size rounded-btn icon-right mt-md-gap-30"><?php echo e($sinfo->meeet_us_button_text); ?>

                                <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== MEET US PART ENDS ======-->

    <!--====== LATEST NEWS PART START ======-->
    <?php if($visibility->is_t1_blog_section == 1): ?>
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
                                    <img src="<?php echo e(asset('assets/front/img/blog/' . $item->image)); ?>" alt="Image">
                                </div>
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li><a href="#">By Admin,</a></li>
                                        <li><a href="#"><?php echo e(date('d M, Y', strtotime($item->created_at))); ?></a>
                                        </li>
                                    </ul>
                                    <h4 class="title">
                                        <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>">
                                            <?php echo e(strlen(strip_tags(Helper::convertUtf8($item->title))) > 40 ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title))); ?>

                                        </a>
                                    </h4>
                                    <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>"
                                        class="read-more-btn"><?php echo e(__('Read More')); ?> <i
                                            class="fal fa-long-arrow-right"></i></a>
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
    <?php if($visibility->is_t1_clint_section == 1): ?>
        <div class="brand-section pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider">
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($item->link); ?>" class="brand-item">
                                    <img src="<?php echo e(asset('assets/front/img/client/' . $item->image)); ?>"
                                        alt="<?php echo e($item->name); ?>">
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

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\Turgunoff\skynet\core\resources\views/front/themes/theme1.blade.php ENDPATH**/ ?>