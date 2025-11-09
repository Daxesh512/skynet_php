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

        <!-- Login Area Start -->
        <section class="auth section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="sign-form">
                            <div class="heading">
                                <h4 class="title">
                                    {{ __('Login') }}
                                </h4>
                                <p class="subtitle">
                                    {{ __('Login to your account to continue.') }}
                                </p>
                            </div>
                                @if(Session::has('error'))
                                <p class="mb-3 text-danger">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                <p  class="mb-3 text-success">{{ Session::get('success') }}</p>
                                @endif
                            <form class="" action="{{ route('user.login.submit') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input class="" type="email" value="{{ old('email') }}" name="email" placeholder="{{ __('Enter Email') }}">
                                    @if($errors->has('email'))
                                    <p  class="m-1 text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            
                                <div class="input-group">
                                    <input class="" type="password" name="password" placeholder="{{ __('Enter Password') }}">
                                    @if($errors->has('password'))
                                    <p  class="m-1 text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <span class="fp"><a href="{{ route('user.forgot') }}">{{ __('Forgot Password ?') }}</a></span>

                                @if ($visibility->is_recaptcha == 1)
                                    <div class="d-block my-4">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                        @php
                                            $errmsg = $errors->first('g-recaptcha-response');
                                        @endphp
                                        <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                                        @endif
                                    </div>
                                @endif
                                
                                <button class="main-btn" type="submit">{{ __('Login Now') }}</button>

                                <p class="reg-text text-center mb-0">{{ __("Don't have an account?") }} <a href="{{ route('user.register') }}">{{ __('Register Now') }}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Area End -->

@endsection
