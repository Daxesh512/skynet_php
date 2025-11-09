<header class="header-two header-three header-full-width sticky-header">
    <div class="header-topbar">
        <div class="container-fluid container-1470">
            <div class="row align-items-center justify-content-between">
                @include('front.partials.menu.topContent')
            </div>
        </div>
    </div>
    <div class="header-navigation">
        <div class="container-fluid mainmenu-wrapper container-1470 d-flex align-items-center justify-content-between">
            <div class="header-left">
                <div class="site-logo">
                    <a href="{{ route('front.index') }}"><img src="{{ asset('assets/front/img/'.$setting->header_logo ) }}" alt="Omnivus"></a>
                </div>
            </div>
            <div class="header-right d-flex align-items-center justify-content-end">
                @include('front.partials.menu.nav-item')
            </div>
        </div>
    </div>
</header>