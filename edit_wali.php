<?php 
    require 'koneksi.php';

    $id = $_GET["id"];
    $result = mysqli_query($koneksi, "SELECT * FROM wali_murid WHERE id_wali=$id");
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama_kelas = $_POST["nama_wali"];

        $update = "UPDATE wali_murid SET nama_wali='$nama_wali' WHERE id_wali=$id";

        mysqli_query($koneksi, $update);

        if (mysqli_affected_rows($koneksi) > 0) {
            echo "
                <script>
                    alert('Data Kelas berhasil diubah!')
                    document.location.href = 'wali_murid.php'; 
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Kelas gagal diubah!')
                    document.location.href = 'wali_murid.php'; 
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Wali Murid</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" required placeholder="Masukkan Nama Wali Murid" value="<?= $row["nama_wali"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control" required placeholder="Masukkan Nomor Kontak" value="<?= $row["kontak"]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="wali_murid.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>