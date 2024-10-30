<?php
include '../config.php';
header('Content-Type: application/json');

$sql = "SELECT id_kelas, tingkatKelas, jumlahSiswaLelaki, jumlahSiswaPerempuan, totalSiswa FROM datakelas";
$result = $conn->query($sql);

$data = array();
$data['Kelas'] = array();

while ($row = $result->fetch_assoc()) {
  array_push($data['Kelas'], array(
    'id' => $row['id_kelas'],
    'tingkatKelas' => $row['tingkatKelas'],
    'jumlahSiswaLelaki' => $row['jumlahSiswaLelaki'],
    'jumlahSiswaPerempuan' => $row['jumlahSiswaPerempuan'],
    'totalSiswa' => $row['totalSiswa']
  ));
}

echo json_encode($data);
$conn->close();
