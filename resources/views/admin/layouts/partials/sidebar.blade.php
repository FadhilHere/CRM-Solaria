<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
                        data-feather="box"></i><span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Data Produk</a></li>
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
                        data-feather="calendar"></i><span>Reservasi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Data Reservasi</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="tag"></i><span>Promo</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Data Promo</a></li>
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
