<footer class="footer-area footer-area-two" style="background-image: url({{ asset('assets/front/img/'.$setting->footer_bg_image ) }});">
    <div class="footer-overlay">
        <div class="container position-relative">
            <div class="row footer-widgets">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item-1 mt-30">
                        <img src="{{ asset('assets/front/img/'.$setting->footer_logo ) }}" alt="">
                        <p>{{ $setting->footer_text }}</p>
                    </div> <!-- widget item 1 -->
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="widget-item-2  mt-30">
                        <h4 class="title">{{ __('Contact Us') }}</h4>
                        <ul>
                            <li><i class="far fa-clock"></i> {{ $setting->opening_hours }}</li>
                            <li>
                                @php
                                    $fnumber = explode( ',', $commonsetting->number );
                                    for ($i=0; $i < count($fnumber); $i++) { 
                                        echo '<a class="d-block" href="tel:'.$fnumber[$i].'"><i class="fas fa-headset"></i> '.$fnumber[$i].'</a>';
                                    }
                                @endphp
                            </li>
                            <li>
                                @php
                                $femail = explode( ',', $commonsetting->email );
                                for ($i=0; $i < count($femail); $i++) { 
                                    echo '<a class="d-block" href="mailto:'.$femail[$i].'"><i class="far fa-envelope"></i> '.$femail[$i].'</a>';
                                }
                            @endphp
                            </li> 
                        </ul>
                    </div> <!-- widget item 3 -->
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widget-item-2 mt-30">
                        <h4 class="title">{{ __('Links') }}</h4>
                        <div class="footer-list">
                            <ul>
                                @foreach ($flinks as $item)
                                <li><a href="{{ $item->url }}"><i class="fal fa-angle-right"></i>{{ $item->name }}</a></li> 
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- widget item 2 -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item-3 mt-30">
                        <h4 class="title">{{ __('Newletter') }}</h4>
                        <div class="features-sub">
                            <p>{{ __('Many aspects of computing and technology and the term is more recognizable than before.') }}</p>
                            <form action="{{ route('front.newsletter') }}" method="POST">
                                @csrf
                                <div class="input-box">
                                    <input type="email" name="email" placeholder="{{ __('Enter your email....') }}">
                                    @if ($errors->has('email'))
                                    <p class="text-danger"> {{ $errors->first('email') }} </p>
                                    @endif
                                    <button type="submit" class="main-btn">{{ __('Subscribe Now') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright">
                     <div class="py-3">
                        {!! $setting->copyright_text !!}
                     </div>
                    </div> <!-- footer copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
</footer>
