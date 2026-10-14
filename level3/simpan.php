<?php
session_start();

// Kerjakan Level 3: simpan ringkasan

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["ringkasan"] = [
        "ukuran"  => $_POST["ukuran"] ?? "",
        "warna"   => $_POST["warna"] ?? "",
        "halaman" => $_POST["halaman"] ?? 0,
        "rangkap" => $_POST["rangkap"] ?? 0,
        "tarif"   => $_POST["tarif"] ?? 0,
        "total"   => $_POST["total"] ?? 0
    ];
}

header("Location: ../ringkasan.php");
exit;