<?php
include '../../config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $namaGuru = $_POST['namaGuru'];
    $jabatanGuru = $_POST['jabatanGuru'];

    // Proses upload gambar
    if (isset($_FILES['gambarGuru']) && $_FILES['gambarGuru']['error'] == 0) {
        $fileTmpPath = $_FILES['gambarGuru']['tmp_name'];
        $fileName = $_FILES['gambarGuru']['name'];
        $uploadPath = '../../uploads/' . $fileName;

        // Memindahkan file ke folder uploads
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Simpan path gambar relatif yang akan disimpan di database
            $gambarGuruPath = 'uploads/' . $fileName;
        } else {
            echo "Error saat mengupload file.";
            exit();
        }
    } else {
        // Jika tidak ada file baru, ambil path lama
        $gambarGuruPath = $_POST['gambarGuru'];
    }

    // Update data di database
    $sql = "UPDATE dataguru SET namaGuru = '$namaGuru', jabatanGuru = '$jabatanGuru', gambarGuru = '$gambarGuruPath' WHERE id_guru = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../data-guru-admin.php"); // Redirect kembali ke halaman data
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
