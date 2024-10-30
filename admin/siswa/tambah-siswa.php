<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kelas = $_POST['kelas'];
    $jumlah_putra = $_POST['jumlah_putra'];
    $jumlah_putri = $_POST['jumlah_putri'];
    $total = $_POST['total'];
    
    $sql = "INSERT INTO siswa (kelas, jumlah_putra, jumlah_putri, total) VALUES ('$kelas', '$jumlah_putra', '$jumlah_putri', '$total')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: ../siswa-admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas Siswa</title>
</head>
<body>
    <h2>Tambah Data Kelas Siswa</h2>
    <form method="post" action="">
        <label>Kelas:</label>
        <input type="text" name="kelas" required>
        <br>
        <label>Jumlah Putra:</label>
        <input type="text" name="jumlah_putra" required>
        <br>
        <label>Jumlah Putri:</label>
        <input type="text" name="jumlah_putri" required>
        <br>
        <label>Total:</label>
        <input type="text" name="total" required>
        <br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
