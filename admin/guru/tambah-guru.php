<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    
    // Mengelola file gambar
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file adalah gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Memeriksa jika file sudah ada
    if (file_exists($target_file)) {
        echo "File sudah ada.";
        $uploadOk = 0;
    }

    // Memeriksa ukuran file (5MB maksimal)
    if ($_FILES["gambar"]["size"] > 5000000) {
        echo "Ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya memperbolehkan beberapa jenis file tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "Hanya file JPG, JPEG, PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika uploadOk masih 1, pindahkan file ke folder target
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Jika upload berhasil, simpan path gambar ke database
            $gambarPath = "uploads/" . basename($_FILES["gambar"]["name"]);
            $sql = "INSERT INTO dataguru (namaGuru, jabatanGuru, gambarGuru) VALUES ('$nama', '$jabatan', '$gambarPath')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil ditambahkan!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            header("Location: ../data-guru-admin.php");
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guru</title>
</head>
<body>
    <h2>Tambah Data Guru</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" required>
        <br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
