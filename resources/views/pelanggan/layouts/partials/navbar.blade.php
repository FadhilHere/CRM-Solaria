<head>
    <style>
        .badge-platinum {
            background-color: #e5e4e2;
            color: black;
        }

        .badge-gold {
            background-color: gold;
            color: black;
        }

        .badge-silver {
            background-color: silver;
            color: black;
        }

        .badge-bronze {
            background-color: orange;
            color: white;
        }
    </style>

</head>


<!-- navbar -->
<div id="navbar" class="navbar navbar-expand-lg justify-content-center align-items-center">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('assetsLanding/img/Solaria.png') }}" alt="logo" style="height: 50px; width: 50px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="la la-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav">
                @if (Request::route()->getName() == 'pelanggan.landing')
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#menus">Menus</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.landing') }}">Home</a></li>
                @endif
            </ul>
        </div>

        <ul class="button-navbar ml-auto">
            @guest
                <li><a class="button login-button" href="{{ route('login') }}">Login</a></li>
                <li><a class="button order-button" href="{{ route('register') }}">Register</a></li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.view') }}">
                        <i class="la la-shopping-cart"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @php
                            $loyaltyLevel = strtolower(Auth::user()->loyalty_level);
                        @endphp
                        <span class="badge badge-{{ $loyaltyLevel }} mr-2">
                            {{ Auth::user()->loyalty_level }}
                        </span>
                        <i class="la la-user"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</div>
<!-- end navbar -->
