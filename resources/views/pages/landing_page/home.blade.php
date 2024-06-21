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
                            <li><i class="fa fa-phone"></i>+880 1234 56789</li>
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
            <div class="hero-slider">
                <!-- Start Single Slider -->
                <div class="single-slider" style="background-image:url('images/hero_1.png')">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text">
                                    <h1>Sistem Informasi <span>Layanan </span><span>Humas Politeknik Negeri Tanah Laut</span></h1>
                                    <p>Terkini di Humas Politala: Kirim permintaan jasa Anda kepada kami, dan kami akan
                                        dengan segera mewujudkannya untuk Anda </p>
                                    <div class="button">
                                        <a href="{{ url('jasa') }}" class="btn">Kirim Permohonan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->
                <!-- Start Single Slider -->
                <div class="single-slider" style="background-image:url('images/hero_2.png')">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text">
                                    <h1>Sistem Informasi <span>Layanan </span><span>Humas Politeknik Negeri Tanah Laut</span></h1>
                                    <p>Terkini di Humas Politala: Kirim permintaan jasa Anda kepada kami, dan kami akan
                                        dengan segera mewujudkannya untuk Anda </p>
                                    <div class="button">
                                        <a href="{{ url('jasa') }}" class="btn">Kirim Permohonan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->
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
                                <i class="bi bi-1-circle"></i>
                            </div>
                            <h3>Pertama</h3>
                            <p>Login Menggunakan akun Politala</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features">
                            <div class="signle-icon">
                                <i class="icofont icofont-medical-sign-alt"></i>
                            </div>
                            <h3>Kedua</h3>
                            <p>Pilih Jasa yang tersedia di SILAMAS</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features last">
                            <div class="signle-icon">
                                <i class="icofont icofont-stethoscope"></i>
                            </div>
                            <h3>Ketika</h3>
                            <p>Lengkapi Form jasa yang ditentukan</p>
                        </div>
                        <!-- End Single features -->
                    </div>
                    <div class="col-lg-3 col-12">
                        <!-- Start Single features -->
                        <div class="single-features last">
                            <div class="signle-icon">
                                <i class="icofont icofont-stethoscope"></i>
                            </div>
                            <h3>Keempat</h3>
                            <p>Tunggu Konfirmasi dari Pihak Silamas</p>
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
                            <h2>Ada masalah atau pertanyaan?</h2>
                            <div class="button mt-2">
                                <a href="#" class="btn">Contact Now</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Call to action -->


        <!-- Footer Area -->
        <footer id="footer" class="footer ">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>About Us</h2>
                                <p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut
                                    labore dolore magna.</p>
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                                    <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h2>Quick Links</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Home</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>About Us</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Services</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Our
                                                    Cases</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Other Links</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Consuling</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Finance</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Testimonials</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>FAQ</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>Open Hours</h2>
                                <p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.
                                </p>
                                <ul class="time-sidual">
                                    <li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
                                    <li class="day">Saturday <span>9.00-18.30</span></li>
                                    <li class="day">Monday - Thusday <span>9.00-15.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>Newsletter</h2>
                                <p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit,</p>
                                <form action="mail/mail.php" method="get" target="_blank"
                                    class="newsletter-inner">
                                    <input name="email" placeholder="Email Address" class="common-input"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Your email address'" required=""
                                        type="email">
                                    <button class="button"><i class="icofont icofont-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Top -->
            <!-- Copyright -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="copyright-content">
                                <p>© Copyright 2018 | All Rights Reserved by <a href="https://www.wpthemesgrid.com"
                                        target="_blank">wpthemesgrid.com</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Copyright -->
        </footer>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
