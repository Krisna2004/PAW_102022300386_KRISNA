<?php
include 'connect.php';

if (isset($_POST['update']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

    $query = "UPDATE tb_buku SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: katalog.php");
        exit();
    } else {
        echo "Gagal mengupdate buku: " . mysqli_error($conn);
    }
}
?>
