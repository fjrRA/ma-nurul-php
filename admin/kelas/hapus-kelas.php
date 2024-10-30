<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM datakelas WHERE id_kelas='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../data-kelas-admin.php");
