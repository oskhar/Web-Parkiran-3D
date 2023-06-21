<?php

// Menghubungkan web ke database ("Nama_Host", "Username", "Password", "Nama_Database")
$conn = mysqli_connect("localhost", "root", "tesdoang", "parkir");

// Memastikan koneksi berfungsi dengan benar
if (!$conn)
    die("Koneksi database gagal". mysqli_connect_error());

?>