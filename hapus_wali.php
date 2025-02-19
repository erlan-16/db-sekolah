<?php 
require 'koneksi.php';

// Validasi apakah 'id' ada di URL dan tidak kosong
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "<script>alert('ID wali tidak valid!'); window.location.href='wali_murid.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET["id"]);

// Cek apakah kelas dengan ID tersebut ada di database
$result = mysqli_query($koneksi, "SELECT * FROM wali_murid WHERE id_wali='$id'");
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Data Kelas tidak ditemukan!'); window.location.href='wali_murid.php';</script>";
    exit;
}

// Hapus data wali
$delete = "DELETE FROM wali_murid WHERE id_wali='$id'";
if (mysqli_query($koneksi, $delete)) {
    echo "<script>alert('Data Kelas berhasil dihapus!'); window.location.href='wali_murid.php';</script>";
} else {
    echo "<script>alert('Data Kelas gagal dihapus: " . mysqli_error($koneksi) . "'); window.location.href='wali_murid.php';</script>";
}
?>