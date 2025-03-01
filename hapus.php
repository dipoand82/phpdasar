<?php
require_once "koneksi.php";

// Cek apakah ID ada
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Query untuk menghapus buku
$query = "DELETE FROM buku WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
