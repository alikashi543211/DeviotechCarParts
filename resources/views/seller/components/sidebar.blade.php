<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
                    <div class="brand-logo">
                        <img src="{{ asset(fixSetting()['dark_logo']) }}" alt="Car Parts" width="150">
                    </div>
                        
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@routeis('seller.dashboard') active @endrouteis nav-item">
                <a href="{{ route('seller.dashboard') }}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{siteSetting()['seller_sidebar_menu_1'] ?? ''}}</span>
                </a>
            </li>

            @if (auth()->user()->sellerProfile->subscription_type == 1 || auth()->user()->sellerProfile->subscription_type == 3)
            <li class="@routeis('seller.car.part.advertisement*') active @endrouteis nav-itemnav-item">
                <a href="{{route('seller.car.part.advertisement.list')}}" class="">
                    <i class="fa fa-car"></i><span class="menu-title" data-i18n="Car Parts">{{siteSetting()['seller_sidebar_menu_2'] ?? ''}}</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->sellerProfile->subscription_type == 2 || auth()->user()->sellerProfile->subscription_type == 3)
            <li class="@routeis('seller.scrap.yard.advertisement.list') active @endrouteis nav-itemnav-item">
                <a href="{{route('seller.scrap.yard.advertisement.list')}}" class="">
                    <i class="fa fa-bus" aria-hidden="true"></i><span class="menu-title" data-i18n="Scrap Yard">{{siteSetting()['seller_sidebar_menu_3'] ?? ''}}</span>
                </a>
            </li>
            @endif
            <li class="@routeis('seller.plan*') active @endrouteis nav-item">
                <a href="{{route('seller.plan.list')}}" class="">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i><span class="menu-title" data-i18n="Profile">{{siteSetting()['seller_sidebar_menu_4'] ?? ''}}</span>
                </a>
            </li>
            <li class="@routeis('seller.profile') active @endrouteis nav-item">
                <a href="{{route('seller.profile.index')}}" class="">
                    <i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">{{siteSetting()['seller_sidebar_menu_5'] ?? ''}}</span>
                </a>
            </li>
            <li class="@routeis('seller.review*') active @endrouteis nav-item">
                <a href="{{route('seller.review.list')}}" class="">
                    <i class="fa fa-eercast" aria-hidden="true"></i><span class="menu-title" data-i18n="Profile">{{siteSetting()['seller_sidebar_menu_6'] ?? ''}}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
