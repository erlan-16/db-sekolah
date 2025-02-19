<?php 
require 'koneksi.php';

// Validasi apakah 'id' ada di URL dan tidak kosong
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "<script>alert('ID Kelas tidak valid!'); window.location.href='index.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET["id"]);

// Cek apakah siswa dengan ID tersebut ada di database
$result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Data Siswa tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

// Hapus data siswa
$delete = "DELETE FROM siswa WHERE id_siswa='$id'";
if (mysqli_query($koneksi, $delete)) {
    echo "<script>alert('Data Kelas berhasil dihapus!'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Data Kelas gagal dihapus: " . mysqli_error($koneksi) . "'); window.location.href='index.php';</script>";
}
?>