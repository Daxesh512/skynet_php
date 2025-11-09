<div class="col-sm-auto col-12">
    <div class="top-left-content">
        <div class="language-change">
            <p class="name
            @if(request()->path() == '/')
                @if($commonsetting->theme_version == 'theme1')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @elseif($commonsetting->theme_version == 'theme3')
                    text-white
                @elseif($commonsetting->theme_version == 'theme4')
                    text-white 
                @elseif($commonsetting->theme_version == 'theme5')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @elseif($commonsetting->theme_version == 'theme6')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @endif
            @else 
                text-white
            @endif
            "><i class="fas fa-globe-americas"></i>{{ $currentLang->name }}</p>
            <div class="language-menu">
                @foreach ($langs as $lang)
                <a href="{{ route('changeLanguage', $lang->code) }}" class="{{ $lang->code == $currentLang->code ? 'active' : '' }}">{{ $lang->name }}</a>
                @endforeach
            </div>
        </div>

        @if( $visibility->is_shop == 1)
        <div class="language-change curr-change">
            <p class="name
            @if(request()->path() == '/')
                @if($commonsetting->theme_version == 'theme1')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @elseif($commonsetting->theme_version == 'theme3')
                    text-white
                @elseif($commonsetting->theme_version == 'theme4')
                    text-white 
                @elseif($commonsetting->theme_version == 'theme5')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @elseif($commonsetting->theme_version == 'theme6')
                    @if($commonsetting->is_video_hero == '1')
                        text-white
                    @endif
                @endif
            @else 
                text-white
            @endif
            ">{{ $currentCurrency->sign }} {{ $currentCurrency->name }}</p>
            <div class="language-menu">
                @foreach ($currencies as $currency)
                <a href="{{ route('changeCurrency', $currency->id) }}" class="{{ $currency->id == $currentCurrency->code ? 'active' : '' }}">{{ $currency->name }}</a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<div class="col-sm-auto col-12">
    <div class="top-right-wrapper">
        <div class="social-icon text-center">
            <ul>
                @foreach ($socials as $item)
                <li><a href="{{ $item->url }}"><i class="{{ $item->icon }}"></i></a></li>
                @endforeach
                
            </ul>
        </div>
        @if( $visibility->is_user_system == 1)
            @if(auth()->check())
            <div class="language-change">
                <a href="{{ route('user.login') }}" class="name login-btn
                @if(request()->path() == '/')
                    @if($commonsetting->theme_version == 'theme1')
                        @if($commonsetting->is_video_hero == '1')
                            text-white
                        @endif
                    @elseif($commonsetting->theme_version == 'theme3')
                        text-white
                    @elseif($commonsetting->theme_version == 'theme4')
                        text-white 
                    @elseif($commonsetting->theme_version == 'theme5')
                        @if($commonsetting->is_video_hero == '1')
                            text-white
                        @endif
                    @elseif($commonsetting->theme_version == 'theme6')
                        @if($commonsetting->is_video_hero == '1')
                            text-white
                        @endif
                    @endif
                @else 
                    text-white
                @endif
                ">
                    <i class="far fa-user l-icon"></i>{{ __("User") }}<i class="fas fa-chevron-down r-icon"></i>
                </a>
                <div class="language-menu">
                    <a href="{{ route('user.dashboard') }}" class="">{{ __("User Dashboard") }}</a>
                    <a href="{{ route('user.editprofile') }}" class="">{{ __("Edit Profile") }}</a>
                    <a href="{{ route('user.logout') }}" class="">{{ __("Logout") }}</a>
                </div>
            </div>
            @else
            <div class="language-change">
                <a href="{{ route('user.login') }}" class="name login-btn
                @if(request()->path() == '/')
                    @if($commonsetting->theme_version == 'theme1')
                        @if($commonsetting->is_video_hero == '1')
                            text-white
                        @endif
                        @elseif($commonsetting->theme_version == 'theme3')
                            text-white
                        @elseif($commonsetting->theme_version == 'theme4')
                            text-white 
                        @elseif($commonsetting->theme_version == 'theme5')
                            @if($commonsetting->is_video_hero == '1')
                                text-white
                            @endif
                        @elseif($commonsetting->theme_version == 'theme6')
                            @if($commonsetting->is_video_hero == '1')
                                text-white
                            @endif
                        @endif
                        @else 
                            text-white
                    @endif
                    ">
                    <i class="far fa-sign-in"></i>{{ __('Login') }}
                </a>
                @endif
            </div>
        @endif
    </div>
</div>