<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM dataguru WHERE id_guru='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../data-guru-admin.php");
