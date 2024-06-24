<!-- navbar -->
<div id="navbar" class="navbar navbar-expand-lg justify-content-center align-items-center">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('assetsLanding/img/Solaria.png') }}" alt="logo" style="height: 50px; width: 50px;">
            <!-- Menggunakan inline style -->
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="la la-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#menus">Menus</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>

        <ul class="button-navbar ml-auto">
            <li><a class="button login-button" href="{{ route('login') }}">Login</a></li>
            <!-- Login dengan warna ungu pekat -->
            <li><button class="button order-button">Register</button></li>
            <!-- Order Now dengan warna ungu muda -->
        </ul>
    </div>
</div>
<!-- end navbar -->
