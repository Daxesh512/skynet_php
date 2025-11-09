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
            <h2 class="title">{{ __('Edit Profile') }}</h2>
              <ul class="breadcrumb-nav">
                <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                <li class="active" aria-current="page">{{ __('Edit Profile') }}</li>
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
                        <h5 class="card-header">{{ __('Edit Profile') }}</h5>
                        <div class="card-body">
                          <form action="{{ route('user.updateprofile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group mb-4 text-center">
                                        <div class="upload-img d-inline">
                                          <div class="img">
                                              <img class="mb-3 show-img img-demo" src="
                                              @if(Auth::user()->image)
                                              {{ asset('assets/front/img/'.Auth::user()->image) }}
                                              @else
                                              {{ asset('assets/admin/img/img-demo.jpg') }}
                                              @endif"
                                               alt="">
                                          </div>
                                          <div class="file-upload-area">
                                            <div class="upload-file">
                                              <input type="file" name="image" class="upload image form-control up-img">
                                            </div>
                                            @if($errors->has('image'))
                                <p  class="m-1 text-danger">{{ $errors->first('image') }}</p>
                                @endif
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('First Name') }}</label>
                                  <input type="text" class="form-control"  name="name" value="{{ Auth::user()->name }}">
                                  @if($errors->has('name'))
                                <p  class="m-1 text-danger">{{ $errors->first('name') }}</p>
                                @endif
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('Email') }}</label>
                                  <input type="email" class="form-control"  name="email" 
                                    value="{{ Auth::user()->email }}">
                                    @if($errors->has('email'))
                                <p  class="m-1 text-danger">{{ $errors->first('email') }}</p>
                                @endif
                                </div>
                              </div>
        
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('Phone') }}</label>
                                  <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                  @if($errors->has('phone'))
                                <p  class="m-1 text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('Address') }}</label>
                                  <input type="text" class="form-control"  name="address" value="{{ Auth::user()->address }}">
                                  @if($errors->has('address'))
                                <p  class="m-1 text-danger">{{ $errors->first('address') }}</p>
                                @endif
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('Country') }}</label>
                                  <input type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
                                  @if($errors->has('country'))
                                <p  class="m-1 text-danger">{{ $errors->first('country') }}</p>
                                @endif
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">{{ __('State') }}</label>
                                  <input type="text" class="form-control"  name="state" value="{{ Auth::user()->state }}">
                                  @if($errors->has('state'))
                                <p  class="m-1 text-danger">{{ $errors->first('state') }}</p>
                                @endif
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">{{ __('Zip Code') }}</label>
                                  <input type="text" class="form-control"  name="zipcode"
                                    value="{{ Auth::user()->zipcode }}">
                                    @if($errors->has('zipcode'))
                                <p  class="m-1 text-danger">{{ $errors->first('zipcode') }}</p>
                                @endif
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
