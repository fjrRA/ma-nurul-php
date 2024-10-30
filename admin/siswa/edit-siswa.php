<?php
include '../../config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $jumlah_putra = $_POST['jumlah_putra'];
    $jumlah_putri = $_POST['jumlah_putri'];
    $total = $_POST['total'];

    $sql = "UPDATE siswa SET kelas = '$kelas', jumlah_putra = '$jumlah_putra', jumlah_putri = '$jumlah_putri', total = '$total' WHERE id_siswa = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../siswa-admin.php"); // Redirect kembali ke halaman data
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
