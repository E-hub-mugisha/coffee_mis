<!-- HEADER MENU START -->
<header class="header">
    <div class="container-fluid">
        <nav class="navigation d-flex align-items-center justify-content-between py-16">
            <a href="{{ route('home')}}" class="d-flex align-items-center">
                <h4 class="logo-text">Coffee <span>Bridge MIS</span></h4>
            </a>
            <div class="menu-button-right">
                <div class="main-menu__nav">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('home')}}" class="active">Home</a>
                        </li>
                        <li><a href="{{ route('coffee-tips')}}">Coffee Tips</a></li>
                        <li><a href="{{ route('front.cooperatives') }}">cooperatives</a></li>
                        <li>
                            <a href="{{ route('coffee.products') }}">Coffee Products</a>
                        </li>
                        <li>
                            <a href="{{ route('contact')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-menu__right">
                <div class="search-heart-icon d-sm-flex d-none align-items-center gap-24">
                    <div class="d-flex align-items-center gap-24">

                        @if (auth()->check())
                        @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="cus-btn">
                            <span class="text">Admin Dashboard</span>
                        </a>
                        @elseif (Auth::user()->role === 'cooperative')
                        <a href="{{ route('cooperative.dashboard') }}" class="cus-btn">
                            <span class="text">Dashboard</span>
                        </a>
                        @elseif (Auth::user()->role === 'buyer')
                        <a href="{{ route('coffee.buyer.dashboard') }}" class="cus-btn">
                            <span class="text">Dashboard</span>
                        </a>
                        @endif
                        @else
                        <a href="{{ route('login') }}" class="cus-btn">
                            <span class="text">Log in / Sign up</span>
                        </a>
                        @endif

                    </div>
                </div>

                <a href="#" class="d-xl-none d-flex main-menu__toggler mobile-nav__toggler">
                    <img src="assets/media/icon/menu-2.png" alt="">
                </a>
            </div>
        </nav>
    </div>
</header>
<!-- HEADER MENU END -->