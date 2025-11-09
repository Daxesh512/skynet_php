@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

<!--====== BANNER PART START ======-->
@if($visibility->is_t4_hero_section == 1)
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
@endif
<!--====== BANNER PART ENDS ======-->

@if($visibility->is_t4_client_section == 1)
<div class="brand-section section-gap-top">
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

<!--====== FEATURES PART START ======-->
@if($visibility->is_t4_about_section == 1)
<div class="about-section section-gap">
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
<div class="container section-gap-bottom">
    <div class="row service-items">
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
@endif
<!--====== FEATURES PART ENDS ======-->

<!--====== CHOOSE PART START ======-->
@if($visibility->is_t4_who_we_are_section == 1)
<div class="whu-section section-gap soft-blue-bg">
    <div class="container">
        
        <div class="row justify-content-center align-content-center">
            <div class="col-lg-6 col-md-10 order-lg-2">
                <div class="tile-gallery-two mb-md-gap-50">
                    <div class="img-one wow fadeInRight" data-wow-delay="0.3s">
                        <img  src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image1 ) }}" alt="">
                    </div>
                    <div class="img-two text-right wow fadeInUp" data-wow-delay="0.5s">
                        <img  src="{{ asset('assets/front/img/'.$sinfo->w_c_us_image2 ) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 order-lg-1">
                <div class="section-title mb-50 wow fadeInUp" data-wow-delay="0.3s">
                    <span class="title-tag">{{  $sinfo->w_c_us_sub_title  }}</span>
                    <h3 class="title">{{  $sinfo->w_c_us_title  }}</h3>
                </div>
                <ul class="feature-list">
                    @foreach ($why_selects as $item)
                    <li class="wow fadeInUp"  data-wow-delay="0.5s">
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->text }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if($setting->is_t4_intro_video_section == 1)
        <div class="feature-intro-video mt-100">
            <img src="{{ asset('assets/front/img/'.$sinfo->video_bg_image ) }}" alt="">
            <a class="video-popup" href="{{  $sinfo->video_link  }}"><i class="fal fa-play"></i></a>
        </div>
        @endif
    </div>
</div> 
@endif
<!--====== CHOOSE PART ENDS ======-->

<!--====== PORTFOLIO 3 PART START ======-->
@if($visibility->is_t4_portfolio_section == 1)  
<div class="portfolio-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-30">
                    <span class="title-tag">{{ $sinfo->portfolio_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->portfolio_title }}</h2>
                </div>
            </div>
        </div>
        <div class="portfolio-items justify-content-center row">
            @foreach ($portfolios as $item)
            <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-item-two mt-30">
                    <div class="portfolio-thumb">
                        <div class="portfolio-img" style="background-image: url({{ asset('assets/front/img/portfolio/'.$item->featured_image) }});"> </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="category">{{ $item->service->title }}</span>
                        <h5 class="title"><a href="{{ route('front.portfolio.details', $item->slug) }}">
                            {{ (strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title)) }}
                            </a></h5>
                        <p>{{ (strlen(strip_tags(Helper::convertUtf8($item->content))) > 120) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 120) . '...' : strip_tags(Helper::convertUtf8($item->content)) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> 
@endif
<!--====== PORTFOLIO 3 PART ENDS ======-->

<!--====== COUNTER PART START ======-->
@if($visibility->is_t4_counter_section == 1)  
<div class="counter-section-two" style="background-image: url({{ asset('assets/front/') }}/images/video-bg.jpg);">
    <div class="container">
        <div class="row">
            @foreach ($counters as $item)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box-five counter-active mb-50">
                    <div class="icon"><i class="{{ $item->icon }}"></i></div>
                    <div class="content">
                        <span class="counter">{{ $item->number }}</span>
                        <h6 class="title">{{ $item->title }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> 
@endif
<!--====== COUNTER PART ENDS ======-->

<!--====== TESTIMONIAL PART START ======-->
@if($visibility->is_t4_testmonial_section == 1)  
<section class="testimonials-section section-gap-top">
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

@endif
<!--====== TESTIMONIAL PART ENDS ======-->
    
<!--====== FAQ PART START ======-->
@if($visibility->is_t4_faq_section == 1)  
<div class="faq-section section-gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="tile-gallery-three mb-md-gap-50">
                    <div class="img-one">
                        <img src="{{ asset('assets/front/img/'.$sinfo->faq_image2) }}" alt="">
                    </div>
                    <div class="img-two text-right">
                        <img src="{{ asset('assets/front/img/'.$sinfo->faq_image1) }}" alt="">
                    </div>
                </div> <!-- faq thumb -->
            </div>
            <div class="col-lg-6 col-md-10 wow fadeInRight" data-wow-delay="0.3s">
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
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== FAQ PART ENDS ======-->

<!--====== GET IN TOUCH PART START ======-->
@if($visibility->is_t4_contact_section == 1)   
<div class="conatct-section-three soft-blue-bg section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-50">
                    <span class="title-tag">{{ $sinfo->contact_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->contact_title }}</h2>
                </div> <!-- section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-area">
                    <form action="{{ route('front.contact.submit') }}" method="POST">
                        @csrf
                        <div class="input-box wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                            <input type="text" placeholder="{{ __('Full Name Here') }}" name="name">
                        </div>
                        <div class="input-box mt-20 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".4s">
                            <input type="email" placeholder="{{ __('Email Here') }}" name="email">
                        </div>
                        <div class="input-box mt-20 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".4s">
                            <input type="text" placeholder="{{ __('Phone No') }}" name="phone">
                        </div>
                        <div class="input-box mt-20 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".4s">
                            <input type="text" placeholder="{{ __('Subject') }}" name="subject">
                        </div>
                        <div class="input-box mt-20 wow fadeInLeft" data-wow-duration="1.4s" data-wow-delay=".6s">
                            <textarea name="message" id="#" cols="30" rows="10" placeholder="{{ __('Message Us') }}"></textarea>
                        </div>
                        <div class="input-box mt-20">
                            @if ($visibility->is_recaptcha == 1)
                            <div class="">
                              {!! NoCaptcha::renderJs() !!}
                              {!! NoCaptcha::display() !!}
                              @if ($errors->has('g-recaptcha-response'))
                                @php
                                    $errmsg = $errors->first('g-recaptcha-response');
                                @endphp
                                <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                              @endif
                            </div>
                        @endif
                            <button class="main-btn  mt-20 wow fadeInUp" data-wow-duration="1.6s" data-wow-delay=".2s" type="submit">{{ __('Send Message') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact-map-two mt-md-gap-50">
                    {!! $sinfo->contact_map !!}
                </div>
            </div>
        </div>
    </div>
</div> 
@endif
<!--====== GET IN TOUCH PART ENDS ======-->

@endsection