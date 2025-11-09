@extends('front.layout')
@section('meta-keywords', "$seo->contact_meta_key")
@section('meta-description', "$seo->contact_meta_desc")

@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('Contact') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Contact') }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== CONTACT DETAILS PART START ======-->
         
 <div class="contact-info-section section-gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
					<div class="contact-info-items mb-md-gap-50">
						<div class="contact-info-item text-center">
							<i class="fal fa-phone"></i>
							<h5 class="title">{{ __('Phone Number') }}</h5>
								@php
                                    $fnumber = explode( ',', $setting->number );
                                    for ($i=0; $i < count($fnumber); $i++) { 
                                        echo '<p>'.$fnumber[$i].'</p>';
                                    }
                                @endphp
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-envelope"></i>
							<h5 class="title">{{ __('Email Address') }}</h5>
							@php
								$femail = explode( ',', $setting->email );
								for ($i=0; $i < count($femail); $i++) { 
									echo '<p>'.$femail[$i].'</p>';
								}
							@endphp
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-map"></i>
							<h5 class="title">{{ __('Office Location') }}</h5>
							<p>{{ $setting->address }}</p>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-globe"></i>
							<h5 class="title">{{ __('Opening Hours') }}</h5>
							<p>{{ $setting->opening_hours }}</p>
						</div>
					</div>
			</div>
			<div class="col-lg-6 ">
				<div class="contact-map-three">
					{!! $sinfo->contact_map !!}
				</div> <!-- map area -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== CONTACT DETAILS PART ENDS ======-->

<!--====== GET IN TOUCH PART START ======-->
{{-- <section class="conatct-section section-gap">
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
						<img src="{{ asset('assets/front/img/'.$sinfo->contact_form_image) }}" alt="">
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
										<input type="text" placeholder="{{ __('Full Name Here') }}" name="name">
										<span class="icon"<i class="fal fa-user"></i></span>
									</div> <!-- input box -->
									@if ($errors->has('name'))
										<p class="text-danger"> {{ $errors->first('name') }} </p>
									@endif
								</div>
								<div class="col-lg-6">
									<div class="input-group mt-30">
										<input type="email" placeholder="{{ __('Email Here') }}" name="email">
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
										<div class="contact-btn-captcha-wrapper  align-items-center pt-3">
										
											<button class="main-btn wow slideInUp d-inline-block" data-wow-duration="1.5s" data-wow-delay="0s" type="submit">{{ __('Send Message') }}
											<i class="fal fa-long-arrow-right"></i></button>
											@if ($visibility->is_recaptcha == 1)
												<div class="mt-3 d-inline-block ml-4" >
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
	<div class="conatct-one-bg" style="background-image: url({{ asset('assets/front/img/'.$sinfo->contact_section_bg_image) }})"></div>
</section> --}}
<!--====== GET IN TOUCH PART ENDS ======-->

@endsection
