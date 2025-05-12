<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cooperative dashboard | Coffee MIS</title>
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
                <h2 class="app-logo text-black">Coffee Bridge MIS</h2>
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="{{ route('cooperative.dashboard') }}"><i class="fas fa-tachometer-alt"></i>Cooperative dashboard</a>
                </li>
                <li>
                    <a href="{{ route('farmers.index') }}"><i class="fas fa-users"></i> Farmers</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('farms.index') }}"><i class="fas fa-user-plus"></i> Farms</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('harvests.index') }}"><i class="fas fa-leaf"></i> Harvests</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('cooperatives.index') }}"><i class="fas fa-users-cog"></i> Cooperatives</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('transactions.index') }}"><i class="fas fa-exchange-alt"></i> Transactions</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('payments.index') }}"><i class="fas fa-credit-card"></i> Payments</a>
                </li>
                </li>
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
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span>{{ Auth::User()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="{{ route('cooperative.profile) }}" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="#" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt"></i> Logout
                                                </a>
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