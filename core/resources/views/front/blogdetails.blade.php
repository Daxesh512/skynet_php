@extends('front.layout')
@section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('blog Details') }}</h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
						<li class=""><a href="{{ route('front.blogs') }}">{{ __('Blog') }} </a></li>
						<li class="active" aria-current="page">{{ __('blog Details') }}</li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== BLOG STANDARD PART START ======-->
         
 <div class="blog-area section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="blog-dteails-content">
						<img class="main-image" src="{{asset('assets/front/img/blog/'.$blog->image) }}" alt="blog">
						<div class="content">
							<h3 class="title">{{ $blog->title }}</h3>
							<ul class="post-meta">
								<li><i class="fal fa-user"></i> By, Admin</li>
								<li><i class="fal fa-calendar-alt"></i> {{date ( 'd M, Y', strtotime($blog->created_at) )}}</li>
							</ul>
							<div>
								{!! $blog->content !!}
							</div>
							@if($visibility->is_blog_share_links == 1)
							<div class="blog-details-bar mt-30">
								<div class="blog-social">
									<h4 class="title">{{ __('Social Share :') }}</h4>
									
									<div class="share-blog">
										<div class="tag-social-link text-center justify-content-center">
											<!-- AddToAny BEGIN -->
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style d-inline-block">
											<a class="a2a_button_facebook"></a>
											<a class="a2a_button_twitter"></a>
											<a class="a2a_button_email"></a>
											<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
											</div>
											<script async src="https://static.addtoany.com/menu/page.js"></script>
											<!-- AddToAny END -->
										</div>
									</div>
								</div>
							</div>
							@endif
						</div>
					<br>
					<div class="discus-comment-box">
						@if($visibility->is_disqus	== 1)
						<div id="disqus_thread" class="mt-5"></div>
						<script>
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');
							s.src = '//{{ $commonsetting->disqus }}.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
						</script>
					@endif 
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
