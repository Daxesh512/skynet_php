@extends('front.layout')

@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $service->title }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class=""><a href="{{ route('front.service') }}">{{ __('Service') }} </a></li>
							<li class="active" aria-current="page">{{ $service->title }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== Service details  Start ======-->
<section class="service-details-page section-gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="service-details-content">
          <div class="img">
            <img src="{{ asset('assets/front/img/service/'.$service->image) }}" alt="">
          </div>
          <div class="content">
            {!! $service->content !!}
          </div>
        </div>
      </div>
      <div class="col-lg-4 blog-sidebar order-first order-lg-last">
        <div class="widget categories-widget">
            <h4 class="widget-title">{{ __('All Services') }}</h4>
          
              <ul>
                @foreach ($all_services as $item)
                  <li><a href="{{ route('front.service.details', $item->slug) }}" class="@if($service->id == $item->id ) active  @endif">{{ $item->title }}</a></li>
                  @endforeach
              </ul>
        </div>
        <div class="widget social-links">
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
</section>
<!--====== Service details  End ======-->


@endsection
