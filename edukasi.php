<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edukasi Lingkungan</title>
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

    <main class="edukasi">
      <section class="konten-edukasi">
        <article class="deskripsi-edukasi fade-in card-premium">
          <h1 class="title-anim slide-left">EDUKASI LINGKUNGAN</h1>
          <p>
            Tarunadaya Varna berkomitmen memberikan edukasi lingkungan yang
            mudah dipahami dan dapat langsung dipraktikkan oleh masyarakat. Hal
            ini menjadi bagian dari upaya kami mendorong kebiasaan baru yang
            lebih ramah lingkungan dan berkelanjutan.
          </p>

          <h2>1. Cara Memilah Sampah Rumah Tangga</h2>
          <p>
            Memilah sampah merupakan langkah awal yang sangat penting. Ada tiga
            kategori utama:
          </p>
          <ul>
            <li><b>Organik</b>: sisa makanan, daun, buah, sayur.</li>
            <li><b>Anorganik bernilai</b>: plastik, botol, kertas, kardus.</li>
            <li>
              <b>Residu</b>: pembalut, popok, puntung rokok, plastik multilayer.
            </li>
          </ul>

          <h2>2. Mengenal Maggot BSF</h2>
          <p>
            Maggot Black Soldier Fly adalah larva lalat tentara hitam yang mampu
            mengurai sampah organik hingga mencapai 70–80%. Keunggulannya:
          </p>
          <ul>
            <li>Mengurangi volume sampah organik secara cepat.</li>
            <li>Tidak menimbulkan bau bila dikelola dengan benar.</li>
            <li>Dapat dimanfaatkan untuk pakan ikan dan ternak.</li>
            <li>
              Hasil sampingnya (kasgot) dapat dijadikan pupuk organik alami.
            </li>
          </ul>

          <h2>3. Manfaat Lubang Biopori</h2>
          <p>Biopori memiliki beberapa manfaat, di antaranya:</p>
          <ul>
            <li>Mengurangi genangan air saat hujan.</li>
            <li>Meningkatkan kesuburan tanah.</li>
            <li>
              Menjadi tempat penguraian sampah organik secara alami di tanah.
            </li>
          </ul>

          <h2>4. Mengurangi Sampah Plastik</h2>
          <p>Beberapa langkah sederhana untuk mengurangi plastik:</p>
          <ul>
            <li>Bawa tas belanja sendiri.</li>
            <li>Gunakan botol minum isi ulang.</li>
            <li>Hindari penggunaan styrofoam sekali pakai.</li>
            <li>Pilih produk yang lebih ramah lingkungan.</li>
          </ul>
        </article>
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
