<?php
session_start();

// Kerjakan Level 3: hapus ringkasan

if (isset($_SESSION["ringkasan"])) {
    unset($_SESSION["ringkasan"]);
}

header("Location: ../ringkasan.php");
exit;