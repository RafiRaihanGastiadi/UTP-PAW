<?php
$ukuran = $_POST["ukuran"] ?? "";
$warna = $_POST["warna"] ?? "";
$halaman = $_POST["halaman"] ?? 0;
$rangkap = $_POST["rangkap"] ?? 0;

$tarif = 0;
$total = 0;
$valid = false;
$pesan = "Perhitungan belum dibuat.";

// Kerjakan Level 2 di sini

if ($ukuran === "A4") {
    if ($warna === "Hitam Putih") {
        $tarif = 500;
    } elseif ($warna === "Berwarna") {
        $tarif = 1500;
    }
} elseif ($ukuran === "F4") {
    if ($warna === "Hitam Putih") {
        $tarif = 700;
    } elseif ($warna === "Berwarna") {
        $tarif = 1800;
    }
}

if ($tarif > 0 && is_numeric($halaman) && is_numeric($rangkap) && $halaman > 0 && $rangkap > 0) {
    $valid = true;
} else {
    if (isset($_POST["submit"])) {
        $pesan = "Jumlah halaman dan rangkap harus berupa bilangan bulat positif!";
    }
}

if ($valid) {
    $total = $tarif * $halaman * $rangkap;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Biaya Cetak</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Hitung Pesanan</h2>
    
    <form action="" method="post">
        <label for="ukuran">Ukuran Kertas:</label>
        <select name="ukuran" id="ukuran" required>
            <option value="">-- Pilih Ukuran --</option>
            <option value="A4" <?= $ukuran === 'A4' ? 'selected' : '' ?>>A4</option>
            <option value="F4" <?= $ukuran === 'F4' ? 'selected' : '' ?>>F4</option>
        </select>
        <br><br>

        <label for="warna">Warna Cetak:</label>
        <select name="warna" id="warna" required>
            <option value="">-- Pilih Warna --</option>
            <option value="Hitam Putih" <?= $warna === 'Hitam Putih' ? 'selected' : '' ?>>Hitam Putih</option>
            <option value="Berwarna" <?= $warna === 'Berwarna' ? 'selected' : '' ?>>Berwarna</option>
        </select>
        <br><br>

        <label for="halaman">Jumlah Halaman:</label>
        <input type="number" name="halaman" id="halaman" min="1" value="<?= htmlspecialchars($halaman) ?>" required>
        <br><br>

        <label for="rangkap">Jumlah Rangkap:</label>
        <input type="number" name="rangkap" id="rangkap" min="1" value="<?= htmlspecialchars($rangkap) ?>" required>
        <br><br>

        <button type="submit" name="submit">Hitung Biaya</button>
    </form>

    <hr>

    <?php if ($valid): ?>
        <h3>Rincian Biaya Cetak</h3>
        <p>Ukuran Kertas: <strong><?= htmlspecialchars($ukuran) ?></strong></p>
        <p>Warna Cetak: <strong><?= htmlspecialchars($warna) ?></strong></p>
        <p>Jumlah Halaman: <strong><?= htmlspecialchars($halaman) ?></strong></p>
        <p>Jumlah Rangkap: <strong><?= htmlspecialchars($rangkap) ?></strong></p>
        <p>Tarif per Halaman: <strong>Rp<?= number_format($tarif, 0, ',', '.') ?></strong></p>
        <h4>Total Biaya: Rp<?= number_format($total, 0, ',', '.') ?></h4>
    <?php else: ?>
        <p style="color: red;"><?= htmlspecialchars($pesan) ?></p>
    <?php endif; ?>
</body>
</html>