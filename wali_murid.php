<?php
include 'koneksi.php';

// Ambil data wali murid dengan pagination dan pencarian
$query = "SELECT * FROM wali_murid $search_query LIMIT $start, $limit";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2 class="mb-3">Data Wali Murid</h2>
    <div class="d-flex justify-content-between mb-3">
        <a href="index.php" class="btn btn-primary">Kembali ke Data Siswa</a>
        
        <form class="d-flex" method="get">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari wali murid..." value="<?= $search; ?>">
            <button type="submit" class="btn btn-success">Cari</button>
        </form>

        <a href="tambah_wali.php" class="btn btn-success">Tambah Wali Murid</a>
    </div>

    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Nama Wali</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['nama_wali']; ?></td>
                    <td><?= $row['kontak']; ?></td>
                    <td>
                        <a href="edit_wali.php?id=<?= $row['id_wali']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_wali.php?id=<?= $row['id_wali']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?= $i; ?>&search=<?= $search; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>