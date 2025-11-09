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
					<h2 class="title">{{ __('Success') }}</h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Success') }}</li>
						</ul>
					
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->


 <!--====== ABOT FAQ PART START ======-->
         
 <div class="section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="order-success-box">
                    <h1>{{ __('Successfuly Order Done !') }}</h1>
                    <p>{{ __('Payment Compleate, and Invoice sent to your email.') }}</p>
					<a href="{{ route('front.index') }}" class="main-btn mt-4">{{ __('Back Home') }}</a>
                </div>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== ABOT FAQ PART ENDS ======-->



@endsection
