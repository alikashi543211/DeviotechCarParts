<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ucfirst(auth()->user()->name)}}</span>
                                <span class="user-status text-success">{{ siteSetting()['online_title'] ?? '' }}</span>
                            </div>
                            <span><img class="round" src="@if(isset(auth()->user()->sellerProfile->picture)) {{asset(auth()->user()->sellerProfile->picture)}} @else {{asset('default.png')}} @endif" class="rounded-circle" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('seller.profile.index')}}"><i class="feather icon-user"></i> {{siteSetting()['seller_sidebar_menu_5'] ?? ''}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;" onclick="document.getElementById('logout-form').submit()"><i class="feather icon-power"></i> Logout</a>
                            <form class="d-none" id="logout-form" method="post" action="{{ route('logout') }}">@csrf</form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
