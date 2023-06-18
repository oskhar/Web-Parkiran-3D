<?php

session_start();
include "../widget/koneksi.php";

// MENYIAPKAN NOTIFIKASI BESERTA PESANNYA
$notif = false;
$pesan = array(
    "text" => "Username atau Password salah !!!",
    "background" => "var(--danger)"
);

try {

    // VALIDASI USER LOGIN
    if (isset($_POST['username'])) {

            // Mengambil data dari tabel user
        $sql = "SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $result = mysqli_query($conn, $sql);

            // Cek apakah user dan password sesuai
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['id'] = mysqli_fetch_array($result)['id'];
            $_SESSION['user'] = true;
            header("Location: ../pages/akunuser.php");
        } else {
            $notif = true;
        }

    } else {

        // VALIDASI USER LOGIN DARI SESSION YANG TERSIMPAN
        include "../widget/validasi_user.php";
        if ($validasi) {
            header("Location: ../pages/akunuser.php");
        }

    }

} catch (\Throwable $er) {
    echo (" (loginUser.php) pesan: " . $er);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login User</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>

    <!-- MENAMBAHKAN POPUP JIKA DIPERLUKAN -->
    <?php if($notif) include "../widget/popup_biasa.php"; ?>

    <!-- CONTAINER -->
    <div class="form-container">
        <div class=""></div>
        <p class="title">Login User</p>
        <form class="form" method="post">

            <!-- INPUT USERNAME -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>

            <!-- INPUT PASSWORD -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="">
                <br><br><br><br>
            </div>

            <!-- TOMBOL SUBMIT -->
            <button class="sign" type="submit">Login</button>
        </form>

        <!-- TOMBOL LOGIN SEBAGAI ADMIN -->
        <div class="social-message">
            <div class="line"></div>
            <p class="message"><a href="loginAdmin.php">Login Sebagai Admin</a></p>
            <div class="line"></div>
        </div>
    </div>

    <!-- TOMBOL KEMBALI KE HALAMAN UTAMA -->
    <a href=".."><button id="kembali"><<</button></a>
</body>
</html>