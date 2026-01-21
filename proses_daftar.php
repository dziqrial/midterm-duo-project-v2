<?php
session_start();
require 'koneksi.php'; // file koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama  = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $pass  = trim($_POST['password']);

    // Validasi dasar
    if ($nama == "" || $email == "" || $pass == "") {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: daftar.php");
        exit;
    }

    // Hash password biar aman
    $hashed = password_hash($pass, PASSWORD_DEFAULT);

    // Simpan ke database
    $sql = "INSERT INTO users (name, email, password, role)
        VALUES ('$nama', '$email', '$hashed', 'user')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = "Akun berhasil dibuat, silakan login!";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "Gagal mendaftar: " . $conn->error;
        header("Location: daftar.php");
        exit;
    }
}
