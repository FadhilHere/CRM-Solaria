<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assetsLanding/img/Solaria.png') }}">
    <title>Solaria</title>
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

        .whatsapp-chat-button img {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .whatsapp-chat-button img:hover {
            transform: scale(1.1);
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
    @include('pelanggan.navbar')
    <a href="https://wa.me/6282284945643" target="_blank" class="whatsapp-chat-button"
        style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
        <img src="{{ asset('assetsLanding/img/whatsapp.png') }}" alt="Chat via WhatsApp"
            style="width: 60px; height: 60px;">
    </a>

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
                                <li><a
                                        href="https://www.facebook.com/p/Solaria-Indonesia-100057582874563/?locale=id_ID"><i
                                            class="la la-facebook"></i></a></li>
                                <li><a href="https://x.com/SolariaID"><i class="la la-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/solaria.indonesia"><i
                                            class="la la-instagram"></i></a></li>

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
                    <img src="{{ asset('assetsLanding/img/about.jpg') }}" alt="about image">
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="content">
                        <div class="the-title"><span></span>TENTANG KAMI</div>
                        <h2>Inovasi Kuliner Sejak 90-an </h2>
                        <p>Didirikan pada era 90-an, Solaria berkomitmen untuk menyajikan pengalaman bersantap yang
                            inovatif dan menyenangkan. Setiap hidangan kami disajikan dengan standar kualitas tinggi,
                            harga yang ramah, dan suasana yang nyaman, menjadikan setiap kunjungan ke Solaria lebih dari
                            sekedar makan.
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-smile-o"></i>
                                    <!-- Mengganti ikon ke smile untuk mewakili pelayanan ramah -->
                                </div>
                                <div class="text">
                                    <h5>Pelayanan Ramah</h5>
                                    <span>Service</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-tags"></i>
                                    <!-- Mengganti ikon ke tags untuk mewakili harga terjangkau -->
                                </div>
                                <div class="text">
                                    <h5>Harga Terjangkau</h5>
                                    <span>Price</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="icon">
                                    <i class="la la-leaf"></i>
                                    <!-- Mengganti ikon ke leaf untuk mewakili bersih dan nyaman -->
                                </div>
                                <div class="text">
                                    <h5>Bersih dan Nyaman</h5>
                                    <span>Environment</span>
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
                <h2>Jam <br> Operasional</h2>
                <div class="row">
                    <div class="col-md">
                        <ul>
                            <li>Senin</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Selasa</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Rabu</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Kamis</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Jumat</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Sabtu</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul>
                            <li>Minggu</li>
                            <li>10am - 10pm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end open-hours -->

        <!-- product -->
        <div class="product" id="menus">
            <div class="container">
                <h2>Menu Kami</h2>
                <div class="box-content">
                    <div class="product-filter-menu">
                        <ul>
                            <li data-filter="all" class="active">
                                <span>Show All</span>
                            </li>
                            <li data-filter="1">
                                <span>Western</span>
                            </li>
                            <li data-filter="2">
                                <span>Chinese</span>
                            </li>
                            <li data-filter="3">
                                <span>Local</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row filtr-container">
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="1">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/fish-and-chips.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/fish-and-chips.png') }}" alt="">
                                </a>
                                <h5>Fish & Chips + Kentang</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 53.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="1">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/spagheti.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/spagheti.png') }}" alt="">
                                </a>
                                <h5>Spaghetti</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 35.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="1">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/cordon-bleu.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/cordon-bleu.png') }}" alt="">
                                </a>
                                <h5>Chicken Cordon Bleu + Kentang</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 47.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/fuyunghai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/fuyunghai.png') }}" alt="">
                                </a>
                                <h5>Nasi Fu Yung Hai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/fuyunghai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/fuyunghai.png') }}" alt="">
                                </a>
                                <h5>Nasi Fu Yung Hai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="2">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/fuyunghai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/fuyunghai.png') }}" alt="">
                                </a>
                                <h5>Nasi Fu Yung Hai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="3">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/nasgor-petai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/nasgor-petai.png') }}" alt="">
                                </a>
                                <h5>Nasi Goreng Petai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="3">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/nasgor-petai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/nasgor-petai.png') }}" alt="">
                                </a>
                                <h5>Nasi Goreng Petai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 col-12 filtr-item" data-category="3">
                            <div class="content">
                                <a href="{{ asset('assetsLanding/img/nasgor-petai.png') }}" class="product-popup">
                                    <img src="{{ asset('assetsLanding/img/nasgor-petai.png') }}" alt="">
                                </a>
                                <h5>Nasi Goreng Petai</h5>
                                <ul>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                    <li><i class="la la-star"></i></li>
                                </ul>
                                <span>Rp. 42.000</span>
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
                        <img src="{{ asset('assetsLanding/img/gedung.jpeg') }}" alt="cta image">
                    </div>
                </div>
                <div class="box-content">
                    <div class="row align-items-center">
                        <div class="col-md">
                            <h2>Come <br>Eat And Drink At Our Solaria!</h2>
                            <button class="button">Order Now</button>
                            <button class="button order-button" style="margin-left: 5px;">Reservasi</button>

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
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.723734891058!2d101.41582501423934!3d0.49977025318829127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da134317d7c667%3A0x77ecfefea04c6a7b!2sJl.%20Hangtuah%2C%20Sungai%20Selincah%2C%20Kec.%20Marpoyan%20Damai%2C%20Kota%20Pekanbaru%2C%20Riau!5e0!3m2!1sid!2sid!4v1639286790548!5m2!1sid!2sid"
                                height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                        </div>
                    </div>
                    <div class="col-md">
                        <div class="content text-left">
                            <h2>Our Contact</h2>
                            <ul>
                                <li><i class="la la-phone"></i> +62 851 5639 6190 </li>
                                <li><i class="la la-envelope"></i> fadhil22si@mahasiswa.pcr.ac.id </li>
                                <li class="address"><i class="la la-map"></i> <span>Solaria Living World Pekanbaru,
                                        Jl. Soekarno - Hatta No.23 Lantai G Unit, Tengkerang Bar., Kec. Marpoyan Damai,
                                        Kota Pekanbaru, Riau 28282</span> </li>
                            </ul>
                        </div>
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
