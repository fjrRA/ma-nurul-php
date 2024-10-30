<?php
include '../../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM datagaleri WHERE id_galeri='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Data berhasil dihapus!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: ../data-galeri-admin.php");
