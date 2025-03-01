<?php
require_once "koneksi.php";

// Cek apakah ID ada
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Ambil data buku berdasarkan ID
$query = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$buku = mysqli_fetch_assoc($result);

// Cek apakah buku ditemukan
if (!$buku) {
    header("Location: index.php");
    exit();
}

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];
    
    // Query untuk update data buku
    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun_terbit', penerbit='$penerbit' WHERE id=$id";
    
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
    <title>Edit Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], input[type=number] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #2196F3; color: white; border: none; cursor: pointer; }
        a { margin-left: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul" value="<?php echo $buku['judul']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Penulis:</label>
            <input type="text" name="penulis" value="<?php echo $buku['penulis']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo $buku['penerbit']; ?>" required>
        </div>
        
        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
