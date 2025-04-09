<!-- HEADER MENU START -->
<header class="header">
    <div class="container-fluid">
        <nav class="navigation d-flex align-items-center justify-content-between py-16">
            <a href="{{ route('home')}}" class="d-flex align-items-center">
                <img src="{{ asset('front-pages/assets/media/logo.png') }}" alt="/logo" class="header-logo">
            </a>
            <div class="menu-button-right">
                <div class="main-menu__nav">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('home')}}" class="active">Home</a>
                        </li>
                        <li><a href="menu.html">Menu</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0); ">Pages
                            </a>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="blogs.html">Blog</a></li>
                                <li><a href="blog-with-sidebar.html">Blog with sidebar</a></li>
                                <li><a href="blog-detail.html">Blog Detail</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('coffee.products') }}">Coffee Products</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-menu__right">
                <div class="search-heart-icon d-sm-flex d-none align-items-center gap-24">
                    <div class="d-flex align-items-center gap-24">
                        <a href="checkout.html" class="header-search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M7.73254 15.5158H7.73364L7.73638 15.5156H20.4844C20.7982 15.5156 21.0741 15.3074 21.1604 15.0057L23.9729 5.16192C24.0335 4.9497 23.991 4.72156 23.8583 4.54541C23.7253 4.36926 23.5175 4.26562 23.2969 4.26562H6.11096L5.60833 2.00372C5.53674 1.68201 5.25146 1.45312 4.92187 1.45312H0.703125C0.314758 1.45312 0 1.76788 0 2.15625C0 2.54462 0.314758 2.85937 0.703125 2.85937H4.35791C4.4469 3.26019 6.76318 13.6836 6.89648 14.2833C6.14923 14.6081 5.625 15.3532 5.625 16.2187C5.625 17.3818 6.57129 18.3281 7.73437 18.3281H20.4844C20.8727 18.3281 21.1875 18.0134 21.1875 17.625C21.1875 17.2366 20.8727 16.9219 20.4844 16.9219H7.73437C7.34674 16.9219 7.03125 16.6064 7.03125 16.2187C7.03125 15.8317 7.34564 15.5167 7.73254 15.5158ZM22.3647 5.67187L19.9539 14.1094H8.29834L6.42334 5.67187H22.3647Z"
                                    fill="#371406" />
                                <path
                                    d="M7.03125 20.4375C7.03125 21.6006 7.97753 22.5469 9.14062 22.5469C10.3037 22.5469 11.25 21.6006 11.25 20.4375C11.25 19.2744 10.3037 18.3281 9.14062 18.3281C7.97753 18.3281 7.03125 19.2744 7.03125 20.4375ZM9.14062 19.7344C9.52825 19.7344 9.84374 20.0499 9.84374 20.4375C9.84374 20.8251 9.52825 21.1406 9.14062 21.1406C8.75299 21.1406 8.4375 20.8251 8.4375 20.4375C8.4375 20.0499 8.75299 19.7344 9.14062 19.7344Z"
                                    fill="#371406" />
                                <path
                                    d="M16.9687 20.4375C16.9687 21.6006 17.915 22.5469 19.0781 22.5469C20.2412 22.5469 21.1875 21.6006 21.1875 20.4375C21.1875 19.2744 20.2412 18.3281 19.0781 18.3281C17.915 18.3281 16.9687 19.2744 16.9687 20.4375ZM19.0781 19.7344C19.4657 19.7344 19.7812 20.0499 19.7812 20.4375C19.7812 20.8251 19.4657 21.1406 19.0781 21.1406C18.6905 21.1406 18.375 20.8251 18.375 20.4375C18.375 20.0499 18.6905 19.7344 19.0781 19.7344Z"
                                    fill="#371406" />
                            </svg>
                        </a>
                        <a href="javascript:;" class="main-menu__search search-toggler d-lg-block d-none icon">
                            <div class="header-search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_43515_29)">
                                        <path
                                            d="M9.74062 0C15.1116 0 19.4812 4.36964 19.4812 9.74063C19.4812 12.1734 18.5847 14.4008 17.1047 16.1097L23.7941 22.7997C24.0687 23.0743 24.0686 23.5195 23.794 23.7941C23.5194 24.0687 23.0743 24.0686 22.7997 23.7941L16.1104 17.1041C14.4014 18.5845 12.1738 19.4813 9.74062 19.4813C4.36964 19.4813 0 15.1116 0 9.74063C0 4.36964 4.36964 0 9.74062 0ZM9.74062 18.075C14.3362 18.075 18.075 14.3362 18.075 9.74063C18.075 5.14505 14.3362 1.40625 9.74062 1.40625C5.14505 1.40625 1.40625 5.14505 1.40625 9.74063C1.40625 14.3362 5.14505 18.075 9.74062 18.075Z"
                                            fill="#371406" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_43515_29">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </a>
                        @if (auth()->check())
                        @if(Auth::user()->role === 'admin')
                        <!-- Display Admin Dashboard link if user is Admin -->
                        <a href="{{ route('admin.dashboard') }}" class="cus-btn">
                            <span class="text">Admin Dashboard</span>
                        </a>
                        @elseif(Auth::user()->role === 'cooperative')
                        <!-- Display User Dashboard link if user is a regular user -->
                        <a href="{{ route('cooperative.dashboard') }}" class="cus-btn">
                            <span class="text">Dashboard</span>
                        </a>
                        @endif
                        @else
                        <!-- Display Login/Sign up button if the user is not authenticated -->
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