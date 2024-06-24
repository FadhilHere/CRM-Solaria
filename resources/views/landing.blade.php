<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assetsLanding/img/favicon.png') }}">
    <title>Shara</title>
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/style.css') }}">
    <style>
        .img-large {
            width: 700px;
            height: 700px;
        }
    </style>
</head>

<body>
    <!-- loader -->
    <div class="loader">
        <div class="loading">
            <div class="spinner-border aloader" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- navbar -->
    <div id="navbar" class="navbar navbar-expand-lg justify-content-center align-items-center">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assetsLanding/img/Solaria.png') }}" alt="logo"
                    style="height: 50px; width: 50px;"> <!-- Menggunakan inline style -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                <li><button class="button order-button">Order</button></li>
                <!-- Order Now dengan warna ungu muda -->
            </ul>
        </div>
    </div>
    <!-- end navbar -->

    <!-- intro -->
    <div id="home" class="intro">
        <div class="container">
            <div class="content">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12 col-lg-7">
                        <div class="content-text">
                            <h1>Selamat Datang di Solaria - Pintu Kelezatan Kuliner Anda</h1>
                            <p>Di Solaria, kami berkomitmen menyajikan makanan lezat dengan bahan berkualitas tinggi
                                dalam suasana yang hangat dan menyenangkan. Nikmati berbagai pilihan menu dari hidangan
                                klasik hingga inovasi baru yang siap memanjakan lidah Anda. Solaria, tempat makan ideal
                                untuk setiap kesempatan.</p>


                            <ul>
                                <li><a href=""><i class="la la-facebook"></i></a></li>
                                <li><a href=""><i class="la la-twitter"></i></a></li>
                                <li><a href=""><i class="la la-instagram"></i></a></li>
                                <li><a href=""><i class="la la-youtube"></i></a></li>
                                <li><a href=""><i class="la la-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="content-image">
                            <img src="{{ asset('assetsLanding/img/miayamkatsu.png') }}" alt="intro image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end intro -->

    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <img src="{{ asset('assetsLanding/img/about.png') }}" alt="about image">
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="content">
                        <div class="the-title"><span></span>ABOUT US</div>
                        <h2>We Were Founded In The 90's <br> Innovate For The Better</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ex quod perspiciatis
                            accusamus maxime iis ex quod perspiciatis accusamus maxime ommodi omnis blanditiis ex quod
                            perspiciatis accusamus maxime ommodi.</p>
                        <div class="row">
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-wifi"></i>
                                </div>
                                <div class="text">
                                    <h5>Free Wifi</h5>
                                    <span>Features</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-dollar"></i>
                                </div>
                                <div class="text">
                                    <h5>Friendly Price</h5>
                                    <span>Price</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-recycle"></i>
                                </div>
                                <div the="text">
                                    <h5>Clean & Cool</h5>
                                    <span>Place</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <!-- open-hours -->
    <div class="open-hours">
        <div class="container">
            <div class="content">
                <h2>Open Hours</h2>
                <div class="row">
                    <div class="col-md">
                        <ul>
                            <li>Monday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Tuesday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Wednesday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Thursday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Friday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Saturday</li>
                            <li>8am - 7pm</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <ul class="hours text-center">
                            <li>Sunday</li>
                            <li>24 Hours</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end open-hours -->

        <!-- product -->
        <div class="product" id="menus">
            <div class="container">
                <h2>Choose Our Menus<br>Food And Drinks</h2>
                <div class="box-content">
                    <div class="product-filter-menu">
                        <ul>
                            <li data-filter="all" class="active">
                                <span>Show All</span>
                            </li>
                            <li data-filter="1">
                                <span>Food</span>
                            </li>
                            <li data-filter="2">
                                <span>Drink</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row filtr-container">
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="1">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/product3.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/product3.png') }}" alt="">
                                </a>
                                <h5>Avocado Egg</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>$45</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/product1.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/product1.png') }}" alt="">
                                </a>
                                <h5>Fresh Orange</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>$15</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/product1.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/product1.png') }}" alt="">
                                </a>
                                <h5>Fresh Orange</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>$15</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/product1.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/product1.png') }}" alt="">
                                </a>
                                <h5>Fresh Orange</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>$15</span>
                            </div>
                        </div>
                        <!-- Additional product entries can be added similarly -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end product -->

        <!-- cta -->
        <div class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md">
                        <img src="{{ asset('assetsLanding/img/cta.png') }}" alt="cta image">
                    </div>
                </div>
                <div class="box-content">
                    <div class="row align-items-center">
                        <div class="col-md">
                            <h2>Come On, <br>Eat And Drink At Our Place</h2>
                            <button class="button">Order Now</button>
                        </div>
                        <div class="col-md"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cta -->

        <!-- faq -->
        <div id="faq" class="faq">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="the-title"><span></span>FAQ</div>
                        <h2>Frequently Asked Questions</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia eaque odit, iusto autem vel
                            ullam ut! Totam voum.</p>
                        <button class="button">Contact us</button>
                    </div>
                    <div class="col-md">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Can order bulk food?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong> Sed
                                        non pretium turpis. Aenean maximus ultrices lorem, at auctor velit cursus in.
                                    </div>
                                </div>
                            </div>
                            <!-- Additional accordion items -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end faq -->

        <!-- contact -->
        <div id="contact" class="contact">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md">
                        <div class="content-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059353029!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sKota%20New%20York%2C%20New%20York%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sid!4v1639286790548!5m2!1sid!2sid"
                                height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="content">
                            <h2>Contact us</h2>
                            <ul>
                                <li><i class="la la-phone"></i> +61 3 8376 6284 </li>
                                <li><i class="la la-envelope"></i> contact@domain.com </li>
                                <li class="address"><i class="la la-map"></i> <span>121 King Street, Melbourne
                                        Victoria 3000 Australia </span> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end contact -->

            <!-- footer -->
            <footer>
                <div class="container">
                    <p class="text-center">Copyright © All Right Reserved</p>
                </div>
            </footer>
            <!-- end footer -->

            <!-- scripts -->
            <script src="{{ asset('assetsLanding/js/jquery.min.js') }}"></script>
            <script src="{{ asset('assetsLanding/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assetsLanding/js/jquery.filterizr.min.js') }}"></script>
            <script src="{{ asset('assetsLanding/js/magnific-popup.min.js') }}"></script>
            <script src="{{ asset('assetsLanding/js/swiper.min.js') }}"></script>
            <script src="{{ asset('assetsLanding/js/main.js') }}"></script>
</body>

</html>
