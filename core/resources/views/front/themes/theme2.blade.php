@extends('front.layout')
@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

<!--====== BANNER PART START ======-->
@if($visibility->is_t2_hero_section == 1)
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
        <div class="banner-section home2" style="background-image: url({{ asset('assets/front/') }}/images/banner-gradient-bg.png)">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-content pt-100">
                            <span class="title-tag wow fadeInDown" data-wow-delay="0.3s">{{ $sinfo->hero_sub_title }}</span>
                            <h1 class="title wow fadeInLeft" data-wow-delay="0.5s">{{ $sinfo->hero_title }}</h1>
                            <ul class="banner-btns">
                                @if($sinfo->hero_f_icon1 && $sinfo->hero_f_text1)
                                <li class="wow fadeInUp" data-wow-delay="0.7s">
                                    <a class="btn-1" href="#">
                                        <span class="icon"><i class="{{ $sinfo->hero_f_icon1 }}"></i></span>
                                        <span>{{ $sinfo->hero_f_text1 }}</span>
                                    </a>
                                </li>
                                @endif
                                @if($sinfo->hero_f_icon2 && $sinfo->hero_f_text2)
                                <li class="wow fadeInUp">
                                    <a class="btn-2"href="#">
                                        <span class="icon"><i class="{{ $sinfo->hero_f_icon2 }}"></i></span>
                                        <span>{{ $sinfo->hero_f_text2 }}</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
                <div class="banner-img">
                    <img src="{{ asset('assets/front/img/'.$sinfo->hero_image) }}" alt="">
                </div>
            </div> <!-- container -->
        </div>
    @endif
@endif
<!--====== BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->
@if($visibility->is_t2_about_section == 1)
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
@endif
<!--====== ABOUT PART ENDS ======-->



<!--====== SERVICES ITEM PART START ======-->
@if($visibility->is_t2_service_section == 1)
<div class="service-section section-gap soft-blue-bg">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50">
                        <span class="title-tag">{{ $sinfo->service_sub_title }}</span>
                        <h3 class="title">{{ $sinfo->service_title }}</h3>
                    </div> <!-- services title item -->
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
</div> 
@endif
<!--====== SERVICES ITEM PART ENDS ======-->


<!--====== INTRO VIDEO PART START ======-->
@if($visibility->is_t2_intro_video_section == 1)
<div class="intro-video-area" style="background-image: url({{ asset('assets/front/img/'.$sinfo->video_bg_image) }});">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="intro-video-content">
                        <span>{{ $sinfo->video_sub_title }}</span>
                        <h2 class="title">{{ $sinfo->video_title }}</h2>
                        <p class="text-1">{{ $sinfo->video_text }}</p>
                        <p class="text-2">{{ $sinfo->video_content }}</p>
                    </div> <!-- intro video content -->
                </div>
                <div class="col-lg-6 col-md-10 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="intro-thumb mt-md-gap-60">
                        <img src="{{ asset('assets/front/img/'.$sinfo->video_image) }}" alt="">
                        <a class="video-popup" href="{{ $sinfo->video_link }}"><i class="fas fa-play"></i></a>
                    </div> <!-- intro thumb -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
</div>
@endif
<!--====== INTRO VIDEO PART ENDS ======-->

<!--====== LEADERSHIP PART START ======-->
@if($visibility->is_t2_team_section == 1)
<div class="team-area section-gap soft-blue-bg position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="title-tag">{{ $sinfo->team_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->team_title }}</h2>
                </div> <!-- section title 2 -->
            </div>
        </div> <!-- row -->
        <div class="row team-members team-slider-two">
            @foreach ($teams as $item)
            <div class="col-lg-4">
                <div class="team-member-three mb-30">
                    <div class="member-inner">
                        <img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="">
                        <div class="team-content">
                            <h5 class="name"><a href="{{ route('front.team_details', $item->id) }}">{{ $item->name }}</a></h5>
                            <span class="position">{{ $item->dagenation }}</span>
                        </div>
                    </div>
                </div> <!-- leadership item -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endif
<!--====== LEADERSHIP PART ENDS ======-->

<!--====== PROGRESS BAR PART START ======-->
@if($visibility->is_t2_counter_section == 1)
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
@endif
<!--====== PROGRESS BAR PART ENDS ======-->

<!--====== TESTIMONIAL PART START ======-->
@if($visibility->is_t2_testimonial_section == 1)
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
@endif
<!--====== TESTIMONIAL PART ENDS ======-->

