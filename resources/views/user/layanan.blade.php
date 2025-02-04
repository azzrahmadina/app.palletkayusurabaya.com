<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PPOB</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">PPOB</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('layanan')}}" class="active">Layanan</a></li>
          <li><a href="{{route('riwayat.index')}}">Riwayat</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <span><i class="bi bi-person"></i>{{ $data['user']['name'] }}</span>
              </li>
              <li>
                <button type="submit">Logout</button>
              </li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section class=" hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg" >

      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-2 justify-content-center" data-aos="fade-in">
            <h1><span>Layanan</span></h1>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="features-item">
                <i class="bi bi-reception-4" style="color: #ff5733;"></i>
                <h3><a href="{{route('pulsa.index')}}" class="stretched-link">Pulsa Regular</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="features-item">
                <i class="bi bi-wifi" style="color: #5578ff;"></i>
                <h3><a href="{{route('paket.index')}}" class="stretched-link">Paket Data</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="features-item">
                <i class="bi bi-device-ssd" style="color: #e80368;"></i>
                <h3><a href="{{route('token.index')}}" class="stretched-link">Token Listrik</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
              <div class="features-item">
                <i class="bi bi-lightning" style="color: #ffa76e;"></i>
                <h3><a href="{{route('pln.index')}}" class="stretched-link">PLN</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
              <div class="features-item">
                <i class="bi bi-wallet" style="color: #29cc61;"></i>
                <h3><a href="{{route('e-wallet.index')}}" class="stretched-link">E-Wallet</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
              <div class="features-item">
                <i class="bi bi-droplet-half" style="color: #47aeff;"></i>
                <h3><a href="{{route('pdam.index')}}" class="stretched-link">PDAM</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
              <div class="features-item">
                <i class="bi bi-receipt" style="color: #ff5733;"></i>
                <h3><a href="{{route('gas.index')}}" class="stretched-link">PGN Gas</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
              <div class="features-item">
                <i class="bi bi-houses" style="color: #4233ff;"></i>
                <h3><a href="{{route('pbb.index')}}" class="stretched-link">Pajak PBB</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
              <div class="features-item">
                <i class="bi bi-bag-plus-fill" style="color: #11dbcf;"></i>
                <h3><a href="{{route('bpjs.index')}}" class="stretched-link">BPJS Kesehatan</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
              <div class="features-item">
                <i class="bi bi-router" style="color: #b20969;"></i>
                <h3><a href="{{route('internet.index')}}" class="stretched-link">Internet Pascabayar</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
              <div class="features-item">
                <i class="bi bi-phone" style="color: #ff5828;"></i>
                <h3><a href="{{route('hp.index')}}" class="stretched-link">Pulsa Pascabayar</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
              <div class="features-item">
                <i class="bi bi-credit-card" style="color: #29cc61;"></i>
                <h3><a href="{{route('multi.index')}}" class="stretched-link">Multi Finance</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1300">
              <div class="features-item">
                <i class="bi bi-controller" style="color: #4233ff;"></i>
                <h3><a href="{{route('game.index')}}" class="stretched-link">Game</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1400">
              <div class="features-item">
                <i class="bi bi-card-heading" style="color: #ffa76e;"></i>
                <h3><a href="{{route('voucher.index')}}" class="stretched-link">Voucher</a></h3>
              </div>
            </div><!-- End Feature Item -->
  
          </div>
  
        </div>
  
      </section><!-- /Features Section -->

  </main>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>