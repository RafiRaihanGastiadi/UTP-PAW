<?php
$ukuran = $_POST["ukuran"];
$warna = $_POST["warna"];
$halaman = $_POST["halaman"];
$rangkap = $_POST["rangkap"];

$tarif = 0;
$total = 0;
$valid = false;
$pesan = "Perhitungan belum dibuat.";

// Kerjakan Level 2 di sini

// ....

if ($valid) {
    $total = $tarif * $halaman * $rangkap;
}
