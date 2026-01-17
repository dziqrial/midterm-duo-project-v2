<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <img src="galeri/logo.png" alt="Tarunadaya Varna" />
        </div>
        <!-- NAVBAR DESKTOP -->
        <ul class="nav-desktop">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="program.php">Program</a></li>
          <li><a href="edukasi.php">Edukasi</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <li><a href="admin_anggota.php">Anggota Komunitas</a></li>
          <?php endif; ?>

          <?php if (isset($_SESSION['user_id'])): ?>
          <span style="color: white;">Halo, <?= $_SESSION['nama']; ?></span>
          <li><a href="logout.php">Logout</a></li>
          <?php else: ?>
          <li><a href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>

        <!-- HAMBURGER MENU (Mobile) -->
        <div class="hamburger" onclick="toggleNav()">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>

      <!-- FULLSCREEN MENU OVERLAY (Mobile) -->
      <div id="menuOverlay">
        <div class="closeMenu" onclick="toggleNav()">✕</div>

        <a href="index.php">Beranda</a>
        <a href="program.php">Program</a>
        <a href="edukasi.php">Edukasi</a>
        <a href="kontak.php">Kontak</a>
        <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a href="admin_anggota.php">Anggota Komunitas</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_id'])): ?>
        <span>Halo, <?= $_SESSION['nama']; ?></span>
        <a href="logout.php">Logout</a>
        <?php else: ?>
        <a href="login.php">Login</a>
        <?php endif; ?>
      </div>
    </header>

    <main class="beranda">
      <section class="konten">
        <!-- HERO BOX -->
        <div class="beranda-box fade-in box-hover">
          <div class="beranda-left-box">
            <h1 class="beranda-title slide-left">
              Satu Aksi Dilakukan,<br />
              Lingkungan Semakin Terjaga
            </h1>

            <p class="beranda-deskripsi">
              TARUNADAYA VARNA lahir dari kebutuhan sederhana: lingkungan kita
              butuh lebih banyak tangan yang mau turun langsung.<br /><br />
              Literasi tentang lingkungan berperan sangat penting untuk menjaga
              kebersihan dan keindahan di lingkungan, sehingga alam bisa terjaga
              dan diberi waktu lebih lama untuk bertahan
            </p>

            <div class="loginDaftar-buttons">
              <a href="daftar.php" class="btn-daftar" >Gabung Sekarang</a>
              <a href="login.php" class="btn-login" >Login</a>
            </div>
          </div>

          <div class="beranda-right-box image-pop slide-right">
            <img
              src="galeri/berandaMain.jpeg"
              class="beranda-main-img"
              alt=""
            />
          </div>
        </div>

        <!-- 3 FOTO GRID -->
        <div class="foto3-grid grid-fade soft-pulse">
          <img src="galeri/bioporiBeranda.jpg" alt="" />
          <img src="galeri/maggotBeranda.jpg" alt="" />
          <img src="galeri/bankSampahBeranda.jpeg" alt="" />
        </div>
      </section>
    </main>
    <footer>
      <p class="footerDeskripsi">
        © 2025 Tarunadaya Varna — Gerakan Pemuda Peduli Lingkungan — Bersama
        Membangun Lingkungan yang Bersih dan Berkelanjutan
      </p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
