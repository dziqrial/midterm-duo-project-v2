<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Akun</title>
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
          <?php if (isset($_SESSION['user_id'])): ?>
          <span style="color: white;">Halo, <?= $_SESSION['nama']; ?></span>
          <a href="logout.php">Logout</a>
          <?php else: ?>
          <a href="login.php">Login</a>
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
        <?php if (isset($_SESSION['user_id'])): ?>
        <span style="color: white;">Halo, <?= $_SESSION['nama']; ?></span>
        <a href="logout.php">Logout</a>
        <?php else: ?>
        <a href="login.php">Login</a>
        <?php endif; ?>
      </div>
    </header>

    <main class="login">
      <section class="konten-login fade-in">
        <article class="title-login">
          <h1>Daftar Akun</h1>
          <p>Daftar untuk menjadi bagian dari Tarunadaya Varna.</p>

          <div class="box-form card-premium">
            <form action="proses_daftar.php" method="POST">
              <label style="color: navy; font-weight: bold">Nama :</label>

              <input
                class="nama"
                type="text"
                placeholder="Masukkan Nama Lengkap"
                required
                name="nama"
                
              />
              <br />
              <label style="color: navy; font-weight: bold">Email :</label>

              <input
                class="email"
                type="email"
                placeholder="Masukkan email"
                required
                name="email"
              />
              <br />
              <label style="color: navy; font-weight: bold">Password :</label>

              <input
                class="password"
                type="password"
                placeholder="Masukkan password"
                required
                name="password"
              /><br />

              <button class="submit btn-anim btn-shine" type="submit" name="daftar">
                Daftar
              </button>
            </form>

            <p class="gotodaftar">Sudah punya akun?</p>
            <a class="goto btn-anim" href="login.php"
              >Masuk di sini</a
            >
          </div>
        </article>
      </section>
    </main>

    <footer>
      <p class="footerDeskripsi">
        © 2025 Tarunadaya Varna — Bersama Membangun Lingkungan Bersih
      </p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
