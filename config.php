<?php
$servername = "localhost";
$username = "root";  // Ubah jika diperlukan
$password = "";      // Ubah jika diperlukan
$dbname = "db_nurul"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

