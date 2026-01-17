<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Program</title>
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
    <main class="program">
      <section class="konten-program">
        <div class="program-box fade-in card-premium">
          <div class="program-left card-premium">
            <h2 class="program-title title-anim slide-left">
              PROGRAM TARUNADAYA VARNA
            </h2>
            <h3 class="program-sub-title">🌱 1. Program Bank Sampah</h3>
            <p class="programkerja">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengajak warga memilah dan
              menabung sampah anorganik seperti plastik, kertas, dan botol.
              Sampah yang terkumpul dikelola agar bernilai ekonomis, sekaligus
              mengurangi volume sampah yang dibuang ke lingkungan.
            </p>
            <h3 class="program-sub-title">🐛 2. Program Maggot BSF</h3>
            <p class="programkerja">
              &nbsp;&nbsp;&nbsp;Mengolah sampah organik menggunakan larva Black
              Soldier Fly yang ramah lingkungan dan cepat bekerja. Hasilnya
              dapat dijadikan pakan ternak serta menghasilkan kasgot sebagai
              pupuk organik.
            </p>
            <h3 class="program-sub-title">
              🌧️ 3. Program Biopori & Resapan Air
            </h3>
            <p class="programkerja">
              &nbsp;&nbsp;&nbsp;&nbsp;Membuat lubang biopori di titik-titik
              rawan genangan untuk meningkatkan daya serap tanah. Selain
              mengurangi banjir, biopori bisa diisi sampah organik sehingga
              membantu proses pengomposan alami.
            </p>
            <h3 class="program-sub-title">🧹 4. Edukasi Lingkungan</h3>
            <p class="programkerja">
              &nbsp;&nbsp;&nbsp;Mendorong kebiasaan memilah sampah langsung dari
              sumbernya, yaitu rumah tangga. Warga diajak memisahkan sampah
              organik, anorganik bernilai, dan residu agar proses daur ulang
              lebih mudah dan volume sampah yang berakhir di TPA dapat
              berkurang.
            </p>
          </div>
          <div class="program-right card-premium">
            <div class="foto-program grid-fade slide-right">
              <img src="galeri/program1.webp" class="item1" alt="" />
              <img src="galeri/program2.webp" class="item2" alt="" />
              <img src="galeri/program3.webp" class="item3" alt="" />
              <img src="galeri/program4.webp" class="item4" alt="" />
            </div>
          </div>
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
