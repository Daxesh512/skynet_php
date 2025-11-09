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
    
	<!--Main Breadcrumb Area End -->

      <!-- Forgot password Area Start -->
    <section class="auth section-gap">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
            <div class="sign-form">
                <div class="heading">
                <h4 class="title">
                    Password reset
                </h4>
                
                    @if(Session::has('mailsuccess'))
                        <p class="subtitletext-success">{{ Session::get('mailsuccess') }}</p>
                    @endif
                </div>
                <form class="" action="{{ route('user.forgot.submit') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address">
                        @if ($errors->has('email'))
                            <p class="text-danger"> {{ $errors->first('email') }} </p>
                        @endif
                    </div>

                    <button class="main-btn" type="submit">Reset Password</button>
                    <p class="reg-text text-center mb-0"> Back to  <a href="{{route('user.login')}}">Login</a></p>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Forgot password Area End -->


@endsection
