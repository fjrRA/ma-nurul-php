<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Cek apakah file gambar ada
  if (isset($_FILES["dataGaleri"]) && $_FILES["dataGaleri"]["error"] == 0) {
    // Pastikan folder uploads ada
    $target_dir = "../../uploads/";
    if (!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["dataGaleri"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file adalah gambar
    $check = getimagesize($_FILES["dataGaleri"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File bukan gambar.";
      $uploadOk = 0;
    }

    // Memeriksa ukuran file (5MB maksimal)
    if ($_FILES["dataGaleri"]["size"] > 5000000) {
      echo "Ukuran file terlalu besar.";
      $uploadOk = 0;
    }

    // Hanya memperbolehkan beberapa jenis file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "Hanya file JPG, JPEG, PNG yang diperbolehkan.";
      $uploadOk = 0;
    }

    // Jika uploadOk masih 1, pindahkan file ke folder target
    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["dataGaleri"]["tmp_name"], $target_file)) {
        // Jika upload berhasil, simpan path gambar ke database
        $gambarPath = "uploads/" . basename($_FILES["dataGaleri"]["name"]);
        $sql = "INSERT INTO datagaleri (dataGaleri) VALUES (?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $gambarPath);

        if ($stmt->execute()) {
          header("Location: ../data-galeri-admin.php");
          exit();
        } else {
          echo "Error: " . $stmt->error;
        }
      } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
      }
    }
  } else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan pada file.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tambah Galeri</title>
</head>

<body>
  <h2>Tambah Galeri</h2>
  <form method="post" action="" enctype="multipart/form-data">
    <label>Foto:</label>
    <input type="file" name="dataGaleri" required>
    <br>
    <button type="submit">Tambah</button>
  </form>
</body>

</html>