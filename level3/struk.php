<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kerjakan Level 3: tampilkan ringkasan dari session
if (isset($_SESSION["ringkasan"])) {
    $ringkasan = $_SESSION["ringkasan"];
    ?>
    <div class="struk">
        <h3>Ringkasan Pekerjaan Cetak</h3>
        <p>Ukuran Kertas: <strong><?= htmlspecialchars($ringkasan["ukuran"]) ?></strong></p>
        <p>Warna Cetak: <strong><?= htmlspecialchars($ringkasan["warna"]) ?></strong></p>
        <p>Jumlah Halaman: <strong><?= htmlspecialchars($ringkasan["halaman"]) ?></strong></p>
        <p>Jumlah Rangkap: <strong><?= htmlspecialchars($ringkasan["rangkap"]) ?></strong></p>
        <p>Tarif per Halaman: <strong>Rp<?= number_format($ringkasan["tarif"], 0, ',', '.') ?></strong></p>
        <h4>Total Biaya: Rp<?= number_format($ringkasan["total"], 0, ',', '.') ?></h4>

        <form action="level3/hapus.php" method="post">
            <button type="submit" name="hapus">Hapus Ringkasan</button>
        </form>
    </div>
    <?php
} else {
    echo "<p>Belum ada pekerjaan cetak yang dihitung.</p>";
}
?>