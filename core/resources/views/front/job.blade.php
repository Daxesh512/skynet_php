@extends('front.layout')

@section('meta-keywords', "$seo->career_meta_key")
@section('meta-description', "$seo->career_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('Career') }}</h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Career') }}</li>
						</ul>
					
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div>         

<!--====== PAGE TITLE PART ENDS ======-->


 <!--====== ABOT FAQ PART START ======-->
         
 <div class="blog-standard-area pt-120 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				@if (count($jobs) == 0)
						<div class="col-md-12">
							<div class="bg-light py-5">
							<h3 class="text-center">{{__('NO JOB FOUND')}}</h3>
							</div>
						</div>
				@else
				@foreach ($jobs as $job)
					<div class="single-job">
						<a href="{{ route('front.careerdetails', $job->slug) }}"><h3 class="title">{{ $job->title }}</h3></a>
						<p><span><i class="far fa-calendar-alt"></i>Deadline :</span> {{ $job->deadline }}</p>
						<p><span><i class="fas fa-money-bill-wave"></i>Salary :</span> {{ $job->salary }}</p>
						<p><span><i class="fas fa-briefcase"></i> Work Experience :</span>
							
							 {{ (strlen(strip_tags(Helper::convertUtf8($job->experience_requirement))) > 100) ? substr(strip_tags(Helper::convertUtf8($job->experience_requirement)), 0, 100) . '...' : strip_tags(Helper::convertUtf8($job->experience_requirement)) }}
							</p>
						<p><span><i class="fas fa-gift"></i>Vacancy :</span> {{ $job->vacancy }}</p>
						<a href="{{ route('front.careerdetails', $job->slug) }}">{{ __('Read More') }}<i class="fal fa-long-arrow-right"></i></a>
					</div>
					@endforeach
					<div class="d-block text-center">
						<div class="d-inline-block">
							{{$jobs->appends(['language' => request()->input('language')])->links()}}
						</div>
					</div>
				@endif
                
            </div>
			<div class="col-lg-4  order-first order-lg-last">
				<div class="blog-sidebar">
				<div class="widget search-widget">
					<h4 class="widget-title">{{ __('Search Job') }}</h4>
					<div class="sidebar-search-item text-center mt-35">
						<form action="{{route('front.career', ['category' => request()->input('category') ])}}" method="GET">
							<div class="input-box">
								<input name="category" type="hidden" value="{{request()->input('category')}}">
								<input name="term" type="text" placeholder="{{ __('Search Job') }}..." value="{{request()->input('term')}}">
								<button type="submit"><i class="fal fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="widget categories-widget">
                    <h4 class="widget-title">{{ __('All Categories') }}</h4>
                        <ul>
                            <li >
                                <a href="{{route('front.career')}}" class="@if(empty(request()->input('category'))) active @endif">{{ __('All') }}
									<span>{{ $alljobs->count() }}</span></a>
								</a>
                            </li>
                          @foreach ($jcategories as $item)
                            <li><a href="{{ route('front.career',['category'=>$item->slug]) }}" class=" @if(request()->input('category') == $item->slug) active @endif
                                ">{{ $item->name }}
								<span>{{ $item->jobs->count() }}</span></a></li>
							</a></li>
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
	</div> <!-- container -->
</div> 

<!--====== ABOT FAQ PART ENDS ======-->



@endsection
