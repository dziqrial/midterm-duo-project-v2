<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontak & Sosial Media</title>
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

    <main class="kontak">
      <section class="konten-kontak">
        <article class="deskripsi-kontak fade-in slide-right">
          <h1 class="title-anim slide-left">KONTAK & SOSIAL MEDIA</h1>
          <p>
            Hubungi kami untuk informasi kegiatan, kolaborasi, edukasi
            lingkungan, atau pengelolaan sampah. Kami siap terhubung dengan
            masyarakat dan mitra yang ingin bergerak bersama dalam menjaga
            lingkungan.
          </p>

          <h2>Kontak Utama</h2>
          <ul>
            <li><b>WhatsApp Admin:</b> 0823-6453-8989</li>
            <li><b>Email:</b> tarunadayavarna@gmail.com</li>
            <li>
              <b>Alamat:</b> RW 03 — Desa/Kelurahan Ciranjang, Kecamatan
              Ciranjang
            </li>
          </ul>

          <h2>Media Sosial</h2>
          <ul>
            <li>Instagram: @tarunadaya_varna</li>
            <li>Facebook: Tarunadaya Varna</li>
            <li>YouTube: Tarunadaya Varna Official</li>
          </ul>

          <h2>Jam Layanan</h2>
          <ul>
            <li>Senin–Jumat: 08.00 – 17.00</li>
            <li>Sabtu: 09.00 – 12.00</li>
            <li>Minggu: Libur</li>
          </ul>
        </article>
      </section>
    </main>

    <footer>
      <p class="footerDeskripsi">
        © 2025 Tarunadaya Varna — Bersama Membangun Lingkungan yang Bersih dan
        Berkelanjutan
      </p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
