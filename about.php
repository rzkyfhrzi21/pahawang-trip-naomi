<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pahawang Trip menyediakan informasi wisata terbaik untuk pulau-pulau di Pahawang, Lampung. Temukan pengalaman perjalanan luar biasa dengan berbagai pilihan destinasi wisata alam dan laut yang memukau di Pahawang.">
  <meta name="keywords" content="wisata Pahawang, trip Pahawang, pulau wisata Lampung, wisata alam Pahawang, wisata laut Pahawang, perjalanan Pahawang">
  <meta name="author" content="Pahawang Trip">
  <meta property="og:title" content="Pahawang Trip - Wisata Pulau Pahawang, Lampung">
  <meta property="og:description" content="Jelajahi keindahan alam Pulau Pahawang di Lampung bersama Pahawang Trip. Kami membantu Anda menemukan destinasi wisata terbaik untuk liburan yang tak terlupakan.">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="assets/logo1.png" alt="Keindahan Alam Pahawang, Pulau Wisata di Lampung">

  <title>Pahawang Trip - Tentang Wisata Pulau Pahawang, Lampung</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index" class="logo"><img src="assets/logo1.png" alt="Pahawang Trip" title="Pahawang Trip">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index">Home</a></li>
              <li><a href="about" class="active">Tentang</a></li>
              <li><a href="deals">Penawaran Spesial</a></li>
              <li><a href="reservation">Reservasi Sekarang</a></li>
              <li><a href="login">Login</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="about-main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>JELAJAHI KEINDAHAN PULAU PAHAWANG</h4>
            <div class="line-dec"></div>
            <h2>Selamat Datang di Pahawang Trip</h2>
            <p>
              Temukan destinasi favorit untuk liburan yang menyenangkan, dengan keindahan bawah laut dan pemandangan memukau.
            </p>
            <div class="main-button">
              <a href="reservation" title="Pesan Perjalanan ke Pulau Pahawang">Pesan Sekarang</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->

  <div class="cities-town">
    <div class="container">
      <div class="row">
        <div class="slider-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Keindahan <em>Pulau &amp; Destinasi</em> Pahawang</h2>
            </div>
            <div class="col-lg-12">
              <div class="owl-cites-town owl-carousel">
                <?php

                include 'functions/koneksi.php';

                $sql_trip = mysqli_query($koneksi, "SELECT * from trip");

                while ($trip = mysqli_fetch_array($sql_trip)) :

                ?>
                  <div class="item">
                    <div class="thumb">
                      <img src="assets/trip/<?php echo $trip['gambar_trip']; ?>" title="<?php echo $trip['nama_trip']; ?>" alt="<?php echo $trip['nama_trip']; ?>">
                      <h4><?php echo $trip['nama_trip']; ?></h4>
                    </div>
                  </div>
                <?php endwhile ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Temukan Paket Trip Terbaik di Pulau Pahawang</h2>
            <p>Jelajahi keindahan alam dan laut Pulau Pahawang dengan berbagai pilihan paket trip yang mengesankan. Nikmati pengalaman liburan tak terlupakan bersama kami.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">
            <?php

            include 'functions/koneksi.php';

            $sql_trip = mysqli_query($koneksi, "SELECT * from trip");

            while ($trip = mysqli_fetch_array($sql_trip)) :

            ?>
              <div class="item">
                <div class="thumb">
                  <img src="assets/trip/<?php echo $trip['gambar_trip']; ?>" title="<?php echo $trip['nama_trip']; ?>" alt="<?php echo $trip['nama_trip']; ?>">
                  <div class="text">
                    <h4><?php echo $trip['nama_trip']; ?><br><span><i class="fa fa-users"></i> Hingga <?php echo $trip['maks_orang']; ?> orang</span></h4>
                    <h6>Rp <?php echo $trip['harga_trip']; ?><br><span></span></h6>
                    <div class="line-dec"></div>
                    <ul>
                      <li>Deal Includes:</li>
                      <li><i class="fa fa-taxi"></i> Trip <?php echo $trip['jumlah_hari']; ?> Hari > Dengan Tour Guide</li>
                      <li><i class="fa fa-fish"></i> Snorkeling Bawah Laut</li>
                      <li><i class="fa fa-building"></i> Termasuk Penginapan Hotel</li>
                    </ul>
                    <div class="main-button">
                      <a href="reservation">Pesan Paket Wisata Anda</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about-left-image.jpg" alt="Keindahan Pulau Pahawang">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Temukan Lebih Banyak Tentang Pahawang</h2>
            <p>Pahawang Trip membawa Anda menjelajahi keindahan alam Pulau Pahawang, dari pantai yang memukau hingga dunia bawah laut yang menakjubkan.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="info-item">
                <h4>150.640 +</h4>
                <span>Pengunjung Setiap Tahun</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                <h4>175.000+</h4>
                <span>Pengalaman Wisata Luar Biasa</span>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>12.560+</h4>
                    <span>Destinasi Memukau</span>
                  </div>
                  <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Reservasi Berhasil</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>Pulau Pahawang adalah destinasi wisata yang menawarkan pengalaman tak terlupakan. Nikmati snorkeling, pemandangan matahari terbenam, dan suasana pantai yang damai hanya ada di Pahawang Trip.</p>
          <div class="main-button">
            <a href="reservation" title="Pesan perjalanan ke Pahawang">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include 'assets/footer.php'; ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function() {
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>

</body>

</html>