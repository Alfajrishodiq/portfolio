<?php
// Database connection (Ganti sesuai dengan detail database Anda)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "portfolio"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "portfolio");

if ($conn) {
    echo ("connection succes:" . mysqli_connect_error());
}

echo "Koneksi berhasil";

?>