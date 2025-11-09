@extends('front.layout')

@section('meta-keywords', "$seo->faq_meta_key")
@section('meta-description', "$seo->faq_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $sinfo->faq_sub_title }}</h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ $sinfo->faq_sub_title }}</li>
						</ul>
					
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->


 <!--====== ABOT FAQ PART START ======-->
         
 <div class="faq-section section-gap">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-6 col-md-10">
					<div class="accordion-three accordion-three-two" id="accordionExample">
						@foreach ($faqs as $item)
						<div class="card">
							<div class="card-header" id="heading{{ $item->id }}">
								<a class="{{ $loop->first ? '' : 'collapsed' }}" href="" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $item->id }}">
									{{ $item->title }}
								</a>
							</div>

							<div id="collapse{{ $item->id }}" class="collapse  {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingO{{ $item->id }}" data-parent="#accordionExample">
								<div class="card-body">
									{!! $item->content !!}
								</div>
							</div>
						</div> <!-- card -->
						@endforeach
					</div>
			</div>
			<div class="col-lg-6">
				<div class="faq-video-thumb-area">
					<div class="tile-gallery-three mt-md-gap-50">
						<div class="img-one"> <img src="{{ asset('assets/front/img/'.$sinfo->faq_image2) }}" alt="Image"> </div>
						<div class="img-two text-right"> <img src="{{ asset('assets/front/img/'.$sinfo->faq_image1) }}" alt="Image"> </div>
					</div>
				</div>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== ABOT FAQ PART ENDS ======-->



@endsection
