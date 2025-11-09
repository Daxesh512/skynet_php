@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

    <!--====== BANNER PART START ======-->
    @if ($visibility->is_t1_slider_section == 1)
        @if ($visibility->is_video_hero == 1)
            <section id="herovideo" class="banner-section-three theme1"
                style="background-image: url({{ asset('assets/front/img/' . $sinfo->hero_bg_image) }});">
                <div id="bgndVideo"
                    data-property="{videoURL:'{{ $commonsetting->hero_section_video_link }}',containment:'#herovideo', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}">
                </div>
                <div class="overlay">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="banner-content text-center">
                                    <span class="title-tag wow fadeInDown"
                                        data-wow-delay="0.3s">{{ $sinfo->hero_sub_title }}</span>
                                    <h1 class="title wow fadeInLeft" data-wow-delay="0.5s">{{ $sinfo->hero_title }}</h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.7s">{{ $sinfo->hero_text }}</p>
                                    <ul class="banner-btns">
                                        {{-- <li class="wow fadeInUp" data-wow-delay="0.7s">
                                        <a class="main-btn rounded-btn" href="{{ route('front.quot') }}">{{ __('Gate A Quote') }}</a>
                                    </li> --}}
                                        <li class="wow fadeInUp" data-wow-delay="0.8s">
                                            <a class="main-btn transparent-border-btn rounded-btn"
                                                href="{{ route('front.about') }}">{{ __('Learn More') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="banner-slider banner-slider-three banner-slider-active">
                @foreach ($sliders as $item)
                    <div class="single-banner"
                        style="background-image: url({{ asset('assets/front/img/slider/' . $item->image) }})">
                        <div class="container">
                            <div
                                class="row align-items-center @if ($currentLang->direction == 'rtl') justify-content-end @endif">
                                <div class="col-lg-9">
                                    <div class="banner-text">
                                        <div class="banner-content">
                                            <span data-animation="fadeInUp" data-delay="0.3s" class="title-tag">
                                                {{ $item->subtitle }}
                                            </span>
                                            <h1 data-animation="fadeInLeft" data-delay="0.6s" class="title">
                                                {{ $item->title }}
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay=".9s">
                                                {{ $item->text }}
                                            </p>
                                            <a data-animation="fadeInUp" data-delay="1.1s"
                                                class="main-btn rounded-btn icon-right small-size"
                                                href="{{ $item->button_link }}">
                                                {{ $item->button_text }} <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        @endif

    @endif
    <!--====== BANNER PART ENDS ======-->

    <!--====== WHO WE ARE PART START ======-->

    @if ($visibility->is_t1_who_we_are_section == 1)
        <section class="about-section section-gap about-with-shape">
            <div class="container">
                <div class="about-text-block">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <div class="section-title mb-md-gap-30 wow fadeInLeft" data-wow-delay="0.3s">
                                <span class="title-tag">{{ $sinfo->w_we_are_sub_title }}</span>
                                <h2 class="title">{{ $sinfo->w_we_are_title }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                            <p>{{ $sinfo->w_we_are_text }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service Start -->
                <div class="service-items pt-50">
                    <div class="row">
                        @foreach ($features as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="service-item-three text-center mt-30">
                                    <div class="icon">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <h5 class="title">{{ $item->title }}</h5>
                                    <p>{{ $item->text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Service End -->
            </div>
            <div class="about-shape-1">
                <img src="{{ asset('assets/front/') }}/images/what-we-are-shape-1.png" alt="shape">
            </div>
            <div class="about-shape-2">
                <img src="{{ asset('assets/front/') }}/images/what-we-are-shape-2.png" alt="shape">
            </div>
        </section>
    @endif

    <!--====== WHO WE ARE PART ENDS ======-->

    <!--====== SOLUTION PART START ======-->

    @if ($visibility->is_t1_intro_video_section == 1)
        <section class="video-cta" style="background-image: url({{ asset('assets/front/img/' . $sinfo->video_bg_image) }})">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-8 col-lg-9 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="video-cta-content">
                            <h3 class="title">{{ $sinfo->video_title }}</h3>
                            <p>{{ $sinfo->video_content }}</p>
                        </div>
                    </div>
                    <div class="col-auto wow fadeInRight" data-wow-delay="0.3s">
                        <div class="video-cta-play">
                            <a class="video-popup" href="{{ $sinfo->video_link }}"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--====== SOLUTION PART ENDS ======-->

    <!--====== SERVICES TITLE PART START ======-->
    @if ($visibility->is_t1_service_section == 1)
        <section class="service-section section-gap service-with-shape">
            <div class="container">
                <div class="section-title white-color text-center mb-10">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9">
                            <span class="title-tag">{{ $sinfo->service_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->service_title }}</h2>
                        </div>
                    </div>
                    <div class="ring-shape"></div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($services as $item)
                        <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item-four mt-50">
                                <div class="services-thumb">
                                    <img src="{{ asset('assets/front/img/service/' . $item->image) }}" alt="Service-Image">
                                </div>
                                <div class="services-content">
                                    <h4 class="title">{{ $item->title }}</h4>
                                    <p> {{ strlen(strip_tags(Helper::convertUtf8($item->content))) > 140 ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 140) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}
                                    </p>
                                    <a href="{{ route('front.service.details', $item->slug) }}" class="service-link">
                                        {{ __('Read More') }} <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--====== SERVICES TITLE PART ENDS ======-->


    <!--====== WHY CHOOSE PART START ======-->
    @if ($visibility->is_t1_why_choose_us_section == 1)
        <div class="why-choose-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title white-color mb-30 text-center">
                            <span class="title-tag">{{ $sinfo->w_c_us_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->w_c_us_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($why_selects as $item)
                        <div class="col-lg-4 col-md-6 col-sm-9 wow slideInUp" data-wow-duration=".5s"
                            data-wow-delay="0s">
                            <div class="single-choose text-center mt-30">
                                <div class="icon-box">
                                    <span class="rotate-dot"></span>
                                    <i class="{{ $item->icon }}"></i>
                                </div>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p>{{ $item->text }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="choose-dot">
                <img src="{{ asset('assets/front/') }}/images/choose-dot.png" alt="">
            </div>
            <div class="choose-shape">
                <img src="{{ asset('assets/front/') }}/images/choose-shape.png" alt="">
            </div>
        </div>
    @endif
    <!--====== WHY CHOOSE PART ENDS ======-->

    <!--====== CASE STUDIES PART START ======-->
    @if ($visibility->is_t1_portfolio_section == 1)
        <section class="portfolio-area section-gap">
            <div class="container">
                <div class="portfolio-top-title mb-60">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-8">
                            <div class="section-title mb-md-gap-30">
                                <span class="title-tag">{{ $sinfo->portfolio_sub_title }}</span>
                                <h2 class="title">{{ $sinfo->portfolio_title }}</h2>
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
                    @foreach ($portfolios as $item)
                        <div class="col-lg-4">
                            <div class="portfolio-item">
                                <div class="portfolio-img"
                                    style="background: url({{ asset('assets/front/img/portfolio/' . $item->featured_image) }})">
                                </div>
                                <div class="portfolio-content">
                                    <div class="item">
                                        <span class="category">{{ $item->service->title }}</span>
                                        <h5 class="title">
                                            {{ strlen(strip_tags(Helper::convertUtf8($item->title))) > 40 ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}
                                        </h5>
                                    </div>
                                    <a href="{{ route('front.portfolio.details', $item->slug) }}"
                                        class="portfolio-link"><i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--====== CASE STUDIES PART ENDS ======-->



    <!--====== TEAM MEMBER PART START ======-->
    @if ($visibility->is_t1_team_section == 1)
        <div class="team-area section-gap-bottom overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-10">
                            <span class="title-tag">{{ $sinfo->team_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->team_title }}</h2>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="container">
                <div class="row team-members justify-content-center">
                    @foreach ($teams as $item)
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="team-member-two mt-50">
                                <div class="member-photo">
                                    <img src="{{ asset('assets/front/img/team/' . $item->image) }}" alt="Member-Photo">
                                </div>
                                <div class="team-content">
                                    <div class="social-icon">
                                        @if ($item->url1 && $item->icon1)
                                            <a href="{{ $item->url1 }}">
                                                <i class="{{ $item->icon1 }}"></i>
                                            </a>
                                        @endif
                                        @if ($item->url2 && $item->icon2)
                                            <a href="{{ $item->url2 }}">
                                                <i class="{{ $item->icon2 }}"></i>
                                            </a>
                                        @endif
                                        @if ($item->url3 && $item->icon3)
                                            <a href="{{ $item->url3 }}">
                                                <i class="{{ $item->icon3 }}"></i>
                                            </a>
                                        @endif
                                        @if ($item->url4 && $item->icon4)
                                            <a href="{{ $item->url4 }}">
                                                <i class="{{ $item->icon4 }}"></i>
                                            </a>
                                        @endif
                                        @if ($item->url5 && $item->icon5)
                                            <a href="{{ $item->url5 }}">
                                                <i class="{{ $item->icon5 }}"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <h5 class="name"><a href="{{ route('front.team_details', $item->id) }}"
                                            class="d-block">{{ $item->name }}</a></h5>
                                    <span class="position">{{ $item->dagenation }}</span>
                                </div>
                            </div> <!-- single team member -->
                        </div>
                    @endforeach
                </div> <!-- row -->
            </div> <!-- container fluid -->
        </div>
    @endif
    <!--====== TEAM MEMBER PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->
    @if ($visibility->is_t1_testimonial_section == 1)
        <section class="testimonials-section section-gap soft-blue-bg">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <span class="title-tag">{{ $sinfo->testimonial_subtitle }}</span>
                    <h2 class="title">{{ $sinfo->testimonial_title }}</h2>
                </div>

                <div class="testimonials-slider row">
                    @foreach ($testimonials as $item)
                        <div class="col-lg-4">
                            <div class="testimonial-box color-1s">

                                <p>
                                    <span class="d-block">
                                        @for ($i = 0; $i < $item->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </span>
                                    {{ $item->message }}
                                </p>
                                <div class="author d-flex align-items-center">
                                    <div class="photo">
                                        <img src="{{ asset('assets/front/img/' . $item->image) }}" alt="Image">
                                    </div>
                                    <div class="desc">
                                        <h6> {{ $item->name }}</h6>
                                        <span class="position">{{ $item->position }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--====== CONTACT US PART START ======-->
    @if ($visibility->is_t1_contact_section == 1)
        <section class="conatct-section section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title white-color text-center mb-60">
                            <span class="title-tag">{{ $sinfo->contact_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->contact_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form-area wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="contact-thumb mb-md-gap-50">
                                <img src="{{ asset('assets/front/img/' . $sinfo->contact_form_image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form">
                                <form action="{{ route('front.contact.submit') }}" method="POST">
                                    @csrf
                                    <h3 class="form-title">{{ $sinfo->contact_form_title }}</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="{{ __('Full Name Here') }}"
                                                    name="name">
                                                <span class="icon"<i class="fal fa-user"></i></span>
                                            </div> <!-- input box -->
                                            @if ($errors->has('name'))
                                                <p class="text-danger"> {{ $errors->first('name') }} </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="email" placeholder="{{ __('Email Here') }}"
                                                    name="email">
                                                <span class="icon"<i class="fal fa-envelope-open"></i></span>
                                            </div> <!-- input box -->
                                            @if ($errors->has('email'))
                                                <p class="text-danger"> {{ $errors->first('email') }} </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="{{ __('Phone No') }}" name="phone">
                                                <span class="icon"<i class="fal fa-phone"></i></span>
                                            </div> <!-- input box -->
                                            @if ($errors->has('phone'))
                                                <p class="text-danger"> {{ $errors->first('phone') }} </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-30">
                                                <input type="text" placeholder="{{ __('Subject') }}" name="subject">
                                                <span class="icon"<i class="fal fa-edit"></i></span>
                                                @if ($errors->has('subject'))
                                                    <p class="text-danger"> {{ $errors->first('subject') }} </p>
                                                @endif
                                            </div> <!-- input box -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group textarea-group mt-30">
                                                <textarea name="message" id="#" cols="30" rows="10" placeholder="{{ __('Message Us') }}"></textarea>
                                                <span class="icon"<i class="fal fa-pencil"></i></span>
                                                @if ($errors->has('message'))
                                                    <p class="text-danger"> {{ $errors->first('message') }} </p>
                                                @endif
                                            </div> <!-- input box -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-grou textarea-groupp">
                                                <div class="contact-btn-captcha-wrapper align-items-center pt-3">

                                                    <button class="main-btn wow slideInUp d-inline-block"
                                                        data-wow-duration="1.5s" data-wow-delay="0s"
                                                        type="submit">{{ __('Send Message') }}
                                                        <i class="fal fa-long-arrow-right"></i></button>
                                                    @if ($visibility->is_recaptcha == 1)
                                                        <div class="mt-3 d-inline-block ml-4">
                                                            {!! NoCaptcha::renderJs() !!}
                                                            {!! NoCaptcha::display() !!}
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                @php
                                                                    $errmsg = $errors->first('g-recaptcha-response');
                                                                @endphp
                                                                <p class="text-danger mb-0">{{ __("$errmsg") }}</p>
                                                            @endif
                                                        </div>
                                                    @endif
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
                style="background-image: url({{ asset('assets/front/img/' . $sinfo->contact_section_bg_image) }})"></div>
        </section>

    @endif
    <!--====== CONTACT US PART ENDS ======-->

    <!--====== OUE CHOOSE PART START ======-->

    @if ($visibility->is_t1_faq_counter_section == 1)
        <section class="counter-faq-section section-gap-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-title mb-50">
                            <span class="title-tag">{{ $sinfo->faq_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->faq_title }}</h2>
                        </div>
                        <div class="accordion-one" id="accordionExample">
                            @foreach ($faqs as $item)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $item->id }}">
                                        <a class="{{ $loop->first ? '' : 'collapsed' }}" href=""
                                            data-toggle="collapse" data-target="#collapse{{ $item->id }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $item->id }}">
                                            <i class="fal fa-long-arrow-right"></i> {{ $item->title }}
                                        </a>
                                    </div>

                                    <div id="collapse{{ $item->id }}"
                                        class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{!! $item->content !!}</p>
                                        </div>
                                    </div>
                                </div> <!-- card -->
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="faq-counter-boxes row">
                            @foreach ($counters as $item)
                                <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="counter-box-three counter-active mt-50">
                                        <div class="counter-wrap">
                                            <span class="counter">{{ $item->number }}</span> <sup>+</sup>
                                        </div>
                                        <span class="title">{{ $item->title }}</span>
                                        <p>{{ $item->text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!--====== OUE CHOOSE PART ENDS ======-->

    <!--====== MEET US PART START ======-->
    @if ($visibility->is_t1_meet_us_section == 1)
        <section class="call-to-action-two">
            <div class="container">
                <div class="call-to-action-inner"
                    style="background-image: url({{ asset('assets/front/img/' . $sinfo->meeet_us_bg_image) }});">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-7">
                            <h3 class="title">{{ $sinfo->meeet_us_text }}</h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{ $sinfo->meeet_us_button_link }}"
                                class="main-btn small-size rounded-btn icon-right mt-md-gap-30">{{ $sinfo->meeet_us_button_text }}
                                <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--====== MEET US PART ENDS ======-->

    <!--====== LATEST NEWS PART START ======-->
    @if ($visibility->is_t1_blog_section == 1)
        <section class="latest-news section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-30 wow fadeInUp" data-wow-delay="0.3s">
                            <span class="title-tag">{{ $sinfo->blog_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->blog_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($blogs as $item)
                        <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="latest-news-box mt-30">
                                <div class="post-thumb">
                                    <img src="{{ asset('assets/front/img/blog/' . $item->image) }}" alt="Image">
                                </div>
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li><a href="#">By Admin,</a></li>
                                        <li><a href="#">{{ date('d M, Y', strtotime($item->created_at)) }}</a>
                                        </li>
                                    </ul>
                                    <h4 class="title">
                                        <a href="{{ route('front.blogdetails', $item->slug) }}">
                                            {{ strlen(strip_tags(Helper::convertUtf8($item->title))) > 40 ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}
                                        </a>
                                    </h4>
                                    <a href="{{ route('front.blogdetails', $item->slug) }}"
                                        class="read-more-btn">{{ __('Read More') }} <i
                                            class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--====== LATEST NEWS PART ENDS ======-->

    <!--====== BRAND 2 PART START ======-->
    @if ($visibility->is_t1_clint_section == 1)
        <div class="brand-section pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider">
                            @foreach ($clients as $item)
                                <a href="{{ $item->link }}" class="brand-item">
                                    <img src="{{ asset('assets/front/img/client/' . $item->image) }}"
                                        alt="{{ $item->name }}">
                                </a>
                            @endforeach
                        </div> <!-- brand item -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    @endif
    <!--====== BRAND 2 PART ENDS ======-->

@endsection
