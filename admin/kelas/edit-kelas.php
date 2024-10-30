<?php
include '../../config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $tingkatKelas = $_POST['tingkatKelas'];
    $jumlahSiswaLelaki = $_POST['jumlahSiswaLelaki'];
    $jumlahSiswaPerempuan = $_POST['jumlahSiswaPerempuan'];
    $totalSiswa = $_POST['totalSiswa'];

    $sql = "UPDATE datakelas SET tingkatKelas = '$tingkatKelas', jumlahSiswaLelaki = '$jumlahSiswaLelaki', jumlahSiswaPerempuan = '$jumlahSiswaPerempuan', totalSiswa = '$totalSiswa' WHERE id_kelas = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../data-kelas-admin.php"); // Redirect kembali ke halaman data kelas
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
