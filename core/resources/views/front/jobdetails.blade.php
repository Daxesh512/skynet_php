@extends('front.layout')

@section('meta-keywords', "$job->meta_tags")
@section('meta-description', "$job->meta_description")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ $job->title }}</h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ $job->title }}</li>
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
				<div class="jobdetails-area">
                    <h3 class="job_name"><i class="fas fa-briefcase"></i> {{ $job->title }}</h3>
                    
                    @if ($job->job_responsibility != null)
                    <div class="j-info">
                        <h4>{{ __('Job Responsibilities') }}</h4>
                        <p>
                            {!! $job->job_responsibility !!}
                        </p>
                    </div> 
                    @endif
                    
                    @if ($job->job_context != null)
                    <div class="j-info">
                        <h4>{{ __('Job Context') }}</h4>
                        <p>
                            {!! $job->job_context !!}
                        </p>
                    </div>
                    @endif
                   
                    @if ($job->education_requirement != null)
                    <div class="j-info">
                        <h4>{{ __('Educational Requirements') }}</h4>
                        <p>
                            {!! $job->education_requirement !!}
                        </p>
                    </div>
                    @endif

                    @if ($job->experience_requirement != null)
                    <div class="j-info">
                        <h4>{{ __('Experience Requirements') }}</h4>
                        <p>
                            {!! $job->experience_requirement !!}
                        </p>
                    </div>
                    @endif

                    @if ($job->additional_requirement != null)
                    <div class="j-info">
                        <h4>{{ __('Additional Requirements') }}</h4>
                        <p>
                            {!! $job->additional_requirement !!}
                        </p>
                    </div>
                    @endif

                    @if ($job->job_location != null)
                    <div class="j-info">
                        <h4>{{ __('Job Location') }}</h4>
                        <p>
                            {{ $job->job_location }}
                        </p>
                    </div>
                    @endif

                    @if ($job->employment_status != null)
                    <div class="j-info">
                        <h4>{{ __('Employment Status') }}</h4>
                        <p>
                            {{ $job->employment_status }}
                        </p>
                    </div>
                    @endif

                    @if ($job->salary != null)
                    <div class="j-info">
                        <h4>{{ __('Salary') }}</h4>
                        <p>
                            {{ $job->salary }}
                        </p>
                    </div>
                    @endif

                    @if ($job->vacancy != null)
                    <div class="j-info">
                        <h4>{{ __('Vacancy') }}</h4>
                        <p>
                            {{ $job->vacancy }}
                        </p>
                    </div>
                    @endif

                    @if ($job->position != null)
                    <div class="j-info">
                        <h4>{{ __('Position') }}</h4>
                        <p>
                            {{ $job->position }}
                        </p>
                    </div>
                    @endif

                    @if ($job->company_name != null)
                    <div class="j-info">
                        <h4>{{ __('Company Name') }}</h4>
                        <p>
                            {{ $job->company_name }}
                        </p>
                    </div>
                    @endif

                    @if ($job->other_benefits != null)
                    <div class="j-info">
                        <h4>{{ __('Compensation & Other Benefits') }}</h4>
                        <p>
                            {!! $job->other_benefits !!}
                        </p>
                    </div>
                    @endif
                  
                    @if ($job->deadline != null)
                    <div class="j-info">
                        <h4>{{ __('Deadline') }}</h4>
                        <p>
                            {{ $job->deadline }}
                        </p>
                    </div>
                    @endif


                    <a href="#" class="main-btn" data-toggle="modal" data-target="#applyjob">{{ __('Apply For Job') }}</a>
                </div>
                
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

 <!-- Apply Job Modal -->
 <div class="modal fade" id="applyjob" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Apply for This Job') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('job.apply.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $job->id }}" name="job_id">
          <div class="modal-body">
            <div class="form-group">
              <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Your Name') }}">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}">
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="expected_salary" value="{{ old('expected_salary') }}" placeholder="{{ __('Your Expected Salary') }}">
              </div>

            <div class="form-group">
              <textarea name="message" class="form-control textarea"  placeholder="{{ __('Your Message') }}">{{ old('message') }}</textarea>
            </div>
            <div class="form-group">
              <label for="">Accept (PDF) File.</label>
              <input class="form-control" type="file" name="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="main-btn">{{ __('Apply Now') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Carer Area End -->

@endsection
