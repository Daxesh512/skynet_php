@extends('front.layout')
@section('meta-keywords', "$seo->team_meta_key")
@section('meta-description', "$seo->team_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('Team') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Team') }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
<!--====== LEADERSHIP PART START ======-->

<div class="leadership-area section-gap">
	<div class="container">
		<div class="row">
			@foreach($teams as $key => $item)
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="team-member mb-30">
					<div class="member-photo">
						<img src="{{ asset('assets/front/img/team/'.$item->image) }}" alt="Member-Photo">
						<div class="social-icon">
							@if($item->url1 && $item->icon1)
								<a href="{{ $item->url1 }}">
									<i class="{{ $item->icon1 }}"></i>
								</a>
							@endif
							@if($item->url2 && $item->icon2)
								<a href="{{ $item->url2 }}">
									<i class="{{ $item->icon2 }}"></i>
								</a>
							@endif
							@if($item->url3 && $item->icon3)
								<a href="{{ $item->url3 }}">
									<i class="{{ $item->icon3 }}"></i>
								</a>
							@endif
							@if($item->url4 && $item->icon4)
								<a href="{{ $item->url4 }}">
									<i class="{{ $item->icon4 }}"></i>
								</a>
							@endif
							@if($item->url5 && $item->icon5)
								<a href="{{ $item->url5 }}">
									<i class="{{ $item->icon5 }}"></i>
								</a>
							@endif
						</div>
					</div>
					<div class="team-content">
						<h5 class="name"><a href="{{ route('front.team_details', $item->id) }}">{{ $item->name }}</a></h5>
						<span class="position">{{ $item->dagenation }}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div> <!-- row -->
		<div class="row mt-30">
			<div class="col-lg-12 text-center">
				<div class="d-inline-block">
					{{ $teams->links() }}
				</div>
			</div>
		</div>
	</div> <!-- container -->
</div>
<!--====== LEADERSHIP PART ENDS ======-->

	<!-- Team Area Start -->
	{{-- <section class="team team-page">
		<div class="container">
			<div class="row">
				@foreach($teams as $key => $team)
				<div class="col-lg-4 col-md-6">
					<div class="team-member">
						<div class="member-pic">
						<img src="{{ asset('assets/front/img/'.$team->image) }}" alt="">
						</div>

						<div class="social">
							<ul>
								@if($team->url1 && $team->icon1)
								<li>
									<a href="{{ $team->url1 }}">
										<i class="{{ $team->icon1 }}"></i>
									</a>
								</li>
								@endif
								@if($team->url2 && $team->icon2)
								<li>
									<a href="{{ $team->url2 }}">
										<i class="{{ $team->icon2 }}"></i>
									</a>
								</li>
								@endif
								@if($team->url3 && $team->icon3)
								<li>
									<a href="{{ $team->url3 }}">
										<i class="{{ $team->icon3 }}"></i>
									</a>
								</li>
								@endif
							</ul>
						</div>

						<div class="member-data">
						<div class="name">
							<h4 class="title">{{ $team->name }}</h4>
							<p class="position">{{ $team->dagenation }}</p>
						</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="d-inline-block">
						{{ $teams->links() }}
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- Team Area End -->

@endsection
