<div class="header-inner">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <!-- Start Logo -->
                    <div class="logo">
                        <a href="#"><img width="200px" src="images/line pro.png" alt="#"></a>
                    </div>
                    <!-- End Logo -->
                    <!-- Mobile Nav -->
                    <div class="mobile-nav"></div>
                    <!-- End Mobile Nav -->
                </div>
                <div class="col-lg-7 col-md-9 col-12">
                    <!-- Main Menu -->

                    <div class="main-menu">
                        <nav class="navigation">
                            <ul class="nav menu">
                                <li class="{{ $page == 'home' ? 'active' : '' }}"><a href="home">Home</a></li>
                                <li class="{{ $page == 'layanan' ? 'active' : '' }}"><a href="layanan">Layanan</a></li>
                                <li class="{{ $page == 'tentang_kami' ? 'active' : '' }}"><a href="tentang-kami">Tentang Kami</a></li>

                            </ul>
                        </nav>
                    </div>

                </div>
                <div class="col-lg-2 col-12">
                    <div class="get-quote">
                        <a href="{{ url('login') }}" class="btn">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
</header>
