@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

    @if($visibility->is_t6_slider_section == 1)
    <!--====== Banner Slider Start ======-->
    @if ($visibility->is_video_hero == 1)
        <section id="herovideo" class="banner-section-three theme6" style="background-image: url({{ asset('assets/front/img/'.$sinfo->hero_bg_image ) }});">
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
        <section class="banner-slider banner-slider-two banner-slider-active">
            @foreach ($sliders as $item)
            <div class="single-banner" style="background-image: url({{ asset('assets/front/img/slider/'.$item->image) }})">
                <div class="container">
                    <div class="row align-items-center @if($currentLang->direction == 'rtl') justify-content-end  @endif">
                        <div class="col-xl-9">
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
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    @endif
    <!--====== Banner Slider End ======-->
    @endif

    @if($visibility->is_t6_client_section == 1)
    <!--====== Brand Slider Start ======-->
    <section class="brand-section pt-80 pb-80 soft-blue-bg">
        <div class="container">
            <div class="brand-slider row">
                @foreach ($clients as $item)
                <div class="col">
                    <div class="brand-item full-opacity">
                        <a href="{{ $item->link }}"><img src="{{ asset('assets/front/img/client/'.$item->image) }}" alt="{{ $item->name }}"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Brand Slider End ======-->
    @endif

    @if($visibility->is_t6_who_we_are_section == 1)
    <!--====== Why Choose Us Start ======-->
    <section class="whu-section section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 order-lg-2 col-md-9">
                    <div class="tile-gallery-two">
                        <div class="img-one wow fadeInLeft"  data-wow-delay="0.3s">
                            <img src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image1 ) }}" alt="Image">
                        </div>
                        <div class="img-two text-right wow fadeInUp"  data-wow-delay="0.4s">
                            <img src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image2 ) }}" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 col-md-10">
                    <div class="mt-md-gap-60">
                        <div class="section-title mb-50 wow fadeInUp"  data-wow-delay="0.3s">
                            <span class="title-tag">{{  $sinfo->w_c_us_sub_title  }}</span>
                            <h2 class="title">{{  $sinfo->w_c_us_title  }}</h2>
                        </div>
                        <ul class="feature-list">
                            @foreach ($why_selects as $item)
                            <li class="wow fadeInUp" data-wow-delay="0.5s">
                                <h4>{{ $item->title }}</h4>
                                <p>
                                    {{ $item->text }}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Why Choose Us End ======-->
    @endif

    @if($visibility->is_t6_service_section == 1)
    <!--====== Service Area Start ======-->
    <section class="service-section service-with-shape-two section-gap">
        <div class="square-shape"></div>
        <div class="square-shape-two"></div>
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
                <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="service-item-four no-border mt-50">
                        <div class="services-thumb">
                            <img src="{{ asset('assets/front/img/service/'.$item->image) }}" alt="Service-Image">
                        </div>
                        <div class="services-content">

                            <h4 class="title">{{ $item->title }}</h4>
                            <p>
                                {{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 140) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 140) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}
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
    <!--====== Service Area End ======-->
    @endif

    @if($visibility->is_t6_project_section == 1)
    <!--====== Portfolio Section Start ======-->
    <section class="portfolio-area section-gap-bottom">
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
                    <div class="portfolio-item mt-30">
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

    @if($visibility->is_t6_team_section == 1)
    <!--====== Team Section Start ======-->
    <section class="team-area team-with-shape-two section-gap ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title white-color text-center mb-50">
                        <span class="title-tag">{{  $sinfo->team_sub_title  }}</span>
                        <h2 class="title">{{  $sinfo->team_title  }}</h2>
                    </div>
                </div>
            </div>
            <div class="row team-members">
                @foreach ($teams as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-member-two mt-30">
                        <div class="member-photo">
                            <img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="Member-Photo">
                        </div>
                        <div class="team-content">
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

    @if($visibility->is_t6_testimonial_section == 1)
    <!--====== Testimonials Section Start ======-->
    <section class="testimonials-section section-gap-bottom">
        <div class="container">
            <div class="testimonials-top mb-80">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="section-title mb-md-gap-30">
                            <span class="title-tag">{{  $sinfo->testimonial_subtitle  }}</span>
                            <h2 class="title">{{  $sinfo->testimonial_title  }}</h2>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="testimonials-arrow"></div>
                    </div>
                </div>
            </div>
    
            <div class="row testimonials-slider-two">
                @foreach ($testimonials as $item)
                <div class="col-lg-6">
                    <div class="testimonial-box-two mb-30">
                        <div class="testimonial-inner">
                            <div class="testimonial-img">
                                <img src="{{asset('assets/front/img/'.$item->image) }}" alt="Image">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="content">
                                <p>
                                    <span class="d-block">
                                        @for ($i = 0; $i < $item->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </span>
                                    {{ $item->message }}
                                </p>
                                <div class="author">
                                    <h6 class="name"> {{ $item->name }}</h6>
                                    <span class="position">{{ $item->position }}</span>
                                </div>
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

    @if($visibility->is_t6_faq_counter_section == 1)
    <!--====== Counter Faq Start ======-->
    <section class="counter-faq-section-one primary-bg">
        <div class="container">
            <div class="row justify-content-center align-self-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title white-color mb-50">
                        <span class="title-tag">{{ $sinfo->faq_sub_title }}</span>
                        <h2 class="title">{{ $sinfo->faq_title }}</h2>
                    </div>
                    <div class="accordion-one white-version" id="accordionExample">
                        @foreach ($faqs as $item)
                        <div class="card">
                            <div class="card-header" id="heading{{ $item->id }}">
                                <a class="{{ $loop->first ? '' : 'collapsed' }}" href="" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $item->id }}">
                                    <i class="fal fa-long-arrow-right"></i>{{ $item->title }}
                                </a>
                            </div>
    
                            <div id="collapse{{ $item->id }}" class="collapse  {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="text-white">
                                        {!! $item->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 d-flex">
                    <div class="faq-counter-boxes-two row align-self-center">
                        @foreach ($counters as $item)
                        <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="counter-box-two counter-active">
                                <div class="counter-wrap">
                                    <span class="counter">{{ $item->number }}</span> <sup>+</sup>
                                </div>
                                <span class="title">{{ $item->title }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="map-image">
            <img src="{{ asset('assets/front/') }}/images/map.png" alt="Map">
        </div>
    </section>
    <!--====== Counter Faq End ======-->
    @endif

    @if($visibility->is_t6_meetus_section == 1)
    <!--====== Call to action Start ======-->
    <section class="call-to-action-two cta-mt-negative">
        <div class="container">
            <div class="call-to-action-inner" style="background-image: url({{ asset('assets/front/img/'.$sinfo->meeet_us_bg_image ) }});">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7">
                        <h3 class="title">{{ $sinfo->meeet_us_text }}</h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ $sinfo->meeet_us_button_link }}" class="main-btn small-size rounded-btn icon-right mt-md-gap-40">{{ $sinfo->meeet_us_button_text }} <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Call to action End ======-->
    @endif

    @if($visibility->is_t6_blog_section == 1)
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

    @if($visibility->is_t6_map_section == 1)
    <!--====== Contact Map start ======-->
    <section class="contact-map">
        <div class="contact-map-one">
            {!! $sinfo->contact_map !!}
        </div>
    </section>
    <!--====== Contact Map End ======-->
    @endif

@endsection
