@extends('front.layout')

@section('meta-keywords', "$seo->blog_meta_key")
@section('meta-description', "$seo->blog_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('Blog') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Blog') }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== BLOG STANDARD PART START ======-->
         
 <div class="section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="blog-standard">
					@if (count($blogs) == 0)
						<div class="col-md-12">
							<div class="bg-light py-5">
							<h3 class="text-center">{{__('NO BLOG FOUND')}}</h3>
							</div>
						</div>
					@else
					<div class="row">
						@foreach ($blogs as $item)
						<div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
							<div class="latest-news-box mb-30">
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
					@endif
				</div>
				<div class="row mt-30">
					<div class="col-lg-12 text-center">
						<div class="d-inline-block">
							{{$blogs->appends(['language' => request()->input('language')])->links()}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4  order-first order-lg-last">
				<div class="blog-sidebar">
					<div class="widget search-widget">
						<h4 class="widget-title">{{ __('Search Blog') }}</h4>
							<form action="{{route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])}}" method="GET">
								<div class="input-box">
									<input name="category" type="hidden" value="{{request()->input('category')}}">
									<input name="month" type="hidden" value="{{request()->input('month')}}">
									<input name="year" type="hidden" value="{{request()->input('year')}}">
									<input name="term" type="text" placeholder="{{ __('Search Blog') }}..." value="{{request()->input('term')}}">
									<button type="submit"><i class="fal fa-search"></i></button>
								</div>
							</form>
					</div>
					<div class="widget categories-widget">
						<h4 class="widget-title">{{ __('Categories') }}</h4>
					
							<ul>
								@foreach ($bcategories as $bcategory)
								<li><a href="{{route('front.blogs',  ['term'=>request()->input('term'), 'category'=>$bcategory->slug,  'month' => request()->input('month'), 'year' => request()->input('year')]) }}"  class="@if(request()->input('category') == $bcategory->slug) active @endif">{{ $bcategory->name }}<span>{{ $bcategory->blogs->count() }}</span></a></li>
								@endforeach
							</ul>
					</div>
					<div class="widget news-feed-widget">
						<h4 class="widget-title">{{ __('Latest News') }}</h4>
						<div class="sidebar-feeds mt-45">
							
							<div class="news-feed-items">
								@foreach ($latestblogs as $latestblog)
								<div class="news-feed-item">
                                    <a href="{{route('front.blogdetails', $latestblog->slug)}}">
										<h4 class="title">
										{{ (strlen(strip_tags(Helper::convertUtf8($latestblog->title))) > 50) ? substr(strip_tags(Helper::convertUtf8($latestblog->title)), 0, 50) . '...' : strip_tags(Helper::convertUtf8($latestblog->title)) }}
										</h4>
									</a>
									<span><i class="fal fa-calendar-alt"></i>{{date ( 'd M, Y', strtotime($latestblog->created_at) )}}</span>
                                    <img src="{{asset('assets/front/img/blog/'.$latestblog->image)}}" alt="Image">
                                </div>
								@endforeach
							</div>
							
						</div>
					</div>

					<div class="widget tags-widget">
						<h4 class="widget-title">{{ __('Arcive') }}</h4>
						<ul>
							@foreach ($archives as $key => $archive)
								@php
									$myArr = explode('/', $archive->date);

									$monthNum  = $myArr[0];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F');
								@endphp
								<li><a 
									class="single-category @if(request()->input('month') == $myArr[0] && request()->input('year') == $myArr[1]) active @endif"
									
									href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>request()->input('category'),'month'=>$myArr[0], 'year'=>$myArr[1]])}}" 
									>
									{{$monthName}} {{$myArr[1]}}
									</a>
							</li>
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
				</div>
			</div>
		</div>
	</div>
</div> 

 <!--====== BLOG STANDARD PART End ======-->
@endsection
