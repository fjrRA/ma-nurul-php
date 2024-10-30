<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM siswa WHERE id_siswa='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../siswa-admin.php");
?>
