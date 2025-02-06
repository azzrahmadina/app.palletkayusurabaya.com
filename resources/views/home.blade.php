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
          <li><a href="{{route('home')}}" class="active">Home</a></li>
          <li><a href="{{route('layanan')}}">Layanan</a></li>
          <li><a href="{{route('riwayat.index')}}">Riwayat</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <span><i class="bi bi-person"></i>{{ $data['user']['name'] }}</span>
                <span><i class="bi bi-currency-dollar"></i>Rp {{ number_format($data['user']['balance'], 0, ',', '.') }}</span>
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
    <section id="hero" class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>Kemudahan Pembayaran, Untuk Semua <span>Kebutuhan</span></h1>
            <p>"Nikmati kemudahan membayar berbagai tagihan seperti listrik, air, pulsa, dan lainnya dalam satu platform yang aman, cepat, dan terpercaya"</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <!-- Konten About -->
          <div class="row justify-content-center text-center gy-5">
            <div class="col-12 content">
              <h2>Kenapa harus pake PPOB?</h2>
            </div>
          </div>
      
          <!-- Icon Boxes -->
            
            <div class="row gy-4 justify-content-center mt-5">
                <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card text-center p-4 border-0 shadow">
                        <i class="bi bi-coin display-4 text-primary mb-3"></i>
                        <h3 class="h5">Harga Termurah</h3>
                        <p> "Harga Termurah, Solusi Hemat untuk Semua Tagihan!" </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card text-center p-4 border-0 shadow">
                        <i class="bi bi-wallet2 display-4 text-primary mb-3"></i>
                        <h3 class="h5">Transaksi Mudah</h3>
                        <p> "Solusi Transaksi Mudah untuk Semua Kebutuhan Anda!" </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card text-center p-4 border-0 shadow">
                        <i class="bi bi-clock display-4 text-primary mb-3"></i>
                        <h3 class="h5">Layanan 24/7</h3>
                        <p> "Solusi Pembayaran Tanpa Batas Waktu!" </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card text-center p-4 border-0 shadow">
                        <i class="bi bi-clipboard-pulse display-4 text-primary mb-3"></i>
                        <h3 class="h5">Berbagai Jenis Pembayaran</h3>
                        <p> "Berbagai Pembayaran, Dari Pulsa Hingga Tagihan Listrik!" </p>
                    </div>
                </div>
            </div>
      
      </section>
      
      

  </main>

  <footer id="footer" class="footer dark-background">


    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PPOB</strong> <span>2025</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>