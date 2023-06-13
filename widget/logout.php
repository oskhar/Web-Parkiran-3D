<?php

// MENGHAPUS SESSION
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['admin']);
session_destroy();

// PINDAH HALAM KE USER
$link_halaman_tujuan = "../pages/loginUser.php";
echo "<script>window.location.href='$link_halaman_tujuan';</script>";

?>