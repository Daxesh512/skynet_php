@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

@if($visibility->is_t5_slider_section == 1)
    <!--====== Banner Slider Start ======-->
    @if ($visibility->is_video_hero == 1)
        <section id="herovideo" class="banner-section-three theme5" style="background-image: url({{ asset('assets/front/img/'.$sinfo->hero_bg_image ) }});">
            <div id="bgndVideo" data-property="{videoURL:'{{ $commonsetting->hero_section_video_link }}',containment:'#herovideo', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
            <div class="overlay">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="banner-content text-center">
                                <span class="title-tag wow fadeInDown" data-wow-delay="0.3s">{{ $sinfo->hero_sub_title }}</span>
                                <h1 class="title wow fadeInLeft" data-wow-delay="0.5s">{{ $sinfo->hero_title }}</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.7s">{{ $sinfo->hero_text }}</p>
                                <ul class="banner-btns">
                                    <li class="wow fadeInUp" data-wow-delay="0.7s">
                                        <a class="main-btn rounded-btn" href="{{ route('front.quot') }}">{{ __('Gate A Quote') }}</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.8s">
                                        <a class="main-btn transparent-border-btn rounded-btn" href="{{ route('front.about') }}">{{ __('Learn More') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="banner-slider banner-slider-one banner-slider-active" style="background-image: url({{ asset('assets/front/') }}/images/banner-one-bg.jpg)">
            @foreach ($sliders as $item)
            <div class="single-banner">
                <div class="container-fluid container-1470">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
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
                                    <a data-animation="fadeInUp" data-delay="1.1s" class="main-btn rounded-btn icon-right small-size" href="{{ $item->button_link }}">
                                        {{ $item->button_text }} <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="banner-img" data-animation="fadeInRight" data-delay="0.5s">
                                <img src="{{ asset('assets/front/img/slider/'.$item->image) }}" alt="Banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    @endif
    <!--====== Banner Slider End ======-->
@endif


    @if($visibility->is_t5_about_section == 1)
    <div class="about-section section-gap home5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 order-2 order-lg-1  wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="about-thumb mt-30">
                        <img src="{{ asset('assets/front/img/'.$sinfo->about_image) }}" alt="">
                    </div> <!-- about thumb -->
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight order-1 order-lg-2" data-wow-delay="0.3s">
                    <div class="about-text-block pl-lg-5 mt-md-gap-60">
                        <div class="section-title mb-40">
                            <span class="title-tag">{{ $sinfo->about_sub_title }}</span>
                            <h3 class="title">{{ $sinfo->about_title }}</h3>
                        </div>
                        <p class="text-color-3">{!! (strlen(strip_tags(Helper::convertUtf8($sinfo->about_text))) > 280) ? substr(strip_tags(Helper::convertUtf8($sinfo->about_text)), 0, 280) . '...' : strip_tags(Helper::convertUtf8($sinfo->about_text)) !!}</p>
                        {{-- <p>{{ $sinfo->about_text }}</p> --}}
                        <div class="about-experience pb-40 pt-20">
                            <h3>{{ $sinfo->about_experince_yers }}</h3>
                            <span>{{ __('Years Of Experience') }}</span>
                        </div>
                        <ul class="about-btns">
                            <li>
                                <a class="main-btn" href="{{ route('front.about') }}">{{ __('Learn More') }}</a>
                            </li>
                            <li>
                                <a class="main-btn main-btn-2 video-popup" href="{{ $sinfo->about_intro_video }}"><i class="fal fa-video"></i> {{ __('Intro Video') }}</a>
                            </li>
                        </ul>
                    </div> <!-- about item -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
  
     <!-- Service Start -->
     <section class="service-section section-gap-bottom">
        <div class="container">
            <div class="row service-items">
                @foreach ($features as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp"  data-wow-delay="0.3s">
                    <div class="service-item text-center mt-30">
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
    </section>

    @endif


    @if($visibility->is_t5_who_er_are_section == 1)

    <section class="whu-section section-gap soft-blue-bg">
        <div class="container">
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-6 col-md-10 order-lg-2">
                    <div class="tile-gallery-two mb-md-gap-50">
                        <div class="img-one wow fadeInRight"  data-wow-delay="0.3s">
                            <img src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image1 ) }}" alt="Image">
                        </div>
                        <div class="img-two text-right wow fadeInUp"  data-wow-delay="0.5s">
                            <img src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image2 ) }}" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 order-lg-1">
                    <div class="section-title mb-50 wow fadeInUp"  data-wow-delay="0.3s">
                        <span class="title-tag">{{  $sinfo->w_c_us_sub_title  }}</span>
                        <h2 class="title">{{  $sinfo->w_c_us_title  }}</h2>
                    </div>
                    <ul class="feature-list">
                        @foreach ($why_selects as $item)
                        <li class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s">
                            <h4>{{ $item->title }}</h4>
                            <p>{{ $item->text }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
 
    @endif


    @if($visibility->is_t5_service_section == 1)
    <!--====== Service Section Start ======-->
    <section class="service-section-two section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-30 wow fadeInUp" data-wow-delay="0.3s">
                        <span class="title-tag">{{ $sinfo->service_sub_title }}</span>
                        <h2 class="title">{{ $sinfo->service_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row service-items justify-content-center">
                @foreach ($services as $item)
                <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item-two color-1 mt-30">
                        <div class="icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h3 class="title">{{ $item->title }}</h3>
                        <p>
                            {{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 140) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 140) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Service Section End ======-->
    @endif


    @if($visibility->is_t5_project_section == 1)
    <!--====== Portfolio Section Start ======-->
    <section class="portfolio-area portfolio-area-shape primary-bg section-gap">
        <div class="container">
            <div class="portfolio-top-title mb-60">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="section-title white-color mb-md-gap-30">
                            <span class="title-tag">{{  $sinfo->portfolio_sub_title  }}</span>
                            <h2 class="title">{{  $sinfo->portfolio_title  }}</h2>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="portfolio-arrow"></div>
                    </div>
                </div>
            </div>
            <div class="portfolio-items portfolio-slider-one row">
                @foreach ($portfolios as $item)
                <div class="col-lg-4">
                    <div class="portfolio-item">
                        <div class="portfolio-img" style="background-image: url({{ asset('assets/front/img/portfolio/'.$item->featured_image) }})">
                        </div>
                        <div class="portfolio-content">
                            <div class="item">
                                <span class="category">{{ $item->service->title }}</span>
                                <h5 class="title">{{ (strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}</h5>
                            </div>
                            <a href="{{ route('front.portfolio.details', $item->slug) }}" class="portfolio-link"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Portfolio Section Ends ======-->
    @endif


    @if($visibility->is_t5_team_section == 1)

    <!--====== Team Section Start ======-->
    <section class="team-area section-gap-top pb-90 overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-60">
                        <span class="title-tag">{{  $sinfo->team_sub_title  }}</span>
                        <h2 class="title">{{  $sinfo->team_title  }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0">
            <div class="row team-members team-slider">
                @foreach ($teams as $item)
                <div class="col">
                    <div class="team-member mb-30">
                        <div class="member-photo">
                            <img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="Member-Photo">
                            <div class="social-icon">
                                @if($item->url1 && $item->icon1)
                                    <a href="{{ $item->url1 }}">
                                        <i class="{{ $item->icon1 }}"></i>
                                    </a>
                                @endif
                                @if($item->url2 && $item->icon2)
                                    <a href="{{ $item->url2 }}">
                                        <i class="{{ $item->icon2 }}"></i>
                                    </a>
                                @endif
                                @if($item->url3 && $item->icon3)
                                    <a href="{{ $item->url3 }}">
                                        <i class="{{ $item->icon3 }}"></i>
                                    </a>
                                @endif
                                @if($item->url4 && $item->icon4)
                                    <a href="{{ $item->url4 }}">
                                        <i class="{{ $item->icon4 }}"></i>
                                    </a>
                                @endif
                                @if($item->url5 && $item->icon5)
                                    <a href="{{ $item->url5 }}">
                                        <i class="{{ $item->icon5 }}"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="name"><a href="{{ route('front.team_details', $item->id) }}">{{ $item->name }}</a></h5>
                            <span class="position">{{ $item->dagenation }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Team Section Ends ======-->
    @endif


    @if($visibility->is_t5_counter_section == 1)
    <!--====== Counter Part Start ======-->
    <section class="counter-section secondary-bg pt-100 pb-100">
        <div class="container">
            <div class="row">
                @foreach ($counters as $id=>$item)
                <div class="col-lg-3 col-sm-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="counter-box color-{{ ++$id }}">
                        <div class="icon"><i class="{{ $item->icon }}"></i></div>
                        <span class="counter">{{ $item->number }}</span>
                        <h6 class="title">{{ $item->title }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Counter Part End ======-->
    @endif


    @if($visibility->is_t5_testimonial_section == 1)
    <!--====== Testimonials Section Start ======-->
    <section class="testimonials-section section-gap soft-blue-bg">
        <div class="container">
            <div class="section-title text-center mb-60">
                <span class="title-tag">{{  $sinfo->testimonial_subtitle  }}</span>
                <h2 class="title">{{  $sinfo->testimonial_title  }}</h2>
            </div>

            <div class="testimonials-slider row">
                @foreach ($testimonials as $item)
                <div class="col-lg-4">
                    <div class="testimonial-box color-1s">
                        
                        <p>
                               <span class="d-block"> @for ($i = 0; $i < $item->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor</span>
                            {{ $item->message }}
                        </p>
                        <div class="author d-flex align-items-center">
                            <div class="photo">
                                <img src="{{asset('assets/front/img/'.$item->image) }}" alt="Image">
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
    <!--====== Testimonials Section Ends ======-->
    @endif


    @if($visibility->is_t5_meetus_section == 1)
    <!--====== Call to action Start ======-->
    <section class="call-to-action" style="background-image: url({{ asset('assets/front/img/'.$sinfo->meeet_us_bg_image ) }});">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-md-8">
                    <div class="section-title white-color">
                        <h2 class="title">
                            {{ $sinfo->meeet_us_text }}
                        </h2>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="{{ $sinfo->meeet_us_button_link }}" class="main-btn main-btn-3 rounded-btn mt-md-gap-30"> <i class="fal fa-comments"></i> {{ $sinfo->meeet_us_button_text }}</a>
                </div>
            </div>
        </div>
    </section>
    <!--====== Call to action End ======-->
    @endif


    @if($visibility->is_t5_blog_section == 1)
    <!--====== Latest News Start ======-->
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
                            <img src="{{ asset('assets/front/img/blog/'.$item->image) }}" alt="Image">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><a href="#">By Admin,</a></li>
                                <li><a href="#">{{date ( 'd M, Y', strtotime($item->created_at) )}}</a></li>
                            </ul>
                            <h4 class="title">
                                <a href="{{route('front.blogdetails', $item->slug)}}">
                                    {{ (strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}
                                </a>
                            </h4>
                            <a href="{{route('front.blogdetails', $item->slug)}}" class="read-more-btn">{{ __('Read More') }} <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Latest News End ======-->
    @endif


    @if($visibility->is_t5_client_section == 1)
    <!--====== BRAND 2 PART START ======-->
    <div class="brand-section pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-slider">
                        @foreach ($clients as $item)
                        <a href="{{ $item->link }}" class="brand-item">
                            <img src="{{ asset('assets/front/img/client/'.$item->image) }}" alt="{{ $item->name }}">
                        </a> 
                        @endforeach
                    </div> <!-- brand item -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <!--====== BRAND 2 PART ENDS ======-->
    @endif

@endsection
