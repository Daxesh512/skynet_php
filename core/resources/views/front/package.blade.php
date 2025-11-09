@extends('front.layout')

@section('meta-keywords', "$seo->package_meta_key")
@section('meta-description', "$seo->package_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $sinfo->package_title }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ $sinfo->package_title }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
  <!--====== SERVICES PLANS PART START ======-->
         
  <div class="pricing-section section-gap">
	<div class="container">
		<div class="row">
			@foreach($plans as $key => $plan)
			<div class="col-lg-4 col-md-6 col-sm-8 mt-30">
				<div class="pricing-plan-item text-center">
					<b class="plan-name">{{ $plan->title }}</b>
					<h3 class="price"><span> {{Helper::showCurrencyPrice($plan->price)}}</span></h3>
					@if($plan->time)
					<span class="plan-duration">{{ $plan->time }}</span>
					@else
					<span class="bar"></span>
					@endif
					<ul class="list">
						@php
							$feature = explode( ',', $plan->feature );
							for ($i=0; $i < count($feature); $i++) { 
								echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
							}
						@endphp
					</ul>
					@if ($plan->button_text != null && $plan->button_link != null)
						<a class="plans-btn" href="{{ $plan->button_link }}">{{ $plan->button_text }}</a>
					@endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div> 

<!--====== SERVICES PLANS PART ENDS ======-->



@endsection
