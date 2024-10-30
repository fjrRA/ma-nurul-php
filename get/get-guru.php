<?php
include '../config.php';
header('Content-Type: application/json');

$sql = "SELECT id_guru, namaGuru, jabatanGuru, gambarGuru FROM dataguru";
$result = $conn->query($sql);

$data = array();
$data['Guru'] = array();

while ($row = $result->fetch_assoc()) {
  // Mengubah path gambar menjadi path absolut
  $gambarPath = str_replace('../', '', $row['gambarGuru']); // Menghapus ../ jika ada

  array_push($data['Guru'], array(
    'id' => $row['id_guru'],
    'namaGuru' => $row['namaGuru'],
    'jabatan' => $row['jabatanGuru'],
    'gambarGuru' => '../' . $gambarPath  // Menambahkan ../ di depan path gambar
  ));
}

echo json_encode($data);
$conn->close();
