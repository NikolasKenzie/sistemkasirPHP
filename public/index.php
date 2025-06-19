<?php 
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

$queruUlasan = query("SELECT * FROM ulasan_pelanggan");


?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style/landingpagecopy.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <title>Nama Resto</title>
</head>

<body>

  <header id="navbar">
    <div class="navbar-container">
      <div class="container-logo-user">
        <h2>(Nama Resto)</h2>
      </div>
      <nav class="nav-links">
        <a href="">Beranda</a>
        <a href="listmenu.php">Menu</a>
        <a href="">Lokasi</a>
        <a href="">About</a>
        <a href="">Kontak</a>
        <i class="fa-solid fa-user"></i>  
      </nav>
      
      <div class="menu-toggle" id="menu-toggle">&#9776;</div>
    </div>
  </header>

  <main>
    <section class="hero" id="home">
      <div class="hero-content">
        <h1>Welcome to (nama resto)</h1>
        <p>The perfect place to relax and enjoy food</p>
        <div class="container-sosmed">
          <i class="fab fa-instagram"></i>
          <i class="fa-brands fa-tiktok"></i>
          <i class="fa-brands fa-whatsapp"></i>
        </div>
        <a href="listmenu.php" class="btn-see-our-menu">See Our Menu</a>
      </div>
    </section>

    <section class="sec-favorit-menu">
      <div class="container-favorit-menu">
        <h2>Menu Favorit</h2>
        <div class="container-list-menu-favorit">

          <div class="menu-card">
            <img src="latte.jpg" alt="gambarmakanan">
            <h3>(nama makanan)</h3>
            <p>Rp 28.000</p>
          </div>
          <div class="menu-card">
            <img src="cappuccino.jpg" alt="gambarmakanan">
            <h3>(nama makanan)</h3>
            <p>Rp 30.000</p>
          </div>
          <div class="menu-card">
            <img src="mocha.jpg" alt="makanan">
            <h3>(nama makanan)</h3>
            <p>Rp 32.000</p>
          </div>

        </div>
      </div>
    </section>

    <section class="sec-galeri">
      <div class="cotainer-galeri">

      </div>

    </section>

    <section class="sec-review">
      <div class="review-container">
        <h2>Ulasan Pelanggan</h2>
        <div class="review-list">
        <?php foreach ($queruUlasan as $ulasan) : ?>
          <div class="review-card">
            <h4><?=$ulasan['subjek']?></h4>
            <p><?=$ulasan['ulasan']?></p>
          </div>
          <?php endforeach ?>
        </div>
        
        <form id="review-form" class="review-form" action="config/sendUlasan.php" method="POST">
          <h3>Tulis Ulasan mu</h3>

          <input type="text" id="email" name="email" placeholder="Email kamu" required>
          <input type="text" id="subjek" name="subjek" placeholder="Nama kamu" required>
          <textarea id="message" name="message" rows="4" placeholder="Tulis ulasan di sini..." required></textarea>

          <button type="submit" name="btn-submitUlasan">Kirim ulasan</button>
        </form>

      </div>
    </section>
  </main>
  <footer>
    <div class="footer-container">
      <div class="footer-about">
        <h3>Resto KENZZZZ</h3>
        <p>Setiap suapan memiliki arti</p>
      </div>
      <div class="footer-contact">
        <h4>Kontak</h4>
        <p>Email:nikolaskenz112@gmail.com</p>
        <p>Telp: (021) 123-4567</p>
        <p>Alamat: Jl. Kenangan No. 5, Jakarta</p>
      </div>

  </footer>
  <script src="assets/js/landingpage.js"></script>
</body>

</html>