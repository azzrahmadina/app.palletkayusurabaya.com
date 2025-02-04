<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PPOB</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

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
        <!-- <img src="../assets/img/logo.png" alt=""> -->
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
                <span><i class="bi bi-person"></i>{{ $userData['user']['name'] }}</span>
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
      <img src="../assets/img/hero-bg-2.jpg" alt="" class="hero-bg" >

      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-2 justify-content-center" data-aos="fade-in">
            <h1><span>Games</span></h1>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">
  
          <div class="row gy-4 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <form action="{{route('game.store')}}" method="POST" class="d-inline">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="game_id"><h3>Pilih Game</h3></label>
                            <select class="form-control" name="game_code" id="game_code" required>
                                <option value="">-- Pilih Game --</option>
                                @foreach($games as $game)
                                    <option value="{{ $game['code'] }}">{{ $game['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" name="nomor" placeholder="Masukkan nomor disini" class="form-control" required>
                            <button type="submit" class="button-search">Cari</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>

          <div class="row">
            @if(session('data') && count(session('data')) > 0)
                @foreach(session('data') as $games)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $games['nama_produk'] }}</h5>
                                        <p class="card-text">Harga: <strong>Rp{{ number_format($games['harga'], 0, ',', '.') }}</strong></p>
                                        <p class="card-text">Status: <strong>{{ $games['status'] }}</strong></p>
                                        <form action="{{route('game.transaction')}}" method="POST">
                                          @csrf
                                          <input type="hidden" name="game_code" value="{{ $games['kode_produk'] }}">
                                          <input type="hidden" name="nomor" value="{{ session('nomor') }}">
                                          <button type="submit" class="btn btn-primary">Beli</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
  
        </div>
  
    </section><!-- /Features Section -->

  </main>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>