
@extends('front.layout')
@section('meta-keywords', "$portfolio->meta_keywords")
@section('meta-description', "$portfolio->meta_description")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $portfolio->title }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class=""><a href="{{ route('front.portfolio') }}">{{ __('Portfolio') }} </a></li>
							<li class="active" aria-current="page">{{ $portfolio->title }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== NEWS PART START ======-->
                   
 <div class="service-details-page section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-content">
                    @if($portfolio_images->count() > 0)
                    <div class="portfolio-details-slider">
                        @foreach ($portfolio_images as $item)
                            <div class="image">
                                <img src="{{ asset('assets/front/img/portfolio/'.$item->image ) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    @else
                    <div class="img">
                      <img src="{{ asset('assets/front/img/portfolio/'.$portfolio->featured_image) }}" alt="">
                    </div>
                    @endif
                    <div class="content">
                      {!! $portfolio->content !!}
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 blog-sidebar order-first order-lg-last">
                <div class="case-live">
                    <div class="case-live-item-area ">
                        <div class="case-live-item">
                            <h5 class="title">{{ __('Sweet Client') }}</h5>
                            <span>{{ $portfolio->client_name }}</span>
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title">{{ __('Start Date') }}</h5>
                            <span>{{ $portfolio->start_date }}</span>
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title">{{ __('Submit Date') }}</h5>
                            <span>{{ $portfolio->submission_date }}</span>
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="case-live-item">
                            <h5 class="title">{{ __('Category') }}</h5>
                            <span>{{ $portfolio->service->title }}</span>
                            <i class="fal fa-tags"></i>
                        </div>
                    </div>
                    @if($portfolio->link)
                    <div class="case-live-btn text-center">
                        <a class="main-btn" href="{{ $portfolio->link }}">{{ __('Live Preview') }}</a>
                    </div>
                    @endif
                </div>
                <div class="widget social-links mt-30">
                    <h4 class="widget-title">{{ __('Never Miss News') }}</h4>
                        <ul>
                          @foreach ($socials as $item)
                          <li><a href="{{ $item->url }}"><i class="{{ $item->icon }}"></i></a></li>
                          @endforeach
                        </ul>
                  </div>
                  <div class="side-bar-contact mt-30" style="background-image: url({{ asset('assets/front/img/'.$sinfo->contact_form_image) }});">
                      <div class="overlay"></div>
                      <div class="content">
                        <h3>{{ __('Make a call for any type query.') }}</h3>
                          <i class="fas fa-headset"></i>
                      <h4 class="call">
                        @php
                        $fnumber = explode( ',', $commonsetting->number );
                        for ($i=0; $i < count($fnumber); $i++) { 
                            echo '<a class="d-block" href="tel:'.$fnumber[$i].'">'.$fnumber[$i].'</a>';
                        }
                        @endphp
                      </h4>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div> 

<!--====== NEWS PART ENDS ======-->

@endsection
