<!--====== Header Start ======-->

<header class="header-area-2 d-none d-lg-block">
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper d-flex justify-content-between">
                <div class="header-top-left">
                    <span class="call"><i class="ion-android-call"></i> {{ siteSetting()['top_header_right_title'] ?? '' }}: <a href="#">{{ siteSetting()['top_header_right_contact_no'] ?? '' }}</a></span>
                </div>
                <div class="header-top-right d-flex">
                    <div class="header-social-menu">
                        <ul class="social">
                            <li><a href="{{ siteSetting()['twitter'] ?? '' }}"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="{{ siteSetting()['facebook'] ?? '' }}"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="{{ siteSetting()['instagram'] ?? '' }}"><i class="ion-social-instagram-outline"></i></a></li>
                            <li>
                                <div class="dropdown language_dropdown">
                                    <button class="btn btn-new-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ siteLanguage() }}
                                    </button>
                                    <div class="lang-list-menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach(languages() as $lang)
                                            <a class="dropdown-item text-sm" href="{{ route('set.language',$lang->short_code) }}">{{ $lang->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="header-menu-main-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-brand">
                        <a href="{{ route("home") }}">
                            <img class="custom-logo" src="{{ asset(fixSetting()['logo'] ?? '') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header-menu-inner d-flex align-items-center justify-content-between">
                        <nav class="site-navigation">
                            <ul class="main-menu">
                                <li>
                                    <a class="@routeis('home') active @endrouteis" href="{{ route('home') }}">{{ siteSetting()['menu_home'] ?? '' }} </a>
                                </li>
                                <li>
                                    <a class="@routeis('about') active @endrouteis" href="{{ route('about') }}">{{ siteSetting()['menu_about'] ?? '' }}</a>
                                </li>
                                <li>
                                    <a class="@routeis('blogs') active @endrouteis" href="{{ route('blogs') }}">{{ siteSetting()['menu_blog'] ?? '' }}</a>
                                </li>
                                <li>
                                    <a class="@routeis('faq') active @endrouteis" href="{{ route('faq') }}">{{ siteSetting()['menu_faqs'] ?? '' }}</a>
                                </li>
                                <li><a class="@routeis('contact') active @endrouteis" href="{{ route('contact') }}">{{ siteSetting()['menu_contact'] ?? '' }}</a></li>

                            </ul>
                        </nav>
                        <div class="header-social-compare-login d-flex align-items-center">
                            @auth
                            <div class="header-main-btn">
                                @if(auth()->user()->role == "seller")
                                    <a href="{{ route('seller.dashboard') }}" target="_blank" class="main-btn"><i class="ion-model-s"></i> {{ siteSetting()['menu_dashboard_button'] ?? '' }} </a>
                                @elseif(auth()->user()->role == "admin")
                                    <a href="{{ route('admin.dashboard') }}" target="_blank" class="main-btn"><i class="ion-model-s"></i> {{ siteSetting()['menu_dashboard_button'] ?? '' }}  </a>
                                @elseif(auth()->user()->role == "user")
                                    <a href="javascript:void(0);" class="main-btn logout-button"> <i class="ion-ios-contact-outline"></i>Logout</a>
                                    <a href="{{ route('user.dashboard') }}" class="main-btn"><i class="ion-model-s"></i> {{ siteSetting()['menu_dashboard_button'] ?? '' }}  </a>
                                    <form method="POST" class="form-logout" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                @endif
                            </div>
                            @else
                            <div class="header-compare-login">
                                <ul class="compare-login">
                                    <li><a href="{{ route('login') }}"><i class="ion-ios-contact-outline"></i></a></li>
                                </ul>
                            </div>

                            <div class="header-main-btn">
                                <a href="{{ route('seller.register') }}" target="_blank" class="main-btn"><i class="ion-model-s"></i> {{ siteSetting()['menu_become_seller_button'] ?? '' }} </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--====== Header Ends ======-->

<!--====== Header Mobile menu Start ======-->

<div class="header-mobile-menu d-lg-none">
    <div class="container">
        <div class="header-mobile-wrapper d-flex justify-content-between align-items-center">
            <div class="header-mobile-logo">
                <a href="{{ route("home") }}">
                    <img class="custom-logo" src="{{ asset(fixSetting()['dark_logo'] ?? '') }}" alt="">
                </a>
            </div>
            <div class="header-mobile-meta">
                <ul class="meta d-flex">
                    <li><a class="toggle-bar navbar-mobile-open" href="javascript:;"><i class="ion-navicon"></i></a></li>
                    <li><a href="{{ route('login') }}"><i class="ion-ios-contact-outline"></i></a></li>
                    <li>
                        <div class="dropdown language_dropdown_mobile">
                            <button class="btn btn-new-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ siteLanguage() }}
                            </button>
                            <div class="lang-list-menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(languages() as $lang)
                                    <a class="dropdown-item text-sm" href="{{ route('set.language',$lang->short_code) }}">{{ $lang->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mobile-navigation">
        <a href="javascript:;" class="close-navbar-mobile"><i class="fal fa-times"></i></a>
        <nav class="site-navigation">
            <ul class="main-menu">
                <li>
                    <a class="@routeis('home') active @endrouteis" href="{{ route('home') }}">{{ siteSetting()['menu_home'] ?? '' }} </a>
                </li>
                <li>
                    <a class="@routeis('about') active @endrouteis" href="{{ route('about') }}">{{ siteSetting()['menu_about'] ?? '' }}</a>
                </li>
                <li>
                    <a class="@routeis('blogs') active @endrouteis" href="{{ route('blogs') }}">{{ siteSetting()['menu_blog'] ?? '' }}</a>
                </li>
                <li>
                    <a class="@routeis('faq') active @endrouteis" href="{{ route('faq') }}">{{ siteSetting()['menu_faqs'] ?? '' }}</a>
                </li>
                <li><a class="@routeis('contact') active @endrouteis" href="{{ route('contact') }}">{{ siteSetting()['menu_contact'] ?? '' }}</a></li>
                
            </ul>
        </nav>

        <div class="copyright">
            <p>{{ siteSetting()['home_footer_follow_us_text'] ?? '' }}</p>
        </div>
    </div>

</div>

<!--====== Header Mobile menu Ends ======-->
