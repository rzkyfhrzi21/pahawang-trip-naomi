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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Pahawang Trip - Penawaran Spesial Wisata Pulau Pahawang, Lampung</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

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
              <li><a href="about">Tentang</a></li>
              <li><a href="deals" class="active">Penawaran Spesial</a></li>
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Temukan Penawaran Spesial Minggu Ini</h4>
          <h2>Harga Terbaik &amp; Pengalaman Tak Terlupakan</h2>
          <div class="border-button"><a href="about" title="Pelajari lebih lanjut tentang Pahawang Trip">Pelajari Lebih Lanjut</a></div>
        </div>
      </div>
    </div>
  </div>


  <?php
  // Set koneksi database
  include 'functions/koneksi.php';

  // Tentukan jumlah item per halaman
  $items_per_page = 5;

  // Ambil halaman saat ini dari parameter URL (default = 1)
  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

  // Hitung offset untuk query
  $offset = ($current_page - 1) * $items_per_page;

  // Hitung total item di tabel 'trip'
  $total_items_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM trip");
  $total_items = mysqli_fetch_assoc($total_items_query)['total'];

  // Hitung total halaman
  $total_pages = ceil($total_items / $items_per_page);

  // Ambil data sesuai halaman
  $sql_trip = mysqli_query($koneksi, "SELECT * FROM trip LIMIT $offset, $items_per_page");
  ?>

  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Temukan Paket Trip Terbaik di Pulau Pahawang</h2>
            <p>Jelajahi keindahan alam dan laut Pulau Pahawang dengan berbagai pilihan paket trip yang mengesankan. Nikmati pengalaman liburan tak terlupakan bersama kami.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Bagian Penawaran -->
        <?php while ($trip = mysqli_fetch_array($sql_trip)) : ?>
          <div class="col-lg-6 col-sm-6">
            <div class="item">
              <div class="row">
                <div class="col-lg-6">
                  <div class="image">
                    <img src="assets/trip/<?php echo $trip['gambar_trip']; ?>" title="<?php echo $trip['nama_trip']; ?>" alt="<?php echo $trip['nama_trip']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <span class="info">*<?php echo $trip['promo']; ?></span>
                    <h4><?php echo $trip['nama_trip']; ?></h4>
                    <div class="row">
                      <div class="col-6">
                        <i class="fa fa-clock"></i>
                        <span class="list"><?php echo $trip['jumlah_hari']; ?> Hari</span>
                      </div>
                      <div class="col-6">
                        <i class="fa fa-map-marker-alt"></i>
                        <span class="list">Destinasi Harian</span>
                      </div>
                    </div>
                    <p><?php echo $trip['ket_trip']; ?></p>
                    <div class="main-button">
                      <a href="reservation">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <!-- Bagian Pagination -->
        <div class="col-lg-12">
          <ul class="page-numbers">
            <!-- Tombol "Sebelumnya" -->
            <?php if ($current_page > 1) : ?>
              <li><a href="?page=<?php echo $current_page - 1; ?>"><i class="fa fa-arrow-left"></i></a></li>
            <?php endif; ?>

            <!-- Nomor Halaman -->
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
              <li class="<?php echo $i == $current_page ? 'active' : ''; ?>">
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>

            <!-- Tombol "Berikutnya" -->
            <?php if ($current_page < $total_pages) : ?>
              <li><a href="?page=<?php echo $current_page + 1; ?>"><i class="fa fa-arrow-right"></i></a></li>
            <?php endif; ?>
          </ul>
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