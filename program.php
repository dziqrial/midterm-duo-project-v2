<?php
session_start();
require 'koneksi.php';

function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function is_admin(){
  return isset($_SESSION['user_id'], $_SESSION['role']) && $_SESSION['role'] === 'admin';
}

$action = $_GET['action'] ?? 'list';

/* ================= CRUD HANDLER ================= */

// CREATE
if ($action === 'store' && is_admin() && $_SERVER['REQUEST_METHOD']==='POST') {
  $nama = trim($_POST['nama_program'] ?? '');
  $deskripsi = trim($_POST['deskripsi'] ?? '');
  $status = ($_POST['status'] ?? 'aktif') === 'nonaktif' ? 'nonaktif' : 'aktif';

  $fotoName = null;
  if (!empty($_FILES['foto']['name'])) {
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $fotoName = 'program_' . time() . '.' . $ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'galeri/'.$fotoName);
  }

  $stmt = $conn->prepare(
    "INSERT INTO programs (nama_program, deskripsi, status, foto) VALUES (?,?,?,?)"
  );
  $stmt->bind_param("ssss", $nama, $deskripsi, $status, $fotoName);
  $stmt->execute();
  $stmt->close();

  header("Location: program.php");
  exit;
}

// UPDATE
if ($action === 'update' && is_admin() && $_SERVER['REQUEST_METHOD']==='POST') {
  $id = (int)$_POST['id'];
  $nama = trim($_POST['nama_program']);
  $deskripsi = trim($_POST['deskripsi']);
  $status = ($_POST['status']==='nonaktif')?'nonaktif':'aktif';

  $fotoSQL = '';
  if (!empty($_FILES['foto']['name'])) {
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $fotoName = 'program_' . time() . '.' . $ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'galeri/'.$fotoName);
    $fotoSQL = ", foto='$fotoName'";
  }

  $conn->query(
    "UPDATE programs SET 
      nama_program='$nama',
      deskripsi='$deskripsi',
      status='$status'
      $fotoSQL
     WHERE id=$id"
  );

  header("Location: program.php");
  exit;
}

// DELETE
if ($action === 'delete' && is_admin()) {
  $id = (int)$_GET['id'];
  $conn->query("DELETE FROM programs WHERE id=$id");
  header("Location: program.php");
  exit;
}

// EDIT DATA
$edit = null;
if ($action === 'edit' && is_admin()) {
  $id = (int)$_GET['id'];
  $q = $conn->query("SELECT * FROM programs WHERE id=$id");
  $edit = $q->fetch_assoc();
}

// LIST DATA
if (is_admin()) {
  $q = $conn->query("SELECT * FROM programs ORDER BY id ASC");
} else {
  $q = $conn->query("SELECT * FROM programs WHERE status='aktif' ORDER BY id ASC");
}
$programs = $q->fetch_all(MYSQLI_ASSOC);
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
    <main class="login">
  <section class="konten-login fade-in">
    <article class="title-login" style="max-width:1100px;">
      <h1>Manajemen Program</h1>

      <table class="program-table" border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
          <th>ID</th>
          <th>Nama Program</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Foto</th>
          <?php if (is_admin()): ?><th>Aksi</th><?php endif; ?>
        </tr>

        <?php foreach($programs as $p): ?>
        <tr>
          <td><?=e($p['id'])?></td>
          <td><?=e($p['nama_program'])?></td>
          <td><?=e($p['deskripsi'])?></td>
          <td><?=e($p['status'])?></td>
          <td>
            <?php if ($p['foto']): ?>
              <img style="width: 200px; height: 200px;" src="galeri/<?=e($p['foto'])?>">
            <?php else: ?>
              <em>Belum ada</em>
            <?php endif; ?>
          </td>
          <?php if (is_admin()): ?>
          <td>
            <a href="program.php?action=edit&id=<?=$p['id']?>">Edit</a> |
            <a onclick="return confirm('Hapus program?')" href="program.php?action=delete&id=<?=$p['id']?>">Hapus</a>
          </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </table>

      <?php if (is_admin()): ?>
      <hr>

      <h2><?= $edit?'Edit':'Tambah' ?> Program</h2>
      <form method="POST" enctype="multipart/form-data"
            action="program.php?action=<?= $edit?'update':'store' ?>">
        <?php if($edit): ?>
          <input type="hidden" name="id" value="<?=$edit['id']?>">
        <?php endif; ?>

        <input type="text" name="nama_program" placeholder="Nama Program"
               value="<?=e($edit['nama_program']??'')?>" required><br><br>

        <textarea name="deskripsi" placeholder="Deskripsi" required><?=e($edit['deskripsi']??'')?></textarea><br><br>

        <select name="status">
          <option value="aktif" <?=($edit['status']??'')==='aktif'?'selected':''?>>Aktif</option>
          <option value="nonaktif" <?=($edit['status']??'')==='nonaktif'?'selected':''?>>Nonaktif</option>
        </select><br><br>

        <input type="file" name="foto"><br><br>

        <button type="submit"><?= $edit?'Update':'Simpan' ?></button>
      </form>
      <?php endif; ?>

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
