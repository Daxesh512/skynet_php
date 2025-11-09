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
                        <h2 class="title">{{ __('Register') }}</h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                            <li class="active" aria-current="page">{{ __('Register') }}</li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
	<!--Main Breadcrumb Area End -->

        <!-- Register Area Start -->
        <section class="auth section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="sign-form">
                            <div class="heading">
                                <h4 class="title">
                                       {{ __('Register') }}
                                </h4>
                                <p class="subtitle">
                                    {{ __('Register your account to continue.') }}
                                </p>
                            </div>
                            <form class="" action="{{ route('user.register.submit') }}" method="POST">
                                @csrf

                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ old('name') }}" name="name" placeholder="{{ __('Enter Full Name') }}">
                                    @if($errors->has('name'))
                                    <p  class="m-1 text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>


                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ old('username') }}" name="username" placeholder="{{ __('Enter Username') }}">
                                    @if($errors->has('username'))
                                    <p  class="m-1 text-danger">{{ $errors->first('username') }}</p>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter Email') }}">
                                    @if($errors->has('email'))
                                    <p  class="m-1 text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <input class="form-control" type="password" name="password" placeholder="{{ __('Enter Password') }}">
                                    @if($errors->has('password'))
                                    <p  class="m-1 text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                                </div>

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
                                
                                <button class="main-btn" type="submit">{{ __('Create Account') }}</button>
                                <p class="reg-text text-center mb-0">{{ __('Already have an acocunt?') }} <a href="{{ route('user.login') }}">{{ __('Login') }}</a></p>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Register Area End -->

@endsection
