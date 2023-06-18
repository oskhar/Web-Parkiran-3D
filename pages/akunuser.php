<?php

session_start();
include "../widget/koneksi.php";
include "../widget/warna.php";

// VALIDASI USER LOGIN DARI SESSION YANG TERSIMPAN
include "../widget/validasi_user.php";
if (!$validasi) {
    header("Location: loginUser.php");
}

try {
    // List untuk tampilan status
    $list_status = ["🔴", "🟢"];

    // Mengambil data plat nomor
    $sql = "SELECT * FROM plat_nomor WHERE id=$_SESSION[id]";
    $result_plat = mysqli_query($conn, $sql);
} catch (\Throwable $er) {
    echo (" (akunuser.php) pesan: " . $er);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login User</title>
    <link rel="stylesheet" href="../style/akunuser.css">
    <link href="../assets/images/lightmode.jpg" alt="iniGambar" rel="icon" type="image/x-icon">
    <style>
        body{
            background-color: var(--w2);
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="latar">
        <div class="background">
            <h1>DATA USER</h1>
            <div class="flex">
                <div class="kotak1">
                    <h3>USERNAME</h3>
                    <p><?= $_SESSION['username'] ?></p>
                    <h3>PASSWORD</h3>
                    <p><?= $_SESSION['password'] ?></p>
                    <button onclick="window.location.href='edituser.php';">Edit</button>
                </div>
                <div class="kotak2">
                    <h3>Plat Nomor</h3>
                    <ol>
                        <?php while ($data_plat = mysqli_fetch_assoc($result_plat)): ?>
                        <li>
                            <?= $data_plat['nomor'] ?> <?= $list_status[$data_plat['status']] ?><br>
                            <button onclick="window.location.href='../index.php?lt=<?= $data_plat['lantai'] ?>&loc=<?= $data_plat['lokasi'] ?>'">Lihat</button>
                        </li>
                        <?php endwhile; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- TOMBOL KEMBALI KE HALAMAN UTAMA -->
    <a href=".."><button id="kembali"><<</button></a>
</body>
</html>