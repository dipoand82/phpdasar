<?php
$host = "localhost";
$user = "root";
$password = ""; // Sesuaikan dengan password MySQL Anda
$database = "phpdasar";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
