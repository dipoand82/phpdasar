<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]); // Menghindari serangan XSS
    echo "<h2>Selamat datang, " . $nama . "!</h2>";
} else {
    echo "Akses ditolak.";
}
?>