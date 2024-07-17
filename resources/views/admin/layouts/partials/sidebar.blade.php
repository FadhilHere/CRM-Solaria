<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img alt="image" src="{{ asset('assetsLanding/img/Solaria.png') }}" class="header-logo" />
                <span class="logo-name">Solaria</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Master</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="users"></i><span>Pelanggan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('users.index') }}">Data Pelanggan</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-cart"></i><span>Pesanan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('orders.index') }}">Data Pesanan</a></li>
                    <li><a class="nav-link" href="{{ route('order-details.index') }}">Data Detail Pesanan</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="tag"></i><span>Promo</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('promos.index') }}">Data Promo</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="book-open"></i><span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('menus.index') }}">Data Menu</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="message-square"></i><span>Kritik & Saran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('contacts.index') }}">Data Kritik & Saran</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
