<?php
// Memasukkan file koneksi
include '../config.php';

// Query untuk mendapatkan data dari tabel guru, termasuk gambar
$sql = "SELECT id_guru, namaGuru, jabatanGuru, gambarGuru FROM dataguru";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
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

        // JavaScript untuk membuka modal edit dan memuat data
        function openEditModal(id, namaGuru, jabatanGuru, gambarGuru) {
            document.getElementById("modal-edit").style.display = "flex";
            document.getElementById("edit-id").value = id;
            document.getElementById("edit-nama").value = namaGuru;
            document.getElementById("edit-jabatan").value = jabatanGuru;
            document.getElementById("edit-foto").value = gambarGuru;
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
            <li><a href="data-guru-admin.ph">Data Admin</a></li>
            <li><a href="siswa-admin.php">Siswa Admin</a></li>
            <li><a href="galeri-admin.php">Data Galeri Admin</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Data Guru Admin</h1>
            <div class="user-profile">Administrator</div>
        </div>

        <div class="buttons">
            <!-- Tambah tombol untuk membuka modal -->
            <button class="btn btn-new" onclick="openModal()">+ New</button>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Guru</th>
                    <th>Jabatan Guru</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id_guru"]; ?></td>
                        <td><?php echo $row["namaGuru"]; ?></td>
                        <td><?php echo $row["jabatanGuru"]; ?></td>
                        <td>
                            <img src="<?php echo "../" . $row["gambarGuru"]; ?>" alt="Foto Guru" style="width: 100px; height: auto;">
                        </td>

                        <td>
                            <a href="javascript:void(0);" onclick="openEditModal(
                        '<?php echo $row["id_guru"]; ?>', 
                        '<?php echo addslashes($row["namaGuru"]); ?>', 
                        '<?php echo addslashes($row["jabatanGuru"]); ?>')">Edit</a> |
                            <a href='guru/hapus-guru.php?id=<?php echo $row["id_guru"]; ?>' onclick='return confirm("Yakin ingin menghapus?")'>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <!-- Modal untuk Form Tambah Guru -->


    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <div class="modal-header">Tambah Data Guru</div>
            <form action="guru/tambah-guru.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" name="jabatan" required>
                </div>
                <div class="form-group">
                    <label>Foto:</label>
                    <input type="file" name="gambar" required>
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </form>
        </div>
    </div>


    <!-- Modal untuk Form Edit Guru -->
    <div id="modal-edit" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <h2>Edit Data Guru</h2>
            <form action="guru/edit-guru.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="namaGuru" id="edit-nama" required>
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" name="jabatanGuru" id="edit-jabatan" required>
                </div>
                <div class="form-group">
                    <label>Foto:</label>
                    <input type="file" name="gambarGuru" id="edit-gambar" required>
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </form>

            <!-- <form action="guru/edit-guru.php" method="POST">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="nama" id="edit-nama" required>
                </div>
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" name="jabatan" id="edit-jabatan" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form> -->
        </div>
    </div>

</body>

</html>