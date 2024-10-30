<?php
// Memasukkan file koneksi
include '../config.php';

// Query untuk mendapatkan data dari tabel kelas
// Query untuk mendapatkan data dari tabel datakelas
$sql = "SELECT id_kelas, tingkatKelas, jumlahSiswaLelaki, jumlahSiswaPerempuan, totalSiswa FROM datakelas";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa Admin</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #2d3541;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px 0;
        }

        .sidebar h2 {
            text-align: center;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            color: #b0b7c3;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li:hover {
            background-color: #3b434d;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .header .user-profile {
            font-size: 18px;
            color: #333;
            display: flex;
            align-items: center;
        }

        /* Data Table */
        .data-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #f5f5f5;
            color: #333;
        }

        .data-table tr:hover {
            background-color: #f9f9f9;
        }

        /* Buttons */
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .buttons .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-new {
            background-color: #28a745;
            color: #fff;
        }

        .btn-filter {
            background-color: #007bff;
            color: #fff;
        }

        .btn-report {
            background-color: #dc3545;
            color: #fff;
        }

        .tag {
            background-color: #e7f1e7;
            color: #28a745;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-right: 5px;
        }

        .icon {
            font-size: 18px;
            cursor: pointer;
        }

        /* Tambahkan Style untuk Modal */
        .modal {
            display: none;
            /* Hidden secara default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #ffffff;
            padding: 20px;
            width: 300px;
            border-radius: 5px;
            position: relative;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
    </style>

    <script>
        // JavaScript untuk membuka dan menutup modal
        function openModal() {
            document.getElementById("modal").style.display = "flex";
        }

        function openEditModal(id, kelas, jumlah_putra, jumlah_putri, total) {
            document.getElementById("modal-edit").style.display = "flex";
            document.getElementById("edit-id").value = id;
            document.getElementById("edit-kelas").value = kelas;
            document.getElementById("edit-jumlah-putra").value = jumlah_putra;
            document.getElementById("edit-jumlah-putri").value = jumlah_putri;
            document.getElementById("edit-total").value = total;
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
            document.getElementById("modal-edit").style.display = "none";
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <h2>Data Admin</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-guru-admin.ph">Data Guru Admin</a></li>
            <li><a href="data-kelas-admin.php">Data Kelas Admin</a></li>
            <li><a href="data-galeri-admin.php">Data Galeri Admin</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Data Kelas Siswa Admin</h1>
            <div class="user-profile">Administrator</div>
        </div>

        <div class="buttons">
            <!-- Tambah tombol untuk membuka modal -->
            <button class="btn btn-new" onclick="openModal()">+ New</button>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID Kelas</th>
                    <th>Tingkat Kelas</th>
                    <th>Jumlah Siswa Laki-laki</th>
                    <th>Jumlah Siswa Perempuan</th>
                    <th>Total Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id_kelas"]; ?></td>
                        <td><?php echo $row["tingkatKelas"]; ?></td>
                        <td><?php echo $row["jumlahSiswaLelaki"]; ?></td>
                        <td><?php echo $row["jumlahSiswaPerempuan"]; ?></td>
                        <td><?php echo $row["totalSiswa"]; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="openEditModal(
                        '<?php echo $row["id_kelas"]; ?>', 
                        '<?php echo $row["tingkatKelas"]; ?>', 
                        '<?php echo $row["jumlahSiswaLelaki"]; ?>', 
                        '<?php echo $row["jumlahSiswaPerempuan"]; ?>', 
                        '<?php echo $row["totalSiswa"]; ?>')">Edit</a>
                            |
                            <a href='kelas/hapus-kelas.php?id=<?php echo $row["id_kelas"]; ?>' onclick='return confirm("Yakin ingin menghapus?")'>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <!-- Modal untuk Form Tambah Kelas -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <div class="modal-header">Tambah Data Kelas</div>
            <form action="kelas/tambah-kelas.php" method="POST">
                <div class="form-group">
                    <label>Tingkat Kelas:</label>
                    <input type="text" name="tingkatKelas" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Siswa Laki-laki:</label>
                    <input type="text" name="jumlahSiswaLelaki" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Siswa Perempuan:</label>
                    <input type="text" name="jumlahSiswaPerempuan" required>
                </div>
                <div class="form-group">
                    <label>Total Siswa:</label>
                    <input type="text" name="totalSiswa" required>
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </form>
        </div>
    </div>


    <!-- Modal untuk Form Edit Kelas -->
    <!-- Modal untuk Form Edit Kelas -->
    <div id="modal-edit" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <h2>Edit Data Kelas</h2>
            <form action="kelas/edit-kelas.php" method="POST">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label>Tingkat Kelas:</label>
                    <input type="text" name="tingkatKelas" id="edit-kelas" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Siswa Laki-laki:</label>
                    <input type="text" name="jumlahSiswaLelaki" id="edit-jumlah-putra" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Siswa Perempuan:</label>
                    <input type="text" name="jumlahSiswaPerempuan" id="edit-jumlah-putri" required>
                </div>
                <div class="form-group">
                    <label>Total Siswa:</label>
                    <input type="text" name="totalSiswa" id="edit-total" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>


</body>

</html>