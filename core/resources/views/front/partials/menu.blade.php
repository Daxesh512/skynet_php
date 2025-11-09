
@if(request()->path() == '/')
        @if($commonsetting->theme_version == 'theme1')
            @if($commonsetting->is_video_hero == '1')
                @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu1')
            @endif

        @elseif($commonsetting->theme_version == 'theme2')
            @if($commonsetting->is_video_hero == '1')
                @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu3')
            @endif
            
        @elseif($commonsetting->theme_version == 'theme3')
            @include('front.partials.menu.menu2')

            
        @elseif($commonsetting->theme_version == 'theme4')
            @include('front.partials.menu.menu2')
       
        @elseif($commonsetting->theme_version == 'theme5')
            @if($commonsetting->is_video_hero == '1')
            @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu1')
            @endif

        @elseif($commonsetting->theme_version == 'theme6')
            @if($commonsetting->is_video_hero == '1')
            @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu1')
            @endif
        @elseif($commonsetting->theme_version == 'theme7')
            @if($commonsetting->is_video_hero == '1')
                @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu1')
            @endif
        @elseif($commonsetting->theme_version == 'theme8')
            @if($commonsetting->is_video_hero == '1')
                @include('front.partials.menu.menu2')
            @else 
                @include('front.partials.menu.menu1')
            @endif
        @elseif($commonsetting->theme_version == 'theme9')
            @include('front.partials.menu.menu1')
        @endif
    @else
    @include('front.partials.menu.menu2')
@endif

    