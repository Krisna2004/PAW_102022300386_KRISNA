<?php
// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost"; // atau IP server database
$username = "root";  // username database
$password = "";      // password database
$database = "EAD_LABORATORY"; // ganti dengan nama database yang digunakan
$port = 3306;        // port default MySQL

// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 
$conn = mysqli_connect($host, $username, $password, $database, $port);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>
