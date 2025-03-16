<?php
include('connect.php');

// ==================1==================
// If statement untuk menyimpan variabel $id dari GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ==================2==================
    // Definisikan $query untuk mengambil data buku berdasarkan id
    $query = "SELECT * FROM tb_buku WHERE id = $id";
    $data = mysqli_query($conn, $query);

    // Cek apakah data ditemukan
    if ($data && mysqli_num_rows($data) > 0) {
        $buku = mysqli_fetch_assoc($data);
    } else {
        echo "Buku tidak ditemukan.";
        exit;
    }
} else {
    echo "ID buku tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <center>
        <div class="container mt-5">
            <h1>Ubah Detail Buku</h1>
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="update.php?id=<?= $id ?>" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="judul" id="judul" value="<?= htmlspecialchars($buku['judul']) ?>" required>
                                <label for="judul">Judul</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= htmlspecialchars($buku['pengarang']) ?>" required>
                                <label for="pengarang">Pengarang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= htmlspecialchars($buku['tahun_terbit']) ?>" required>
                                <label for="tahun_terbit">Tahun Terbit</label>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary w-100">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
</html>
