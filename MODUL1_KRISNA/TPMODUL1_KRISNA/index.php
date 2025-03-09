<?php
// Inisialisasi variabel untuk input dan pesan kesalahan
$nama = $email = $nim = "";
$pesanNama = $pesanEmail = $pesanNIM = "";
$pesanSukses = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************  
    // Validasi input nama
    if (empty($_POST["nama"])) {
        $pesanNama = "Nama harus diisi";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    // **********************  2  **************************  
    // Validasi format email
    if (empty($_POST["email"])) {
        $pesanEmail = "Email harus diisi";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $pesanEmail = "Format email tidak valid";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // **********************  3  **************************  
    // Validasi NIM agar hanya berisi angka
    if (empty($_POST["nim"])) {
        $pesanNIM = "NIM wajib diisi";
    } elseif (!ctype_digit($_POST["nim"])) {
        $pesanNIM = "NIM hanya boleh berisi angka";
    } else {
        $nim = $_POST["nim"];
    }

    // Cek apakah semua validasi lolos
    if (empty($pesanNama) && empty($pesanEmail) && empty($pesanNIM)) {
        $pesanSukses = "Pendaftaran berhasil! Data Anda telah tersimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa Baru</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo Universitas" class="logo">
        <h2>Formulir Registrasi Mahasiswa Baru</h2>

        <?php if (!empty($pesanSukses)) : ?>
            <p class="success-message"><?php echo $pesanSukses; ?></p>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>">
            <span class="error-message"><?php echo $pesanNama; ?></span>

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error-message"><?php echo $pesanEmail; ?></span>

            <label>NIM:</label>
            <input type="text" name="nim" value="<?php echo $nim; ?>">
            <span class="error-message"><?php echo $pesanNIM; ?></span>

            <button type="submit">Kirim Pendaftaran</button>
        </form>
    </div>
</body>
</html>