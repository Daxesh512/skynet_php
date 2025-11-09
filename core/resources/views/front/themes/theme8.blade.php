@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')


    @if ($extra_visibility->is_t8_hero_section == 1)
        <!--====== Banner Slider Start ======-->
        @if ($visibility->is_video_hero == 1)
            <section id="herovideo" class="banner-section-three theme8" style="background-image: url({{ asset('assets/front/img/'.$sinfo->hero_bg_image ) }});">
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
            <section class="gradint-static-hero" >
                <div class="banner-slider banner-slider-one" >
                    <img class="shape1" src="{{ asset('assets/front/images/bg.png') }}" alt="">
                    <div class="single-banner">
                        <div class="container-fluid container-1470">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="banner-text">
                                        <div class="banner-content">
                                            <span data-animation="fadeInUp" data-delay="0.3s" class="title-tag">
                                                {{ $sinfo->hero_sub_title }}
                                            </span>
                                            <h1 data-animation="fadeInLeft" data-delay="0.6s" class="title">
                                                {{ $sinfo->hero_title }}
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay=".9s">
                                                {{ $sinfo->hero_text }}
                                            </p>
                                            <a data-animation="fadeInUp" data-delay="1.1s" class="main-btn rounded-btn icon-right small-size" href="{{ route('front.about') }}">
                                                {{ __('About Us') }} <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="banner-img" data-animation="fadeInRight" data-delay="0.5s">
                                        <img src="{{ asset('assets/front/img/'.$sinfo->hero_image) }}" alt="Banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <!-- Shape Bottom -->
                
            </section>
        @endif
        <!--====== Banner Slider End ======-->
    @endif


    @if ($extra_visibility->is_t8_about_section == 1)
        <!-- About area start -->
        <section class="about section-gap" >
            <div class="container">
            <div class="row">
                <div class="col-xl-6 d-flex align-self-center">
                <div class="info">
                    <div class="section-title mb-40">
                        <span class="title-tag">{{ $sinfo->about_sub_title }}</span>
                        <h3 class="title">{{ $sinfo->about_title }}</h3>
                    </div>
                    <h2 class="info-title"><span>{{ $sinfo->about_experince_yers }} {{ __('Years Of Experience') }}</span></h2>
                    <p>
                        {!! (strlen(strip_tags(Helper::convertUtf8($sinfo->about_text))) > 280) ? substr(strip_tags(Helper::convertUtf8($sinfo->about_text)), 0, 280) . '...' : strip_tags(Helper::convertUtf8($sinfo->about_text)) !!}
                    </p>
                    <div class="link">
                    <a href="{{ route('front.about') }}" class="main-btn">{{ __('Learn More') }}</a>
                    </div>
                </div>
                </div>
                <div class="col-xl-6">
                <div class="row">
                    @foreach ($features as $key => $item)
                    <div class="col-md-6">
                    <div class="box box{{ ++$key }}">
                        <div class="inner-box">
                        <div class="icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h4 class="title">{{ $item->title }}</h4>
                        <p class="text">
                            {{ $item->text }}
                        </p>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
        </section>
        <!--About area End -->
    @endif


    @if ($extra_visibility->is_t8_video_section == 1)
        <!--  Video Area Start -->
        <section class="video section-gap-top" >
            <img class="shape1" src="{{ asset('assets/front/images/bgshape1.png') }}" alt="">
            <img class="shape2" src="{{ asset('assets/front/images/bgshape2.png') }}" alt="">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-30">
                        <span class="title-tag">{{ $sinfo->video_sub_title }}</span>
                        <h2 class="title">{{ $sinfo->video_title }}</h2>
                    </div><!-- section title -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                <div class="video-wrapper">
                    <div class="video-box" style="background: url({{ asset('assets/front/img/'.$sinfo->video_bg_image ) }})">
                    <div class="gradint-overlay">
                        <div class="play-icon">
                            <a href="{{ $sinfo->video_link }}" class="video-popup">
                            <i class="fas fa-play"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!--  Counter Area Start -->
            <div class="counter-area2" >
            <img class="shape2" src="assets/images/bgshape2.png" alt="">
            <div class="container">
                <div class="row text-center">
                    @foreach ($counters as $id=>$item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="fun-box">
                            <div class="icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="counter-wrapper">
                                <h3 class="counter">{{ $item->number }}</h3>
                            </div>
                            <h5 class="categori">{{ $item->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
            <!-- Counter Area End -->
        </section>
        <!-- Video Area End -->
    @endif


    @if ($extra_visibility->is_t8_service_section == 1)
         <!-- Service Area Start -->
        <section class="service-section-two section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-30">
                            <span class="title-tag">{{ $sinfo->service_sub_title }}</span>
                            <h2 class="title">{{ $sinfo->service_title }}</h2>
                        </div><!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row service-items justify-content-center">
                    @foreach ($services as $item)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <a href="{{ route('front.service.details', $item->slug) }}" class="service-item-eight mb-30 d-block">
                            <div class="service-img" style="background-image: url({{ asset('assets/front/img/service/'.$item->image) }})"></div>
                            <div class="services-overlay">
                                <div class="icon"><i class="{{ $item->icon }}"></i></div>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p>{{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 100) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 100) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}</p>
                            </div>
                        </a> <!-- single services -->
                    </div>
                    @endforeach
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        <!-- Service Area End -->
    @endif
    

    @if ($extra_visibility->is_t8_callaction_section == 1)
        <!--====== Call to action Start ======-->
        <section class="call-to-action c-a-2 section-gap-top">
            <img class="shape1" src="{{ asset('assets/front/images/bgshape1.png') }}" alt="">
            <img class="shape2" src="{{ asset('assets/front/images/bgshape2.png') }}" alt="">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-title">
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


    @if ($extra_visibility->is_t8_portfolio_section == 1)
        <section class="portfolio-area section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-30 wow fadeInUp">
                            <span class="title-tag">{{  $sinfo->portfolio_sub_title  }}</span>
                            <h2 class="title">{{  $sinfo->portfolio_title  }}</h2>
                        </div>
                    </div>
                </div>
                <div class="portfolio-items row">
                    @foreach ($portfolios as $item)
                    <div class="col-lg-4 col-md-6  wow fadeInUp" data-wow-delay="0.3s">
                        <a href="{{ route('front.portfolio.details', $item->slug) }}" class="portfolio-item mt-30">
                            <div class="portfolio-img" style="background-image: url({{ asset('assets/front/img/portfolio/'.$item->featured_image) }})">
                            </div>
                            <div class="portfolio-content">
                                <div class="item">
                                    <span class="category">{{ $item->service->title }}</span>
                                    <h5 class="title">{{ (strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if ($extra_visibility->is_t8_testimonial_section == 1)
        <!--====== Testimonials Section Start ======-->
        <section class="testimonials-section ts-2 section-gap ">
            <img class="shape1" src="{{ asset('assets/front/images/bgshape1.png') }}" alt="">
            <img class="shape2" src="{{ asset('assets/front/images/bgshape2.png') }}" alt="">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <span class="title-tag">{{  $sinfo->testimonial_subtitle  }}</span>
                    <h2 class="title">{{  $sinfo->testimonial_title  }}</h2>
                </div>

                <div class="testimonials-slider row">
                    @foreach ($testimonials as $item)
                    <div class="col-lg-4">
                        <div class="testimonial-box color-1s">
                            <div class="testi-box-inner">
                                <div class="author d-flex align-items-center">
                                    <div class="photo">
                                        <img src="{{asset('assets/front/img/'.$item->image) }}" alt="Image">
                                    </div>
                                    <div class="desc">
                                        <h6> {{ $item->name }}</h6>
                                        <span class="position">{{ $item->position }}</span>
                                    </div>
                                </div>
                                <p>
                                    
                                       <span class="d-block"> @for ($i = 0; $i < $item->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor</span>
                                    {{ $item->message }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--====== Testimonials Section Ends ======-->
    @endif


    @if ($extra_visibility->is_t8_team_section == 1)
        <section class="team section-gap" id="team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="title-tag">{{  $sinfo->team_sub_title  }}</span>
                            <h2 class="title">{{  $sinfo->team_title  }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team_slider">
                            @foreach ($teams as $item)
                            <div class="col">
                                <div class="team-member">
                                    <div class="member-pic">
                                        <img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="">
                                    </div>
        
                                    <div class="social">
                                        <ul>
                                            @if($item->url1 && $item->icon1)
                                            <li>
                                                <a href="{{ $item->url1 }}">
                                                    <i class="{{ $item->icon1 }}"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if($item->url2 && $item->icon2)
                                                <li>
                                                    <a href="{{ $item->url2 }}">
                                                        <i class="{{ $item->icon2 }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($item->url3 && $item->icon3)
                                                <li>
                                                    <a href="{{ $item->url3 }}">
                                                        <i class="{{ $item->icon3 }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($item->url4 && $item->icon4)
                                                <li>
                                                    <a href="{{ $item->url4 }}">
                                                        <i class="{{ $item->icon4 }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($item->url5 && $item->icon5)
                                                <li>
                                                    <a href="{{ $item->url5 }}">
                                                        <i class="{{ $item->icon5 }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
        
                                    <div class="member-data">
                                        <div class="name">
                                            <a href="{{ route('front.team_details', $item->id) }}"><h4 class="title">{{ $item->name }}</h4></a>
                                            <p class="position">{{ $item->dagenation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif


    @if ($extra_visibility->is_t8_blog_section == 1)
        <!--====== Latest News Start ======-->
        <section class="latest-news section-gap-bottom">
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

    @if ($extra_visibility->is_t8_brand_section == 1)
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
