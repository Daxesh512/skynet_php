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
                        <h2 class="title">{{ __('Login') }}</h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                            <li class="active" aria-current="page">{{ __('Login') }}</li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
	<!--Main Breadcrumb Area End -->


  <!-- User Dashboard Area Start -->
  <section class="user-dashboard-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
         @include('user.inc.menu')
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h5 class="card-header">{{ __('Change Password') }}</h5>
                <div class="card-body">
                  <form action="{{ route('user.reset.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="cpass">{{ __('Current Password') }}</label>
                          <input type="text" class="form-control" id="cpass" placeholder="{{ __('Current Password') }}" name="current_password"
                            value="">
                            @if ($errors->has('current_password'))
                                <p class="text-danger"> {{ $errors->first('current_password') }} </p>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="npass">{{ __('New Password') }}</label>
                          <input type="text" class="form-control" id="npass" placeholder="{{ __('New Password') }}" name="new_password"
                            value="">
                            @if ($errors->has('new_password'))
                                <p class="text-danger"> {{ $errors->first('new_password') }} </p>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="confirm_password">{{ __('Confirm Password') }}</label>
                          <input type="text" class="form-control" id="confirm_password" placeholder="{{ __('Confirm Password') }}" name="confirm_password"
                            value="">
                            @if ($errors->has('confirm_password'))
                                <p class="text-danger"> {{ $errors->first('confirm_password') }} </p>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <button type="submit" class="mybtn1 border-0">{{ __('Submit') }}<i class="far fa-paper-plane"></i></button>
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
  <!-- User Dashboard Area End -->

@endsection
