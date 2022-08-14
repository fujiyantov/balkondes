<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading">REPORT</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            {{-- <a class="nav-link" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a> --}}
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link" {{ request()->is('admin/transactions') ? 'active' : '' }}
                href="{{ route('transactions.index') }}">
                <div class="nav-link-icon"><i data-feather="shopping-cart"></i></div>
                Transaction
                @php
                    $notif  = notifCount()
                @endphp

                <span class="badge bg-warning text-dark ms-auto">{{ $notif }} @if($notif > 0) New! @endif</span>
            </a>

            @if (Auth::User()->roles->first()->id == 1 ||
                Auth::User()->roles->first()->id == 2 ||
                Auth::User()->roles->first()->id == 3)
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Menu</div>

                <!-- Sidenav Link (Dashboard)-->
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin-dashboard') }}">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Dashboard
                </a>


                <a class="nav-link {{ request()->is('admin/village*') ? 'active' : '' }}"
                    href="{{ route('villages.index') }}">
                    <div class="nav-link-icon"><i data-feather="folder"></i></div>
                    Villages
                </a>

                <a class="nav-link {{ request()->is('admin/culture-histories*') ? 'active' : '' }}"
                    href="{{ route('culture-histories.index') }}">
                    <div class="nav-link-icon"><i data-feather="clock"></i></div>
                    Culture History
                </a>

                @if (Auth::User()->roles->first()->id != 3)
                    <a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        <div class="nav-link-icon"><i data-feather="shopping-bag"></i></div>
                        Products
                    </a>
                    <a class="nav-link {{ request()->is('admin/trips*') ? 'active' : '' }}"
                        href="{{ route('trips.index') }}">
                        <div class="nav-link-icon"><i data-feather="navigation"></i></div>
                        Travel
                    </a>
                @endif
            @endif

            @if (Auth::User()->roles->first()->id == 1)
                <div class="sidenav-menu-heading">MANAGEMENT</div>
                <a class="nav-link {{ request()->is('admin/product-categories*') ? 'active' : '' }}"
                    href="{{ route('product-categories.index') }}">
                    <div class="nav-link-icon"><i data-feather="folder"></i></div>
                    Product Category
                </a>
                <a class="nav-link {{ request()->is('admin/travel-categories*') ? 'active' : '' }}"
                    href="{{ route('travel-categories.index') }}">
                    <div class="nav-link-icon"><i data-feather="folder"></i></div>
                    Travel Category
                </a>
                <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Data User
                </a>
                <a class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}"
                    href="{{ route('setting.index') }}">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Account
                </a>
                <a class="nav-link" target="_blank" href="/admin/management">
                    <div class="nav-link-icon"><i data-feather="sliders"></i></div>
                    Settings
                </a>
                <a class="nav-link {{ request()->is('admin/cores*') ? 'active' : '' }}"
                    href="{{ route('cores.index') }}">
                    <div class="nav-link-icon"><i data-feather="settings"></i></div>
                    Core
                </a>
            @endif
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
        </div>
    </div>
</nav>
