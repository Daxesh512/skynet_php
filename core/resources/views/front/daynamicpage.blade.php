@extends('front.layout')

@section('meta-keywords', "$front_daynamic_page->meta_keywords")
@section('meta-description', "$front_daynamic_page->meta_description")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $front_daynamic_page->title }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ $front_daynamic_page->title }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

    <!-- Faq Area Start -->
	<section class="pt-120 pb-120 dynamicpage">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        {!! $front_daynamic_page->body !!}
                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- Faq Area End -->

@endsection
