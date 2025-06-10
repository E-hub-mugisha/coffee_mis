<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Coffee MIS</title>
    <link href="{{ asset('assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h2 class="app-logo text-black">Coffee MIS</h2>
            </div>
            <ul class="list-unstyled components text-secondary">

                @if(Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.farmers.index') }}"><i class="fas fa-users"></i> Farmers</a>
                </li>
                <li>
                    <a href="{{ route('admin.farms.index') }}"><i class="fas fa-user-plus"></i> Farms</a>
                </li>
                <li>
                    <a href="{{ route('admin.harvests.index') }}"><i class="fas fa-leaf"></i> Harvests</a>
                </li>
                <li>
                    <a href="{{ route('admin.cooperatives.index') }}"><i class="fas fa-users-cog"></i> Cooperatives</a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}"><i class="fas fa-coffee"></i> Coffee Orders</a>
                </li>
                <li>
                    <a href="{{ route('admin.transactions.index') }}"><i class="fas fa-exchange-alt"></i> Transactions</a>
                </li>
                <li>
                    <a href="{{ route('admin.payments.index') }}"><i class="fas fa-credit-card"></i> Payments</a>
                </li>
                @endif

                @if(Auth::user()->role === 'admin')
                <li><a href="#"><i class="fas fa-user-friends"></i> Users</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                @endif

                @if(Auth::user()->role === 'cooperative')
                <li>
                    <a href="{{ route('cooperative.dashboard') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('cooperative.profile') }}"><i class="fas fa-id-card"></i> Coop Profile</a>
                </li>
                <li>
                    <a href="{{ route('cooperative.members.index') }}"><i class="fas fa-users"></i>Coop Members</a>
                </li>
                <li>
                    <a href="{{ route('farmers.index') }}"><i class="fas fa-user-plus"></i>Farmers</a>
                <li>
                    <a href="{{ route('farms.index') }}"><i class="fas fa-tree"></i>Farms</a>
                </li>
                <li>
                    <a href="{{ route('harvests.index') }}"><i class="fas fa-leaf"></i>Harvests</a>
                </li>
                <li>
                    <a href="{{ route('coffee-products.index') }}"><i class="fas fa-coffee"></i>Coffee Products</a>
                </li>
                <li>
                    <a href="{{ route('coop.coffee-tips') }}"><i class="fas fa-coffee"></i>Coffee Tips</a>
                </li>
                <li>
                    <a href="{{ route('cooperatives.coffee.orders') }}"><i class="fas fa-shopping-cart"></i>Coffee Orders</a>
                <li>
                    <a href="{{ route('cooperatives.coffee.feedback') }}"><i class="fas fa-money-check-alt"></i> Feedback</a>
                </li>
                @endif
            </ul>

        </nav>

        <!-- Main Content -->
        <div id="body" class="active">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        {{-- Quick Links Dropdown --}}
                        @if(Auth::user()->role === 'admin')
                        @endif

                        {{-- User Profile Dropdown --}}
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span>{{ Auth::user()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item" style="border: none; background: none; padding: 0; color: inherit; width: 100%; text-align: left;">
                                                    <i class="fas fa-sign-out-alt"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>

            <!-- Content Area -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="footer bg-white mt-3 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">&copy; {{ date('Y') }} Coffee MIS System. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <ul class="footer-links list-inline">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                        <li class="list-inline-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>