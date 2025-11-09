@extends('front.layout')

@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")
@section('content')

	<!--Main Breadcrumb Area Start -->
  <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-title-item text-center">
            <h2 class="title">{{ __('Change Password') }}</h2>
              <ul class="breadcrumb-nav">
                <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                <li class="active" aria-current="page">{{ __('Change Password') }}</li>
              </ul>
          </div> <!-- page title -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </div> 
  
	<!--Main Breadcrumb Area End -->

    <!-- User Dashboard Start -->
	<section class="user-dashboard-area section-gap">
		<div class="container">
		  <div class="row">
			<div class="col-lg-3">
				@includeif('user.dashboard-sidenav')
			</div>
			<div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <h5 class="card-header">{{ __('Change Password') }}</h5>
                        <div class="card-body">
                          <form action="{{ route('user.update_password', Auth::user()->id) }}" method="POST" >
                            @csrf
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">{{ __('Old Password') }}</label>
                                  <input type="text" class="form-control"  name="old_password" value="">
                                  @if($errors->has('old_password'))
                                  <p  class="m-1 text-danger">{{ $errors->first('old_password') }}</p>
                                  @endif
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">{{ __('New Password') }}</label>
                                  <input type="text" class="form-control"  name="password" value="">
                                  @if($errors->has('password'))
                                  <p  class="m-1 text-danger">{{ $errors->first('password') }}</p>
                                  @endif
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">{{ __('Confirm Password') }}</label>
                                  <input type="text" class="form-control"  name="password_confirmation" value="">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <button type="submit" class="main-btn">{{ __('Submit') }} <i class="far fa-paper-plane"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
			</div>
		  </div>
		</div>
	
	  </section>
    <!-- User Dashboard End -->

@endsection
