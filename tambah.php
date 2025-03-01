<?php
require_once "koneksi.php";

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];
    
    // Query untuk menambahkan buku baru
    $query = "INSERT INTO buku (judul, penulis, tahun_terbit, penerbit) VALUES ('$judul', '$penulis', '$tahun_terbit', '$penerbit')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], input[type=number] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        a { margin-left: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul" required>
        </div>
        
        <div class="form-group">
            <label>Penulis:</label>
            <input type="text" name="penulis" required>
        </div>
        
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" required>
        </div>
        
        <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" required>
        </div>
        
        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
