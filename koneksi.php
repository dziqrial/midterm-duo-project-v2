<?php
// koneksi.php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_midterm";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek error
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
