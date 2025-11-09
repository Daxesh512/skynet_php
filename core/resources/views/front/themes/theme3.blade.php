@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')


 <!--====== BANNER PART START ======-->
 @if($visibility->is_t3_hero_section == 1)
    @if ($visibility->is_video_hero == 1)
    <section id="herovideo" class="banner-section-three" style="background-image: url({{ asset('assets/front/img/'.$sinfo->hero_bg_image ) }});">
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
        <div class="banner-section-two" style="background-image: url({{ asset('assets/front/img/'.$sinfo->hero_bg_image ) }});">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="banner-content text-center">
                                <span class="title-tag wow fadeInDown" data-wow-delay="0.3s">{{ $sinfo->hero_sub_title }}</span>
                                <h1 class="title wow fadeInLeft" data-wow-delay="0.5s">{{ $sinfo->hero_title }}</h1>
                                <p>{{ $sinfo->hero_text }}</p>
                                <ul class="banner-btns">
                                    <li class="wow fadeInUp" data-wow-delay="0.7s">
                                        <a class="main-btn rounded-btn" href="{{ route('front.quot') }}">{{ __('Gate A Quote') }}</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.8s">
                                        <a class="main-btn transparent-border-btn rounded-btn" href="{{ route('front.about') }}">{{ __('Learn More') }}</a>
                                    </li>
                                </ul>
                            </div> <!-- banner content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
        </div>
    @endif
@endif
<!--====== BANNER PART ENDS ======-->

<!--====== SERVICES PART START ======-->
@if($visibility->is_t3_service_section == 1)
<div class="service-section section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-50">
                    <span class="title-tag">{{ $sinfo->service_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->service_title }}</h2>
                </div><!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row service-items justify-content-center">
            @foreach ($services as $item)
            <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-duration=".1s" data-wow-delay=".3s">
                <div class="service-item-six text-center mt-30">
                    <div class="icon">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <h4 class="title">{{ $item->title }}</h4>
                    <p>{{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 120) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 120) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}</p>
                    <a href="{{ route('front.service.details', $item->slug) }}" class="service-link"><i class="fal fa-angle-right"></i> {{ __('Read More') }}</a>
                </div> <!-- singke services -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== SERVICES PART ENDS ======-->

<!--====== VIDEO PART START ======-->
@if($visibility->is_t3_portfolio_section == 1)
<div class="intro-video-area-two" style="background-image: url({{ asset('assets/front/') }}/images/video-bg.jpg);">
    <div class="container">
        <div class="video-item text-center">
            <a class="video-popup" href="{{ $sinfo->video_link }}"><i class="fal fa-play"></i></a><br>
        </div>
    </div> <!-- container -->
    <div class="video-thumb-1 wow fadeInLeft" data-wow-delay="0.3s">
        <img src="{{ asset('assets/front/img/'.$sinfo->video_image_left) }}" alt="">
    </div>
    <div class="video-thumb-2 wow fadeInRight" data-wow-delay="0.3s">
        <img src="{{ asset('assets/front/img/'.$sinfo->video_image_right) }}" alt="">
    </div>
</div>
@endif
<!--====== VIDEO PART ENDS ======-->

<!--====== PORTFOLIO PART START ======-->
@if($visibility->is_t3_portfolio_section == 1)
<div class="portfolio-area portfolio-mt-negative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="section-title-two text-center white-color mb-60">
                    <span class="title-tag">{{ $sinfo->portfolio_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->portfolio_title }}</h2>
                </div>
            </div>
        </div>
        <div class="portfolio-items portfolio-slider-three row">
            @foreach ($portfolios as $item)
            <div class="col-auto">
                <a href="{{ route('front.portfolio.details', $item->slug) }}" class="portfolio-item-two mb-30">
                    <div class="portfolio-img" style="background-image: url({{ asset('assets/front/img/portfolio/'.$item->featured_image) }});"> </div>
               
                    <div class="portfolio-content">
                        <span class="category">{{ $item->service->title }}</span>
                        <h5 class="title">
                            {{ (strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}
                        </h5>
                        <p>{{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 120) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 120) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}</p>
                    </div>
                </a> <!-- single portfolio -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== PORTFOLIO PART ENDS ======-->

<!--====== TESTIMONIAL PART START ======-->
@if($visibility->is_t3_testimonial_section == 1)
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
                        <span class="d-block">
                                 @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                    </span>
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
@endif
<!--====== TESTIMONIAL PART ENDS ======-->

<!--====== FAQ PART START ======-->
@if($visibility->is_t3_faq_section == 1)
<div class="counter-faq-section section-gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="section-title-two mb-50">
                    <span class="title-tag">{{ $sinfo->faq_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->faq_title }}</h2>
                </div> <!-- section title -->
                <div class="accordion-three" id="accordionExample">
                    @foreach ($faqs as $item)
                    <div class="card">
                        <div class="card-header" id="heading{{ $item->id }}">
                            <a class="{{ $loop->first ? '' : 'collapsed' }}" href="" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $item->id }}">
                                {{ $item->title }}
                            </a>
                        </div>

                        <div id="collapse{{ $item->id }}" class="collapse  {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>{!! $item->content !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="faq-counter-boxes mt-md-gap-50 row">
                    @foreach ($counters as $item)
                    <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="counter-box-four counter-active mt-30">

                            <div class="counter-wrap">
                                <span class="counter">{{ $item->number }}</span>
                            </div>
                            <span class="title">{{ $item->title }}</span>
                            <p>{{ $item->text }}</p>
                            <i class="{{ $item->icon }}"></i>
                        </div> <!-- single faq -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== FAQ PART ENDS ======-->

<!--====== TEAM PART START ======-->
@if($visibility->is_t3_team_section == 1)
<div class="team-area team-section-extra-padding soft-blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title-two text-center mb-50">
                    <span class="title-tag">{{  $sinfo->team_sub_title  }}</span>
                    <h2 class="title">{{  $sinfo->team_title  }}</h2>
                </div><!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            @foreach ($teams as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="team-member-four text-center mt-30">
                    <div class="member-photo">
                        <img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="">
                    </div>
                    <div class="member-content">
                        <h5 class="title"><a href="{{ route('front.team_details', $item->id) }}">{{ $item->name }}</a></h5>
                        <span class="position">{{ $item->dagenation }}</span>
                    </div>
                </div> <!-- single team -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== TEAM PART ENDS ======-->

<!--====== ACTION PART START ======-->
@if($visibility->is_t3_meet_us_section == 1)
<div class="call-to-action-three cta-mt-negative bg_cover">
    <div class="call-to-action-inner"  style="background-image: url({{ asset('assets/front/img/'.$sinfo->meeet_us_bg_image ) }});">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="section-title-two white-color">
                        <h3 class="title">{{ $sinfo->meeet_us_text }}</h3>
                    </div> <!-- action content -->
                </div>
                <div class="col-auto">
                    <a class="main-btn small-size rounded-btn mt-md-gap-30" href="{{ route('front.contact') }}"><i class="fal fa-comments"></i>{{ $sinfo->meeet_us_button_text }}</a>
                </div>
            </div>
        </div> <!-- container -->
    </div>
</div>
@endif
<!--====== ACTION PART ENDS ======-->

<!--====== BLOG PART START ======-->
@if($visibility->is_t3_news_section == 1)
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
@endif
<!--====== BLOG PART ENDS ======-->


    <!--====== BRAND 2 PART START ======-->
    @if($visibility->is_t3_client_section == 1)
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
    @endif
    <!--====== BRAND 2 PART ENDS ======-->
@endsection