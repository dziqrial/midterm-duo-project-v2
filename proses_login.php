<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $pass  = trim($_POST['password']);

    if ($email === '' || $pass === '') {
        $_SESSION['error'] = "Email dan password wajib diisi!";
        header("Location: login.php");
        exit;
    }

    // Ambil user dari database
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Cek password hash
        if (password_verify($pass, $user['password'])) {

            // SET SESSION
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama']    = $user['name'];
            $_SESSION['email']   = $user['email'];
            $_SESSION['role']    = $user['role'];

            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Email tidak ditemukan!";
        header("Location: login.php");
        exit;
    }
}
