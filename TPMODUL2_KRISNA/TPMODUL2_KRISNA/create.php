<?php
include 'connect.php';

if (isset($_POST['create'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

    $query = "INSERT INTO tb_buku (judul, pengarang, tahun_terbit) VALUES ('$judul', '$pengarang', '$tahun_terbit')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: katalog.php");
        exit();
    } else {
        echo "Gagal menambah buku: " . mysqli_error($conn);
    }
}
?>
