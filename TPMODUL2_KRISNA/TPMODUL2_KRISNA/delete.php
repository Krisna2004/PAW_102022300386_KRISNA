<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM tb_buku WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: katalog.php");
        exit();
    } else {
        echo "Gagal menghapus buku: " . mysqli_error($conn);
    }
}
?>
