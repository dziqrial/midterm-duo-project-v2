<?php

require 'admin_guard.php';
require 'koneksi.php';

$sql = "SELECT id, nama, email, role FROM users ORDER BY id DESC";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Anggota</title>
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
        <h2 style="text-align: left; margin-bottom: 10px; margin-left: 10px;">Daftar Anggota (Admin)</h2>

        <table border="1" cellpadding="8" cellspacing="0" style="margin-left: 10px;">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        <?php while ($row = $res->fetch_assoc()): ?>
            <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            </tr>
        <?php endwhile; ?>
        </table>

        <p><a href="index.php">Kembali</a></p>
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
