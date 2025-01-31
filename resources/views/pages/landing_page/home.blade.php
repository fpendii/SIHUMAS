<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $title }}</title>

    <!-- Favicon -->
    <link rel="icon" href="template_landing_page/img/favicon.png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="template_landing_page/css/bootstrap.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="template_landing_page/css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="template_landing_page/css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="template_landing_page/css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="template_landing_page/css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="template_landing_page/css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="template_landing_page/css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="template_landing_page/css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="template_landing_page/css/magnific-popup.css">


    <!-- Medipro CSS -->
    <link rel="stylesheet" href="template_landing_page/css/normalize.css">
    <link rel="stylesheet" href="template_landing_page/style.css">
    <link rel="stylesheet" href="template_landing_page/css/responsive.css">


</head>

<body>


    <!-- Header Area -->
    <header class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">

                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                        <!-- Top Contact -->
                        <ul class="top-contact">
                            <li><i class="fab fa-instagram"></i><i class="fab fa-youtube"></i><i class="fa fa-facebook"></i>
                            </i>politala</li>
                            <li><i class="fa fa-envelope"></i><a
                                    href="mailto:humas@politala.ac.id">humas@politala.ac.id</a></li>
                        </ul>
                        <!-- End Top Contact -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Header Inner -->
        <!-- Main Menu -->
        @include('partial.topbar_landing_page')
        <!--/ End Main Menu -->
        <!-- End Header Area -->

        <!-- Slider Area -->
        <section class="slider mb-5">

                <!-- Start Single Slider -->

                <!-- End Single Slider -->
                <!-- Start Single Slider -->
                <div class="single-slider" style="background-image:url('images/hero.png')">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text">
                                    <h1>Sistem Informasi <span>Layanan </span><span>Humas Politeknik Negeri Tanah
                                            Laut</span></h1>
                                    <p>Terkini di Humas Politala: Kirim permintaan layanan Anda kepada kami, dan kami akan
                                        dengan segera mewujudkannya untuk Anda </p>
                                    <div class="button">
                                        <a href="{{ url('jasa') }}" class="btn">Kirim Permohonan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--/ End Slider Area -->
        <!-- Start Feautes -->
        <section class="Feautes section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Langkah-langkah melakukan Permohonan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features">
                            <div class="signle-icon">
                                <i class="icofont-login"></i>
                            </div>
                            <h3>Pertama</h3>
                            <p>Login menggunakan akun LinePro</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features">
                            <div class="signle-icon">
                                <i class="icofont-hand-drag1"></i>
                            </div>
                            <h3>Kedua</h3>
                            <p>Pilih layanan yang Anda inginkan dari daftar yang tersedia</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features">
                            <div class="signle-icon">
                                <i class="icofont-file-document"></i>
                            </div>
                            <h3>Ketiga</h3>
                            <p>Lengkapi formulir sesuai dengan layanan yang Anda pilih</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features last">
                            <div class="signle-icon">
                                <i class="icofont-ui-text-loading"></i>
                            </div>
                            <h3>Keempat</h3>
                            <p>Tunggu konfirmasi dari tim LinePro</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Feautes -->




        <!-- Start Call to action -->
        <section class="call-action overlay" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="content">
                            <h2>Jika Anda memiliki pertanyaan, silakan hubungi kami</h2>
                            <div class="button mt-2">
                                <a class="btn" href="https://wa.me/{{$no_hp}}"
                                    class="whatsapp-button" target="_blank">
                                    Contact Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Call to action -->


            @include('partial/footer_landing_page')

        <!--/ End Footer Area -->

        <!-- jquery Min JS -->
        <script src="template_landing_page/js/jquery.min.js"></script>
        <!-- jquery Migrate JS -->
        <script src="template_landing_page/js/jquery-migrate-3.0.0.js"></script>
        <!-- jquery Ui JS -->
        <script src="template_landing_page/js/jquery-ui.min.js"></script>
        <!-- Easing JS -->
        <script src="template_landing_page/js/easing.js"></script>
        <!-- Color JS -->
        <script src="template_landing_page/js/colors.js"></script>
        <!-- Popper JS -->
        <script src="template_landing_page/js/popper.min.js"></script>
        <!-- Bootstrap Datepicker JS -->
        <script src="template_landing_page/js/bootstrap-datepicker.js"></script>
        <!-- Jquery Nav JS -->
        <script src="template_landing_page/js/jquery.nav.js"></script>
        <!-- Slicknav JS -->
        <script src="template_landing_page/js/slicknav.min.js"></script>
        <!-- ScrollUp JS -->
        <script src="template_landing_page/js/jquery.scrollUp.min.js"></script>
        <!-- Niceselect JS -->
        <script src="template_landing_page/js/niceselect.js"></script>
        <!-- Tilt Jquery JS -->
        <script src="template_landing_page/js/tilt.jquery.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="template_landing_page/js/owl-carousel.js"></script>
        <!-- counterup JS -->
        <script src="template_landing_page/js/jquery.counterup.min.js"></script>
        <!-- Steller JS -->
        <script src="template_landing_page/js/steller.js"></script>
        <!-- Wow JS -->
        <script src="template_landing_page/js/wow.min.js"></script>
        <!-- Magnific Popup JS -->
        <script src="template_landing_page/js/jquery.magnific-popup.min.js"></script>
        <!-- Counter Up CDN JS -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="template_landing_page/js/bootstrap.min.js"></script>
        <!-- Main JS -->
        <script src="template_landing_page/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