<!--====== QUOTE PART START ======-->
@if($visibility->is_t2_contact_section == 1)
<div class="conatct-section-two section-gap" style="background-image: url({{ asset('assets/front/img/'.$sinfo->contact_section_bg_image) }});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title white-color text-center mb-40">
                    <span class="title-tag">{{ $sinfo->contact_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->contact_title }}</h2>
                </div> <!-- section title 2 -->
            </div>
        </div> <!-- row -->
        <div class="contact-form">
            <form action="{{ route('front.contact.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="{{ __('Full Name Here') }}" name="name">
                            <span class="icon"><i class="fal fa-user"></i></span>
                            @if ($errors->has('name'))
                                <p class="text-danger"> {{ $errors->first('name') }} </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="email" placeholder="{{ __('Email Here') }}" name="email">
                            <span class="icon"><i class="fal fa-envelope"></i></span>
                            @if ($errors->has('email'))
                                <p class="text-danger"> {{ $errors->first('email') }} </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="{{ __('Phone No') }}" name="phone">
                            <span class="icon"><i class="fal fa-phone"></i></span>
                        </div> <!-- input box -->
                        @if ($errors->has('phone'))
                            <p class="text-danger"> {{ $errors->first('phone') }} </p>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mt-30">
                            <input type="text" placeholder="{{ __('Subject') }}" name="subject">
                            <span class="icon"><i class="fal fa-edit"></i></span>
                            @if ($errors->has('subject'))
                            <p class="text-danger"> {{ $errors->first('subject') }} </p>
                        @endif
                        </div> <!-- input box -->
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group  textarea-group  mt-30">
                            <textarea name="message" id="#" cols="30" rows="10" placeholder="{{ __('Message Us') }}"></textarea>
                            <span class="icon"><i class="fal fa-pencil"></i></span>
                            @if ($errors->has('message'))
                            <p class="text-danger"> {{ $errors->first('message') }} </p>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-lg-12  mt-30">
                        @if ($visibility->is_recaptcha == 1)
                        <div class="d-inline-block">
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
                        <div class="input-group  textarea-group mt-20">
                            
                            <button class="main-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" type="submit">{{ __('Message Us') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- quote form -->
    </div> <!-- container -->
</div>
@endif
<!--====== QUOTE PART ENDS ======-->


<!--====== ANSWERS PART START ======-->
@if($visibility->is_t2_faq_section == 1)
<div class="counter-faq-section section-gap soft-blue-bg">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title mb-50">
                    <span class="title-tag">{{ $sinfo->faq_sub_title }}</span>
                    <h2 class="title">{{ $sinfo->faq_title }}</h2>
                
                </div> <!-- section title 2 -->
                <div class="accordion-two" id="accordionExample">
                    @foreach ($faqs as $item)
                    <div class="card">
                        <div class="card-header" id="heading{{ $item->id }}">
                            <a class="{{ $loop->first ? '' : 'collapsed' }}" href="" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $item->id }}">
                                {{ $item->title }}
                            </a>
                        </div>

                        <div id="collapse{{ $item->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $item->content !!}
                            </div>
                        </div>
                    </div> <!-- card -->
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="tile-gallery-three mt-md-gap-50">
                    <div class="img-one wow fadeInRight" data-wow-delay="0.4s">
                        <img src="{{ asset('assets/front/img/'.$sinfo->faq_image2) }}" alt="">
                    </div>
                    <div class="img-two text-right wow fadeInUp" data-wow-delay="0.4s">
                        <img src="{{ asset('assets/front/img/'.$sinfo->faq_image1) }}" alt="">
                    </div>
                </div> <!-- answers thumb -->
            </div>
        </div> <!-- row -->
    </div> <!-- containter -->
</div>
@endif
<!--====== ANSWERS PART ENDS ======-->

<!--====== ACTION 2 PART START ======-->
@if($visibility->is_t2_quote_section == 1)
<div class="call-to-action-four section-gap" style="background-image: url({{ asset('assets/front/img/'.$sinfo->contact_section_bg_image) }});">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="cta-content">
                    <h2 class="title">{{ __('Get A Quote right now.') }}</h2>
                </div> <!-- action item -->
            </div>
            <div class="col-lg-7">
                <div class="cta-btns">
                    <div class="cta-btn">
                        <p>{{ __('Mail Us') }}</p>
                        <span>
                            @php
                            $number = explode( ',', $commonsetting->number );
                            @endphp
                            {{ $number[0] }}
                        </span>
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="cta-btn cta-btn-2">
                        <p>{{ __('Make A Call') }}</p>
                        <span>
                            @php
                            $email = explode( ',', $commonsetting->email );
                            @endphp
                            {{ $email[0] }}
                        </span>
                        <i class="fal fa-phone"></i>
                    </div>
                </div> <!-- action support -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div> 
@endif
<!--====== ACTION 2 PART ENDS ======-->

<!--====== LATEST NEWS PART START ======-->
@if($visibility->is_t2_news_section == 1)
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
<!--====== LATEST NEWS PART ENDS ======-->

<!--====== BRAND 2 PART START ======-->
@if($visibility->is_t2_client_section == 1)
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
