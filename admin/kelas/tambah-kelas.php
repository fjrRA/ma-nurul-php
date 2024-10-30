<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tingkatKelas = $_POST["tingkatKelas"];
    $jumlahSiswaLelaki = $_POST["jumlahSiswaLelaki"];
    $jumlahSiswaPerempuan = $_POST["jumlahSiswaPerempuan"];
    $totalSiswa = $_POST["totalSiswa"];

    $sql = "INSERT INTO datakelas (tingkatKelas, jumlahSiswaLelaki, jumlahSiswaPerempuan, totalSiswa)
            VALUES ('$tingkatKelas', '$jumlahSiswaLelaki', '$jumlahSiswaPerempuan', '$totalSiswa')";

    if ($conn->query($sql) === TRUE) {
        echo "Data kelas berhasil ditambahkan";
        header("Location: ../data-kelas-admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
