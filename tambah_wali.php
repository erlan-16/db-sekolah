<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil data kelas dan wali untuk dropdown
$result_wali = mysqli_query($koneksi, "SELECT id_wali, nama_wali FROM wali_murid");

// Tambah Data Siswa
if (isset($_POST['tambah_wali'])) {
    $nama_wali = $_POST['nama_wali'];
    $kontak = $_POST['kontak'];

    $query = "INSERT INTO wali_murid (nama_wali, kontak) 
              VALUES ('$nama_wali', '$kontak')";
    mysqli_query($koneksi, $query);
    header("Location: wali_murid.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Wali Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Tambah Wali Siswa</h2>
        <form method="POST" action="">
            <label>Nama Wali:</label>
            <input type="text" name="nama_wali" required>
            
            <label>Kontak:</label>
            <input type="text" name="kontak" required>
            </select>
            <button type="submit" name="tambah_wali">Tambah Wali Siswa</button>
        </form>
    </div>
</body>
</html>
