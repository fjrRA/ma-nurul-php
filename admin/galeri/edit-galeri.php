<?php
include '../../config.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Proses upload gambar baru
  if (isset($_FILES['dataGaleri']) && $_FILES['dataGaleri']['error'] == 0) {
    $fileTmpPath = $_FILES['dataGaleri']['tmp_name'];
    $fileName = $_FILES['dataGaleri']['name'];
    // Gunakan timestamp untuk menghindari nama file yang sama
    $uniqueName = time() . '_' . $fileName;
    $uploadPath = '../../uploads/' . $uniqueName;

    // Hapus file lama
    $sqlSelect = "SELECT dataGaleri FROM datagaleri WHERE id_galeri = $id";
    $result = $conn->query($sqlSelect);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $oldFile = '../../' . $row['dataGaleri'];
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }
    }

    // Memindahkan file baru ke folder uploads
    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
      // Simpan path gambar relatif yang akan disimpan di database
      $dataGaleriPath = 'uploads/' . $uniqueName;

      // Update data di database
      $sql = "UPDATE datagaleri SET dataGaleri = '$dataGaleriPath' WHERE id_galeri = $id";

      if ($conn->query($sql) === TRUE) {
        header("Location: ../data-galeri-admin.php");
        exit();
      } else {
        echo "Error updating record: " . $conn->error;
      }
    } else {
      echo "Error saat mengupload file.";
      exit();
    }
  } else {
    echo "Harap pilih file gambar untuk diunggah.";
    exit();
  }
}

$conn->close();
